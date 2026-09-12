<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApprovalJoinVehicle;
use App\Models\PickupLocation;
use App\Models\RegionFilter;
use App\Models\UserHistory;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class JoinPickupLocationController extends Controller
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
        $recommendedLocations = PickupLocation::where('status', 'Active')->get();
        $suggestedLocations = PickupLocation::where('status', 'Active')->get();
        $pickupLocations = PickupLocation::where('status', 'Active')->paginate(10);
        $areas = RegionFilter::get();
        return view("pages.mitra.pickup-location.index", compact(['recommendedLocations', 'areas', 'suggestedLocations', 'pickupLocations']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
        return view("pages.mitra.pickup-location.show", compact('pickupLocation'));
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

        $pickupLocation = PickupLocation::find($id);
        $vehicle = Vehicle::where('pickup_location_id', null)->get();

        return view('pages.mitra.pickup-location.veh', compact(['vehicles', 'pickupLocation']));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();

        if ($user->mitra_status !== "Verified") {
            abort(404);
        }
    }

    public function veh($pickupLocation)
    {
        $user = auth()->user();

        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $pickupLocation = PickupLocation::find($pickupLocation);

        $vehicles = Vehicle::whereDoesntHave('approvalJoin', function ($query) {
            $query->whereIn('status', ['Pending', 'Approved']);
        })->get();

        $deployedVehicles = Vehicle::whereHas('approvalJoin', function ($query) {
            $query->whereIn('status', ['Pending', 'Approved']);
        })->get();

        return view('pages.mitra.pickup-location.veh', compact(['vehicles', 'pickupLocation', 'deployedVehicles']));
    }


    public function addveh($pickupLocation, $vehicle)
    {
        $user = auth()->user();

        if ($user->mitra_status !== "Verified") {
            abort(404);
        }


        $vehicle = Vehicle::where('owner_id', $user->id)->find($vehicle);

        $vehicleCount = Vehicle::where('pickup_location_id', $pickupLocation)->count();
        $pickupLocation = PickupLocation::find($pickupLocation);
        if ($pickupLocation->max_vehicle <= $vehicleCount) {
            return back()->withErrors('maks kendaraan sudah tercapai');
        } else {
            ApprovalJoinVehicle::create([
                "applicant_id" => $user->id,
                "applicant_name" => $user->name,
                "applicant_email" => $user->email,
                "applicant_profile" => $user->profile,
                "applicant_telp" => $user->telp,
                "vehicle_id" => $vehicle->id,
                "vehicle_brand" => $vehicle->brand,
                "vehicle_model" => $vehicle->model,
                "vehicle_transmission" => $vehicle->transmission,
                "vehicle_fuel_type" => $vehicle->fuel_type,
                "vehicle_type" => $vehicle->type_id,
                "vehicle_seats" => $vehicle->seats,
                "vehicle_engine_capacity" => $vehicle->engine_capacity,
                "vehicle_color" => $vehicle->color,
                "vehicle_year" => $vehicle->year,
                "vehicle_profile" => $vehicle->profile,
                "vehicle_plate_number" => $vehicle->plate_number,
                "vehicle_description" => $vehicle->description,
            ]);

            UserHistory::record(
                "Lokasi Pengambilan",
                $user->name . " mengajukan kendaraannya " . $vehicle->brand . " " . $vehicle->model . " ke lokasi " . $pickupLocation->name
            );
        }

        return redirect()->route('join-pickup-location.show', $pickupLocation->id);
    }
}
