<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($departmentId)
    {
        $department = Department::findOrFail($departmentId);
        $contents = $department->contents()->orderBy('order')->get();
        
        return view('admin.departments.contents.index', compact('department', 'contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($departmentId)
    {
        $department = Department::findOrFail($departmentId);
        $sections = $this->getSections();
        
        return view('admin.departments.contents.create', compact('department', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $departmentId)
    {
        $department = Department::findOrFail($departmentId);
        
        $validated = $request->validate([
            'section' => 'required|string|max:255',
            'content' => 'nullable|string',
            'extra_data' => 'nullable|json',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);
        
        // Check if section already exists
        $existing = DepartmentContent::where('department_id', $departmentId)
            ->where('section', $validated['section'])
            ->first();
        
        if ($existing) {
            return redirect()->back()
                ->with('error', 'This section already exists. Please edit it instead.');
        }
        
        DepartmentContent::create([
            'department_id' => $departmentId,
            'section' => $validated['section'],
            'content' => $validated['content'] ?? null,
            'extra_data' => $validated['extra_data'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
            'order' => $validated['order'] ?? 0,
        ]);
        
        return redirect()->route('admin.departments.contents.index', $departmentId)
            ->with('success', 'Content section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($departmentId, $contentId)
    {
        $department = Department::findOrFail($departmentId);
        $content = DepartmentContent::findOrFail($contentId);
        $sections = $this->getSections();
        
        return view('admin.departments.contents.edit', compact('department', 'content', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $departmentId, $contentId)
    {
        $content = DepartmentContent::findOrFail($contentId);
        
        $validated = $request->validate([
            'section' => 'required|string|max:255',
            'content' => 'nullable|string',
            'extra_data' => 'nullable|json',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);
        
        $content->update($validated);
        
        return redirect()->route('admin.departments.contents.index', $departmentId)
            ->with('success', 'Content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($departmentId, $contentId)
    {
        $content = DepartmentContent::findOrFail($contentId);
        $content->delete();
        
        return redirect()->route('admin.departments.contents.index', $departmentId)
            ->with('success', 'Content deleted successfully.');
    }
    
    /**
     * Get available sections list
     */
    private function getSections()
    {
        return [
            'about' => 'About (Stats & Overview)',
            'vision' => 'Vision & Mission',
            'po' => 'PO/PSO/PEO',
            'hod' => "HOD's Desk",
            'committee' => 'Committee Members',
            'faculty' => 'Faculty',
            'courses' => 'Courses/Programs',
            'laboratory' => 'Laboratory',
            'mou' => 'MOU',
            'industry' => 'Industry Visits',
            'gallery' => 'Gallery',
            'events' => 'Events Organized',
            'alumnae' => 'Alumnae',
            'social' => 'Social/Contact CTA',
        ];
    }
}
