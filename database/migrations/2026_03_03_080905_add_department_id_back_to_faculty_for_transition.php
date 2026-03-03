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
        // Add back the department_id column for backward compatibility
        Schema::table('faculties', function (Blueprint $table) {
            if (!Schema::hasColumn('faculties', 'department_id')) {
                $table->unsignedBigInteger('department_id')->nullable()->after('employee_id');
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faculties', function (Blueprint $table) {
            if (Schema::hasColumn('faculties', 'department_id')) {
                $table->dropForeign(['department_id']);
                $table->dropColumn('department_id');
            }
        });
    }
};
