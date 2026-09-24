@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 hidden sm:flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('pickup-location.index') }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Pickup Locations</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <a href="{{ route('pickup-location.show', $pickupLocation->id) }}"
                        class="max-w-48 truncate transition hover:text-gray-700 dark:hover:text-gray-200">
                        {{ $pickupLocation->name }}
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Kelola</span>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Kelola Pickup Location
                </h1>

                <p class="mt-1 text-sm hidden sm:block text-gray-500 dark:text-gray-400">
                    Kelola alamat, koordinat, kapasitas, dan status pickup location.
                </p>
            </div>
        </div>

        <form action="{{ route('pickup-location.addmanage', $pickupLocation->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- LOCATION INFORMATION --}}

            <div class="rounded-2xl border border-gray-200 bg-gray-50 dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                                Informasi Lokasi
                            </h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Atur lokasi fisik pickup dan kapasitas kendaraan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-5 p-5 sm:p-6">

                    {{-- ADDRESS --}}

                    <div>
                        <label for="address" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Alamat
                        </label>
                        <textarea name="address" id="address" rows="4"
                            class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10"
                            placeholder="Masukkan alamat pickup location">{{ old('address', $pickupLocation->address) }}</textarea>
                        @error('address')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- COORDINATES --}}

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="latitude" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Latitude
                            </label>
                            <input type="number" name="latitude" id="latitude" step="0.0000001"
                                value="{{ old('latitude', $pickupLocation->latitude) }}"
                                class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
                            @error('latitude')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="longitude" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Longitude
                            </label>
                            <input type="number" name="longitude" id="longitude" step="0.0000001"
                                value="{{ old('longitude', $pickupLocation->longitude) }}"
                                class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
                            @error('longitude')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- SEARCH LATITUDE LONGITUDE --}}

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <label for="latitude" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Cari Latitude dan Longitude anda
                            </label>
                            <p class="text-xs text-gray-400 dark:text-gray-400">
                                Gunakan lokasi perangkat anda untuk mengisi koordinat secara otomatis.
                            </p>
                        </div>

                        <button type="button" onclick="getLocation()"
                            class="inline-flex w-full shrink-0 items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5s-7.5-3.358-7.5-10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            Cari Lokasi
                        </button>
                    </div>

                    {{-- MAX VEHICLE --}}

                    <div>
                        <label for="max_vehicle" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Kapasitas Maksimum
                        </label>

                        <div class="relative">
                            <input type="number" name="max_vehicle" id="max_vehicle" min="0"
                                value="{{ old('max_vehicle', $pickupLocation->max_vehicle) }}"
                                class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 pr-24 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                            <span
                                class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-xs text-gray-400 dark:text-gray-400">
                                kendaraan
                            </span>
                        </div>

                        <p class="mt-1.5 text-xs text-gray-400 dark:text-gray-400">
                            Kapasitas tidak boleh lebih kecil dari jumlah kendaraan yang saat ini berada di lokasi.
                        </p>

                        @error('max_vehicle')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                        @if (session('error'))
                            <p class="mt-1.5 text-xs text-red-500">{{ session('error') }}</p>
                        @enderror
                </div>

            </div>
        </div>

        {{-- CURRENT INFORMATION --}}

        <div class="mt-6 rounded-2xl bg-gray-50 p-5 dark:bg-gray-800">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 11.25h1.5v4.5h-1.5v-4.5Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                </svg>

                <div>
                    <p class="text-xs font-medium text-gray-600 dark:text-gray-300">
                        Informasi pickup location
                    </p>
                    <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                        Nama pickup location saat ini adalah
                        <span class="font-medium text-gray-700 dark:text-gray-300">{{ $pickupLocation->name }}</span>.
                        Untuk mengubah nama atau deskripsi, gunakan menu Edit.
                    </p>
                </div>
            </div>
        </div>

        {{-- ACTION --}}

        <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
            <a href="{{ route('pickup-location.show', $pickupLocation->id) }}"
                class="inline-flex w-full items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold text-gray-600 transition hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 sm:w-auto">
                Batal
            </a>

            <button type="submit"
                class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                Simpan Perubahan
            </button>
        </div>
    </form>
</section>
@endsection

<script>
    function getLocation() {
        navigator.geolocation.getCurrentPosition(function (position) {
            document.getElementById('latitude').value = position.coords.latitude.toFixed(7);
            document.getElementById('longitude').value = position.coords.longitude.toFixed(7);
        });
    }
</script>
