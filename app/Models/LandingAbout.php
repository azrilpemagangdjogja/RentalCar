<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingAbout extends Model
{
    protected $table = "landing_page_about";
    protected $fillable = [
        "image",
        "card_description",
        "title",
        "status",
        "subtitle",
        "description_1",
        "description_2",
        "feature_1_title",
        "feature_1_description",
        "feature_2_title",
        "feature_2_description",
        "card_title",
        "card_description",
    ];
}
