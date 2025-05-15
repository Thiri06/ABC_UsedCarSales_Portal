<?php

namespace Database\Factories;

use App\Models\CarPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarPostFactory extends Factory
{
    protected $model = CarPost::class;

    public function definition()
    {
        return [
            'condition' => $this->faker->randomElement(['Second Hand', 'Third Hand']),
            'make' => $this->faker->company,
            'model' => $this->faker->word,
            'registration_year' => $this->faker->year,
            'price' => $this->faker->randomFloat(2, 5000, 50000),
            'engine_power' => $this->faker->randomElement(['150 HP', '200 HP', '250 HP']),
            'steering_position' => $this->faker->randomElement(['Left', 'Right']),
            'transmission' => $this->faker->randomElement(['Automatic', 'Manual']),
            'fuel_type' => $this->faker->randomElement(['Petrol', 'Diesel', 'Electric']),
            'color' => $this->faker->safeColorName,
            'description' => $this->faker->paragraph,
            'img_path' => 'path/to/image.jpg',
            'status' => 'available',
            'views_count' => $this->faker->numberBetween(0, 1000),
            'highest_bid' => $this->faker->randomFloat(2, 0, 50000),
            'unavailable_dates' => json_encode([]),
            'unavailable_times' => json_encode([]),
            'user_id' => User::factory(), // Creates a related user
        ];
    }
}
