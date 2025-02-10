<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Driver;
use DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car = Car::with('driver')->get();
        //dd($car);
        return view('car.index',compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $car = Car::with('driver');

        $driver = Driver::pluck('DriverName', 'id');
        return view('car.create', compact('driver', 'car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Car::create([
            //'user_id' => auth()->user()->id,
            'driver_id' => $request->driver_id,
            'LicenseNo' => $request->LicenseNo,
            'CarModel' => $request->CarModel,
            'CarColor' => $request->CarColor,
            'CarPlate' => $request->CarPlate,
            'CarCapacity' => $request->CarCapacity,
            'CarPlatRoadtax' => $request->CarPlatRoadtax
            
           ]);
  
        // User::create($request->all());
   
        return redirect()->route('car.index')
                        ->with('success','Car created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('car.show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $driver = Driver::pluck('DriverName', 'id');

        return view('car.edit',compact('driver', 'car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());

        return redirect()->route('car.index')
                        ->with('success','Cars updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
  
        return redirect()->route('car.index')
                        ->with('success','Car deleted successfully');
    }
}
