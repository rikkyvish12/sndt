<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$contents = DB::table('department_contents')->where('section', 'gallery')->get();

foreach ($contents as $content) {
    echo "ID: " . $content->id . "\n";
    echo "Department ID: " . $content->department_id . "\n";
    echo "Section: " . $content->section . "\n";
    echo "Extra Data: " . $content->extra_data . "\n";
    echo "---\n";
}
