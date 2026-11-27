<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryApprovalMitraIdentity extends Model
{
    protected $table = "history_approval_mitra_identities";
    protected $fillable = [
        'applicant_id',
        'applicant_name',
        'applicant_profile',
        'applicant_email',
        'applicant_telp',
        'nik',
        'full_name',
        'ktp_photo',
        'email',
        'telp',
        'reviewer_id',
        'reviewer_name',
        'reviewer_email',
        'reviewer_telp',
        'reviewer_profile',
        'status', 
        'rejected_reason', 
    ];
}
