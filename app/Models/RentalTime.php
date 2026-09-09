<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalTime extends Model
{
    protected $table = "rental_times";

    protected $fillable = [
        "day",
        "description",
        "status",
    ];

    public function vehicleTime(){
        return $this->belongsToMany(Vehicle::class, 'vehicle_times', 'time_id', 'vehicle_id');
    }
}
