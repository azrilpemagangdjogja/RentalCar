@extends('layouts.admin')
@section('content')
    <section class="w-full">
        
        {{-- HEADER --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl mt-2 font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Monitoring
                    Kendaraan</h1>
                <p class="hidden sm:block mt-1 text-sm text-gray-500 dark:text-gray-400">Pantau seluruh kendaraan mitra,
                    informasi kendaraan, pemilik, dan status operasional.</p>
            </div>
        </div>
        
        {{-- STATISTICS --}}

        <div class="mt-8 hidden sm:grid grid-cols-2 gap-3 sm:grid-cols-4">
            
            {{-- TOTAL VEHICLES --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Kendaraan</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalVehicle }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.5V18a1.5 1.5 0 0 0 1.5 1.5h1.125a1.5 1.5 0 0 0 1.5-1.5V18h9.75v.0a1.5 1.5 0 0 0 1.5 1.5H19.5A1.5 1.5 0 0 0 21 18v-4.5m-18 0 1.8-5.4A2.25 2.25 0 0 1 6.937 6.75h10.126A2.25 2.25 0 0 1 19.2 8.1L21 13.5m-18 0h18m-14.25 1.5h.008v.008h-.008V15Zm10.5 0h.008v.008h-.008V15Z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            {{-- ACTIVE VEHICLES --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Kendaraan Aktif</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalActiveVehicle }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 4.5 4.5 10.5-10.5" />
                        </svg>
                    </div>
                </div>
            </div>
            
            {{-- PENDING VEHICLES --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Pending</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalPendingVehicle }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2.25m5-2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            {{-- INACTIVE VEHICLES --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Nonaktif</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalInactiveVehicle }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.364 5.636 5.636 18.364m12.728 0L5.636 5.636" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- VEHICLE LIST --}}

        <div class="mt-8">
            
            {{-- SEARCH & FILTER --}}

            <form action="{{ route('vehicle-admin.index') }}" method="GET" class="mb-4 flex flex-col gap-3 sm:flex-row">
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="search" value="{{ request('search') }}"
                        placeholder="Cari brand, model, plat nomor, atau pemilik..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3.5 pl-12 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
                </div>
                <select name="status" onchange="this.form.submit()"
                    class="rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-sm text-gray-700 outline-none transition focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:focus:border-gray-300">
                    <option value="">Semua Status</option>
                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    {{-- <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option> --}}
                    <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <button type="submit"
                    class="hidden sm:inline-flex items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                    Cari
                </button>
            </form>
            
            {{-- VEHICLE LIST --}}

            <div
                class="overflow-hidden rounded-2xl sm:border sm:border-gray-200 sm:bg-white sm:dark:border-gray-600 sm:dark:bg-gray-700">
                
                {{-- DESKTOP HEADER --}}

                <div
                    class="hidden grid-cols-6 items-center gap-5 border-b border-gray-200 px-5 py-3 dark:border-gray-600 sm:grid">
                    <div class="text-[10px] font-semibold uppercase tracking-wider text-gray-400">Kendaraan</div>
                    <div class="text-[10px] font-semibold uppercase tracking-wider text-gray-400">Pemilik</div>
                    <div class="text-[10px] font-semibold uppercase tracking-wider text-gray-400">Lokasi</div>
                    <div class="text-left text-[10px] font-semibold uppercase tracking-wider text-gray-400">Harga</div>
                    <div class="text-center text-[10px] font-semibold uppercase tracking-wider text-gray-400">Status</div>
                    <div class="text-right text-[10px] font-semibold uppercase tracking-wider text-gray-400">Aksi</div>
                </div>
                @forelse ($vehicles as $vehicle)
                    
                {{-- VEHICLE ROW --}}

                    <div
                        class="mb-4 grid grid-cols-1 rounded-2xl border border-gray-200 bg-white p-4 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 sm:mb-0 sm:grid sm:grid-cols-6 sm:items-center sm:gap-5 sm:rounded-none sm:border-0 sm:border-b sm:px-5 sm:shadow-none sm:last:border-b-0">
                        
                        {{-- MOBILE HEADER --}}

                        <div
                            class="flex items-center justify-between border-b border-gray-200 pb-4 dark:border-gray-600 sm:hidden">
                            <div class="flex min-w-0 items-center gap-3">
                                <div
                                    class="flex h-12 w-14 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                    @if ($vehicle->profile)
                                        <img src="{{ asset('storage/' . $vehicle->profile) }}" alt="{{ $vehicle->brand }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 13.5V18a1.5 1.5 0 0 0 1.5 1.5h1.125a1.5 1.5 0 0 0 1.5-1.5V18h9.75v0a1.5 1.5 0 0 0 1.5 1.5H19.5A1.5 1.5 0 0 0 21 18v-4.5m-18 0 1.8-5.4A2.25 2.25 0 0 1 6.937 6.75h10.126A2.25 2.25 0 0 1 19.2 8.1L21 13.5m-18 0h18" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <p class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $vehicle->brand }} {{ $vehicle->model }}</p>
                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                        {{ $vehicle->plate_number }}</p>
                                </div>
                            </div>
                            @if ($vehicle->status == 'Active')
                                <span
                                    class="inline-flex shrink-0 rounded-full bg-white px-2.5 py-1 text-[10px] font-semibold text-gray-800 dark:bg-white dark:text-gray-800">{{ $vehicle->status }}</span>
                            @elseif ($vehicle->status == 'Pending')
                                <span
                                    class="inline-flex shrink-0 rounded-full bg-gray-600 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-600 dark:text-white">{{ $vehicle->status }}</span>
                            @elseif ($vehicle->status == 'Inactive')
                                <span
                                    class="inline-flex shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">{{ $vehicle->status }}</span>
                            @else
                                <span
                                    class="inline-flex shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">{{ $vehicle->status }}</span>
                            @endif
                        </div>
                        
                        {{-- VEHICLE DESKTOP --}}

                        <div class="hidden min-w-0 items-center gap-3 sm:flex">
                            <div
                                class="flex h-11 w-12 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                @if ($vehicle->profile)
                                    <img src="{{ asset('storage/' . $vehicle->profile) }}" alt="{{ $vehicle->brand }}"
                                        class="h-full w-full object-cover">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 13.5V18a1.5 1.5 0 0 0 1.5 1.5h1.125a1.5 1.5 0 0 0 1.5-1.5V18h9.75v0a1.5 1.5 0 0 0 1.5 1.5H19.5A1.5 1.5 0 0 0 21 18v-4.5m-18 0 1.8-5.4A2.25 2.25 0 0 1 6.937 6.75h10.126A2.25 2.25 0 0 1 19.2 8.1L21 13.5m-18 0h18" />
                                    </svg>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <p class="truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $vehicle->brand }} {{ $vehicle->model }}</p>
                                <p class="mt-0.5 truncate text-xs text-gray-500 dark:text-gray-400">
                                    {{ $vehicle->plate_number }}</p>
                            </div>
                        </div>
                        
                        {{-- OWNER --}}

                        <div class="mt-4 min-w-0 sm:mt-0">
                            <p class="mb-1 text-[10px] font-medium text-gray-400 sm:hidden">Pemilik</p>
                            <p class="truncate text-sm text-gray-700 dark:text-gray-200">
                                {{ $vehicle->owner->name ?? 'Tidak diketahui' }}</p>
                            <p class="mt-0.5 truncate text-xs text-gray-400">ID: {{ $vehicle->owner_id }}</p>
                        </div>
                        
                        {{-- LOCATION --}}

                        <div class="mt-3 min-w-0 sm:mt-0">
                            <p class="mb-1 text-[10px] font-medium text-gray-400 sm:hidden">Lokasi</p>
                            <p class="truncate text-sm text-gray-600 dark:text-gray-300">{{ $vehicle->location ?? '-' }}
                            </p>
                        </div>
                        
                        {{-- PRICE --}}

                        <div class="mt-3 sm:mt-0">
                            <p class="mb-1 text-[10px] font-medium text-gray-400 sm:hidden">Harga Rental</p>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                Rp{{ number_format($vehicle->price_amount, 0, ',', '.') }}</p>
                            <p class="mt-0.5 text-xs text-gray-400">Deposit:
                                Rp{{ number_format($vehicle->deposit_amount, 0, ',', '.') }}</p>
                        </div>
                        
                        {{-- STATUS DESKTOP --}}

                        <div class="mt-3 hidden justify-center sm:flex">
                            @if ($vehicle->status == 'Active')
                                <span
                                    class="inline-flex rounded-full bg-gray-700 px-3 py-1.5 text-xs font-semibold text-white dark:bg-white dark:text-gray-800">{{ $vehicle->status }}</span>
                            @elseif ($vehicle->status == 'Pending')
                                <span
                                    class="inline-flex rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-800 dark:bg-gray-600 dark:text-white">{{ $vehicle->status }}</span>
                            @elseif ($vehicle->status == 'Inactive')
                                <span
                                    class="inline-flex rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">{{ $vehicle->status }}</span>
                            @else
                                <span
                                    class="inline-flex rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">{{ $vehicle->status }}</span>
                            @endif
                        </div>
                        
                        {{-- MOBILE DETAILS --}}

                        <div
                            class="mt-4 grid grid-cols-2 gap-3 border-t border-gray-200 pt-3 dark:border-gray-600 sm:hidden">
                            <div>
                                <p class="text-[10px] font-medium text-gray-400">Tahun / Warna</p>
                                <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">{{ $vehicle->year }} /
                                    {{ $vehicle->color }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-medium text-gray-400">Transmisi / Kursi</p>
                                <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">{{ $vehicle->transmission_id }} /
                                    {{ $vehicle->seats }} Kursi</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-medium text-gray-400">Bahan Bakar</p>
                                <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">{{ $vehicle->fuel_type ?? '-' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-[10px] font-medium text-gray-400">Tipe Kendaraan</p>
                                <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">{{ $vehicle->type_id }}</p>
                            </div>
                        </div>
                        
                        {{-- ACTION --}}

                        <div
                            class="mt-4 flex items-center justify-end border-t border-gray-200 pt-3 dark:border-gray-600 sm:mt-0 sm:border-0 sm:pt-0">
                            <a href="{{ route('vehicle-admin.show', $vehicle->id) }}"
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
                            <a href="{{ route('vehicle-admin.edit', $vehicle->id) }}"
                                class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600"
                                title="Edit kendaraan">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L11.25 15.403l-4.5 1.5 1.5-4.5 9.612-9.916Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    
                {{-- EMPTY STATE --}}

                    <div class="px-6 py-12 text-center">
                        <div
                            class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.5V18a1.5 1.5 0 0 0 1.5 1.5H21v-4.5l-1.8-5.4a2.25 2.25 0 0 0-2.137-1.35H6.937A2.25 2.25 0 0 0 4.8 10.1L3 13.5Z" />
                            </svg>
                        </div>
                        <h3 class="mt-3 text-sm font-semibold text-gray-800 dark:text-white">Belum ada kendaraan</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Belum ada data kendaraan yang terdaftar.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
        
        {{-- PAGINATION --}}

        @if (method_exists($vehicles, 'links'))
            <div class="mt-6">
                {{ $vehicles->links() }}
            </div>
        @endif
    </section>
@endsection
