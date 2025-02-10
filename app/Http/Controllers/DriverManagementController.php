<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverManagementController extends Controller
{
    public function index()
    {
        return view('driver_management.index'); // Or return a response
    }
}
