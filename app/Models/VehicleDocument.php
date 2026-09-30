<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleDocument extends Model
{
    protected $table = "vehicle_documents";

    protected $fillable = [
        'vehicle_id',
        'front_photo',
        'left_photo',
        'right_photo',
        'back_photo',
        'odometer_photo',
        'chassis_photo',
        'tax_proof_photo',
        'tax_due_date',
        'stnk_photo',
        'stnk_due_date',
        'status',
        'vehicle_albums',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
