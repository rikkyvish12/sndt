<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\DepartmentContent;
use App\Models\Announcement;

class PublicController extends Controller
{
    public function index()
    {
        $departments = Department::where('is_active', true)
            ->with(['headOfDepartment'])
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
            
        $announcements = Announcement::getActiveAnnouncements();
            
        return view('public.welcome', compact('departments', 'courses', 'faculty', 'announcements'));
    }
    
    public function about()
    {
        $departments = Department::where('is_active', true)->count();
        $facultyCount = Faculty::where('is_active', true)->count();
        $coursesCount = Course::where('is_active', true)->count();
        
        $announcements = Announcement::getActiveAnnouncements();
        
        return view('public.about', compact('departments', 'facultyCount', 'coursesCount', 'announcements'));
    }
    
    public function contact()
    {
        $announcements = Announcement::getActiveAnnouncements();
        
        return view('public.contact', compact('announcements'));
    }
    
    public function department($code)
    {
        $department = Department::where('code', strtoupper($code))
            ->where('is_active', true)
            ->with(['faculty', 'courses', 'contents', 'headOfDepartment'])
            ->firstOrFail();
            
        // Get dynamic content for each section, ordered by 'order' field
        $dynamicContents = [];
        $orderedContents = $department->contents()
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
            
        foreach ($orderedContents as $content) {
            $dynamicContents[$content->section] = $content;
        }
        
        $departments = Department::where('is_active', true)->count();
        $facultyCount = Faculty::where('is_active', true)->count();
        $coursesCount = Course::where('is_active', true)->count();
        
        $announcements = Announcement::getActiveAnnouncements();
        
        return view('public.department', compact('department', 'departments', 'facultyCount', 'coursesCount', 'dynamicContents', 'announcements'));
    }

    public function course($id)
    {
        $course = Course::where('id', $id)
            ->where('is_active', true)
            ->with('department')
            ->firstOrFail();
            
        $departments = Department::where('is_active', true)->count();
        $facultyCount = Faculty::where('is_active', true)->count();
        $coursesCount = Course::where('is_active', true)->count();
        
        $announcements = Announcement::getActiveAnnouncements();
        
        return view('public.course', compact('course', 'departments', 'facultyCount', 'coursesCount', 'announcements'));
    }
}