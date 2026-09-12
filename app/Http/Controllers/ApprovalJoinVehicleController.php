<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApprovalJoinVehicle;

class ApprovalJoinVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvement = ApprovalJoinVehicle::all();
        return view('pages.admin.approval.pickup-location.index', compact('approvement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(404);
        }

        $approvement = ApprovalJoinVehicle::findOrFail($id);
        return view('pages.admin.approval.pickup-location.show', compact('approvement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
