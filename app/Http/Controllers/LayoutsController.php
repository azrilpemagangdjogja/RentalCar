<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PickupLocation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\RegionFilter;

class LayoutsController extends Controller
{
    public function index(){
        return view("pages.admin.dashboard.index");
    }
    public function indexmitra(){
        $user =  auth()->user();

        if ($user->mitra_status !== "Verified"){
            abort(403);
        }
        $pickupLocations = PickupLocation::where('status', 'Active')->withCount('vehicles')
        // ->whereExists(function ($query) use ($user) {
        //     $query->selectRaw(1)
        //           ->from('vehicles')
        //           ->whereColumn('vehicles.pickup_location_id', 'pickup_locations.id')
        //           ->where('vehicles.owner_id', auth()->user()->id);
        // })
        ->get()->filter(function ($item){
            return $item->vehicle_count < $item->max_vehicle;
        });
        $vehicles = Vehicle::where('status', 'Active')->where('owner_id', $user->id)->get();
        $placedVehicles = PickupLocation::where('status', 'Active')->withCount('vehicles')->whereExists(function ($query) use ($user) {
            $query->selectRaw('1')
                  ->from('vehicles')
                  ->whereColumn('vehicles.pickup_location_id', 'pickup_locations.id')
                  ->where('vehicles.owner_id', $user->id);
        })->get()->filter(function ($item){
            return $item->vehicle_count < $item->max_vehicle;
        });
        return view("pages.mitra.dashboard.index", compact('pickupLocations', 'vehicles', 'placedVehicles'));
    }
    public function indexcustomer(){

        $recommendedVehicles = Vehicle::inRandomOrder()
            ->where('status', 'Active')
            ->where('pickup_location_id', '!=', 'NULL')
            ->take(5)
            ->get();
        $otherVehicles = Vehicle::inRandomOrder()->where('status', 'Active')->take(6)->get();
        $vehicles = Vehicle::inRandomOrder()->where('status', 'Active')->get();
        $areas = RegionFilter::orderBy('name')->get();
        return view("pages.customer.dashboard.index", compact(['recommendedVehicles', 'otherVehicles', 'vehicles', 'areas']));
    }
}
