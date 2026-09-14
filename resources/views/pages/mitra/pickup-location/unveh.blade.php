@extends('layouts.admin')

@section('content')
    {{-- HEADER --}}
    <section class="mb-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="mb-2 hidden md:flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400"> <a
                        href="{{ route('join-pickup-location.show', $pickupLocations->id) }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">
                        Lokasi Pengambilan </a> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg> <span class="truncate">{{ $pickupLocations->name }}</span> </div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Titipkan Kendaraan </h1>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                    Kelola kendaraan milik Anda yang ingin dititipkan atau sudah berada di <span
                        class="font-medium text-gray-700 dark:text-gray-200">{{ $pickupLocations->name }}</span>. </p>
            </div>
            <a href="{{ url()->previous() }}"
                class="hidden md:inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 sm:w-auto">
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
                    src="https://www.google.com/maps?q={{ $pickupLocations->latitude }},{{ $pickupLocations->longitude }}&output=embed"
                    class="h-full w-full rounded-xl border border-gray-200 dark:border-gray-500" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="min-w-0 flex-1 p-4 pl-4 sm:p-6">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div class="min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h2 class="text-lg font-bold text-gray-800 dark:text-white">
                                {{ $pickupLocations->name }}
                            </h2>

                            <span
                                class="rounded-full bg-gray-800 px-3 py-1 text-[10px] font-semibold text-white dark:bg-white dark:text-gray-800">
                                {{ $pickupLocations->status }}
                            </span>
                        </div>

                        <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            {{ $pickupLocations->address }}
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
                    class="overflow-hidden hidden md:block rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700">
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
                                                <form
                                                    action="{{ route('join-pickup-location.addveh', [$pickupLocations->id, $item->id]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Titipkan kendaraan {{ $item->brand }} {{ $item->model }} ke {{ $pickupLocations->name }}?')">
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

                <div class="space-y-3 md:hidden">

                    @forelse($vehicles as $item)
                        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700">

                            {{-- VEHICLE HEADER --}}
                            <div class="flex gap-4">

                                <div class="h-16 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                    @if ($item->profile)
                                        <img src="{{ asset('storage/' . $item->profile) }}"
                                            alt="{{ $item->brand }} {{ $item->model }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <div
                                            class="flex h-full w-full items-center justify-center text-gray-500 dark:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.6" stroke="currentColor" class="h-7 w-7">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <div class="min-w-0 flex-1">
                                    <div class="flex items-start justify-between gap-3">
                                        <div class="min-w-0">
                                            <h3 class="truncate font-semibold text-gray-800 dark:text-white">
                                                {{ $item->brand }} {{ $item->model }}
                                            </h3>

                                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                                {{ $item->type->name }} · {{ $item->year }} ·
                                                {{ $item->color }}
                                            </p>

                                            <p class="mt-1 text-xs font-medium text-gray-500 dark:text-gray-300">
                                                {{ $item->plate_number }}
                                            </p>
                                        </div>

                                        @if ($item->pikcup_location_id = null)
                                            <span
                                                class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                                Pending
                                            </span>
                                        @elseif($item->pickup_location_id)
                                            <span
                                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                                Approved
                                            </span>
                                        @else
                                            <span
                                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            {{-- APPLICANT --}}
                            <div class="mt-4 grid grid-cols-2 gap-3 text-xs">

                                <div>
                                    <p class="text-gray-400 dark:text-gray-500">Applicant</p>
                                    <div class="mt-1 flex items-center gap-2">
                                        <div
                                            class="h-7 w-7 shrink-0 overflow-hidden rounded-full border border-gray-800 bg-gray-100 dark:bg-gray-600">
                                            @if ($item->owner->profile)
                                                <img src="{{ asset('storage/' . $item->owner->profile) }}"
                                                    alt="{{ $item->owner->name }}" class="h-full w-full object-cover">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center text-gray-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                        class="h-4 w-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0M4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <p class="truncate font-semibold text-gray-700 dark:text-gray-200">
                                            {{ $item->owner->name }}
                                        </p>
                                    </div>
                                </div>

                                {{-- DATE --}}
                                <div>
                                    <p class="text-gray-400 dark:text-gray-500">Diajukan</p>
                                    <p class="mt-1 truncate font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->created_at }}
                                    </p>
                                </div>

                            </div>

                            {{-- LOCATION --}}
                            <div class="mt-4">
                                <p class="text-xs text-gray-400 dark:text-gray-500">Pickup Location</p>
                                <p class="mt-1 truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $item->pickupLocation->name ?? 'Belum ditentukan' }}
                                </p>
                                <p class="mt-1 truncate text-xs text-gray-400 dark:text-gray-400">
                                    {{ $item->pickupLocation->address ?? '-' }}
                                </p>
                            </div>

                            {{-- ACTION --}}
                            <div class="mt-4 flex gap-2 border-t border-gray-200 pt-3 dark:border-gray-600">

                                <a href="{{ route('vehicle.show', $item->id) }}"
                                    class="flex flex-1 items-center justify-center rounded-lg bg-gray-100 py-2.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                                    Lihat
                                </a>

                                @if ($item->pickup_location_id)
                                    <form action="{{ route('vehicle.edit', $item->id) }}" method="POST"
                                        class="flex flex-1 items-center justify-center">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="flex flex-1 items-center justify-center rounded-lg bg-gray-800 py-2.5 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                            Nonaktifkan
                                        </button>
                                    </form>

                                    <form action="{{ route('vehicle.edit', $item->id) }}" method="POST"
                                        class="flex flex-1 items-center justify-center">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button"
                                            class="flex flex-1 items-center justify-center rounded-lg border border-gray-200 py-2.5 text-xs font-semibold text-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            Tarik dari lokasi
                                        </button>
                                    </form>
                                @endif

                            </div>

                        </div>

                    @empty

                        <div
                            class="rounded-2xl border border-gray-100 bg-white px-6 py-16 text-center dark:border-gray-600 dark:bg-gray-700">
                            <div class="flex flex-col items-center">
                                <div
                                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6l4 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>

                                <p class="mt-4 font-semibold text-gray-700 dark:text-gray-200">
                                    Belum ada pengajuan
                                </p>

                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                    Belum ada permintaan kendaraan yang perlu diproses.
                                </p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>

        </div>
    </section>
@endsection
