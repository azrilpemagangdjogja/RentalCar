@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 hidden sm:flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ url()->previous() }}" class="transition hover:text-gray-700 dark:hover:text-white">
                        Pengajuan Kendaraan
                    </a>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                    <span>Tolak</span>
                </div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Tolak Pengajuan
                </h1>
                <p class="mt-1 hidden sm:block text-sm text-gray-500 dark:text-gray-400">
                    Tolak permintaan penitipan kendaraan di {{ $approvement->location_name }}
                </p>
            </div>
            <a href="{{ url()->previous() }}"
                class="inline-flex w-fit items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Kembali
            </a>
        </div>

        <form action="{{ route('approval-join-vehicle.reject', $approvement->id) }}" method="POST" class="mb-6">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 gap-6">

                {{-- REGION INFORMATION --}}

                <div class="lg:col-span-2">
                    <div class="rounded-2xl bg-gray-50 dark:bg-gray-700">
                        <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Alasan Menolak</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Masukkan alasanmu menolak penitipan {{ $approvement->vehicle_brand }} {{ $approvement->vehicle_model }} milik {{ $approvement->applicant_name }} di lokasi {{ $approvement->location_name }}</p>
                        </div>

                        <div class="space-y-5 p-5 sm:p-6">

                            {{-- DESCRIPTION --}}

                            <div>
                                <label for="reason"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
                                <textarea name="reason" id="reason" rows="7" placeholder="Jelaskan alasan anda menolak..."
                                    class="w-full resize-none rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm leading-6 text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('description') }}</textarea>
                                @error('reason')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{-- ACTION --}}

            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ url()->previous() }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-800 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    Tolak
                </button>
            </div>
        </form>

        {{-- APPLICATION SUMMARY --}}

        <div class="mb-6 overflow-hidden rounded-2xl bg-gray-800 dark:bg-gray-700">
            <div class="p-5 sm:p-6">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/10 text-white">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 17h14M7 17v2m10-2v2M6 17l-1-6h14l-1 6M7 11l1.5-4h7L17 11M8 14h.01M16 14h.01" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-gray-300">
                                Pengajuan Penambahan Kendaraan
                            </p>
                            <h2 class="mt-1 text-xl font-bold text-white">
                                {{ $approvement->vehicle_brand ?? 'Merek tidak tersedia' }}
                                {{ $approvement->vehicle_model ?? '' }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-300">
                                {{ $approvement->vehicle_plate_number ?? 'Nomor plat tidak tersedia' }}
                            </p>
                        </div>
                    </div>
                    <div>
                        @if ($approvement->status === 'Approved')
                            <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-semibold text-gray-800">
                                <span class="h-2 w-2 rounded-full bg-gray-700"></span>
                                Approved
                            </span>
                        @elseif ($approvement->status === 'Rejected')
                            <span class="inline-flex items-center gap-2 rounded-full bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-700">
                                <span class="h-2 w-2 rounded-full bg-gray-500"></span>
                                Rejected
                            </span>
                        @elseif ($approvement->status === 'Cancelled')
                            <span class="inline-flex items-center gap-2 rounded-full bg-gray-300 px-4 py-2 text-sm font-semibold text-gray-700">
                                <span class="h-2 w-2 rounded-full bg-gray-500"></span>
                                Cancelled
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 rounded-full bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700">
                                <span class="h-2 w-2 rounded-full bg-gray-500"></span>
                                {{ $approvement->status ?? 'Pending' }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 border-t border-white/10 sm:grid-cols-3">
                <div class="border-b border-white/10 px-5 py-4 sm:border-b-0 sm:border-r">
                    <p class="text-xs text-gray-300">Pemohon</p>
                    <p class="mt-1 truncate text-sm font-semibold text-white">
                        {{ $approvement->applicant_name ?? 'Tidak tersedia' }}
                    </p>
                </div>
                <div class="border-b border-white/10 px-5 py-4 sm:border-b-0 sm:border-r">
                    <p class="text-xs text-gray-300">Penerima</p>
                    <p class="mt-1 truncate text-sm font-semibold text-white">
                        {{ $approvement->viewer_name ?? 'Belum ada' }}
                    </p>
                </div>
                <div class="px-5 py-4">
                    <p class="text-xs text-gray-300">Diajukan</p>
                    <p class="mt-1 text-sm font-semibold text-white">
                        {{ $approvement->created_at ? $approvement->created_at->format('d M Y, H:i') : 'Tidak tersedia' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- PICKUP LOCATION --}}

        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-4">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s7-5.4 7-12a7 7 0 1 0-14 0c0 6.6 7 12 7 12Z" />
                            <circle cx="12" cy="9" r="2.5" stroke-width="1.8" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                            Pickup Location
                        </p>
                        <h2 class="mt-1 text-base font-semibold text-gray-800 dark:text-white">
                            {{ $approvement->location_name ?? 'Nama lokasi tidak tersedia' }}
                        </h2>
                    </div>
                </div>
                <div class="rounded-xl bg-gray-100 px-3 py-2 text-xs text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                    {{ $approvement->location_latitude ?? '-' }},
                    {{ $approvement->location_longitude ?? '-' }}
                </div>
            </div>
            <div class="border-t border-gray-200 px-5 py-4 dark:border-gray-600">
                <p class="text-sm leading-6 text-gray-600 dark:text-gray-300">
                    {{ $approvement->location_address ?? 'Alamat pickup location tidak tersedia.' }}
                </p>
                @if ($approvement->location_description)
                    <p class="mt-3 border-t border-gray-200 pt-3 text-sm leading-6 text-gray-500 dark:border-gray-600 dark:text-gray-400">
                        {{ $approvement->location_description }}
                    </p>
                @endif
            </div>
        </div>

        {{-- DETAIL CONTENT --}}

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- VEHICLE DETAIL --}}

            <div class="space-y-6 lg:col-span-2">
                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                                    Kendaraan
                                </h2>
                                <p class="mt-1 text-xs text-gray-400">
                                    Detail kendaraan yang diajukan.
                                </p>
                            </div>
                            <span class="rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                {{ $approvement->vehicle_type ?? 'Jenis tidak tersedia' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="mb-6 flex flex-col gap-5 sm:flex-row">
                            <div class="h-40 w-full shrink-0 overflow-hidden rounded-2xl bg-gray-100 sm:w-56 dark:bg-gray-600">
                                <img src="{{ $approvement->vehicle_profile ? asset('storage/' . $approvement->vehicle_profile) : asset('images/login-background.png') }}"
                                    alt="{{ $approvement->vehicle_brand ?? 'Kendaraan' }}"
                                    class="h-full w-full object-cover">
                            </div>
                            <div class="flex min-w-0 flex-1 flex-col justify-center">
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                    Kendaraan
                                </p>
                                <h3 class="mt-1 text-xl font-bold text-gray-800 dark:text-white">
                                    {{ $approvement->vehicle_brand ?? 'Merek tidak tersedia' }}
                                    {{ $approvement->vehicle_model ?? '' }}
                                </h3>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    <span class="rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                        {{ $approvement->vehicle_plate_number ?? 'Plat tidak tersedia' }}
                                    </span>
                                    <span class="rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                        {{ $approvement->vehicle_year ?? 'Tahun tidak tersedia' }}
                                    </span>
                                    <span class="rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                        {{ $approvement->vehicle_color ?? 'Warna tidak tersedia' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-px overflow-hidden rounded-xl border border-gray-200 bg-gray-100 dark:border-gray-600 dark:bg-gray-600 sm:grid-cols-3">
                            <div class="bg-white p-4 dark:bg-gray-700">
                                <p class="text-xs text-gray-400">Transmisi</p>
                                <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $approvement->vehicle_transmission ?? 'Tidak tersedia' }}
                                </p>
                            </div>
                            <div class="bg-white p-4 dark:bg-gray-700">
                                <p class="text-xs text-gray-400">Mesin</p>
                                <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $approvement->vehicle_engine_capacity ?? 'Tidak tersedia' }}
                                </p>
                            </div>
                            <div class="bg-white p-4 dark:bg-gray-700">
                                <p class="text-xs text-gray-400">Kursi</p>
                                <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $approvement->vehicle_seats ?? 'Tidak tersedia' }}
                                </p>
                            </div>
                            <div class="bg-white p-4 dark:bg-gray-700">
                                <p class="text-xs text-gray-400">Bahan Bakar</p>
                                <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $approvement->vehicle_fuel_type ?? 'Tidak tersedia' }}
                                </p>
                            </div>
                            <div class="bg-white p-4 dark:bg-gray-700">
                                <p class="text-xs text-gray-400">Warna</p>
                                <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $approvement->vehicle_color ?? 'Tidak tersedia' }}
                                </p>
                            </div>
                            <div class="bg-white p-4 dark:bg-gray-700">
                                <p class="text-xs text-gray-400">Tahun</p>
                                <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $approvement->vehicle_year ?? 'Tidak tersedia' }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-400">
                                Deskripsi
                            </p>
                            <p class="text-sm leading-6 text-gray-600 dark:text-gray-300">
                                {{ $approvement->vehicle_description ?? 'Tidak ada deskripsi kendaraan.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RELATED PARTIES --}}

            <div class="space-y-6">

                {{-- MITRA --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-600">
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                            Mitra
                        </p>
                        <h2 class="mt-1 text-base font-semibold text-gray-800 dark:text-white">
                            {{ $approvement->mitra_full_name ?? 'Mitra tidak tersedia' }}
                        </h2>
                    </div>
                    <div class="space-y-4 p-5">
                        <div>
                            <p class="text-xs text-gray-400">NIK</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $approvement->mitra_nik ?? 'Tidak tersedia' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- APPLICANT --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-600">
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                            Pemohon
                        </p>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-3">
                            <img src="{{ $approvement->applicant_profile ? asset('storage/' . $approvement->applicant_profile) : asset('images/default-profile.png') }}"
                                alt="{{ $approvement->applicant_name ?? 'Pemohon' }}"
                                class="h-12 w-12 rounded-full object-cover">
                            <div class="min-w-0">
                                <p class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $approvement->applicant_name ?? 'Nama tidak tersedia' }}
                                </p>
                                <p class="truncate text-xs text-gray-400">
                                    {{ $approvement->applicant_email ?? 'Email tidak tersedia' }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 space-y-4">
                            <div>
                                <p class="text-xs text-gray-400">Email</p>
                                <p class="mt-1 break-all text-sm font-medium text-gray-800 dark:text-white">
                                    {{ $approvement->applicant_email ?? 'Tidak tersedia' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Telepon</p>
                                <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                    {{ $approvement->applicant_telp ?? 'Tidak tersedia' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- VIEWER --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-600">
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                            Viewer
                        </p>
                    </div>
                    @if ($approvement->viewer_id || $approvement->viewer_name)
                        <div class="p-5">
                            <div class="flex items-center gap-3">
                                <img src="{{ $approvement->viewer_profile ? asset('storage/' . $approvement->viewer_profile) : asset('images/default-profile.png') }}"
                                    alt="{{ $approvement->viewer_name ?? 'Viewer' }}"
                                    class="h-12 w-12 rounded-full object-cover">
                                <div class="min-w-0">
                                    <p class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $approvement->viewer_name ?? 'Nama tidak tersedia' }}
                                    </p>
                                    <p class="truncate text-xs text-gray-400">
                                        {{ $approvement->viewer_email ?? 'Email tidak tersedia' }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 space-y-4">
                                <div>
                                    <p class="text-xs text-gray-400">Email</p>
                                    <p class="mt-1 break-all text-sm font-medium text-gray-800 dark:text-white">
                                        {{ $approvement->viewer_email ?? 'Tidak tersedia' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400">Telepon</p>
                                    <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                        {{ $approvement->viewer_telp ?? 'Tidak tersedia' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="p-5">
                            <div class="rounded-xl bg-gray-100 p-4 dark:bg-gray-600">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white text-gray-400 dark:bg-gray-700 dark:text-gray-300">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 19a6 6 0 0 0-12 0m6-8a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm6-3v6m3-3h-6" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Belum dilihat
                                        </p>
                                        <p class="mt-0.5 text-xs text-gray-400">
                                            Belum ada viewer pada pengajuan ini.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- STATUS --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-600">
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                            Status Pengajuan
                        </p>
                    </div>
                    <div class="p-5">
                        @if ($approvement->status === 'Rejected')
                            <div class="rounded-xl bg-gray-100 p-4 dark:bg-gray-600">
                                <p class="text-xs font-medium text-gray-400">
                                    Alasan Penolakan
                                </p>
                                <p class="mt-2 text-sm leading-6 text-gray-700 dark:text-gray-200">
                                    {{ $approvement->rejected_reason ?? 'Tidak ada alasan penolakan.' }}
                                </p>
                            </div>
                        @else
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v6l4 2m6-2a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $approvement->status ?? 'Pending' }}
                                    </p>
                                    <p class="mt-0.5 text-xs text-gray-400">
                                        Status pengajuan saat ini.
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- TIMESTAMP --}}

        <div class="mt-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="grid grid-cols-1 divide-y divide-gray-100 sm:grid-cols-2 sm:divide-x sm:divide-y-0 dark:divide-gray-600">
                <div class="px-5 py-4">
                    <p class="text-xs text-gray-400">Dibuat pada</p>
                    <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                        {{ $approvement->created_at ? $approvement->created_at->format('d M Y, H:i') : 'Tidak tersedia' }}
                    </p>
                </div>
                <div class="px-5 py-4">
                    <p class="text-xs text-gray-400">Terakhir diperbarui</p>
                    <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                        {{ $approvement->updated_at ? $approvement->updated_at->format('d M Y, H:i') : 'Tidak tersedia' }}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection