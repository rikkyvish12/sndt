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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type'); // event, announcement, system_log, etc.
            $table->unsignedBigInteger('related_id')->nullable(); // ID of related entity
            $table->string('related_type')->nullable(); // Model type of related entity
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default('pending'); // pending, active, completed, cancelled
            $table->unsignedBigInteger('created_by')->nullable(); // user ID who created the activity
            $table->boolean('is_public')->default(true);
            $table->timestamps();
            
            $table->index(['related_id', 'related_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
