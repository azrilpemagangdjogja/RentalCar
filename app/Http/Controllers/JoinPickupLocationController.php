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
        $vehicles = Vehicle::where('pickup_location_id', $pickupLocation->id)->get();
        return view("pages.mitra.pickup-location.show", compact(['pickupLocation', 'vehicles']));
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
            $query->whereIn('status', ['Pending']);
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
        $pickupLocations = PickupLocation::find($pickupLocation);
        $owner = PickupLocation::with('owner')->find($pickupLocation);
        if ($pickupLocations->max_vehicle <= $vehicleCount) {
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
                "location_id" => $pickupLocations->id,
                "location_name" => $pickupLocations->name,
                "location_address" => $pickupLocations->address,
                "location_latitude" => $pickupLocations->latitude,
                "location_longitude" => $pickupLocations->longitude,
                "location_description" => $pickupLocations->description,
                "owner_id" => $pickupLocations->owner->id,
                "owner_name" => $pickupLocations->owner->name,
                "owner_email" => $pickupLocations->owner->email,
                "owner_telp" => $pickupLocations->owner->telp,
                "owner_profile" => $pickupLocations->owner->profile,
            ]);

            UserHistory::record(
                "Lokasi Pengambilan",
                $user->name . " mengajukan kendaraannya " . $vehicle->brand . " " . $vehicle->model . " ke lokasi " . $pickupLocations->name
            );
        }

        return redirect()->route('join-pickup-location.veh', $pickupLocation);
    }
    public function vehun($pickupLocation)
    {
        $user = auth()->user();

        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $pickupLocations = PickupLocation::find($pickupLocation);

        $vehicles = Vehicle::where('pickup_location_id', $pickupLocation)->where('owner_id', $user->id)->get();

        return view('pages.mitra.pickup-location.unveh', compact(['vehicles', 'pickupLocations']));
    }


    public function unveh($pickupLocation, $vehicle)
    {
        $user = auth()->user();

        if ($user->mitra_status !== "Verified") {
            abort(404);
        }


        $vehicle = Vehicle::where('owner_id', $user->id)->find($vehicle);

        $vehicleCount = Vehicle::where('pickup_location_id', $pickupLocation)->count();
        $pickupLocations = PickupLocation::find($pickupLocation);
        $owner = PickupLocation::with('owner')->find($pickupLocation);
        if ($pickupLocations->max_vehicle <= $vehicleCount) {
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
                "location_id" => $pickupLocations->id,
                "location_name" => $pickupLocations->name,
                "location_address" => $pickupLocations->address,
                "location_latitude" => $pickupLocations->latitude,
                "location_longitude" => $pickupLocations->longitude,
                "location_description" => $pickupLocations->description,
                "owner_id" => $pickupLocations->owner->id,
                "owner_name" => $pickupLocations->owner->name,
                "owner_email" => $pickupLocations->owner->email,
                "owner_telp" => $pickupLocations->owner->telp,
                "owner_profile" => $pickupLocations->owner->profile,
            ]);

            UserHistory::record(
                "Lokasi Pengambilan",
                $user->name . " mengajukan kendaraannya " . $vehicle->brand . " " . $vehicle->model . " ke lokasi " . $pickupLocations->name
            );
        }

        return redirect()->route('join-pickup-location.veh', $pickupLocation);
    }




    public function cancelveh($pickupLocation, $vehicle)
    {
        $user = auth()->user();

        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $vehicles = Vehicle::where('owner_id', $user->id)->where('pickup_location_id', null)->findOrFail($pickupLocation);

        $approvement = ApprovalJoinVehicle::where('viewer_id', null)->where('status', 'Pending')->where('applicant_id', $user->id)->where('vehicle_id', $vehicles->id)->first();

        $approvement->update([
            "status" => "Cancelled"
        ]);

        UserHistory::record(
            "Lokasi Pengambilan",
            $user->name . " membatalkan penitipan kendaraan " . $approvement->vehicle_brand . " " . $approvement->vehicle->model . " miliknya dari lokasi " . $approvement->location_name
        );

        return redirect()->route('join-pickup-location.veh', $pickupLocation);
    }
}
