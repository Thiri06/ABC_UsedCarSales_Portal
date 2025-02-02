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
        // Disable foreign key checks temporarily
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate all related tables
        DB::table('bids')->truncate();
        DB::table('appointments')->truncate();
        DB::table('car_posts')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        DB::table('car_posts')->insert([
            // Toyota Posts
            // Toyota Posts
            [
                'condition' => 'Second Hand',
                'make' => 'Toyota',
                'model' => 'Corolla',
                'registration_year' => 2023,
                'price' => 25000.00,
                'engine_power' => '180 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'White',
                'description' => 'Well-maintained Toyota Corolla with excellent fuel efficiency.',
                'img_path' => 'car_images/toyota-corolla.jpg',
                'status' => 'available',
                'user_id' => 6,
                'views_count' => 10,
                'highest_bid' => 25000.00,
                'unavailable_dates' => json_encode(['2025-01-15', '2025-01-16', '2025-01-20', '2025-01-21']),
                'unavailable_times' => json_encode(['09:00-11:00', '14:00-16:00', '18:00-20:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Third Hand',
                'make' => 'Toyota',
                'model' => 'Camry',
                'registration_year' => 2021,
                'price' => 22000.00,
                'engine_power' => '200 HP',
                'steering_position' => 'Left',
                'transmission' => 'Automatic',
                'fuel_type' => 'Hybrid',
                'color' => 'Silver',
                'description' => 'Toyota Camry with hybrid technology and great condition.',
                'img_path' => 'car_images/toyota-camry.jpg',
                'status' => 'available',
                'user_id' => 5,
                'views_count' => 25,
                'highest_bid' => 22000.00,
                'unavailable_dates' => json_encode(['2025-02-01', '2025-02-02', '2025-02-03', '2025-02-04']),
                'unavailable_times' => json_encode(['10:00-12:00', '15:00-17:00', '19:00-21:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Second Hand',
                'make' => 'Toyota',
                'model' => 'Rav4',
                'registration_year' => 2023,
                'price' => 28000.00,
                'engine_power' => '210 HP',
                'steering_position' => 'Right',
                'transmission' => 'Automatic',
                'fuel_type' => 'Petrol',
                'color' => 'Red',
                'description' => 'Toyota Rav4 with advanced safety features.',
                'img_path' => 'car_images/toyota-rav4.jpg',
                'status' => 'available',
                'user_id' => 1,
                'views_count' => 22,
                'highest_bid' => 28000.00,
                'unavailable_dates' => json_encode(['2025-03-10', '2025-03-11', '2025-03-12']),
                'unavailable_times' => json_encode(['11:00-13:00', '16:00-18:00', '20:00-22:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Honda Posts
            [
                'condition' => 'Third Hand',
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
                'img_path' => 'car_images/honda-civic.jpg',
                'status' => 'available',
                'user_id' => 3,
                'views_count' => 45,
                'highest_bid' => 18000.00,
                'unavailable_dates' => json_encode(['2025-04-05', '2025-04-06', '2025-04-07']),
                'unavailable_times' => json_encode(['08:00-10:00', '13:00-15:00', '17:00-19:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Second Hand',
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
                'img_path' => 'car_images/honda-accord.jpg',
                'status' => 'available',
                'user_id' => 2,
                'views_count' => 38,
                'highest_bid' => 27000.00,
                'unavailable_dates' => json_encode(['2025-05-15', '2025-05-16', '2025-05-17']),
                'unavailable_times' => json_encode(['12:00-14:00', '16:00-18:00', '20:00-22:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Third Hand',
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
                'img_path' => 'car_images/honda-crv.jpg',
                'status' => 'available',
                'user_id' => 3,
                'views_count' => 50,
                'highest_bid' => 20000.00,
                'unavailable_dates' => json_encode(['2025-06-20', '2025-06-21', '2025-06-22']),
                'unavailable_times' => json_encode(['09:00-11:00', '14:00-16:00', '18:00-20:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // BMW Posts
            [
                'condition' => 'Second Hand',
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
                'img_path' => 'car_images/bmw-x5.jpg',
                'status' => 'available',
                'user_id' => 4,
                'views_count' => 60,
                'highest_bid' => 60000.00,
                'unavailable_dates' => json_encode(['2025-07-01', '2025-07-02', '2025-07-03']),
                'unavailable_times' => json_encode(['10:00-12:00', '15:00-17:00', '19:00-21:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Third Hand',
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
                'img_path' => 'car_images/bmw-3series.jpg',
                'status' => 'available',
                'user_id' => 4,
                'views_count' => 55,
                'highest_bid' => 40000.00,
                'unavailable_dates' => json_encode(['2025-08-10', '2025-08-11', '2025-08-12']),
                'unavailable_times' => json_encode(['11:00-13:00', '16:00-18:00', '20:00-22:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Second Hand',
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
                'img_path' => 'car_images/bmw-x3.jpg',
                'status' => 'available',
                'user_id' => 6,
                'views_count' => 70,
                'highest_bid' => 52000.00,
                'unavailable_dates' => json_encode(['2025-09-15', '2025-09-16', '2025-09-17']),
                'unavailable_times' => json_encode(['08:00-10:00', '13:00-15:00', '17:00-19:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Ford Posts
            [
                'condition' => 'Third Hand',
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
                'img_path' => 'car_images/ford-mustang.jpg',
                'status' => 'available',
                'user_id' => 5,
                'views_count' => 50,
                'highest_bid' => 20000.00,
                'unavailable_dates' => json_encode(['2025-10-20', '2025-10-21', '2025-10-22']),
                'unavailable_times' => json_encode(['12:00-14:00', '16:00-18:00', '20:00-22:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Second Hand',
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
                'img_path' => 'car_images/ford-mustang2.jpg',
                'status' => 'available',
                'user_id' => 2,
                'views_count' => 65,
                'highest_bid' => 45000.00,
                'unavailable_dates' => json_encode(['2025-11-05', '2025-11-06', '2025-11-07']),
                'unavailable_times' => json_encode(['09:00-11:00', '14:00-16:00', '18:00-20:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'condition' => 'Third Hand',
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
                'img_path' => 'car_images/ford-explorer.jpg',
                'status' => 'available',
                'user_id' => 7,
                'views_count' => 85,
                'highest_bid' => 35000.00,
                'unavailable_dates' => json_encode(['2025-12-15', '2025-12-16', '2025-12-17']),
                'unavailable_times' => json_encode(['10:00-12:00', '15:00-17:00', '19:00-21:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
