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
        $faculty = Faculty::with('department')->paginate(10);
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
            'department_id' => 'required|exists:departments,id',
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

        Faculty::create($request->all());

        return redirect()->route('admin.faculty.index')
                        ->with('success', 'Faculty member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::with('department')->findOrFail($id);
        return view('admin.faculty.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = Faculty::findOrFail($id);
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
            'department_id' => 'required|exists:departments,id',
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

        $faculty->update($request->all());

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
