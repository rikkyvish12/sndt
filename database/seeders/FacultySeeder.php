<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faculty;
use App\Models\Department;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::pluck('id', 'code');
        
        Faculty::insert([
            [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@college.edu',
                'phone' => '+1-234-567-0001',
                'date_of_birth' => '1980-05-15',
                'employee_id' => 'EMP001',
                'department_id' => $departments['CSE'],
                'designation' => 'Professor',
                'joining_date' => '2015-08-01',
                'qualification' => 'PhD in Computer Science',
                'specialization' => 'Artificial Intelligence, Machine Learning',
                'address' => '123 University Street',
                'city' => 'College City',
                'state' => 'State',
                'postal_code' => '12345',
                'country' => 'Country',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Johnson',
                'email' => 'sarah.johnson@college.edu',
                'phone' => '+1-234-567-0002',
                'date_of_birth' => '1982-09-22',
                'employee_id' => 'EMP002',
                'department_id' => $departments['EE'],
                'designation' => 'Associate Professor',
                'joining_date' => '2016-01-15',
                'qualification' => 'PhD in Electrical Engineering',
                'specialization' => 'Power Systems, Electronics',
                'address' => '456 College Avenue',
                'city' => 'College City',
                'state' => 'State',
                'postal_code' => '12345',
                'country' => 'Country',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'email' => 'michael.brown@college.edu',
                'phone' => '+1-234-567-0003',
                'date_of_birth' => '1978-12-10',
                'employee_id' => 'EMP003',
                'department_id' => $departments['ME'],
                'designation' => 'Professor',
                'joining_date' => '2014-03-20',
                'qualification' => 'PhD in Mechanical Engineering',
                'specialization' => 'Thermodynamics, Fluid Mechanics',
                'address' => '789 Campus Road',
                'city' => 'College City',
                'state' => 'State',
                'postal_code' => '12345',
                'country' => 'Country',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Davis',
                'email' => 'emily.davis@college.edu',
                'phone' => '+1-234-567-0004',
                'date_of_birth' => '1985-03-08',
                'employee_id' => 'EMP004',
                'department_id' => $departments['BA'],
                'designation' => 'Assistant Professor',
                'joining_date' => '2018-07-10',
                'qualification' => 'MBA, PhD in Business Administration',
                'specialization' => 'Marketing, Business Strategy',
                'address' => '321 University Drive',
                'city' => 'College City',
                'state' => 'State',
                'postal_code' => '12345',
                'country' => 'Country',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Wilson',
                'email' => 'robert.wilson@college.edu',
                'phone' => '+1-234-567-0005',
                'date_of_birth' => '1975-11-30',
                'employee_id' => 'EMP005',
                'department_id' => $departments['AH'],
                'designation' => 'Professor',
                'joining_date' => '2012-09-01',
                'qualification' => 'PhD in English Literature',
                'specialization' => 'American Literature, Creative Writing',
                'address' => '654 Academic Lane',
                'city' => 'College City',
                'state' => 'State',
                'postal_code' => '12345',
                'country' => 'Country',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
