@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                {{-- <div class="hidden items-center gap-2 text-sm text-gray-400 dark:text-gray-400 sm:flex">
                    <a href="{{ route('app-identity.index') }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Pengaturan</a>
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                    <span>Edit</span>
                </div> --}}
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Edit Pengaturan
                </h1>
                <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Atur informasi dan identitas
                    aplikasi RentalCar.</p>
            </div>
            <a href="{{ route('app-identity.index') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200/50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 sm:w-auto">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        {{-- FORM --}}

        <form action="{{ route('app-identity.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="font-semibold text-gray-800 dark:text-white">Identitas Aplikasi</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi yang akan digunakan pada aplikasi.
                    </p>
                </div>
                <div class="space-y-6 p-5 sm:p-6">
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="app_name"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Nama
                                Aplikasi</label>
                            <input type="text" id="app_name" name="app_name"
                                value="{{ old('app_name', $setting?->app_name) }}" placeholder="Contoh: RentalCar"
                                class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-400 focus:ring-4 focus:ring-gray-200/40 dark:border-gray-600 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-400 dark:focus:ring-gray-500/30">
                            @error('app_name')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="app_owner"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Pemilik</label>
                            <input type="text" id="app_owner" name="app_owner"
                                value="{{ old('app_owner', $setting?->app_owner) }}" placeholder="Nama pemilik aplikasi"
                                class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-400 focus:ring-4 focus:ring-gray-200/40 dark:border-gray-600 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-400 dark:focus:ring-gray-500/30">
                            @error('app_owner')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="app_description"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
                        <textarea id="app_description" name="app_description" rows="3"
                            placeholder="Deskripsi singkat tentang aplikasi RentalCar"
                            class="block w-full resize-none rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-400 focus:ring-4 focus:ring-gray-200/40 dark:border-gray-600 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-400 dark:focus:ring-gray-500/30">{{ old('app_description', $setting?->app_description) }}</textarea>
                        @error('app_description')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="app_email"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                            <input type="email" id="app_email" name="app_email"
                                value="{{ old('app_email', $setting?->app_email) }}" placeholder="email@example.com"
                                class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-400 focus:ring-4 focus:ring-gray-200/40 dark:border-gray-600 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-400 dark:focus:ring-gray-500/30">
                            @error('app_email')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="app_whatsapp"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">WhatsApp</label>
                            <input type="text" id="app_whatsapp" name="app_whatsapp"
                                value="{{ old('app_whatsapp', $setting?->app_whatsapp) }}" placeholder="08xxxxxxxxxx"
                                class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-400 focus:ring-4 focus:ring-gray-200/40 dark:border-gray-600 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-gray-400 dark:focus:ring-gray-500/30">
                            @error('app_whatsapp')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- IMAGES --}}

            <div class="mt-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="font-semibold text-gray-800 dark:text-white">Logo & Favicon</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Gunakan gambar untuk identitas visual aplikasi.
                    </p>
                </div>
                <div class="grid gap-6 p-5 sm:grid-cols-2 sm:p-6">
                    <div>
                        <label for="app_logo" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Logo
                            Aplikasi</label>
                        @if (filled($setting?->app_logo))
                            <div class="mb-3 flex items-center gap-3">
                                <img src="{{ Storage::url($setting->app_logo) }}" alt="Logo saat ini"
                                    class="h-14 w-14 rounded-xl border border-gray-200 object-cover dark:border-gray-600">
                                <span class="text-xs text-gray-400 dark:text-gray-500">Logo saat ini</span>
                            </div>
                        @endif
                        <input type="file" id="app_logo" name="app_logo" accept="image/*"
                            class="block w-full cursor-pointer rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:font-medium file:text-gray-700 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-200 dark:file:bg-gray-500 dark:file:text-gray-100">
                        <p class="mt-1.5 text-xs text-gray-400 dark:text-gray-500">JPG, PNG, WEBP. Maksimal 2 MB.</p>
                        @error('app_logo')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="app_favicon"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Favicon</label>
                        @if (filled($setting?->app_favicon))
                            <div class="mb-3 flex items-center gap-3">
                                <img src="{{ Storage::url($setting->app_favicon) }}" alt="Favicon saat ini"
                                    class="h-14 w-14 rounded-xl border border-gray-200 object-cover dark:border-gray-600">
                                <span class="text-xs text-gray-400 dark:text-gray-500">Favicon saat ini</span>
                            </div>
                        @endif
                        <input type="file" id="app_favicon" name="app_favicon" accept="image/*"
                            class="block w-full cursor-pointer rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:font-medium file:text-gray-700 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-200 dark:file:bg-gray-500 dark:file:text-gray-100">
                        <p class="mt-1.5 text-xs text-gray-400 dark:text-gray-500">PNG, ICO, WEBP. Maksimal 1 MB.</p>
                        @error('app_favicon')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- ACTION --}}

            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('app-identity.index') }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 sm:w-auto">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </section>
@endsection
