@extends('layouts.admin')

@section('content') <section class="w-full">

        {{-- HEADER --}}

        <div class="md:flex hidden flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('join-pickup-location.index') }}"
                        class="truncate transition hover:text-gray-700 dark:hover:text-gray-200">
                        Lokasi Pengambilan
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span class="truncate">{{ $pickupLocation->name }}</span>
                </div>

                <h1 class="truncate text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    {{ $pickupLocation->name }}
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Informasi pickup location dan kendaraan yang tersedia di lokasi ini.
                </p>
            </div>

            <a href="{{ route('join-pickup-location.index') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 sm:w-auto">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg> --}}
                Kembali
            </a>
        </div>

        {{-- LOCATION IDENTITY --}}

        <div class="md:mt-8 rounded-2xl bg-white p-5 dark:bg-gray-700 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                        stroke="currentColor" class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                        <div class="min-w-0">
                            <div class="flex flex-wrap items-center gap-2">
                                <h2 class="text-lg font-bold text-gray-800 dark:text-white">
                                    {{ $pickupLocation->name }}
                                </h2>

                                <span
                                    class="rounded-full bg-gray-800 px-3 py-1 text-[10px] font-semibold text-white dark:bg-white dark:text-gray-800">
                                    {{ $pickupLocation->status }}
                                </span>
                            </div>

                            <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                                {{ $pickupLocation->address }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- STATISTICS --}}

        <div class="mt-6 hidden md:grid grid-cols-2 gap-3 lg:grid-cols-4">

            {{-- TOTAL VEHICLES --}}

            <div class="rounded-2xl bg-white p-5 dark:bg-gray-700">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Total Kendaraan
                        </p>
                        <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $pickupLocation->vehicles->count() }}
                        </p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            kendaraan ditempatkan
                        </p>
                    </div>

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- ACTIVE VEHICLES --}}

            <div class="rounded-2xl bg-white p-5 dark:bg-gray-700">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Kendaraan Aktif
                        </p>
                        <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $pickupLocation->vehicles->where('status', 'Active')->count() }}
                        </p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            tersedia untuk disewa
                        </p>
                    </div>

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4.5 4.5L19 7" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- CAPACITY --}}

            <div class="rounded-2xl bg-white p-5 dark:bg-gray-700">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Kapasitas
                        </p>
                        <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $pickupLocation->max_vehicle }}
                        </p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            kapasitas maksimum
                        </p>
                    </div>

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 9.75h15M6.75 5.25h10.5A2.25 2.25 0 0 1 19.5 7.5v10.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 18V7.5a2.25 2.25 0 0 1 2.25-2.25Z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- TRANSACTION --}}

            <div class="rounded-2xl bg-white p-5 dark:bg-gray-700">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Transaksi
                        </p>
                        <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                            —
                        </p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            belum tersedia
                        </p>
                    </div>

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3.75h10.5A2.25 2.25 0 0 1 19.5 6v12a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 18V6a2.25 2.25 0 0 1 2.25-2.25Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 8.25h7.5M8.25 12h7.5M8.25 15.75h4.5" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        {{-- AVAILABLE VEHICLES --}}

        <section class="mb-4 mt-4">
            <div class="mb-4 flex items-end justify-between gap-4">
                <div>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Kendaraan di Lokasi Ini</h2>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Daftar kendaraan yang tersedia di
                        lokasi ini</p>
                </div>
                <a href="{{ route('vehicles.index') }}"
                    class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">
                    Lihat semua
                </a>
            </div>
            <div class="grid grid-cols-2 gap-3 md:grid-cols-3 md:gap-4 lg:grid-cols-6">
                @forelse ($vehicles as $vehicle)
                    <a href="{{ route('vehicles.show', $vehicle->id) }}"
                        class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <img src="{{ asset('storage/' . $vehicle->profile) }}"
                                alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            <span
                                class="absolute left-2.5 top-2.5 rounded-full bg-white/90 px-2 py-1 text-[9px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">
                                {{ $vehicle->type->name }}
                            </span>
                        </div>
                        <div class="p-3 sm:p-4">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                                    {{ $vehicle->brand }} {{ $vehicle->model }}
                                </h3>
                                <span class="shrink-0 text-[9px] font-medium text-gray-400">
                                    {{ $vehicle->seats }} Kursi
                                </span>
                            </div>
                            <div class="mt-3 flex items-center gap-2">
                                <div class="h-7 w-7 shrink-0 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-500">
                                    <img src="{{ $vehicle->owner->profile ? asset('storage/' . $vehicle->owner->profile) : asset('images/default-profile.png') }}"
                                        alt="{{ $vehicle->owner->name }}" class="h-full w-full object-cover">
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[9px] text-gray-400">Pemilik</p>
                                    <p class="truncate text-xs font-medium text-gray-700 dark:text-gray-200">
                                        {{ $vehicle->owner->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-3 border-t border-gray-100 pt-2.5 dark:border-gray-600">
                                <span class="text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $vehicle->deposit_amount ? 'Rp ' . number_format($vehicle->deposit_amount, 0, ',', '.') : 'Tanpa deposit' }}
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full rounded-2xl bg-gray-50 p-8 text-center dark:bg-gray-800">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada kendaraan lainnya.</p>
                    </div>
                @endforelse
            </div>
        </section>

        {{-- LOCATION INFORMATION --}}

        <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- INFORMATION --}}

            <div class="rounded-2xl bg-white dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Informasi Pickup Location
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Informasi lokasi yang tersimpan di sistem.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-x-6 gap-y-6 p-5 sm:p-6">

                    <div class="col-span-2">
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Nama Lokasi
                        </p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                            {{ $pickupLocation->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Latitude
                        </p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                            {{ $pickupLocation->latitude }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Longitude
                        </p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                            {{ $pickupLocation->longitude }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Kapasitas
                        </p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                            {{ $pickupLocation->max_vehicle }} kendaraan
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Status
                        </p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                            {{ $pickupLocation->status }}
                        </p>
                    </div>

                    <div class="col-span-2">
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">
                            Alamat
                        </p>
                        <p class="mt-1 text-sm leading-6 text-gray-800 dark:text-gray-200">
                            {{ $pickupLocation->address }}
                        </p>
                    </div>

                </div>
            </div>

            {{-- DESCRIPTION --}}

            <div class="rounded-2xl bg-white dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Tentang Pickup Location
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Informasi tambahan mengenai lokasi.
                    </p>
                </div>

                <div class="p-5 sm:p-6">
                    <p class="text-sm leading-7 text-gray-500 dark:text-gray-300">
                        {{ $pickupLocation->description ?: 'Belum ada deskripsi untuk pickup location ini.' }}
                    </p>
                </div>
            </div>

        </div>

        {{-- MAP --}}

        <div class="mt-6 overflow-hidden rounded-2xl bg-white dark:bg-gray-700">
            <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Lokasi pada Peta
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Posisi pickup location berdasarkan koordinat yang tersimpan.
                </p>
            </div>

            <iframe
                src="https://www.google.com/maps?q={{ $pickupLocation->latitude }},{{ $pickupLocation->longitude }}&output=embed"
                class="h-72 w-full border-0 sm:h-96" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        {{-- VEHICLE OWNERS --}}

        <div class="mt-6 rounded-2xl bg-white dark:bg-gray-700">
            <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Pemilik Kendaraan
                        </h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Pengguna yang menitipkan kendaraan pada pickup location ini.
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-5 sm:p-6">
                <div class="flex flex-wrap gap-3">

                    @forelse ($owner as $item)
                        <div
                            class="flex w-full items-center gap-3 rounded-2xl border border-gray-100 bg-gray-50 p-4 sm:w-[calc(50%-6px)] dark:border-gray-600 dark:bg-gray-600">

                            <div class="h-11 w-11 shrink-0 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-500">
                                <img src="{{ $item->profile ? asset('storage/' . $item->profile) : asset('images/default-profile.png') }}"
                                    alt="{{ $item->name }}" class="h-full w-full object-cover">
                            </div>

                            <div class="min-w-0 flex-1">
                                <p class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $item->name }}
                                </p>

                                <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-300">
                                    {{ $item->email }}
                                </p>

                                <p class="mt-1 text-[11px] text-gray-400 dark:text-gray-400">
                                    {{ $item->vehicles->where('pickup_location_id', $pickupLocation->id)->where('owner_id', $item->id)->count() }}
                                    Kendaraan ditempatkan di lokasi ini
                                </p>
                            </div>

                        </div>
                    @empty
                        <div class="w-full py-6 text-center">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Belum ada pemilik kendaraan.
                            </p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

        {{-- ADMIN ACTION --}}

        @if (auth()->user()->mitra_status === 'Verified')
            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

                {{-- STAFF PICKUP LOCATION --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Staff Pickup Location
                        </h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Pemilik kendaraan yang saat ini menyimpan kendaraannya di lokasi ini.
                        </p>
                    </div>

                    <div class="p-5 sm:p-6">
                        <div class="grid grid-cols-2 gap-3">
                            @forelse ($pickupLocation->vehicles->pluck('owner')->filter()->unique('id') as $owner)
                                <div class="flex items-center gap-3 rounded-xl bg-gray-50 p-3 dark:bg-gray-600">
                                    <div
                                        class="h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-500">
                                        <img src="{{ $owner->profile ? asset('storage/' . $owner->profile) : asset('images/default-profile.png') }}"
                                            alt="{{ $owner->name }}" class="h-full w-full object-cover">
                                    </div>

                                    <div class="min-w-0">
                                        <p class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                            {{ $owner->name }}
                                        </p>
                                        <p class="truncate text-xs text-gray-500 dark:text-gray-300">
                                            Pemilik Kendaraan
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-2 rounded-xl bg-gray-50 p-4 text-center dark:bg-gray-600">
                                    <p class="text-sm text-gray-500 dark:text-gray-300">
                                        Belum ada pemilik kendaraan di lokasi ini.
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- USER ACTION --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Kendaraan Saya
                        </h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Kelola kendaraan yang ingin ditempatkan di pickup location ini.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-3 p-5 sm:grid-cols-2 sm:p-6">

                        {{-- AJUKAN KENDARAAN --}}

                        <a href="{{ route('join-pickup-location.veh', $pickupLocation->id) }}"
                            class="flex items-center gap-3 rounded-xl bg-gray-800 px-4 py-4 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5.25v13.5M5.25 12h13.5" />
                            </svg>

                            <span>Ajukan Kendaraan</span>
                        </a>

                        {{-- LIHAT KENDARAAN --}}

                        <a href="{{ route('join-pickup-location.vehun', $pickupLocation->id) }}"
                            class="flex items-center gap-3 rounded-xl bg-gray-50 px-4 py-4 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor"
                                class="h-5 w-5 shrink-0 text-gray-500 dark:text-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6-9.75-6-9.75-6Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 15.375a3.375 3.375 0 1 0 0-6.75 3.375 3.375 0 0 0 0 6.75Z" />
                            </svg>

                            <span>Lihat Kendaraanmu</span>
                        </a>

                    </div>
                </div>

            </div>
        @endif

        {{-- SYSTEM INFORMATION --}}

        <div class="mt-6 rounded-2xl bg-gray-100 p-5 dark:bg-gray-800">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 11.25h1.5v4.5h-1.5v-4.5Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                </svg>

                <div>
                    <p class="text-xs font-medium text-gray-600 dark:text-gray-300">
                        Informasi sistem
                    </p>

                    <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                        Pickup location yang berstatus Inactive tidak dapat digunakan sebagai lokasi kendaraan
                        yang tersedia untuk disewa. Kendaraan dengan status Inactive atau Not Available juga
                        tidak dapat ditawarkan kepada pelanggan.
                    </p>
                </div>
            </div>
        </div>

    </section>

@endsection
