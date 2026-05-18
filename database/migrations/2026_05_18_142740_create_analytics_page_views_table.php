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
        Schema::create('analytics_page_views', function (Blueprint $table) {
            $table->id();
            $table->string('session_id'); // Link to visit session
            $table->string('page_url');
            $table->string('page_title')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referrer')->nullable();
            $table->string('device_type')->nullable();
            $table->string('browser')->nullable();
            $table->timestamp('viewed_at');
            $table->integer('time_on_page_seconds')->default(0);
            $table->timestamps();
            
            // Indexes for faster queries
            $table->index('viewed_at');
            $table->index('page_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_page_views');
    }
};
