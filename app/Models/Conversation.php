<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';
    protected $fillable = [
        'participant_one_id',
        'participant_two_id',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
