<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryApprovalVehicle extends Model
{
    protected $table = "history_approval_vehicles";
    protected $fillable = [
        'owner_id',
        'owner_name',
        'owner_profile',
        'owner_email',
        'owner_telp',
        'vehicle_id',
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
        'reviewer_id',
        'reviewer_name',
        'reviewer_email',
        'reviewer_telp',
        'reviewer_profile',
        'status', 
        'rejected_reason', 
    ];
}
