<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\Redirect;
use illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        $search = $request->search;

        if ($user->role == "Admin") {
            $users = User::whereNot('id', $user->id)->where('role', 'User')->paginate(25);
            if ($request->search) {
                $users = User::where(function ($query) use ($search) {
                    $query->where("id", 'LIKE', '%' . $search . '%')
                        ->orWhere("name", 'LIKE', '%' . $search . '%')
                        ->orWhere("telp", 'LIKE', '%' . $search . '%')
                        ->orWhere("mitra_status", 'LIKE', '%' . $search . '%')
                        ->orWhere("role", 'LIKE', '%' . $search . '%')
                        ->orWhere("email", 'LIKE', '%' . $search . '%');
                })
                ->whereNot('id', $user->id)
                ->where('role', 'User')
                ->paginate(25);
            }
        } elseif ($user->role = "Superadmin"){
            $users = User::whereNot('id', $user->id)->paginate(25);
            if ($request->search) {
                $users = User::where(function ($query) use ($search) {
                    $query->where("id", 'LIKE', '%' . $search . '%')
                        ->orWhere("name", 'LIKE', '%' . $search . '%')
                        ->orWhere("telp", 'LIKE', '%' . $search . '%')
                        ->orWhere("mitra_status", 'LIKE', '%' . $search . '%')
                        ->orWhere("role", 'LIKE', '%' . $search . '%')
                        ->orWhere("email", 'LIKE', '%' . $search . '%');
                })
                ->whereNot('id', $user->id)
                ->paginate(25);
            }
        }

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
        $user = auth()->user();

        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }
        return view("pages.admin.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
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

        UserHistory::record(
            "User",
            $user->name . " Menambahkan user " . $data['name']
        );

        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = auth()->user();

        if ($users->role !== "Admin" && $users->role !== "Superadmin") {
            abort(403);
        }

        $conversation = Conversation::where(function ($query) use ($users) {
            $query->where('participant_one_id', $users->id)
                ->orWhere('participant_two_id', $users->id);
        })->where(function ($query) use ($id) {
            $query->where('participant_one_id', $id)
                ->Orwhere('participant_two_id', $id);
        })->first();

        $user = User::findOrFail($id);
        return view('pages.admin.user.show', compact(['user', 'conversation']));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = auth()->user();

        if ($users->role !== "Admin" && $users->role !== "Superadmin") {
            abort(403);
        }

        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = auth()->user();

        if ($users->role !== "Admin" && $users->role !== "Superadmin") {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
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
        $user->fill($data);
        if ($user->isDirty()) {

            $user->save();
            UserHistory::record(
                "User",
                $users->name . " Mengubah user " . $user->name
            );
        }

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        if ($user->role !== "Admin" && $user->role !== "Superadmin") {
            abort(403);
        }

        $users = User::findOrFail($id);
        UserHistory::record(
            "Pengguna",
            $user->name . " menghapus akun " . $users->name . " dengan email " . $users->email
        );
        $users->delete();

        return redirect()->route('user.index');
    }
}
