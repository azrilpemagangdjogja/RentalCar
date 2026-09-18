@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('user.index') }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">User</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>{{ $user->name }}</span>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                    Detail User
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Informasi lengkap mengenai akun dan aktivitas user.
                </p>
            </div>

            {{-- ACTION HEADER --}}

        </div>

        {{-- PROFILE HEADER --}}

        <div class="mb-6 overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

            <div class="p-5 sm:p-6">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                    {{-- PROFILE IMAGE --}}

                    <div class="shrink-0">
                        <img src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('images/default-profile.png') }}"
                            alt="{{ $user->name }}"
                            class="h-20 w-20 rounded-2xl object-cover ring-4 ring-gray-100 dark:ring-gray-600 sm:h-24 sm:w-24">
                    </div>

                    {{-- USER NAME --}}

                    <div class="min-w-0 flex-1">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                            <h2 class="truncate text-xl font-bold text-gray-800 dark:text-white sm:text-2xl">
                                {{ $user->name }}
                            </h2>

                            <span
                                class="inline-flex w-fit rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                {{ $user->role }}
                            </span>
                        </div>

                        <p class="mt-1 truncate text-sm text-gray-500 dark:text-gray-400">
                            {{ $user->email }}
                        </p>

                        <div class="mt-3 flex flex-wrap items-center gap-2">

                            {{-- MITRA STATUS --}}

                            @if ($user->mitra_status === 'Verified')
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                                    <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                    Mitra Verified
                                </span>
                            @elseif ($user->mitra_status === 'Pending')
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-gray-200 px-2.5 py-1 text-[10px] font-semibold text-gray-700 dark:bg-gray-500 dark:text-gray-100">
                                    <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                    Mitra Pending
                                </span>
                            @elseif ($user->mitra_status === 'Rejected')
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-gray-200 px-2.5 py-1 text-[10px] font-semibold text-gray-700 dark:bg-gray-500 dark:text-gray-100">
                                    <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                    Mitra Ditolak
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                    <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                    Bukan Mitra
                                </span>
                            @endif

                            {{-- EMAIL VERIFIED --}}

                            @if ($user->email_verified_at)
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs text-gray-500 dark:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 4.5 4.5 10.5-10.5" />
                                    </svg>
                                    Email terverifikasi
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs text-gray-400 dark:text-gray-500">
                                    Email belum terverifikasi
                                </span>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- MAIN CONTENT --}}

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- LEFT CONTENT --}}

            <div class="space-y-6 lg:col-span-2">

                {{-- ACCOUNT INFORMATION --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Informasi Akun
                        </h2>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Informasi dasar mengenai akun user.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-5 p-5 sm:grid-cols-2 sm:p-6">

                        {{-- NAME --}}

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                Nama Lengkap
                            </p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->name }}
                            </p>
                        </div>

                        {{-- EMAIL --}}

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                Email
                            </p>
                            <p class="mt-1 break-all text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->email }}
                            </p>
                        </div>

                        {{-- PHONE --}}

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                Nomor Telepon
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->telp ?? '-' }}
                            </p>
                        </div>

                        {{-- ROLE --}}

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                Role
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->role }}
                            </p>
                        </div>

                        {{-- USER ID --}}

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                User ID
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                #{{ $user->id }}
                            </p>
                        </div>

                        {{-- CREATED AT --}}

                        <div>
                            <p class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                Terdaftar Sejak
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->created_at?->format('d M Y, H:i') ?? '-' }}
                            </p>
                        </div>

                    </div>
                </div>

                {{-- MITRA INFORMATION --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Informasi Mitra
                        </h2>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Status dan hubungan user dengan sistem mitra.
                        </p>
                    </div>

                    <div class="p-5 sm:p-6">

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            {{-- STATUS --}}

                            <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                                <p class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                    Status Mitra
                                </p>

                                <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">
                                    {{ $user->mitra_status }}
                                </p>
                            </div>

                            {{-- MITRA --}}

                            <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                                <p class="text-xs font-medium text-gray-400 dark:text-gray-500">
                                    Keanggotaan Mitra
                                </p>

                                <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">
                                    @if ($user->ownedMitra)
                                        Pemilik Mitra
                                    @elseif ($user->joinedMitra)
                                        Anggota Mitra
                                    @else
                                        Belum Bergabung
                                    @endif
                                </p>
                            </div>

                        </div>

                        {{-- MITRA DETAIL --}}

                        @if ($user->ownedMitra)

                            <div class="mt-5 rounded-xl border border-gray-200 p-4 dark:border-gray-600">

                                <div class="flex items-center gap-3">

                                    <img src="{{ asset($user->ownedMitra->profile ?? 'images/mitra-default.png') }}"
                                        alt="{{ $user->ownedMitra->name }}"
                                        class="h-12 w-12 rounded-xl object-cover">

                                    <div class="min-w-0">
                                        <p class="text-xs text-gray-400 dark:text-gray-500">
                                            Mitra yang dimiliki
                                        </p>

                                        <p class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                            {{ $user->ownedMitra->name }}
                                        </p>
                                    </div>

                                </div>

                            </div>

                        @elseif ($user->joinedMitra)

                            <div class="mt-5 rounded-xl border border-gray-200 p-4 dark:border-gray-600">

                                <div class="flex items-center gap-3">

                                    <img src="{{ asset($user->joinedMitra->profile ?? 'images/mitra-default.png') }}"
                                        alt="{{ $user->joinedMitra->name }}"
                                        class="h-12 w-12 rounded-xl object-cover">

                                    <div class="min-w-0">
                                        <p class="text-xs text-gray-400 dark:text-gray-500">
                                            Bergabung dengan
                                        </p>

                                        <p class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                            {{ $user->joinedMitra->name }}
                                        </p>
                                    </div>

                                </div>

                            </div>

                        @else

                            <div class="mt-5 rounded-xl bg-gray-50 p-4 dark:bg-gray-800">

                                <div class="flex gap-3">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor"
                                        class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 0 0 3.75-1.67M18 18.72a9.094 9.094 0 0 1-12 0M18 18.72V21m-12-2.28V21m12-2.28a9.094 9.094 0 0 0 3.75-1.67M6 18.72a9.094 9.094 0 0 1-3.75-1.67M15 6.75a3 3 0 1 1-6 0ZM21 12a3 3 0 1 1-6 0M3 12a3 3 0 1 1-6 0" />
                                    </svg>

                                    <div>
                                        <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Belum memiliki hubungan dengan mitra
                                        </p>

                                        <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                                            User ini belum memiliki atau bergabung dengan mitra.
                                        </p>
                                    </div>

                                </div>

                            </div>

                        @endif

                    </div>
                </div>

                {{-- ACTIVITY --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Aktivitas Akun
                        </h2>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Informasi aktivitas terakhir user.
                        </p>
                    </div>

                    <div class="divide-y divide-gray-100 dark:divide-gray-600">

                        {{-- LAST LOGIN --}}

                        <div class="flex items-center justify-between gap-4 p-5 sm:p-6">
                            <div>
                                <p class="text-sm font-medium text-gray-800 dark:text-white">
                                    Login terakhir
                                </p>

                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    Waktu terakhir akun digunakan untuk login.
                                </p>
                            </div>

                            <p class="shrink-0 text-right text-xs text-gray-500 dark:text-gray-400">
                                {{ $user->last_login_at?->format('d M Y, H:i') ?? 'Belum pernah' }}
                            </p>
                        </div>

                        {{-- EMAIL VERIFICATION --}}

                        <div class="flex items-center justify-between gap-4 p-5 sm:p-6">
                            <div>
                                <p class="text-sm font-medium text-gray-800 dark:text-white">
                                    Verifikasi email
                                </p>

                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    Status verifikasi alamat email.
                                </p>
                            </div>

                            @if ($user->email_verified_at)
                                <span
                                    class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                                    Terverifikasi
                                </span>
                            @else
                                <span
                                    class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-300">
                                    Belum
                                </span>
                            @endif
                        </div>

                        {{-- CREATED --}}

                        <div class="flex items-center justify-between gap-4 p-5 sm:p-6">
                            <div>
                                <p class="text-sm font-medium text-gray-800 dark:text-white">
                                    Akun dibuat
                                </p>

                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    Waktu akun pertama kali dibuat.
                                </p>
                            </div>

                            <p class="shrink-0 text-right text-xs text-gray-500 dark:text-gray-400">
                                {{ $user->created_at?->format('d M Y, H:i') ?? '-' }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}

            <div class="space-y-6">

                {{-- ACCOUNT STATUS --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Status Akun
                        </h2>
                    </div>

                    <div class="space-y-4 p-5">

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Role
                            </span>

                            <span
                                class="rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                                {{ $user->role }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Mitra
                            </span>

                            <span class="text-sm font-medium text-gray-800 dark:text-white">
                                {{ $user->mitra_status }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Email
                            </span>

                            @if ($user->email_verified_at)
                                <span class="text-xs font-medium text-gray-700 dark:text-gray-200">
                                    Terverifikasi
                                </span>
                            @else
                                <span class="text-xs font-medium text-gray-400">
                                    Belum
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                {{-- QUICK ACTION --}}

                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Aksi User
                        </h2>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Kelola akun user ini.
                        </p>
                    </div>

                    <div class="space-y-2 p-5">

                        <a href="{{ route('user.edit', $user->id) }}"
                            class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487 18.75 6.375m-1.888-1.888L8.25 13.5l-.75 3 3-.75 8.612-8.613a1.5 1.5 0 0 0 0-2.121Z" />
                            </svg>
                            Edit informasi user
                        </a>

                        @if ($conversation)
                            <a href="{{ route('message.show', $user->id) }}"
                        
                        @else
                            <a href="{{ route('message.create', $user->id) }}"
                                
                        @endif
                            class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75M5.25 10.5h13.5l-1.5 10.5h-10.5l-1.5-10.5Z" />
                            </svg>
                            Reset password
                        </a>

                        <button type="button"
                            class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-left text-sm font-medium text-red-600 transition hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-500/10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.75 9.75v9.75A2.25 2.25 0 0 1 16.5 21h-9a2.25 2.25 0 0 1-2.25-2.25V9.75m13.5 0H4.5m12 0 1.5-3h-3.75m-6 3-1.5-3H10.5m-3 0h9m-4.5 3v6m-3-6v6m6-6v6" />
                            </svg>
                            Nonaktifkan akun
                        </button>

                    </div>
                </div>

                {{-- SYSTEM INFORMATION --}}

                <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-800">

                    <div class="flex gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor"
                            class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25h1.5v4.5h-1.5v-4.5Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                        </svg>

                        <div>
                            <p class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                Informasi sistem
                            </p>

                            <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                                Data pada halaman ini berasal dari akun user yang tersimpan di sistem.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection