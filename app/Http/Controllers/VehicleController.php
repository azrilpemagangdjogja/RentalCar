<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PickupLocation;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $owner = $user?->id;

        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $vehicles = Vehicle::where('owner_id', $owner)->with(["PickupLocation", "type"])->paginate(10);
        $vehiclesActive = Vehicle::where('status', 'Active')->where('owner_id', $owner)->get();
        $vehiclesInActive = Vehicle::where('status', 'Inactive')->where('owner_id', $owner)->get();
        return view("pages.mitra.vehicle.index", compact(['vehicles', 'vehiclesActive', 'vehiclesInActive']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $owner = $user?->id;
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }
        $types = VehicleType::where('status', 'Active')->get();
        $pickupLocations = PickupLocation::where("owner_id", $owner)->get();
        return view("pages.mitra.vehicle.create", compact("pickupLocations", "types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $owner = $user?->id;
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $data = $request->validate([
            "profile" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "brand" => "required",
            "year" => "required",
            "model" => "required",
            "fuel_type" => "required",
            "transmission" => "required",
            "engine_capacity" => "required",
            "seats" => "required",
            "plate_number" => "required|unique:vehicles,plate_number",
            "deposit_amount" => "nullable",
            "description" => "nullable",
            "status" => "nullable",
            "color" => "nullable",
            "role" => "nullable",
            "pickup_location_id" => "nullable",
            "type_id" => "nullable",
        ]);

        $data["owner_id"] = $owner;

        if ($request->hasFile('profile')) {
            $data['profile'] = $request->file('profile')->store('vehicle_profiles', 'public');
        } else {
            unset($data['profile']);
        }

        $pickuLocation = PickupLocation::where("id", $data['pickup_location_id'])->first();
        $vehicleCount = Vehicle::where("pickup_location_id", $data['pickup_location_id'])->count();

        if ($data['pickup_location_id']) {
            if ($vehicleCount >= $pickuLocation?->max_vehicle) {
                return redirect()->back()->withErrors(['pickup_location_id' => 'Kapasitas kendaraan pada lokasi pengambilan ini sudah penuh.']);
            }
        }

        Vehicle::create($data);

        return redirect()->route("vehicle.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        $owner = $user?->id;
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $vehicle = Vehicle::where("owner_id", $owner)->with(['pickupLocation', 'type'])->findOrFail($id);
        return view("pages.mitra.vehicle.show", compact("vehicle"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        $owner = $user?->id;
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $vehicle = Vehicle::where("owner_id", $owner)->with('pickupLocation')->findOrFail($id);
        $pickupLocations = PickupLocation::where("owner_id", $owner)->get();
        $types = VehicleType::where('status', 'Active')->get();
        return view("pages.mitra.vehicle.edit", compact(["vehicle", "pickupLocations", "types"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $user = auth()->user();
        $owner = $user?->id;
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $data = $request->validate([
            "profile" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            "brand" => "required",
            "type_id" => "required",
            "year" => "required",
            "model" => "required",
            "fuel_type" => "required",
            "transmission" => "required",
            "engine_capacity" => "required",
            "seats" => "required",
            "plate_number" => "required|unique:vehicles,plate_number",
            "deposit_amount" => "nullable",
            "description" => "nullable",
            "status" => "nullable",
            "color" => "nullable",
            "role" => "nullable",
            "pickup_location_id" => "nullable",
        ]);

        $vehicle = Vehicle::where('owner_id', $owner)->findOrFail($id);

        if ($request->hasFile('profile')) {
            $data['profile'] = $request->file('profile')->store('vehicle_profiles', 'public');
        } else {
            unset($data['profile']);
        }

        $pickuLocation = PickupLocation::where("id", $data['pickup_location_id'])->first();
        $vehicleCount = Vehicle::where("pickup_location_id", $data['pickup_location_id'])->count();

        if ($data['pickup_location_id']) {
            if ($vehicleCount >= $pickuLocation?->max_vehicle) {
                return redirect()->back()->withErrors(['pickup_location_id' => 'Kapasitas kendaraan pada lokasi pengambilan ini sudah penuh.']);
            }
        }

        $vehicle->update($data);
        return redirect()->route("vehicle.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
