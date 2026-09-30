@extends('layouts.admin')
@section('content')

    {{-- HEADER --}}

    <section class="mb-6">
        <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Ajukan Kendaraan</h1>
        <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Lengkapi data kendaraan dan dokumen untuk
            mengajukan kendaraan ke dalam mitramu.</p>
    </section>

    {{-- VALIDATION ERROR --}}

    @if ($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 dark:border-red-900/50 dark:bg-red-950/30">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5 shrink-0 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m0 3.75h.007v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                </svg>
                <div class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- FORM --}}

    <form action="{{ route('vehicle.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-6 lg:grid-cols-3">

            {{-- MAIN FORM --}}

            <div class="space-y-6 lg:col-span-2">

                {{-- VEHICLE PROFILE --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
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

                {{-- INFORMASI KENDARAAN --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
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
                            <h2 class="font-bold text-gray-800 dark:text-white">Informasi Kendaraan</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lengkapi identitas dan informasi dasar
                                kendaraan yang diajukan.</p>
                        </div>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2">

                        {{-- MEREK --}}

                        <div>
                            <label for="brand"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Merek
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="text" name="brand" id="brand" value="{{ old('brand') }}" required
                                placeholder="Contoh: Toyota"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>

                        {{-- MODEL --}}

                        <div>
                            <label for="model"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Model
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="text" name="model" id="model" value="{{ old('model') }}" required
                                placeholder="Contoh: Avanza"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>

                        {{-- PLAT NOMOR --}}

                        <div>
                            <label for="plate_number"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Plat Nomor
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="text" name="plate_number" id="plate_number" value="{{ old('plate_number') }}"
                                required placeholder="Contoh: H 1234 AB"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm uppercase text-gray-800 outline-none transition placeholder:normal-case placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>

                        {{-- TIPE KENDARAAN --}}

                        <div>
                            <label for="type"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Kendaraan
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <select name="type_id" id="type" required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                                <option value="">Pilih tipe kendaraan</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- TAHUN --}}

                        <div>
                            <label for="year"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun Kendaraan
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="number" name="year" id="year" value="{{ old('year') }}" min="1900"
                                max="{{ date('Y') }}" required placeholder="Contoh: 2024"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>

                        {{-- WARNA --}}

                        <div>
                            <label for="color"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Warna</label>
                            <input type="text" name="color" id="color" value="{{ old('color') }}"
                                placeholder="Contoh: Hitam"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>

                        {{-- DESKRIPSI --}}

                        <div class="sm:col-span-2">
                            <label for="description"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <textarea name="description" id="description" rows="4" required
                                placeholder="Jelaskan kondisi atau informasi tambahan mengenai kendaraan..."
                                class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </section>

                {{-- SPESIFIKASI --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.06c.09-.542.56-.94 1.11-.94h2.592c.55 0 1.02.398 1.11.94l.213 1.281a8.966 8.966 0 0 1 1.49.87l1.202-.401a1.125 1.125 0 0 1 1.367.518l1.296 2.245c.275.478.14 1.086-.306 1.4l-.99.693c.055.5.055 1.005 0 1.505l.99.693c.446.313.58.922.306 1.4l-1.296 2.245a1.125 1.125 0 0 1-1.367.518l-1.202-.401a8.966 8.966 0 0 1-1.49.87l-.213 1.281c-.09.542-.56.94-1.11.94h-2.592c-.55 0-1.02-.398-1.11-.94l-.213-1.281a8.966 8.966 0 0 1-1.49-.87l-1.202.401a1.125 1.125 0 0 1-1.367-.518l-1.296-2.245a1.125 1.125 0 0 1 .306-1.4l.99-.693a8.966 8.966 0 0 1 0-1.505l-.99-.693a1.125 1.125 0 0 1-.306-1.4l1.296-2.245a1.125 1.125 0 0 1 1.367-.518l1.202-.401a8.966 8.966 0 0 1 1.49-.87l.213-1.281Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Spesifikasi</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Detail teknis kendaraan.</p>
                        </div>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2">

                        {{-- JENIS BAHAN BAKAR --}}

                        <div>
                            <label for="fuel_type"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Bahan
                                Bakar</label>
                            <input type="text" name="fuel_type" id="fuel_type" value="{{ old('fuel_type') }}"
                                placeholder="Contoh: Pertalite"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>

                        {{-- TRANSMISI --}}

                        <div>
                            <label for="transmission"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Transmisi</label>
                            <input type="text" name="transmission" id="transmission"
                                value="{{ old('transmission') }}" placeholder="Contoh: Manual"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>

                        {{-- KAPASITAS MESIN --}}

                        <div>
                            <label for="engine_capacity"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Kapasitas
                                Mesin</label>
                            <input type="text" name="engine_capacity" id="engine_capacity"
                                value="{{ old('engine_capacity') }}" placeholder="Contoh: 1500 cc"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>

                        {{-- JUMLAH KURSI --}}

                        <div>
                            <label for="seats"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah
                                Kursi</label>
                            <input type="number" name="seats" id="seats" value="{{ old('seats') }}"
                                min="1" placeholder="Contoh: 7"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>
                    </div>
                </section>

                {{-- FOTO KENDARAAN --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3.75h10.5A2.25 2.25 0 0 1 19.5 6v12a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 18V6a2.25 2.25 0 0 1 2.25-2.25Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 15 4.5-4.5 3 3 2.25-2.25L19.5 16.5M15.75 8.25h.008v.008h-.008V8.25Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Foto Kendaraan</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Masukkan foto kendaraan dari beberapa
                                sisi sebagai bahan pemeriksaan pengajuan.</p>
                        </div>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2">

                        {{-- FOTO DEPAN --}}

                        <div>
                            <label for="front_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Depan
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="file" name="front_photo" id="front_photo" accept="image/*" required
                                class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">
                            @error('front_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FOTO SAMPING KIRI --}}

                        <div>
                            <label for="left_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Samping Kiri
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="file" name="left_photo" id="left_photo" accept="image/*" required
                                class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">
                            @error('left_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FOTO SAMPING KANAN --}}

                        <div>
                            <label for="right_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Samping Kanan
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="file" name="right_photo" id="right_photo" accept="image/*" required
                                class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">
                            @error('right_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FOTO BELAKANG --}}

                        <div>
                            <label for="back_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Belakang
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="file" name="back_photo" id="back_photo" accept="image/*" required
                                class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">
                            @error('back_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FOTO ODOMETER --}}

                        <div class="sm:col-span-2">
                            <label for="odometer_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Odometer
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="file" name="odometer_photo" id="odometer_photo" accept="image/*" required
                                class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">
                            <p class="mt-2 text-xs text-gray-400 dark:text-gray-400">Pastikan angka kilometer pada odometer
                                terlihat dengan jelas.</p>
                            @error('odometer_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </section>

                {{-- DOKUMEN KENDARAAN --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-8.625a2.625 2.625 0 0 0-2.625-2.625H7.125A2.625 2.625 0 0 0 4.5 5.625v12.75A2.625 2.625 0 0 0 7.125 21h7.125m5.25-6.75v6m-3-3h6" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Dokumen Kendaraan</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lengkapi dokumen pajak dan STNK
                                kendaraan untuk pemeriksaan pengajuan.</p>
                        </div>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2">

                        {{-- BUKTI PAJAK --}}

                        <div>
                            <label for="tax_proof_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Bukti Pajak
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="file" name="tax_proof_photo" id="tax_proof_photo" accept="image/*" required
                                class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">
                            @error('tax_proof_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TANGGAL JATUH TEMPO PAJAK --}}

                        <div>
                            <label for="tax_due_date"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Jatuh Tempo
                                Pajak
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="date" name="tax_due_date" id="tax_due_date"
                                value="{{ old('tax_due_date') }}" required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                            @error('tax_due_date')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- FOTO STNK --}}

                        <div>
                            <label for="stnk_photo"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Foto STNK
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="file" name="stnk_photo" id="stnk_photo" accept="image/*" required
                                class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">
                            @error('stnk_photo')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TANGGAL JATUH TEMPO STNK --}}

                        <div>
                            <label for="stnk_due_date"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Jatuh Tempo
                                STNK
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <input type="date" name="stnk_due_date" id="stnk_due_date"
                                value="{{ old('stnk_due_date') }}" required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                            @error('stnk_due_date')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </section>
            </div>

            {{-- SIDE SETTINGS --}}

            <div class="space-y-6">

                {{-- PENGATURAN SEWA --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-3 3 3 3-3m-9-6h12" />
                            </svg>
                        </div>
                        <h2 class="mt-4 font-bold text-gray-800 dark:text-white">Pengaturan Sewa</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tentukan harga sewa dan deposit kendaraan.
                        </p>
                    </div>

                    {{-- HARGA SEWA --}}

                    <div>
                        <label for="price_amount"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Sewa</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm text-gray-400">Rp</span>
                            <input type="number" name="price_amount" id="price_amount"
                                value="{{ old('price_amount') }}" min="0" placeholder="0"
                                class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>
                        @error('price_amount')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- DEPOSIT --}}

                    <div class="mt-5">
                        <label for="deposit_amount"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deposit</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm text-gray-400">Rp</span>
                            <input type="number" name="deposit_amount" id="deposit_amount"
                                value="{{ old('deposit_amount') }}" min="0" placeholder="0"
                                class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        </div>
                        @error('deposit_amount')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- STATUS --}}

                    <div class="mt-5">
                        <label for="status"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Status
                            Kendaraan</label>
                        <select name="status" id="status"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                            <option value="Active" @selected(old('status') === 'Active')>Aktif</option>
                            <option value="Inactive" @selected(old('status') === 'Inactive')>Tidak Aktif</option>
                        </select>
                    </div>
                </section>

                {{-- LAMA SEWA --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Lama Sewa</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Pilih lama hari yang dapat digunakan
                                pelanggan untuk menyewa kendaraan.</p>
                        </div>
                    </div>

                    @if ($days->count())
                        <div class="grid grid-cols-2 gap-3">
                            @foreach ($days as $day)
                                <label
                                    class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 bg-white p-3 transition hover:border-gray-400 hover:bg-white dark:border-gray-600 dark:bg-gray-800 dark:hover:border-gray-400 dark:hover:bg-gray-700">
                                    <input type="checkbox" name="days[]" value="{{ $day->id }}"
                                        @checked(in_array($day->id, old('days', [])))
                                        class="h-4 w-4 rounded border-gray-300 text-gray-800 focus:ring-gray-800 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-200 dark:focus:ring-gray-300">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $day->day }}
                                        Hari</span>
                                </label>
                            @endforeach
                        </div>
                    @else
                        <div
                            class="rounded-xl border border-dashed border-gray-200 bg-white p-6 text-center dark:border-gray-600 dark:bg-gray-800">
                            <div
                                class="mx-auto flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </div>
                            <p class="mt-3 text-sm font-semibold text-gray-700 dark:text-gray-200">Belum ada pilihan hari
                            </p>
                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Data lama sewa belum tersedia.</p>
                        </div>
                    @endif

                    @error('days')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </section>

                {{-- AJUKAN --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-4 rounded-xl bg-white p-4 dark:bg-gray-800">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-200">Periksa kembali data sebelum
                            mengajukan kendaraan.</p>
                        <p class="mt-1 text-xs leading-5 text-gray-400 dark:text-gray-400">Kendaraan akan melalui proses
                            pemeriksaan sebelum dapat digunakan dalam layanan rental.</p>
                    </div>
                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3.5 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:ring-white/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Ajukan Kendaraan
                    </button>
                    <a href="{{ route('vehicle.index') }}"
                        class="mt-3 flex w-full items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-600">Batal</a>
                </section>
            </div>
        </div>
    </form>

@endsection
