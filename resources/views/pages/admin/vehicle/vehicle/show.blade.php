@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Detail Kendaraan</h1>
                <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Lihat data lengkap kendaraan ini.</p>
            </div>
            <a href="{{ route('vehicle-admin.index') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        {{-- VEHICLE --}}

        <div class="mb-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="font-semibold text-gray-800 dark:text-white">Data Kendaraan</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kendaraan yang didaftarkan oleh pemilik.</p>
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
                            {{ $vehicle?->transmission->name ?? 'Belum tersedia' }}</p>
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
                @if ($vehicle?->vehicleDocument->front_photo)
                    <img src="{{ Storage::url($vehicle->vehicleDocument->front_photo) }}" alt="Foto depan kendaraan"
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
                @if ($vehicle?->vehicleDocument->left_photo)
                    <img src="{{ Storage::url($vehicle->vehicleDocument->left_photo) }}" alt="Foto kiri kendaraan"
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
                @if ($vehicle?->vehicleDocument->right_photo)
                    <img src="{{ Storage::url($vehicle->vehicleDocument->right_photo) }}" alt="Foto kanan kendaraan"
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
                @if ($vehicle?->vehicleDocument->back_photo)
                    <img src="{{ Storage::url($vehicle->vehicleDocument->back_photo) }}" alt="Foto belakang kendaraan"
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
                @if ($vehicle?->vehicleDocument->odometer_photo)
                    <img src="{{ Storage::url($vehicle->vehicleDocument->odometer_photo) }}" alt="Foto odometer"
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
                @if ($vehicle?->vehicleDocument->chassis_photo)
                    <img src="{{ route('vehicle-document-photo', [$vehicle->vehicleDocument->id, 'chassis_photo']) }}" alt="Foto nomor rangka"
                        class="aspect-video w-full rounded-2xl object-cover">
                @else
                    <div
                        class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        Belum tersedia
                    </div>
                @endif
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Selfie</p>
                @if ($vehicle?->vehicleDocument->selfie_photo)
                    <img src="{{ Storage::url($vehicle->vehicleDocument->selfie_photo) }}" alt="Bukti pajak kendaraan"
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
                @if ($vehicle?->vehicleDocument->stnk_photo)
                    <img src="{{ route('vehicle-document-photo', [$vehicle->vehicleDocument->id, 'stnk_photo']) }}" alt="Foto STNK"
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
                        {{ $vehicle?->vehicleDocument->tax_due_date ? \Carbon\Carbon::parse($vehicle->tax_due_date)->translatedFormat('d F Y') : 'Belum tersedia' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Jatuh Tempo STNK</p>
                    <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ $vehicle?->vehicleDocument->stnk_due_date ? \Carbon\Carbon::parse($vehicle->stnk_due_date)->translatedFormat('d F Y') : 'Belum tersedia' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- OWNER --}}

        <div class="mb-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="font-semibold text-gray-800 dark:text-white">Data Pemilik</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi akun dan identitas pemilik.</p>
            </div>
            <div class="p-5 sm:p-6">
                <div class="flex flex-row gap-5 sm:flex-row sm:items-center">
                    <div
                        class="flex h-16 w-16 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                        @if (filled($owner?->profile))
                            <img src="{{ Storage::url($owner->profile) }}" alt="Profile"
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
                        <h3 class="font-semibold truncate text-gray-800 dark:text-white">
                            {{ $owner?->name ?? 'Belum tersedia' }}
                        </h3>
                        <p class="mt-1 text-sm truncate text-gray-500 dark:text-gray-400">
                            {{ $owner?->email ?? 'Belum tersedia' }}
                        </p>
                        <p class="mt-1 text-sm truncate text-gray-500 dark:text-gray-400">
                            {{ $owner?->telp ?? 'Belum tersedia' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- IDENTITY --}}

        <div class="mb-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="font-semibold text-gray-800 dark:text-white">Data Identitas</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Identitas yang dimiliki oleh pemilik.</p>
            </div>
            <div class="grid gap-5 p-5 grid-cols-2 sm:p-6">
                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">NIK</p>
                    <p class="mt-1 truncate text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ $owner->mitraIdentity->nik ?? 'Belum tersedia' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Nama Lengkap</p>
                    <p class="mt-1 truncate text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ $owner->mitraIdentity->full_name ?? 'Belum tersedia' }}</p>
                </div>
                <div class="col-span-2">
                    <p class="mb-2 text-xs text-gray-400 dark:text-gray-500">Foto KTP</p>
                    @if (filled($owner->mitraIdentity->ktp_photo))
                        <img src="{{ route('mitra-identity-photo', [$owner->mitraIdentity->id, 'ktp_photo']) }}" alt="KTP"
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
    </section>
@endsection