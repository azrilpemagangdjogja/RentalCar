@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="hidden sm:flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Kendaraan</span>
                </div>
                <h1 class="text-2xl mt-2 font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Tipe Kendaraan
                </h1>
                <p class="mt-1 hidden sm:block text-sm text-gray-500 dark:text-gray-400">Kelola tipe kendaraan yang tersedia pada sistem
                    rental.</p>
            </div>

            <a href="{{ route('vehicle-type.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Tipe
            </a>
        </div>

        {{-- SUMMARY --}}

        <div class="mb-6 grid grid-cols-2 gap-4">
            <div class="rounded-2xl dark:border bg-white p-5 dark:border-gray-600 dark:bg-gray-700">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Total Tipe Kendaraan</p>
                        <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehicleTypes->count() }}</p>
                        <p class="mt-1 hidden sm:block text-xs text-gray-500 dark:text-gray-400">tipe terdaftar</p>
                    </div>
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl dark:border bg-white p-5 dark:border-gray-600 dark:bg-gray-700">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Kendaraan</p>
                        <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehicleCount ?? 0 }}</p>
                        <p class="mt-1 text-xs hidden sm:block text-gray-500 dark:text-gray-400">kendaraan menggunakan tipe</p>
                    </div>
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12h18M5.25 5.25h13.5v13.5H5.25V5.25Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- VEHICLE TYPES --}}

        <div class="rounded-2xl dark:border bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Daftar Tipe Kendaraan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tipe kendaraan yang dapat digunakan oleh
                            mitra.</p>
                    </div>
                    <span class="text-xs text-gray-400 dark:text-gray-500">{{ $vehicleTypes->count() }} tipe</span>
                </div>
            </div>

            <div class="divide-y divide-gray-100 dark:divide-gray-600">
                @forelse ($vehicleTypes as $vehicleType)
                    <div class="flex flex-col gap-4 p-5 flex-row items-center sm:p-6">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <h3 class="text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicleType->name }}
                                </h3>
                                <span
                                    class="rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                    {{ $vehicleType->vehicles_count ?? $vehicleType->vehicles->count() }} kendaraan
                                </span>
                            </div>
                            <p class="mt-1 hidden sm:block text-sm leading-6 text-gray-500 dark:text-gray-400">
                                {{ $vehicleType->description ?: 'Tidak ada deskripsi untuk tipe kendaraan ini.' }}
                            </p>
                            <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">
                                Dibuat {{ $vehicleType->created_at?->format('d M Y, H:i') ?? '-' }}
                            </p>
                        </div>

                        <div class="flex shrink-0 items-center gap-2">
                            <a href="{{ route('vehicle-type.edit', $vehicleType->id) }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl dark:border px-3.5 py-2.5 text-xs font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.888 1.888M18.75 3.75a1.5 1.5 0 0 1 2.121 2.121L8.25 18.492l-4.5 1.125 1.125-4.5L18.75 3.75Z" />
                                </svg>
                                Edit
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-10 text-center">
                        <div
                            class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
                            </svg>
                        </div>
                        <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-300">Belum ada tipe kendaraan</p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">Tambahkan tipe kendaraan pertama untuk
                            digunakan pada sistem.</p>
                        <a href="{{ route('vehicle-type.create') }}"
                            class="mt-4 inline-flex items-center gap-2 rounded-xl bg-gray-800 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Tambah Tipe
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

    </section>
@endsection
