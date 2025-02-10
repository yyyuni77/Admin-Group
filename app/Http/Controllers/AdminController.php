<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login'); // Make sure the view exists
    }

    public function register(Request $request)
    {
        return view('admin.register'); // Make sure the view exists
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Admin registered successfully!', 'admin' => $admin]);
    }

    public function userManagement() {
        $users = User::all(); // Assuming you have a User model
        return view('admin.user_management', compact('users'));
    }
    
}
