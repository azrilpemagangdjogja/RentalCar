@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}
        <div class="mb-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div
                        class="mb-3 inline-flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-gray-800 dark:bg-gray-200"></span>
                        Langkah 2 dari 3
                    </div>

                    <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        Daftarkan Kendaraan Pertama
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Kendaraan pertama menjadi bagian dari proses pengajuan Mitra.
                        Lengkapi data kendaraan yang akan kamu sewakan melalui RentalCar.
                    </p>
                </div>

                {{-- PROGRESS --}}
                <div class="hidden items-center gap-2 sm:flex">
                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-xs font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                        ✓
                    </div>

                    <div class="h-px w-8 bg-gray-800 dark:bg-gray-300"></div>

                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-xs font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                        2
                    </div>

                    <div class="h-px w-8 bg-gray-200 dark:bg-gray-600"></div>

                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-xs font-semibold text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                        3
                    </div>
                </div>
            </div>
        </div>

        {{-- INTRO --}}
        <div
            class="relative mb-6 overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div
                class="absolute right-0 top-0 h-32 w-32 translate-x-12 -translate-y-12 rounded-full bg-gray-100 dark:bg-gray-600">
            </div>

            <div class="relative flex gap-4 p-5 sm:p-6">
                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gray-800 text-white dark:bg-gray-50 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75h7.5m-9.75-3h12a1.5 1.5 0 0 0 1.5-1.5V9.75a1.5 1.5 0 0 0-1.5-1.5h-12A1.5 1.5 0 0 0 4.5 9.75v4.5a1.5 1.5 0 0 0 1.5 1.5ZM6.75 8.25V6A2.25 2.25 0 0 1 9 3.75h6A2.25 2.25 0 0 1 17.25 6v2.25" />
                    </svg>
                </div>

                <div class="relative">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Kendaraan wajib untuk pengajuan Mitra
                    </h2>

                    <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        RentalCar perlu memastikan bahwa pengajuan Mitra memiliki kendaraan yang benar-benar
                        akan digunakan untuk layanan rental. Data kendaraan akan diperiksa sebelum pengajuan dilanjutkan.
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('vehicles.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            {{-- VEHICLE PROFILE --}}

            <section class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                <div class="mb-6 flex items-start gap-4">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5M6.75 18h.008v.008H6.75V18ZM17.25 18h.008v.008h-.008V18Z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-gray-800 dark:text-white">Foto Kendaraan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Foto kendaraan yang akan diperlihatkan
                            kepada pelanggan.</p>
                    </div>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                    <div
                        class="flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                        <img src="{{ asset('images/mitra-default.png') }}" alt="Preview"
                            class="h-full w-full object-cover">
                    </div>

                    <div class="flex-1">
                        <input type="file" name="profile" id="profile"
                            class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">

                        <p class="mt-2 text-xs text-gray-400">
                            Kosongkan jika tidak ingin mengganti foto.
                        </p>

                        @error('profile')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </section>

            {{-- VEHICLE INFORMATION --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75h7.5m-9.75-3h12a1.5 1.5 0 0 0 1.5-1.5V9.75a1.5 1.5 0 0 0-1.5-1.5h-12A1.5 1.5 0 0 0 4.5 9.75v4.5a1.5 1.5 0 0 0 1.5 1.5ZM6.75 8.25V6A2.25 2.25 0 0 1 9 3.75h6A2.25 2.25 0 0 1 17.25 6v2.25" />
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                                Informasi Kendaraan
                            </h2>

                            <p class="mt-1 text-sm leading-5 text-gray-500 dark:text-gray-400">
                                Masukkan identitas dasar kendaraan yang akan didaftarkan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-5 p-5 sm:p-6">

                    {{-- BRAND + MODEL --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label for="brand" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Merek
                            </label>

                            <input type="text" name="brand" id="brand" value="{{ old('brand') }}" required
                                placeholder="Contoh: Toyota"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('brand')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="model" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Model
                            </label>

                            <input type="text" name="model" id="model" value="{{ old('model') }}" required
                                placeholder="Contoh: Avanza"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('model')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- TYPE + YEAR --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label for="type" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jenis Kendaraan
                            </label>

                            <select name="type_id" id="type" required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-white/10">
                                <option value="">Pilih tipe kendaraan</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('type_id')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="year" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tahun Kendaraan
                            </label>

                            <input type="number" name="year" id="year" value="{{ old('year') }}" required
                                placeholder="Contoh: 2025"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('year')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- PLATE + COLOR --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label for="plate_number"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nomor Polisi
                            </label>

                            <input type="text" name="plate_number" id="plate_number"
                                value="{{ old('plate_number') }}" required placeholder="Contoh: B 1234 ABC"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm uppercase text-gray-800 outline-none transition placeholder:normal-case placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('plate_number')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="color" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Warna
                            </label>

                            <input type="text" name="color" id="color" value="{{ old('color') }}"
                                placeholder="Contoh: Hitam"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('color')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </div>
            </div>

            {{-- SPECIFICATION --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Spesifikasi Kendaraan
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Lengkapi spesifikasi kendaraan untuk membantu calon penyewa mengetahui kendaraan yang tersedia.
                    </p>
                </div>

                <div class="space-y-5 p-5 sm:p-6">

                    {{-- FUEL + TRANSMISSION --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label for="fuel_type"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Bahan Bakar
                            </label>

                            <input type="text" name="fuel_type" id="fuel_type" value="{{ old('fuel_type') }}"
                                placeholder="Contoh: Pertalite"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('fuel_type')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="transmission"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Transmisi
                            </label>

                            <input type="text" name="transmission" id="transmission" value="{{ old('transmission') }}"
                                placeholder="Contoh: Manual"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('transmission')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- ENGINE + SEATS --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label for="engine_capacity"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Kapasitas Mesin
                            </label>

                            <input type="text" name="engine_capacity" id="engine_capacity"
                                value="{{ old('engine_capacity') }}" placeholder="Contoh: 1500 cc"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('engine_capacity')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="seats" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jumlah Kursi
                            </label>

                            <input type="number" name="seats" id="seats" value="{{ old('seats') }}"
                                placeholder="Contoh: 7"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('seats')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- DESCRIPTION --}}
                    <div>
                        <label for="description" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Deskripsi
                        </label>

                        <textarea name="description" id="description" rows="4"
                            placeholder="Tambahkan informasi lain mengenai kendaraan..."
                            class="w-full resize-none rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- HARGA & DOKUMEN --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Foto & Dokumen
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Lengkapi foto kendaraan, dan dokumen untuk proses verifikasi.
                    </p>
                </div>
                <div class="space-y-6 p-5 sm:p-6">

                    {{-- FOTO KENDARAAN --}}
                    <div>
                        <h3 class="mb-3 text-sm font-semibold text-gray-800 dark:text-white">
                            Foto Kendaraan
                        </h3>
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="front_photo"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Foto Depan
                                </label>
                                <input type="file" name="front_photo" id="front_photo" accept="image/*"
                                    class="block w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3.5 file:text-sm file:font-medium file:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-200 dark:file:text-gray-800">
                                @error('front_photo')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="left_photo"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Foto Kiri
                                </label>
                                <input type="file" name="left_photo" id="left_photo" accept="image/*"
                                    class="block w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3.5 file:text-sm file:font-medium file:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-200 dark:file:text-gray-800">
                                @error('left_photo')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="right_photo"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Foto Kanan
                                </label>
                                <input type="file" name="right_photo" id="right_photo" accept="image/*"
                                    class="block w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3.5 file:text-sm file:font-medium file:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-200 dark:file:text-gray-800">
                                @error('right_photo')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="back_photo"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Foto Belakang
                                </label>
                                <input type="file" name="back_photo" id="back_photo" accept="image/*"
                                    class="block w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3.5 file:text-sm file:font-medium file:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-200 dark:file:text-gray-800">
                                @error('back_photo')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- DOKUMEN --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="odometer_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Foto Odometer
                            </label>
                            <input type="file" name="odometer_photo" id="odometer_photo" accept="image/*"
                                class="block w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3.5 file:text-sm file:font-medium file:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-200 dark:file:text-gray-800">
                            @error('odometer_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tax_proof_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Bukti Pajak
                            </label>
                            <input type="file" name="tax_proof_photo" id="tax_proof_photo" accept="image/*"
                                class="block w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3.5 file:text-sm file:font-medium file:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-200 dark:file:text-gray-800">
                            @error('tax_proof_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="stnk_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Foto STNK
                            </label>
                            <input type="file" name="stnk_photo" id="stnk_photo" accept="image/*"
                                class="block w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3.5 file:text-sm file:font-medium file:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-200 dark:file:text-gray-800">
                            @error('stnk_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="chassis_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Foto Rangka
                            </label>
                            <input type="file" name="chassis_photo" id="chassis_photo" accept="image/*"
                                class="block w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3.5 file:text-sm file:font-medium file:text-white dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-200 dark:file:text-gray-800">
                            @error('chassis_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- MASA BERLAKU --}}
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="tax_due_date"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jatuh Tempo Pajak
                            </label>
                            <input type="date" name="tax_due_date" id="tax_due_date"
                                value="{{ old('tax_due_date') }}"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">
                            @error('tax_due_date')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="stnk_due_date"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jatuh Tempo STNK
                            </label>
                            <input type="date" name="stnk_due_date" id="stnk_due_date"
                                value="{{ old('stnk_due_date') }}"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">
                            @error('stnk_due_date')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- APPROVAL NOTICE --}}
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
                            Setelah kendaraan dikirim
                        </h2>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Data kendaraan akan masuk ke proses pemeriksaan admin. Kamu belum perlu
                            mengaktifkan kendaraan secara manual. Kendaraan akan dapat digunakan setelah proses
                            verifikasi selesai.
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
                    Ajukan Kendaraan
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                    </svg>
                </button>
            </div>

        </form>
    </section>
@endsection
