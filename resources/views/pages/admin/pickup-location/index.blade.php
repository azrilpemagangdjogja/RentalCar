@extends('layouts.admin')
@section('content') <section class="w-full">

    {{-- HEADER --}}
        <div class="flex flex-col mb-8 gap-4 sm:flex-row sm:items-center sm:justify-between">
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

    {{-- RECOMMENDED --}}
    <section class="mb-10">
        <div class="mb-5 flex items-end justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Pickup Location Pilihan
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Lokasi yang direkomendasikan berdasarkan kapasitas dan ketersediaan.
                </p>
            </div>
            <a href="#semua-pickup"
                class="hidden text-sm font-medium text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white sm:block">
                Lihat semua
            </a>
        </div>

        <div class="flex snap-x gap-4 overflow-x-auto pb-3 sm:grid sm:grid-cols-3 sm:overflow-visible">
            @forelse ($recommendedLocations as $location)
                <a href="{{ route('pickup-location.show', $location->id) }}"
                    class="group min-w-[280px] snap-start overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-600 dark:bg-gray-700 sm:min-w-0">

                    {{-- MAP --}}
                        <div class="relative h-32 w-full overflow-hidden bg-gray-100 dark:bg-gray-600 md:h-44">

                            {{-- Google Maps sebagai background --}}
                            <iframe
                                src="https://www.google.com/maps?q={{ $location->latitude }},{{ $location->longitude }}&output=embed"
                                class="pointer-events-none absolute inset-0 h-full w-full border-0" loading="lazy">
                            </iframe>

                            {{-- Overlay --}}
                            {{-- <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-800/80 text-white shadow-lg backdrop-blur-sm transition duration-200 group-hover:scale-110 dark:bg-white/80 dark:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                </div>
                            </div> --}}

                            {{-- Status --}}
                            <span
                                class="absolute right-3 top-3 rounded-full bg-gray-800/90 px-2.5 py-1 text-[10px] font-semibold text-white backdrop-blur-sm dark:bg-gray-50/90 dark:text-gray-800">
                                {{ $location->status }}
                            </span>
                        </div>

                    <div class="p-5">
                        <h3 class="truncate text-base font-semibold text-gray-800 dark:text-white">
                            {{ $location->name }}
                        </h3>

                        <p class="mt-1 truncate text-sm text-gray-500 dark:text-gray-300">
                            {{ $location->mitra->name ?? 'Mitra RentalCar' }}
                        </p>

                        <p class="mt-3 line-clamp-2 text-xs leading-5 text-gray-400 dark:text-gray-400">
                            {{ $location->address }}
                        </p>

                        <div class="mt-5 flex items-center justify-between border-t border-gray-100 pt-4 dark:border-gray-600">
                            <div>
                                <p class="text-xs text-gray-400 dark:text-gray-400">Kapasitas</p>
                                <p class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $location->max_vehicle }} kendaraan
                                </p>
                            </div>

                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-600 transition group-hover:bg-gray-800 group-hover:text-white dark:bg-gray-600 dark:text-gray-200 dark:group-hover:bg-gray-200 dark:group-hover:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-3 rounded-2xl border border-dashed border-gray-200 bg-white p-8 text-center dark:border-gray-600 dark:bg-gray-700">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Belum ada pickup location yang tersedia.
                    </p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- AREA FILTER --}}
    <section class="mb-10">
        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                Pilih Berdasarkan Daerah
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Temukan pickup location berdasarkan wilayah yang kamu inginkan.
            </p>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
            <form action="{{ route('pickup-location.index') }}" method="GET">
                <div class="grid gap-4 sm:grid-cols-[1fr_auto]">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor"
                            class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8.25v3.75l2.25 1.5" />
                        </svg>

                        <select name="area"
                            class="w-full appearance-none rounded-xl border border-gray-200 bg-white py-3.5 pl-12 pr-10 text-sm text-gray-700 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:focus:border-gray-300">
                            <option value="">Semua daerah</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area }}" @selected(request('area') == $area)>
                                    {{ $area }}
                                </option>
                            @endforeach
                        </select>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor"
                            class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                        </svg>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-gray-800 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                        </svg>
                        Cari Lokasi
                    </button>
                </div>

                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach ($areas->take(8) as $area)
                        <a href="{{ route('pickup-location.index', ['area' => $area]) }}"
                            class="rounded-full border px-4 py-2 text-xs font-medium transition
                            {{ request('area') == $area
                                ? 'border-gray-800 bg-gray-800 text-white dark:border-gray-200 dark:bg-gray-200 dark:text-gray-800'
                                : 'border-gray-200 bg-white text-gray-600 hover:border-gray-400 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-600' }}">
                            {{ $area }}
                        </a>
                    @endforeach
                </div>
            </form>
        </div>
    </section>

    {{-- SUGGESTED --}}
    <section class="mb-10">
        <div class="mb-5 flex items-end justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Kamu Mungkin Juga Suka
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Beberapa pickup location lain yang mungkin sesuai untukmu.
                </p>
            </div>
        </div>

        <div class="flex snap-x gap-4 overflow-x-auto pb-3 sm:grid sm:grid-cols-3 lg:grid-cols-4 sm:overflow-visible">
            @forelse ($suggestedLocations as $location)
                <a href="{{ route('pickup-location.show', $location->id) }}"
                    class="group min-w-[250px] snap-start overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-600 dark:bg-gray-700 sm:min-w-0">

                    <div class="relative h-36 overflow-hidden bg-gray-200 dark:bg-gray-600">
                        <img src="{{ $location->image ? asset('storage/' . $location->image) : asset('images/login-background.png') }}"
                            alt="{{ $location->name }}"
                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                    </div>

                    <div class="p-4">
                        <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                            {{ $location->name }}
                        </h3>

                        <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-300">
                            {{ $location->mitra->name ?? 'Mitra RentalCar' }}
                        </p>

                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-xs text-gray-400 dark:text-gray-400">
                                {{ $location->max_vehicle }} kendaraan
                            </p>

                            @if (isset($location->distance))
                                <p class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                    {{ number_format($location->distance, 1) }} km
                                </p>
                            @endif
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-4 rounded-2xl border border-dashed border-gray-200 bg-white p-8 text-center dark:border-gray-600 dark:bg-gray-700">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Belum ada rekomendasi pickup location.
                    </p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- ALL PICKUP LOCATIONS --}}
    <section id="semua-pickup">
        <div class="mb-5">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                Semua Pickup Location
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Jelajahi seluruh pickup location yang tersedia.
            </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($pickupLocations as $location)
                <a href="{{ route('pickup-location.show', $location->id) }}"
                    class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-600 dark:bg-gray-700">

                    <div class="flex gap-4">
                        <div class="h-20 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                            <img src="{{ $location->image ? asset('storage/' . $location->image) : asset('images/login-background.png') }}"
                                alt="{{ $location->name }}" class="h-full w-full object-cover">
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $location->name }}
                                </h3>

                                <span class="shrink-0 rounded-full bg-gray-100 px-2 py-1 text-[10px] font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                    {{ $location->status }}
                                </span>
                            </div>

                            <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-300">
                                {{ $location->mitra->name ?? 'Mitra RentalCar' }}
                            </p>

                            <p class="mt-2 line-clamp-1 text-xs text-gray-400 dark:text-gray-400">
                                {{ $location->address }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-600">
                        <span class="text-xs text-gray-500 dark:text-gray-300">
                            Kapasitas <strong class="text-gray-700 dark:text-gray-200">{{ $location->max_vehicle }}</strong>
                        </span>

                        @if (isset($location->distance))
                            <span class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                {{ number_format($location->distance, 1) }} km
                            </span>
                        @endif
                    </div>
                </a>
            @empty
                <div class="col-span-3 rounded-2xl border border-dashed border-gray-200 bg-white p-10 text-center dark:border-gray-600 dark:bg-gray-700">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Tidak ada pickup location yang ditemukan.
                    </p>
                </div>
            @endforelse
        </div>

        @if ($pickupLocations->hasPages())
            <div class="mt-6">
                {{ $pickupLocations->withQueryString()->links() }}
            </div>
        @endif
    </section>

</section>

@endsection
