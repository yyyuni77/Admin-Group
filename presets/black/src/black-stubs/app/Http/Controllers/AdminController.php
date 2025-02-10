<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login'); // Make sure the view exists
    }

    public function register()
    {
        return view('admin.register'); // Make sure the view exists
    }
}
