<?php
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

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

// Check if table exists
if (Capsule::schema()->hasTable('faculties')) {
    echo "Table 'faculties' already exists\n";
} else {
    echo "Creating 'faculties' table...\n";
    
    Capsule::schema()->create('faculties', function($table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->date('date_of_birth')->nullable();
        $table->string('employee_id')->unique();
        $table->unsignedBigInteger('department_id');
        $table->string('designation')->nullable();
        $table->date('joining_date')->nullable();
        $table->text('qualification')->nullable();
        $table->text('specialization')->nullable();
        $table->string('address')->nullable();
        $table->string('city')->nullable();
        $table->string('state')->nullable();
        $table->string('postal_code')->nullable();
        $table->string('country')->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
        
        $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
    });
    
    echo "Table 'faculties' created successfully\n";
}