<?php

namespace App\Http\Controllers;

use _PHPStan_33c983f26\Symfony\Contracts\Service\Attribute\Required;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\ApprovalVehicle;
use App\Models\VehicleType;
use App\Models\VehicleTransmission;
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
        $active = $request->active;
        $inactive = $request->inactive;
        $unassigned = $request->unassigned;
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

        if ($active) {
            $vehicles = Vehicle::where('owner_id', $owner)->with(["PickupLocation", "type"])->where('status', 'Active')->paginate(10);
        }

        if ($inactive) {
            $vehicles = Vehicle::where('owner_id', $owner)->with(["PickupLocation", "type"])->where('status', 'Inactive')->paginate(10);
        }

        if ($unassigned) {
            $vehicles = Vehicle::where('owner_id', $owner)->with(["PickupLocation", "type"])->whereNull('pickup_location_id')->paginate(10);
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
        $transmissions = VehicleTransmission::where('status', 'Active')->get();
        $days = RentalTime::where('status', 'Active')->get();
        $types = VehicleType::where('status', 'Active')->get();
        return view("pages.mitra.vehicle.create", compact("types", "days", "transmissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $userWasMitra = $user->mitra_status == "Verified";

        if (!$userWasMitra){
            abort(404);
        }

        // dd($request);
        $user = auth()->user();
        $data = $request->validate([
            "profile" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "brand" => "required",
            "model" => "required",
            "year" => "required",
            "color" => "required",
            "plate_number" => "required|unique:vehicles,plate_number",
            "fuel_type" => "required",
            "transmission_id" => "required",
            "engine_capacity" => "required",
            "seats" => "required",
            "description" => "required",
            "type_id" => "required",
            "front_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "left_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "back_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "right_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "odometer_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "stnk_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "selfie_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "chassis_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "stnk_due_date" => "required|date",
        ]);

        // $time = $request->validate([
        //     "days" => 'Required|array',
        //     'days.*' => 'exists:rental_times,id',
        // ]);

        if ($request->hasFile('profile')) {
            $data['profile'] = $request->file('profile')->store('vehicle_profiles', 'public');
        } else {
            unset($data['profile']);
        }
        if ($request->hasFile('front_photo')) {
            $data['front_photo'] = $request->file('front_photo')->store('vehicle_sidetoside', 'public');
        } else {
            unset($data['front_photo']);
        }
        if ($request->hasFile('back_photo')) {
            $data['back_photo'] = $request->file('back_photo')->store('vehicle_sidetoside', 'public');
        } else {
            unset($data['back_photo']);
        }
        if ($request->hasFile('left_photo')) {
            $data['left_photo'] = $request->file('left_photo')->store('vehicle_sidetoside', 'public');
        } else {
            unset($data['left_photo']);
        }
        if ($request->hasFile('right_photo')) {
            $data['right_photo'] = $request->file('right_photo')->store('vehicle_sidetoside', 'public');
        } else {
            unset($data['right_photo']);
        }
        if ($request->hasFile('odometer_photo')) {
            $data['odometer_photo'] = $request->file('odometer_photo')->store('odometer-photo', 'public');
        } else {
            unset($data['odometer_photo']);
        }
        if ($request->hasFile('selfie_photo')) {
            $data['selfie_photo'] = $request->file('selfie_photo')->store('selfie-photo', 'public');
        } else {
            unset($data['selfie_photo']);
        }

        if ($request->hasFile('stnk_photo')) {
            $data['stnk_photo'] = $request->file('stnk_photo')->store('stnk-photo', 'private');
        } else {
            unset($data['stnk_photo']);
        }
        if ($request->hasFile('chassis_photo')) {
            $data['chassis_photo'] = $request->file('chassis_photo')->store('chassis-photo', 'private');
        } else {
            unset($data['chassis_photo']);
        }

        UserHistory::record(
            "Kendaraan",
            $user->name . " Mengajukan kendaraan " . $data['brand'] . ' ' . $data['model']
        );
        $data['owner_id'] = $user->id;
        ApprovalVehicle::create($data);
        return redirect()->route('vehicle.index');
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

        if (isset($data['pickup_location_id'])) {
            $pickuLocation = PickupLocation::where("id", $data['pickup_location_id'])->first();
            $vehicleCount = Vehicle::where("pickup_location_id", $data['pickup_location_id'])->count();
        } else {
            $pickuLocation = null;
        }

        if (isset($data['pickup_location_id'])) {
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
