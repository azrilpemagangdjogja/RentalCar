@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('pickup-location.index') }}"
                        class="truncate transition hover:text-gray-700 dark:hover:text-gray-200">Lokasi Pengambilan</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span class="truncate">{{ $pickupLocation->name }}</span>
                </div>
                <h1 class="truncate text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    {{ $pickupLocation->name }}</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Detail dan kendaraan yang tersedia pada lokasi pengambilan ini.</p>
            </div>
            <a href="{{ route('pickup-location.index') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487 19.5 7.125M18.5 2.5a2.121 2.121 0 0 1 3 3L8.5 18.5l-4 1 1-4L18.5 2.5Z" />
                </svg> --}}
                Kembali
            </a>
        </div>

        {{-- LOCATION OVERVIEW --}}
        <div class="mt-8 mb-6 rounded-2xl bg-white p-5 dark:bg-gray-700 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-white text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                        stroke="currentColor" class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="min-w-0">
                            <h2 class="truncate text-lg font-bold text-gray-800 dark:text-white">{{ $pickupLocation->name }}
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                                {{ $pickupLocation->address }}</p>
                        </div>
                        <span
                            class="w-fit rounded-full bg-gray-800 px-3 py-1.5 text-xs font-semibold text-white dark:bg-white dark:text-gray-800">{{ $pickupLocation->status }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- MAIN CONTENT --}}

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- LEFT CONTENT --}}

            <div class="space-y-6 lg:col-span-2">

                {{-- STATISTICS --}}

                <div class="grid grid-cols-2 gap-3">
                    <div class="rounded-2xl bg-white p-5 dark:bg-gray-700">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Kapasitas Maksimum</p>
                                <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                                    {{ $pickupLocation->max_vehicle }}</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">kendaraan</p>
                            </div>
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.6" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-2xl bg-white p-5 dark:bg-gray-700">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Kendaraan</p>
                                <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                                    {{ $pickupLocation->vehicles->count() }}</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">dari
                                    {{ $pickupLocation->max_vehicle }} kapasitas</p>
                            </div>
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.6" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- LOCATION INFORMATION --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Lokasi</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi lengkap pickup location yang
                            tersimpan di sistem.</p>
                    </div>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 p-5 sm:grid-cols-2 sm:p-6">
                        <div class="sm:col-span-1">
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Nama Pickup Location</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $pickupLocation->name }}
                            </p>
                        </div>
                        <div class="sm:col-span-1">
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Alamat</p>
                            <p class="mt-1 text-sm leading-6 text-gray-800 dark:text-gray-200">
                                {{ $pickupLocation->address }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Latitude</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $pickupLocation->latitude }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Longitude</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $pickupLocation->longitude }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Kapasitas</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $pickupLocation->max_vehicle }} kendaraan</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Status</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $pickupLocation->status }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- DESCRIPTION --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Deskripsi</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Deskripsi mengenai pickup location.</p>
                    </div>
                    <div class="p-5 sm:p-6">
                        <p class="text-sm leading-7 text-gray-500 dark:text-gray-400">
                            {{ $pickupLocation->description ?: 'Belum ada deskripsi untuk pickup location ini.' }}</p>
                    </div>
                </div>

                {{-- VEHICLES --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-base font-semibold text-gray-800 dark:text-white">Kendaraan</h2>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Daftar kendaraan yang ditempatkan
                                    pada pickup location ini.</p>
                            </div>
                            <span
                                class="w-fit rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">{{ $pickupLocation->vehicles->count() }}
                                kendaraan</span>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-600">
                        @forelse ($pickupLocation->vehicles as $vehicle)
                            <div class="flex items-center gap-4 p-4 sm:p-5">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.6" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                    </svg>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $vehicle->brand }} {{ $vehicle->model }}
                                    </h3>

                                    <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">
                                        {{ $vehicle->plate_number }} · {{ $vehicle->year }} ·
                                        {{ $vehicle->transmission ?? '-' }}
                                    </p>

                                    <p class="mt-1 truncate text-xs text-gray-400 dark:text-gray-500">
                                        Pemilik: {{ $vehicle->owner->name ?? '-' }}
                                    </p>
                                </div>

                                <span
                                    class="hidden shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200 sm:block">
                                    {{ $vehicle->type->name ?? '-' }}
                                </span>

                                <a href="{{ route('vehicle.show', $vehicle->id) }}"
                                    class="inline-flex shrink-0 items-center gap-2 rounded-xl px-3 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <span class="hidden sm:inline">Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                                    </svg>
                                </a>
                            </div>
                        @empty
                            <div class="p-8 text-center">
                                <div
                                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                    </svg>
                                </div>
                                <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-300">Belum ada kendaraan
                                </p>
                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Tambahkan kendaraan untuk
                                    menyediakan kendaraan di lokasi ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}

            <div class="space-y-6">

                {{-- INFO PEMILIK --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700 md:hidden">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Info Pemilik</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi pemilik pickup location.</p>
                    </div>

                    <div class="p-5">
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                <img src="{{ $pickupLocation->owner->profile ? asset('storage/' . $pickupLocation->owner->profile) : asset('images/default-profile.png') }}"
                                    alt="{{ $pickupLocation->owner->name }}" class="h-full w-full object-cover">
                            </div>

                            <div class="min-w-0">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $pickupLocation->owner->name }}
                                </h3>
                                <p class="mt-0.5 truncate text-xs text-gray-500 dark:text-gray-400">
                                    {{ $pickupLocation->owner->email }}
                                </p>
                            </div>
        
                        </div>

                        <div class="mt-5 divide-y divide-gray-100 dark:divide-gray-600">
                            <div class="flex items-center justify-between gap-4 py-3 first:pt-0">
                                <span class="text-sm text-gray-500 dark:text-gray-400">No. Telepon</span>
                                <span class="text-right text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{ $pickupLocation->owner->telp ?? '-' }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between gap-4 py-3 last:pb-0">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Status Mitra</span>
                                <span
                                    class="rounded-lg bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                    {{ $pickupLocation->owner->mitra_status }}
                                </span>
                            </div>
                            <div class="flex items-center justify-end gap-4 py-3 last:pb-0">
                                <a  href="{{ route('profile.show', $pickupLocation->owner->id) }}"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl border border-gray-800 px-4 py-3 text-sm font-semibold text-gray-800 transition hover:border-gray-700 dark:border-white dark:text-white dark:hover:border-gray-200">
                                    Lihat Profil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- LOCATION STATUS --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Status Pickup Location</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Atur ketersediaan lokasi untuk digunakan.
                        </p>
                    </div>
                    <div class="p-5">
                        <div class="mb-4 flex items-center justify-between gap-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Status saat ini</span>
                            <span
                                class="inline-flex items-center gap-1.5 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-white dark:text-gray-800">
                                <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                {{ $pickupLocation->status }}
                            </span>
                        </div>

                        @if ($pickupLocation->status === 'Active')
                            <form action="{{ route('pickup-location.status', $pickupLocation->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Inactive">
                                <button type="submit"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-100 px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-white0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25a3.75 3.75 0 0 0-7.5 0V9m-3 0h13.5v9.75A2.25 2.25 0 0 1 16.5 21h-9a2.25 2.25 0 0 1-2.25-2.25V9Z" />
                                    </svg>
                                    Nonaktifkan Lokasi
                                </button>
                            </form>
                        @else
                            <form action="{{ route('pickup-location.status', $pickupLocation->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Active">
                                <button type="submit"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-4 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4.5 4.5L19 7" />
                                    </svg>
                                    Aktifkan Lokasi
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                {{-- INFO PEMILIK --}}

                <div class="rounded-2xl hidden bg-white dark:bg-gray-700 md:block">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Info Pemilik</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi pemilik pickup location.</p>
                    </div>

                    <div class="p-5">
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                <img src="{{ $pickupLocation->owner->profile ? asset('storage/' . $pickupLocation->owner->profile) : asset('images/default-profile.png') }}"
                                    alt="{{ $pickupLocation->owner->name }}" class="h-full w-full object-cover">
                            </div>

                            <div class="min-w-0">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $pickupLocation->owner->name }}
                                </h3>
                                <p class="mt-0.5 truncate text-xs text-gray-500 dark:text-gray-400">
                                    {{ $pickupLocation->owner->email }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 divide-y divide-gray-100 dark:divide-gray-600">
                            <div class="flex items-center justify-between gap-4 py-3 first:pt-0">
                                <span class="text-sm text-gray-500 dark:text-gray-400">No. Telepon</span>
                                <span class="text-right text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{ $pickupLocation->owner->telp ?? '-' }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between gap-4 py-3 last:pb-0">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Status Mitra</span>
                                <span
                                    class="rounded-lg bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                    {{ $pickupLocation->owner->mitra_status }}
                                </span>
                            </div>
                            <div class="flex items-center mb-1 border-gray-200 dark:border-gray-500 justify-end gap-4 py-3 last:pb-0">
                                <a  href="{{ route('profile.show', $pickupLocation->owner->id) }}"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl border border-gray-800 px-4 py-3 text-sm font-semibold text-gray-800 transition hover:border-gray-700 dark:border-white dark:text-white dark:hover:border-gray-200">
                                    Lihat Profil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- QUICK ACTION --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Aksi Pickup Location</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola kendaraan dan informasi lokasi.</p>
                    </div>
                    <div class="space-y-1 p-4">

                        {{-- ADD VEHICLE --}}

                        <a href="{{ route('pickup-location.veh', $pickupLocation->id) }}"
                            class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5.25v13.5M5.25 12h13.5" />
                                </svg>
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="block">Tambah Kendaraan</span>
                                <span class="mt-0.5 block text-xs font-normal text-gray-400 dark:text-gray-400">Tambahkan
                                    kendaraan ke lokasi ini.</span>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                            </svg>
                        </a>

                        {{-- MANAGE LOCATION --}}

                        <a href="{{ route('pickup-location.manage', $pickupLocation->id) }}"
                            class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-6-6h12M4.5 4.5h15v15h-15v-15Z" />
                                </svg>
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="block">Kelola Lokasi</span>
                                <span class="mt-0.5 block text-xs font-normal text-gray-400 dark:text-gray-400">Kapasitas,
                                    alamat, dan koordinat.</span>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                            </svg>
                        </a>

                        {{-- EDIT PROFILE --}}

                        <a href="{{ route('pickup-location.profile', $pickupLocation->id) }}"
                            class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487 18.75 6.375m-1.888-1.888L8.25 13.5l-.75 3 3-.75 8.612-8.613a1.5 1.5 0 0 0 0-2.121Z" />
                                </svg>
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="block">Edit Profil</span>
                                <span class="mt-0.5 block text-xs font-normal text-gray-400 dark:text-gray-400">Nama,
                                    deskripsi, dan hapus lokasi.</span>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                            </svg>
                        </a>

                    </div>
                </div>

                {{-- SYSTEM INFORMATION --}}

                <div class="rounded-2xl hidden bg-white p-5 dark:bg-gray-800 md:block">
                    <div class="flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25h1.5v4.5h-1.5v-4.5Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                        </svg>
                        <div>
                            <p class="text-xs font-medium text-gray-600 dark:text-gray-300">Informasi sistem</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">Pickup location yang
                                dinonaktifkan tidak dapat digunakan sebagai lokasi kendaraan yang tersedia untuk disewa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SYSTEM INFORMATION --}}

        <div class="rounded-2xl bg-gray-100 p-5 dark:bg-gray-800 md:hidden mt-6">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 11.25h1.5v4.5h-1.5v-4.5Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                </svg>
                <div>
                    <p class="text-xs font-medium text-gray-600 dark:text-gray-300">Informasi sistem</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">Pickup location yang
                        dinonaktifkan tidak dapat digunakan sebagai lokasi kendaraan yang tersedia untuk disewa.</p>
                </div>
            </div>
        </div>


        {{-- ACTION --}}
        {{-- <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
            <a href="{{ route('pickup-location.index') }}" class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">Kembali</a>
            <a href="{{ route('pickup-location.edit', $pickupLocation->id) }}" class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">Kelola Pickup Location</a>
        </div> --}}
    </section>
@endsection
