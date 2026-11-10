@extends('layouts.admin')

@section('content')
 {{-- HEADER --}}
    {{-- <section class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Menu Beranda</h1>
                <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Selamat datang di dashboard mitra</p>
            </div>
        </div>
    </section> --}}

    {{-- SEARCH & HERO --}}

    <section class="mb-6">
        <form action="#" method="GET">
            <div class="relative">
                <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m21 21-4.35-4.35m1.35-5.15a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari kendaraan, transaksi, lokasi..."
                    class="w-full rounded-2xl border border-gray-100 bg-white py-4 pl-12 pr-20 text-sm text-gray-700 outline-none placeholder:text-gray-400 focus:border-gray-300 focus:ring-0 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 dark:placeholder:text-gray-400">
                <button type="submit"
                    class="absolute right-2 top-1/2 -translate-y-1/2 rounded-xl bg-gray-800 px-4 py-2.5 text-xs font-semibold text-white hover:bg-gray-700">
                    Cari
                </button>
            </div>
        </form>
        <div class="grid grid-cols-1 sm:grid-cols-4">
            <div class="relative mt-6 h-32 w-full overflow-hidden rounded-2xl sm:col-span-2 sm:h-64">
                <img src="{{ asset('images/login-background.png') }}" alt="Dashboard Mitra"
                    class="absolute inset-0 h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/40 to-gray-800/10"></div>
                <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-4 p-4 sm:p-6">
                    <div class="min-w-0 text-white">
                        <h2 class="truncate text-base font-semibold sm:text-2xl">Kelola kendaraanmu</h2>
                        <p class="mt-1 truncate text-xs text-gray-200 sm:text-sm">Pantau kendaraan, transaksi, dan lokasi
                            pengambilan.</p>
                    </div>
                    <a href="{{ route('vehicle.create') }}"
                        class="shrink-0 rounded-xl bg-white px-3 py-2 text-xs font-semibold text-gray-800 transition hover:bg-gray-100 sm:px-4 sm:py-2.5 sm:text-sm">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-4 gap-2 sm:col-span-2 sm:ml-4 sm:mt-6 sm:grid-cols-2 sm:gap-3">
                <a href="#"
                    class="relative flex min-h-24 w-full overflow-hidden rounded-2xl bg-gray-700 bg-cover bg-center p-2 sm:min-h-0 sm:p-4"
                    style="background-image: url('{{ asset('images/mitra-default.png') }}');">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/60 to-gray-700/20"></div>
                    <div class="relative z-10 flex w-full items-end">
                        <div class="flex flex-col items-start gap-2 text-white sm:flex-row sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-6 w-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6.586a1 1 0 0 1 .707.293l4.414 4.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2Z" />
                            </svg>
                            <span class="text-sm font-semibold">Transaksi</span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('vehicle.index') }}"
                    class="relative flex min-h-24 w-full overflow-hidden rounded-2xl bg-gray-700 bg-cover bg-center p-2 sm:min-h-0 sm:p-4"
                    style="background-image: url('{{ asset('images/mitra-default.png') }}');">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/60 to-gray-700/20"></div>
                    <div class="relative z-10 flex w-full items-end">
                        <div class="flex flex-col items-start gap-2 text-white sm:flex-row sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-6 w-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13h2l2-5h10l2 5h2m-16 0v4a1 1 0 0 0 1 1h1m14-5v4a1 1 0 0 1-1 1h-1M7 13h10M7 17h.01M17 17h.01" />
                            </svg>
                            <span class="text-sm font-semibold">Kendaraan</span>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="relative flex min-h-24 w-full overflow-hidden rounded-2xl bg-gray-700 bg-cover bg-center p-2 sm:min-h-0 sm:p-4"
                    style="background-image: url('{{ asset('images/mitra-default.png') }}');">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/60 to-gray-700/20"></div>
                    <div class="relative z-10 flex w-full items-end">
                        <div class="flex flex-col items-start gap-2 text-white sm:flex-row sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-6 w-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            </svg>
                            <span class="text-sm font-semibold">Lokasi</span>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="relative flex min-h-24 w-full overflow-hidden rounded-2xl bg-gray-700 bg-cover bg-center p-2 sm:min-h-0 sm:p-4"
                    style="background-image: url('{{ asset('images/mitra-default.png') }}');">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/60 to-gray-700/20"></div>
                    <div class="relative z-10 flex w-full items-end">
                        <div class="flex flex-col items-start gap-2 text-white sm:flex-row sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-6 w-6 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M12 3a9 9 0 1 1 0 18 9 9 0 0 1 0-18Z" />
                            </svg>
                            <span class="text-sm font-semibold">Pengajuan</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- TRANSAKSI TERAKHIR --}}

    <section class="mb-8">
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Transaksi Terakhir</h2>
                <p class="mt-1 hidden text-xs text-gray-500 dark:text-gray-400 sm:block sm:text-sm">Aktivitas rental
                    kendaraan terbaru.</p>
            </div>
            <a href="#"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                semua</a>
        </div>
        <div class="space-y-3">
            {{-- @forelse ($recentTransactions as $transaction)
                <a href="#" class="flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 sm:gap-4 sm:p-4">
                    <div class="h-16 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600 sm:h-20 sm:w-28">
                        <img src="{{ asset('storage/' . $transaction->vehicle->profile) }}" alt="{{ $transaction->vehicle->brand }} {{ $transaction->vehicle->model }}"
                            class="h-full w-full object-cover">
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">{{ $transaction->vehicle->brand }} {{ $transaction->vehicle->model }}</h3>
                                <p class="mt-1 truncate text-[10px] text-gray-500 dark:text-gray-400 sm:text-xs">{{ $transaction->customer->name }}</p>
                            </div>
                            <span class="shrink-0 rounded-full bg-gray-100 px-2 py-1 text-[9px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">{{ $transaction->status }}</span>
                        </div>
                        <div class="mt-2 flex items-center justify-between gap-3">
                            <span class="truncate text-[10px] text-gray-400 sm:text-xs">{{ $transaction->start_date }}</span>
                            <span class="shrink-0 text-xs font-semibold text-gray-800 dark:text-white sm:text-sm">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </a>
            @empty --}}
            <div class="rounded-2xl bg-gray-50 p-8 text-center dark:bg-gray-800">
                <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada transaksi.</p>
            </div>
            {{-- @endforelse --}}
        </div>
    </section>

    {{-- LOKASI PENGAMBILAN --}}

    <section class="mb-8">
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Lokasi Pengambilan</h2>
                <p class="mt-1 hidden text-xs text-gray-500 dark:text-gray-400 sm:block sm:text-sm">Lokasi tempat
                    kendaraanmu ditempatkan.</p>
            </div>
            <a href="#"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                semua</a>
        </div>
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($pickupLocations as $location)
                <a href="#"
                    class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-start gap-3">
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $location->name }}</h3>
                                <p class="mt-1 line-clamp-2 text-xs text-gray-500 dark:text-gray-400">
                                    {{ $location->address }}</p>
                            </div>
                        </div>
                        <span
                            class="shrink-0 rounded-full bg-gray-100 px-2 py-1 text-[9px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">{{ $location->vehicles_count }}
                            kendaraan</span>
                    </div>
                    <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-600">
                        <span class="text-[10px] text-gray-400">Kapasitas {{ $location->max_vehicle }}</span>
                        <span
                            class="text-xs font-semibold text-gray-600 group-hover:text-gray-800 dark:text-gray-300 dark:group-hover:text-white">Lihat
                            lokasi</span>
                    </div>
                </a>
            @empty
                <div class="col-span-full rounded-2xl bg-gray-50 p-8 text-center dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada lokasi pengambilan.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- KENDARAAN SAYA --}}

    <section class="mb-8">
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Kendaraan Saya</h2>
                <p class="mt-1 hidden text-xs text-gray-500 dark:text-gray-400 sm:block sm:text-sm">Daftar kendaraan yang
                    kamu kelola.</p>
            </div>
            <a href="{{ route('vehicles.index') }}"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                semua</a>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 xl:grid-cols-5">
            @forelse ($vehicles as $vehicle)
                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                    class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                        <img src="{{ asset('storage/' . $vehicle->profile) }}"
                            alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        <span
                            class="absolute left-2.5 top-2.5 rounded-full bg-white/90 px-2 py-1 text-[9px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">
                            {{ $vehicle->status }}
                        </span>
                    </div>
                    <div class="p-3 sm:p-4">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                                {{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                            <span class="shrink-0 text-[9px] font-medium text-gray-400">{{ $vehicle->year }}</span>
                        </div>
                        <p class="mt-1 truncate text-[10px] text-gray-500 dark:text-gray-400 sm:text-xs">
                            {{ $vehicle->plate_number }}</p>
                        <div class="mt-2 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-3.5 w-3.5 shrink-0 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            </svg>
                            <span
                                class="truncate text-[10px] text-gray-400">{{ $vehicle->pickupLocation?->name ?? 'Belum ditempatkan' }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full rounded-2xl bg-gray-50 p-8 text-center dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada kendaraan.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- KENDARAAN DITEMPATKAN --}}

    <section class="mb-8">
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Kendaraan Ditempatkan</h2>
                <p class="mt-1 hidden text-xs text-gray-500 dark:text-gray-400 sm:block sm:text-sm">Pantau kendaraan
                    berdasarkan lokasi pengambilannya.</p>
            </div>
            <a href="#"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                semua</a>
        </div>
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($placedVehicles as $location)
                <a href="#"
                    class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $location->name }}</h3>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $location->vehicles_count }}
                                    kendaraan ditempatkan</p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor"
                            class="h-5 w-5 shrink-0 text-gray-400 transition group-hover:text-gray-700 dark:group-hover:text-gray-200">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg>
                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-2">
                        @foreach ($location->vehicles->take(3) as $vehicle)
                            <div class="aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                <img src="{{ asset('storage/' . $vehicle->profile) }}"
                                    alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                    class="h-full w-full object-cover">
                            </div>
                        @endforeach
                    </div>
                </a>
            @empty
                <div class="col-span-full rounded-2xl bg-gray-50 p-8 text-center dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada kendaraan yang ditempatkan.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
