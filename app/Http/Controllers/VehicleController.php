<?php

namespace App\Http\Controllers;

use _PHPStan_33c983f26\Symfony\Contracts\Service\Attribute\Required;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PickupLocation;
use App\Models\RentalTime;
use App\Models\UserHistory;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $owner = $user?->id;
        $search = $request->search;

        if ($user->mitra_status !== "Verified") {
            abort(404);
        }

        $vehicles = Vehicle::where('owner_id', $owner)->with(["PickupLocation", "type"])->paginate(10);
        if ($search){
            $vehicles = Vehicle::where('owner_id', $owner)->with(["PickupLocation", "type"])->where(function ($query) use ($search){
                $query->where('brand', 'LIKE', '%' . $search . '%')
                    ->orWhere('model', 'LIKE', '%' . $search . '%')
                    ->orWhere('color', 'LIKE', '%' . $search . '%')
                    ->orWhere('year', 'LIKE', '%' . $search . '%')
                    ->orWhere('plate_number', 'LIKE', '%' . $search . '%');
            })->paginate(25);
        }
        $vehiclesActive = Vehicle::where('status', 'Active')->where('owner_id', $owner)->count();
        $vehiclesInActive = Vehicle::where('status', 'Inactive')->where('owner_id', $owner)->count();
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
        $days = RentalTime::where('status', 'Active')->get();
        $types = VehicleType::where('status', 'Active')->get();
        $pickupLocations = PickupLocation::where("owner_id", $owner)->get();
        return view("pages.mitra.vehicle.create", compact("pickupLocations", "types", "days"));
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

        $time = $request->validate([
            "days" => 'Required|array',
            'days.*' => 'exists:rental_times,id',
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

        $vehicle = Vehicle::create($data);
        $vehicle->vehicleTime()->sync($time['days']);

        UserHistory::record(
            "Kendaraan",
            $user->name . " Menambahkan kendaraan " . $data['brand'] . ' ' . $data['model']
        );

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

        $days = RentalTime::where('status', 'Active')->get();
        $vehicle = Vehicle::where("owner_id", $owner)->with('pickupLocation')->with('vehicleTime')->findOrFail($id);
        $pickupLocations = PickupLocation::where("owner_id", $owner)->get();
        $types = VehicleType::where('status', 'Active')->get();
        return view("pages.mitra.vehicle.edit", compact(["vehicle", "pickupLocations", "types", "days"]));
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
            "plate_number" => "required|unique:vehicles,plate_number," . $id,
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

        $time = $request->validate([
            "days" => 'Required|array',
            'days.*' => 'exists:rental_times,id',
        ]);

        $vehicle->vehicleTime()->sync($time['days']);

        $vehicle->fill($data);
        if ($vehicle->isDirty()) {
            $vehicle->save();
            UserHistory::record(
                "User",
                $user->name . " Mengubah kendaraan " . $vehicle->brand . ' ' . $vehicle->model
            );
        }
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
