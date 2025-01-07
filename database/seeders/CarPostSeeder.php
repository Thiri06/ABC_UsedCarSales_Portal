<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('car_posts')->insert([
            [
                'condition' => 'New',
                'make' => 'Toyota',
                'model' => 'Corolla',
                'registration_year' => 2023,
                'price' => 25000.00,
                'engine_power' => '180 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'Blue',
                'description' => 'Brand-new Toyota Corolla with excellent fuel efficiency.',
                'img_path' => 'car-images/toyota-corolla.jpg',
                'status' => 'available',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Used',
                'make' => 'Honda',
                'model' => 'Civic',
                'registration_year' => 2020,
                'price' => 18000.00,
                'engine_power' => '150 HP',
                'steering_position' => 'Right',
                'transmission' => 'Manual',
                'fuel_type' => 'Diesel',
                'color' => 'Black',
                'description' => 'Well-maintained Honda Civic with low mileage.',
                'img_path' => 'car-images/honda-civic.jpg',
                'status' => 'available',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Used',
                'make' => 'Ford',
                'model' => 'Mustang',
                'registration_year' => 2019,
                'price' => 30000.00,
                'engine_power' => '450 HP',
                'steering_position' => 'Left',
                'transmission' => 'Manual',
                'fuel_type' => 'Petrol',
                'color' => 'Silver',
                'description' => 'Classic Ford Mustang with high performance and great handling.',
                'img_path' => 'car-images/ford-mustang.jpg',
                'status' => 'available',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Add more sample data as needed
        ]);
    }
}
