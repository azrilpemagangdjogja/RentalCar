<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApprovalVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RentalTime;
use App\Models\VehicleType;
use App\Models\Vehicle;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $userHasApplied = auth()->user()->applicantMitra()->exists();

        if (!$userHasApplied){
            abort(404);
        }

        if ($user->approvementVehicles()->exists()){
            return view('pages.mitra.mitra_verification.wascreate');
        }

        $days = RentalTime::where('status', 'Active')->get();
        $types = VehicleType::where('status', 'Active')->get();
        return view("pages.mitra.vehicle.firstcreate", compact(["types", "days"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $userHasApplied = auth()->user()->applicantMitra()->exists();

        if (!$userHasApplied){
            abort(404);
        }

        if ($user->approvementVehicles()->exists()){
            return view('pages.mitra.mitra_verification.wascreate');
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
            "transmission" => "required",
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
            "tax_proof_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "chassis_photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "tax_due_date" => "required",
            "stnk_due_date" => "required",
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
            unset($data['chassis_photo']);
        }

        if ($request->hasFile('stnk_photo')) {
            $data['stnk_photo'] = $request->file('stnk_photo')->store('stnk-photo', 'private');
        } else {
            unset($data['stnk_photo']);
        }
        if ($request->hasFile('tax_proof_photo')) {
            $data['tax_proof_photo'] = $request->file('tax_proof_photo')->store('tax-prof-photo', 'private');
        } else {
            unset($data['tax_proof_photo']);
        }
        if ($request->hasFile('chassis_photo')) {
            $data['chassis_photo'] = $request->file('chassis_photo')->store('chassis-photo', 'private');
        } else {
            unset($data['chassis_photo']);
        }

        $data['owner_id'] = $user->id;
        ApprovalVehicle::create($data);
        return redirect()->route('mitra-identity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();


        $vehicle = Vehicle::with(['pickupLocation', 'type'])->findOrFail($id);
        return view("pages.customer.vehicles.show", compact("vehicle"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
