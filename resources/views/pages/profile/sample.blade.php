@extends('layouts.admin')

@section('content') <section class="w-full">
        {{-- HEADER --}} <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400"> <a
                        href="{{ url()->previous() }}"
                        class="truncate transition hover:text-gray-700 dark:hover:text-gray-200">Kembali</a> <svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg> <span class="truncate">{{ $user->name }}</span> </div>
                <h1 class="truncate text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Profil </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Informasi singkat tentang pengguna. </p>
            </div>


            <a href="{{ url()->previous() }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                Kembali
            </a>
        </div>

        {{-- PROFILE OVERVIEW --}}
        <div class="mt-6 rounded-2xl bg-white p-4 dark:bg-gray-700 sm:p-5">
            <div class="flex items-center gap-4">
                <div class="h-14 w-14 shrink-0 overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600 sm:h-16 sm:w-16">
                    <img src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('images/default-profile.png') }}"
                        alt="{{ $user->name }}" class="h-full w-full object-cover">
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex flex-wrap items-center gap-2">
                        <h2 class="truncate text-lg font-bold text-gray-800 dark:text-white sm:text-xl">
                            {{ $user->mitraIdentity?->full_name ?? $user->name }}
                        </h2>

                        @if ($user->mitra_status === 'Verified')
                            <span
                                class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-white dark:text-gray-800">
                                Mitra
                            </span>
                        @endif
                    </div>

                    <p class="mt-0.5 truncate text-xs text-gray-500 dark:text-gray-400 sm:text-sm">
                        {{ $user->mitraIdentity?->email ?? $user->email }}
                    </p>
                </div>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
            {{-- LEFT CONTENT --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- ABOUT USER --}}
                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-4 dark:border-gray-600 sm:p-5">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Tentang Pengguna</h2>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">
                            Informasi yang dapat dilihat oleh pengguna lain.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 sm:p-5">
                        <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-600/60">
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white text-gray-500 dark:bg-gray-700 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                    </svg>
                                </span>
                                <div class="min-w-0">
                                    <p class="text-[10px] text-gray-400 dark:text-gray-400">Nama</p>
                                    <p class="truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $user->mitraIdentity?->full_name ?? $user->name }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-600/60">
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white text-gray-500 dark:bg-gray-700 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75m19.5 0-9.75 6-9.75-6" />
                                    </svg>
                                </span>
                                <div class="min-w-0">
                                    <p class="text-[10px] text-gray-400 dark:text-gray-400">Email</p>
                                    <p class="truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $user->mitraIdentity?->email ?? $user->email }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if ($user->mitra_status === 'Verified' && $user->mitraIdentity?->telp)
                            <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-600/60">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white text-gray-500 dark:bg-gray-700 dark:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.09l-4.423-.?..." />
                                        </svg>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="text-[10px] text-gray-400 dark:text-gray-400">Telepon</p>
                                        <p class="truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                            {{ $user->mitraIdentity->telp }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="rounded-xl bg-gray-50 p-3 dark:bg-gray-600/60">
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white text-gray-500 dark:bg-gray-700 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 6.75h7.5M8.25 10.5h7.5m-7.5 3.75h4.5M6 3.75h12A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75Z" />
                                    </svg>
                                </span>
                                <div class="min-w-0">
                                    <p class="text-[10px] text-gray-400 dark:text-gray-400">Bergabung</p>
                                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $user->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MITRA VEHICLES --}}
                @if ($user->mitra_status === 'Verified')
                    <section>
                        <div class="mb-4 flex items-end justify-between gap-4">
                            <div>
                                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">
                                    Kendaraan yang Dikelola
                                </h2>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">
                                    Kendaraan yang disediakan oleh mitra ini.
                                </p>
                            </div>

                            @if ($user->vehicles->count() > 0)
                                <a href="{{ route('vehicles.index', ['owner' => $user->id]) }}"
                                    class="shrink-0 text-xs font-semibold text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                    Lihat semua
                                </a>
                            @endif
                        </div>

                        <div class="grid grid-cols-2 gap-3 md:grid-cols-3 md:gap-4 lg:grid-cols-4">
                            @forelse ($user->vehicles->take(4) as $vehicle)
                                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                                    class="group overflow-hidden rounded-2xl border border-gray-100 bg-white transition hover:border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500">
                                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 dark:bg-gray-600">
                                        <img src="{{ asset('storage/' . $vehicle->profile) }}"
                                            alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                            class="h-full w-full object-cover transition duration-300 group-hover:scale-105">

                                        <span
                                            class="absolute left-2 top-2 rounded-full bg-white/90 px-2 py-1 text-[9px] font-semibold text-gray-700 backdrop-blur dark:bg-gray-800/90 dark:text-gray-200">
                                            {{ $vehicle->type->name }}
                                        </span>
                                    </div>

                                    <div class="p-3">
                                        <div class="flex items-start justify-between gap-2">
                                            <h3
                                                class="truncate text-xs font-bold text-gray-800 dark:text-white sm:text-sm">
                                                {{ $vehicle->brand }} {{ $vehicle->model }}
                                            </h3>

                                            <span class="shrink-0 text-[9px] font-medium text-gray-400">
                                                {{ $vehicle->seats }} Kursi
                                            </span>
                                        </div>

                                        <div class="mt-3 flex items-center gap-2">
                                            <div
                                                class="h-7 w-7 shrink-0 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-500">
                                                <img src="{{ $vehicle->owner->profile ? asset('storage/' . $vehicle->owner->profile) : asset('images/default-profile.png') }}"
                                                    alt="{{ $vehicle->owner->name }}" class="h-full w-full object-cover">
                                            </div>

                                            <div class="min-w-0">
                                                <p class="text-[9px] text-gray-400">Pemilik</p>
                                                <p class="truncate text-xs font-medium text-gray-700 dark:text-gray-200">
                                                    {{ $vehicle->owner->name }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mt-3 border-t border-gray-100 pt-2.5 dark:border-gray-600">
                                            <span class="text-xs font-semibold text-gray-700 dark:text-gray-200">
                                                {{ $vehicle->deposit_amount ? 'Deposit Rp ' . number_format($vehicle->deposit_amount, 0, ',', '.') : 'Tanpa deposit' }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="col-span-full rounded-2xl bg-gray-50 p-6 text-center dark:bg-gray-800">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Belum ada kendaraan yang dikelola.
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    </section>
                @endif
            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="space-y-6">

                {{-- MITRA PROFILE --}}
                @if ($user->mitra_status === 'Verified')
                    <div class="rounded-2xl bg-white p-4 dark:bg-gray-700">
                        <div class="mb-4 flex items-center gap-3">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-white dark:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                </svg>
                            </span>

                            <div>
                                <h2 class="text-sm font-bold text-gray-800 dark:text-white">
                                    Profil Mitra
                                </h2>
                                <p class="text-[11px] text-gray-400">
                                    Penyedia kendaraan di RentalCar
                                </p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div
                                class="flex items-center justify-between gap-4 rounded-xl bg-gray-50 px-3 py-2.5 dark:bg-gray-600/60">
                                <span class="text-xs text-gray-500 dark:text-gray-400">Nama Lengkap</span>
                                <span
                                    class="max-w-[55%] truncate text-right text-xs font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $user->mitraIdentity->full_name }}
                                </span>
                            </div>

                            <div
                                class="flex items-center justify-between gap-4 rounded-xl bg-gray-50 px-3 py-2.5 dark:bg-gray-600/60">
                                <span class="text-xs text-gray-500 dark:text-gray-400">Email</span>
                                <span
                                    class="max-w-[55%] truncate text-right text-xs font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $user->mitraIdentity->email }}
                                </span>
                            </div>

                            <div
                                class="flex items-center justify-between gap-4 rounded-xl bg-gray-50 px-3 py-2.5 dark:bg-gray-600/60">
                                <span class="text-xs text-gray-500 dark:text-gray-400">Telepon</span>
                                <span class="text-right text-xs font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $user->mitraIdentity->telp }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- USER ACTION --}}
                @if ($user->id == auth()->user()->id)
                    <div class="rounded-2xl bg-white p-4 dark:bg-gray-700">
                        <div class="flex items-center gap-3">
                            <span
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.888 1.888m-1.888-1.888L8.25 13.5l-.75 3 3-.75 8.612-8.613a1.5 1.5 0 0 0 0-2.121Z" />
                                </svg>
                            </span>

                            <a href="{{ route('user.edit', $user->id) }}" class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                    Edit Profil
                                </p>
                                <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-400">
                                    Ubah informasi profil kamu.
                                </p>
                            </a>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>


@endsection
