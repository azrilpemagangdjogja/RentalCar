@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('pickup-location.show', $pickupLocation->id) }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Pickup Location</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Tambah Kendaraan</span>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Tambah Kendaraan
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Pilih kendaraan milikmu untuk ditempatkan di {{ $pickupLocation->name }}.
                </p>
            </div>
        </div>

        {{-- LOCATION OVERVIEW --}}
        <div class="mt-8 mb-6 rounded-2xl bg-white p-5 dark:bg-gray-700 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-white text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="min-w-0">
                            <h2 class="truncate text-lg font-bold text-gray-800 dark:text-white">{{ $pickupLocation->name }}</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">{{ $pickupLocation->address }}</p>
                        </div>
                        <span class="w-fit rounded-full bg-gray-800 px-3 py-1.5 text-xs font-semibold text-white dark:bg-white dark:text-gray-800">{{ $pickupLocation->status }}</span>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('pickup-location.addveh', $pickupLocation->id) }}" method="POST">
            @csrf

            {{-- VEHICLE LIST --}}

            <div class="rounded-2xl bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                    <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Kendaraan Tersedia</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Pilih kendaraan yang ingin ditambahkan ke lokasi ini.
                            </p>
                        </div>

                        <span class="text-xs text-gray-400 dark:text-white">
                            {{ $vehicles->count() }} kendaraan tersedia
                        </span>
                    </div>
                </div>

                <div class="divide-y divide-gray-100 dark:divide-gray-600">
                    @forelse ($vehicles as $vehicle)
                        <label
                            class="group flex cursor-pointer items-center gap-4 p-4 transition hover:bg-white dark:hover:bg-gray-600 sm:p-5">
                            <input type="checkbox" name="vehicles[]" value="{{ $vehicle->id }}"
                                {{ in_array($vehicle->id, old('vehicles', [])) ? 'checked' : '' }}
                                class="h-5 w-5 shrink-0 rounded border-gray-300 text-gray-800 focus:ring-2 focus:ring-gray-800/20 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-50 dark:focus:ring-gray-300/20">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                                    stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                </svg>
                            </div>

                            <div class="min-w-0 flex-1">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $vehicle->brand }} {{ $vehicle->model }}
                                </h3>

                                <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">
                                    {{ $vehicle->plate_number }}
                                    · {{ $vehicle->year }}
                                    @if ($vehicle->transmission)
                                        · {{ $vehicle->transmission }}
                                    @endif
                                </p>
                            </div>

                            <span
                                class="hidden shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200 sm:block">
                                {{ $vehicle->type }}
                            </span>
                        </label>
                    @empty
                        <div class="p-8 text-center">
                            <div
                                class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                </svg>
                            </div>

                            <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tidak ada kendaraan tersedia
                            </p>

                            <p class="mt-1 text-xs text-gray-400 dark:text-white">
                                Semua kendaraan milikmu sudah ditempatkan pada lokasi atau belum ditambahkan.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- VEHICLE LIST --}}

            <div class="rounded-2xl mt-6 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                    <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Kendaraan Ditempatkan</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Menampilkan kendaraan yang telah ditambahkan ke lokasi ini.
                            </p>
                        </div>

                        <span class="text-xs text-gray-400 dark:text-white">
                            {{ $vehicles->count() }} kendaraan tersedia
                        </span>
                    </div>
                </div>

                <div class="divide-y divide-gray-100 dark:divide-gray-600">
                    @forelse ($usedVehicles as $vehicle)
                        <label
                            class="group flex cursor-pointer items-center gap-4 p-4 transition hover:bg-white dark:hover:bg-gray-600 sm:p-5">
                            <input type="checkbox" name="vehicles[]" value="{{ $vehicle->id }}" checked
                                class="h-5 w-5 shrink-0 rounded border-gray-300 text-gray-800 focus:ring-2 focus:ring-gray-800/20 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-50 dark:focus:ring-gray-300/20">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                                    stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                </svg>
                            </div>

                            <div class="min-w-0 flex-1">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $vehicle->brand }} {{ $vehicle->model }}
                                </h3>

                                <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">
                                    {{ $vehicle->plate_number }}
                                    · {{ $vehicle->year }}
                                    @if ($vehicle->transmission)
                                        · {{ $vehicle->transmission }}
                                    @endif
                                </p>
                            </div>

                            <span
                                class="hidden shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200 sm:block">
                                {{ $vehicle->type }}
                            </span>
                        </label>
                    @empty
                        <div class="p-8 text-center">
                            <div
                                class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                </svg>
                            </div>

                            <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tidak ada kendaraan yang tersedia
                            </p>

                            <p class="mt-1 text-xs text-gray-400 dark:text-white">
                                Belum ada kendaraan yang ditempatkan pada lokasi ini.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- ACTION --}}

            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('pickup-location.show', $pickupLocation->id) }}"
                    class="inline-flex w-full items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold text-gray-600 transition hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 sm:w-auto">
                    Kembali
                </a>

                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    Tambahkan Kendaraan
                </button>
            </div>
        </form>
    </section>
@endsection