<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HistoryApprovalVehicle;
use Illuminate\Http\Request;
use App\Models\ApprovalVehicle;
use App\Models\Vehicle;
use App\Models\VehicleDocument;
use App\Models\Message;
use App\Models\UserHistory;

class ApprovalVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $approvement = ApprovalVehicle::whereHas('applicant', function ($query) {
                $query->where('mitra_status', 'Verified');
            })
        ->orderByRaw("
            CASE
            WHEN status = 'Pending' THEN 0 ELSE 1
            END 
        ")
        ->latest()
        ->paginate(25);
        
        $totalApprovement = ApprovalVehicle::where('status', 'Pending')->count();
        $totalPending = ApprovalVehicle::where('status', 'Pending')->count();
        $totalApproved = ApprovalVehicle::where('status', 'Approved')->count();
        $totalRejected = ApprovalVehicle::where('status', 'Rejected')->count();
        return view('pages.admin.approval.vehicle.index', compact(['approvement', 'totalApprovement', 'totalPending', 'totalApproved', 'totalRejected']));
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
        $approvalVehicle = ApprovalVehicle::findOrFail($id);
        return view('pages.admin.approval.vehicle.show', compact('approvalVehicle'));
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

    public function approve($id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(403);
        }

        $approvalVehicle = ApprovalVehicle::findOrFail($id);

        if (isset($approvalVehicle->price_amount) && isset($approvalVehicle->deposit_amount)){
            if ( $approvalVehicle->deposit_amount - $approvalVehicle->price_amount < 10000){
                return redirect()->back();
            }
        } else {
            $approvalVehicle->price_amount = 0;
            $approvalVehicle->deposit_amount = 0;
        }

        $vehicle = Vehicle::create([
            'owner_id' => $approvalVehicle->owner_id,
            'brand' => $approvalVehicle->brand,
            'model' => $approvalVehicle->model,
            'year' => $approvalVehicle->year,
            'plate_number' => $approvalVehicle->plate_number,
            'profile' => $approvalVehicle->profile,
            'transmission_id' => $approvalVehicle->transmission_id,
            'type_id' => $approvalVehicle->type_id,
            'color' => $approvalVehicle->color,
            'description' => $approvalVehicle->description,
            'fuel_type' => $approvalVehicle->fuel_type,
            'seats' => $approvalVehicle->seats,
            'engine_capacity' => $approvalVehicle->engine_capacity,
            'status' => 'Active',
            'price_amount' => $approvalVehicle->price_amount,
            'deposit_amount' => $approvalVehicle->deposit_amount,
        ]);

        VehicleDocument::create([
            'vehicle_id' => $vehicle->id,
            'front_photo' => $approvalVehicle->front_photo,
            'left_photo' => $approvalVehicle->left_photo,
            'right_photo' => $approvalVehicle->right_photo,
            'back_photo' => $approvalVehicle->back_photo,
            'odometer_photo' => $approvalVehicle->odometer_photo,
            'chassis_photo' => $approvalVehicle->chassis_photo,
            'selfie_photo' => $approvalVehicle->selfie_photo,
            'stnk_photo' => $approvalVehicle->stnk_photo,
            'stnk_due_date' => $approvalVehicle->stnk_due_date,
            'status' => 'Valid',
        ]);

        UserHistory::record(
            'Kendaraan',
            'Menyetujui kendaraan ' . $approvalVehicle->brand . ' ' . $approvalVehicle->model . ' milik user id' . $approvalVehicle->applicant->id,
        );

        Message::message(
            $approvalVehicle->owner_id,
            'Kendaraan Anda Disetujui',
            'Announcement',
            'Kendaraan Anda dengan merk ' . $approvalVehicle->brand . ' dan model ' . $approvalVehicle->model . ' telah disetujui oleh admin. Silakan cek kendaraan Anda di halaman kendaraan.',
        );

        $approvalVehicle->status = "Approved";
        $approvalVehicle->save();

        return redirect()->route('approval-vehicle.index')->with('success', 'Approval kendaraan berhasil dilakukan.');
    }



    public function rejection($id){
        
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(403);
        }

        $approvalVehicle = ApprovalVehicle::where('status', 'Pending')->findOrFail($id);
        return view('pages.admin.approval.vehicle.rejection', compact('approvalVehicle'));
    }


    public function reject(Request $request, $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(403);
        }

        $approvalVehicle = ApprovalVehicle::findOrFail($id);

        // HistoryApprovalVehicle::create([
        //     "reviewer_id" => $user->id,
        //     "reviewer_profile" => $user->profile,
        //     "reviewer_name" => $user->name,
        //     "reviewer_email" => $user->email,
        //     "reviewer_telp" => $user->telp,

        //     "owner_id" => $approvalVehicle->owner_id,
        //     "owner_name" => $approvalVehicle->full_name,
        //     "owner_email" => $approvalVehicle->applicant->email,
        //     "owner_telp" => $approvalVehicle->applicant->telp,
        //     "owner_profile" => $approvalVehicle->applicant->profile,

        //     "type_id" => $approvalVehicle->type_id,
        //     "transmission_id" => $approvalVehicle->transmission_id,
        //     "profile" => $approvalVehicle->profile,
        //     "plate_number" => $approvalVehicle->plate_number,
        //     "brand" => $approvalVehicle->brand,
        //     "year" => $approvalVehicle->year,
        //     "color" => $approvalVehicle->color,
        //     "model" => $approvalVehicle->model,
        //     "description" => $approvalVehicle->description,
        //     "fuel_type" => $approvalVehicle->fuel_type,
        //     "engine_capacity" => $approvalVehicle->engine_capacity,
        //     "seats" => $approvalVehicle->seats,
        //     "front_photo" => $approvalVehicle->front_photo,
        //     "left_photo" => $approvalVehicle->left_photo,
        //     "right_photo" => $approvalVehicle->right_photo,
        //     "back_photo" => $approvalVehicle->back_photo,
        //     "odometer_photo" => $approvalVehicle->odometer_photo,
        //     "chassis_photo" => $approvalVehicle->chassis_photo,
        //     "selfie_photo" => $approvalVehicle->selfie_photo,
        //     "stnk_photo" => $approvalVehicle->stnk_photo,
        //     "stnk_due_date" => $approvalVehicle->stnk_due_date,
        //     "status" => "Rejected",
        //     "rejected_reason" => $request->rejected_reason,
        // ]);

        UserHistory::record(
            'Kendaraan',
            'Menolak kendaraan ' . $approvalVehicle->brand . ' ' . $approvalVehicle->model . ' milik user id' . $approvalVehicle->applicant->id,
        );

        Message::message(
            $approvalVehicle->owner_id,
            'Kendaraan Anda Ditolak',
            'Announcement',
            'Kendaraan Anda dengan merk ' . $approvalVehicle->brand . ' dan model ' . $approvalVehicle->model . ' telah ditolak oleh admin. Alasan penolakan: ' . $request->rejected_reason,
        );

        $approvalVehicle->status = "Rejected";
        $approvalVehicle->rejected_reason = $request->rejected_reason;
        $approvalVehicle->save();

        return redirect()->route('approval-vehicle.index')->with('success', 'Approval kendaraan berhasil ditolak.');
    }
}
