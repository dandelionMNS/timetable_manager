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
        Schema::create('assigned_classes', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('subject')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('instructor')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('location')->constrained('classrooms')->onDelete('cascade');
            $table->string('day');
            $table->time('time_start');
            $table->time('time_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned_classes');
    }
};
