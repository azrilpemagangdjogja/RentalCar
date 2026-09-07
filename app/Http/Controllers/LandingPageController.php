<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingHero;
use App\Models\LandingAbout;
use App\Models\LandingHowto;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $hero = LandingHero::first();
        $about = LandingAbout::first();
        $howto = LandingHowto::first();
        return view('landing-page', compact(['hero', 'about', 'howto']));
    }
}
