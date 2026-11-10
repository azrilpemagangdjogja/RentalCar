@extends('layouts.admin')
@section('content')

    {{-- HEADER --}}

    <section class="mb-6">
        <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Kelola Kendaraan</h1>
        <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Kelola informasi penyewaan dan ketersediaan
            kendaraan Anda.</p>
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

    <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid gap-6 md:grid-cols-3">

            {{-- MAIN FORM --}}

            <div class="space-y-6 md:col-span-2">

                {{-- PROFILE --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6">
                        <h2 class="font-bold text-gray-800 dark:text-white">Foto Kendaraan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola foto utama kendaraan yang
                            ditampilkan kepada customer.</p>
                    </div>
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                        <img src="{{ asset('storage/' . $vehicle->profile) }}" alt="Foto Kendaraan"
                            class="h-40 w-full rounded-xl object-cover sm:w-56">
                        <div class="flex-1">
                            <label for="profile"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Ganti Foto
                                Kendaraan</label>
                            <input type="file" name="profile" id="profile" accept="image/*"
                                class="w-full rounded-xl border border-gray-200 bg-white text-sm text-gray-600 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-600 dark:file:text-white">
                            @error('profile')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-400">Gunakan foto kendaraan yang jelas dan berkualitas baik.
                            </p>
                        </div>
                    </div>
                </section>

                {{-- BASIC INFORMATION --}}

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
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi identitas kendaraan yang
                                telah diajukan dan diverifikasi.</p>
                        </div>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Merek</label>
                            <input type="text" value="{{ $vehicle->brand }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                            <input type="text" value="{{ $vehicle->model }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                                Polisi</label>
                            <input type="text" value="{{ $vehicle->plate_number }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm uppercase text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe
                                Kendaraan</label>
                            <input type="text" value="{{ $vehicle->type->name }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun</label>
                            <input type="text" value="{{ $vehicle->year }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Warna</label>
                            <input type="text" value="{{ $vehicle->color }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <textarea rows="4" readonly
                                class="w-full cursor-not-allowed resize-none rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">{{ $vehicle->description }}</textarea>
                        </div>
                    </div>
                </section>

                {{-- SPECIFICATION --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
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
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Bahan
                                Bakar</label>
                            <input type="text" value="{{ $vehicle->fuel_type }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div>
                            <label
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Transmisi</label>
                            <input type="text" value="{{ $vehicle->transmission->name }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Kapasitas
                                Mesin</label>
                            <input type="text" value="{{ $vehicle->engine_capacity }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah
                                Kursi</label>
                            <input type="text" value="{{ $vehicle->seats }}" readonly
                                class="w-full cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-600 outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        </div>
                    </div>
                </section>

                {{-- DOCUMENT --}}

                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Depan</p>
                        @if ($vehicle?->vehicleDocument->front_photo)
                            <img src="{{ Storage::url($vehicle->vehicleDocument->front_photo) }}" alt="Foto depan kendaraan"
                                class="aspect-video w-full rounded-2xl object-cover">
                        @else
                            <div
                                class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                Belum tersedia
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Kiri</p>
                        @if ($vehicle?->vehicleDocument->left_photo)
                            <img src="{{ Storage::url($vehicle->vehicleDocument->left_photo) }}" alt="Foto kiri kendaraan"
                                class="aspect-video w-full rounded-2xl object-cover">
                        @else
                            <div
                                class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                Belum tersedia
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Kanan</p>
                        @if ($vehicle?->vehicleDocument->right_photo)
                            <img src="{{ Storage::url($vehicle->vehicleDocument->right_photo) }}" alt="Foto kanan kendaraan"
                                class="aspect-video w-full rounded-2xl object-cover">
                        @else
                            <div
                                class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                Belum tersedia
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-3">
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Odometer</p>
                        @if ($vehicle?->vehicleDocument->odometer_photo)
                            <img src="{{ Storage::url($vehicle->vehicleDocument->odometer_photo) }}" alt="Foto odometer"
                                class="aspect-video w-full rounded-2xl object-cover">
                        @else
                            <div
                                class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                Belum tersedia
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Selfie</p>
                        @if ($vehicle?->vehicleDocument->selfie_photo)
                            <img src="{{ Storage::url($vehicle->vehicleDocument->selfie_photo) }}" alt="Bukti pajak kendaraan"
                                class="aspect-video w-full rounded-2xl object-cover">
                        @else
                            <div
                                class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                Belum tersedia
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Belakang</p>
                        @if ($vehicle?->vehicleDocument->back_photo)
                            <img src="{{ Storage::url($vehicle->vehicleDocument->back_photo) }}" alt="Foto belakang kendaraan"
                                class="aspect-video w-full rounded-2xl object-cover">
                        @else
                            <div
                                class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                Belum tersedia
                            </div>
                        @endif
                    </div>

                    {{-- PRIVATE IMAGES --}}
                    
                    {{-- <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Nomor Rangka</p>
                        @if ($vehicle?->vehicleDocument->chassis_photo)
                            <img src="{{ route('approval-vehicle-document-photo', [$vehicle->id, 'chassis_photo']) }}"
                                alt="Foto nomor rangka" class="aspect-video w-full rounded-2xl object-cover">
                        @else
                            <div
                                class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                Belum tersedia
                            </div>
                        @endif
                    </div> --}}
                    {{-- <div>
                        <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">STNK</p>
                        @if ($vehicle?->vehicleDocument->stnk_photo)
                            <img src="{{ route('approval-vehicle-document-photo', [$vehicle->id, 'stnk_photo']) }}"
                                alt="Foto STNK" class="aspect-video w-full rounded-2xl object-cover">
                        @else
                            <div
                                class="flex aspect-video items-center justify-center rounded-2xl bg-gray-100 text-sm text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                Belum tersedia
                            </div>
                        @endif
                    </div> --}}
                </div>
            </div>

            {{-- SIDE SETTINGS --}}

            <div class="space-y-6 md:col-span-1">

                {{-- RENTAL SETTINGS --}}

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
                        <h2 class="mt-4 font-bold text-gray-800 dark:text-white">Pengaturan Rental</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Atur harga, deposit, dan status kendaraan.
                        </p>
                    </div>

                    {{-- PRICE --}}

                    <div>
                        <label for="price_amount"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Sewa per
                            Hari</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm text-gray-400">Rp</span>
                            <input type="number" name="price_amount" id="price_amount"
                                value="{{ old('price_amount', $vehicle->price_amount) }}" min="0"
                                class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300">
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
                                value="{{ old('deposit_amount', $vehicle->deposit_amount) }}" min="0"
                                class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300">
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
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            <option value="Inactive" @selected(old('status', $vehicle->status) == 'Inactive')>Tidak Aktif</option>
                            <option value="Active" @selected(old('status', $vehicle->status) == 'Active')>Aktif</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </section>

                {{-- EDIT RENTAL DAYS --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 12 4.5 4.5 9-9" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Pilih Lama Rental</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Pilih lama hari yang bisa dipilih oleh
                                customer.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach ($days as $day)
                            <label
                                class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 bg-white p-3 transition hover:border-gray-400 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:hover:border-gray-400 dark:hover:bg-gray-700">
                                <input type="checkbox" name="days[]" value="{{ $day->id }}"
                                    @checked(in_array($day->id, old('days', $vehicle->vehicleTime->pluck('id')->toArray())))
                                    class="h-4 w-4 rounded border-gray-300 text-gray-800 focus:ring-gray-800 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-200">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $day->day }}
                                    Hari</span>
                            </label>
                        @endforeach
                    </div>
                    @error('days')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </section>

                {{-- ACTION --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3.5 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('vehicle.index') }}"
                        class="mt-3 flex w-full items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-600">Batal</a>
                </section>
            </div>
        </div>
    </form>
@endsection
