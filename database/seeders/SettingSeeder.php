<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            // Site Information
            [
                'key' => 'site_name',
                'value' => 'PVPSNDT College',
                'group' => 'general',
                'type' => 'string',
                'description' => 'Name of the college/institution',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Excellence in Education',
                'group' => 'general',
                'type' => 'string',
                'description' => 'Tagline or slogan of the institution',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_email',
                'value' => 'info@pvpsndt.edu',
                'group' => 'general',
                'type' => 'string',
                'description' => 'Official email address',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_phone',
                'value' => '+1-234-567-8900',
                'group' => 'general',
                'type' => 'string',
                'description' => 'Contact phone number',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_address',
                'value' => '123 College Street, University City, State 12345',
                'group' => 'general',
                'type' => 'string',
                'description' => 'Physical address of the institution',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Academic Settings
            [
                'key' => 'academic_session_start_month',
                'value' => '8',
                'group' => 'academic',
                'type' => 'integer',
                'description' => 'Month when academic session starts (1-12)',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'academic_session_end_month',
                'value' => '5',
                'group' => 'academic',
                'type' => 'integer',
                'description' => 'Month when academic session ends (1-12)',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'default_grading_system',
                'value' => 'GPA',
                'group' => 'academic',
                'type' => 'string',
                'description' => 'Default grading system (GPA, Percentage, Letter)',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Admission Settings
            [
                'key' => 'admission_open',
                'value' => '1',
                'group' => 'admission',
                'type' => 'boolean',
                'description' => 'Whether admission is currently open',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'admission_start_date',
                'value' => '2026-01-01',
                'group' => 'admission',
                'type' => 'string',
                'description' => 'Admission process start date',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'admission_end_date',
                'value' => '2026-06-30',
                'group' => 'admission',
                'type' => 'string',
                'description' => 'Admission process end date',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // System Settings
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'group' => 'system',
                'type' => 'boolean',
                'description' => 'Enable/disable maintenance mode',
                'is_editable' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'timezone',
                'value' => 'UTC',
                'group' => 'system',
                'type' => 'string',
                'description' => 'Default timezone for the application',
                'is_editable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
