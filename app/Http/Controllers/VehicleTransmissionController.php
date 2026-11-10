<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleTransmission;

class VehicleTransmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        $vehicleTransmissions = VehicleTransmission::withCount('vehicles')->get();
        return view("pages.admin.vehicle.transmission.index", compact("vehicleTransmissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        return view("pages.admin.vehicle.transmission.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        VehicleTransmission::create($data);

        return redirect()->route('vehicle-transmission.index')->with('success', 'Transmisi kendaraan berhasil ditambahkan.');
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
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        $vehicleTransmission = VehicleTransmission::findOrFail($id);
        return view("pages.admin.vehicle.transmission.edit", compact("vehicleTransmission"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $vehicleTransmission = VehicleTransmission::findOrFail($id);
        $vehicleTransmission->update($data);

        return redirect()->route('vehicle-transmission.index')->with('success', 'Transmisi kendaraan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
