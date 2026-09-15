@extends('layouts.admin')

@section('content')
    <section class="w-full">


        {{-- HEADER --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="md:flex hidden items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Pickup Location</span>
                </div>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Kelola Pickup Locations
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Kelola lokasi pengambilan kendaraan yang tersedia pada sistem.
                </p>
            </div>

            <a href="{{ route('pickup-location.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                </svg>
                Tambah Lokasi
            </a>
        </div>

        {{-- STATISTICS --}}

        <div class="mt-8 hidden md:grid grid-cols-2 gap-3 sm:grid-cols-4 sm:gap-3">

            {{-- TOTAL --}}

            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Lokasi</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $pickupLocations->count() }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 13a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- ACTIVE --}}

            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Aktif</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $pickupLocations->where('status', 'Active')->count() }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- INACTIVE --}}

            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Tidak Aktif</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $pickupLocations->where('status', 'Inactive')->count() }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- VEHICLES --}}

            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Kendaraan</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $pickupLocations->sum(fn($location) => $location->vehicles_count ?? 0) }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5M6.75 18h.008v.008H6.75V18ZM17.25 18h.008v.008h-.008V18Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- PICKUP LOCATION LIST --}}

        <div class="mt-8">

            {{-- LIST HEADER --}}

            <div class="mb-4 md:flex hidden flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white">Daftar Pickup Locations</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Kelola seluruh lokasi pengambilan kendaraan yang terdaftar.
                    </p>
                </div>
                <span class="text-xs text-gray-400 dark:text-gray-500">
                    {{ $pickupLocations->count() }} lokasi
                </span>
            </div>

            {{-- SEARCH & FILTER --}}

            <div class="mb-4 flex flex-col gap-3 sm:flex-row">
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Cari nama lokasi, alamat, atau pembuat..."
                        class="w-full rounded-xl border border-gray-100 bg-white py-3.5 pl-12 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
                </div>

                <select
                    class="rounded-xl border border-gray-100 bg-white px-4 py-3.5 text-sm text-gray-700 outline-none transition focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:focus:border-gray-300">
                    <option>Semua Status</option>
                    <option value="Active">Aktif</option>
                    <option value="Inactive">Tidak Aktif</option>
                </select>
            </div>

            {{-- LOCATION LIST --}}

            <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">

                {{-- DESKTOP HEADER --}}

                <div
                    class="hidden grid-cols-[minmax(20rem,2fr)_minmax(12rem,1.2fr)_6rem_6rem_7rem_7rem] items-center gap-5 border-b border-gray-100 px-5 py-3 dark:border-gray-600 sm:grid">
                    <div class="text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Lokasi
                    </div>
                    <div class="text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Dibuat
                        Oleh</div>
                    <div class="text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                        Kendaraan</div>
                    <div class="text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                        Kapasitas</div>
                    <div class="text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Status
                    </div>
                    <div
                        class="text-right text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                        Aksi</div>
                </div>

                @forelse ($pickupLocations as $location)
                    {{-- LOCATION ROW --}}

                    <div
                        class="border-b border-gray-100 p-4 transition last:border-b-0 hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-600 sm:grid sm:grid-cols-[minmax(20rem,2fr)_minmax(12rem,1.2fr)_6rem_6rem_7rem_7rem] sm:items-center sm:gap-5 sm:px-5">

                        {{-- LOCATION --}}

                        <div class="flex min-w-0 items-center gap-3">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 13a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $location->name }}</h3>
                                <p class="truncate text-xs text-gray-500 dark:text-gray-400">{{ $location->address }}</p>
                            </div>
                        </div>

                        {{-- CREATED BY --}}

                        <div class="mt-4 sm:mt-0">
                            <p class="mb-1 text-[10px] font-medium text-gray-400 dark:text-gray-500 sm:hidden">Dibuat Oleh
                            </p>
                            <div class="flex min-w-0 items-center gap-2">
                                <div
                                    class="flex h-7 w-7 shrink-0 items-center justify-center overflow-hidden rounded-full bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                    @if ($location->owner?->profile)
                                        <img src="{{ asset('storage/' . $location->owner->profile) }}"
                                            alt="{{ $location->owner->name }}" class="h-full w-full object-cover">
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                        </svg>
                                    @endif
                                </div>
                                <p class="truncate text-sm text-gray-600 dark:text-gray-300">
                                    {{ $location->owner->name ?? 'Tidak diketahui' }}</p>
                            </div>
                        </div>

                        {{-- VEHICLES --}}

                        <div class="mt-3 sm:mt-0">
                            <p class="mb-1 text-[10px] font-medium text-gray-400 dark:text-gray-500 sm:hidden">Kendaraan
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $location->vehicles->count() ?? 0 }}</p>
                        </div>

                        {{-- CAPACITY --}}

                        <div class="mt-3 sm:mt-0">
                            <p class="mb-1 text-[10px] font-medium text-gray-400 dark:text-gray-500 sm:hidden">Kapasitas
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $location->max_vehicle ?: '-' }}</p>
                        </div>

                        {{-- STATUS --}}

                        <div class="mt-3 sm:mt-0">
                            <p class="mb-1 text-[10px] font-medium text-gray-400 dark:text-gray-500 sm:hidden">Status</p>
                            @if ($location->status == 'Active')
                                <span
                                    class="inline-flex rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-white dark:text-gray-800">Aktif</span>
                            @else
                                <span
                                    class="inline-flex rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-800 dark:bg-gray-600 dark:text-gray-200">Tidak
                                    Aktif</span>
                            @endif
                        </div>

                        {{-- ACTION --}}

                        <div
                            class="mt-4 flex items-center justify-end border-t border-gray-100 pt-3 dark:border-gray-600 sm:mt-0 sm:border-0 sm:pt-0">
                            <a href="{{ route('pickup-location.show', $location->id) }}"
                                class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600"
                                title="Lihat detail">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                            <a href="{{ route('pickup-location.edit', $location->id) }}"
                                class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600"
                                title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L11.25 15.403l-4.5 1.5 1.5-4.5 9.612-9.916Z" />
                                </svg>
                            </a>
                            <button type="button"
                                class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600"
                                title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21.75H8.084a2.25 2.25 0 0 1-2.244-2.077L4.77 5.79m14.458 0a48.108 48.108 0 0 0-3.478-.397m-10.507 0a48.108 48.108 0 0 1 3.478-.397m0 0V4.125c0-.621.504-1.125 1.125-1.125h3.308c.621 0 1.125.504 1.125 1.125V5.393" />
                                </svg>
                            </button>
                        </div>
                    </div>

                @empty

                    <div class="px-6 py-12 text-center">
                        <div
                            class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21s7-4.35 7-10a7 7 0 1 0-14 0c0 5.65 7 10 7 10Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 13a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            </svg>
                        </div>
                        <h3 class="mt-3 text-sm font-semibold text-gray-800 dark:text-white">Belum ada pickup location</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Belum ada lokasi pengambilan kendaraan
                            yang terdaftar.</p>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}

            @if (method_exists($pickupLocations, 'links'))
                <div class="mt-6">
                    {{ $pickupLocations->links() }}
                </div>
            @endif

            {{-- <div class="mt-5 flex items-center justify-between">
                <p class="text-xs text-gray-400 dark:text-gray-500">
                    Menampilkan {{ $pickupLocations->count() }} lokasi
                </p>

                <div class="flex items-center gap-2">
                    <button type="button"
                        class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-100 text-gray-400 dark:border-gray-600 dark:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m15 19-7-7 7-7" />
                        </svg>
                    </button>
                    <span class="text-xs font-medium text-gray-600 dark:text-gray-300">Halaman 1</span>
                    <button type="button"
                        class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-100 text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
