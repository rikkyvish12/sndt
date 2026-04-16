<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Department;

$dept = Department::create([
    'name' => 'Jewellery Designing Degree (B. Voc.)',
    'code' => 'JDM',
    'description' => 'Bachelor of Vocation (B. Voc.) in Jewellery Design & Manufacture - A skill-based vocational degree program focused on jewellery design and manufacturing.',
    'email' => 'hod.jdm@pvp.sndt.ac.in',
    'phone' => '9821304258',
    'location' => 'P.V. Polytechnic Building, III rd Floor, Juhu Tara Road Santacruz (West) Mumbai',
    'is_active' => true
]);

echo "Created Jewellery Designing Department with ID: " . $dept->id . "\n";
