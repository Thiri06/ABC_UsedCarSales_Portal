<?php

namespace Database\Factories;

use App\Models\Bid;
use App\Models\CarPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BidFactory extends Factory
{
    protected $model = Bid::class;

    public function definition()
    {
        return [
            'car_id' => CarPost::factory(),
            'user_id' => User::factory(),
            'bid_amount' => $this->faker->randomFloat(2, 1000, 50000),
            'status' => 'pending',
        ];
    }
}
