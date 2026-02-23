<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        $departmentsCount = Department::count();
        $facultyCount = Faculty::count();
        $coursesCount = Course::count();
        $settingsCount = Setting::count();
        
        $recentDepartments = Department::latest()->take(5)->get();
        $recentFaculty = Faculty::latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'departmentsCount',
            'facultyCount',
            'coursesCount',
            'settingsCount',
            'recentDepartments',
            'recentFaculty'
        ));
    }
}
