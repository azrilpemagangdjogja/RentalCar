@extends('layouts.admin')
@section('content')
    {{-- HEADER --}}
    <section class="mb-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Kendaraan</span>
                </div>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Kelola
                    Kendaraan</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola kendaraan yang tersedia pada mitramu.</p>
            </div>

            <a href="{{ route('vehicle.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                </svg>
                Tambah Kendaraan
            </a>
        </div>
    </section>

    {{-- SUMMARY --}}
    <section class="grid-cols-2 hidden md:grid gap-3 sm:grid-cols-4 sm:gap-5">
        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between gap-2">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Total</span>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5M6.75 18h.008v.008H6.75V18ZM17.25 18h.008v.008h-.008V18Z" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehicles->count() }}</p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Kendaraan</p>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between gap-2">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Aktif</span>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 4.5 4.5 10.5-10.5" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehiclesActive->count() }}</p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Siap disewakan</p>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between gap-2">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Tidak Aktif</span>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">{{ $vehiclesInActive->count() }}</p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Tidak tersedia</p>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between gap-2">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Lokasi</span>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">5</p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Pickup locations</p>
        </div>
    </section>

    {{-- FILTER --}}
    <section class="mt-6 rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="relative w-full lg:max-w-md">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-4.5-4.5m2.25-5.25a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" />
                    </svg>
                </div>
                <input type="search" placeholder="Cari kendaraan, plat nomor, atau merek..."
                    class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
            </div>

            <div class="grid grid-cols-2 gap-3 sm:flex">
                <select
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-600 outline-none focus:border-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                    <option value="">Semua Tipe</option>
                    <option value="Bicycle">Bicycle</option>
                    <option value="Bike">Bike</option>
                    <option value="Car">Car</option>
                </select>
                <select
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-600 outline-none focus:border-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                    <option value="">Semua Status</option>
                    <option value="Active">Aktif</option>
                    <option value="Inactive">Tidak Aktif</option>
                </select>
            </div>
        </div>
    </section>

    {{-- VEHICLE LIST --}}
    <section class="mt-6">

        {{-- DESKTOP TABLE --}}
        <div
            class="hidden overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700 md:block">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[950px] text-left text-sm">
                    <thead
                        class="border-b border-gray-200 bg-white text-xs uppercase text-gray-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Kendaraan</th>
                            <th class="px-6 py-4 font-semibold">Plat Nomor</th>
                            <th class="px-6 py-4 font-semibold">Tipe</th>
                            <th class="px-6 py-4 font-semibold">Lokasi</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 text-right font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-600">
                        <tr class="transition hover:bg-gray-100/70 dark:hover:bg-gray-600/50">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="flex h-12 w-16 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="truncate font-semibold text-gray-800 dark:text-white">Toyota Avanza</p>
                                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Toyota · 2024 · Hitam</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 font-medium text-gray-700 dark:text-gray-200">H 1234 AB</td>
                            <td class="px-6 py-5 text-gray-500 dark:text-gray-300">Car</td>
                            <td class="px-6 py-5 text-gray-500 dark:text-gray-300">Jakarta Selatan</td>
                            <td class="px-6 py-5">
                                <span
                                    class="inline-flex rounded-full bg-gray-800 px-3 py-1 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">Aktif</span>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex justify-end gap-2">
                                    <a href="#"
                                        class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        title="Lihat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L11.25 15.403l-4.5 1.5 1.5-4.5L16.862 4.487Z" />
                                        </svg>
                                    </a>
                                    <button type="button"
                                        class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21.75H8.084a2.25 2.25 0 0 1-2.244-2.077L4.77 5.79m14.458 0a48.108 48.108 0 0 0-3.478-.397m-10.507 0a48.108 48.108 0 0 1 3.478-.397m0 0V4.125c0-.621.504-1.125 1.125-1.125h3.308c.621 0 1.125.504 1.125 1.125V5.393" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @forelse($vehicles as $item)
                            <tr class="transition hover:bg-gray-100/70 dark:hover:bg-gray-600/50">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="flex h-12 w-16 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.6" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5.25 17.25h13.5M6 17.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0ZM22.5 17.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0ZM5.25 17.25l1.5-7.5h7.5l3 7.5M14.25 9.75l1.5-3h2.25l2.25 3" />
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="truncate font-semibold text-gray-800 dark:text-white">
                                                {{ $item->brand }} {{ $item->model }}</p>
                                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">{{ $item->brand }} ·
                                                {{ $item->year }} · {{ $item->color ?? 'Belum ada' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 font-medium text-gray-700 dark:text-gray-200">
                                    {{ $item->plate_number }}</td>
                                <td class="px-6 py-5 text-gray-500 dark:text-gray-300">{{ $item->type->name }}</td>
                                <td class="px-6 py-5 text-gray-500 dark:text-gray-300">{{ $item->pickupLocation->address ?? 'belum ada' }}</td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">{{ $item->status }}</span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('vehicle.show', $item->id) }}"
                                            class="rounded-lg p-2 text-gray-500 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('vehicle.edit', $item->id) }}"
                                            class="rounded-lg p-2 text-gray-500 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L11.25 15.403l-4.5 1.5 1.5-4.5 9.612-9.916Z" />
                                            </svg>
                                        </a>
                                        <button type="button"
                                            class="rounded-lg p-2 text-gray-500 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21.75H8.084a2.25 2.25 0 0 1-2.244-2.077L4.77 5.79m14.458 0a48.108 48.108 0 0 0-3.478-.397m-10.507 0a48.108 48.108 0 0 1 3.478-.397m0 0V4.125c0-.621.504-1.125 1.125-1.125h3.308c.621 0 1.125.504 1.125 1.125V5.393" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- MOBILE CARDS --}}
        <div class="space-y-3 md:hidden">

            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700">
                <div class="flex gap-4">
                    <div
                        class="flex h-16 w-20 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="truncate font-semibold text-gray-800 dark:text-white">Toyota Avanza</h3>
                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Toyota · 2024 · Hitam</p>
                            </div>
                            <span
                                class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800">Aktif</span>
                        </div>
                        <div class="mt-4 grid grid-cols-2 gap-3 text-xs">
                            <div>
                                <p class="text-gray-400">Plat Nomor</p>
                                <p class="mt-1 font-semibold text-gray-700 dark:text-gray-200">H 1234 AB</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Lokasi</p>
                                <p class="mt-1 truncate font-semibold text-gray-700 dark:text-gray-200">Jakarta Selatan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex gap-2 border-t border-gray-200 pt-3 dark:border-gray-600">
                    <a href="#"
                        class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-gray-100 py-2.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        Lihat
                    </a>
                    <a href="#"
                        class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-gray-800 py-2.5 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                        Edit
                    </a>
                </div>
            </div>

            @forelse($vehicles as $item)
            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700">
                <div class="flex gap-4">
                    <div
                        class="flex h-16 w-20 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.25 17.25h13.5M6 17.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0ZM22.5 17.25a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1-4.5 0ZM5.25 17.25l1.5-7.5h7.5l3 7.5" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="truncate font-semibold text-gray-800 dark:text-white">{{ $item->brand }} {{ $item->model }}</h3>
                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">{{ $item->brand }} · {{ $item->year }} · {{ $item->color }}</p>
                            </div>
                            <span
                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">{{ $item->status }}</span>
                        </div>
                        <div class="mt-4 grid grid-cols-2 gap-3 text-xs">
                            <div>
                                <p class="text-gray-400">Plat Nomor</p>
                                <p class="mt-1 font-semibold text-gray-700 dark:text-gray-200">{{ $item->plate_number }}</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Lokasi</p>
                                <p class="mt-1 truncate font-semibold text-gray-700 dark:text-gray-200">{{ $item->pickupLocation->address ?? 'belum ada' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex gap-2 border-t border-gray-200 pt-3 dark:border-gray-600">
                    <a href="#"
                        class="flex flex-1 items-center justify-center rounded-lg bg-gray-100 py-2.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">Lihat</a>
                    <a href="{{ route('vehicle.edit', $item->id) }}"
                        class="flex flex-1 items-center justify-center rounded-lg bg-gray-800 py-2.5 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">Edit</a>
                </div>
            </div>
        @empty
            @endforelse

        </div>

    </section>

    {{-- PAGINATION --}}
    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-xs text-gray-400 dark:text-gray-400">Menampilkan 1–10 dari 24 kendaraan</p>
        <div class="flex items-center gap-2">
            <button type="button"
                class="rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 disabled:opacity-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700"
                disabled>
                Sebelumnya
            </button>
            <button type="button"
                class="rounded-lg bg-gray-800 px-3 py-2 text-sm font-semibold text-white dark:bg-gray-200 dark:text-gray-800">1</button>
            <button type="button"
                class="rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">2</button>
            <button type="button"
                class="rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">3</button>
            <button type="button"
                class="rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">Berikutnya</button>
        </div>
    </div>
@endsection
