<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PickupLocation;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class PickupLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $data = PickupLocation::with('vehicles')->where('owner_id', $user->id)->orderBy("created_at", "desc")->paginate(10);
        // $topData = PickupLocation::with('vehicles')->where('status', 'Active')->get();
        // $vehicleCount = Vehicle::where("pickup_location_id", $topData->id)->count();

        $dataTop = PickupLocation::with('vehicles')->where('max_vehicle', '>=', '0')->limit(3)->get();
        return view("pages.mitra.pickup-location.index", compact(["data", "dataTop"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }
        return view("pages.mitra.pickup-location.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }
        $data = $request->validate([
            "name" => "required",
            "description" => "nullable",
            "address" => "required",
            "latitude" => "required",
            "longitude" => "required",
        ]);

        $data["owner_id"] = $user->id;

        PickupLocation::create($data);

        return redirect()->route("pickup-location.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $pickupLocation = PickupLocation::findOrFail($id);
        $vehicle = $pickupLocation->vehicles->where('status', 'Active')->count();
        return view("pages.mitra.pickup-location.show", compact(["pickupLocation", "vehicle"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $vehicles = Vehicle::where("owner_id", $user->id)->get();
        $pickupLocation = PickupLocation::findOrFail($id);
        return view("pages.mitra.pickup-location.edit", compact(["pickupLocation", "vehicles"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $data = $request->validate([
            "max_vehicle" => 'nullable',
        ]);

        $pickupLocation = PickupLocation::where('owner_id', $user->id)->findOrFail($id);
        $pickupLocation = Vehicle::where('owner_id', $user->id)->findOrFail($id);
        $pickupLocation->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function veh(string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== 'Verified') {
            abort(404);
        }

        $vehicles = Vehicle::where("owner_id", $user->id)->where('pickup_location_id', null)->get();
        $pickupLocation = PickupLocation::findOrFail($id);
        $usedVehicles = Vehicle::where("owner_id", $user->id)->where('pickup_location_id', $pickupLocation->id)->get();
        return view("pages.mitra.pickup-location.addveh", compact(["pickupLocation", "vehicles", "usedVehicles"]));
    }

    public function addveh($pickupLocation, $vehicle)
    {
        $user = auth()->user();
        if ($user->mitra_status !== 'Verified') {
            abort(404);
        }

        $pickupLocations = PickupLocation::where("owner_id", $user->id)->findOrFail($pickupLocation);
        $vehicle = Vehicle::where("owner_id", $user->id)->findOrFail($vehicle);
        $vehicleCount = Vehicle::where("pickup_location_id", $pickupLocations->id)->count();

        if ($pickupLocation) {
            if ($vehicleCount >= $pickupLocations?->max_vehicle) {
                return redirect()->back()->withErrors(['pickup_location_id' => 'Kapasitas kendaraan pada lokasi pengambilan ini sudah penuh.']);
            }
        }

        $vehicle->update([
            "pickup_location_id" => $pickupLocations->id,
        ]);

        return redirect()->route("pickup-location.veh", $pickupLocations->id);
    }

    public function unveh($pickupLocation, $vehicle){
        $user = auth()->user();
        if ($user->mitra_status !== 'Verified') {
            abort(404);
        }
        $vehicle = Vehicle::where('pickup_location_id', $pickupLocation)->where('id', $vehicle)->firstOrFail();
        $vehicle->update([
            "pickup_location_id" => null,
        ]);
        return back();
    }

    public function manage(string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== 'Verified') {
            abort(404);
        }

        $pickupLocation = PickupLocation::where('owner_id', $user->id)->findOrFail($id);
        return view("pages.mitra.pickup-location.manage", compact(["pickupLocation"]));
    }

    public function addmanage(Request $request, string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== 'Verified') {
            abort(404);
        }

        $data = $request->validate([
            "address" => "required",
            "latitude" => "required",
            "longitude" => "required",
            "max_vehicle" => "integer|required",
        ]);
        $pickupLocation = PickupLocation::where("owner_id", $user->id)->findOrFail($id);
        $vehicleCount = Vehicle::where("pickup_location_id", $pickupLocation->id)->count();


        if ($data['max_vehicle'] < $vehicleCount) {
            return back()->with("error", "Kapasitas telah penuh");
        }

        $pickupLocation->update($data);
        return redirect()->route("pickup-location.show", $id);
    }

    public function profile(string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== 'Verified') {
            abort(404);
        }

        $pickupLocation = PickupLocation::where('owner_id', $user->id)->findOrFail($id);
        return view("pages.mitra.pickup-location.edit", compact(["pickupLocation"]));
    }

    public function addprofile(Request $request, string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== 'Verified') {
            abort(404);
        }

        $data = $request->validate([
            "name" => "required",
            "description" => "nullable",
        ]);
        $pickupLocation = PickupLocation::where("owner_id", $user->id)->findOrFail($id);

        $pickupLocation->update($data);
        return redirect()->route("pickup-location.show", $id);
    }

    public function status(Request $request, string $id)
    {
        $user = auth()->user();
        if ($user->mitra_status !== 'Verified') {
            abort(404);
        }
        $data = $request->validate([
            'status' => 'required|in:Active,Inactive',
        ]);

        $pickupLocation = PickupLocation::where('owner_id', $user->id)->findOrFail($id);

        $pickupLocation->update([
            'status' => $data['status'],
        ]);

        return back();

    }
}
