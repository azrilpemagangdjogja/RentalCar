@extends('layouts.admin')
@section('content')

    {{-- HEADER --}}

    <section class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
            <a href="{{ route('vehicle.index') }}" class="transition hover:text-gray-700 dark:hover:text-gray-200">Kendaraan</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
            </svg>
            <span>{{ $vehicle->brand }} {{ $vehicle->model }}</span>
        </div>
        <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Detail Kendaraan</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi lengkap mengenai kendaraan yang tersimpan di sistem.</p>
    </section>

    {{-- VEHICLE HEADER --}}

    <section class="mb-6 overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
        <div class="p-5 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div class="flex h-24 w-24 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600 sm:h-28 sm:w-28">
                    @if ($vehicle->profile)
                        <img src="{{ asset('storage/' . $vehicle->profile) }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="h-full w-full object-cover">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="h-10 w-10 text-gray-400 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5M6.75 18h.008v.008H6.75V18ZM17.25 18h.008v.008h-.008V18Z" />
                        </svg>
                    @endif
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                        <h2 class="truncate text-xl font-bold text-gray-800 dark:text-white sm:text-2xl">
                            {{ $vehicle->brand }} {{ $vehicle->model }}
                        </h2>

                        <span class="inline-flex w-fit rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                            {{ $vehicle->type?->name ?? '-' }}
                        </span>
                    </div>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        {{ $vehicle->plate_number }} · {{ $vehicle->year }}
                    </p>

                    <div class="mt-3 flex flex-wrap items-center gap-2">
                        @if ($vehicle->status === 'Active')
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                                <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                Tidak Aktif
                            </span>
                        @endif

                        @if ($vehicle->pickupLocation)
                            <span class="inline-flex items-center gap-1.5 text-xs text-gray-500 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                {{ $vehicle->pickupLocation->name }}
                            </span>
                        @else
                            <span class="text-xs text-gray-400 dark:text-gray-500">Belum ditempatkan</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- MAIN CONTENT --}}

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- LEFT CONTENT --}}

        <div class="space-y-6 lg:col-span-2">

            {{-- BASIC INFORMATION --}}

            <section class="rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Kendaraan</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Informasi dasar kendaraan yang tersimpan.</p>
                </div>

                <div class="grid grid-cols-2 gap-x-8 gap-y-5 p-5 sm:grid-cols-2 sm:p-6">
                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Merek</p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->brand }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Model</p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->model }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Nomor Plat</p>
                        <p class="mt-1 text-sm font-medium uppercase text-gray-800 dark:text-white">{{ $vehicle->plate_number }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Tipe Kendaraan</p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->type?->name ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Tahun</p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->year }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Warna</p>
                        <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">{{ $vehicle->color ?? '-' }}</p>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Deskripsi</p>
                        <p class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-300">{{ $vehicle->description ?: '-' }}</p>
                    </div>
                </div>
            </section>

            {{-- SPECIFICATION --}}

            <section class="rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.06c.09-.542.56-.94 1.11-.94h2.592c.55 0 1.02.398 1.11.94l.213 1.281a8.966 8.966 0 0 1 1.49.87l1.202-.401a1.125 1.125 0 0 1 1.367.518l1.296 2.245c.275.478.14 1.086-.306 1.4l-.99.693c.055.5.055 1.005 0 1.505l.99.693c.446.313.58.922.306 1.4l-1.296 2.245a1.125 1.125 0 0 1-1.367.518l-1.202-.401a8.966 8.966 0 0 1-1.49.87l-.213 1.281c-.09.542-.56.94-1.11.94h-2.592c-.55 0-1.02-.398-1.11-.94l-.213-1.281a8.966 8.966 0 0 1-1.49-.87l-1.202.401a1.125 1.125 0 0 1-1.367-.518l-1.296-2.245a1.125 1.125 0 0 1 .306-1.4l.99-.693a8.966 8.966 0 0 1 0-1.505l-.99-.693a1.125 1.125 0 0 1-.306-1.4l1.296-2.245a1.125 1.125 0 0 1 1.367-.518l1.202.401a8.966 8.966 0 0 1 1.49-.87l.213-1.281Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Spesifikasi</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Detail teknis kendaraan.</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-6">
                    <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Jenis Bahan Bakar</p>
                        <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicle->fuel_type ?? '-' }}</p>
                    </div>

                    <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Transmisi</p>
                        <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicle->transmission ?? '-' }}</p>
                    </div>

                    <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Kapasitas Mesin</p>
                        <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicle->engine_capacity ?? '-' }}</p>
                    </div>

                    <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Jumlah Kursi</p>
                        <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicle->seats ?? '-' }}</p>
                    </div>
                </div>
            </section>

            {{-- PICKUP LOCATION --}}

            <section class="rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Pickup Location</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lokasi kendaraan ditempatkan.</p>
                        </div>
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    @if ($vehicle->pickupLocation)
                        <div class="flex items-start gap-4 rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs text-gray-400 dark:text-gray-500">Ditempatkan pada</p>
                                <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-white">{{ $vehicle->pickupLocation->name }}</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">{{ $vehicle->pickupLocation->address }}</p>
                            </div>
                        </div>
                    @else
                        <div class="rounded-xl bg-gray-50 p-5 dark:bg-gray-800">
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Belum ditempatkan pada pickup location</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">Kendaraan ini belum memiliki pickup location.</p>
                        </div>
                    @endif
                </div>
            </section>
        </div>

        {{-- RIGHT SIDEBAR --}}

        <div class="space-y-6">

            {{-- RENTAL INFORMATION --}}

            <section class="rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Rental</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Pengaturan kendaraan untuk disewakan.</p>
                </div>

                <div class="space-y-4 p-5">
                    <div class="flex items-center justify-between gap-4">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Status</span>
                        @if ($vehicle->status === 'Active')
                            <span class="rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">Aktif</span>
                        @else
                            <span class="rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-300">Tidak Aktif</span>
                        @endif
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Deposit</span>
                        <span class="text-sm font-semibold text-gray-800 dark:text-white">
                            {{ $vehicle->deposit_amount !== null ? 'Rp ' . number_format($vehicle->deposit_amount, 0, ',', '.') : '-' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <span class="text-sm text-gray-500 dark:text-gray-400">ID Kendaraan</span>
                        <span class="text-sm font-medium text-gray-800 dark:text-white">#{{ $vehicle->id }}</span>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Ditambahkan</span>
                        <span class="text-right text-xs text-gray-500 dark:text-gray-400">{{ $vehicle->created_at?->format('d M Y, H:i') ?? '-' }}</span>
                    </div>
                </div>
            </section>

            {{-- QUICK ACTION --}}

            <section class="rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">Aksi Kendaraan</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola informasi kendaraan ini.</p>
                </div>

                <div class="space-y-2 p-5">
                    <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487 18.75 6.375m-1.888-1.888L8.25 13.5l-.75 3 3-.75 8.612-8.613a1.5 1.5 0 0 0 0-2.121Z" />
                        </svg>
                        Edit kendaraan
                    </a>

                    <button type="button" class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-3 3 3 3-3m-9-6h12" />
                        </svg>
                        {{ $vehicle->status === 'Active' ? 'Nonaktifkan kendaraan' : 'Aktifkan kendaraan' }}
                    </button>

                    @if ($vehicle->pickupLocation)
                        <button type="button" class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                            Lepaskan dari pickup location
                        </button>
                    @endif

                    <button type="button" class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-red-600 transition hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 9.75v9.75A2.25 2.25 0 0 1 16.5 21h-9a2.25 2.25 0 0 1-2.25-2.25V9.75m13.5 0H4.5m12 0 1.5-3h-3.75m-6 3-1.5-3H10.5m-3 0h9" />
                        </svg>
                        Hapus kendaraan
                    </button>
                </div>
            </section>

            {{-- SYSTEM INFORMATION --}}

            <section class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-800">
                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25h1.5v4.5h-1.5v-4.5Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                    </svg>
                    <div>
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-300">Informasi sistem</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">Data kendaraan berasal dari informasi yang tersimpan pada sistem rental.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection