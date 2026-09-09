<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use App\Models\LandingAbout;

class AdminLandingAboutController extends Controller
{
    public function about()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $about = LandingAbout::first();
        return view('pages.admin.landing-page.about', compact('about'));
    }
    public function aboutedit()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $about = LandingAbout::first();
        return view('pages.admin.landing-page.aboutedit', compact('about'));
    }
    public function aboutupdate(Request $request, string $id)
    {
        $user = auth()->user();

        if ($user->role != "Admin" && $user->role != "Superadmin") {
            abort(404);
        }

        $data = $request->validate([
            "image" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            "title" => "required",
            "subtitle" => "required",
            "status" => "required",
            "description_1" => "required",
            "description_2" => "required",
            "feature_1_title" => "required",
            "feature_1_description" => "required",
            "feature_2_title" => "required",
            "feature_2_description" => "required",
            "card_title" => "required",
            "card_description" => "required",

        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('landing_page_about_image', 'public');
        } else {
            unset($data['image']);
        }

        $landingAbout = LandingAbout::findOrFail($id);
        $landingAbout->fill($data);

        if ($landingAbout->isDirty()) {
            $landingAbout->save();
            UserHistory::record(
                "Landing Page",
                $user->name . " Mengubah data untuk landing page section About"
            );
        }

        return redirect()->route('landing.about');
    }

    public function aboutcreate(Request $request)
    {
        $user = auth()->user();

        if ($user->role != "Admin" && $user->role != "Superadmin") {
            abort(404);
        }

        $data = $request->validate([
            "image" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            "title" => "required",
            "subtitle" => "required",
            "status" => "required",
            "description_1" => "required",
            "description_2" => "required",
            "feature_1_title" => "required",
            "feature_1_description" => "required",
            "feature_2_title" => "required",
            "feature_2_description" => "required",
            "card_title" => "required",
            "card_description" => "required",
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('landing_page_about_image', 'public');
        } else {
            unset($data['image']);
        }

        LandingAbout::create($data);

        UserHistory::record(
            "Landing Page",
            $user->name . " Membuat data untuk landing page section About"
        );

        return redirect()->route('landing.about');
    }
}
