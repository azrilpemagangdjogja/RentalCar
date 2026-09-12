<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalJoinVehicle extends Model
{
    protected $table = "approval_join_vehicles";
    protected $fillable = [
        'vehicle_id',
        'vehicles',
        'vehicle_brand',
        'vehicle_model',
        'vehicle_transmission',
        'vehicle_engine_capacity',
        'vehicle_seats',
        'vehicle_fuel_type',
        'vehicle_color',
        'vehicle_profile',
        'vehicle_plate_number',
        'vehicle_type',
        'vehicle_year',
        'vehicle_description',
        'applicant_id',
        'applicant_name',
        'applicant_email',
        'applicant_telp',
        'applicant_profile',
        'mitra_id',
        'mitra_full_name',
        'mitra_nik',
        'viewer_id',
        'viewer_name',
        'viewer_email',
        'viewer_telp',
        'viewer_profile',
        'location_id',
        'location_name',
        'location_address',
        'location_longitude',
        'location_latitude',
        'location_description',
        'owner_id',
        'owner_name',
        'owner_email',
        'owner_telp',
        'owner_profile',
        'status',
        'rejected_reason',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}
