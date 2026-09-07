<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingHowto;

class AdminLandingHowtoController extends Controller
{
    public function howto(){
        $howToUse = LandingHowto::first();
        return view('pages.admin.landing-page.howto', compact('howToUse'));
    }
    public function howtoedit(){
        $howToUse = LandingHowto::first();
        return view('pages.admin.landing-page.howtoedit', compact('howToUse'));
    }
    public function howtoupdate(Request $request, string $id){
        $user =  auth()->user();

        if ($user->role != "Admin" && $user->role != "Superadmin"){
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
        $landingHowto->update($data);

        return redirect()->route('landing.howto');
    }

    public function howtocreate(Request $request){
        $user =  auth()->user();

        if ($user->role != "Admin" && $user->role != "Superadmin"){
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

        return redirect()->route('landing.howto');
    }
}
