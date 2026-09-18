<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use App\Models\MitraIdentity;
use App\Models\Message;

class ApprovalMitraIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            abort(404);
        }

        $approvement = MitraIdentity::with('user')->orderBy('created_at', 'desc')->where('status', 'Pending')->paginate(10);
        return view('pages.admin.approval.mitra.index', compact('approvement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function approve(string $id)
    {
        $user = auth()->user();
        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }

        $mitraIdentity = MitraIdentity::findOrFail($id);
        $mitraIdentity->status = 'Approved';
        $mitraIdentity->save();

        $mitraStatus = $mitraIdentity->user;
        $mitraStatus->mitra_status = 'Verified';
        $mitraStatus->save();

        UserHistory::record(
            "Identitas Mitra",
            $user->name . " menyetujui " . $mitraStatus->name . " menjadi bagian mitra"
        );

        $conversation = Conversation::where(function ($query) use ($user){
            $query->where('participant_one_id', $user->id)
                ->orWhere('participant_two_id', $user->id);
        })->where(function ($query) use ($mitraStatus){
            $query->where('participant_one_id', $mitraStatus->id)
                ->orWhere('participant_two_id', $mitraStatus->id);
        })->first();

        if (!$conversation){
            Conversation::create([
                "participant_one_id" => $user->id,
                "participant_two_id" => $mitraStatus->id,
            ]);
        }

        $conversation = Conversation::where(function ($query) use ($user){
            $query->where('participant_one_id', $user->id)
                ->orWhere('participant_two_id', $user->id);
        })->where(function ($query) use ($mitraStatus){
            $query->where('participant_one_id', $mitraStatus->id)
                ->Orwhere('participant_two_id', $mitraStatus->id);
        })->first();

        Message::message(
            $mitraStatus->id, "Kamu diterima untuk menjadi anggota mitra", "Message", null, $user->id, $conversation->id
        );

        return redirect()->back()->with('success', 'Mitra identity approved successfully.');
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
