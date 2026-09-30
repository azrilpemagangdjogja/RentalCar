@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="hidden items-center gap-2 text-sm text-gray-400 dark:text-gray-400 sm:flex">
                    <a href="{{ route('approval-mitra-identity.index') }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Approval Mitra</a>
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                    <span>Detail</span>
                </div>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Detail Approval
                    Mitra</h1>
                <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Periksa data pemohon dan kendaraan
                    yang diajukan.</p>
            </div>
            <a href="{{ route('approval-mitra-identity.index') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 sm:w-auto">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        {{-- STATUS --}}

        <div class="mb-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Status Approval</p>
                    <p class="mt-1 font-semibold text-gray-800 dark:text-white">
                        {{ $applicant->status ?? 'Belum tersedia' }}
                    </p>
                </div>
                <span
                    class="inline-flex w-fit rounded-full px-3 py-1.5 text-xs font-semibold {{ $applicant->status === 'Approved' ? 'bg-green-100 text-green-700 dark:bg-green-500/10 dark:text-green-400' : ($applicant->status === 'Rejected' ? 'bg-red-100 text-red-700 dark:bg-red-500/10 dark:text-red-400' : 'bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200') }}">
                    {{ $applicant->status ?? 'Belum tersedia' }}
                </span>
            </div>
        </div>

        {{-- APPLICANT --}}

        <div class="mb-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="font-semibold text-gray-800 dark:text-white">Data Pemohon</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi akun dan identitas pemohon.</p>
            </div>
            <div class="p-5 sm:p-6">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                    <div
                        class="flex h-16 w-16 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                        @if (filled($applicant->applicant?->profile))
                            <img src="{{ Storage::url($applicant->applicant->profile) }}" alt="Profile"
                                class="h-full w-full object-cover">
                        @else
                            <svg class="h-7 w-7 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M15.75 7.5a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                            </svg>
                        @endif
                    </div>
                    <div class="min-w-0">
                        <h3 class="font-semibold text-gray-800 dark:text-white">
                            {{ $applicant->applicant?->name ?? 'Belum tersedia' }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            {{ $applicant->applicant?->email ?? 'Belum tersedia' }}
                        </p>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            {{ $applicant->applicant?->telp ?? 'Belum tersedia' }}
                        </p>
                    </div>
                </div>
                <div class="mt-6 grid gap-5 sm:grid-cols-2">
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Applicant ID</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $applicant->applicant_id ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Reviewer ID</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $applicant->reviewer_id ?? 'Belum direview' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- IDENTITY --}}

        <div class="mb-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="font-semibold text-gray-800 dark:text-white">Data Identitas</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Identitas yang diajukan oleh pemohon.</p>
            </div>
            <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-6">
                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">NIK</p>
                    <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ $applicant->nik ?? 'Belum tersedia' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Nama Lengkap</p>
                    <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ $applicant->full_name ?? 'Belum tersedia' }}</p>
                </div>
                <div class="sm:col-span-2">
                    <p class="mb-2 text-xs text-gray-400 dark:text-gray-500">Foto KTP</p>
                    @if (filled($applicant->ktp_photo))
                        <img src="{{ Storage::url($applicant->ktp_photo) }}" alt="KTP"
                            class="max-h-72 w-full rounded-xl border border-gray-200 object-contain dark:border-gray-600">
                    @else
                        <div
                            class="flex h-40 items-center justify-center rounded-xl border border-dashed border-gray-200 text-sm text-gray-400 dark:border-gray-600 dark:text-gray-500">
                            Foto KTP belum tersedia
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- VEHICLE --}}

        <div class="mb-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="font-semibold text-gray-800 dark:text-white">Data Kendaraan</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kendaraan yang didaftarkan oleh pemohon.</p>
            </div>
            <div class="p-5 sm:p-6">
                <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center">
                    <div
                        class="flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                        @if (filled($vehicle?->profile))
                            <img src="{{ Storage::url($vehicle->profile) }}" alt="Kendaraan"
                                class="h-full w-full object-cover">
                        @else
                            <svg class="h-8 w-8 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M5 17h14M7 17v2m10-2v2M5 17l1.5-7h11L19 17M8 13h8" />
                            </svg>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                            {{ $vehicle?->brand ?? 'Belum tersedia' }} {{ $vehicle?->model ?? '' }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            {{ $vehicle?->plate_number ?? 'Belum tersedia' }}
                        </p>
                    </div>
                </div>
                <div class="grid gap-5 sm:grid-cols-3 grid-cols-2">
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Tipe Kendaraan</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->type?->name ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Nomor Polisi</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->plate_number ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Merek</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->brand ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Model</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->model ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Tahun</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->year ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Warna</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->color ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Bahan Bakar</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->fuel_type ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Transmisi</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->transmission ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Kapasitas Mesin</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->engine_capacity ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Jumlah Kursi</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->seats ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Owner ID</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->owner_id ?? 'Belum tersedia' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Status</p>
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->status ?? 'Belum tersedia' }}</p>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-3">
                        <p class="text-xs text-gray-400 dark:text-gray-500">Deskripsi</p>
                        <p class="mt-1 text-sm text-gray-700 dark:text-gray-200">
                            {{ $vehicle?->description ?? 'Belum tersedia' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Vehicle Photos --}}

        <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Depan</p>
                @if ($vehicle?->front_photo)
                    <img src="{{ Storage::url($vehicle->front_photo) }}" alt="Foto depan kendaraan"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Kiri</p>
                @if ($vehicle?->left_photo)
                    <img src="{{ Storage::url($vehicle->left_photo) }}" alt="Foto kiri kendaraan"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Kanan</p>
                @if ($vehicle?->right_photo)
                    <img src="{{ Storage::url($vehicle->right_photo) }}" alt="Foto kanan kendaraan"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Belakang</p>
                @if ($vehicle?->back_photo)
                    <img src="{{ Storage::url($vehicle->back_photo) }}" alt="Foto belakang kendaraan"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-4">
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Odometer</p>
                @if ($vehicle?->odometer_photo)
                    <img src="{{ route('approval-vehicle-document-photo', [$vehicle->id, 'odometer_photo']) }}" alt="Foto odometer"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Nomor Rangka</p>
                @if ($vehicle?->chassis_photo)
                    <img src="{{ route('approval-vehicle-document-photo', [$vehicle->id, 'chassis_photo']) }}" alt="Foto nomor rangka"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Bukti Pajak</p>
                @if ($vehicle?->tax_proof_photo)
                    <img src="{{ route('approval-vehicle-document-photo', [$vehicle->id, 'tax_proof_photo']) }}" alt="Bukti pajak kendaraan"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">STNK</p>
                @if ($vehicle?->stnk_photo)
                    <img src="{{ route('approval-vehicle-document-photo', [$vehicle->id, 'stnk_photo']) }}" alt="Foto STNK"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
        </div>

        {{-- DOCUMENT --}}

        <div class="mb-6 mt-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="font-semibold text-gray-800 dark:text-white">Masa Berlaku Dokumen</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi masa berlaku pajak dan STNK kendaraan.
                </p>
            </div>
            <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-6">
                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Jatuh Tempo Pajak</p>
                    <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ $vehicle?->tax_due_date ? \Carbon\Carbon::parse($vehicle->tax_due_date)->translatedFormat('d F Y') : 'Belum tersedia' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Jatuh Tempo STNK</p>
                    <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ $vehicle?->stnk_due_date ? \Carbon\Carbon::parse($vehicle->stnk_due_date)->translatedFormat('d F Y') : 'Belum tersedia' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- REJECTION --}}

        @if ($applicant->status === 'Rejected' || $vehicle?->status === 'Rejected')
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 dark:border-red-500/30 dark:bg-red-500/10">
                <div class="p-5 sm:p-6">
                    <p class="text-sm font-semibold text-red-700 dark:text-red-400">Alasan Penolakan</p>
                    @if ($applicant->status === 'Rejected')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-300">
                            {{ $applicant->rejected_reason ?? 'Alasan penolakan belum tersedia.' }}
                        </p>
                    @endif
                    @if ($vehicle?->status === 'Rejected')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-300">
                            {{ $vehicle->rejected_reason ?? 'Alasan penolakan kendaraan belum tersedia.' }}
                        </p>
                    @endif
                </div>
            </div>
        @endif
    </section>
@endsection