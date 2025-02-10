<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFeedbackController extends Controller
{
    public function index()
    {
        return view('user-feedback'); // Return the view for the User Management page
    }
}
