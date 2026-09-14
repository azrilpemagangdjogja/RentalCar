<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingHero;
use App\Models\LandingAbout;
use App\Models\LandingHowto;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $hero = LandingHero::first();
        $about = LandingAbout::first();
        $howto = LandingHowto::first();
        $vehicle =  Vehicle::where('status', 'Active')->where('pickup_location_id', '!=', null)->get();
        return view('landing-page', compact(['hero', 'about', 'howto', 'vehicle']));
    }
}
