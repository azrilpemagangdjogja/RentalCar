@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}
        <section class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="md:flex hidden items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                        <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg>
                        <span>Approvement</span>
                    </div>
                    <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        Approvement Kendaraan
                    </h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Kelola permintaan penempatan kendaraan pada lokasi pengambilan.
                    </p>
                </div>
            </div>
        </section>

        {{-- SUMMARY --}}
        <section class="hidden grid-cols-2 gap-3 md:grid sm:grid-cols-4 sm:gap-5">
            {{-- TOTAL --}}
            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Total</span>
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9Z" />
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">{{ $approvement->count() }}</p>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Pengajuan</p>
            </div>

            {{-- PENDING --}}
            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Pending</span>
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $approvement->where('status', 'Pending')->count() }}
                </p>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Menunggu keputusan</p>
            </div>

            {{-- APPROVED --}}
            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Approved</span>
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 4.5 4.5 10.5-10.5" />
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $approvement->where('status', 'Approved')->count() }}
                </p>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Disetujui</p>
            </div>

            {{-- REJECTED --}}
            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Rejected</span>
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $approvement->where('status', 'Rejected')->count() }}
                </p>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Ditolak</p>
            </div>
        </section>

        {{-- FILTER --}}
        <section class="mt-6 mb-8 rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                {{-- SEARCH --}}
                <div class="relative w-full lg:max-w-lg">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.5-4.5m2.25-5.25a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Cari kendaraan, applicant, atau lokasi..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                </div>

                {{-- STATUS FILTER --}}
                <div class="w-full sm:w-auto">
                    <select
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-600 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-300 dark:focus:ring-white/10 sm:min-w-48">
                        <option value="">Semua Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
        </section>

        {{-- APPROVEMENT LIST --}}

        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Approvement Masuk</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Terima atau tolak kendaraan yang ingin menitipkan kendaraannya</p>
            </div>
        </div>

        <section class="mb-8">

            {{-- DESKTOP TABLE --}}
            <div
                class="hidden overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700 md:block">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[1100px] text-left text-sm">
                        <thead
                            class="border-b border-gray-200 bg-white text-xs uppercase text-gray-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Kendaraan</th>
                                <th class="px-6 py-4 font-semibold">Applicant</th>
                                <th class="px-6 py-4 font-semibold">Pickup Location</th>
                                <th class="px-6 py-4 font-semibold">Diajukan</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 text-right font-semibold">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 dark:divide-gray-600">

                            @forelse($approvement as $item)
                                <tr class="transition hover:bg-gray-100/70 dark:hover:bg-gray-600/50">

                                    {{-- VEHICLE --}}
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="h-12 w-16 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                                @if ($item->vehicle_profile)
                                                    <img src="{{ asset('storage/' . $item->vehicle_profile) }}"
                                                        alt="{{ $item->vehicle_brand }} {{ $item->vehicle_model }}"
                                                        class="h-full w-full object-cover">
                                                @else
                                                    <div
                                                        class="flex h-full w-full items-center justify-center text-gray-500 dark:text-gray-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"
                                                            class="h-6 w-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="min-w-0">
                                                <p class="truncate font-semibold text-gray-800 dark:text-white">
                                                    {{ $item->vehicle_brand }} {{ $item->vehicle_model }}
                                                </p>
                                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                                    {{ $item->vehicle_type }} · {{ $item->vehicle_year }} ·
                                                    {{ $item->vehicle_color }}
                                                </p>
                                                <p class="mt-1 text-xs font-medium text-gray-500 dark:text-gray-300">
                                                    {{ $item->vehicle_plate_number }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- APPLICANT --}}
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="h-10 w-10 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                                @if ($item->applicant_profile)
                                                    <img src="{{ asset('storage/' . $item->applicant_profile) }}"
                                                        alt="{{ $item->applicant_name }}"
                                                        class="h-full w-full object-cover">
                                                @else
                                                    <div
                                                        class="flex h-full w-full items-center justify-center text-gray-500 dark:text-gray-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                            class="h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0M4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="min-w-0">
                                                <p class="truncate font-semibold text-gray-700 dark:text-gray-200">
                                                    {{ $item->applicant_name }}
                                                </p>
                                                <p class="mt-1 truncate text-xs text-gray-400 dark:text-gray-400">
                                                    {{ $item->applicant_email }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- PICKUP LOCATION --}}
                                    <td class="px-6 py-5">
                                        <p class="max-w-[230px] truncate font-semibold text-gray-700 dark:text-gray-200">
                                            {{ $item->location_name ?? 'Belum ditentukan' }}
                                        </p>
                                        <p class="mt-1 max-w-[230px] truncate text-xs text-gray-400 dark:text-gray-400">
                                            {{ $item->location_address ?? '-' }}
                                        </p>
                                    </td>

                                    {{-- DATE --}}
                                    <td class="px-6 py-5">
                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ $item->created_at }}
                                        </p>
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-6 py-5">
                                        @if ($item->status == 'Pending')
                                            <span
                                                class="inline-flex rounded-full bg-gray-800 px-3 py-1 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                                Pending
                                            </span>
                                        @elseif($item->status == 'Approved')
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                                Approved
                                            </span>
                                        @elseif($item->status == 'Rejected')
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                Rejected
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </td>

                                    {{-- ACTION --}}
                                    <td class="px-6 py-5">
                                        <div class="flex justify-end gap-2">

                                            {{-- DETAIL --}}
                                            <a href="{{ route('approval-join-vehicle.show', $item->id) }}"
                                                class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                title="Lihat">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                    class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </a>

                                            @if ($item->status == 'Pending')
                                                {{-- APPROVE --}}

                                                <form action="{{ route('approval-join-vehicle.approve', $item->id) }}" method="POST" onsubmit="return confirm('Terima {{ $item->vehicle_brand }} {{ $item->vehicle_model }} milik {{ $item->applicant_name }} di lokasi {{ $item->location_name }}?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        title="Approve">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                            class="h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m5 12.75 4 3.75L19 7.5" />
                                                        </svg>
                                                    </button>
                                                </form>


                                                {{-- REJECT --}}
                                                <a href="{{ route('approval-join-vehicle.rejection', $item->id) }}"
                                                    class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    title="Reject">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                        class="h-5 w-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m7.5 7.5 9 9m0-9-9 9" />
                                                    </svg>
                                                </a>
                                            @endif

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div
                                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                    class="h-7 w-7">
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
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            {{-- MOBILE CARDS --}}
            <div class="space-y-3 md:hidden">

                @forelse($approvement as $item)
                    <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700">

                        {{-- VEHICLE HEADER --}}
                        <div class="flex gap-4">

                            <div class="h-16 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                @if ($item->vehicle_profile)
                                    <img src="{{ asset('storage/' . $item->vehicle_profile) }}"
                                        alt="{{ $item->vehicle_brand }} {{ $item->vehicle_model }}"
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
                                            {{ $item->vehicle_brand }} {{ $item->vehicle_model }}
                                        </h3>

                                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                            {{ $item->vehicle_type }} · {{ $item->vehicle_year }} ·
                                            {{ $item->vehicle_color }}
                                        </p>

                                        <p class="mt-1 text-xs font-medium text-gray-500 dark:text-gray-300">
                                            {{ $item->vehicle_plate_number }}
                                        </p>
                                    </div>

                                    @if ($item->status == 'Pending')
                                        <span
                                            class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                            Pending
                                        </span>
                                    @elseif($item->status == 'Approved')
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
                                    <div class="h-7 w-7 shrink-0 overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-600">
                                        @if ($item->applicant_profile)
                                            <img src="{{ asset('storage/' . $item->applicant_profile) }}"
                                                alt="{{ $item->applicant_name }}" class="h-full w-full object-cover">
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
                                        {{ $item->applicant_name }}
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
                                {{ $item->location_name ?? 'Belum ditentukan' }}
                            </p>
                            <p class="mt-1 truncate text-xs text-gray-400 dark:text-gray-400">
                                {{ $item->location_address ?? '-' }}
                            </p>
                        </div>

                        {{-- ACTION --}}
                        <div class="mt-4 flex gap-2 border-t border-gray-200 pt-3 dark:border-gray-600">

                            <a href="{{ route('approval-join-vehicle.show', $item->id) }}"
                                class="flex flex-1 items-center justify-center rounded-lg bg-gray-100 py-2.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                                Lihat
                            </a>

                            @if ($item->status == 'Pending')
                                <form action="{{ route('approval-join-vehicle.approve', $item->id) }}" method="POST"
                                    class="flex flex-1 items-center justify-center">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="flex flex-1 items-center justify-center rounded-lg bg-gray-800 py-2.5 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                        Approve
                                    </button>
                                </form>

                                <button type="button"
                                    class="flex flex-1 items-center justify-center rounded-lg border border-gray-200 py-2.5 text-xs font-semibold text-gray-700 dark:border-gray-600 dark:text-gray-200">
                                    Reject
                                </button>
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

        </section>

        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Approvement Keluar</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">Setuju atau tolak kendaraan yang ingin keluar dari lokasi pengambilan </p>
            </div>
            <a href="{{ route('vehicles.index') }}"
                class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">Lihat
                semua</a>
        </div>

        <section class="">

            {{-- DESKTOP TABLE --}}
            <div
                class="hidden overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700 md:block">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[1100px] text-left text-sm">
                        <thead
                            class="border-b border-gray-200 bg-white text-xs uppercase text-gray-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Kendaraan</th>
                                <th class="px-6 py-4 font-semibold">Applicant</th>
                                <th class="px-6 py-4 font-semibold">Pickup Location</th>
                                <th class="px-6 py-4 font-semibold">Diajukan</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 text-right font-semibold">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 dark:divide-gray-600">

                            @forelse($approvementOuting as $item)
                                <tr class="transition hover:bg-gray-100/70 dark:hover:bg-gray-600/50">

                                    {{-- VEHICLE --}}
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="h-12 w-16 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                                @if ($item->vehicle_profile)
                                                    <img src="{{ asset('storage/' . $item->vehicle_profile) }}"
                                                        alt="{{ $item->vehicle_brand }} {{ $item->vehicle_model }}"
                                                        class="h-full w-full object-cover">
                                                @else
                                                    <div
                                                        class="flex h-full w-full items-center justify-center text-gray-500 dark:text-gray-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"
                                                            class="h-6 w-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.75 13.5h16.5M5.25 13.5l1.5-5.25A2.25 2.25 0 0 1 8.918 6.75h6.164a2.25 2.25 0 0 1 2.168 1.5l1.5 5.25M5.25 13.5v4.5m13.5-4.5v4.5" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="min-w-0">
                                                <p class="truncate font-semibold text-gray-800 dark:text-white">
                                                    {{ $item->vehicle_brand }} {{ $item->vehicle_model }}
                                                </p>
                                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                                    {{ $item->vehicle_type }} · {{ $item->vehicle_year }} ·
                                                    {{ $item->vehicle_color }}
                                                </p>
                                                <p class="mt-1 text-xs font-medium text-gray-500 dark:text-gray-300">
                                                    {{ $item->vehicle_plate_number }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- APPLICANT --}}
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="h-10 w-10 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                                @if ($item->applicant_profile)
                                                    <img src="{{ asset('storage/' . $item->applicant_profile) }}"
                                                        alt="{{ $item->applicant_name }}"
                                                        class="h-full w-full object-cover">
                                                @else
                                                    <div
                                                        class="flex h-full w-full items-center justify-center text-gray-500 dark:text-gray-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                            class="h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0M4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="min-w-0">
                                                <p class="truncate font-semibold text-gray-700 dark:text-gray-200">
                                                    {{ $item->applicant_name }}
                                                </p>
                                                <p class="mt-1 truncate text-xs text-gray-400 dark:text-gray-400">
                                                    {{ $item->applicant_email }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- PICKUP LOCATION --}}
                                    <td class="px-6 py-5">
                                        <p class="max-w-[230px] truncate font-semibold text-gray-700 dark:text-gray-200">
                                            {{ $item->location_name ?? 'Belum ditentukan' }}
                                        </p>
                                        <p class="mt-1 max-w-[230px] truncate text-xs text-gray-400 dark:text-gray-400">
                                            {{ $item->location_address ?? '-' }}
                                        </p>
                                    </td>

                                    {{-- DATE --}}
                                    <td class="px-6 py-5">
                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ $item->created_at }}
                                        </p>
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-6 py-5">
                                        @if ($item->status == 'Pending')
                                            <span
                                                class="inline-flex rounded-full bg-gray-800 px-3 py-1 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                                Pending
                                            </span>
                                        @elseif($item->status == 'Approved')
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                                Approved
                                            </span>
                                        @elseif($item->status == 'Rejected')
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                Rejected
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </td>

                                    {{-- ACTION --}}
                                    <td class="px-6 py-5">
                                        <div class="flex justify-end gap-2">

                                            {{-- DETAIL --}}
                                            <a href="{{ route('approval-join-vehicle.show', $item->id) }}"
                                                class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                title="Lihat">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                    class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </a>

                                            @if ($item->status == 'Pending')
                                                {{-- APPROVE --}}

                                                <form action="{{ route('approval-join-vehicle.outing', $item->id) }}" method="POST" onsubmit="return confirm('Terima {{ $item->vehicle_brand }} {{ $item->vehicle_model }} milik {{ $item->applicant_name }} di lokasi {{ $item->location_name }}?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        title="Approve">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                            class="h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m5 12.75 4 3.75L19 7.5" />
                                                        </svg>
                                                    </button>
                                                </form>


                                                {{-- REJECT --}}
                                                <a href="{{ route('approval-join-vehicle.rejection', $item->id) }}"
                                                    class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    title="Reject">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                        class="h-5 w-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m7.5 7.5 9 9m0-9-9 9" />
                                                    </svg>
                                                </a>
                                            @endif

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div
                                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                    class="h-7 w-7">
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
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            {{-- MOBILE CARDS --}}
            <div class="space-y-3 md:hidden">

                @forelse($approvementOuting as $item)
                    <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700">

                        {{-- VEHICLE HEADER --}}
                        <div class="flex gap-4">

                            <div class="h-16 w-20 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                @if ($item->vehicle_profile)
                                    <img src="{{ asset('storage/' . $item->vehicle_profile) }}"
                                        alt="{{ $item->vehicle_brand }} {{ $item->vehicle_model }}"
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
                                            {{ $item->vehicle_brand }} {{ $item->vehicle_model }}
                                        </h3>

                                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                            {{ $item->vehicle_type }} · {{ $item->vehicle_year }} ·
                                            {{ $item->vehicle_color }}
                                        </p>

                                        <p class="mt-1 text-xs font-medium text-gray-500 dark:text-gray-300">
                                            {{ $item->vehicle_plate_number }}
                                        </p>
                                    </div>

                                    @if ($item->status == 'Pending')
                                        <span
                                            class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                            Pending
                                        </span>
                                    @elseif($item->status == 'Approved')
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
                                    <div class="h-7 w-7 shrink-0 overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-600">
                                        @if ($item->applicant_profile)
                                            <img src="{{ asset('storage/' . $item->applicant_profile) }}"
                                                alt="{{ $item->applicant_name }}" class="h-full w-full object-cover">
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
                                        {{ $item->applicant_name }}
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
                                {{ $item->location_name ?? 'Belum ditentukan' }}
                            </p>
                            <p class="mt-1 truncate text-xs text-gray-400 dark:text-gray-400">
                                {{ $item->location_address ?? '-' }}
                            </p>
                        </div>

                        {{-- ACTION --}}
                        <div class="mt-4 flex gap-2 border-t border-gray-200 pt-3 dark:border-gray-600">

                            <a href="{{ route('approval-join-vehicle.show', $item->id) }}"
                                class="flex flex-1 items-center justify-center rounded-lg bg-gray-100 py-2.5 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                                Lihat
                            </a>

                            @if ($item->status == 'Pending')
                                <form action="{{ route('approval-join-vehicle.approve', $item->id) }}" method="POST"
                                    class="flex flex-1 items-center justify-center">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="flex flex-1 items-center justify-center rounded-lg bg-gray-800 py-2.5 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                        Approve
                                    </button>
                                </form>

                                <button type="button"
                                    class="flex flex-1 items-center justify-center rounded-lg border border-gray-200 py-2.5 text-xs font-semibold text-gray-700 dark:border-gray-600 dark:text-gray-200">
                                    Reject
                                </button>
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

        </section>

        {{-- PAGINATION PLACEHOLDER --}}

        <div class="mt-5 flex items-center justify-between">
            <p class="text-xs text-gray-400 dark:text-gray-500">
                Menampilkan {{ $approvement->count() }} pengajuan
            </p>

            <div class="flex items-center gap-2">
                <button type="button"
                    class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-100 text-gray-400 dark:border-gray-600 dark:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15 19-7-7 7-7" />
                    </svg>
                </button>

                <span class="text-xs font-medium text-gray-600 dark:text-gray-300">
                    Halaman 1
                </span>

                <button type="button"
                    class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-100 text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

    </section>
@endsection
