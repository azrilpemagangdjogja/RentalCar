@extends('layouts.admin')

@section('content')
    <section class=" w-full max-w-3xl">
        {{-- HEADER --}}
        <div class="mb-6">
            <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                <a href="{{ url()->previous() }}" class="transition hover:text-gray-700 dark:hover:text-gray-200">Kembali</a>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m9 18 6-6-6-6"/>
                </svg>
                <span>Menjadi Mitra</span>
            </div>
            <h1 class="text-xl font-bold text-gray-800 dark:text-white sm:text-2xl">Lengkapi Data Mitra</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Lengkapi data identitas berikut untuk mulai menggunakan fitur Mitra.
            </p>
        </div>

        {{-- FORM --}}
        <form action="{{ route('mitra-identity.store') }}" method="POST"
            class="overflow-hidden w-full rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
            @csrf

            <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M15 9h.01M9 9h.01M12 13h.01M7 21h10a2 2 0 0 0 2-2v-4a7 7 0 1 0-14 0v4a2 2 0 0 0 2 2Z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold text-gray-800 dark:text-white">Informasi Identitas</h2>
                        <p class="text-xs text-gray-400 dark:text-gray-400">Data ini digunakan untuk keperluan verifikasi Mitra.</p>
                    </div>
                </div>

                <div class="space-y-5">
                    {{-- NIK --}}
                    <div>
                        <label for="nik" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-200">
                            NIK
                        </label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                            maxlength="16" inputmode="numeric" autocomplete="off"
                            placeholder="Masukkan 16 digit NIK"
                            class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-800 outline-none transition focus:border-gray-400 focus:ring-2 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-400 dark:focus:ring-gray-500">
                        @error('nik')
                            <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NAMA LENGKAP --}}
                    <div>
                        <label for="full_name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Nama Lengkap
                        </label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}"
                            autocomplete="name" placeholder="Masukkan nama lengkap sesuai identitas"
                            class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-800 outline-none transition focus:border-gray-400 focus:ring-2 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-400 dark:focus:ring-gray-500">
                        @error('full_name')
                            <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                            readonly
                            class="block w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-2.5 text-sm text-gray-500 outline-none dark:border-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <p class="mt-1.5 text-xs text-gray-400 dark:text-gray-400">
                            Email mengikuti alamat email akun kamu.
                        </p>
                        @error('email')
                            <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- TELEPON --}}
                    <div>
                        <label for="telp" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Nomor Telepon
                        </label>
                        <input type="tel" id="telp" name="telp" value="{{ old('telp', auth()->user()->telp) }}"
                            inputmode="tel" autocomplete="tel" placeholder="Contoh: 081234567890"
                            class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-800 outline-none transition focus:border-gray-400 focus:ring-2 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-400 dark:focus:ring-gray-500">
                        <p class="mt-1.5 text-xs text-gray-400 dark:text-gray-400">
                            Nomor telepon wajib diisi untuk menjadi Mitra.
                        </p>
                        @error('telp')
                            <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- FOOTER --}}
            <div class="flex flex-col-reverse gap-3 bg-gray-50 p-5 dark:bg-gray-800 sm:flex-row sm:items-center sm:justify-between sm:p-6">
                <p class="text-xs leading-5 text-gray-400 dark:text-gray-400">
                    Pastikan data yang kamu masukkan sesuai dengan identitas yang sebenarnya.
                </p>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-700 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-500 sm:w-auto">
                    Ajukan Menjadi Mitra
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m9 5 7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </form>
    </section>
@endsection
