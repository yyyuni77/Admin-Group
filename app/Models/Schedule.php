<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public $table = 'Schedule';
    
    protected $fillable = [
        'AvailableTime',
        'Date',
    ];
}
