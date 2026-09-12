@extends('layouts.admin')

@section('content')
    <section class="w-full">


        {{-- HEADER --}}

        <section class="mb-6">
            <div>
                <p class="text-sm font-medium text-gray-400 dark:text-gray-400">
                    Akun Saya
                </p>
                <h1 class="mt-1 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Menu Saya
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Kelola akun, rental, transaksi, dan pengaturan kamu.
                </p>
            </div>
        </section>

        {{-- PROFILE CARD --}}

        <section class="mb-6">
            <div
                class="group block rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                <div class="flex items-center gap-4 sm:gap-5">

                    @if ($user->profile)
                        <img src="{{ asset('storage/' . $user->profile) }}" alt="{{ $user->name }}"
                            class="h-16 w-16 shrink-0 rounded-2xl object-cover sm:h-20 sm:w-20">
                    @else
                        <div
                            class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300 sm:h-20 sm:w-20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                                stroke="currentColor" class="h-8 w-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 21a7.5 7.5 0 0 1 15 0" />
                            </svg>
                        </div>
                    @endif

                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2">
                            <h2 class="truncate text-lg font-bold text-gray-800 dark:text-white sm:text-xl">
                                {{ $user->name }}
                            </h2>

                            @if (($user->mitra_status ?? 'Unverified') === 'Verified')
                                <span
                                    class="hidden shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800 sm:inline-flex">
                                    Mitra Terverifikasi
                                </span>
                            @endif
                        </div>

                        <p class="mt-1 truncate text-sm text-gray-500 dark:text-gray-400">
                            {{ $user->email }}
                        </p>

                        <p class="mt-2 text-xs text-gray-400 dark:text-gray-400">
                            Kelola informasi profil dan akun
                        </p>
                    </div>

                    <a href=""
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white px-12 transition group-hover:bg-gray-200 group-hover:text-gray-800 dark:bg-gray-600 dark:text-gray-300 dark:group-hover:bg-gray-200 dark:group-hover:text-gray-800">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg> --}}
                        <span>Edit</span>
                    </a>

                </div>
            </div>
        </section>

        {{-- QUICK ACTION --}}

        <section class="mb-6">
            <div class="mb-3">
                <h2 class="font-bold text-gray-800 dark:text-white">
                    Akses Cepat
                </h2>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                    Akses menu yang sering kamu gunakan.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">

                @if (($user->mitra_status ?? 'Unverified') === 'Verified')
                    <a href="#"
                        class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-gray-800 dark:text-white">
                            Kendaraan Saya
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                            Kelola kendaraan
                        </p>
                    </a>

                    <a href="#"
                        class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-gray-800 dark:text-white">
                            Tempat Pengambilan
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                            Kelola pickup location
                        </p>
                    </a>

                    <a href="#"
                        class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v4.5m0 3h.008v.008H12V16.5ZM10.125 3.75h3.75l6.75 11.25-1.875 3.75H5.25l-1.875-3.75 6.75-11.25Z" />
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-gray-800 dark:text-white">
                            Denda
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                            Lihat denda
                        </p>
                    </a>

                    <a href="#"
                        class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-gray-800 dark:text-white">
                            Transaksi Saya
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                            Lihat transaksi
                        </p>
                    </a>
                @else
                    <a href="#"
                        class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-gray-800 dark:text-white">
                            Mulai Sewa
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                            Cari kendaraan
                        </p>
                    </a>

                    <a href="#"
                        class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1-18 0Z" />
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-gray-800 dark:text-white">
                            Transaksi Saya
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                            Riwayat rental
                        </p>
                    </a>

                    <a href="#"
                        class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v4.5m0 3h.008v.008H12V16.5ZM10.125 3.75h3.75l6.75 11.25-1.875 3.75H5.25l-1.875-3.75 6.75-11.25Z" />
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-gray-800 dark:text-white">
                            Denda
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                            Lihat denda
                        </p>
                    </a>

                    <a href="#"
                        class="group rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.75 9.75a2.25 2.25 0 1 1 4.5 0c0 1.5-2.25 1.875-2.25 3.375m0 3.375h.008v.008H12v-.008Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                            </svg>
                        </div>
                        <p class="mt-4 text-sm font-semibold text-gray-800 dark:text-white">
                            Bantuan
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                            Butuh bantuan?
                        </p>
                    </a>
                @endif

            </div>
        </section>

        {{-- RECENT TRANSACTIONS --}}

        <section class="mb-6">
            <div class="mb-3 flex items-end justify-between gap-3">
                <div>
                    <h2 class="font-bold text-gray-800 dark:text-white">
                        Transaksi Terakhir
                    </h2>
                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                        Aktivitas rental terbaru kamu.
                    </p>
                </div>

                <a href="#"
                    class="text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">
                    Lihat Semua
                </a>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">

                <a href="#"
                    class="block border-b border-gray-100 p-4 transition last:border-b-0 hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-600/50 sm:p-5">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                        Toyota Avanza
                                    </h3>
                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                        08 Sep 2026 · 2 Hari
                                    </p>
                                </div>

                                <span
                                    class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                    Selesai
                                </span>
                            </div>

                            <div class="mt-2 flex items-center justify-between gap-3">
                                <p class="text-xs text-gray-400 dark:text-gray-400">
                                    Car
                                </p>
                                <p class="text-sm font-bold text-gray-800 dark:text-white">
                                    Rp500.000
                                </p>
                            </div>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="hidden h-5 w-5 shrink-0 text-gray-400 sm:block">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg>
                    </div>
                </a>

                <a href="#"
                    class="block border-b border-gray-100 p-4 transition last:border-b-0 hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-600/50 sm:p-5">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m6 17 3-6h6l3 6m-9-6 1.5-3h3L15 11m-9 6a2 2 0 1 1-4 0 2 2 0 1 1 4 0Zm16 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                        Honda Beat
                                    </h3>
                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                        02 Sep 2026 · 1 Hari
                                    </p>
                                </div>

                                <span
                                    class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                    Selesai
                                </span>
                            </div>

                            <div class="mt-2 flex items-center justify-between gap-3">
                                <p class="text-xs text-gray-400 dark:text-gray-400">
                                    Bike
                                </p>
                                <p class="text-sm font-bold text-gray-800 dark:text-white">
                                    Rp100.000
                                </p>
                            </div>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="hidden h-5 w-5 shrink-0 text-gray-400 sm:block">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg>
                    </div>
                </a>

                <a href="#" class="block p-4 transition hover:bg-gray-50 dark:hover:bg-gray-600/50 sm:p-5">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.25 17.25h13.5M6 17.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0ZM22.5 17.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1-4.5 0ZM5.25 17.25l1.5-7.5h7.5l3 7.5" />
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                        Polygon
                                    </h3>
                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                        28 Agu 2026 · 1 Hari
                                    </p>
                                </div>

                                <span
                                    class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                    Selesai
                                </span>
                            </div>

                            <div class="mt-2 flex items-center justify-between gap-3">
                                <p class="text-xs text-gray-400 dark:text-gray-400">
                                    Bicycle
                                </p>
                                <p class="text-sm font-bold text-gray-800 dark:text-white">
                                    Rp50.000
                                </p>
                            </div>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="hidden h-5 w-5 shrink-0 text-gray-400 sm:block">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg>
                    </div>
                </a>

            </div>
        </section>

        {{-- OTHER MENU --}}

        <section class="mb-6">
            <div class="mb-3">
                <h2 class="font-bold text-gray-800 dark:text-white">
                    Lainnya
                </h2>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                    Informasi dan bantuan lainnya.
                </p>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">

                <a href="#"
                    class="flex items-center gap-4 border-b border-gray-100 p-4 transition hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-600/50">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 9.75a2.25 2.25 0 1 1 4.5 0c0 1.5-2.25 1.875-2.25 3.375m0 3.375h.008v.008H12v-.008Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-gray-800 dark:text-white">
                            Bantuan
                        </p>
                        <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-400">
                            Pertanyaan dan bantuan penggunaan aplikasi
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                </a>

                <a href="#"
                    class="flex items-center gap-4 border-b border-gray-100 p-4 transition hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-600/50">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75m-6.75-6h7.5L19.5 7.5v13.125a1.125 1.125 0 0 1-1.125 1.125H5.625A1.125 1.125 0 0 1 4.5 20.625V4.875A1.125 1.125 0 0 1 5.625 3.75H9Z" />
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-gray-800 dark:text-white">
                            Kebijakan & Ketentuan
                        </p>
                        <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-400">
                            Syarat dan ketentuan penggunaan RentalCar
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                </a>

                <a href="#"
                    class="flex items-center gap-4 border-b border-gray-100 p-4 transition hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-600/50">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-gray-800 dark:text-white">
                            Privasi
                        </p>
                        <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-400">
                            Pelajari bagaimana data kamu digunakan
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                </a>

                <a href="#"
                    class="flex items-center gap-4 p-4 transition hover:bg-gray-50 dark:hover:bg-gray-600/50">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.75h.008v.008H12V6.75Zm0 4.5h.008v.008H12v-.008Zm0 4.5h.008v.008H12v-.008Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-gray-800 dark:text-white">
                            Tentang RentalCar
                        </p>
                        <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-400">
                            Informasi tentang aplikasi
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                </a>

            </div>
        </section>

    </section>
@endsection
