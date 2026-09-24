@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 hidden sm:flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('rental-time.index') }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Region Filters</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Tambah Waktu</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Tambah Region Filter
                </h1>
                <p class="mt-1 hidden sm:block text-sm text-gray-500 dark:text-gray-400">Tambahkan Waktu baru yang dapat digunakan
                    Mitra untuk kendaraan miliknya.</p>
            </div>
        </div>

        {{-- FORM --}}

        <form action="{{ route('rental-time.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                {{-- REGION INFORMATION --}}

                <div class="lg:col-span-2">
                    <div class="rounded-2xl bg-gray-50 dark:bg-gray-700">
                        <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Waktu</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Masukkan informasi dasar untuk waktu
                                yang akan digunakan pada sistem.</p>
                        </div>

                        <div class="space-y-5 p-5 sm:p-6">

                            {{-- NAME --}}

                            <div>
                                <label for="day"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Lama
                                    Hari</label>
                                <input type="number" name="day" id="day" value="{{ old('day') }}"
                                    placeholder="Contoh: 1, 2, 5, 14" required
                                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                @error('Day')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}

                            <div>
                                <label for="description"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
                                <textarea name="description" id="description" rows="7" placeholder="Jelaskan wilayah atau cakupan region ini..."
                                    class="w-full resize-none rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm leading-6 text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- INFORMATION --}}

                <div class="space-y-6">

                    {{-- INFORMATION --}}

                    <section
                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                        <div class="mb-6">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-3 3 3 3-3m-9-6h12" />
                                </svg>
                            </div>
                            <h2 class="mt-4 font-bold text-gray-800 dark:text-white">Pengaturan Rental</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Atur deposit dan status kendaraan.</p>
                        </div>

                        {{-- STATUS --}}

                        <div class="mt-5">
                            <label for="status"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" id="status"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                                <option value="Inactive" @selected(old('status', 'Inactive') === 'Inactive')>Tidak Aktif</option>
                                <option value="Active" @selected(old('status') === 'Active')>Aktif</option>
                            </select>
                        </div>
                    </section>

                    {{-- USAGE --}}

                    <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-800">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v4.5l3 1.5" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-600 dark:text-gray-300">Penggunaan Region</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                                    Gunakan nama wilayah yang jelas dan mudah dikenali pelanggan, misalnya nama kota atau
                                    daerah.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ACTION --}}

            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('rental-time.index') }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    Tambah Waktu
                </button>
            </div>
        </form>

    </section>
@endsection
