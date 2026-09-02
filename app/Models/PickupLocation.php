<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PickupLocation extends Model
{
    protected $table = "pickup_locations";
    protected $fillable = [
        "owner_id",
        "name",
        "address",
        "latitude",
        "longitude",
        "description",
        "status",
        "max_vehicle",
    ];

    public function vehicles(){
        return $this->hasMany(Vehicle::class, "pickup_location_id");
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }
}
