@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Waktu Rental</span>
                </div>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Waktu Rental
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola waktu rental yang bisa digunakan oleh mitra.
                </p>
            </div>

            <a href="{{ route('rental-time.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Waktu
            </a>
        </div>

        {{-- SUMMARY --}}

        <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="rounded-2xl bg-white p-5 dark:border dark:border-gray-600 dark:bg-gray-700">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Total Waktu</p>
                        <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">{{ $rentalTimes->count() }}</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">waktu terdaftar</p>
                    </div>
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21s7.5-4.5 7.5-10.5a7.5 7.5 0 1 0-15 0C4.5 16.5 12 21 12 21Z" />
                            <circle cx="12" cy="10.5" r="2.5" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl bg-white p-5 dark:border dark:border-gray-600 dark:bg-gray-700">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Kendaraan</p>
                        <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehicleCount ?? 0 }}</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">kendaraan Terdaftar</p>
                    </div>
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15M6.75 7.5h10.5M6.75 16.5h10.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- TIME LIST --}}

        <div class="rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Daftar Waktu</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Waktu yang dapat digunakan mitra pada
                            kendaraan nya.</p>
                    </div>
                    <span class="text-xs text-gray-400 dark:text-gray-400">{{ $rentalTimes->count() }} Waktu</span>
                </div>
            </div>

            <div class="divide-y divide-gray-100 dark:divide-gray-600">
                @forelse ($rentalTimes as $time)
                    <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:p-6">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6l4 2M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <h3 class="text-sm font-semibold text-gray-800 dark:text-white">{{ $time->day }}</h3>
                                <span
                                    class="rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                    {{ $time->status }}
                                </span>
                            </div>

                            <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                                {{ $time->description ?: 'Tidak ada deskripsi untuk region ini.' }}
                            </p>

                            <p class="mt-2 text-xs text-gray-400 dark:text-gray-400">
                                Dibuat {{ $time->created_at?->format('d M Y, H:i') ?? '-' }}
                            </p>
                        </div>

                        <div class="flex shrink-0 items-center gap-2">
                            <a href="{{ route('rental-time.edit', $time->id) }}"
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21s7.5-4.5 7.5-10.5a7.5 7.5 0 1 0-15 0C4.5 16.5 12 21 12 21Z" />
                                <circle cx="12" cy="10.5" r="2.5" />
                            </svg>
                        </div>

                        <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-300">Belum ada region</p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Tambahkan region pertama agar pelanggan
                            dapat mencari kendaraan berdasarkan wilayah.</p>

                        <a href="{{ route('rental-time.create') }}"
                            class="mt-4 inline-flex items-center gap-2 rounded-xl bg-gray-800 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Tambah Region
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

    </section>
@endsection
