<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RideManagementController extends Controller
{
    public function index()
    {
        return view('ride_management.index'); // Return the view for the User Management page
    }
}
