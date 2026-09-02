@extends('layouts.admin')
@section('content')
    <section class="mb-8">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-medium text-gray-400 dark:text-gray-300">Dashboard Admin</p>
                <h1 class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">Selamat datang kembali</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Pantau kendaraan, rental, dan aktivitas mitramu dari
                    sini.</p>
            </div>
            {{-- <a href="#"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Kendaraan
            </a> --}}
        </div>
    </section>

    {{-- SUMMARY --}}

    <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- VEHICLES --}}

        <div
            class="rounded-2xl border border-gray-100 bg-gray-50 p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-600 dark:bg-gray-700">
            <div class="flex items-center justify-between">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5M6.75 18h.008v.008H6.75V18ZM17.25 18h.008v.008h-.008V18Z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-400 dark:text-gray-300">Kendaraan</span>
            </div>
            <p class="mt-5 text-2xl font-bold text-gray-800 dark:text-white">24</p>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Total kendaraan</p>
        </div>

        {{-- ACTIVE RENTAL --}}

        <div
            class="rounded-2xl border border-gray-100 bg-gray-50 p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-600 dark:bg-gray-700">
            <div class="flex items-center justify-between">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-400 dark:text-gray-300">Rental</span>
            </div>
            <p class="mt-5 text-2xl font-bold text-gray-800 dark:text-white">8</p>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Rental sedang berjalan</p>
        </div>

        {{-- PICKUP LOCATIONS --}}

        <div
            class="rounded-2xl border border-gray-100 bg-gray-50 p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-600 dark:bg-gray-700">
            <div class="flex items-center justify-between">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-400 dark:text-gray-300">Lokasi</span>
            </div>
            <p class="mt-5 text-2xl font-bold text-gray-800 dark:text-white">5</p>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Pickup locations</p>
        </div>

        {{-- TRANSACTION --}}

        <div
            class="rounded-2xl border border-gray-100 bg-gray-50 p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-600 dark:bg-gray-700">
            <div class="flex items-center justify-between">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7.5h18M5.25 7.5v10.125A2.625 2.625 0 0 0 7.875 20.25h8.25a2.625 2.625 0 0 0 2.625-2.625V7.5M8.25 7.5V5.25A2.25 2.25 0 0 1 10.5 3h3a2.25 2.25 0 0 1 2.25 2.25V7.5" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-400 dark:text-gray-300">Transaksi</span>
            </div>
            <p class="mt-5 text-2xl font-bold text-gray-800 dark:text-white">156</p>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Total transaksi</p>
        </div>

    </section>

    {{-- RENTAL + VEHICLE STATUS --}}

    <section class="mt-8 grid gap-6 xl:grid-cols-3">

        {{-- RECENT RENTAL --}}

        <div class="rounded-2xl border border-gray-100 bg-gray-50 p-6 xl:col-span-2 dark:border-gray-600 dark:bg-gray-700">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-gray-800 dark:text-white">Rental Terbaru</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Aktivitas rental terbaru pada mitramu.</p>
                </div>
                <a href="#" class="text-sm font-semibold text-gray-700 hover:underline dark:text-gray-200">Lihat
                    semua</a>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="w-full min-w-[600px] text-left text-sm">
                    <thead
                        class="border-b border-gray-200 text-xs uppercase text-gray-400 dark:border-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="pb-3 font-semibold">Pelanggan</th>
                            <th class="pb-3 font-semibold">Kendaraan</th>
                            <th class="pb-3 font-semibold">Tanggal</th>
                            <th class="pb-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                        <tr>
                            <td class="py-4 font-medium text-gray-800 dark:text-white">Andi Saputra</td>
                            <td class="py-4 text-gray-500 dark:text-gray-300">Toyota Avanza</td>
                            <td class="py-4 text-gray-500 dark:text-gray-300">21 Agu 2026</td>
                            <td class="py-4">
                                <span
                                    class="rounded-full bg-gray-200 px-3 py-1 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">Aktif</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 font-medium text-gray-800 dark:text-white">Rizky Maulana</td>
                            <td class="py-4 text-gray-500 dark:text-gray-300">Honda Brio</td>
                            <td class="py-4 text-gray-500 dark:text-gray-300">20 Agu 2026</td>
                            <td class="py-4">
                                <span
                                    class="rounded-full bg-gray-200 px-3 py-1 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">Aktif</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 font-medium text-gray-800 dark:text-white">Fajar Ramadhan</td>
                            <td class="py-4 text-gray-500 dark:text-gray-300">Toyota Innova</td>
                            <td class="py-4 text-gray-500 dark:text-gray-300">19 Agu 2026</td>
                            <td class="py-4">
                                <span
                                    class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-300">Selesai</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        {{-- VEHICLE STATUS --}}

        <div class="rounded-2xl border border-gray-100 bg-gray-50 p-6 dark:border-gray-600 dark:bg-gray-700">

            <div>
                <h2 class="font-bold text-gray-800 dark:text-white">Status Kendaraan</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kondisi kendaraan saat ini.</p>
            </div>

            <div class="mt-6 space-y-5">

                <div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-300">Tersedia</span>
                        <span class="font-semibold text-gray-800 dark:text-white">10</span>
                    </div>
                    <div class="mt-2 h-2 rounded-full bg-gray-200 dark:bg-gray-600">
                        <div class="h-2 w-[42%] rounded-full bg-gray-800 dark:bg-gray-200"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-300">Disewa</span>
                        <span class="font-semibold text-gray-800 dark:text-white">8</span>
                    </div>
                    <div class="mt-2 h-2 rounded-full bg-gray-200 dark:bg-gray-600">
                        <div class="h-2 w-[33%] rounded-full bg-gray-800 dark:bg-gray-200"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-300">Servis</span>
                        <span class="font-semibold text-gray-800 dark:text-white">4</span>
                    </div>
                    <div class="mt-2 h-2 rounded-full bg-gray-200 dark:bg-gray-600">
                        <div class="h-2 w-[17%] rounded-full bg-gray-800 dark:bg-gray-200"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-300">Tidak tersedia</span>
                        <span class="font-semibold text-gray-800 dark:text-white">2</span>
                    </div>
                    <div class="mt-2 h-2 rounded-full bg-gray-200 dark:bg-gray-600">
                        <div class="h-2 w-[8%] rounded-full bg-gray-800 dark:bg-gray-200"></div>
                    </div>
                </div>

            </div>

            <a href="#"
                class="mt-6 block text-center text-sm font-semibold text-gray-600 hover:underline dark:text-gray-300">Kelola
                kendaraan</a>

        </div>

    </section>

    {{-- PICKUP LOCATIONS --}}

    <section class="mt-8">

        <div class="flex items-end justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Pickup Locations</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lokasi pengambilan kendaraan milik mitramu.</p>
            </div>
            <a href="#" class="text-sm font-semibold text-gray-700 hover:underline dark:text-gray-200">Kelola
                lokasi</a>
        </div>

        <div class="mt-5 grid gap-5 sm:grid-cols-2 xl:grid-cols-3">

            <div
                class="rounded-2xl border border-gray-100 bg-gray-50 p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-600 dark:bg-gray-700">
                <div class="flex items-start gap-4">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 dark:text-white">Jakarta Selatan</h3>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Jl. Kemang Raya No. 12</p>
                        <p class="mt-3 text-xs font-medium text-gray-600 dark:text-gray-300">8 kendaraan</p>
                    </div>
                </div>
            </div>

            <div
                class="rounded-2xl border border-gray-100 bg-gray-50 p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-600 dark:bg-gray-700">
                <div class="flex items-start gap-4">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 dark:text-white">Jakarta Pusat</h3>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Jl. Menteng Raya No. 8</p>
                        <p class="mt-3 text-xs font-medium text-gray-600 dark:text-gray-300">6 kendaraan</p>
                    </div>
                </div>
            </div>

            <div
                class="rounded-2xl border border-gray-100 bg-gray-50 p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-600 dark:bg-gray-700">
                <div class="flex items-start gap-4">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 dark:text-white">Depok</h3>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Jl. Margonda Raya No. 21</p>
                        <p class="mt-3 text-xs font-medium text-gray-600 dark:text-gray-300">10 kendaraan</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    {{-- RECENT TRANSACTIONS --}}

    <section class="mt-8 rounded-2xl border border-gray-100 bg-gray-50 p-6 dark:border-gray-600 dark:bg-gray-700">

        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-gray-800 dark:text-white">Transaksi Terbaru</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Ringkasan transaksi terbaru.</p>
            </div>
            <a href="#" class="text-sm font-semibold text-gray-700 hover:underline dark:text-gray-200">Lihat
                semua</a>
        </div>

        <div class="mt-6 divide-y divide-gray-200 dark:divide-gray-600">

            <div class="flex flex-col gap-3 py-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-800 dark:text-white">Rental Toyota Avanza</p>
                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">TRX-20260821-001 · Andi Saputra</p>
                </div>
                <div class="text-left sm:text-right">
                    <p class="text-sm font-bold text-gray-800 dark:text-white">Rp1.050.000</p>
                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">21 Agustus 2026</p>
                </div>
            </div>

            <div class="flex flex-col gap-3 py-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-800 dark:text-white">Rental Honda Brio</p>
                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">TRX-20260820-008 · Rizky Maulana</p>
                </div>
                <div class="text-left sm:text-right">
                    <p class="text-sm font-bold text-gray-800 dark:text-white">Rp600.000</p>
                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">20 Agustus 2026</p>
                </div>
            </div>

        </div>

    </section>
@endsection
