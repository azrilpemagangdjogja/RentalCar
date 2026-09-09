@extends('layouts.admin')
@section('content')
    {{-- HEADER --}}

    <section class="w-full">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('pickup-location.show', $pickupLocation->id) }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Pickup Location</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Kelola Kendaraan</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Kelola Kendaraan
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Atur kendaraan yang ditempatkan pada
                    {{ $pickupLocation->name }}.</p>
            </div>
            <a href="{{ route('pickup-location.show', $pickupLocation->id) }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                Kembali
            </a>
        </div>

        {{-- LOCATION OVERVIEW --}}

        <div class="mb-6 rounded-2xl bg-white p-5 dark:bg-gray-700 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                        stroke="currentColor" class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="min-w-0">
                            <h2 class="truncate text-lg font-bold text-gray-800 dark:text-white">{{ $pickupLocation->name }}
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                                {{ $pickupLocation->address }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span
                                class="rounded-full bg-gray-800 px-3 py-1.5 text-xs font-semibold text-white dark:bg-white dark:text-gray-800">{{ $pickupLocation->status }}</span>
                            <span
                                class="rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">{{ $usedVehicles->count() }}/{{ $pickupLocation->max_vehicle }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- AVAILABLE VEHICLES --}}

        <div class="rounded-2xl bg-white dark:bg-gray-700">
            <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Kendaraan Tersedia</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kendaraan milikmu yang belum ditempatkan
                            pada pickup location.</p>
                    </div>
                    <span class="text-xs text-gray-400 dark:text-gray-500">{{ $vehicles->count() }} kendaraan</span>
                </div>
            </div>

            <div class="divide-y divide-gray-100 dark:divide-gray-600">
                @forelse ($vehicles as $vehicle)
                    <div
                        class="flex flex-col gap-4 p-4 transition hover:bg-gray-50 dark:hover:bg-gray-600 sm:flex-row sm:items-center sm:p-5">
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1-3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                <span
                                    class="hidden shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200 sm:inline-flex">{{ $vehicle->type->name ?? '-' }}</span>
                            </div>
                            <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">{{ $vehicle->plate_number }}
                                · {{ $vehicle->year }}@if ($vehicle->transmission)
                                    · {{ $vehicle->transmission }}
                                @endif
                            </p>
                        </div>

                        <div class="flex items-center gap-2 sm:shrink-0">
                            <a href="{{ route('vehicle.show', $vehicle->id) }}"
                                class="inline-flex items-center justify-center rounded-lg border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                Detail
                            </a>

                            <form action="{{ route('pickup-location.addveh', [$pickupLocation->id, $vehicle->id]) }}"
                                onsubmit="return confirm('tempatkan {{ $vehicle->brand }} {{ $vehicle->model }} pada lokasi ini?')"
                                method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-lg bg-gray-800 px-3 py-2 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                                    Tempatkan
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                        <div class="p-8 text-center">
                            <div
                                class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                                    stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                </svg>
                            </div>
                            <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-300">Tidak ada kendaraan tersedia
                            </p>
                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">Semua kendaraan milikmu sudah ditempatkan
                                pada lokasi ini atau lokasi lainnya.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- DEPLOYED VEHICLES --}}

            <div class="mt-6 rounded-2xl bg-white dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                    <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Kendaraan di Lokasi</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kendaraan yang saat ini ditempatkan pada
                                pickup location ini.</p>
                        </div>
                        <span class="text-xs text-gray-400 dark:text-gray-500">{{ $usedVehicles->count() }} kendaraan</span>
                    </div>
                </div>

                <div class="divide-y divide-gray-100 dark:divide-gray-600">
                    @forelse ($usedVehicles as $vehicle)
                        <div
                            class="flex flex-col gap-4 p-4 transition hover:bg-gray-50 dark:hover:bg-gray-600 sm:flex-row sm:items-center sm:p-5">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                                    stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                </svg>
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                    <span
                                        class="rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">{{ $vehicle->type->name ?? '-' }}</span>
                                </div>

                                <p class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">{{ $vehicle->plate_number }}
                                    · {{ $vehicle->year }}@if ($vehicle->transmission)
                                        · {{ $vehicle->transmission }}
                                    @endif
                                </p>

                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">
                                    Pemilik: <span
                                        class="font-medium text-gray-500 dark:text-gray-400">{{ $vehicle->owner->name ?? '-' }}</span>
                                </p>
                            </div>

                            <div class="flex items-center gap-2 sm:shrink-0">
                                <a href="{{ route('vehicle.show', $vehicle->id) }}"
                                    class="inline-flex items-center justify-center rounded-lg border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                    Detail
                                </a>

                                <form action="{{ route('pickup-location.unveh', [$pickupLocation->id, $vehicle->id]) }}"
                                    onsubmit="return confirm('Keluarkan {{ $vehicle->brand }} {{ $vehicle->model }} dari lokasi ini?')"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="inline-flex items-center justify-center rounded-lg border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                        Keluarkan
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                            <div class="p-8 text-center">
                                <div
                                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                                    </svg>
                                </div>
                                <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-300">Belum ada kendaraan</p>
                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">Belum ada kendaraan yang ditempatkan pada
                                    lokasi ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- FOOTER ACTION --}}

                {{-- <div class="mt-6">
                    <a href="{{ route('vehicle.show', $pickupLocation->id) }}"
                        class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700 sm:w-auto">
                        Kembali
                    </a>
                </div> --}}
            </section>
        @endsection
