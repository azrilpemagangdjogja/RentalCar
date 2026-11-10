@extends('layouts.admin')

@section('content')
    <section class="w-full">

        <section class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        {{ $vehicle->brand }} {{ $vehicle->model }}</h1>
                    <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">Kelola kendaraan dan lokasi
                        penempatannya dengan mudah.</p>
                </div>
                <a href="{{ url()->previous() }}"
                    class="flex w-full items-center justify-center rounded-xl bg-gray-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                    Kembali
                </a>
            </div>
        </section>

        {{-- FOTO KENDARAAN --}}

        <section class="mb-6 grid grid-cols-2 gap-2 sm:grid-cols-4">
            <div
                class="col-span-2 row-span-2 h-64 overflow-hidden rounded-2xl border border-gray-100 bg-gray-100 dark:border-gray-600 dark:bg-gray-700 sm:h-[420px]">
                @if ($vehicle->vehicleDocument?->front_photo)
                    <img src="{{ asset('storage/' . $vehicle->vehicleDocument->front_photo) }}"
                        alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center text-sm text-gray-400 dark:text-gray-500">Foto belum
                        tersedia</div>
                @endif
            </div>
            <div
                class="h-32 overflow-hidden rounded-2xl border border-gray-100 bg-gray-100 dark:border-gray-600 dark:bg-gray-700 sm:h-[207px]">
                @if ($vehicle->vehicleDocument?->back_photo)
                    <img src="{{ asset('storage/' . $vehicle->vehicleDocument->back_photo) }}"
                        alt="Bagian belakang {{ $vehicle->brand }} {{ $vehicle->model }}"
                        class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center text-xs text-gray-400 dark:text-gray-500">Tidak
                        tersedia</div>
                @endif
            </div>
            <div
                class="h-32 overflow-hidden rounded-2xl border border-gray-100 bg-gray-100 dark:border-gray-600 dark:bg-gray-700 sm:h-[207px]">
                @if ($vehicle->vehicleDocument?->left_photo)
                    <img src="{{ asset('storage/' . $vehicle->vehicleDocument->left_photo) }}"
                        alt="Sisi kiri {{ $vehicle->brand }} {{ $vehicle->model }}" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center text-xs text-gray-400 dark:text-gray-500">Tidak
                        tersedia</div>
                @endif
            </div>
            <div
                class="h-32 overflow-hidden rounded-2xl border border-gray-100 bg-gray-100 dark:border-gray-600 dark:bg-gray-700 sm:h-[207px]">
                @if ($vehicle->vehicleDocument?->right_photo)
                    <img src="{{ asset('storage/' . $vehicle->vehicleDocument->right_photo) }}"
                        alt="Sisi kanan {{ $vehicle->brand }} {{ $vehicle->model }}" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center text-xs text-gray-400 dark:text-gray-500">Tidak
                        tersedia</div>
                @endif
            </div>
            <div
                class="h-32 overflow-hidden rounded-2xl border border-gray-100 bg-gray-100 dark:border-gray-600 dark:bg-gray-700 sm:h-[207px]">
                @if ($vehicle->profile)
                    <img src="{{ asset('storage/' . $vehicle->profile) }}"
                        alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="h-full w-full object-cover">
                @elseif ($vehicle->vehicleDocument?->odometer_photo)
                    <img src="{{ asset('storage/' . $vehicle->vehicleDocument->odometer_photo) }}"
                        alt="Dokumentasi kendaraan" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center text-xs text-gray-400 dark:text-gray-500">Tidak
                        tersedia</div>
                @endif
            </div>
        </section>

        {{-- INFORMASI UTAMA --}}

        <section class="mb-6 rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <div class="mb-2 flex flex-wrap items-center gap-2">
                        <span
                            class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-200">{{ $vehicle->type->name }}</span>
                        @if ($vehicle->status == 'Active')
                            <span
                                class="rounded-full bg-gray-700 px-3 py-1 text-xs font-medium text-white dark:bg-white dark:text-gray-800">Aktif</span>
                        @else
                            <span
                                class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-500 dark:bg-gray-800 dark:text-gray-300">{{ $vehicle->status }}</span>
                        @endif
                    </div>
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 sm:text-3xl">{{ $vehicle->brand }}
                        {{ $vehicle->model }}</h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        {{ $vehicle->description ?: 'Tidak ada deskripsi kendaraan.' }}</p>
                </div>
                <div class="shrink-0 rounded-2xl bg-gray-50 px-5 py-4 dark:bg-gray-600">
                    <p class="text-xs text-gray-500 dark:text-gray-300">Deposit</p>
                    <p class="mt-1 text-lg font-semibold text-gray-800 dark:text-gray-100">Rp
                        {{ number_format($vehicle->deposit_amount, 0, ',', '.') }}</p>
                </div>
            </div>
        </section>

        {{-- DETAIL KENDARAAN --}}

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="space-y-6 lg:col-span-2">

                {{-- SPESIFIKASI --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-5">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Spesifikasi</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi teknis kendaraan.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600">
                            <p class="text-xs text-gray-500 dark:text-gray-300">Tahun</p>
                            <p class="mt-1 font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->year }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600">
                            <p class="text-xs text-gray-500 dark:text-gray-300">Warna</p>
                            <p class="mt-1 font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->color }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600">
                            <p class="text-xs text-gray-500 dark:text-gray-300">Nomor Polisi</p>
                            <p class="mt-1 font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->plate_number }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600">
                            <p class="text-xs text-gray-500 dark:text-gray-300">Transmisi</p>
                            <p class="mt-1 font-medium text-gray-700 dark:text-gray-100">
                                {{ $vehicle->transmission->name ?: '-' }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600">
                            <p class="text-xs text-gray-500 dark:text-gray-300">Bahan Bakar</p>
                            <p class="mt-1 font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->fuel_type ?: '-' }}
                            </p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600">
                            <p class="text-xs text-gray-500 dark:text-gray-300">Kapasitas Mesin</p>
                            <p class="mt-1 font-medium text-gray-700 dark:text-gray-100">
                                {{ $vehicle->engine_capacity ?: '-' }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-600">
                            <p class="text-xs text-gray-500 dark:text-gray-300">Jumlah Kursi</p>
                            <p class="mt-1 font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->seats ?: '-' }} kursi
                            </p>
                        </div>
                    </div>
                </section>

                {{-- TENTANG KENDARAAN --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Tentang Kendaraan</h2>
                    <p class="mt-3 text-sm leading-6 text-gray-500 dark:text-gray-300">
                        {{ $vehicle->description ?: 'Belum ada informasi tambahan mengenai kendaraan ini.' }}</p>
                </section>

                {{-- LOKASI PENGAMBILAN --}}

                <section
                    class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="p-5 sm:p-6">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Lokasi Pengambilan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $vehicle->pickupLocation->name }}</p>
                        <p class="mt-2 text-sm leading-5 text-gray-500 dark:text-gray-300">
                            {{ $vehicle->pickupLocation->address }}</p>
                    </div>
                    <div class="h-64 w-full bg-gray-100 dark:bg-gray-600 sm:h-80">
                        <iframe
                            src="https://www.google.com/maps?q={{ $vehicle->pickupLocation->latitude }},{{ $vehicle->pickupLocation->longitude }}&output=embed"
                            class="h-full w-full border-0" loading="lazy" allowfullscreen>
                        </iframe>
                    </div>
                </section>
            </div>

            <div class="space-y-6">

                {{-- RINGKASAN --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Ringkasan Kendaraan</h2>
                    <div class="mt-5 space-y-4">
                        <div
                            class="flex items-center justify-between gap-4 border-b border-gray-100 pb-4 dark:border-gray-600">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Jenis</span>
                            <span
                                class="text-right text-sm font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->type->name }}</span>
                        </div>
                        <div
                            class="flex items-center justify-between gap-4 border-b border-gray-100 pb-4 dark:border-gray-600">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Tahun</span>
                            <span
                                class="text-right text-sm font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->year }}</span>
                        </div>
                        <div
                            class="flex items-center justify-between gap-4 border-b border-gray-100 pb-4 dark:border-gray-600">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Warna</span>
                            <span
                                class="text-right text-sm font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->color }}</span>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Kursi</span>
                            <span
                                class="text-right text-sm font-medium text-gray-700 dark:text-gray-100">{{ $vehicle->seats ?: '-' }}
                                kursi</span>
                        </div>
                    </div>
                </section>

                {{-- DOKUMENTASI --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Dokumentasi</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Foto tambahan kendaraan.</p>
                    @if ($vehicle->vehicleDocument?->selfie_photo)
                        <div class="mt-4 overflow-hidden rounded-2xl">
                            <img src="{{ asset('storage/' . $vehicle->vehicleDocument->selfie_photo) }}"
                                alt="Selfie {{ $vehicle->brand }} {{ $vehicle->model }}"
                                class="h-48 w-full object-cover">
                        </div>
                    @else
                        <div
                            class="mt-4 flex h-48 items-center justify-center rounded-2xl bg-gray-50 text-sm text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                            Dokumentasi belum tersedia</div>
                    @endif
                </section>

                {{-- PEMILIK KENDARAAN --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Pemilik Kendaraan</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi pemilik kendaraan.</p>
                    <div class="mt-5 mb-3 pb-3 border-b border-gray-200 dark:border-gray-600 flex items-center gap-4">
                        <div class="h-12 w-12 shrink-0 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                            @if ($vehicle->owner?->profile)
                                <img src="{{ asset('storage/' . $vehicle->owner->profile) }}"
                                    alt="{{ $vehicle->owner->name }}" class="h-full w-full object-cover">
                            @else
                                <div
                                    class="flex h-full w-full items-center justify-center text-gray-400 dark:text-gray-300">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="min-w-0">
                            <p class="truncate font-medium text-gray-700 dark:text-gray-100">
                                {{ $vehicle->owner?->name ?? 'Tidak diketahui' }}</p>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                {{ $vehicle->owner?->email ?? 'Tidak diketahui' }}</p>
                        </div>
                    </div>
                    <a href="{{ route('profile.show', $vehicle->owner->id) }}"
                        class="flex w-full items-center justify-center rounded-xl bg-gray-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                        Lihat Profil Pemilik
                    </a>
                </section>
            </div>
        </div>
    </section>
@endsection
