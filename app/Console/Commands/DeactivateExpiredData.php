<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\ApprovalMitraIdentity;
use App\Models\VehicleDocument;

#[Signature('app:deactivate-expired-data')]
#[Description('Command description')]
class DeactivateExpiredData extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        ApprovalMitraIdentity::where('status', 'Pending')
            ->whereNotExists(function ($query) {
                $query->selectRaw(1)
                    ->from('approval_vehicles')
                    ->whereColumn('approval_vehicles.owner_id', 'approval_mitra_identities.applicant_id');
            })
        ->where('created_at', '<=', now()->subHour())
        ->update(['status' => 'expired']);

        VehicleDocument::where('status', 'Valid')
        ->where('stnk_due_date', '<', now()->subDay())
        ->update(['status' => 'Due']);

        VehicleDocument::where('status', 'Due')
        ->where('stnk_due_date', '<', now()->subDay())
        ->update(['status' => 'Expired']);
    }
}
