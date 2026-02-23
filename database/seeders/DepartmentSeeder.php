<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            [
                'name' => 'Computer Science & Engineering',
                'code' => 'CSE',
                'description' => 'Department of Computer Science and Engineering offering undergraduate and postgraduate programs.',
                'head_name' => 'Dr. John Smith',
                'email' => 'cse@college.edu',
                'phone' => '+1-234-567-8901',
                'location' => 'Building A, Floor 2',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Electrical Engineering',
                'code' => 'EE',
                'description' => 'Department of Electrical Engineering with specialization in power systems and electronics.',
                'head_name' => 'Dr. Sarah Johnson',
                'email' => 'ee@college.edu',
                'phone' => '+1-234-567-8902',
                'location' => 'Building B, Floor 1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mechanical Engineering',
                'code' => 'ME',
                'description' => 'Department of Mechanical Engineering focusing on design and manufacturing.',
                'head_name' => 'Dr. Michael Brown',
                'email' => 'me@college.edu',
                'phone' => '+1-234-567-8903',
                'location' => 'Building C, Floor 3',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business Administration',
                'code' => 'BA',
                'description' => 'Department of Business Administration offering MBA and undergraduate business programs.',
                'head_name' => 'Dr. Emily Davis',
                'email' => 'ba@college.edu',
                'phone' => '+1-234-567-8904',
                'location' => 'Building D, Floor 1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Arts & Humanities',
                'code' => 'AH',
                'description' => 'Department of Arts and Humanities including Literature, History, and Languages.',
                'head_name' => 'Dr. Robert Wilson',
                'email' => 'ah@college.edu',
                'phone' => '+1-234-567-8905',
                'location' => 'Building E, Floor 2',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
