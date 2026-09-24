<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $message = Conversation::where(function ($query) use ($user) {
            $query->where('participant_one_id', $user->id)
                ->orWhere('participant_two_id', $user->id);
        })
            ->with([
                'messages' => function ($query) {
                    $query->latest()->limit(1);
                }
            ])
            ->get();

        $announcement = Message::where('receiver_id', $user->id)->where('conversation_id', null)->where('status', 'Unreaded')->orderBy('created_at', 'desc')->get();
        $readedAnnouncement = Message::where('receiver_id', $user->id)->where('conversation_id', null)->where('status', 'readed')->orderBy('created_at', 'desc')->paginate(30);
        return view('pages.message.index', compact(['message', 'announcement', 'readedAnnouncement']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $user = auth()->user();
        $message = Message::whereHas('conversation', function ($query) use ($user) {
            $query->where('participant_one_id', $user->id)
                ->orWhere('participant_two_id', $user->id);
        })->whereHas('conversation', function ($query) use ($id) {
            $query->where('participant_one_id', $id)
                ->orWhere('participant_two_id', $id);
        })->first();
        $receiver = User::findOrFail($id);

        return view('pages.message.show-message', compact(['message', 'receiver']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function new(Request $request, string $id)
    {
        $user = auth()->user();
        $conversation = Conversation::where(function ($query) use ($user) {
            $query->where('participant_one_id', $user->id)
                ->orWhere('participant_two_id', $user->id);
        })->where(function ($query) use ($id) {
            $query->where('participant_one_id', $id)
                ->orWhere('participant_two_id', $id);
        })->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'participant_one_id' => $user->id,
                'participant_two_id' => $id,
            ]);
        }

        Message::message(
            $id,
            $request->message,
            "Message",
            null,
            $user->id,
            $conversation->id,
        );

        return redirect()->route('message.create', $id);
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $user = auth()->user();
        $message = Message::findOrFail($id);
        $receiver = $message->receiver;

        if ($user->id == $receiver->id) {
            $message->status = 'Readed';
            $message->save();
        }

        if ($receiver->id == $user->id) {
            $receiver = $message->sender;
        }

        if ($message->category == "Message") {
            $conversation = Conversation::where(function ($query) use ($user) {
                $query->where('participant_one_id', $user->id)
                    ->orWhere('participant_two_id', $user->id);
            })->where(function ($query) use ($receiver) {
                $query->where('participant_one_id', $receiver->id)
                    ->orWhere('participant_two_id', $receiver->id);
            })->first();
            $message = Message::where('conversation_id', $conversation->id)->get();
            
            return view('pages.message.show-message', compact(['message', 'receiver']));
        }

        return view('pages.message.show', compact('message'));
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
        $user = auth()->user();

        $message = Message::where('status', 'Readed')->whereNull('conversation_id')->findOrFail($id);
        if ($message->receiver_id == $user->id){
            $message->delete();
        } else {
            abort(403);
        }
        return redirect()->route('message.index');
    }



    public function send(Request $request, string $id)
    {
        $user = auth()->user();
        $conversation = Conversation::where(function ($query) use ($user) {
            $query->where('participant_one_id', $user->id)
                ->orWhere('participant_two_id', $user->id);
        })->where(function ($query) use ($id) {
            $query->where('participant_one_id', $id)
                ->orWhere('participant_two_id', $id);
        })->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'participant_one_id' => $user->id,
                'participant_two_id' => $id,
            ]);
        }

        if ($id == $user->id) {
            abort(404);
        }

        Message::message(
            $id,
            $request->message,
            "Message",
            null,
            $user->id,
            $conversation->id
        );

        $message = Message::where('receiver_id', $id)->where('sender_id', $user->id)->where('conversation_id', $conversation->id)->first();


        return redirect()->route('message.show', $message->id);
    }
}
