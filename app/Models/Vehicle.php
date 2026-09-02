<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        "owner_id",
        "type_id",
        "pickup_location_id",
        "profile",
        "brand",
        "plate_number",
        "model",
        "color",
        "year",
        "description",
        "location",
        "fuel_type",
        "engine_capacity",
        "transmission",
        "seats",
        "deposit_amount",
        "status",
    ];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function pickupLocation(){
        return $this->belongsTo(PickupLocation::class);
    }

    public function type(){
        return $this->belongsTo(VehicleType::class);
    }
}
