<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Fillable attributes
    protected $fillable = [
        'user_id',
        'car_id',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    // Relationships
    public function carPost()
    {
        return $this->belongsTo(CarPost::class, 'car_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
