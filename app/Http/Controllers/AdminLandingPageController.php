<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingHero;
use Illuminate\Http\Request;

class AdminLandingPageController extends Controller
{
    public function hero(){
        $hero = LandingHero::first();
        return view('pages.admin.landing-page.hero', compact('hero'));
    }
    public function heroedit(){
        $hero = LandingHero::first();
        return view('pages.admin.landing-page.heroedit', compact('hero'));
    }
    public function heroupdate(Request $request, string $id){
        $user =  auth()->user();

        if ($user->role != "Admin" && $user->role != "Superadmin"){
            abort(404);
        }

        $data = $request->validate([
            "badge" => "required",
            "background_image" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            "title" => "required",
            "description" => "required",
            "primary_button_text" => "required",
            "primary_button_url" => "required",
            "secondary_button_text" => "required",
            "secondary_button_url" => "required",
            "feature_1_title" => "required",
            "feature_1_description" => "required",
            "feature_2_title" => "required",
            "feature_2_description" => "required",
            "feature_3_title" => "required",
            "feature_3_description" => "required",
            "status" => "required",
        ]);

        if ($request->hasFile('background_image')){
            $data['background_image'] = $request->file('background_image')->store('landing_page_hero_background', 'public');
        } else {
            unset($data['background_image']);
        }

        $landingHero = LandingHero::findOrFail($id);
        $landingHero->update($data);

        return redirect()->route('landing.hero');
    }

    public function herocreate(Request $request){
        $user =  auth()->user();

        if ($user->role != "Admin" && $user->role != "Superadmin"){
            abort(404);
        }

        $data = $request->validate([
            "badge" => "required",
            "background_image" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "title" => "required",
            "description" => "required",
            "primary_button_text" => "required",
            "primary_button_url" => "required",
            "secondary_button_text" => "required",
            "secondary_button_url" => "required",
            "feature_1_title" => "required",
            "feature_1_description" => "required",
            "feature_2_title" => "required",
            "feature_2_description" => "required",
            "feature_3_title" => "required",
            "feature_3_description" => "required",
            "status" => "required",
        ]);

        if ($request->hasFile($data['background_image'])){
            $data['background_image'] = $request->file('background_image')->store('landing_page_hero_background', 'public');
        } else {
            unset($data['background_image']);
        }

        LandingHero::create($data);

        return redirect()->route('landing.hero');
    }
}
