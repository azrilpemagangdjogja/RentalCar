<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingHowto extends Model
{
    protected $table = "landing_page_howto";
    protected $fillable = [
        "status",
        "subtitle",
        "title",
        "description",
        "step_1_title",
        "step_1_description",
        "step_2_title",
        "step_2_description",
        "step_3_title",
        "step_3_description",
    ];
}
