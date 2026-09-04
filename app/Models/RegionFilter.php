<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionFilter extends Model
{
    protected $table = "region_filters";
    protected $fillable = [
        "name",
        "description",
    ] ;
}
