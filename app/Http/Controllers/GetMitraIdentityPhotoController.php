<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApprovalMitraIdentity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GetMitraIdentityPhotoController extends Controller
{
    public function photo(ApprovalMitraIdentity $mitra, string $photo){
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(403);
        }

        $allowedPhoto = [
            "ktp_photo",
        ];

        if (!in_array($photo, $allowedPhoto)){
            abort(404);
        }

        $path = $mitra->{$photo};
        return Storage::disk('local')->response($path);
    }
    public function approval(ApprovalMitraIdentity $mitra, string $photo){
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(403);
        }

        $allowedPhoto = [
            "ktp_photo",
        ];

        if (!in_array($photo, $allowedPhoto)){
            abort(404);
        }

        $path = $mitra->{$photo};
        return Storage::disk('local')->response($path);
    }   
}
