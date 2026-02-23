<?php
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Setting;

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

echo "Connected to database successfully\n\n";

// Test data counts
echo "=== DATA COUNTS ===\n";
echo "Departments: " . Department::count() . "\n";
echo "Faculty: " . Faculty::count() . "\n";
echo "Courses: " . Course::count() . "\n";
echo "Settings: " . Setting::count() . "\n\n";

// Test faculty data
echo "=== FACULTY DATA ===\n";
$faculty = Faculty::with('department')->take(3)->get();
foreach($faculty as $member) {
    echo "ID: {$member->id} | Name: {$member->first_name} {$member->last_name} | Department: {$member->department->name}\n";
}
echo "\n";

// Test course data
echo "=== COURSE DATA ===\n";
$courses = Course::with('department')->take(3)->get();
foreach($courses as $course) {
    echo "ID: {$course->id} | Code: {$course->code} | Name: {$course->name} | Department: {$course->department->name}\n";
}
echo "\n";

// Test settings data
echo "=== SETTINGS DATA ===\n";
$settings = Setting::take(3)->get();
foreach($settings as $setting) {
    echo "ID: {$setting->id} | Key: {$setting->key} | Value: " . substr($setting->value, 0, 50) . "...\n";
}
echo "\n";

echo "All tests completed successfully!\n";