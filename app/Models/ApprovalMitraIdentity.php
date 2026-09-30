<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalMitraIdentity extends Model
{
    protected $table = "approval_mitras";
    protected $fillable = [
        "applicant_id",
        "nik",
        "full_name",
        "ktp_photo",
        "reviewer_id",
        "status",
    ];

    public function applicant()
    {
        return $this->belongsTo(User::class, "applicant_id");
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, "reviewer_id");
    }

    public function mitraIdentity()
    {
        return $this->belongsTo(MitraIdentity::class, "mitra_identity_id");
    }
}
