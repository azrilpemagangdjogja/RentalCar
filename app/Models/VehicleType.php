<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = "vehicle_types";
    protected $fillable = [
        "name",
        "description",
        "status",
    ];

    public function vehicles(){
        return $this->hasMany(Vehicle::class, "type_id");
    }

    public function approvalVehicles(){
        return $this->hasMany(ApprovalVehicle::class, "type_id");
    }
}
