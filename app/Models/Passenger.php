<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Passenger extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fullname',
        'gender',
        'student_id',
        'phone',
        'email',
        'password',
        'student_card',
        'is_verified',
        'is_suspended',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_suspended' => 'boolean',
    ];

    // Mutator: Hash password automatically when setting it
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

}

