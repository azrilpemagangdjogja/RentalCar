<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use App\Models\MitraIdentity;
use App\Models\ApprovalMitraIdentity;
use App\Models\RentalTime;
use App\Models\User;
use App\Models\Message;

class MitraIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $mitraIdentity = MitraIdentity::where('user_id', $user->id)->first();

        if ($user->applicantMitra()->exists() && $user->mitra_status !== "Verified") {
            return view('pages.mitra.mitra_verification.wascreate');
        }
        if ($user->mitra_status == "Verified" || $mitraIdentity) {
        }
        return view('pages.mitra.mitra_verification.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $mitraIdentity = ApprovalMitraIdentity::where('applicant_id', $user->id)->first();
        if ($user->mitra_status == "Verified") {
            return view('pages.mitra.mitra_verification.wascreate');
        } elseif ($mitraIdentity) {
            return view('pages.mitra.mitra_verification.wascreate');
        }

        return view('pages.mitra.mitra_verification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->mitra_status == 'Verified') {
            return redirect()->back()->with('error', 'Kamu sudah memiliki atau mendaftar sebagai mitra.');
        }

        $mitraVerifiedCheck = ApprovalMitraIdentity::where('applicant_id', $user->id)->first();
        if ($mitraVerifiedCheck) {
            return redirect()->back()->with('error', 'Kamu sudah memiliki atau mendaftar sebagai mitra.');
        }

        $mitraIdentity = $request->validate([
            'nik' => 'required|unique:mitra_identities,nik',
            'full_name' => 'required|string|max:255',
            'ktp_photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $mitraIdentity['applicant_id'] = $user->id;

        if ($request->hasFile('ktp_photo')) {
            $mitraIdentity['ktp_photo'] = $request->file('ktp_photo')->store('mitra_identities/ktp_photos', 'private');
        } else {
            unset($data['profile']);
            return back()->withErrors('file kosong');
        }

        ApprovalMitraIdentity::create($mitraIdentity);

        UserHistory::record(
            "Mitra",
            $user->name . " mengajukan permintaan verifikasi mitra pada " . now()->format('d-m-Y H:i:s'),
        );

        Message::message(
            $user->id,
            "Halo " . $mitraIdentity['full_name'] . ", permintaan anda saat ini sedang di proses, kami akan segera memberitahu anda saat
            permintaan di terima oleh pihak kami. Kami berterima kasih atas kerjasama anda dalam membangun RentalCar
            menjadi platform yang dapat dipercaya oleh semua orang. Mohon bersabar, untuk konfirmasi pengajuan akan selesai
            dalam kurang dari 1 hari :)",
            "Announcement",
            "Pengajuan Mitra",
        );

        return redirect()->back()->with('success', 'Permintaan verifikasi mitra berhasil diajukan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
