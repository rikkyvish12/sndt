<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Support\Facades\File;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource with optional search.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $faculty = Faculty::with('departments')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('employee_id', 'like', "%{$search}%")
                      ->orWhere('designation', 'like', "%{$search}%");
                });
            })
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('admin.faculty.index', compact('faculty', 'search'));
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
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:faculties,email',
            'phone'            => 'nullable|string|max:20',
            'date_of_birth'    => 'nullable|date',
            'employee_id'      => 'required|string|unique:faculties,employee_id',
            'department_id'    => 'nullable|exists:departments,id',
            'department_ids'   => 'nullable|array',
            'department_ids.*' => 'exists:departments,id',
            'designation'      => 'nullable|string|max:255',
            'joining_date'     => 'nullable|date',
            'qualification'    => 'nullable|string',
            'specialization'   => 'nullable|string',
            'address'          => 'nullable|string',
            'city'             => 'nullable|string|max:100',
            'state'            => 'nullable|string|max:100',
            'postal_code'      => 'nullable|string|max:20',
            'country'          => 'nullable|string|max:100',
            'is_active'        => 'boolean',
            'photo'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $facultyData   = $request->except(['department_ids', 'photo']);
        $departmentIds = $request->input('department_ids', []);

        // Set department_id from the first selected department if any
        if (!empty($departmentIds)) {
            $facultyData['department_id'] = $departmentIds[0];
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('faculty'), $filename);
            $facultyData['photo'] = 'faculty/' . $filename;
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
        $faculty     = Faculty::with('departments')->findOrFail($id);
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
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|email|unique:faculties,email,' . $faculty->id,
            'phone'            => 'nullable|string|max:20',
            'date_of_birth'    => 'nullable|date',
            'employee_id'      => 'required|string|unique:faculties,employee_id,' . $faculty->id,
            'department_id'    => 'nullable|exists:departments,id',
            'department_ids'   => 'nullable|array',
            'department_ids.*' => 'exists:departments,id',
            'designation'      => 'nullable|string|max:255',
            'joining_date'     => 'nullable|date',
            'qualification'    => 'nullable|string',
            'specialization'   => 'nullable|string',
            'address'          => 'nullable|string',
            'city'             => 'nullable|string|max:100',
            'state'            => 'nullable|string|max:100',
            'postal_code'      => 'nullable|string|max:20',
            'country'          => 'nullable|string|max:100',
            'is_active'        => 'boolean',
            'photo'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $facultyData   = $request->except(['department_ids', 'photo', '_token', '_method']);
        $departmentIds = $request->input('department_ids', []);

        // Set department_id from the first selected department if any,
        // otherwise keep the existing value (column is NOT NULL in DB)
        if (!empty($departmentIds)) {
            $facultyData['department_id'] = $departmentIds[0];
        } else {
            $facultyData['department_id'] = $faculty->department_id;
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($faculty->photo && File::exists(public_path($faculty->photo))) {
                File::delete(public_path($faculty->photo));
            }
            $image = $request->file('photo');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('faculty'), $filename);
            $facultyData['photo'] = 'faculty/' . $filename;
        }

        $faculty->update($facultyData);

        // Sync departments if provided
        if (!empty($departmentIds)) {
            $faculty->departments()->sync($departmentIds);
        } else {
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

        // Delete photo if exists
        if ($faculty->photo && File::exists(public_path($faculty->photo))) {
            File::delete(public_path($faculty->photo));
        }

        $faculty->delete();

        return redirect()->route('admin.faculty.index')
                         ->with('success', 'Faculty member deleted successfully.');
    }
}
