<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Department;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::pluck('id', 'code');
        
        Course::insert([
            [
                'name' => 'Bachelor of Technology in Computer Science',
                'code' => 'B.Tech-CSE',
                'description' => '4-year undergraduate program in Computer Science and Engineering',
                'department_id' => $departments['CSE'],
                'course_type' => 'undergraduate',
                'duration' => 4,
                'fees' => 50000.00,
                'total_seats' => 120,
                'available_seats' => 120,
                'start_date' => '2026-08-01',
                'end_date' => '2030-05-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Master of Technology in Computer Science',
                'code' => 'M.Tech-CSE',
                'description' => '2-year postgraduate program in Computer Science and Engineering',
                'department_id' => $departments['CSE'],
                'course_type' => 'postgraduate',
                'duration' => 2,
                'fees' => 75000.00,
                'total_seats' => 60,
                'available_seats' => 60,
                'start_date' => '2026-08-01',
                'end_date' => '2028-05-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bachelor of Technology in Electrical Engineering',
                'code' => 'B.Tech-EE',
                'description' => '4-year undergraduate program in Electrical Engineering',
                'department_id' => $departments['EE'],
                'course_type' => 'undergraduate',
                'duration' => 4,
                'fees' => 45000.00,
                'total_seats' => 100,
                'available_seats' => 100,
                'start_date' => '2026-08-01',
                'end_date' => '2030-05-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bachelor of Technology in Mechanical Engineering',
                'code' => 'B.Tech-ME',
                'description' => '4-year undergraduate program in Mechanical Engineering',
                'department_id' => $departments['ME'],
                'course_type' => 'undergraduate',
                'duration' => 4,
                'fees' => 45000.00,
                'total_seats' => 100,
                'available_seats' => 100,
                'start_date' => '2026-08-01',
                'end_date' => '2030-05-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Master of Business Administration',
                'code' => 'MBA',
                'description' => '2-year postgraduate program in Business Administration',
                'department_id' => $departments['BA'],
                'course_type' => 'postgraduate',
                'duration' => 2,
                'fees' => 80000.00,
                'total_seats' => 80,
                'available_seats' => 80,
                'start_date' => '2026-08-01',
                'end_date' => '2028-05-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bachelor of Arts in English Literature',
                'code' => 'BA-English',
                'description' => '3-year undergraduate program in English Literature',
                'department_id' => $departments['AH'],
                'course_type' => 'undergraduate',
                'duration' => 3,
                'fees' => 25000.00,
                'total_seats' => 60,
                'available_seats' => 60,
                'start_date' => '2026-08-01',
                'end_date' => '2029-05-31',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
