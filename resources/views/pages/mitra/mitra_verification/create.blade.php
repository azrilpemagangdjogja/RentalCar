@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HERO --}}
        <div class="flex flex-col mb-6 gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                {{-- <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('join-pickup-location.index') }}"
                        class="truncate transition hover:text-gray-700 dark:hover:text-gray-200">
                        Lokasi Pengambilan
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span class="truncate">{{ $pickupLocation->name }}</span>
                </div> --}}

                <h1 class="truncate text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Pengajuan Mitra
                </h1>

                <p class="mt-1 hidden sm:block text-sm text-gray-500 dark:text-gray-400">
                    Mengajukan identitas asli kamu dan memperkenalkan diri kepada RentalCar.
                </p>
            </div>

            <a href="{{ route('mitra-identity.index') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 sm:w-auto">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg> --}}
                Kembali
            </a>
        </div>

        {{-- VERIFICATION INTRO --}}
        <div
            class="relative mb-6 overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-gray-100 dark:bg-gray-600/40"></div>
            <div class="absolute -bottom-20 right-20 h-36 w-36 rounded-full bg-gray-100 dark:bg-gray-600/30"></div>

            <div class="relative flex flex-col gap-5 p-5 sm:flex-row sm:items-center sm:p-6">
                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gray-800 text-white dark:bg-white dark:text-gray-800 ring-1 ring-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6.75h.008v.008h-.008V6.75ZM6 3.75h12A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75Z" />
                    </svg>
                </div>

                <div class="flex-1">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Satu langkah sebelum menjadi Mitra
                    </h2>

                    <p class="mt-1 text-sm leading-6 text-gray-800 dark:text-white">
                        Kami perlu memastikan identitas pemilik kendaraan sesuai dengan data yang diajukan.
                        Pastikan informasi dan foto identitas yang kamu kirim dapat terbaca dengan jelas.
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('mitra-identity.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6 mt-6">
            @csrf

            {{-- IDENTITY --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 9h.008v.008H15V9Zm-6 0h.008v.008H9V9Zm3 8.25a4.5 4.5 0 0 0 4.243-3H7.757A4.5 4.5 0 0 0 12 17.25ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                                Data Identitas
                            </h2>

                            <p class="mt-1 text-sm leading-5 text-gray-500 dark:text-gray-400">
                                Masukkan data sesuai dengan identitas yang akan diverifikasi.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 p-5 sm:p-6">

                    {{-- NIK + FULL NAME --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        {{-- NIK --}}
                        <div>
                            <label for="nik" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                NIK
                            </label>

                            <input type="text" name="nik" id="nik" value="{{ old('nik') }}" maxlength="16"
                                inputmode="numeric" autocomplete="off" required placeholder="16 digit NIK"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-700 dark:focus:ring-gray-300/10">

                            @error('nik')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FULL NAME --}}
                        <div>
                            <label for="full_name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nama Lengkap
                            </label>

                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                                autocomplete="name" required placeholder="Nama sesuai identitas"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-700 dark:focus:ring-gray-300/10">

                            @error('full_name')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- KTP PHOTO --}}
                    <div>
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <label for="ktp_photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Foto KTP
                            </label>

                            <span class="text-xs text-gray-400 dark:text-gray-500">
                                Wajib
                            </span>
                        </div>

                        <label for="ktp_photo"
                            class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-gray-300 bg-gray-50 px-5 py-10 text-center transition hover:border-gray-500 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:hover:border-gray-400 dark:hover:bg-gray-700">

                            <div
                                class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-gray-500 shadow-sm ring-1 ring-gray-200 transition group-hover:text-gray-800 dark:bg-gray-700 dark:text-gray-400 dark:ring-gray-600 dark:group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.7" stroke="currentColor" class="h-7 w-7">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75 6.75 12l3.75 3 3.75-4.5 7.5 6.75M3 19.5h18A1.5 1.5 0 0 0 22.5 18V6A1.5 1.5 0 0 0 21 4.5H3A1.5 1.5 0 0 0 1.5 6v12A1.5 1.5 0 0 0 3 19.5Z" />
                                </svg>
                            </div>

                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                Upload foto KTP
                            </span>

                            <span class="mt-1 max-w-sm text-xs leading-5 text-gray-400 dark:text-gray-500">
                                Pastikan seluruh bagian KTP terlihat, tidak buram, dan informasi dapat dibaca dengan jelas.
                            </span>

                            <span
                                class="mt-4 rounded-lg bg-gray-800 px-3 py-2 text-xs font-semibold text-white transition group-hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:group-hover:bg-white">
                                Pilih Foto
                            </span>

                            <input type="file" name="ktp_photo" id="ktp_photo" accept="image/*" required class="hidden">
                        </label>

                        @error('ktp_photo')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NOTE --}}
                    <div
                        class="flex gap-3 rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-500 dark:text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                        </svg>

                        <p class="text-xs leading-5 text-gray-500 dark:text-gray-400">
                            Pastikan data yang kamu masukkan sesuai dengan identitas asli.
                            Data akan diperiksa sebelum pengajuan Mitra disetujui.
                        </p>
                    </div>

                </div>
            </div>

            {{-- ACCOUNT --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Akun yang Digunakan
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Pengajuan ini akan terhubung dengan akun RentalCar kamu.
                    </p>
                </div>

                <div class="p-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Nama Akun</p>
                            <p class="mt-1 truncate text-sm font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->name }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Email</p>
                            <p class="mt-1 truncate text-sm font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Nomor Telepon</p>
                            <p class="mt-1 truncate text-sm font-semibold text-gray-800 dark:text-white">
                                {{ auth()->user()->telp ?: 'Belum diatur' }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            {{-- BEFORE SUBMIT --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                <div class="flex items-start gap-4">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75m6.75 2.25a9.75 9.75 0 1 1-19.5 0 9.75 9.75 0 0 1 19.5 0Z" />
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Sebelum mengirim pengajuan
                        </h2>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Pastikan NIK, nama lengkap, dan foto KTP sudah benar dan dapat dibaca.
                            Setelah dikirim, data akan masuk ke proses verifikasi.
                        </p>
                    </div>
                </div>
            </div>

            {{-- ACTION --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ url()->previous() }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">
                    Kembali
                </a>

                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-6 py-3.5 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    Ajukan Identitas
                </button>
            </div>
        </form>
    </section>
@endsection
