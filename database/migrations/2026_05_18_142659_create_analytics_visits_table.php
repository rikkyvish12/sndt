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
        Schema::create('analytics_visits', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->index(); // Unique session identifier
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('page_url');
            $table->string('page_title')->nullable();
            $table->string('referrer')->nullable();
            $table->string('device_type')->nullable(); // desktop, mobile, tablet
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->timestamp('started_at');
            $table->timestamp('last_activity_at');
            $table->integer('duration_seconds')->default(0);
            $table->integer('page_views_count')->default(0);
            $table->timestamps();
            
            // Indexes for faster queries
            $table->index('started_at');
            $table->index('device_type');
            $table->index('browser');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_visits');
    }
};
