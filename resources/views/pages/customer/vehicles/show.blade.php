@extends('layouts.admin')

@section('content')
    {{-- HEADER --}}


    <section class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Detail Kendaraan</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Detail informasi kendaraan {{ $vehicle->brand }}
                    {{ $vehicle->model }}.</p>
            </div>
            <a href="{{ route('customer.dashboard') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.5 7.5 12l7.5-7.5" />
                </svg>
                Kembali
            </a>
        </div>
    </section>

    {{-- VEHICLE DETAIL --}}

    <section class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
        <div class="grid gap-5 p-4 sm:gap-6 sm:p-6 lg:grid-cols-5">

            {{-- IMAGE --}}

            <div class="lg:col-span-2">
                <div class="aspect-[4/3] overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-800">
                    <img src="{{ asset('storage/' . $vehicle->profile) }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                        class="h-full w-full object-cover">
                </div>
            </div>

            {{-- INFORMATION --}}

            <div class="min-w-0 lg:col-span-3">

                {{-- TITLE --}}

                <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0">
                        <span
                            class="inline-flex rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                            {{ $vehicle->type->name }}
                        </span>
                        <h2 class="mt-2 text-xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-2xl">
                            {{ $vehicle->brand }} {{ $vehicle->model }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            {{ $vehicle->year }} · {{ $vehicle->color ?? 'Warna tidak tersedia' }}
                        </p>
                    </div>

                    @if ($vehicle->status === 'Active')
                        <span
                            class="inline-flex shrink-0 items-center gap-1.5 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                            <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                            Tersedia
                        </span>
                    @elseif ($vehicle->status === 'Not Available')
                        <span
                            class="inline-flex shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                            Tidak tersedia
                        </span>
                    @else
                        <span
                            class="inline-flex shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                            Tidak aktif
                        </span>
                    @endif
                </div>

                {{-- QUICK SPECIFICATION --}}

                <div class="mt-5 grid grid-cols-2 gap-2.5 sm:grid-cols-4">
                    <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-800">
                        <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500">Tahun</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicle->year }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-800">
                        <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500">Warna</p>
                        <p class="mt-1 truncate text-sm font-semibold text-gray-800 dark:text-white">
                            {{ $vehicle->color ?? '-' }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-800">
                        <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500">Transmisi</p>
                        <p class="mt-1 truncate text-sm font-semibold text-gray-800 dark:text-white">
                            {{ $vehicle->transmission ?? '-' }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-800">
                        <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500">Kursi</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicle->seats ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- DESCRIPTION --}}

                <div class="mt-5">
                    <p class="text-sm leading-6 text-gray-600 dark:text-gray-300">
                        {{ $vehicle->description ?: 'Tidak ada deskripsi kendaraan.' }}
                    </p>
                </div>

                {{-- PLATE & PICKUP --}}

                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-xl border border-gray-100 p-3.5 dark:border-gray-600">
                        <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500">Nomor Kendaraan</p>
                        <p class="mt-1 text-sm font-semibold uppercase text-gray-800 dark:text-white">
                            {{ $vehicle->plate_number }}</p>
                    </div>

                    <div class="rounded-xl border border-gray-100 p-3.5 dark:border-gray-600">
                        <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500">Pickup Location</p>
                        @if ($vehicle->pickupLocation)
                            <p class="mt-1 truncate text-sm font-semibold text-gray-800 dark:text-white">
                                {{ $vehicle->pickupLocation->name }}</p>
                        @else
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Belum tersedia</p>
                        @endif
                    </div>
                </div>

                {{-- RENTAL ACTION --}}

                <div class="mt-5 border-t border-gray-100 pt-5 dark:border-gray-600">
                    <div class="flex items-center justify-between gap-4">
                        <div class="min-w-0">
                            <p class="text-xs text-gray-400 dark:text-gray-500">Deposit</p>
                            <p class="mt-1 truncate text-lg font-bold text-gray-800 dark:text-white">
                                {{ $vehicle->deposit_amount ? 'Rp ' . number_format($vehicle->deposit_amount, 0, ',', '.') : 'Tidak ada' }}
                            </p>
                        </div>

                        @if ($vehicle->status === 'Active')
                            <a href="#"
                                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                                Pesan Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m13.5 4.5 7.5 7.5-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        @else
                            <button type="button" disabled
                                class="shrink-0 rounded-xl bg-gray-100 px-5 py-3 text-sm font-semibold text-gray-400 dark:bg-gray-600 dark:text-gray-400">
                                Tidak Tersedia
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ADDITIONAL INFORMATION --}}

    <div class="mt-5 grid gap-5 lg:grid-cols-3">

        {{-- SPECIFICATION --}}

        <section class="rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700 lg:col-span-2">
            <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">Spesifikasi</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi teknis kendaraan.</p>
            </div>

            <div class="grid grid-cols-2 gap-x-6 gap-y-5 p-5 sm:grid-cols-3 sm:p-6">

                {{-- TYPE --}}

                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Tipe</p>
                    <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->type->name }}</p>
                </div>

                {{-- BRAND --}}

                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Merek</p>
                    <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->brand }}</p>
                </div>

                {{-- MODEL --}}

                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Model</p>
                    <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->model }}</p>
                </div>

                {{-- PLATE --}}

                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Nomor Kendaraan</p>
                    <p class="mt-1 text-sm font-medium uppercase text-gray-800 dark:text-white">
                        {{ $vehicle->plate_number }}</p>
                </div>

                {{-- FUEL --}}

                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Bahan Bakar</p>
                    <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->fuel_type ?? '-' }}</p>
                </div>

                {{-- ENGINE --}}

                <div>
                    <p class="text-xs text-gray-400 dark:text-gray-500">Kapasitas Mesin</p>
                    <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                        {{ $vehicle->engine_capacity ?? '-' }}</p>
                </div>
            </div>
        </section>

        {{-- PICKUP LOCATION --}}

        <section class="rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">Pickup Location</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lokasi pengambilan kendaraan.</p>
            </div>

            <div class="p-5">
                @if ($vehicle->pickupLocation)
                    <div class="flex items-start gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-gray-800 dark:text-white">
                                {{ $vehicle->pickupLocation->name }}</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                                {{ $vehicle->pickupLocation->address }}</p>
                        </div>
                    </div>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400">Pickup location belum tersedia.</p>
                @endif
            </div>
        </section>
    </div>

    {{-- MOBILE BOTTOM ACTION --}}

    <div class="h-20 sm:hidden"></div>

    <div
        class="fixed inset-x-0 bottom-0 z-40 border-t border-gray-100 bg-white/95 px-4 py-3 backdrop-blur dark:border-gray-600 dark:bg-gray-700/95 sm:hidden">
        <div class="mx-auto flex max-w-lg items-center justify-between gap-3">
            <div class="min-w-0">
                <p class="text-[10px] text-gray-400 dark:text-gray-500">Deposit</p>
                <p class="truncate text-base font-bold text-gray-800 dark:text-white">
                    {{ $vehicle->deposit_amount ? 'Rp ' . number_format($vehicle->deposit_amount, 0, ',', '.') : 'Tidak ada' }}
                </p>
            </div>

            @if ($vehicle->status === 'Active')
                <a href="#"
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-gray-800 px-4 py-3 text-xs font-semibold text-white transition active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800">
                    Pesan Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m13.5 4.5 7.5 7.5M21 12H3" />
                    </svg>
                </a>
            @else
                <button type="button" disabled
                    class="shrink-0 rounded-xl bg-gray-100 px-4 py-3 text-xs font-semibold text-gray-400 dark:bg-gray-600 dark:text-gray-400">
                    Tidak Tersedia
                </button>
            @endif
        </div>
    </div>
@endsection
