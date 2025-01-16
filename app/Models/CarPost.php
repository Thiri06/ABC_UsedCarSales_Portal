<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarPost extends Model
{
    use HasFactory;

    // Specify table name if it's not 'car_posts'
    protected $table = 'car_posts';

    // Specify fillable attributes
    protected $fillable = [
        'condition',
        'make',
        'model',
        'registration_year',
        'price',
        'engine_power',
        'steering_position',
        'transmission',
        'fuel_type',
        'color',
        'description',
        'img_path',
        'status',
        'user_id',
        'views_count',
        'highest_bid',
        'unavailable_dates',
        'unavailable_times',
    ];
    // Casts for JSON fields
    protected $casts = [
        'unavailable_dates' => 'array',
        'unavailable_times' => 'array',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, 'car_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'car_id');
    }
}
