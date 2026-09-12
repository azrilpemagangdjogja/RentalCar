<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use App\Models\ApprovalJoinVehicle;
use App\Models\Vehicle;

class ApprovalJoinVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvement = ApprovalJoinVehicle::all();
        return view('pages.admin.approval.pickup-location.index', compact('approvement'));
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
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $approvement = ApprovalJoinVehicle::findOrFail($id);
        return view('pages.admin.approval.pickup-location.show', compact('approvement'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function approve(string $id){
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $approvement = ApprovalJoinVehicle::findOrFail($id);
        $vehicle = Vehicle::where('owner_id', $approvement->applicant_id)->where('id', $approvement->vehicle_id);
        $approvement->update([
            "viewer_id" => $user->id,
            "viewer_name" => $user->name,
            "viewer_email" => $user->name,
            "viewer_profile" => $user->profile,
            "viewer_telp" => $user->telp,
            "status" => "Approved",
        ]);
        $vehicle->update([
            "pickup_location_id" => $approvement->location_id
        ]);

        UserHistory::record(
            "Persetujuan",
            $user->name . " menyetujui kendaraan " . $approvement->vehicle_brand . ' ' . $approvement->vehicle_model . ' milik ' . $approvement->applicant_name . ' dititipkan ke lokasi pengambilan ' . $approvement->location_name
        );

        return redirect()->back();
    }




    public function rejection(string $id){
        $approvement = ApprovalJoinVehicle::findOrFail($id);
        return view('pages.admin.approval.pickup-location.reject', compact('approvement'));
    }




    public function reject(Request $request ,string $id){
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $approvement = ApprovalJoinVehicle::findOrFail($id);
        $approvement->update([
            "viewer_id" => $user->id,
            "viewer_name" => $user->name,
            "viewer_email" => $user->name,
            "viewer_profile" => $user->profile,
            "viewer_telp" => $user->telp,
            "status" => "Rejected",
            "rejected_reason" => $request->reason,
        ]);

        UserHistory::record(
            "Penolakan",
            $user->name . " menolak kendaraan " . $approvement->vehicle_brand . ' ' . $approvement->vehicle_model . ' milik ' . $approvement->applicant_name . ' dititipkan ke lokasi pengambilan ' . $approvement->location_name
        );

        return redirect()->route('approval-join-vehicle.index');
    }
}
