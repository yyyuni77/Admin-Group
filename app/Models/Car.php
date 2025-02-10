<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $table = 'car';
    
    protected $fillable = [
        'driver_id',
        'LicenseNo',
        'CarModel',
        'CarColor',
        'CarPlate',
        'CarCapacity',
        'CarPlatRoadtax'
    ];

    public function driver(){
        return $this->belongsTo('App\Models\Driver', 'driver_id');
    }
}
