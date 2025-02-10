<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RideManagementController extends Controller
{
    public function index()
    {
        return view('ride-management'); // Return the view for the User Management page
    }
}
