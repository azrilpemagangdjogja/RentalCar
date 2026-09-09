<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    protected $table = 'user_histories';
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_profile',
        'user_telp',
        'activity',
        'description',
    ];

        public static function record($activity, $description){
            self::create([
                "user_id" => auth()->user()->id,
                "user_name" => auth()->user()->name,
                "user_email" => auth()->user()->email,
                "user_telp" => auth()->user()->telp,
                "user_profile" => auth()->user()?->profile,

                "activity" => $activity,
                "description" => $description,
            ]);
        }
}
