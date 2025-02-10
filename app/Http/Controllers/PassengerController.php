<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Ensure Log is imported

class PassengerController extends Controller
{
    public function showLoginForm() {
        return view('passenger_management.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('passenger')->attempt($credentials)) {
            return redirect()->route('passenger.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegisterForm() {
        return view('passenger_management.register');
    }

    public function register(Request $request) {
        // Registration logic for passenger
    }
    /**
     * Display a listing of the passengers.
     */
    public function index()
    {
        $passengers = Passenger::all();
        return view('passenger_management.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new passenger.
     */
    public function create()
    {
        return view('passenger_management.create');
    }

    /**
     * Store a newly created passenger in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string',
            'student_id' => 'required|string|unique:passengers,student_id',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:passengers,email',
            'password' => 'required|string|min:6',
            'student_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        Log::info('Validated Data', $validatedData);

        // Handle student card upload
        $studentCardPath = null;
        if ($request->hasFile('student_card')) {
            $studentCardPath = $request->file('student_card')->store('student_cards', 'public');
        }

        // Create passenger
        $passenger = Passenger::create([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'student_id' => $request->student_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'student_card' => $studentCardPath,
        ]);

        Log::info('Passenger Created:', $passenger->toArray());

        return redirect()->route('passengers.index')->with('success', 'Passenger added successfully!');
    }

    /**
     * Display the specified passenger.
     */
    public function show(Passenger $passenger)
    {
        return view('passenger_management.show', compact('passenger'));
    }

    /**
     * Show the form for editing the specified passenger.
     */
    public function edit(Passenger $passenger)
    {
        return view('passenger_management.edit', compact('passenger'));
    }

    /**
     * Update the specified passenger in the database.
     */
    public function update(Request $request, Passenger $passenger)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string',
            'student_id' => 'required|string|unique:passengers,student_id,' . $passenger->id,
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:passengers,email,' . $passenger->id,
            'student_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle student card update
        if ($request->hasFile('student_card')) {
            if ($passenger->student_card) {
                Storage::disk('public')->delete($passenger->student_card);
            }
            $studentCardPath = $request->file('student_card')->store('student_cards', 'public');
        } else {
            $studentCardPath = $passenger->student_card;
        }

        // Update passenger data
        $passenger->update([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'student_id' => $request->student_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'student_card' => $studentCardPath,
        ]);

        return redirect()->route('passengers.index')->with('success', 'Passenger updated successfully!');
    }

    /**
     * Remove the specified passenger from the database.
     */
    public function destroy(Passenger $passenger)
    {
        // Delete student card image if exists
        if ($passenger->student_card) {
            Storage::disk('public')->delete($passenger->student_card);
        }

        $passenger->delete();
        return redirect()->route('passengers.index')->with('success', 'Passenger deleted successfully!');
    }

    public function verify($id)
{
    $passenger = Passenger::findOrFail($id);
    $passenger->status = 'Verified';
    $passenger->save();

    return redirect()->route('passengers.index')->with('success', 'Passenger identity verified successfully!');
}

public function suspend($id)
{
    $passenger = Passenger::findOrFail($id);
    $passenger->status = 'Suspended';
    $passenger->save();

    return redirect()->route('passengers.index')->with('success', 'Passenger account suspended successfully!');
}

}
