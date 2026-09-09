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
                    <span>History</span>
                </div>
                <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    History Aktivitas
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Lihat riwayat aktivitas pengguna yang tercatat dalam sistem.
                </p>
            </div>
        </div>
    </section>

    {{-- SUMMARY --}}

    <section class="grid grid-cols-2 gap-3 sm:grid-cols-4 sm:gap-5">
        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between gap-2">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Total</span>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                {{ method_exists($histories, 'total') ? $histories->total() : $histories->count() }}
            </p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Total aktivitas</p>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between gap-2">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Pengguna</span>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 3.75-.874M15 19.128v-3.75m0 3.75a9.38 9.38 0 0 1-3.75-.874m7.5 0a9.38 9.38 0 0 0 3.75-8.004M15 15.378a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm0 0c-2.25 0-4.5 1.125-4.5 3.375M6 12.75a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm0 0c-2.25 0-4.5 1.125-4.5 3.375" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                {{ $histories->pluck('user_id')->filter()->unique()->count() }}
            </p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Pengguna tercatat</p>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between gap-2">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Aktivitas</span>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 6.75h6M9 12h6m-6 5.25h6M5.25 4.5h.008v.008H5.25V4.5Zm0 3.75h.008v.008H5.25V8.25Zm0 3.75h.008v.008H5.25V12Zm0 3.75h.008v.008H5.25v-.008Z" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                {{ $histories->pluck('activity')->filter()->unique()->count() }}
            </p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Jenis aktivitas</p>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center justify-between gap-2">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Terbaru</span>
                <div
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l3.75 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-lg font-bold text-gray-800 dark:text-white">
                {{ $histories->first()?->created_at?->format('d M Y') ?? '-' }}
            </p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Aktivitas terakhir</p>
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
                <input type="search" placeholder="Cari nama, email, atau aktivitas..."
                    class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
            </div>

            <div class="grid grid-cols-2 gap-3 sm:flex">
                <select
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-600 outline-none focus:border-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                    <option value="">Semua Aktivitas</option>
                    @foreach ($histories->pluck('activity')->filter()->unique()->sort() as $activity)
                        <option value="{{ $activity }}">{{ $activity }}</option>
                    @endforeach
                </select>

                <select
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-600 outline-none focus:border-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300">
                    <option value="">Semua Waktu</option>
                    <option value="today">Hari Ini</option>
                    <option value="week">7 Hari Terakhir</option>
                    <option value="month">30 Hari Terakhir</option>
                </select>
            </div>
        </div>
    </section>

    {{-- HISTORY LIST --}}

    <section class="mt-6">

        {{-- DESKTOP TABLE --}}

        <div
            class="hidden overflow-hidden rounded-2xl border border-gray-100 bg-white dark:border-gray-600 dark:bg-gray-700 md:block">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[950px] text-left text-sm">
                    <thead
                        class="border-b border-gray-200 bg-white text-xs uppercase text-gray-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Pengguna</th>
                            <th class="px-6 py-4 font-semibold">Aktivitas</th>
                            <th class="px-6 py-4 font-semibold">Deskripsi</th>
                            <th class="px-6 py-4 font-semibold">Tanggal</th>
                            <th class="px-6 py-4 text-right font-semibold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 dark:divide-gray-600">
                        @forelse ($histories as $item)
                            <tr class="transition hover:bg-gray-100/70 dark:hover:bg-gray-600/50">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="h-12 w-12 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                                            @if ($item->user_profile)
                                                <img src="{{ asset('storage/' . $item->user_profile) }}" alt="{{ $item->user_name }}"
                                                    class="h-full w-full object-cover">
                                            @else
                                                <div
                                                    class="flex h-full w-full items-center justify-center text-gray-500 dark:text-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 21a7.5 7.5 0 0 1 15 0" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="min-w-0">
                                            <p class="truncate font-semibold text-gray-800 dark:text-white">
                                                {{ $item->user_name }}
                                            </p>
                                            <p class="mt-1 truncate text-xs text-gray-400 dark:text-gray-400">
                                                {{ $item->user_email }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex rounded-full bg-gray-800 px-3 py-1 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                        {{ $item->activity }}
                                    </span>
                                </td>

                                <td class="max-w-sm px-6 py-5">
                                    <p class="truncate text-gray-500 dark:text-gray-300">
                                        {{ $item->description }}
                                    </p>
                                </td>

                                <td class="px-6 py-5">
                                    <p class="font-medium text-gray-700 dark:text-gray-200">
                                        {{ $item->created_at->format('d M Y') }}
                                    </p>
                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                        {{ $item->created_at->format('H:i') }}
                                    </p>
                                </td>

                                <td class="px-6 py-5">
                                    <div class="flex justify-end">
                                        <a href="{{ route('user-history.show', $item->id) }}"
                                            class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-transparent px-4 py-2 text-xs font-semibold text-gray-600 transition hover:border-gray-800 hover:text-gray-800 dark:border-gray-500 dark:text-gray-300 dark:hover:border-gray-200 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            Detail
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.8" stroke="currentColor" class="h-7 w-7">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </div>
                                        <p class="mt-4 font-semibold text-gray-700 dark:text-gray-200">
                                            Belum ada history
                                        </p>
                                        <p class="mt-1 text-sm text-gray-400 dark:text-gray-400">
                                            Belum ada aktivitas yang tercatat.
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
            @forelse ($histories as $item)
                <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700">
                    <div class="flex gap-4">
                        <div class="h-16 w-16 shrink-0 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                            @if ($item->user_profile)
                                <img src="{{ asset('storage/' . $item->user_profile) }}" alt="{{ $item->user_name }}"
                                    class="h-full w-full object-cover">
                            @else
                                <div
                                    class="flex h-full w-full items-center justify-center text-gray-500 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 21a7.5 7.5 0 0 1 15 0" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h3 class="truncate font-semibold text-gray-800 dark:text-white">
                                        {{ $item->user_name }}
                                    </h3>
                                    <p class="mt-1 truncate text-xs text-gray-400 dark:text-gray-400">
                                        {{ $item->user_email }}
                                    </p>
                                </div>

                                <span
                                    class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                    {{ $item->activity }}
                                </span>
                            </div>

                            <div class="mt-4 grid grid-cols-2 gap-3 text-xs">
                                <div>
                                    <p class="text-gray-400">Tanggal</p>
                                    <p class="mt-1 font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->created_at->format('d M Y') }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-gray-400">Waktu</p>
                                    <p class="mt-1 font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->created_at->format('H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 border-t border-gray-200 pt-3 dark:border-gray-600">
                        <p class="line-clamp-2 text-xs leading-5 text-gray-500 dark:text-gray-300">
                            {{ $item->description }}
                        </p>
                    </div>

                    <div class="mt-3 flex border-t border-gray-200 pt-3 dark:border-gray-600">
                        <a href="{{ route('user-history.show', $item->id) }}"
                            class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-transparent py-2.5 text-xs font-semibold text-gray-600 transition hover:border-gray-800 hover:text-gray-800 dark:border-gray-500 dark:text-gray-300 dark:hover:border-gray-200 dark:hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Detail
                        </a>
                    </div>
                </div>
            @empty
                <div
                    class="rounded-2xl border border-gray-100 bg-white p-8 text-center dark:border-gray-600 dark:bg-gray-700">
                    <div
                        class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <p class="mt-4 font-semibold text-gray-700 dark:text-gray-200">
                        Belum ada history
                    </p>
                    <p class="mt-1 text-sm text-gray-400 dark:text-gray-400">
                        Belum ada aktivitas yang tercatat.
                    </p>
                </div>
            @endforelse
        </div>

    </section>

    {{-- PAGINATION --}}

    @if (method_exists($histories, 'links'))
        <div class="mt-6">
            {{ $histories->links() }}
        </div>
    @endif
@endsection
