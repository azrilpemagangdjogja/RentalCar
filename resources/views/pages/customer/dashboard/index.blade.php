@extends('layouts.admin')

@section('content')
    <div class="w-full">

        {{-- SEARCH --}}

        <section class="mb-6">
            {{-- <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-50 sm:text-3xl">Mau sewa kendaraan apa?</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Cari kendaraan untuk perjalananmu.</p>
        </div> --}}
            <form action="{{ route('search.customer') }}" method="GET">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-4.35-4.35m1.35-5.15a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z" />
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kendaraan..."
                        class="w-full rounded-2xl border border-gray-100 bg-white py-4 pl-12 pr-20 text-sm text-gray-700 outline-none placeholder:text-gray-400 focus:border-gray-300 focus:ring-0 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 dark:placeholder:text-gray-400">
                    <button type="submit"
                        class="absolute right-2 top-1/2 -translate-y-1/2 rounded-xl bg-gray-800 px-4 py-2.5 text-xs font-semibold text-white hover:bg-gray-700">Cari</button>
                </div>
            </form>
            <div class="grid grid-cols-1 sm:grid-cols-4">
                <div class="relative mt-6 h-32 w-full overflow-hidden rounded-2xl sm:col-span-2 sm:h-64">
                    <img src="{{ asset('images/login-background.png') }}" alt="Banner"
                        class="absolute inset-0 h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/40 to-gray-800/10"></div>

                    <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-4 p-4 sm:p-6">
                        <div class="min-w-0 text-white">
                            <h2 class="truncate text-base font-semibold sm:text-2xl">
                                Temukan Kendaraanmu
                            </h2>
                            <p class="mt-1 truncate text-xs text-gray-200 sm:text-sm">
                                Pilih kendaraan yang sesuai untuk perjalananmu.
                            </p>
                        </div>

                        <a href="#"
                            class="shrink-0 rounded-xl bg-white px-3 py-2 text-xs font-semibold text-gray-800 transition hover:bg-gray-100 sm:px-4 sm:py-2.5 sm:text-sm">
                            Kunjungi
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-4 sm:grid-cols-2 sm:col-span-2 gap-2 sm:gap-3 mt-4 sm:mt-6 sm:ml-4">
                    <a href="#"
                        class="relative flex min-h-24 w-full overflow-hidden rounded-2xl bg-gray-700 bg-cover bg-center p-2 sm:p-4 sm:min-h-0"
                        style="background-image: url('{{ asset('images/mitra-default.png') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/60 to-gray-700/20">
                        </div>
                        <div class="relative z-10 flex w-full items-end">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 text-white">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-6 w-6 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6.586a1 1 0 0 1 .707.293l4.414 4.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2Z" />
                                </svg>
                                <span class="text-sm font-semibold sm:block">Transaksi</span>
                            </div>
                        </div>
                    </a>
                    <a href="#"
                        class="relative flex min-h-24 w-full overflow-hidden rounded-2xl bg-gray-700 bg-cover bg-center p-2 sm:p-4 sm:min-h-0"
                        style="background-image: url('{{ asset('images/mitra-default.png') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/60 to-gray-700/20">
                        </div>
                        <div class="relative z-10 flex w-full items-end">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-6 w-6 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-3.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 4.5h.008v.008H12v-.008Z" />
                                </svg>
                                <span class="text-sm font-semibold sm:block">Denda</span>
                            </div>
                        </div>
                    </a>
                    <a href="#"
                        class="relative flex min-h-24 w-full overflow-hidden rounded-2xl bg-gray-700 bg-cover bg-center p-2 sm:p-4 sm:min-h-0"
                        style="background-image: url('{{ asset('images/mitra-default.png') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/60 to-gray-700/20">
                        </div>
                        <div class="relative z-10 flex w-full items-end">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-6 w-6 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 10h18M7 15h.01M11 15h.01M15 15h.01M19 5H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2Z" />
                                </svg>
                                <span class="text-sm font-semibold sm:block">Refund</span>
                            </div>
                        </div>
                    </a>
                    <a href="#"
                        class="relative flex min-h-24 w-full overflow-hidden rounded-2xl bg-gray-700 bg-cover bg-center p-2 sm:p-4 sm:min-h-0"
                        style="background-image: url('{{ asset('images/mitra-default.png') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800/90 via-gray-800/60 to-gray-700/20">
                        </div>
                        <div class="relative z-10 flex w-full items-end">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-6 w-6 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.879 7.519A3 3 0 0 1 12 6.75a3 3 0 0 1 2.121.879m-4.242 0L7.5 5.25M14.121 7.629 16.5 5.25M12 13.5v.008m0 3.742h.008M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class=" text-sm font-semibold sm:block">Bantuan</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        {{-- REKOMENDASI --}}

        <section class="mb-8">
            <div class="mb-4 flex items-end justify-between gap-4">
                <div>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Rekomendasi</h2>
                    <p class="hidden sm:block mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Pilihan kendaraan yang kami
                        rekomendasikan untuk disewa.</p>
                </div>
                <a href="{{ route('vehicles.index') }}"
                    class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                    semua</a>
            </div>
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 xl:grid-cols-5">
                @forelse ($recommendedVehicles as $vehicle)
                    <a href="{{ route('vehicles.show', $vehicle->id) }}"
                        class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <img src="{{ asset('storage/' . $vehicle->profile) }}"
                                alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            <span
                                class="absolute left-2.5 top-2.5 rounded-full bg-white/90 px-2 py-1 text-[9px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">{{ $vehicle->type->name }}</span>
                        </div>
                        <div class="p-3 sm:p-4">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                                    {{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                <span class="shrink-0 text-[9px] font-medium text-gray-400">{{ $vehicle->seats }}
                                    Kursi</span>
                            </div>
                            <p class="mt-1 truncate text-[10px] text-gray-500 dark:text-gray-400 sm:text-xs">
                                {{ $vehicle->pickupLocation?->name ?? 'Lokasi belum tersedia' }}</p>
                            <div class="mt-2 flex items-center justify-between gap-2">
                                <span
                                    class="text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicle->deposit_amount ? 'Rp ' . number_format($vehicle->deposit_amount, 0, ',', '.') : 'Tanpa deposit' }}</span>
                                <span class="text-[10px] text-gray-400">{{ $vehicle->year }}</span>
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

        {{-- EVENT --}}

        <section class="mb-8">
            <div
                class="flex items-center gap-3 rounded-2xl border border-gray-100 bg-white px-4 py-3 dark:border-gray-600 dark:bg-gray-700">
                <div
                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-100">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4 7h16M6 7v13h12V7M9 7V5a3 3 0 0 1 6 0v2" />
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-[9px] font-semibold text-gray-400">EVENT TERBARU</p>
                    <p class="truncate text-xs font-semibold text-gray-800 dark:text-gray-50">Promo akhir pekan tersedia
                    </p>
                </div>
                <a href="{{ route('vehicles.index') }}"
                    class="shrink-0 text-[10px] font-semibold text-gray-600 dark:text-gray-300">Lihat</a>
            </div>
        </section>

        {{-- DAERAH --}}

        <section class="mb-8">
            <div class="mb-3 flex items-center justify-between">
                <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-50 sm:text-md">Cari berdasarkan daerah</h2>
                <a href="{{ route('vehicles.index') }}"
                    class="text-xs font-semibold text-gray-600 dark:text-gray-300">Semua</a>
            </div>
            <div class="flex gap-2 overflow-x-auto pb-1">
                @foreach ($areas as $area)
                    <a href="{{ route('vehicles.index', ['area' => $area->id]) }}"
                        class="shrink-0 rounded-xl border border-gray-100 bg-white px-3 py-2 text-xs font-medium text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                        {{ $area->name }}
                    </a>
                @endforeach
            </div>
        </section>

        {{-- KENDARAAN LAINNYA --}}

        <section class="mb-8">
            <div class="mb-3 flex items-center justify-between">
                <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-50 sm:text-md">Kendaraan Lainnya</h2>
                <a href="{{ route('vehicles.index') }}"
                    class="text-xs font-semibold text-gray-600 dark:text-gray-300">Lihat semua</a>
            </div>
            @if ($otherVehicles->count())
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                    @foreach ($otherVehicles as $vehicle)
                        <a href="{{ route('vehicles.show', $vehicle) }}"
                            class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                            <div class="aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                                @if ($vehicle->profile)
                                    <img src="{{ Storage::url($vehicle->profile) }}" alt="{{ $vehicle->model }}"
                                        class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full items-center justify-center text-[10px] text-gray-400">Tidak
                                        ada
                                        gambar</div>
                                @endif
                            </div>
                            <div class="p-3">
                                <div class="flex items-start justify-between gap-1">
                                    <h3 class="truncate text-xs font-semibold text-gray-800 dark:text-gray-50">
                                        {{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                    <span class="shrink-0 text-[9px] text-gray-400">{{ $vehicle->year }}</span>
                                </div>
                                <p class="mt-1 truncate text-[9px] text-gray-400">{{ $vehicle->type->name }} ·
                                    {{ $vehicle->seats }} Kursi</p>
                                <p class="mt-1.5 truncate text-[10px] text-gray-500 dark:text-gray-400">
                                    {{ $vehicle->pickupLocation->name ?? 'Lokasi tidak tersedia' }}</p>
                                <p class="mt-2 text-xs font-bold text-gray-800 dark:text-gray-50">
                                    Rp{{ number_format($vehicle->price_per_day, 0, ',', '.') }} <span
                                        class="text-[9px] font-normal text-gray-400">/hari</span></p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div
                    class="rounded-2xl border border-gray-100 bg-white p-4 text-center dark:border-gray-600 dark:bg-gray-700">
                    <p class="text-xs text-gray-500 dark:text-gray-400">Belum ada kendaraan lainnya.</p>
                </div>
            @endif
        </section>

        {{-- SEMUA KENDARAAN --}}

        <section class="mb-8">
            <div class="mb-3 flex items-center justify-between">
                <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-50 sm:text-md">Semua Kendaraan</h2>
                <a href="{{ route('vehicles.index') }}"
                    class="inline-flex items-center gap-1.5 rounded-xl border border-gray-100 bg-white px-3 py-2 text-xs font-semibold text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">
                    Filter
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 5h18M6 12h12M10 19h4" />
                    </svg>
                </a>
            </div>
            @if ($vehicles->count())
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                    @foreach ($vehicles as $vehicle)
                        <a href="{{ route('vehicles.show', $vehicle) }}"
                            class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                            <div class="aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                                @if ($vehicle->profile)
                                    <img src="{{ Storage::url($vehicle->profile) }}" alt="{{ $vehicle->model }}"
                                        class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full items-center justify-center text-[10px] text-gray-400">Tidak
                                        ada gambar</div>
                                @endif
                            </div>
                            <div class="p-3">
                                <div class="flex items-start justify-between gap-1">
                                    <h3 class="truncate text-xs font-semibold text-gray-800 dark:text-gray-50">
                                        {{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                    <span class="shrink-0 text-[9px] text-gray-400">{{ $vehicle->year }}</span>
                                </div>
                                <p class="mt-1 truncate text-[9px] text-gray-400">{{ $vehicle->type->name }} ·
                                    {{ $vehicle->seats }} Kursi</p>
                                <p class="mt-1.5 truncate text-[10px] text-gray-500 dark:text-gray-400">
                                    {{ $vehicle->pickupLocation->name ?? 'Lokasi tidak tersedia' }}</p>
                                <p class="mt-2 text-xs font-bold text-gray-800 dark:text-gray-50">
                                    Rp{{ number_format($vehicle->price_per_day, 0, ',', '.') }} <span
                                        class="text-[9px] font-normal text-gray-400">/hari</span></p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div
                    class="rounded-2xl border border-gray-100 bg-white p-4 text-center dark:border-gray-600 dark:bg-gray-700">
                    <p class="text-xs text-gray-500 dark:text-gray-400">Belum ada kendaraan yang tersedia.</p>
                </div>
            @endif
        </section>
    </div>
@endsection
