@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}
        <div class="mb-8">
            <div class="mb-2">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-gray-800 dark:text-gray-400 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                    Kembali
                </a>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                Menjadi Mitra
            </h1>

            <p class="mt-1 hidden sm:block text-sm text-gray-500 dark:text-gray-400">
                Ketahui lebih lanjut tentang Mitra dan proses pengajuannya di RentalCar.
            </p>
        </div>

        {{-- HERO --}}
        <div class="relative mb-6 overflow-hidden rounded-2xl bg-white dark:bg-gray-700">

            {{-- BACKGROUND --}}
            <img src="{{ asset('images/mitra-default.png') }}" alt=""
                class="absolute inset-0 h-full w-full object-cover opacity-50  dark:opacity-100">

            {{-- OVERLAY --}}
            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-white/60 dark:from-gray-700 dark:via-gray-700/95 dark:to-gray-700/80"></div>

            {{-- CONTENT --}}
            <div class="relative px-6 py-10 sm:px-10 sm:py-12">
                <div class="relative max-w-2xl">

                    {{-- ICON --}}
                    <div
                        class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.5a7.5 7.5 0 1 0-6 0M12 12a3.75 3.75 0 1 0 0-7.5A3.75 3.75 0 0 0 12 12Z" />
                        </svg>
                    </div>

                    {{-- TITLE --}}
                    <h2 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        Kembangkan kendaraanmu bersama RentalCar
                    </h2>

                    {{-- DESCRIPTION --}}
                    <p class="mt-3 max-w-xl text-sm leading-6 text-gray-700 dark:text-gray-200 sm:text-base">
                        Menjadi Mitra memungkinkan kamu menyediakan kendaraan untuk disewakan melalui RentalCar
                        dan mengelola kendaraan yang kamu miliki melalui satu akun.
                    </p>

                    {{-- ACTION --}}
                    <a href="{{ route('mitra-identity.create') }}"
                        class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20">
                        Mulai Pengajuan
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>

        {{-- WHAT IS MITRA --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="p-5 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Apa itu Mitra?
                </h2>

                <p class="mt-2 max-w-3xl text-sm leading-6 text-gray-500 dark:text-gray-400">
                    Mitra adalah pengguna RentalCar yang telah melalui proses verifikasi dan dapat menyediakan
                    kendaraan untuk disewakan melalui platform. Setelah disetujui, kamu dapat mengelola kendaraan,
                    lokasi pengambilan, dan aktivitas penyewaan melalui akunmu.
                </p>
            </div>
        </div>

        {{-- BENEFITS --}}
        <div class="mb-6">
            <div class="mb-4">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Apa yang bisa dilakukan Mitra?
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Fitur yang tersedia setelah status Mitra kamu disetujui.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                {{-- VEHICLE --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700">
                    <div
                        class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 17h14M7 17v2m10-2v2M6 17l-1-6h14l-1 6M7 11l1.5-4h7L17 11M8 14h.01M16 14h.01" />
                        </svg>
                    </div>

                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                        Kelola Kendaraan
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Tambahkan dan kelola kendaraan yang ingin kamu sewakan melalui RentalCar.
                    </p>
                </div>

                {{-- PICKUP --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700">
                    <div
                        class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21s6-5.25 6-11a6 6 0 1 0-12 0c0 5.75 6 11 6 11Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 13.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        </svg>
                    </div>

                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                        Atur Lokasi
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Tentukan lokasi pengambilan kendaraan agar pelanggan dapat mengetahui tempat pengambilan.
                    </p>
                </div>

                {{-- RENTAL --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700">
                    <div
                        class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 6.75h7.5M6 9.75h12M5.25 18h13.5A1.25 1.25 0 0 0 20 16.75v-9.5A1.25 1.25 0 0 0 18.75 6H5.25A1.25 1.25 0 0 0 4 7.25v9.5A1.25 1.25 0 0 0 5.25 18Z" />
                        </svg>
                    </div>

                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                        Terima Penyewaan
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Kendaraan yang tersedia dapat ditemukan pelanggan untuk proses penyewaan.
                    </p>
                </div>

            </div>
        </div>

        {{-- PROCESS --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Bagaimana prosesnya?
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Pengajuan Mitra dilakukan melalui beberapa tahap.
                </p>
            </div>

            <div
                class="grid grid-cols-1 divide-y divide-gray-200 p-5 dark:divide-gray-600 sm:grid-cols-2 sm:divide-x sm:divide-y-0 sm:p-6">

                {{-- STEP 1 --}}
                <div class="flex gap-4 pb-5 sm:pb-0 sm:pr-5">
                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-sm font-bold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        1
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Lengkapi Data
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Lengkapi informasi identitas yang diperlukan untuk pengajuan.
                        </p>
                    </div>
                </div>

                {{-- STEP 2 --}}
                <div class="flex gap-4 pt-5 sm:pt-0 sm:pl-5">
                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-sm font-bold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        2
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Tunggu Verifikasi
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Pengajuan akan diperiksa sebelum status Mitra diberikan.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- REQUIREMENTS --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Yang perlu disiapkan
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Pastikan data berikut sudah tersedia sebelum melakukan pengajuan.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-3 p-5 sm:grid-cols-2 sm:p-6">

                <div class="flex items-center gap-3">
                    <div
                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                        </svg>
                    </div>

                    <span class="text-sm text-gray-600 dark:text-gray-300">
                        Akun RentalCar yang aktif
                    </span>
                </div>

                <div class="flex items-center gap-3">
                    <div
                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                        </svg>
                    </div>

                    <span class="text-sm text-gray-600 dark:text-gray-300">
                        Nomor telepon yang dapat dihubungi
                    </span>
                </div>

                <div class="flex items-center gap-3">
                    <div
                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                        </svg>
                    </div>

                    <span class="text-sm text-gray-600 dark:text-gray-300">
                        NIK yang sesuai dengan identitas
                    </span>
                </div>

                <div class="flex items-center gap-3">
                    <div
                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                        </svg>
                    </div>

                    <span class="text-sm text-gray-600 dark:text-gray-300">
                        Nama lengkap sesuai identitas
                    </span>
                </div>

            </div>
        </div>

        {{-- ACTION --}}
        <div
            class="flex flex-col gap-3 rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-600 dark:bg-gray-800 sm:flex-row sm:items-center sm:justify-between sm:p-6">
            <div>
                <h2 class="text-sm font-semibold text-gray-800 dark:text-white">
                    Siap mengajukan menjadi Mitra?
                </h2>

                <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                    Pastikan data identitas yang kamu siapkan sudah benar sebelum melanjutkan.
                </p>
            </div>

            <a href="{{ route('mitra-identity.create') }}"
                class="inline-flex w-full shrink-0 items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                Ajukan Menjadi Mitra
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                </svg>
            </a>
        </div>

    </section>
@endsection
