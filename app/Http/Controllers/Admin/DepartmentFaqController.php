<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentFaq;
use Illuminate\Http\Request;

class DepartmentFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($departmentId)
    {
        $department = Department::findOrFail($departmentId);
        $faqs = $department->faqs()->orderBy('category')->orderBy('order')->get();
        
        return view('admin.departments.faqs.index', compact('department', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($departmentId)
    {
        $department = Department::findOrFail($departmentId);
        $categories = $this->getCategories();
        
        return view('admin.departments.faqs.create', compact('department', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $departmentId)
    {
        $department = Department::findOrFail($departmentId);
        
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);
        
        DepartmentFaq::create([
            'department_id' => $departmentId,
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'category' => $validated['category'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);
        
        return redirect()->route('admin.departments.faqs.index', $departmentId)
            ->with('success', 'FAQ created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($departmentId, $faqId)
    {
        $department = Department::findOrFail($departmentId);
        $faq = DepartmentFaq::findOrFail($faqId);
        
        return view('admin.departments.faqs.show', compact('department', 'faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($departmentId, $faqId)
    {
        $department = Department::findOrFail($departmentId);
        $faq = DepartmentFaq::findOrFail($faqId);
        $categories = $this->getCategories();
        
        return view('admin.departments.faqs.edit', compact('department', 'faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $departmentId, $faqId)
    {
        $faq = DepartmentFaq::findOrFail($faqId);
        
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);
        
        $faq->update([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'category' => $validated['category'],
            'order' => $validated['order'] ?? $faq->order,
            'is_active' => $validated['is_active'] ?? $faq->is_active,
        ]);
        
        return redirect()->route('admin.departments.faqs.index', $departmentId)
            ->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($departmentId, $faqId)
    {
        $faq = DepartmentFaq::findOrFail($faqId);
        $faq->delete();
        
        return redirect()->route('admin.departments.faqs.index', $departmentId)
            ->with('success', 'FAQ deleted successfully.');
    }
    
    /**
     * Get available FAQ categories
     */
    private function getCategories()
    {
        return [
            'general' => 'ℹ️ General Information',
            'course' => '📚 Course Details',
            'eligibility' => '✅ Eligibility',
            'admission' => '📝 Admission Process',
            'curriculum' => '📖 Curriculum & Learning',
            'facilities' => '🏛️ Facilities',
            'fees' => '💰 Fees & Scholarships',
            'career' => '💼 Career Options',
            'location' => '📍 Location & Hostel',
            'contact' => '📞 Contact Details',
            'social' => '🌐 Social Media',
        ];
    }
}
