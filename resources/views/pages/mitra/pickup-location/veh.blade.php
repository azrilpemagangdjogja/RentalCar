@extends('layouts.admin')

@section('content')
    {{-- HEADER --}}
    <section class="mb-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400"> <a href="{{ route('join-pickup-location.show', $pickupLocation->id) }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">
                        Lokasi Pengambilan </a> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg> <span class="truncate">{{ $pickupLocation->name }}</span> </div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Titipkan Kendaraan </h1>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                    Kelola kendaraan milik Anda yang ingin dititipkan atau sudah berada di <span
                        class="font-medium text-gray-700 dark:text-gray-200">{{ $pickupLocation->name }}</span>. </p>
            </div>
            <a href="{{ url()->previous() }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 sm:w-auto">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg> --}}
                Kembali
            </a>
        </div>
    </section>


    {{-- PICKUP LOCATION INFO --}}

    <section class="mb-8 overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
        <div class="flex flex-col sm:flex-row">
            <div class="h-36 w-full shrink-0 p-2 sm:h-36 sm:w-56">
                <iframe
                    src="https://www.google.com/maps?q={{ $pickupLocation->latitude }},{{ $pickupLocation->longitude }}&output=embed"
                    class="h-full w-full rounded-xl border border-gray-200 dark:border-gray-500" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="min-w-0 flex-1 p-4 pl-4 sm:p-6">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div class="min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h2 class="text-lg font-bold text-gray-800 dark:text-white">
                                {{ $pickupLocation->name }}
                            </h2>

                            <span
                                class="rounded-full bg-gray-800 px-3 py-1 text-[10px] font-semibold text-white dark:bg-white dark:text-gray-800">
                                {{ $pickupLocation->status }}
                            </span>
                        </div>

                        <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            {{ $pickupLocation->address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>


    {{-- VEHICLE TABLES --}}
    <section>
        <div class="grid grid-cols-1 gap-6">

            {{-- MY VEHICLES --}}
            <div class="min-w-0">
                <div class="mb-4 flex items-end justify-between gap-3">
                    <div>
                        <div class="flex items-center gap-2">
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 17.25h13.5m-12-7.5h10.5l2.25 7.5H4.5l2.25-7.5Zm2.25 0V7.5h6v2.25M8.25 17.25a1.5 1.5 0 1 1-3 0m10.5 0a1.5 1.5 0 1 1-3 0" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="font-bold text-gray-800 dark:text-white">
                                    Kendaraan Milik Anda
                                </h2>
                                <p class="text-xs text-gray-400 dark:text-gray-400">
                                    Belum dititipkan di lokasi lain
                                </p>
                            </div>
                        </div>
                    </div>
                    <span class="shrink-0 text-xs font-medium text-gray-400 dark:text-gray-400">
                        {{ $vehicles->count() }} kendaraan
                    </span>
                </div>

                <div
                    class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="overflow-x-auto scrollbar-thin">
                        <table class="w-full min-w-[650px] text-left">
                            <thead class="border-b border-gray-100 bg-gray-50 dark:border-gray-600 dark:bg-gray-600/50">
                                <tr>
                                    <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-300">
                                        Kendaraan
                                    </th>
                                    <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-300">
                                        Detail
                                    </th>
                                    <th class="px-5 py-4 text-right text-xs font-semibold text-gray-500 dark:text-gray-300">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-600">
                                @forelse ($vehicles as $item)
                                    <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-600/40">
                                        <td class="px-5 py-4">
                                            <div class="flex min-w-0 items-center gap-3">
                                                <div
                                                    class="h-14 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                                    @if ($item->profile)
                                                        <img src="{{ asset('storage/' . $item->profile) }}"
                                                            alt="{{ $item->brand }} {{ $item->model }}"
                                                            class="h-full w-full object-cover">
                                                    @else
                                                        <div
                                                            class="flex h-full w-full items-center justify-center text-gray-400 dark:text-gray-300">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="h-7 w-7">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M5.25 17.25h13.5m-12-7.5h10.5l2.25 7.5H4.5l2.25-7.5Zm2.25 0V7.5h6v2.25" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="min-w-0">
                                                    <p class="truncate font-semibold text-gray-800 dark:text-white">
                                                        {{ $item->brand }} {{ $item->model }}
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                                        {{ $item->type->name ?? 'Kendaraan' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4">
                                            <div class="space-y-1 text-xs">
                                                <p class="font-medium text-gray-700 dark:text-gray-200">
                                                    {{ $item->plate_number }}
                                                </p>
                                                <p class="text-gray-400 dark:text-gray-400">
                                                    {{ $item->year }} · {{ $item->color ?? 'Warna belum diatur' }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('vehicle.show', $item->id) }}"
                                                    class="inline-flex items-center justify-center rounded-xl border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-500 dark:text-gray-200 dark:hover:bg-gray-600">
                                                    Detail
                                                </a>
                                                <form action="{{ route('join-pickup-location.addveh', [$pickupLocation->id, $item->id]) }}" method="POST"
                                                    onsubmit="return confirm('Titipkan kendaraan {{ $item->brand }} {{ $item->model }} ke {{ $pickupLocation->name }}?')">
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex items-center gap-1.5 rounded-xl bg-gray-800 px-3 py-2 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                            class="h-4 w-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 16.5V3.75m0 0L7.5 8.25M12 3.75l4.5 4.5" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M4.5 13.5v4.125A2.625 2.625 0 0 0 7.125 20.25h9.75a2.625 2.625 0 0 0 2.625-2.625V13.5" />
                                                        </svg>
                                                        Titipkan
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-14 text-center">
                                            <div
                                                class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5.25 17.25h13.5m-12-7.5h10.5l2.25 7.5H4.5l2.25-7.5Zm2.25 0V7.5h6v2.25" />
                                                </svg>
                                            </div>
                                            <p class="mt-3 text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                Tidak ada kendaraan
                                            </p>
                                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                                Kendaraan yang belum dititipkan akan muncul di sini.
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- VEHICLES IN PICKUP LOCATION --}}
            <div class="min-w-0">
                <div class="mb-4 flex items-end justify-between gap-3">
                    <div>
                        <div class="flex items-center gap-2">
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 5.25-7.5 10.5-7.5 10.5S4.5 15.75 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="font-bold text-gray-800 dark:text-white">
                                    Kendaraan di Lokasi
                                </h2>
                                <p class="text-xs text-gray-400 dark:text-gray-400">
                                    Kendaraan yang sudah dititipkan
                                </p>
                            </div>
                        </div>
                    </div>
                    <span class="shrink-0 text-xs font-medium text-gray-400 dark:text-gray-400">
                        Kendaraan tersedia
                    </span>
                </div>

                <div
                    class="overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[600px] text-left">
                            <thead class="border-b border-gray-100 bg-gray-50 dark:border-gray-600 dark:bg-gray-600/50">
                                <tr>
                                    <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-300">
                                        Kendaraan
                                    </th>
                                    <th class="px-5 py-4 text-xs font-semibold text-gray-500 dark:text-gray-300">
                                        Detail
                                    </th>
                                    <th
                                        class="px-5 py-4 text-right text-xs font-semibold text-gray-500 dark:text-gray-300">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-600">
                                @forelse ($deployedVehicles as $item)
                                    <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-600/40">
                                        <td class="px-5 py-4">
                                            <div class="flex min-w-0 items-center gap-3">
                                                <div
                                                    class="h-14 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                                    @if ($item->profile)
                                                        <img src="{{ asset('storage/' . $item->profile) }}"
                                                            alt="{{ $item->brand }} {{ $item->model }}"
                                                            class="h-full w-full object-cover">
                                                    @else
                                                        <div
                                                            class="flex h-full w-full items-center justify-center text-gray-400 dark:text-gray-300">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="h-7 w-7">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M5.25 17.25h13.5m-12-7.5h10.5l2.25 7.5H4.5l2.25-7.5Zm2.25 0V7.5h6v2.25" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="min-w-0">
                                                    <p class="truncate font-semibold text-gray-800 dark:text-white">
                                                        {{ $item->brand }} {{ $item->model }}
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                                        {{ $item->type->name ?? 'Kendaraan' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4">
                                            <div class="space-y-1 text-xs">
                                                <p class="font-medium text-gray-700 dark:text-gray-200">
                                                    {{ $item->plate_number }}
                                                </p>
                                                <p class="text-gray-400 dark:text-gray-400">
                                                    {{ $item->year }} · {{ $item->color ?? 'Warna belum diatur' }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 text-right">
                                            <a href="{{ route('vehicle.show', $item->id) }}"
                                                class="inline-flex items-center gap-1.5 rounded-xl border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-500 dark:text-gray-200 dark:hover:bg-gray-600">
                                                Detail
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                    class="h-3.5 w-3.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m9 18 6-6-6-6" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-14 text-center">
                                            <div
                                                class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 10.5a3 3 0 1 1-6 0Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 10.5c0 5.25-7.5 10.5-7.5 10.5S4.5 15.75 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                                </svg>
                                            </div>
                                            <p class="mt-3 text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                Belum ada kendaraan
                                            </p>
                                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                                Belum ada kendaraan yang dititipkan di lokasi ini.
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
