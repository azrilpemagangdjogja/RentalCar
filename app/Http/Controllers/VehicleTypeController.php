<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $vehicleTypes = VehicleType::all();
        return view("pages.admin.vehicle.type.index", compact("vehicleTypes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.vehicle.type.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $data = $request->validate([
            "name" => "required|unique:vehicle_types,name",
            "description" => "nullable",
            "status" => "required|in:Active,Inactive"
        ]);

        VehicleType::create($data);
        return redirect()->route('vehicle-type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            abort(404);
        }

        $vehicleType = VehicleType::findOrFail($id);
        return view("pages.admin.vehicle.type.edit", compact("vehicleType"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin"&& $user->role !== "Superadmin") {
            abort(404);
        }

        $vehicleType = VehicleType::findOrFail($id);
        $data = $request->validate([
            "name" => "required|unique:vehicle_types,name," . $vehicleType->id,
            "description" => "nullable",
            "status" => "required|in:Active,Inactive"
        ]);

        $vehicleType->update($data);
        return redirect()->route('vehicle-type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $vehicleType = VehicleType::findOrFail($id);
        $vehicleType->delete();

        return redirect()->route('vehicle-type.index');
    }
}
