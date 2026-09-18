<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use App\Models\MitraIdentity;
use App\Models\User;

class MitraIdentityController extends Controller
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
        return view('pages.mitra.mitra_verification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->mitra_status === 'Verified') {
            return redirect()->back()->with('error', 'Kamu sudah memiliki atau mendaftar sebagai mitra.');
        }

        $mitraVerifiedCheck = MitraIdentity::where('user_id', $user->id)->first();
        if ($mitraVerifiedCheck) {
            return redirect()->back()->with('error', 'Kamu sudah memiliki atau mendaftar sebagai mitra.');
        }

        $mitraIdentity = $request->validate([
            'nik' => 'required|unique:mitra_identities,nik',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:mitra_identities,email',
            'telp' => 'required|string|max:20|unique:mitra_identities,telp',
        ]);

        $mitraIdentity['user_id'] = $user->id;

        MitraIdentity::create($mitraIdentity);

        UserHistory::record(
            "Mitra",
            $user->name . " mengajukan permintaan verifikasi mitra pada " . now()->format('d-m-Y H:i:s'),
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
