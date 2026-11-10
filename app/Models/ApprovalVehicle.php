<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalVehicle extends Model
{
    protected $table = "approval_vehicles";
    protected $fillable = [
        'owner_id',
        'type_id',
        'transmission_id',
        'profile',
        'plate_number',
        'brand',
        'year',
        'color',
        'model',
        'description',
        'fuel_type',
        'engine_capacity',
        'seats',
        'front_photo',
        'left_photo',
        'right_photo',
        'back_photo',
        'odometer_photo',
        'chassis_photo',
        'selfie_photo',
        'stnk_photo',
        'stnk_due_date',
        'status',
        'rejected_reason',
    ];

    public function applicant()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function type()
    {
        return $this->belongsTo(VehicleType::class, 'type_id');
    }

    public function transmission()
    {
        return $this->belongsTo(VehicleTransmission::class, 'transmission_id');
    }
}
