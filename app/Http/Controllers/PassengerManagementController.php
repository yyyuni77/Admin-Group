<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassengerManagementController extends Controller
{
    public function index()
    {
        return view('passenger_management.index'); // Or return a response
    }
}
