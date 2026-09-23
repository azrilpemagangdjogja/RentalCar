<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use Illuminate\Http\Request;

class UserHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $search = $request->search;
        if ($user->role == "Admin" || $user->role == "Superadmin"){
            $history = UserHistory::orderByDesc('created_at');
            $todayHistory = UserHistory::whereToday('created_at')->count();
        } else {
            $history = UserHistory::where('user_id', $user->id)->orderByDesc('created_at');
            $todayHistory = UserHistory::where('user_id', $user->id)->whereToday('created_at')->count();
        }

        $histories = $history->paginate(30);

        if (isset($search)){
            $histories = $history->where(function ($query) use ($search){
                $query->where('activity', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('user_email', 'LIKE', '%' . $search . '%')
                    ->orWhere('user_telp', 'LIKE', '%' . $search . '%')
                    ->orWhere('user_name', 'LIKE', '%' . $search . '%');
            })->paginate(30);
        }

        return view('pages.user-history.index', compact(['histories', 'todayHistory']));
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
        //
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
