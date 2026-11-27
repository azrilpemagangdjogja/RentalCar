
@extends('layouts.admin')

@section('content')

    {{-- HEADER --}}

    <section class="mb-6">
        <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Kelola Kendaraan</h1>
        <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Kelola informasi penyewaan dan ketersediaan kendaraan Anda.</p>
    </section>

    {{-- VALIDATION ERROR --}}

    @if ($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 dark:border-red-900/50 dark:bg-red-950/30">
            <div class="flex gap-3">
                <svg class="h-5 w-5 shrink-0 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v3.75m0 3.75h.007v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z"/>
                </svg>
                <div class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid gap-6 md:grid-cols-3">

            {{-- MAIN CONTENT --}}

            <div class="space-y-6 md:col-span-2">

                {{-- VEHICLE PROFILE --}}

                <section class="overflow-hidden rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="font-semibold text-gray-800 dark:text-white">Foto Kendaraan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola foto utama yang ditampilkan kepada customer.</p>
                    </div>
                    <div class="flex flex-col gap-5 p-5 sm:flex-row sm:items-center sm:p-6">
                        <img src="{{ asset('storage/' . $vehicle->profile) }}" alt="Foto kendaraan" class="h-40 w-full rounded-xl object-cover sm:w-56">
                        <div class="min-w-0 flex-1">
                            <label for="profile" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Ganti Foto Kendaraan</label>
                            <input type="file" name="profile" id="profile" accept="image/*"
                                class="w-full rounded-xl border border-gray-200 bg-white text-sm text-gray-600 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-600 dark:file:text-white">
                            @error('profile')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-400">Pilih foto kendaraan yang jelas dan berkualitas baik.</p>
                        </div>
                    </div>
                </section>

                {{-- VEHICLE INFORMATION --}}

                <section class="mb-6 rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="font-semibold text-gray-800 dark:text-white">Data Kendaraan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi identitas kendaraan yang telah didaftarkan dan diverifikasi.</p>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center">
                            <div class="flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                                <img src="{{ asset('storage/' . $vehicle->profile) }}" alt="Kendaraan" class="h-full w-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $vehicle->plate_number }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-5 sm:grid-cols-3">
                            <div>
                                <p class="text-xs text-gray-400 dark:text-gray-500">Tipe Kendaraan</p>
                                <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->type->name }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 dark:text-gray-500">Merek</p>
                                <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->brand }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 dark:text-gray-500">Model</p>
                                <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->model }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 dark:text-gray-500">Nomor Polisi</p>
                                <p class="mt-1 text-sm font-medium uppercase text-gray-700 dark:text-gray-200">{{ $vehicle->plate_number }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 dark:text-gray-500">Tahun</p>
                                <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->year }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 dark:text-gray-500">Warna</p>
                                <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->color }}</p>
                            </div>
                        </div>
                        <div class="mt-6 border-t border-gray-100 pt-5 dark:border-gray-600">
                            <p class="text-xs text-gray-400 dark:text-gray-500">Deskripsi Kendaraan</p>
                            <textarea name="description" rows="3"
                                class="mt-2 w-full resize-none rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200"
                                placeholder="Tambahkan deskripsi kendaraan">{{ old('description', $vehicle->description) }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-400">Deskripsi dapat diperbarui sesuai kondisi kendaraan saat ini.</p>
                        </div>
                    </div>
                </section>

                {{-- VEHICLE SPECIFICATION --}}

                <section class="rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="font-semibold text-gray-800 dark:text-white">Spesifikasi Kendaraan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Detail teknis kendaraan yang telah diverifikasi.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-5 p-5 sm:grid-cols-3 sm:p-6">
                        <div>
                            <p class="text-xs text-gray-400 dark:text-gray-500">Bahan Bakar</p>
                            <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->fuel_type }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 dark:text-gray-500">Transmisi</p>
                            <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->transmission->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 dark:text-gray-500">Kapasitas Mesin</p>
                            <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->engine_capacity }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 dark:text-gray-500">Jumlah Kursi</p>
                            <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->seats }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 dark:text-gray-500">Pemilik Kendaraan</p>
                            <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->owner_id }}</p>
                        </div>
                    </div>
                </section>

                {{-- VEHICLE DOCUMENTS --}}

                <section class="rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="font-semibold text-gray-800 dark:text-white">Dokumen Kendaraan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Dokumentasi kendaraan yang telah diserahkan saat pendaftaran.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 p-5 sm:grid-cols-3 sm:p-6">
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Depan</p>
                            @if ($vehicle->vehicleDocument?->front_photo)
                                <img src="{{ Storage::url($vehicle->vehicleDocument->front_photo) }}" alt="Foto depan" class="aspect-video w-full rounded-xl object-cover">
                            @else
                                <div class="flex aspect-video items-center justify-center rounded-xl bg-gray-100 text-sm text-gray-400 dark:bg-gray-600 dark:text-gray-300">Belum tersedia</div>
                            @endif
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Kiri</p>
                            @if ($vehicle->vehicleDocument?->left_photo)
                                <img src="{{ Storage::url($vehicle->vehicleDocument->left_photo) }}" alt="Foto kiri" class="aspect-video w-full rounded-xl object-cover">
                            @else
                                <div class="flex aspect-video items-center justify-center rounded-xl bg-gray-100 text-sm text-gray-400 dark:bg-gray-600 dark:text-gray-300">Belum tersedia</div>
                            @endif
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Kanan</p>
                            @if ($vehicle->vehicleDocument?->right_photo)
                                <img src="{{ Storage::url($vehicle->vehicleDocument->right_photo) }}" alt="Foto kanan" class="aspect-video w-full rounded-xl object-cover">
                            @else
                                <div class="flex aspect-video items-center justify-center rounded-xl bg-gray-100 text-sm text-gray-400 dark:bg-gray-600 dark:text-gray-300">Belum tersedia</div>
                            @endif
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Belakang</p>
                            @if ($vehicle->vehicleDocument?->back_photo)
                                <img src="{{ Storage::url($vehicle->vehicleDocument->back_photo) }}" alt="Foto belakang" class="aspect-video w-full rounded-xl object-cover">
                            @else
                                <div class="flex aspect-video items-center justify-center rounded-xl bg-gray-100 text-sm text-gray-400 dark:bg-gray-600 dark:text-gray-300">Belum tersedia</div>
                            @endif
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Odometer</p>
                            @if ($vehicle->vehicleDocument?->odometer_photo)
                                <img src="{{ Storage::url($vehicle->vehicleDocument->odometer_photo) }}" alt="Foto odometer" class="aspect-video w-full rounded-xl object-cover">
                            @else
                                <div class="flex aspect-video items-center justify-center rounded-xl bg-gray-100 text-sm text-gray-400 dark:bg-gray-600 dark:text-gray-300">Belum tersedia</div>
                            @endif
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Foto Selfie</p>
                            @if ($vehicle->vehicleDocument?->selfie_photo)
                                <img src="{{ Storage::url($vehicle->vehicleDocument->selfie_photo) }}" alt="Foto selfie" class="aspect-video w-full rounded-xl object-cover">
                            @else
                                <div class="flex aspect-video items-center justify-center rounded-xl bg-gray-100 text-sm text-gray-400 dark:bg-gray-600 dark:text-gray-300">Belum tersedia</div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>

            {{-- SIDE SETTINGS --}}

            <div class="space-y-6 md:col-span-1">

                {{-- RENTAL SETTINGS --}}

                <section class="rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="font-semibold text-gray-800 dark:text-white">Pengaturan Rental</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola harga dan ketersediaan kendaraan.</p>
                    </div>
                    <div class="space-y-5 p-5 sm:p-6">

                        {{-- PRICE --}}

                        <div>
                            <label for="price_amount" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Sewa per Hari</label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm text-gray-400">Rp</span>
                                <input type="number" name="price_amount" id="price_amount" value="{{ old('price_amount', $vehicle->price_amount) }}" min="0"
                                    class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300">
                            </div>
                            @error('price_amount')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- DEPOSIT --}}

                        <div>
                            <label for="deposit_amount" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deposit</label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm text-gray-400">Rp</span>
                                <input type="number" name="deposit_amount" id="deposit_amount" value="{{ old('deposit_amount', $vehicle->deposit_amount) }}" min="0"
                                    class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300">
                            </div>
                            @error('deposit_amount')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            @if (session('lessdeposit'))
                                <p class="mt-2 text-sm text-red-500">{{ session('lessdeposit') }}</p>
                            @endif
                        </div>

                        {{-- STATUS --}}

                        <div>
                            <label for="status" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Status Kendaraan</label>
                            <select name="status" id="status"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                                <option value="Inactive" @selected(old('status', $vehicle->status) == 'Inactive')>Tidak Aktif</option>
                                <option value="Active" @selected(old('status', $vehicle->status) == 'Active')>Aktif</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </section>

                {{-- RENTAL DAYS --}}

                <section class="rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="font-semibold text-gray-800 dark:text-white">Lama Rental</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tentukan pilihan durasi sewa yang tersedia bagi customer.</p>
                    </div>
                    <div class="space-y-3 p-5 sm:p-6">
                        @foreach ($days as $day)
                            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 p-3 transition hover:border-gray-400 hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-800">
                                <input type="checkbox" name="days[]" value="{{ $day->id }}"
                                    @checked(in_array($day->id, old('days', $vehicle->vehicleTime->pluck('id')->toArray())))
                                    class="h-4 w-4 rounded border-gray-300 text-gray-800 focus:ring-gray-800 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-200">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $day->day }} Hari</span>
                            </label>
                        @endforeach
                        @error('days')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </section>

                {{-- PICKUP LOCATION --}}

                @if ($vehicle->pickupLocation)
                    <section class="overflow-hidden rounded-2xl bg-white dark:border dark:border-gray-600 dark:bg-gray-700">
                        <div class="p-5 sm:p-6">
                            <h2 class="font-semibold text-gray-800 dark:text-white">Lokasi Pengambilan</h2>
                            <p class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $vehicle->pickupLocation->name }}</p>
                            <p class="mt-1 text-sm leading-5 text-gray-500 dark:text-gray-300">{{ $vehicle->pickupLocation->address }}</p>
                        </div>
                        <div class="h-64 w-full bg-gray-100 dark:bg-gray-600">
                            <iframe
                                src="https://www.google.com/maps?q={{ $vehicle->pickupLocation->latitude }},{{ $vehicle->pickupLocation->longitude }}&output=embed"
                                class="h-full w-full border-0" loading="lazy" allowfullscreen>
                            </iframe>
                        </div>
                    </section>
                @endif

                {{-- ACTION --}}

                <section class="rounded-2xl bg-white p-5 dark:border dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m4.5 12.75 6 6 9-13.5"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('vehicle.index') }}" class="mt-3 flex w-full items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-600">
                        Batal
                    </a>
                </section>
            </div>
        </div>
    </form>
@endsection
