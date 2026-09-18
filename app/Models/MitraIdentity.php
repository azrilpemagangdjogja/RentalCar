<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraIdentity extends Model
{
    protected $table = 'mitra_identities';
    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'telp',
        'nik',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
