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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->foreignId('car_id')->constrained('car_posts')->onDelete('cascade'); // FK referencing 'car_posts' table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK referencing 'users' table
            $table->date('appointment_date'); // Appointment date
            $table->time('appointment_time'); // Appointment time
            $table->string('status')->default('pending'); // Status: pending, accepted, rejected
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
