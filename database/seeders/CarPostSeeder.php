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
<<<<<<< HEAD
        DB::table('car_posts')->truncate();

        DB::table('car_posts')->insert([
            // Toyota Posts
=======
        DB::table('car_posts')->insert([
>>>>>>> 2dcf11d6a40bb4a8d2491c78982a541d3e8247eb
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
<<<<<<< HEAD
                'color' => 'White',
=======
                'color' => 'Blue',
>>>>>>> 2dcf11d6a40bb4a8d2491c78982a541d3e8247eb
                'description' => 'Brand-new Toyota Corolla with excellent fuel efficiency.',
                'img_path' => 'car-images/toyota-corolla.jpg',
                'status' => 'available',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Used',
<<<<<<< HEAD
                'make' => 'Toyota',
                'model' => 'Camry',
                'registration_year' => 2021,
                'price' => 22000.00,
                'engine_power' => '200 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Hybrid',
                'color' => 'Silver',
                'description' => 'Toyota Camry in great condition with hybrid technology.',
                'img_path' => 'car-images/toyota-camry.jpg',
                'status' => 'available',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'New',
                'make' => 'Toyota',
                'model' => 'Rav4',
                'registration_year' => 2023,
                'price' => 28000.00,
                'engine_power' => '210 HP',
                'steering_position' => 'Right',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'Red',
                'description' => 'New Toyota Rav4 with advanced safety features.',
                'img_path' => 'car-images/toyota-rav4.jpg',
                'status' => 'available',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Honda Posts
            [
                'condition' => 'Used',
=======
>>>>>>> 2dcf11d6a40bb4a8d2491c78982a541d3e8247eb
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
<<<<<<< HEAD
                'condition' => 'New',
                'make' => 'Honda',
                'model' => 'Accord',
                'registration_year' => 2022,
                'price' => 27000.00,
                'engine_power' => '200 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'Gray',
                'description' => 'Honda Accord with spacious interiors and powerful engine.',
                'img_path' => 'car-images/honda-accord.jpg',
                'status' => 'available',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Used',
                'make' => 'Honda',
                'model' => 'CR-V',
                'registration_year' => 2019,
                'price' => 20000.00,
                'engine_power' => '190 HP',
                'steering_position' => 'Right',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'Blue',
                'description' => 'Well-maintained Honda CR-V with excellent performance.',
                'img_path' => 'car-images/honda-crv.jpg',
                'status' => 'available',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // BMW Posts
            [
                'condition' => 'New',
                'make' => 'BMW',
                'model' => 'X5',
                'registration_year' => 2023,
                'price' => 60000.00,
                'engine_power' => '300 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Diesel',
                'color' => 'Black',
                'description' => 'Luxury BMW X5 with top-notch performance and design.',
                'img_path' => 'car-images/bmw-x5.jpg',
                'status' => 'available',
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Used',
                'make' => 'BMW',
                'model' => '3 Series',
                'registration_year' => 2021,
                'price' => 40000.00,
                'engine_power' => '250 HP',
                'steering_position' => 'Right',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'White',
                'description' => 'BMW 3 Series with smooth driving and premium features.',
                'img_path' => 'car-images/bmw-3series.jpg',
                'status' => 'available',
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'New',
                'make' => 'BMW',
                'model' => 'X3',
                'registration_year' => 2022,
                'price' => 52000.00,
                'engine_power' => '280 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Hybrid',
                'color' => 'Gray',
                'description' => 'BMW X3 with hybrid technology and stunning design.',
                'img_path' => 'car-images/bmw-x3.jpg',
                'status' => 'available',
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Ford Posts
            [
                'condition' => 'New',
                'make' => 'Ford',
                'model' => 'Mustang',
                'registration_year' => 2022,
                'price' => 20000.00,
                'engine_power' => '160 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'Silver',
                'description' => 'Ford Mustang with advanced safety features.',
=======
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
>>>>>>> 2dcf11d6a40bb4a8d2491c78982a541d3e8247eb
                'img_path' => 'car-images/ford-mustang.jpg',
                'status' => 'available',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
<<<<<<< HEAD
            [
                'condition' => 'New',
                'make' => 'Ford',
                'model' => 'Mustang',
                'registration_year' => 2022,
                'price' => 45000.00,
                'engine_power' => '450 HP',
                'steering_position' => 'Left',
                'transmission' => 'Manual',
                'fuel_type' => 'Petrol',
                'color' => 'Red',
                'description' => 'Powerful Ford Mustang with sleek design and features.',
                'img_path' => 'car-images/ford-mustang2.jpg',
                'status' => 'available',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Used',
                'make' => 'Ford',
                'model' => 'Explorer',
                'registration_year' => 2020,
                'price' => 35000.00,
                'engine_power' => '300 HP',
                'steering_position' => 'Right',
                'transmission' => 'Automatic',
                'fuel_type' => 'Diesel',
                'color' => 'Black',
                'description' => 'Ford Explorer with spacious interior and great performance.',
                'img_path' => 'car-images/ford-explorer.jpg',
                'status' => 'available',
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'New',
                'make' => 'Ford',
                'model' => 'F-150',
                'registration_year' => 2023,
                'price' => 50000.00,
                'engine_power' => '400 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'Blue',
                'description' => 'New Ford F-150 with unmatched power and reliability.',
                'img_path' => 'car-images/ford-f150.jpg',
                'status' => 'available',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
=======

            // Add more sample data as needed
>>>>>>> 2dcf11d6a40bb4a8d2491c78982a541d3e8247eb
        ]);
    }
}
