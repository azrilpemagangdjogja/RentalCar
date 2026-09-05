<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class SearchController extends Controller
{
    public function customer(Request $request){
        $search = $request->search;
        $searchedVehicle = Vehicle::where('status', 'Active')
        ->whereNotNull('pickup_location_id')
        ->where(function ($query) use ($search){
            $query->where('deposit_amount','like','%'.$search.'%')
            ->orWhere("model",'LIKE' ,'%' . $search . '%')
            ->orWhere("color",'LIKE' ,'%' . $search . '%')
            ->orWhere("brand",'LIKE' ,'%' . $search . '%')
            ->orWhere("seats",'LIKE' ,'%' . $search . '%');
        })
        ->get();

        $otherVehicles = Vehicle::where('status', 'Active')->where('pickup_location_id', '!=', null)->get();

        return view('pages.customer.search.index',compact(['searchedVehicle','otherVehicles']));
    }
}
