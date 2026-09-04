<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regionfilter;

class RegionFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionFilters = RegionFilter::all();
        return view("pages.admin.region-filter.index", compact("regionFilters"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.region-filter.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $data =  $request->validate([
            "name"=> "required|unique:region_filters,name",
            "description"=> "nullable",
        ]);

        Regionfilter::create($data);
        return redirect()->route("region-filter.index")->with("success","data berhasil ditambahkan");
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
        $regionFilter = Regionfilter::findOrFail($id);
        return view("pages.admin.region-filter.edit", compact("regionFilter"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(404);
        }

        $data = $request->validate([
            "name"=> "required|unique:region_filters,name",
            "description"=> "nullable",
        ]);
        Regionfilter::findOrFail($id)->update($data);

        return redirect()->route("region-filter.index")->with("success","data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
