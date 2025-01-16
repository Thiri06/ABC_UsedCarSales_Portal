<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\CarPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'car_id' => CarPost::factory(),
            'user_id' => User::factory(),
            'appointment_date' => $this->faker->date(),
            'appointment_time' => $this->faker->time(),
            'status' => 'pending',
        ];
    }
}
