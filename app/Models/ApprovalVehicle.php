<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalVehicle extends Model
{
    protected $table = "approval_vehicle_documents";
    protected $fillable = [
        'owner_id',
        'type_id',
        'profile',
        'plate_number',
        'brand',
        'year',
        'color',
        'model',
        'description',
        'fuel_type',
        'transmission',
        'engine_capacity',
        'seats',
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
        'rejected_reason',
    ];
}
