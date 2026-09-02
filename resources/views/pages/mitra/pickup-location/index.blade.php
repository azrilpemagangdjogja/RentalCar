@extends('layouts.admin')
@section('content')
    <section class="w-full">
        {{-- HEADER --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Lokasi Pengambilan</span>
                </div>
                <h1 class="text-2xl mt-2 font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Lokasi
                    Pengambilan</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola lokasi pengambilan kendaraan yang kamu
                    miliki.</p>
            </div>
            <a href="{{ route('pickup-location.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5.25v13.5M5.25 12h13.5" />
                </svg>
                Tambah Lokasi
            </a>
        </div>

        {{-- SEARCH BAR --}}

        <section
            class="mt-6 rounded-2xl dark:border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="relative w-full lg:max-w-md">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.5-4.5m2.25-5.25a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Cari kendaraan, plat nomor, atau merek..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                </div>
            </div>
        </section>

        {{-- FEATURED LOCATIONS --}}
        <div class="mt-8">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white">Lokasi Unggulan</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lokasi dengan kapasitas kendaraan terbesar.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                {{-- FEATURED 1 --}}

                @foreach ($dataTop as $items)
                    <a href="{{ route('pickup-location.show', $items->id) }}"
                        class="group flex items-center gap-4 rounded-2xl dark:border border-gray-200 bg-white p-4 transition duration-200 hover:-translate-y-0.5 hover:border-gray-300 hover:shadow-md dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 md:block md:p-5">
                        <div
                            class="flex h-16 w-16 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300 md:h-28 md:w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-8 w-8 md:h-10 md:w-10">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1 md:mt-4">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h3 class="truncate text-base font-bold text-gray-800 dark:text-white">
                                        {{ $items->name }}</h3>
                                    <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">{{ $items->address }}
                                    </p>
                                </div>
                                <span
                                    class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">{{ $items->status }}</span>
                            </div>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="text-xs text-gray-400 dark:text-gray-400">Kapasitas</span>
                                <span
                                    class="text-sm font-bold text-gray-800 dark:text-white">{{ $items->vehicles->count() }}
                                    / {{ $items->max_vehicle }} kendaraan</span>
                            </div>
                        </div>
                    </a>
                @endforeach

                {{-- FEATURED 2 --}}
                {{-- <a href="#"
                    class="group flex items-center gap-4 rounded-2xl dark:border border-gray-200 bg-white p-4 transition duration-200 hover:-translate-y-0.5 hover:border-gray-300 hover:shadow-md dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 md:block md:p-5">
                    <div
                        class="flex h-16 w-16 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300 md:h-28 md:w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-8 w-8 md:h-10 md:w-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1 md:mt-4">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="truncate text-base font-bold text-gray-800 dark:text-white">RentalCar Malioboro
                                </h3>
                                <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">Jl. Malioboro, Yogyakarta
                                </p>
                            </div>
                            <span
                                class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">Active</span>
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-xs text-gray-400 dark:text-gray-400">Kapasitas</span>
                            <span class="text-sm font-bold text-gray-800 dark:text-white">18 kendaraan</span>
                        </div>
                    </div>
                </a> --}}

                {{-- FEATURED 3 --}}
                {{-- <a href="#"
                    class="group flex items-center gap-4 rounded-2xl dark:border border-gray-200 bg-white p-4 transition duration-200 hover:-translate-y-0.5 hover:border-gray-300 hover:shadow-md dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 md:block md:p-5">
                    <div
                        class="flex h-16 w-16 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300 md:h-28 md:w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-8 w-8 md:h-10 md:w-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1 md:mt-4">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="truncate text-base font-bold text-gray-800 dark:text-white">Basecamp Sleman</h3>
                                <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">Jl. Magelang, Sleman</p>
                            </div>
                            <span
                                class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">Active</span>
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-xs text-gray-400 dark:text-gray-400">Kapasitas</span>
                            <span class="text-sm font-bold text-gray-800 dark:text-white">14 kendaraan</span>
                        </div>
                    </div>
                </a> --}}
            </div>
        </div>

        {{-- OTHER LOCATIONS --}}
        <div class="mt-10">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white">Lokasi Lainnya</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Daftar pickup location lainnya.</p>
                </div>
                <span class="hidden text-xs text-gray-400 dark:text-gray-400 sm:block">12 lokasi</span>
            </div>

            <div class="overflow-hidden rounded-2xl dark:border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                {{-- ROW --}}
                <a href="#"
                    class="group flex flex-col gap-3 border-b border-gray-100 p-4 transition hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-600 sm:flex-row sm:items-center sm:gap-5">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">Pickup Location Bantul
                        </h3>
                        <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">Jl. Parangtritis, Bantul</p>
                    </div>
                    <div class="flex items-center justify-between gap-5 sm:justify-end">
                        <div>
                            <p class="text-[10px] text-gray-400 dark:text-gray-400">Kapasitas</p>
                            <p class="mt-0.5 text-sm font-semibold text-gray-800 dark:text-white">10 kendaraan</p>
                        </div>
                        <span
                            class="rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">Active</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor"
                            class="hidden h-5 w-5 text-gray-400 transition group-hover:translate-x-0.5 sm:block">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                        </svg>
                    </div>
                </a>

                {{-- ROW --}}
                <a href="#"
                    class="group flex flex-col gap-3 border-b border-gray-100 p-4 transition hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-600 sm:flex-row sm:items-center sm:gap-5">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">Pickup Location Kulon
                            Progo</h3>
                        <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">Jl. Wates, Kulon Progo</p>
                    </div>
                    <div class="flex items-center justify-between gap-5 sm:justify-end">
                        <div>
                            <p class="text-[10px] text-gray-400 dark:text-gray-400">Kapasitas</p>
                            <p class="mt-0.5 text-sm font-semibold text-gray-800 dark:text-white">8 kendaraan</p>
                        </div>
                        <span
                            class="rounded-full bg-gray-200 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-500 dark:text-gray-200">Inactive</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor"
                            class="hidden h-5 w-5 text-gray-400 transition group-hover:translate-x-0.5 sm:block">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                        </svg>
                    </div>
                </a>

                {{-- ROW --}}
                <a href="#"
                    class="group flex flex-col gap-3 p-4 transition hover:bg-gray-50 dark:hover:bg-gray-600 sm:flex-row sm:items-center sm:gap-5">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">Pickup Location Kota
                            Yogyakarta</h3>
                        <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">Jl. Godean, Yogyakarta</p>
                    </div>
                    <div class="flex items-center justify-between gap-5 sm:justify-end">
                        <div>
                            <p class="text-[10px] text-gray-400 dark:text-gray-400">Kapasitas</p>
                            <p class="mt-0.5 text-sm font-semibold text-gray-800 dark:text-white">6 kendaraan</p>
                        </div>
                        <span
                            class="rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">Active</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor"
                            class="hidden h-5 w-5 text-gray-400 transition group-hover:translate-x-0.5 sm:block">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                        </svg>
                    </div>
                </a>

            </div>
        </div>
    </section>
@endsection
