<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AppIdentity;
use Illuminate\Http\Request;

class AppIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }
        $setting = AppIdentity::first();
        return view('pages.admin.app-identity.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }
        $setting = AppIdentity::first();
        return view('pages.admin.app-identity.edit', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        $data = $request->validate([
            "app_name" => "required|max:24|string",
            "app_description" => "required|max:56|string",
            "app_logo" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            "app_favicon" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            "app_email" => "required|email",
            "app_whatsapp" => "required|min:10|max:20",
            "app_owner" => "required|string|max:42",
        ]);

        $app = AppIdentity::exists();
        if (!$app) {

            if ($request->hasFile('app_logo')) {
                $data['app_logo'] = $request->file('app_logo')->store('app_icon', 'public');
            }

            if ($request->hasFile('app_favicon')) {
                $data['app_favicon'] = $request->file('app_favicon')->store('app_favicon', 'public');
            }
            
            AppIdentity::create($data);
            $setting = AppIdentity::first();
            return view('pages.admin.app-identity.index', compact('setting'));
        } else {
            if ($request->hasFile('app_logo')) {
                $data['app_logo'] = $request->file('app_logo')->store('app_icon', 'public');
            }

            if ($request->hasFile('app_favicon')) {
                $data['app_favicon'] = $request->file('app_favicon')->store('app_favicon', 'public');
            }

            AppIdentity::first()->update($data);
            $setting = AppIdentity::first();
            return view('pages.admin.app-identity.index', compact('setting'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
