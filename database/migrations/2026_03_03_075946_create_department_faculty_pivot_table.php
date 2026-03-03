<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the pivot table for many-to-many relationship between departments and faculties
        Schema::create('department_faculty', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('faculty_id');
            $table->timestamps();
            
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
        });
        
        // Modify the departments table to add a head_of_department_id column instead of head_name
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedBigInteger('head_of_department_id')->nullable()->after('head_name');
            $table->foreign('head_of_department_id')->references('id')->on('faculties')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['head_of_department_id']);
            $table->dropColumn('head_of_department_id');
        });
        
        Schema::dropIfExists('department_faculty');
    }
};
