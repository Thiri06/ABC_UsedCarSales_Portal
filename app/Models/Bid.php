<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    // Fillable attributes
    protected $fillable = [
        'car_id',
        'user_id',
        'bid_amount',
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
