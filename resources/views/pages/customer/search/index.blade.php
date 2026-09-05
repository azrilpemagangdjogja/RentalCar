@extends('layouts.admin')
@section('content')
    {{-- HEADER & SEARCH --}}

    <section class="mb-6">
        <div class="mb-5">
            <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Cari Kendaraan
            </h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Temukan kendaraan yang sesuai dengan kebutuhan
                perjalananmu.</p>
        </div>
        <form action="{{ route('search.customer') }}" method="GET">
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
                    class="w-full rounded-2xl border border-gray-100 bg-white py-4 pl-12 pr-28 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                <button type="submit"
                    class="absolute right-2 top-2 rounded-xl bg-gray-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">Cari</button>
            </div>
        </form>
    </section>

    {{-- SEARCHED VEHICLE --}}

    <section>
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Berdasarkan Pencarian</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Jelajahi semua kendaraan yang kamu cari.</p>
            </div>
            <a href="{{ route('vehicles.index') }}"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Filter</a>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 xl:grid-cols-5">
            @forelse ($searchedVehicle as $item)
                <a href="{{ route('vehicles.show', $item->id) }}"
                    class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                        <img src="{{ asset('storage/' . $item->profile) }}"
                            alt="{{ $item->brand }} {{ $item->model }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        <span
                            class="absolute left-2.5 top-2.5 rounded-full bg-white/90 px-2 py-1 text-[9px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">{{ $item->type->name }}</span>
                    </div>
                    <div class="p-3 sm:p-4">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                                {{ $item->brand }} {{ $item->model }}</h3>
                            <span class="shrink-0 text-[9px] font-medium text-gray-400">{{ $item->seats }} Kursi</span>
                        </div>
                        <p class="mt-1 truncate text-[10px] text-gray-500 dark:text-gray-400 sm:text-xs">
                            {{ $item->pickupLocation?->name ?? 'Lokasi belum tersedia' }}</p>
                        <div class="mt-2 flex items-center justify-between gap-2">
                            <span
                                class="text-sm font-semibold text-gray-800 dark:text-white">{{ $item->deposit_amount ? 'Rp ' . number_format($item->deposit_amount, 0, ',', '.') : 'Tanpa deposit' }}</span>
                            <span class="text-[10px] text-gray-400">{{ $item->year }}</span>
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

    {{-- OTHER RECOMMENDATIONS --}}

    <section class="mt-8">
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Rekmendasi lainnya</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Pilihan kendaraan lain yang tersedia
                    untuk disewa.</p>
            </div>
            <a href="{{ route('vehicles.index') }}"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                semua</a>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 xl:grid-cols-5">
            @forelse ($otherVehicles as $item)
                <a href="{{ route('vehicles.show', $item->id) }}"
                    class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                        <img src="{{ asset('storage/' . $item->profile) }}"
                            alt="{{ $item->brand }} {{ $item->model }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                        <span
                            class="absolute left-2.5 top-2.5 rounded-full bg-white/90 px-2 py-1 text-[9px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">{{ $item->type->name }}</span>
                    </div>
                    <div class="p-3 sm:p-4">
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                                {{ $item->brand }} {{ $item->model }}</h3>
                            <span class="shrink-0 text-[9px] font-medium text-gray-400">{{ $item->seats }} Kursi</span>
                        </div>
                        <p class="mt-1 truncate text-[10px] text-gray-500 dark:text-gray-400 sm:text-xs">
                            {{ $item->pickupLocation?->name ?? 'Lokasi belum tersedia' }}</p>
                        <div class="mt-2 flex items-center justify-between gap-2">
                            <span
                                class="text-sm font-semibold text-gray-800 dark:text-white">{{ $item->deposit_amount ? 'Rp ' . number_format($item->deposit_amount, 0, ',', '.') : 'Tanpa deposit' }}</span>
                            <span class="text-[10px] text-gray-400">{{ $item->year }}</span>
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
