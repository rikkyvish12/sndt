<?php
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Faculty;
use App\Models\Department;

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configure database
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => $_ENV['DB_CONNECTION'] ?? 'mysql',
    'host'      => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'port'      => $_ENV['DB_PORT'] ?? '3306',
    'database'  => $_ENV['DB_DATABASE'] ?? 'college_management',
    'username'  => $_ENV['DB_USERNAME'] ?? 'root',
    'password'  => $_ENV['DB_PASSWORD'] ?? '',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

echo "Connected to database successfully\n";

// Check if we have departments
$departments = Department::pluck('id', 'code');
echo "Found " . count($departments) . " departments\n";

if (count($departments) == 0) {
    echo "No departments found. Please seed departments first.\n";
    exit;
}

// Check if we already have faculty
$facultyCount = Faculty::count();
echo "Current faculty count: " . $facultyCount . "\n";

if ($facultyCount == 0) {
    echo "Seeding faculty data...\n";
    
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
        ]
    ]);
    
    echo "Faculty data seeded successfully\n";
    echo "New faculty count: " . Faculty::count() . "\n";
} else {
    echo "Faculty data already exists\n";
}