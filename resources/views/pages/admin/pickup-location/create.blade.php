@extends('layouts.admin')
@section('content')
    <section class="w-full">
        {{-- HEADER --}}

        <div class="mb-8">
            <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Tambah Pickup Location
            </h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tambahkan lokasi yang dapat digunakan sebagai tempat
                pengambilan kendaraan.</p>
        </div>

        {{-- FORM --}}

        <form action="{{ route('pickup-location.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- LOCATION INFORMATION --}}

            <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                <div class="mb-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Lokasi</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Masukkan informasi dasar mengenai lokasi
                        pickup.</p>
                </div>

                <div class="space-y-5">

                    {{-- NAME --}}

                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                            Lokasi</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                            placeholder="Contoh: RentalCar Yogyakarta"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-gray-50 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ADDRESS --}}

                    <div>
                        <label for="address"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                        <textarea name="address" id="address" rows="4" required placeholder="Masukkan alamat lengkap pickup location"
                            class="w-full resize-none rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-gray-50 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- DESCRIPTION --}}

                    <div>
                        <label for="description"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" required
                            placeholder="Jelaskan informasi tambahan mengenai lokasi ini"
                            class="w-full resize-none rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-gray-50 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- LOCATION COORDINATES --}}

            <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                <div class="mb-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">Titik Lokasi</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tentukan koordinat lokasi pickup agar pelanggan
                        dapat menemukan lokasinya.</p>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                    {{-- LATITUDE --}}

                    <div>
                        <label for="latitude"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Latitude</label>
                        <input type="number" name="latitude" id="latitude" value="{{ old('latitude') }}" required
                            step="0.0000001" min="-90" max="90" placeholder="-7.7956"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-gray-50 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">
                        @error('latitude')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- LONGITUDE --}}

                    <div>
                        <label for="longitude"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Longitude</label>
                        <input type="number" name="longitude" id="longitude" value="{{ old('longitude') }}" required
                            step="0.0000001" min="-180" max="180" placeholder="110.3695"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-gray-50 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">
                        @error('longitude')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="mt-5 flex gap-3 rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-500 dark:text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                    </svg>
                    <p class="text-xs leading-5 text-gray-500 dark:text-gray-400">Pastikan koordinat sesuai dengan lokasi
                        sebenarnya. Koordinat dapat diperoleh dari Google Maps atau layanan peta lainnya.</p>
                </div>
            </div>

            {{-- MITRA INFORMATION --}}

            <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                <div class="flex gap-4">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.75-1.67M18 18.72a9.094 9.094 0 0 1-12 0M18 18.72V21m-12-2.28V21m12-2.28a9.094 9.094 0 0 0 3.75-1.67M6 18.72a9.094 9.094 0 0 1-3.75-1.67M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM21 12a3 3 0 1 1-6 0M3 12a3 3 0 1 1 6 0" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold text-gray-800 dark:text-white">Hubungan dengan Mitra</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Pickup location dapat dibuat terlebih dahulu tanpa mitra. Setelah lokasi dibuat, kamu dapat
                            menghubungkannya dengan mitra untuk membuatnya tersedia bagi pelanggan.
                        </p>
                    </div>
                </div>
            </div>

            {{-- ACTION --}}

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('pickup-location.index') }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">Batal</a>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">Simpan
                    Lokasi</button>
            </div>

        </form>
    </section>
@endsection
