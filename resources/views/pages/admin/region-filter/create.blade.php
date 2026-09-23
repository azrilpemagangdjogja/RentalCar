@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 hidden sm:flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('region-filter.index') }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Region Filters</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Tambah Region</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Tambah Region Filter
                </h1>
                <p class="mt-1 hidden sm:block text-sm text-gray-500 dark:text-gray-400">Tambahkan region baru yang dapat digunakan
                    pelanggan untuk mencari kendaraan berdasarkan wilayah.</p>
            </div>
        </div>

        {{-- FORM --}}

        <form action="{{ route('region-filter.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                {{-- REGION INFORMATION --}}

                <div class="lg:col-span-2">
                    <div class="rounded-2xl bg-gray-50 dark:bg-gray-700">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Region</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Masukkan informasi dasar untuk region
                                yang akan digunakan pada sistem.</p>
                        </div>

                        <div class="space-y-5 p-5 sm:p-6">

                            {{-- NAME --}}

                            <div>
                                <label for="name"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Nama
                                    Region</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    placeholder="Contoh: Gombong, Kebumen, Yogyakarta" required
                                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                @error('name')
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

                    <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-800">
                        <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 11.25h1.5v4.5h-1.5v-4.5Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                            </svg>
                            <div>
                                <p class="text-xs font-medium text-gray-600 dark:text-gray-300">Tentang Region Filter</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                                    Region digunakan untuk membantu pelanggan menemukan kendaraan berdasarkan wilayah.
                                    Region yang dibuat admin nantinya dapat ditampilkan pada menu pencarian kendaraan.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- USAGE --}}

                    <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-700">
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
                <a href="{{ route('region-filter.index') }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    Tambah Region
                </button>
            </div>
        </form>

    </section>
@endsection
