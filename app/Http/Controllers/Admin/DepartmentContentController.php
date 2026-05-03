<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
            'extra_data' => 'nullable|array',
            'is_active' => 'boolean',
            'order' => 'integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        
        // Check if section already exists
        $existing = DepartmentContent::where('department_id', $departmentId)
            ->where('section', $validated['section'])
            ->first();
        
        if ($existing) {
            return redirect()->back()
                ->with('error', 'This section already exists. Please edit it instead.');
        }
        
        // Handle extra_data
        $extraData = $validated['extra_data'] ?? [];
        
        // Handle file uploads for any section
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $subDir = 'department-content/' . $departmentId . '/' . $validated['section'];
                $image->move(public_path($subDir), $filename);
                $images[] = $subDir . '/' . $filename;
            }
            $extraData['images'] = $images;
        }
        
        DepartmentContent::create([
            'department_id' => $departmentId,
            'section' => $validated['section'],
            'content' => $validated['content'] ?? null,
            'extra_data' => !empty($extraData) ? $extraData : null,
            'is_active' => $request->has('is_active'),
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
            'extra_data' => 'nullable|array',
            'is_active' => 'boolean',
            'order' => 'integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'remove_images' => 'nullable|array',
        ]);
        
        // Get existing extra_data
        $extraData = is_array($content->extra_data) ? $content->extra_data : (json_decode($content->extra_data, true) ?? []);
        
        // Merge with new extra_data from form
        if (!empty($validated['extra_data'])) {
            $extraData = array_merge($extraData, $validated['extra_data']);
        }
        
        // Handle image removal
        if (!empty($validated['remove_images'])) {
            foreach ($validated['remove_images'] as $imagePath) {
                if (File::exists(public_path($imagePath))) {
                    File::delete(public_path($imagePath));
                }
                // Remove from extra_data
                if (isset($extraData['images'])) {
                    $extraData['images'] = array_filter($extraData['images'], function($img) use ($imagePath) {
                        return $img !== $imagePath;
                    });
                    $extraData['images'] = array_values($extraData['images']); // Re-index array
                }
            }
        }
        
        // Handle new file uploads for any section
        if ($request->hasFile('images')) {
            if (!isset($extraData['images'])) {
                $extraData['images'] = [];
            }
            
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $subDir = 'department-content/' . $departmentId . '/' . $content->section;
                $image->move(public_path($subDir), $filename);
                $extraData['images'][] = $subDir . '/' . $filename;
            }
        }
        
        // Prepare update data
        $updateData = [
            'section' => $validated['section'],
            'content' => $validated['content'] ?? $content->content,
            'is_active' => $request->has('is_active'),
            'order' => $validated['order'] ?? $content->order,
        ];
        
        // Only update extra_data if we have data
        if (!empty($extraData)) {
            $updateData['extra_data'] = $extraData;
        }
        
        $content->update($updateData);
        
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
