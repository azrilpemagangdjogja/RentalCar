<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use App\Models\LandingHowto;

class AdminLandingHowtoController extends Controller
{
    public function howto()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $howToUse = LandingHowto::first();
        return view('pages.admin.landing-page.howto', compact('howToUse'));
    }
    public function howtoedit()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $howToUse = LandingHowto::first();
        return view('pages.admin.landing-page.howtoedit', compact('howToUse'));
    }
    public function howtoupdate(Request $request, string $id)
    {
        $user = auth()->user();

        if ($user->role != "Admin" && $user->role != "Superadmin") {
            abort(404);
        }

        $data = $request->validate([
            "status" => "required",
            "subtitle" => "required",
            "title" => "required",
            "description" => "required",
            "step_1_title" => "required",
            "step_1_description" => "required",
            "step_2_title" => "required",
            "step_2_description" => "required",
            "step_3_title" => "required",
            "step_3_description" => "required",

        ]);


        $landingHowto = LandingHowto::findOrFail($id);
        $landingHowto->fill($data);

        if ($landingHowto->isDirty()) {
            $landingHowto->save();
            UserHistory::record(
                "Landing Page",
                $user->name . " Mengubah data untuk landing page section How To Use",
            );
        }

        return redirect()->route('landing.howto');
    }

    public function howtocreate(Request $request)
    {
        $user = auth()->user();

        if ($user->role != "Admin" && $user->role != "Superadmin") {
            abort(404);
        }

        $data = $request->validate([
            "status" => "required",
            "subtitle" => "required",
            "title" => "required",
            "description" => "required",
            "step_1_title" => "required",
            "step_1_description" => "required",
            "step_2_title" => "required",
            "step_2_description" => "required",
            "step_3_title" => "required",
            "step_3_description" => "required",
        ]);

        LandingHowto::create($data);

        UserHistory::record(
            "Landing Page",
            $user->name . " Membuat data untuk landing page section How To Use",
        );

        return redirect()->route('landing.howto');
    }
}
