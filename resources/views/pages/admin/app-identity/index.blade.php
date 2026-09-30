@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="hidden items-center gap-2 text-sm text-gray-400 dark:text-gray-400 sm:flex">
                    <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Sistem</a>
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                    <span>Pengaturan</span>
                </div>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Pengaturan Aplikasi
                </h1>
                <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">
                    Kelola informasi dan identitas aplikasi RentalCar.
                </p>
            </div>

            <a href="{{ route('app-identity.edit') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1-1v2m0 14a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" />
                </svg>
                Edit Pengaturan
            </a>
        </div>

        {{-- SUMMARY --}}

        <div class="mb-6 grid grid-cols-2 gap-4 sm:grid-cols-4">
            <div class="rounded-2xl bg-white p-5 dark:border dark:border-gray-600 dark:bg-gray-700">
                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M5 7v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7M9 11h6" />
                    </svg>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Nama Aplikasi</p>
                <p class="mt-1 truncate font-semibold text-gray-800 dark:text-white">
                    {{ filled($setting?->app_name) ? $setting?->app_name : 'Belum tersedia' }}
                </p>
            </div>

            <div class="rounded-2xl bg-white p-5 dark:border dark:border-gray-600 dark:bg-gray-700">
                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 7l2-4h14l2 4M5 7v13h14V7" />
                    </svg>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Pemilik</p>
                <p class="mt-1 truncate font-semibold text-gray-800 dark:text-white">
                    {{ filled($setting?->app_owner) ? $setting?->app_owner : 'Belum diatur' }}
                </p>
            </div>

            <div class="rounded-2xl bg-white p-5 dark:border dark:border-gray-600 dark:bg-gray-700">
                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l9 6 9-6M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" />
                    </svg>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                <p class="mt-1 truncate font-semibold text-gray-800 dark:text-white">
                    {{ filled($setting?->app_email) ? $setting?->app_email : 'Belum tersedia' }}
                </p>
            </div>

            <div class="rounded-2xl bg-white p-5 dark:border dark:border-gray-600 dark:bg-gray-700">
                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m5-4a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" />
                    </svg>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">WhatsApp</p>
                <p class="mt-1 truncate font-semibold text-gray-800 dark:text-white">
                    {{ filled($setting?->app_whatsapp) ? $setting?->app_whatsapp : 'Belum tersedia' }}
                </p>
            </div>
        </div>

        {{-- APPLICATION SETTINGS --}}

        <div class="rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="font-semibold text-gray-800 dark:text-white">Identitas Aplikasi</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Informasi yang digunakan pada aplikasi RentalCar.
                </p>
            </div>

            <div class="divide-y divide-gray-200 dark:divide-gray-600">
                <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:p-6">
                    <div class="sm:w-56">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Nama Aplikasi</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Nama utama aplikasi</p>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        {{ filled($setting?->app_name) ? $setting?->app_name : 'Belum tersedia' }}
                    </p>
                </div>

                <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:p-6">
                    <div class="sm:w-56">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Deskripsi</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Deskripsi singkat aplikasi</p>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        {{ filled($setting?->app_description) ? $setting?->app_description : 'Belum diatur' }}
                    </p>
                </div>

                <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:p-6">
                    <div class="sm:w-56">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Email</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Email kontak aplikasi</p>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        {{ filled($setting?->app_email) ? $setting?->app_email : 'Belum tersedia' }}
                    </p>
                </div>

                <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:p-6">
                    <div class="sm:w-56">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">WhatsApp</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Nomor WhatsApp kontak</p>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        {{ filled($setting?->app_whatsapp) ? $setting?->app_whatsapp : 'Belum tersedia' }}
                    </p>
                </div>

                <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:p-6">
                    <div class="sm:w-56">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Pemilik</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Pemilik aplikasi</p>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        {{ filled($setting?->app_owner) ? $setting?->app_owner : 'Belum diatur' }}
                    </p>
                </div>

                <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:p-6">
                    <div class="sm:w-56">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Logo</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Logo utama aplikasi</p>
                    </div>
                    @if (filled($setting?->app_logo))
                        <img src="{{ Storage::url($setting?->app_logo) }}" alt="Logo Aplikasi" class="h-12 w-12 rounded-xl border border-gray-200 object-cover dark:border-gray-600">
                    @else
                        <span class="text-sm text-gray-400 dark:text-gray-500">Belum tersedia</span>
                    @endif
                </div>

                <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:p-6">
                    <div class="sm:w-56">
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Favicon</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Ikon browser aplikasi</p>
                    </div>
                    @if (filled($setting?->app_favicon))
                        <img src="{{ Storage::url($setting?->app_favicon) }}" alt="Favicon Aplikasi" class="h-10 w-10 rounded-lg border border-gray-200 object-cover dark:border-gray-600">
                    @else
                        <span class="text-sm text-gray-400 dark:text-gray-500">Belum tersedia</span>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection