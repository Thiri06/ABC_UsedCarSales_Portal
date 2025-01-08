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
        Schema::create('car_posts', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('condition'); // New or Used
            $table->string('make'); // Car Brand
            $table->string('model'); // Car Model
            $table->year('registration_year'); // Registration Year
            $table->decimal('price', 10, 2); // Price with 2 decimals
            $table->string('engine_power'); // Engine Power (e.g., "150 HP")
            $table->string('steering_position'); // Left or Right
            $table->string('transmission'); // Automatic or Manual
            $table->string('fuel_type'); // Petrol, Diesel, Electric
            $table->string('color'); // Car Color
            $table->text('description'); // Description
            $table->string('img_path'); // Image file path
            $table->string('status')->default('available'); // Available or Sold
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK referencing 'users' table
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_posts');
    }
};
