<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'conversation_id',
        'category',
        'sender_id',
        'receiver_id',
        'title',
        'message',
        'status',
    ];

    public static function message($receiver_id, $message, $category, $title = null, $sender_id = null, $conversation_id = null)
    {
        self::create([
            'receiver_id' => $receiver_id,
            'message' => $message,
            'category' => $category,
            'title' => $title,
            'sender_id' => $sender_id,
            'conversation_id' => $conversation_id,
        ]);
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
