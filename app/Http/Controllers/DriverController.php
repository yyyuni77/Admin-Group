<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class DriverController extends Controller
{
    public function showLoginForm() {
        return view('driver_management.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('driver')->attempt($credentials)) {
            return redirect()->route('driver.dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegisterForm() {
        return view('driver_management.register');
    }

    public function register(Request $request) {
        // Registration logic for driver
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:drivers',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $driver = Driver::create([
            'fullname' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('driver')->login($driver); // Log in the driver

        return redirect()->route('driver.dashboard')->with('success', 'Registration successful!');
    }
    
    // Show driver dashboard
    public function dashboard()
    {
        return view('driver_management.dashboard');
    }

    // Handle logout
    public function logout()
    {
        Auth::guard('driver')->logout();
        return redirect()->route('driver.login')->with('success', 'Logged out successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('driver_management.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('driver_management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'gender' => 'required',
            'student_id' => 'required|unique:drivers',
            'email' => 'required|email|unique:drivers',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);
    
        Log::info('Validated Data:', $validatedData); // Debugging
    
        $driver = Driver::create([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'student_id' => $request->student_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        Log::info('Driver Created:', $driver->toArray());
        return redirect()->route('drivers.index')->with('success', 'Driver Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        return view('driver_management.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('driver_management.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'fullname' => 'required',
            'gender' => 'required',
            'student_id' => 'required|unique:drivers,student_id,' . $driver->id,
            'email' => 'required|email|unique:drivers,email,' . $driver->id,
            'phone' => 'required',
        ]);

        $driver->update([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'student_id' => $request->student_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully.');
    }

    public function suspend($id)
{
    $driver = Driver::findOrFail($id);
    $driver->status = ($driver->status === 'active') ? 'suspended' : 'active';
    $driver->save();

    return redirect()->route('drivers.index')->with('success', 'Driver status updated successfully.');
}

public function verifyLicense($id)
{
    $driver = Driver::findOrFail($id);
    $driver->license_verified = true; // Assuming you have a `license_verified` column (boolean)
    $driver->save();

    return redirect()->route('drivers.index')->with('success', 'Driver license verified successfully.');
}

}
