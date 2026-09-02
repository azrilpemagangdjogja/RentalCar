<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $totalUsers = $users->count();
        $totalRoleUsers = $users->where('role', 'User')->count();
        $totalRoleAdmins = $users->where('role', 'Admin')->count();
        $totalRoleSuperadmins = $users->where('role', 'Superadmin')->count();
        return view("pages.admin.user.index", compact(["users", "totalUsers", "totalRoleUsers", "totalRoleAdmins", "totalRoleSuperadmins"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'telp' => 'required',
            'role' => 'required',
            'mitra_status' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $data['password'] = bcrypt($data['password']);

        if ($request->hasFile('profile')) {
            $data['profile'] = $request->file('profile')->store('profiles', 'public');
        }
    
        User::create($data);

        

        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.user.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'telp' => 'required',
            'role' => 'required',
            'mitra_status' => 'required',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('profile')) {
            $data['profile'] = $request->file('profile')->store('profiles', 'public');
        }

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
