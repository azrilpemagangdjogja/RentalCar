<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApprovalVehicle;
use App\Models\Conversation;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use App\Models\MitraIdentity;
use App\Models\Message;
use App\Models\ApprovalMitraIdentity;

class ApprovalMitraIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            abort(404);
        }

        $approvement = ApprovalMitraIdentity::orderBy('created_at', 'desc')->where('status', 'Pending')->paginate(10);
        return view('pages.admin.approval.mitra.index', compact('approvement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $mitraIdentity = MitraIdentity::where('user_id', $user->id)->first();
        // $types = VehicleType::all();
        // $days = RentalTime::all();
        if ($user->mitra_status == "Verified"){
            return view('pages.mitra.mitra_verification.wascreate');
        } elseif ($mitraIdentity) {
            return view('pages.mitra.mitra_verification.wascreate');
        }
        
        return view('pages.mitra.mitra_verification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $user = auth()->user();
        if ($user->mitra_status == 'Verified') {
            return redirect()->back()->with('error', 'Kamu sudah memiliki atau mendaftar sebagai mitra.');
        }

        $mitraVerifiedCheck = MitraIdentity::where('user_id', $user->id)->first();
        if ($mitraVerifiedCheck) {
            return redirect()->back()->with('error', 'Kamu sudah memiliki atau mendaftar sebagai mitra.');
        }

        $mitraIdentity = $request->validate([
            'nik' => 'required|unique:mitra_identities,nik',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:mitra_identities,email',
            'telp' => 'required|string|max:20|unique:mitra_identities,telp',
        ]);

        $mitraIdentity['user_id'] = $user->id;

        MitraIdentity::create($mitraIdentity);

        UserHistory::record(
            "Mitra",
            $user->name . " mengajukan permintaan verifikasi mitra pada " . now()->format('d-m-Y H:i:s'),
        );

        Message::message(
            $user->id,
            "Halo " . $mitraIdentity['full_name'] . ", permintaan anda saat ini sedang di proses, kami akan segera memberitahu anda saat
            permintaan di terima oleh pihak kami. Kami berterima kasih atas kerjasama anda dalam membangun RentalCar
            menjadi platform yang dapat dipercaya oleh semua orang. Mohon bersabar, untuk konfirmasi pengajuan akan selesai
            dalam kurang dari 1 hari :)",
            "Announcement",
            "Pengajuan Mitra",
        );

        return redirect()->back()->with('success', 'Permintaan verifikasi mitra berhasil diajukan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $applicant = ApprovalMitraIdentity::where('applicant_id', $id)->with('applicant')->where('status', 'Pending')->first();
        $vehicle = ApprovalVehicle::where('owner_id', $id)->where('status', 'Pending')->first();
        return view('pages.admin.approval.mitra.show', compact(['applicant', 'vehicle']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function approve(string $id)
    {
        $user = auth()->user();
        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }

        $mitraIdentity = MitraIdentity::findOrFail($id);
        $mitraIdentity->status = 'Approved';
        $mitraIdentity->save();

        $mitraStatus = $mitraIdentity->user;
        $mitraStatus->mitra_status = 'Verified';
        $mitraStatus->save();

        ApprovalMitraIdentity::create([
            "reviewer_id" => $user->id,
            "reviewer_profile" => $user->profile,
            "reviewer_name" => $user->name,
            "reviewer_email" => $user->email,
            "reviewer_telp" => $user->telp,

            "applicant_id" => $mitraStatus->id,
            "applicant_name" => $mitraStatus->name,
            "applicant_email" => $mitraStatus->email,
            "applicant_telp" => $mitraStatus->telp,
            "applicant_profile" => $mitraStatus->profile,

            "mitra_identity_id" => $mitraIdentity->id,
            "nik" => $mitraIdentity->nik,
            "full_name" => $mitraIdentity->full_name,

            "status" => "Approved",
        ]);

        UserHistory::record(
            "Identitas Mitra",
            $user->name . " menyetujui " . $mitraStatus->name . " menjadi bagian mitra"
        );

    


        Message::message(
            $mitraStatus->id,
            "Selamat " . $mitraStatus->name . ", Anda secara resmi telah diangkat sebagai mitra kami. Mulai saat ini anda akan diperbolehkan mengakses fitur yang hanya tersedia untuk mitra.
            Untuk tahapan selanjutnya anda akan diperkenankan untuk mengisi data kendaraan pertama anda sebelum bisa mengakses fitur lainnya" ,
            "Announcement",
            "Pengajuan Mitra", 
        );

        return redirect()->back()->with('success', 'Mitra identity approved successfully.');
    }

    public function reject(string $id)
    {
        $user = auth()->user();
        if ($user->role !== 'Admin' && $user->role !== 'Superadmin') {
            abort(403);
        }

        $mitraIdentity = MitraIdentity::findOrFail($id);
        $mitraIdentity->status = 'Approved';
        $mitraIdentity->save();

        $mitraStatus = $mitraIdentity->user;
        $mitraStatus->mitra_status = 'Verified';
        $mitraStatus->save();

        ApprovalMitraIdentity::create([
            "reviewer_id" => $user->id,
            "reviewer_profile" => $user->profile,
            "reviewer_name" => $user->name,
            "reviewer_email" => $user->email,
            "reviewer_telp" => $user->telp,

            "applicant_id" => $mitraStatus->id,
            "applicant_name" => $mitraStatus->name,
            "applicant_email" => $mitraStatus->email,
            "applicant_telp" => $mitraStatus->telp,
            "applicant_profile" => $mitraStatus->profile,

            "mitra_identity_id" => $mitraIdentity->id,
            "nik" => $mitraIdentity->nik,
            "full_name" => $mitraIdentity->full_name,

            "status" => "Approved",
        ]);

        UserHistory::record(
            "Identitas Mitra",
            $user->name . " menyetujui " . $mitraStatus->name . " menjadi bagian mitra"
        );

    


        Message::message(
            $mitraStatus->id,
            "Selamat " . $mitraStatus->name . ", Anda secara resmi telah diangkat sebagai mitra kami. Mulai saat ini anda akan diperbolehkan mengakses fitur yang hanya tersedia untuk mitra.
            Untuk tahapan selanjutnya anda akan diperkenankan untuk mengisi data kendaraan pertama anda sebelum bisa mengakses fitur lainnya" ,
            "Announcement",
            "Pengajuan Mitra", 
        );

        return redirect()->back()->with('success', 'Mitra identity approved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
