<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculty = Faculty::with('departments')->paginate(10);
        return view('admin.faculty.index', compact('faculty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.faculty.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:faculties,email',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'employee_id' => 'required|string|unique:faculties,employee_id',
            'department_id' => 'nullable|exists:departments,id',
            'department_ids' => 'nullable|array',
            'department_ids.*' => 'exists:departments,id',
            'designation' => 'nullable|string|max:255',
            'joining_date' => 'nullable|date',
            'qualification' => 'nullable|string',
            'specialization' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'is_active' => 'boolean',
        ]);

        $facultyData = $request->all();
        $departmentIds = $request->input('department_ids', []);
        unset($facultyData['department_ids']);
        
        // Set department_id from the first selected department if any
        if (!empty($departmentIds)) {
            $facultyData['department_id'] = $departmentIds[0];
        }
        
        $faculty = Faculty::create($facultyData);
        
        // Attach departments if provided
        if (!empty($departmentIds)) {
            $faculty->departments()->attach($departmentIds);
        }

        return redirect()->route('admin.faculty.index')
                        ->with('success', 'Faculty member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::with('departments')->findOrFail($id);
        return view('admin.faculty.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = Faculty::with('departments')->findOrFail($id);
        $departments = Department::all();
        return view('admin.faculty.edit', compact('faculty', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faculty = Faculty::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:faculties,email,' . $faculty->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'employee_id' => 'required|string|unique:faculties,employee_id,' . $faculty->id,
            'department_id' => 'nullable|exists:departments,id',
            'department_ids' => 'nullable|array',
            'department_ids.*' => 'exists:departments,id',
            'designation' => 'nullable|string|max:255',
            'joining_date' => 'nullable|date',
            'qualification' => 'nullable|string',
            'specialization' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'is_active' => 'boolean',
        ]);

        $facultyData = $request->all();
        $departmentIds = $request->input('department_ids', []);
        unset($facultyData['department_ids']);
        
        // Set department_id from the first selected department if any
        if (!empty($departmentIds)) {
            $facultyData['department_id'] = $departmentIds[0];
        } else {
            $facultyData['department_id'] = null;
        }
        
        $faculty->update($facultyData);
        
        // Sync departments if provided
        if (!empty($departmentIds)) {
            $faculty->departments()->sync($departmentIds);
        } else {
            // If no departments provided, detach all
            $faculty->departments()->detach();
        }

        return redirect()->route('admin.faculty.index')
                        ->with('success', 'Faculty member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();

        return redirect()->route('admin.faculty.index')
                        ->with('success', 'Faculty member deleted successfully.');
    }
}
