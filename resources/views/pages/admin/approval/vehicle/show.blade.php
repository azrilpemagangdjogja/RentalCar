@extends('layouts.admin')

@section('content')
    <section class="w-full space-y-6">

        {{-- HEADER --}}

        <section class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        {{ $approvalVehicle->brand }} {{ $approvalVehicle->model }}</h1>
                    <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Kelola kendaraan dan lokasi
                        penempatannya dengan mudah.</p>
                </div>
                <a href="{{ url()->previous() }}"
                    class="flex w-full items-center justify-center rounded-xl bg-gray-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                    Kembali
                </a>
            </div>
        </section>

        {{-- PEMILIK KENDARAAN --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
            <div class="mb-5 flex items-center gap-3">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m6-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm7-1a4 4 0 0 1 0 8m3 3v-2a4 4 0 0 0-3-3.87" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-gray-800 dark:text-white">Informasi Pemilik</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Pengguna yang mengajukan kendaraan ini.</p>
                </div>
            </div>
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div
                    class="flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                    @if ($approvalVehicle->applicant?->profile)
                        <img src="{{ asset('storage/' . $approvalVehicle->applicant->profile) }}" alt="Foto pemilik"
                            class="h-full w-full object-cover">
                    @else
                        <svg class="h-9 w-9 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M20 21a8 8 0 0 0-16 0m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                        </svg>
                    @endif
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-lg font-bold text-gray-800 dark:text-white">
                        {{ $approvalVehicle->applicant?->name ?? 'Pengguna tidak ditemukan' }}</p>
                    <p class="mt-1 break-all text-sm text-gray-500 dark:text-gray-400">
                        {{ $approvalVehicle->applicant?->email ?? '-' }}</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $approvalVehicle->applicant?->telp ?? '-' }}
                    </p>
                </div>
                <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-gray-600/60">
                    <p class="text-xs text-gray-500 dark:text-gray-400">ID Pemilik</p>
                    <p class="mt-1 font-semibold text-gray-800 dark:text-white">{{ $approvalVehicle->owner_id }}</p>
                </div>
            </div>
        </div>

        {{-- FOTO KENDARAAN --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
            <div class="mb-5">
                <h2 class="font-bold text-gray-800 dark:text-white">Foto Kendaraan</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Periksa kondisi dan tampilan kendaraan dari
                    berbagai sisi.</p>
            </div>
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                <div>
                    <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        @if ($approvalVehicle->front_photo)
                            <img src="{{ asset('storage/' . $approvalVehicle->front_photo) }}" alt="Foto depan kendaraan"
                                class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak tersedia</div>
                        @endif
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-200">Bagian Depan</p>
                </div>
                <div>
                    <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        @if ($approvalVehicle->left_photo)
                            <img src="{{ asset('storage/' . $approvalVehicle->left_photo) }}" alt="Foto kiri kendaraan"
                                class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak tersedia</div>
                        @endif
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-200">Bagian Kiri</p>
                </div>
                <div>
                    <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        @if ($approvalVehicle->right_photo)
                            <img src="{{ asset('storage/' . $approvalVehicle->right_photo) }}" alt="Foto kanan kendaraan"
                                class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak tersedia</div>
                        @endif
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-200">Bagian Kanan</p>
                </div>
                <div>
                    <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        @if ($approvalVehicle->back_photo)
                            <img src="{{ asset('storage/' . $approvalVehicle->back_photo) }}" alt="Foto belakang kendaraan"
                                class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak tersedia</div>
                        @endif
                    </div>
                    <p class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-200">Bagian Belakang</p>
                </div>
            </div>
        </div>

        {{-- DOKUMEN PENDUKUNG --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
            <h2 class="mb-2 font-bold text-gray-800 dark:text-white">Dokumen Pendukung</h2>
            <p class="mb-5 text-sm text-gray-500 dark:text-gray-400">Gunakan dokumen berikut untuk mencocokkan data
                kendaraan dan pemohon.</p>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Odometer</p>
                    <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        @if ($approvalVehicle->odometer_photo)
                            <img src="{{ asset('storage/' . $approvalVehicle->odometer_photo) }}" alt="Foto odometer"
                                class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak
                                tersedia</div>
                        @endif
                    </div>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Nomor Rangka</p>
                    <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        @if ($approvalVehicle->chassis_photo)
                            <img src="{{ route('approval-vehicle-document-photo', [$approvalVehicle->id, 'chassis_photo']) }}"
                                alt="Foto nomor rangka" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak
                                tersedia</div>
                        @endif
                    </div>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Pemohon dengan
                        Kendaraan</p>
                    <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        @if ($approvalVehicle->selfie_photo)
                            <img src="{{ asset('storage/' . $approvalVehicle->selfie_photo) }}"
                                alt="Foto pemohon dengan kendaraan" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak
                                tersedia</div>
                        @endif
                    </div>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto STNK</p>
                    <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        @if ($approvalVehicle->stnk_photo)
                            <img src="{{ route('approval-vehicle-document-photo', [$approvalVehicle->id, 'stnk_photo']) }}"
                                alt="Foto STNK" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak
                                tersedia</div>
                        @endif
                    </div>
                    @if ($approvalVehicle->stnk_due_date)
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Jatuh tempo STNK:
                            {{ \Illuminate\Support\Carbon::parse($approvalVehicle->stnk_due_date)->format('d M Y') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

        {{-- INFORMASI KENDARAAN --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="space-y-6 lg:col-span-2">
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <h2 class="mb-5 font-bold text-gray-800 dark:text-white">Informasi Kendaraan</h2>
                    <div class="flex flex-col gap-4 sm:flex-row">
                        <div class="h-28 w-full shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600 sm:w-36">
                            @if ($approvalVehicle->profile)
                                <img src="{{ asset('storage/' . $approvalVehicle->profile) }}" alt="Foto utama kendaraan"
                                    class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full items-center justify-center text-sm text-gray-400">Tidak tersedia
                                </div>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $approvalVehicle->brand }}
                                {{ $approvalVehicle->model }}</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                {{ $approvalVehicle->type?->name ?? 'Jenis kendaraan tidak tersedia' }}</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span
                                    class="rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">{{ $approvalVehicle->plate_number }}</span>
                                <span
                                    class="rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">Tahun
                                    {{ $approvalVehicle->year }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 border-t border-gray-100 pt-5 dark:border-gray-600">
                        <h3 class="mb-2 text-sm font-semibold text-gray-700 dark:text-gray-200">Deskripsi</h3>
                        <p class="whitespace-pre-line text-sm leading-6 text-gray-600 dark:text-gray-300">
                            {{ $approvalVehicle->description ?: 'Tidak ada deskripsi kendaraan.' }}</p>
                    </div>
                </div>

                {{-- SPESIFIKASI --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <h2 class="mb-5 font-bold text-gray-800 dark:text-white">Spesifikasi Kendaraan</h2>
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600/60">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Warna</p>
                            <p class="mt-1 font-semibold text-gray-800 dark:text-white">
                                {{ $approvalVehicle->color ?: '-' }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600/60">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Transmisi</p>
                            <p class="mt-1 font-semibold text-gray-800 dark:text-white">
                                {{ $approvalVehicle->transmission?->name ?? '-' }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600/60">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Bahan Bakar</p>
                            <p class="mt-1 font-semibold text-gray-800 dark:text-white">
                                {{ $approvalVehicle->fuel_type ?: '-' }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600/60">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Kapasitas Mesin</p>
                            <p class="mt-1 font-semibold text-gray-800 dark:text-white">
                                {{ $approvalVehicle->engine_capacity ? $approvalVehicle->engine_capacity . ' cc' : '-' }}
                            </p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600/60">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Jumlah Kursi</p>
                            <p class="mt-1 font-semibold text-gray-800 dark:text-white">
                                {{ $approvalVehicle->seats ? $approvalVehicle->seats . ' kursi' : '-' }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600/60">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Tahun Kendaraan</p>
                            <p class="mt-1 font-semibold text-gray-800 dark:text-white">
                                {{ $approvalVehicle->year ?: '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KEPUTUSAN PENGAJUAN --}}
            <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <h2 class="font-bold text-gray-800 dark:text-white">Keputusan Pengajuan</h2>
                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">Pastikan data pemilik, foto
                        kendaraan, dan dokumen pendukung sudah diperiksa sebelum memberikan keputusan.</p>
                    @if ($approvalVehicle->status == 'Pending')
                        <div class="mt-5 space-y-3">
                            <form action="{{ route('approval-vehicle.approve', $approvalVehicle->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full rounded-xl bg-gray-800 px-4 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500">Setujui
                                    Pengajuan</button>
                            </form>
                            <a href="{{ route('approval-vehicle.reject', $approvalVehicle->id) }}"
                                class="block w-full rounded-xl border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-500 dark:text-gray-200 dark:hover:bg-gray-600">Tolak
                                Pengajuan</a>
                        </div>
                    @elseif ($approvalVehicle->status == 'Rejected')
                        <div class="mt-5 rounded-xl bg-gray-50 p-4 dark:bg-gray-600/60">
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Alasan Penolakan</p>
                            <p class="mt-2 whitespace-pre-line text-sm leading-6 text-gray-600 dark:text-gray-300">
                                {{ $approvalVehicle->rejected_reason ?: 'Tidak ada alasan yang dicatat.' }}</p>
                        </div>
                    @else
                        <div class="mt-5 rounded-xl bg-gray-50 p-4 dark:bg-gray-600/60">
                            <p class="text-sm text-gray-600 dark:text-gray-300">Pengajuan ini telah disetujui.</p>
                        </div>
                    @endif
                </div>

                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <h2 class="mb-4 font-bold text-gray-800 dark:text-white">Ringkasan Pengajuan</h2>
                    <div class="space-y-4 text-sm">
                        <div class="flex items-start justify-between gap-3">
                            <span class="text-gray-500 dark:text-gray-400">Nomor Polisi</span>
                            <span
                                class="text-right font-semibold text-gray-800 dark:text-white">{{ $approvalVehicle->plate_number }}</span>
                        </div>
                        <div class="flex items-start justify-between gap-3">
                            <span class="text-gray-500 dark:text-gray-400">Jenis Kendaraan</span>
                            <span
                                class="text-right font-semibold text-gray-800 dark:text-white">{{ $approvalVehicle->type?->name ?? '-' }}</span>
                        </div>
                        <div class="flex items-start justify-between gap-3">
                            <span class="text-gray-500 dark:text-gray-400">Tanggal Pengajuan</span>
                            <span
                                class="text-right font-semibold text-gray-800 dark:text-white">{{ $approvalVehicle->created_at?->format('d M Y') ?? '-' }}</span>
                        </div>
                        <div class="flex items-start justify-between gap-3">
                            <span class="text-gray-500 dark:text-gray-400">ID Pengajuan</span>
                            <span
                                class="text-right font-semibold text-gray-800 dark:text-white">#{{ $approvalVehicle->id }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
