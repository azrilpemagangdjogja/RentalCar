<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppIdentity extends Model
{
    protected $table = "app_identities";

    protected $fillable = [
        'app_name',
        'app_logo',
        'app_description',
        'app_whatsapp',
        'app_favicon',
        'app_email',
        'app_owner',
    ];
}
