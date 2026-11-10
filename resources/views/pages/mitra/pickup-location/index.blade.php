@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Lokasi
                    Pengambilan</h1>
                <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Temukan lokasi pengambilan kendaraan
                    yang sesuai untukmu.</p>
            </div>
        </div>

        {{-- PENCARIAN --}}
        <form action="{{ route('join-pickup-location.index') }}" method="GET" class="mb-6 flex flex-col gap-3 sm:flex-row">
            <div class="relative flex-1">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                    </svg>
                </div>
                <input type="search" name="search" value="{{ request('search') }}"
                    placeholder="Cari lokasi pengambilan..."
                    class="w-full rounded-xl border border-gray-100 bg-white py-3.5 pl-12 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
            </div>
            {{-- <button type="submit"
                class="rounded-xl bg-gray-800 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500">
                Cari
            </button> --}}
        </form>

        {{-- AREA FILTER --}}
        <section class="mb-6">
            <div class="flex flex-wrap gap-2">
                @foreach ($areas as $area)
                    <a href="{{ route('join-pickup-location.index', ['area' => $area]) }}"
                        class="rounded-full border px-4 py-2 text-xs font-medium transition
                    {{ request('area') == $area
                        ? 'border-gray-800 bg-gray-800 text-white dark:border-gray-200 dark:bg-gray-200 dark:text-gray-800'
                        : 'border-gray-200 bg-white text-gray-600 hover:border-gray-400 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600' }}">
                        {{ $area }}
                    </a>
                @endforeach
            </div>
        </section>

        {{-- REKOMENDASI --}}
        <section class="mb-10">
            <div class="mb-5 flex items-end justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Rekomendasi</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lokasi pengambilan yang mungkin sesuai untukmu.
                    </p>
                </div>
                <a href="#semua-lokasi"
                    class="hidden text-sm font-medium text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white sm:block">
                    Lihat semua
                </a>
            </div>

            <div class="grid gap-4 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @forelse ($recommendedLocations as $location)
                    <a href="{{ route('join-pickup-location.show', $location->id) }}"
                        class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-600 dark:bg-gray-700">

                        {{-- PETA --}}
                        <div class="relative h-36 w-full overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <iframe
                                src="https://www.google.com/maps?q={{ $location->latitude }},{{ $location->longitude }}&output=embed"
                                class="pointer-events-none absolute inset-0 h-full w-full border-0" loading="lazy">
                            </iframe>
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-800/50 via-transparent to-transparent">
                            </div>
                            <span
                                class="absolute right-3 top-3 rounded-full bg-gray-800/90 px-2.5 py-1 text-[10px] font-semibold text-white backdrop-blur-sm dark:bg-gray-50/90 dark:text-gray-800">
                                {{ $location->status }}
                            </span>
                        </div>

                        <div class="p-4">
                            <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                {{ $location->name }}
                            </h3>
                            <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-300">
                                {{ $location->mitra->name ?? 'RentalCar' }}
                            </p>
                            <p class="mt-3 line-clamp-2 text-xs leading-5 text-gray-400 dark:text-gray-400">
                                {{ $location->address }}
                            </p>

                            <div
                                class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-600">
                                <div>
                                    <p class="text-[11px] text-gray-400 dark:text-gray-400">Kapasitas</p>
                                    <p class="mt-1 text-xs font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $location->max_vehicle }} kendaraan
                                    </p>
                                </div>
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-xl bg-gray-100 text-gray-600 transition group-hover:bg-gray-800 group-hover:text-white dark:bg-gray-600 dark:text-gray-200 dark:group-hover:bg-gray-200 dark:group-hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div
                        class="col-span-full rounded-2xl border border-dashed border-gray-200 bg-white p-8 text-center dark:border-gray-600 dark:bg-gray-700">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Belum ada lokasi pengambilan yang tersedia.
                        </p>
                    </div>
                @endforelse
            </div>
        </section>

        {{-- PILIHAN LAINNYA --}}
        <section class="mb-10">
            <div class="mb-5">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Pilihan Lainnya</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Beberapa lokasi pengambilan lain yang mungkin sesuai untukmu.
                </p>
            </div>

            <div class="grid gap-4 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @forelse ($suggestedLocations as $location)
                    <a href="{{ route('join-pickup-location.show', $location->id) }}"
                        class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-600 dark:bg-gray-700">

                        {{-- PETA --}}
                        <div class="relative h-36 w-full overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <iframe
                                src="https://www.google.com/maps?q={{ $location->latitude }},{{ $location->longitude }}&output=embed"
                                class="pointer-events-none absolute inset-0 h-full w-full border-0" loading="lazy">
                            </iframe>
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-800/50 via-transparent to-transparent">
                            </div>
                            <span
                                class="absolute right-3 top-3 rounded-full bg-gray-800/90 px-2.5 py-1 text-[10px] font-semibold text-white backdrop-blur-sm dark:bg-gray-50/90 dark:text-gray-800">
                                {{ $location->status }}
                            </span>
                        </div>

                        <div class="p-4">
                            <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                {{ $location->name }}
                            </h3>
                            <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-300">
                                {{ $location->mitra->name ?? 'RentalCar' }}
                            </p>
                            <p class="mt-3 line-clamp-2 text-xs leading-5 text-gray-400 dark:text-gray-400">
                                {{ $location->address }}
                            </p>

                            <div
                                class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-600">
                                <div>
                                    <p class="text-[11px] text-gray-400 dark:text-gray-400">Kapasitas</p>
                                    <p class="mt-1 text-xs font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $location->max_vehicle }} kendaraan
                                    </p>
                                </div>
                                @if (isset($location->distance))
                                    <p class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                        {{ number_format($location->distance, 1) }} km
                                    </p>
                                @endif
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-xl bg-gray-100 text-gray-600 transition group-hover:bg-gray-800 group-hover:text-white dark:bg-gray-600 dark:text-gray-200 dark:group-hover:bg-gray-200 dark:group-hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div
                        class="col-span-full rounded-2xl border border-dashed border-gray-200 bg-white p-8 text-center dark:border-gray-600 dark:bg-gray-700">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Belum ada lokasi pengambilan lainnya.
                        </p>
                    </div>
                @endforelse
            </div>
        </section>

        {{-- SEMUA LOKASI --}}
        <section id="semua-lokasi">
            <div class="mb-5">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Semua Lokasi Pengambilan</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Jelajahi seluruh lokasi pengambilan yang tersedia.
                </p>
            </div>

            <div class="grid gap-4 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @forelse ($pickupLocations as $location)
                    <a href="{{ route('join-pickup-location.show', $location->id) }}"
                        class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-600 dark:bg-gray-700">

                        {{-- PETA --}}
                        <div class="relative h-36 w-full overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <iframe
                                src="https://www.google.com/maps?q={{ $location->latitude }},{{ $location->longitude }}&output=embed"
                                class="pointer-events-none absolute inset-0 h-full w-full border-0" loading="lazy">
                            </iframe>
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-800/50 via-transparent to-transparent">
                            </div>
                            <span
                                class="absolute right-3 top-3 rounded-full bg-gray-800/90 px-2.5 py-1 text-[10px] font-semibold text-white backdrop-blur-sm dark:bg-gray-50/90 dark:text-gray-800">
                                {{ $location->status }}
                            </span>
                        </div>

                        <div class="p-4">
                            <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                {{ $location->name }}
                            </h3>
                            <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-300">
                                {{ $location->mitra->name ?? 'RentalCar' }}
                            </p>
                            <p class="mt-3 line-clamp-2 text-xs leading-5 text-gray-400 dark:text-gray-400">
                                {{ $location->address }}
                            </p>

                            <div
                                class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-600">
                                <div>
                                    <p class="text-[11px] text-gray-400 dark:text-gray-400">Kapasitas</p>
                                    <p class="mt-1 text-xs font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $location->max_vehicle }} kendaraan
                                    </p>
                                </div>

                                @if (isset($location->distance))
                                    <p class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                        {{ number_format($location->distance, 1) }} km
                                    </p>
                                @endif

                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-xl bg-gray-100 text-gray-600 transition group-hover:bg-gray-800 group-hover:text-white dark:bg-gray-600 dark:text-gray-200 dark:group-hover:bg-gray-200 dark:group-hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div
                        class="col-span-full rounded-2xl border border-dashed border-gray-200 bg-white p-10 text-center dark:border-gray-600 dark:bg-gray-700">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Tidak ada lokasi pengambilan yang ditemukan.
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
