<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RentalTime;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\ApprovalVehicle;
use App\Models\UserHistory;
use App\Models\PickupLocation;
use App\Models\VehicleType;
use App\Models\VehicleTransmission;
use App\Models\User;
use App\Models\Message;

class VehicleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            abort(403);
        }

        $vehicles = Vehicle::orderByDesc('created_at')->paginate(25);
        $totalVehicle = Vehicle::count();
        $totalActiveVehicle = Vehicle::where('status', 'Active')->count();
        $totalPendingVehicle = ApprovalVehicle::where('status', 'Pending')->count();
        $totalInactiveVehicle = Vehicle::where('status', 'Inactive')->count();

        if (isset($request->search)) {
            $search = $request->input('search');
            $vehicles = Vehicle::where('brand', 'like', "%$search%")
                ->orWhere('model', 'like', "%$search%")
                ->orWhere('plate_number', 'like', "%$search%")
                ->orWhere('deposit_amount', 'like', "%$search%")
                ->orWhere('price_amount', 'like', "%$search%")
                ->orWhere('color', 'like', "%$search%")
                ->paginate(25);
        }

        if (isset($request->status)) {
            $status = $request->input('status');
            $vehicles = Vehicle::where('status', $status)->paginate(25);
        }
        return view('pages.admin.vehicle.vehicle.index', compact(['vehicles', 'totalVehicle', 'totalActiveVehicle', 'totalPendingVehicle', 'totalInactiveVehicle']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            abort(403);
        }

        $vehicle = Vehicle::whereHas('vehicleDocument')->findOrFail($id);
        $owner = User::where('id', $vehicle->owner_id)->first();
        return view('pages.admin.vehicle.vehicle.show', compact(['vehicle', 'owner']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            abort(403);
        }

        $vehicle = Vehicle::whereHas('vehicleDocument')->findOrFail($id);
        $days = RentalTime::where('status', 'Active')->get();
        $types = VehicleType::where('status', 'Active')->get();
        $transmissions = VehicleTransmission::where('status', 'Active')->get();
        return view('pages.admin.vehicle.vehicle.edit', compact(['vehicle', 'days', 'types', 'transmissions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        // $owner = ;
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $data = $request->validate([
            "type_id" => 'required|exists:vehicle_types,id',
            // "pickup_location_id" => 'nullable|exists:pickup_locations,id',
            "profile" => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            "brand" => 'required|string|max:255',
            "plate_number" => 'required|string|max:255',
            "model" => 'required|string|max:255',
            "color" => 'required|string|max:255',
            "year" => 'required|integer|min:1900|max:' . date('Y'),
            "description" => 'nullable|string',
            "location" => 'nullable|string|max:255',
            "fuel_type" => 'required|string|max:255',
            "engine_capacity" => 'required',
            "transmission_id" => 'required|exists:vehicle_transmissions,id',
            "seats" => 'required|integer|min:1',
            "deposit_amount" => 'nullable|numeric|min:0',
            "price_amount" => 'required|numeric|min:0',
            "status" => 'required|in:Active,Inactive',
        ]);

        $vehicle = Vehicle::
        // where('owner_id', $owner)
        findOrFail($id);

        if ($request->hasFile('profile')) {
            $data['profile'] = $request->file('profile')->store('vehicle_profiles', 'public');
        } else {
            unset($data['profile']);
        }

        // if (isset($data['pickup_location_id'])) {
        //     $pickuLocation = PickupLocation::where("id", $data['pickup_location_id'])->first();
        //     $vehicleCount = Vehicle::where("pickup_location_id", $data['pickup_location_id'])->count();
        // } else {
        //     $pickuLocation = null;
        // }

        // if (isset($data['pickup_location_id'])) {
        //     if ($vehicleCount >= $pickuLocation?->max_vehicle) {
        //         return redirect()->back()->withErrors(['pickup_location_id' => 'Kapasitas kendaraan pada lokasi pengambilan ini sudah penuh.']);
        //     }
        // }

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
        return redirect()->route("vehicle-admin.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(4043);
        }
        $vehicle = Vehicle::findOrFail($id);
        $vehicleOwner = User::where('id', $vehicle->owner_id)->first();
        $vehicleDocument = $vehicle->vehicleDocument();

        Message::message(
            $vehicleOwner->id,
            "Kendaraan anda " . $vehicle->brand . ' ' . $vehicle->model . " telah dihapus karena alasan",
            "Announcement",
            "Kendaraan Dihapus",
        );

        UserHistory::record(
            "Kendaraan",
            "Menghapus kendaraan " . $vehicle->brand . ' ' . $vehicle->model . ' milik ' . $vehicleOwner->email . ' id ' . $vehicleOwner->id
        );

        $vehicleDocument->delete();
        $vehicle->delete();
    }
}
