<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RentalTime;

class RentalTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(404);
        }
        $rentalTimes = RentalTime::all();
        return view('pages.admin.rental-times.index', compact('rentalTimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(404);
        }
        
        return view('pages.admin.rental-times.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(404);
        }

        $data = $request->validate([
            "day" => "required|integer",
            "description" => "required",
            "status" => "required",
        ]);

        RentalTime::create($data);

        return redirect()->route('rental-time.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(404);
        }
        
        $rentalTime = RentalTime::findOrFail($id);
        return view('pages.admin.rental-times.edit', compact('rentalTime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin"){
            abort(404);
        }

        $data = $request->validate([
            "day" => "required|integer",
            "description" => "required",
            "status" => "required",
        ]);

        $rentalTime = RentalTime::findOrFail($id);
        $rentalTime->update($data);

        return redirect()->route('rental-time.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
