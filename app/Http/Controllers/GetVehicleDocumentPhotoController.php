<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApprovalVehicle;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;

class GetVehicleDocumentPhotoController extends Controller
{
    public function photo(ApprovalVehicle $vehicle, string $photo){
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(403);
        }

        $allowedPhoto = [
            "chassis_photo",
            "stnk_photo",
            "tax_proof_photo",
            "odometer_photo",
        ];

        if (!in_array($photo, $allowedPhoto)){
            abort(404);
        }

        $path = $vehicle->{$photo};
        return Storage::disk('local')->response($path);
    }
    public function approval(ApprovalVehicle $vehicle, string $photo){
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(403);
        }

        $allowedPhoto = [
            "chassis_photo",
            "stnk_photo",
            "tax_proof_photo",
            "odometer_photo",
        ];

        if (!in_array($photo, $allowedPhoto)){
            abort(404);
        }

        $path = $vehicle->{$photo};
        return Storage::disk('local')->response($path);
    }
}
