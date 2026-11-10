@extends('layouts.admin')

@section('content')
    {{-- HEADER --}}

    <section class="mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                History Aktivitas
            </h1>
            <p class="mt-1 text-sm hidden sm:block text-gray-500 dark:text-gray-400">
                Lihat riwayat aktivitas yang kamu lakukan di RentalCar.
            </p>
        </div>
    </section>

    {{-- SEARCH & FILTER --}}

    <form action="{{ route('user-history.index') }}" method="GET" class="mb-6">
        <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                </svg>
            </div>
            <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari aktivitas..."
                class="w-full rounded-2xl border border-gray-100 bg-white py-3.5 pl-12 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
        </div>
        <div class="mt-3 flex gap-2 overflow-x-auto scrollbar-none pb-1">
            <button type="submit" name="activity" value=""
                class="shrink-0 rounded-xl bg-gray-800 px-4 py-2 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                Semua
            </button>
            <button type="submit" name="activity" value="Kendaraan"
                class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Kendaraan
            </button>
            <button type="submit" name="activity" value="Transaksi"
                class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Transaksi
            </button>
            <button type="submit" name="activity" value="Akun"
                class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Akun
            </button>
            <button type="submit" name="activity" value="Mitra"
                class="shrink-0 rounded-xl bg-white px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Mitra
            </button>
        </div>
    </form>

    {{-- HISTORY LIST --}}

    <section>
        @forelse ($histories as $item)
            <div
                class="mb-3 rounded-2xl border border-gray-100 bg-white p-4 transition hover:border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 sm:p-5">
                <div class="flex items-start gap-4">
                    {{-- <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        @if (str_contains(strtolower($item->activity), 'kendaraan'))
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75h7.5m-10.5-3h13.5m-12-9h10.5l2.25 4.5H5.25l1.5-4.5ZM5.25 15.75a1.5 1.5 0 1 0 3 0 1.5 1.5 0 0 0-3 0Zm10.5 0a1.5 1.5 0 1 0 3 0 1.5 1.5 0 0 0-3 0Z" />
                            </svg>
                        @elseif (str_contains(strtolower($item->activity), 'transaksi'))
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 6.75h18M6.75 3v3.75m10.5-3.75v3.75M5.25 9.75h13.5v9.75H5.25V9.75Z" />
                            </svg>
                        @elseif (str_contains(strtolower($item->activity), 'akun'))
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 21a7.5 7.5 0 0 1 15 0" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        @endif
                    </div> --}}
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-start sm:justify-between sm:gap-4">
                            <div class="min-w-0">
                                <h3 class="font-semibold text-gray-800 dark:text-white">
                                    {{ $item->activity }}
                                </h3>
                                <p class="mt-1 line-clamp-2 text-sm leading-5 text-gray-500 dark:text-gray-300">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-between border-t border-gray-100 pt-3 dark:border-gray-600">
                    <div class="shrink-0 flex items-center gap-2">
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                            {{ $item->created_at->format('d M Y') }}
                        </p>
                        <p class="mt-1 text-xs text-gray-400 dark:text-gray-400 sm:text-right">
                            {{ $item->created_at->format('H:i') }}
                        </p>
                    </div>
                    <a href="{{ route('user-history.show', $item->id) }}"
                        class="inline-flex items-center gap-2 rounded-xl px-3 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-100 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                        Lihat Detail
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="rounded-2xl border border-gray-100 bg-white p-10 text-center dark:border-gray-600 dark:bg-gray-700">
                <div
                    class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <p class="mt-4 font-semibold text-gray-700 dark:text-gray-200">
                    Belum ada aktivitas
                </p>
                <p class="mt-1 text-sm text-gray-400 dark:text-gray-400">
                    Aktivitas yang kamu lakukan akan muncul di sini.
                </p>
            </div>
        @endforelse
    </section>

    {{-- PAGINATION --}}

    @if (method_exists($histories, 'links'))
        <div class="mt-6">
            {{ $histories->links() }}
        </div>
    @endif
@endsection
