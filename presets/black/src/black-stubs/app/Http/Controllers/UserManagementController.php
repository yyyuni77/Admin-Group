<?php

// In app/Http/Controllers/UserManagementController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('user_management'); // Return the view for the User Management page
    }
}
