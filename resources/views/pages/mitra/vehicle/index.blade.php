@extends('layouts.admin')
@section('content')
    {{-- HEADER --}}

    <section class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Kendaraan Saya</h1>
                <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Kelola kendaraan dan lokasi
                    penempatannya dengan mudah.</p>
            </div>
            <a href="{{ route('vehicle.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                </svg>
                Tambah Kendaraan
            </a>
        </div>
    </section>

    {{-- SUMMARY --}}

    <section class="mb-6 hidden sm:grid gap-3 grid-cols-4">
        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Kendaraan</p>
            <div class="mt-2 flex items-end justify-between gap-3">
                <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $vehicles->count() }}</p>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5M6.75 18h.008v.008H6.75V18ZM17.25 18h.008v.008h-.008V18Z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Kendaraan Aktif</p>
            <div class="mt-2 flex items-end justify-between gap-3">
                <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $vehiclesActive }}</p>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 4.5 4.5 10.5-10.5" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Belum Aktif</p>
            <div class="mt-2 flex items-end justify-between gap-3">
                <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $vehiclesInActive }}</p>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Ditempatkan</p>
            <div class="mt-2 flex items-end justify-between gap-3">
                <p class="text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $vehicles->whereNotNull('pickup_location_id')->count() }}</p>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    {{-- SEARCH & FILTER --}}

    <section class="mb-6">
        <form action="{{ route('vehicle.index') }}" method="GET">
            <div class="relative">
                <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m21 21-4.35-4.35m1.35-5.15a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z" />
                </svg>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari kendaraan..."
                    class="w-full rounded-2xl border border-gray-100 bg-white py-4 pl-12 pr-4 text-sm text-gray-700 outline-none placeholder:text-gray-400 focus:border-gray-300 focus:ring-0 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 dark:placeholder:text-gray-400">
            </div>
            <div class="mt-3 flex gap-2 overflow-x-auto scrollbar-none pb-1">
                <a href="{{ route('vehicle.index') }}"
                    class="shrink-0 rounded-xl bg-gray-800 px-4 py-2 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                    Semua
                </a>
                <input type="submit" name="active" value="Aktif"
                    class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                <input type="submit" name="inactive" value="Tidak Aktif"
                    class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                <input type="submit" name="unassigned" value="Belum Ditempatkan"
                    class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">

                {{-- <a href="#"
                    class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    Tidak Aktif
                </a>
                <a href="#"
                    class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    Belum Ditempatkan
                </a> --}}
            </div>
        </form>
    </section>

    {{-- VEHICLE LIST --}}

    <section>
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Daftar Kendaraan</h2>
                <p class="mt-1 hidden text-xs text-gray-500 dark:text-gray-400 sm:block sm:text-sm">Kendaraan yang kamu
                    miliki dan kelola.</p>
            </div>
            <span class="shrink-0 text-xs text-gray-400">{{ $vehicles->count() }} kendaraan</span>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 xl:grid-cols-5">
            @forelse($vehicles as $item)
                <div
                    class="group overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <a href="{{ route('vehicle.show', $item->id) }}" class="block">
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                            @if ($item->profile)
                                <img src="{{ asset('storage/' . $item->profile) }}"
                                    alt="{{ $item->brand }} {{ $item->model }}"
                                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            @else
                                <div
                                    class="flex h-full w-full items-center justify-center text-gray-400 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-10 w-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                                    </svg>
                                </div>
                            @endif
                            <span
                                class="absolute left-2.5 top-2.5 rounded-full bg-white/90 px-2 py-1 text-[9px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">
                                {{ $item->status }}
                            </span>
                        </div>
                        <div class="p-3 sm:p-4">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                                    {{ $item->brand }} {{ $item->model }}</h3>
                                <span class="shrink-0 text-[9px] font-medium text-gray-400">{{ $item->year }}</span>
                            </div>
                            <p class="mt-1 truncate text-[10px] text-gray-500 dark:text-gray-400 sm:text-xs">
                                {{ $item->plate_number }}</p>
                            <div class="mt-2 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-3.5 w-3.5 shrink-0 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                </svg>
                                <span
                                    class="truncate text-[10px] text-gray-400">{{ $item->pickupLocation?->name ?? 'Belum ditempatkan' }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="flex gap-2 border-t border-gray-100 p-3 dark:border-gray-600">
                        <a href="{{ route('vehicle.show', $item->id) }}"
                            class="flex flex-1 items-center justify-center rounded-xl bg-gray-100 py-2 text-[10px] font-semibold text-gray-700 transition hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">
                            Lihat
                        </a>
                        <a href="{{ route('vehicle.edit', $item->id) }}"
                            class="flex flex-1 items-center justify-center rounded-xl bg-gray-800 py-2 text-[10px] font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                            Edit
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-2xl bg-gray-50 p-8 text-center dark:bg-gray-800">
                    <div
                        class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-gray-100 text-gray-400 dark:bg-gray-700 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                        </svg>
                    </div>
                    <p class="mt-3 text-sm font-medium text-gray-600 dark:text-gray-300">Belum ada kendaraan</p>
                    <p class="mt-1 text-xs text-gray-400">Tambahkan kendaraan untuk mulai mengelola armadamu.</p>
                    <a href="{{ route('vehicle.create') }}"
                        class="mt-4 inline-flex items-center gap-2 rounded-xl bg-gray-800 px-4 py-2.5 text-xs font-semibold text-white hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                        </svg>
                        Tambah Kendaraan
                    </a>
                </div>
            @endforelse
        </div>
    </section>
@endsection
