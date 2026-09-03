@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('user.index') }}"
                        class="truncate transition hover:text-gray-700 dark:hover:text-gray-200">Pengguna</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span class="truncate">{{ $user->name }}</span>
                </div>

                <h1 class="truncate text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Profil Pengguna
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Informasi akun dan profil pengguna.
                </p>
            </div>

            <a href="{{ route('user.index') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                Kembali
            </a>
        </div>

        {{-- PROFILE OVERVIEW --}}

        <div class="mt-8 mb-6 rounded-2xl bg-white p-5 dark:bg-gray-700 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div class="h-16 w-16 shrink-0 overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                    <img src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('images/default-profile.png') }}"
                        alt="{{ $user->name }}" class="h-full w-full object-cover">
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="min-w-0">
                            <h2 class="truncate text-lg font-bold text-gray-800 dark:text-white">
                                {{ $user->name }}
                            </h2>
                            <p class="mt-1 truncate text-sm text-gray-500 dark:text-gray-400">
                                {{ $user->email }}
                            </p>
                        </div>

                        @if ($user->mitra_status == 'Verified')
                            <span
                                class="rounded-full w-auto bg-gray-800 px-3 py-1.5 text-xs font-semibold text-white dark:bg-white dark:text-gray-800">
                                Mitra
                            </span>
                        @elseif ($user->role == 'Admin' || $user->role == 'Superadmin')
                            <span
                                class="rounded-full w-auto bg-gray-800 px-3 py-1.5 text-xs font-semibold text-white dark:bg-white dark:text-gray-800">
                                Admin
                            </span>
                        @else
                            <span
                                class="rounded-full w-auto bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                Customer
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- MAIN CONTENT --}}

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- LEFT CONTENT --}}

            <div class="space-y-6 lg:col-span-2">

                {{-- PROFILE INFORMATION --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Profil</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Informasi dasar pengguna yang tersimpan di sistem.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 p-5 sm:grid-cols-2 sm:p-6">

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Nama</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Email</p>
                            <div class="mt-1 flex items-center gap-2">
                                <p class="text-sm font-medium text-gray-800 dark:text-white">
                                    {{ $user->email }}
                                </p>

                                @if ($user->email_verified_at)
                                    <span
                                        class="rounded-full bg-gray-100 px-2 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                        Terverifikasi
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">No. Telepon</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->telp ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Status Mitra</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->mitra_status }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Bergabung</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->created_at->format('d M Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-400">Terakhir Diperbarui</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->updated_at->format('d M Y') }}
                            </p>
                        </div>

                    </div>
                </div>

                {{-- ACCOUNT STATUS --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Status Akun</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Informasi status dan verifikasi akun pengguna.
                        </p>
                    </div>

                    <div class="divide-y divide-gray-100 dark:divide-gray-600">

                        <div class="flex items-center justify-end gap-4 p-6">
                            <div>
                                <p class="text-sm font-medium text-gray-700 dark:text-gray-200">Email</p>
                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                    Status verifikasi alamat email.
                                </p>
                            </div>

                            @if ($user->email_verified_at)
                                <span
                                    class="rounded-full bg-gray-800 px-3 py-1.5 text-xs font-semibold text-white dark:bg-white dark:text-gray-800">
                                    Terverifikasi
                                </span>
                            @else
                                <span
                                    class="rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                    Belum Terverifikasi
                                </span>
                            @endif
                        </div>

                        <div class="flex items-center justify-between gap-4 p-6">
                            <div>
                                <p class="text-sm font-medium text-gray-700 dark:text-gray-200">Status Mitra</p>
                                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                    Status pengajuan atau keanggotaan mitra.
                                </p>
                            </div>

                            <span
                                class="rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                {{ $user->mitra_status }}
                            </span>
                        </div>

                    </div>
                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}

            <div class="space-y-6">

                {{-- ACCOUNT INFORMATION --}}

                <div class="rounded-2xl bg-white dark:bg-gray-700">
                    <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Akun</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Informasi dasar akun pengguna.
                        </p>
                    </div>

                    <div class="p-5">

                        <div class="divide-y divide-gray-100 dark:divide-gray-600">

                            <div class="flex items-center justify-between gap-4 py-3 first:pt-0">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Peran</span>
                                <span class="text-right text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{ $user->role }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between gap-4 py-3">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Bergabung</span>
                                <span class="text-right text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{ $user->created_at->format('d M Y') }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between gap-4 py-3 last:pb-0">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Terakhir Login</span>
                                <span class="text-right text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{ $user->last_login_at ? $user->last_login_at->format('d M Y, H:i') : '-' }}
                                </span>
                            </div>

                        </div>

                    </div>
                </div>

                {{-- QUICKT ACTION --}}

                @if ($user->id == auth()->user()->id)
                    <div class="rounded-2xl bg-white dark:bg-gray-700">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Aksi Pengguna</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Kelola informasi dan akun pengguna.
                            </p>
                        </div>

                        <div class="space-y-1 p-4">

                            <a href="{{ route('user.edit', $user->id) }}"
                                class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">

                                <span
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.888 1.888m-1.888-1.888L8.25 13.5l-.75 3 3-.75 8.612-8.613a1.5 1.5 0 0 0 0-2.121Z" />
                                    </svg>
                                </span>

                                <span class="min-w-0 flex-1">
                                    <span class="block">Edit Profil</span>
                                    <span class="mt-0.5 block text-xs font-normal text-gray-400 dark:text-gray-400">
                                        Ubah informasi profil pengguna.
                                    </span>
                                </span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-4 w-4 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                                </svg>

                            </a>

                        </div>
                    </div>
                @endif

            </div>

        </div>

    </section>
@endsection
