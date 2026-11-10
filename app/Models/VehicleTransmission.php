<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleTransmission extends Model
{
    protected $table = "vehicle_transmissions";
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function vehicles(){
        return $this->hasMany(Vehicle::class, 'transmission_id');
    }

    public function approvalVehicles(){
        return $this->hasMany(ApprovalVehicle::class, 'transmission_id');
    }
}
