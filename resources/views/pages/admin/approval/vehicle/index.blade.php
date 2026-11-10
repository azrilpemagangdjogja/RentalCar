@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <section class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        Approvement Kendaraan
                    </h1>
                    <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">
                        Periksa dan kelola pengajuan kendaraan sebelum kendaraan digunakan.
                    </p>
                </div>
            </div>
        </section>

        {{-- STATISTICS --}}

        <div class="mt-8 hidden grid-cols-2 gap-3 sm:grid sm:grid-cols-4">

            {{-- TOTAL PENGAJUAN --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Pengajuan</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalApprovement }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.25h13.5v13.5H5.25z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h7.5M8.25 14.25h4.5" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- PENDING --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Pending</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalPending }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- APPROVED --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Approved</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalApproved }}</p>
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

            {{-- REJECTED --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Rejected</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalRejected }}</p>
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

        </div>

        {{-- SEARCH & FILTER --}}

        <form action="{{ route('approval-vehicle.index') }}" class="mt-8 mb-4 flex flex-col gap-3 sm:flex-row">

            <div class="relative flex-1">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                    </svg>
                </div>
                <input type="search" name="search" value="{{ request('search') }}"
                    placeholder="Cari kendaraan, nomor polisi, atau pemilik..."
                    class="w-full rounded-xl border border-gray-200 bg-white py-3.5 pl-12 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
            </div>

            <select name="status"
                class="rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-sm text-gray-700 outline-none transition focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:focus:border-gray-300 sm:min-w-48">
                <option value="">Semua Status</option>
                <option value="Pending" @selected(request('status') == 'Pending')>Pending</option>
                <option value="Approved" @selected(request('status') == 'Approved')>Approved</option>
                <option value="Rejected" @selected(request('status') == 'Rejected')>Rejected</option>
            </select>

            <button type="submit"
                class="rounded-xl bg-gray-800 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                Cari
            </button>

        </form>

        {{-- APPROVEMENT LIST --}}

        {{-- <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Pengajuan Kendaraan</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">
                    Periksa data kendaraan dan dokumen sebelum memberikan keputusan.
                </p>
            </div>
        </div> --}}

        <section class="mb-8">
            <div class="space-y-4">
                @forelse ($approvement as $item)
                    <article
                        class="rounded-2xl border border-gray-200 bg-white p-5 transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 sm:p-6">
                        <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                            <div class="flex min-w-0 items-start gap-4">
                                <div class="h-20 w-24 shrink-0 overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                                    @if ($item->profile)
                                        <img src="{{ asset('storage/' . $item->profile) }}"
                                            alt="{{ $item->brand }} {{ $item->model }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <div
                                            class="flex h-full w-full items-center justify-center text-gray-400 dark:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.8" stroke="currentColor" class="h-7 w-7">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5 8.25 11l4.5 4.5 3-3 5.25 5.25" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 6.75h.75v.75" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h3 class="truncate text-base font-bold text-gray-800 dark:text-white sm:text-lg">
                                            {{ $item->brand }} {{ $item->model }}
                                        </h3>

                                        @if ($item->status == 'Pending')
                                            <span
                                                class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                                Pending
                                            </span>
                                        @elseif ($item->status == 'Approved')
                                            <span
                                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                                Approved
                                            </span>
                                        @elseif ($item->status == 'Rejected')
                                            <span
                                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                Rejected
                                            </span>
                                        @else
                                            <span
                                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </div>

                                    <p class="mt-1 truncate text-sm text-gray-500 dark:text-gray-400">
                                        {{ $item->applicant?->name ?? 'Pemilik tidak ditemukan' }}
                                    </p>

                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">
                                        Diajukan {{ $item->created_at?->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            </div>

                            <div
                                class="grid grid-cols-2 gap-4 border-t border-gray-200 pt-4 dark:border-gray-600 sm:grid-cols-4 sm:border-0 sm:pt-0 lg:min-w-[500px]">
                                <div>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">Jenis</p>
                                    <p class="mt-1 truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->type?->name ?? '-' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">Nomor Polisi</p>
                                    <p class="mt-1 truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->plate_number ?? '-' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">Tahun</p>
                                    <p class="mt-1 truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->year ?? '-' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">Transmisi</p>
                                    <p class="mt-1 truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->transmission?->name ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-2 border-t border-gray-200 pt-4 dark:border-gray-600 lg:border-0 lg:pt-0">
                                <a href="{{ route('approval-vehicle.show', $item->id) }}"
                                    class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-gray-100 px-4 py-2.5 text-xs font-semibold text-gray-700 transition hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 sm:flex-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    Detail
                                </a>

                                @if ($item->status == 'Pending')
                                    <form action="{{ route('approval-vehicle.approve', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Setujui pengajuan kendaraan {{ $item->brand }} {{ $item->model }}?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="flex h-full items-center justify-center rounded-xl bg-gray-800 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                                            Setujui
                                        </button>
                                    </form>

                                    <a href="{{ route('approval-vehicle.rejection', $item->id) }}"
                                        class="flex items-center justify-center rounded-xl border border-gray-200 px-4 py-2.5 text-xs font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600">
                                        Tolak
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <div
                        class="rounded-2xl border border-gray-200 bg-white px-6 py-16 text-center dark:border-gray-600 dark:bg-gray-700">
                        <div class="flex flex-col items-center">
                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-7 w-7">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5 8.25 11l4.5 4.5 4.5 4.5L21 15" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 19.5h18" />
                                </svg>
                            </div>
                            <p class="mt-4 font-semibold text-gray-700 dark:text-gray-200">
                                Belum ada pengajuan kendaraan
                            </p>
                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                Belum ada pengajuan kendaraan yang perlu diproses.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if (method_exists($approvement, 'links'))
                <div class="mt-6">
                    {{ $approvement->links() }}
                </div>
            @endif
        </section>
    </section>
@endsection

@if (session('error'))
    <script>
        alert(@js(session('error')));
    </script>
@endif
