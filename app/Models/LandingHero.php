<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingHero extends Model
{
    protected $table = "landing_page_hero";
    protected $fillable = [
        "background_image",
        "badge",
        "status",
        "title",
        "description",
        "primary_button_text",
        "primary_button_url",
        "secondary_button_text",
        "secondary_button_url",
        "feature_1_title",
        "feature_1_description",
        "feature_2_title",
        "feature_2_description",
        "feature_3_title",
        "feature_3_description",
    ];
}
