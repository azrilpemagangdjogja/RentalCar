<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;

class LayoutsController extends Controller
{
    public function index(){
        return view("pages.admin.dashboard.index");
    }
    public function indexmitra(){
        return view("pages.mitra.dashboard.index");
    }
    public function indexcustomer(){

        $recommendedVehicles = Vehicle::inRandomOrder()
            ->where('status', 'Active')
            ->where('pickup_location_id', '!=', 'NULL')
            ->take(5)
            ->get();
        $otherVehicles = Vehicle::inRandomOrder()->where('status', 'Active')->take(3)->get();
        $vehicles = Vehicle::inRandomOrder()->where('status', 'Active')->take(3)->get();
        $areas = Vehicle::inRandomOrder()->where('status', 'Active')->take(3)->get();
        return view("pages.customer.dashboard.index", compact(['recommendedVehicles', 'otherVehicles', 'vehicles', 'areas']));
    }
}
