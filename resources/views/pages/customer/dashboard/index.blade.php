@extends('layouts.admin')
@section('content')
    {{-- HEADER & SEARCH --}}

    <section class="mb-6">
        <div class="mb-5">
            <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Mau sewa kendaraan apa?
            </h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Temukan kendaraan yang sesuai dengan kebutuhan
                perjalananmu.</p>
        </div>
        <form action="{{ route('vehicles.index') }}" method="GET">
            <div class="relative">
                <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 dark:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                    </svg>
                </div>
                <input type="search" name="search" value="{{ request('search') }}"
                    placeholder="Cari merek, model, atau tipe kendaraan..."
                    class="w-full rounded-2xl border border-gray-200 bg-white py-4 pl-12 pr-28 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                <button type="submit"
                    class="absolute right-2 top-2 rounded-xl bg-gray-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">Cari</button>
            </div>
        </form>
    </section>

    {{-- QUICK MENU --}}

    <section class="mb-8">
        <div class="grid grid-cols-4 gap-3 sm:grid-cols-4 lg:grid-cols-6">
            <a href="#"
                class="group flex flex-col items-center gap-2 rounded-2xl border border-gray-200 bg-white p-3 text-center transition hover:border-gray-300 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                <span
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5v12H3.75v-12Zm0 3h16.5M7.5 15h.008v.008H7.5V15Z" />
                    </svg>
                </span>
                <span class="text-[11px] font-medium text-gray-700 dark:text-gray-200 sm:text-xs">Transaksi Saya</span>
            </a>
            <a href="#"
                class="group flex flex-col items-center gap-2 rounded-2xl border border-gray-200 bg-white p-3 text-center transition hover:border-gray-300 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                <span
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </span>
                <span class="text-[11px] font-medium text-gray-700 dark:text-gray-200 sm:text-xs">Riwayat</span>
            </a>
            <a href="#"
                class="group flex flex-col items-center gap-2 rounded-2xl border border-gray-200 bg-white p-3 text-center transition hover:border-gray-300 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                <span
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 14.25h4.5m-6.75 3h9m-8.25-12h4.5M12 3v3m-6.75 15h13.5A2.25 2.25 0 0 0 21 18.75v-13.5A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25v13.5A2.25 2.25 0 0 0 5.25 21Z" />
                    </svg>
                </span>
                <span class="text-[11px] font-medium text-gray-700 dark:text-gray-200 sm:text-xs">Denda</span>
            </a>
            <a href="#"
                class="group flex flex-col items-center gap-2 rounded-2xl border border-gray-200 bg-white p-3 text-center transition hover:border-gray-300 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                <span
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.75.75 0 0 1 1.04 0l2.16 2.08 2.96-.36a.75.75 0 0 1 .8.56l.68 2.9 2.5 1.62a.75.75 0 0 1 .28.94l-1.3 2.7 1.3 2.7a.75.75 0 0 1-.28.94l-2.5 1.62-.68 2.9a.75.75 0 0 1-.8.56l-2.96-.36-2.16 2.08a.75.75 0 0 1-1.04 0l-2.16-2.08-2.96.36a.75.75 0 0 1-.8-.56l-.68-2.9-2.5-1.62a.75.75 0 0 1-.28-.94l1.3-2.7-1.3-2.7a.75.75 0 0 1 .28-.94l2.5-1.62.68-2.9a.75.75 0 0 1 .8-.56l2.96.36 2.16-2.08Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 12 1.5 1.5 3-3" />
                    </svg>
                </span>
                <span class="text-[11px] font-medium text-gray-700 dark:text-gray-200 sm:text-xs">Favorit</span>
            </a>
            <a href="#"
                class="group hidden flex-col items-center gap-2 rounded-2xl border border-gray-200 bg-white p-3 text-center transition hover:border-gray-300 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 lg:flex">
                <span
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0-13.5v4.5l3 1.5" />
                    </svg>
                </span>
                <span class="text-xs font-medium text-gray-700 dark:text-gray-200">Menunggu</span>
            </a>
            <a href="#"
                class="group hidden flex-col items-center gap-2 rounded-2xl border border-gray-200 bg-white p-3 text-center transition hover:border-gray-300 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 lg:flex">
                <span
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                </span>
                <span class="text-xs font-medium text-gray-700 dark:text-gray-200">Lainnya</span>
            </a>
        </div>
    </section>

    {{-- FEATURED VEHICLES --}}

    <section class="mb-8">
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Rekomendasi Untukmu</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Pilihan kendaraan yang mungkin cocok
                    untuk perjalananmu.</p>
            </div>
            <a href="{{ route('vehicles.index') }}"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                semua</a>
        </div>
        <div
            class="flex snap-x gap-4 overflow-x-auto pb-2 sm:grid sm:grid-cols-3 sm:overflow-visible lg:grid-cols-4 xl:grid-cols-5">
            @forelse ($recommendedVehicles as $vehicle)
                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                    class="group w-[78%] shrink-0 snap-start overflow-hidden rounded-2xl border border-gray-200 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 sm:w-auto">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                        <img src="{{ asset('storage/' . $vehicle->profile) }}"
                            alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        <span
                            class="absolute left-3 top-3 rounded-full bg-white/90 px-2.5 py-1 text-[10px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">{{ $vehicle->type->name }}</span>
                    </div>
                    <div class="p-4">
                        <h3 class="truncate text-sm font-bold text-gray-800 dark:text-white">{{ $vehicle->brand }}
                            {{ $vehicle->model }}</h3>
                        <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">
                            {{ $vehicle->pickupLocation?->name ?? 'Lokasi belum tersedia' }}</p>
                        <div class="mt-3 flex items-center justify-between gap-2">
                            <span
                                class="text-sm font-bold text-gray-800 dark:text-white">{{ $vehicle->deposit_amount ? 'Rp ' . number_format($vehicle->deposit_amount, 0, ',', '.') : 'Tanpa deposit' }}</span>
                            <span class="text-[10px] text-gray-400">{{ $vehicle->year }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full rounded-2xl bg-gray-50 p-8 text-center dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada kendaraan yang direkomendasikan.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- AREA FILTER --}}

    <section class="mb-8 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
        <div class="mb-4">
            <h2 class="text-base font-bold text-gray-800 dark:text-white">Pilih Berdasarkan Daerah</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Cari kendaraan berdasarkan lokasi pickup yang dekat
                denganmu.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            @forelse ($areas as $area)
                {{-- <a href="{{ route('vehicles.index', ['area' => $area]) }}"
                    class="rounded-xl border border-gray-200 bg-gray-50 px-3.5 py-2 text-xs font-medium text-gray-600 transition hover:border-gray-400 hover:bg-gray-100 hover:text-gray-800 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">{{ $area }}</a> --}}
            @empty
                <p class="text-sm text-gray-400 dark:text-gray-500">Belum ada daerah yang tersedia.</p>
            @endforelse
        </div>
    </section>

    {{-- OTHER RECOMMENDATIONS --}}

    <section class="mb-8">
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Kendaraan Lainnya</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Pilihan kendaraan lain yang tersedia
                    untuk disewa.</p>
            </div>
            <a href="{{ route('vehicles.index') }}"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                semua</a>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 xl:grid-cols-5">
            @forelse ($otherVehicles as $vehicle)
                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                    class="group overflow-hidden rounded-2xl border border-gray-200 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                        <img src="{{ asset('storage/' . $vehicle->profile) }}"
                            alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        <span
                            class="absolute left-2.5 top-2.5 rounded-full bg-white/90 px-2 py-1 text-[9px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">{{ $vehicle->type->name }}</span>
                    </div>
                    <div class="p-3 sm:p-4">
                        <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                            {{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                        <p class="mt-1 truncate text-[10px] text-gray-500 dark:text-gray-400 sm:text-xs">
                            {{ $vehicle->pickupLocation?->name ?? 'Lokasi belum tersedia' }}</p>
                        <div class="mt-2 flex items-center justify-between gap-2">
                            <span
                                class="truncate text-xs font-semibold text-gray-800 dark:text-white">{{ $vehicle->year }}</span>
                            <span class="text-[10px] text-gray-400">{{ $vehicle->color ?? '-' }}</span>
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

    {{-- VEHICLE CATALOG --}}

    <section>
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Semua Kendaraan</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Jelajahi semua kendaraan yang sedang
                    tersedia.</p>
            </div>
            <a href="{{ route('vehicles.index') }}"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Filter</a>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 xl:grid-cols-5">
            @forelse ($vehicles as $vehicle)
                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                    class="group overflow-hidden rounded-2xl border border-gray-200 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                        <img src="{{ asset('storage/' . $vehicle->profile) }}"
                            alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-3 sm:p-4">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                                {{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                            <span class="shrink-0 text-[9px] font-medium text-gray-400">{{ $vehicle->type->name }}</span>
                        </div>
                        <p class="mt-1 truncate text-[10px] text-gray-500 dark:text-gray-400 sm:text-xs">
                            {{ $vehicle->pickupLocation?->name ?? 'Lokasi belum tersedia' }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span
                                class="text-xs font-semibold text-gray-700 dark:text-gray-200">{{ $vehicle->year }}</span>
                            <span
                                class="rounded-full bg-gray-100 px-2 py-1 text-[9px] font-medium text-gray-500 dark:bg-gray-600 dark:text-gray-300">{{ $vehicle->status }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full rounded-2xl bg-gray-50 p-8 text-center dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada kendaraan yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
