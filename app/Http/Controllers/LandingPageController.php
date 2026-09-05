<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingHero;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $hero = LandingHero::first();
        return view('landing-page', compact('hero'));
    }
}
