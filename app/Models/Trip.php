<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'passenger_id',
        'pickup_location',
        'dropoff_location',
        'status',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }
}
