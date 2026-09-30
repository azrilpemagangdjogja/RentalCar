@extends('layouts.admin')

@section('content')
<div class="w-full">

    {{-- SEARCH --}}

    <section class="mb-6">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-50 sm:text-3xl">Mau sewa kendaraan apa?</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Cari kendaraan untuk perjalananmu.</p>
        </div>
        <form action="{{ route('search.customer') }}" method="GET">
            <div class="relative">
                <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m1.35-5.15a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kendaraan..." class="w-full rounded-2xl border border-gray-100 bg-white py-4 pl-12 pr-20 text-sm text-gray-700 outline-none placeholder:text-gray-400 focus:border-gray-300 focus:ring-0 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 dark:placeholder:text-gray-400">
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 rounded-xl bg-gray-800 px-4 py-2.5 text-xs font-semibold text-white hover:bg-gray-700">Cari</button>
            </div>
        </form>
    </section>

    {{-- REKOMENDASI --}}

    <section class="mb-8">
        <div class="mb-3 flex items-center justify-between">
            <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-50 sm:text-md">Rekomendasi Untukmu</h2>
            <a href="{{ route('vehicles.index') }}" class="text-xs font-semibold text-gray-600 dark:text-gray-300">Lihat semua</a>
        </div>
        @if ($recommendedVehicles->count())
            <div class="flex gap-3 overflow-x-auto pb-1 sm:grid sm:grid-cols-3 sm:overflow-visible lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($recommendedVehicles as $vehicle)
                    <a href="{{ route('vehicles.show', $vehicle) }}" class="w-[46%] shrink-0 overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700 sm:w-auto">
                        <div class="aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                            @if ($vehicle->image)
                                <img src="{{ Storage::url($vehicle->image) }}" alt="{{ $vehicle->model }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full items-center justify-center text-[10px] text-gray-400">Tidak ada gambar</div>
                            @endif
                        </div>
                        <div class="p-3">
                            <div class="flex items-start justify-between gap-1">
                                <h3 class="truncate text-xs font-semibold text-gray-800 dark:text-gray-50">{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                <span class="shrink-0 text-[9px] text-gray-400">{{ $vehicle->year }}</span>
                            </div>
                            <p class="mt-1 truncate text-[9px] text-gray-400">{{ $vehicle->type }} · {{ $vehicle->seats }} Kursi</p>
                            <p class="mt-1.5 truncate text-[10px] text-gray-500 dark:text-gray-400">{{ $vehicle->pickupLocation->name ?? 'Lokasi tidak tersedia' }}</p>
                            <p class="mt-2 text-xs font-bold text-gray-800 dark:text-gray-50">Rp{{ number_format($vehicle->price_per_day, 0, ',', '.') }} <span class="text-[9px] font-normal text-gray-400">/hari</span></p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-gray-100 bg-white p-4 text-center dark:border-gray-600 dark:bg-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-400">Belum ada kendaraan yang direkomendasikan.</p>
            </div>
        @endif
    </section>

    {{-- EVENT --}}

    <section class="mb-8">
        <div class="flex items-center gap-3 rounded-2xl border border-gray-100 bg-white px-4 py-3 dark:border-gray-600 dark:bg-gray-700">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-100">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M6 7v13h12V7M9 7V5a3 3 0 0 1 6 0v2"/>
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-[9px] font-semibold text-gray-400">EVENT TERBARU</p>
                <p class="truncate text-xs font-semibold text-gray-800 dark:text-gray-50">Promo akhir pekan tersedia</p>
            </div>
            <a href="{{ route('vehicles.index') }}" class="shrink-0 text-[10px] font-semibold text-gray-600 dark:text-gray-300">Lihat</a>
        </div>
    </section>

    {{-- DAERAH --}}

    <section class="mb-8">
        <div class="mb-3 flex items-center justify-between">
            <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-50 sm:text-md">Cari berdasarkan daerah</h2>
            <a href="{{ route('vehicles.index') }}" class="text-xs font-semibold text-gray-600 dark:text-gray-300">Semua</a>
        </div>
        <div class="flex gap-2 overflow-x-auto pb-1">
            @foreach ($areas as $area)
                <a href="{{ route('vehicles.index', ['area' => $area->id]) }}" class="shrink-0 rounded-xl border border-gray-100 bg-white px-3 py-2 text-xs font-medium text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                    {{ $area->name }}
                </a>
            @endforeach
        </div>
    </section>

    {{-- KENDARAAN LAINNYA --}}

    <section class="mb-8">
        <div class="mb-3 flex items-center justify-between">
            <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-50 sm:text-md">Kendaraan Lainnya</h2>
            <a href="{{ route('vehicles.index') }}" class="text-xs font-semibold text-gray-600 dark:text-gray-300">Lihat semua</a>
        </div>
        @if ($otherVehicles->count())
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($otherVehicles as $vehicle)
                    <a href="{{ route('vehicles.show', $vehicle) }}" class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                        <div class="aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                            @if ($vehicle->image)
                                <img src="{{ Storage::url($vehicle->image) }}" alt="{{ $vehicle->model }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full items-center justify-center text-[10px] text-gray-400">Tidak ada gambar</div>
                            @endif
                        </div>
                        <div class="p-3">
                            <div class="flex items-start justify-between gap-1">
                                <h3 class="truncate text-xs font-semibold text-gray-800 dark:text-gray-50">{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                <span class="shrink-0 text-[9px] text-gray-400">{{ $vehicle->year }}</span>
                            </div>
                            <p class="mt-1 truncate text-[9px] text-gray-400">{{ $vehicle->type }} · {{ $vehicle->seats }} Kursi</p>
                            <p class="mt-1.5 truncate text-[10px] text-gray-500 dark:text-gray-400">{{ $vehicle->pickupLocation->name ?? 'Lokasi tidak tersedia' }}</p>
                            <p class="mt-2 text-xs font-bold text-gray-800 dark:text-gray-50">Rp{{ number_format($vehicle->price_per_day, 0, ',', '.') }} <span class="text-[9px] font-normal text-gray-400">/hari</span></p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-gray-100 bg-white p-4 text-center dark:border-gray-600 dark:bg-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-400">Belum ada kendaraan lainnya.</p>
            </div>
        @endif
    </section>

    {{-- SEMUA KENDARAAN --}}

    <section class="mb-8">
        <div class="mb-3 flex items-center justify-between">
            <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-50 sm:text-md">Semua Kendaraan</h2>
            <a href="{{ route('vehicles.index') }}" class="inline-flex items-center gap-1.5 rounded-xl border border-gray-100 bg-white px-3 py-2 text-xs font-semibold text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">
                Filter
                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5h18M6 12h12M10 19h4"/>
                </svg>
            </a>
        </div>
        @if ($vehicles->count())
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($vehicles as $vehicle)
                    <a href="{{ route('vehicles.show', $vehicle) }}" class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                        <div class="aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                            @if ($vehicle->image)
                                <img src="{{ Storage::url($vehicle->image) }}" alt="{{ $vehicle->model }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full items-center justify-center text-[10px] text-gray-400">Tidak ada gambar</div>
                            @endif
                        </div>
                        <div class="p-3">
                            <div class="flex items-start justify-between gap-1">
                                <h3 class="truncate text-xs font-semibold text-gray-800 dark:text-gray-50">{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                <span class="shrink-0 text-[9px] text-gray-400">{{ $vehicle->year }}</span>
                            </div>
                            <p class="mt-1 truncate text-[9px] text-gray-400">{{ $vehicle->type }} · {{ $vehicle->seats }} Kursi</p>
                            <p class="mt-1.5 truncate text-[10px] text-gray-500 dark:text-gray-400">{{ $vehicle->pickupLocation->name ?? 'Lokasi tidak tersedia' }}</p>
                            <p class="mt-2 text-xs font-bold text-gray-800 dark:text-gray-50">Rp{{ number_format($vehicle->price_per_day, 0, ',', '.') }} <span class="text-[9px] font-normal text-gray-400">/hari</span></p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-gray-100 bg-white p-4 text-center dark:border-gray-600 dark:bg-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-400">Belum ada kendaraan yang tersedia.</p>
            </div>
        @endif
    </section>
</div>
@endsection