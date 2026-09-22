@extends('layouts.admin')
@section('content')
    {{-- HEADER --}}
    <section class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                {{-- <div class="flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Kendaraan</span>
                </div> --}}
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Kelola
                    Kendaraan</h1>
                <p class="mt-1 text-sm hidden sm:block text-gray-500 dark:text-gray-400">Kelola kendaraan yang kamu miliki.
                </p>
            </div>

            <a href="{{ route('vehicle.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                </svg>
                Tambah Kendaraan
            </a>
        </div>
    </section>

    {{-- SUMMARY --}}

    <div class="mt-8 hidden sm:grid grid-cols-2 gap-3 sm:grid-cols-4">

        {{-- TOTAL vehicle --}}

        <div class="rounded-2xl dark:border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Kendaraan</p>
                    <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehicles->count() }}</p>
                </div>
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5M6.75 18h.008v.008H6.75V18ZM17.25 18h.008v.008h-.008V18Z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- ACTIVE VEHICLE --}}

        <div class="rounded-2xl dark:border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Kendaraan Aktif</p>
                    <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehiclesActive }}</p>
                </div>
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 4.5 4.5 10.5-10.5" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- INACTIVE VEHICLE --}}

        <div class="rounded-2xl dark:border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Kendaraan Tidak Aktif</p>
                    <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehiclesInActive }}</p>
                </div>
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- IN LOCATION --}}

        <div class="rounded-2xl dark:border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Dititipkan ke Lokasi</p>
                    <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $vehicles->where('pickup_location_id', '!=', null)->count() }}</p>
                </div>
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- SEARCH & FILTER --}}

    <form action="{{ route('user.index') }}" class="mb-4 mt-8 flex flex-col gap-3 sm:flex-row">

        <div class="relative flex-1">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                </svg>
            </div>
            <input type="search" name="search" value="{{ request('search') }}"
                placeholder="Cari nama, email, atau nomor telepon..."
                class="w-full rounded-xl dark:border border-gray-200 bg-white py-3.5 pl-12 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
        </div>

        <select
            class="hidden sm:block rounded-xl dark:border border-gray-200 bg-white px-4 py-3.5 text-sm text-gray-700 outline-none transition focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:focus:border-gray-300">
            <option>Semua Role</option>
            <option>User</option>
            <option>Admin</option>
            <option>Superadmin</option>
        </select>

        <select
            class="hidden sm:block rounded-xl dark:border border-gray-200 bg-white px-4 py-3.5 text-sm text-gray-700 outline-none transition focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:focus:border-gray-300">
            <option>Semua Status</option>
            <option>Unverified</option>
            <option>Pending</option>
            <option>Verified</option>
            <option>Rejected</option>
        </select>

    </form>

    {{-- AVAILABLE VEHICLES --}}

    <section class="mb-4 mt-4">
        {{-- <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Kendaraan di Lokasi Ini</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Daftar kendaraan yang tersedia di
                    lokasi ini</p>
            </div>
            <a href="{{ route('vehicles.index') }}"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">
                Lihat semua
            </a>
        </div> --}}
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
@endsection
