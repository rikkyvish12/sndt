<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;
use App\Models\Faculty;

class PublicController extends Controller
{
    public function index()
    {
        $departments = Department::where('is_active', true)
            ->withCount(['faculty', 'courses'])
            ->limit(6)
            ->get();
            
        $courses = Course::where('is_active', true)
            ->with('department')
            ->limit(6)
            ->get();
            
        $faculty = Faculty::where('is_active', true)
            ->with('department')
            ->limit(6)
            ->get();
            
        return view('public.welcome', compact('departments', 'courses', 'faculty'));
    }
    
    public function about()
    {
        $departments = Department::where('is_active', true)->count();
        $facultyCount = Faculty::where('is_active', true)->count();
        $coursesCount = Course::where('is_active', true)->count();
        
        return view('public.about', compact('departments', 'facultyCount', 'coursesCount'));
    }
    
    public function contact()
    {
        return view('public.contact');
    }
    
    public function department($code)
    {
        $department = Department::where('code', strtoupper($code))
            ->where('is_active', true)
            ->with(['faculty', 'courses'])
            ->firstOrFail();
            
        $departments = Department::where('is_active', true)->count();
        $facultyCount = Faculty::where('is_active', true)->count();
        $coursesCount = Course::where('is_active', true)->count();
        
        return view('public.department', compact('department', 'departments', 'facultyCount', 'coursesCount'));
    }
}