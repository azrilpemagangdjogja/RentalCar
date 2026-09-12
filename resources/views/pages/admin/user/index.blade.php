@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="#" class="transition hover:text-gray-700 dark:hover:text-gray-200">Pengelolaan</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>User</span>
                </div>
                <h1 class="text-2xl mt-2 font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Kelola Users</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola akun pengguna, role, dan status keanggotaan
                    mitra.</p>
            </div>

            <a href="{{ route('user.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-gray-700 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                </svg>
                Tambah User
            </a>

        </div>

        {{-- STATISTICS --}}

        <div class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-4">

            {{-- TOTAL USERS --}}

            <div class="rounded-2xl dark:border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Users</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalUsers }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- USERS --}}

            <div class="rounded-2xl dark:border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">User</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalRoleUsers }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0M4.5 20.25a7.5 7.5 0 0 1 7.5-7.5 7.5 7.5 0 0 1 7.5 7.5M19.5 9.75a2.25 2.25 0 1 1-4.5 0" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- ADMIN --}}

            <div class="rounded-2xl dark:border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Admin</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalRoleAdmins }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0M4.5 20.25a7.5 7.5 0 0 1 7.5-7.5 7.5 7.5 0 0 1 15 0M12 14.25v6" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- MITRA PENDING --}}

            <div class="rounded-2xl dark:border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Superadmin</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $totalRoleSuperadmins }}</p>
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

        </div>

        {{-- USERS LIST --}}

        <div class="mt-8">

            {{-- LIST HEADER --}}

            <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white">Daftar Users</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola seluruh akun pengguna yang terdaftar.
                    </p>
                </div>

                <span class="text-xs text-gray-400 dark:text-gray-500">128 pengguna</span>
            </div>

            {{-- SEARCH & FILTER --}}

            <div class="mb-4 flex flex-col gap-3 sm:flex-row">

                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Cari nama, email, atau nomor telepon..."
                        class="w-full rounded-xl dark:border border-gray-200 bg-white py-3.5 pl-12 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
                </div>

                <select
                    class="rounded-xl dark:border border-gray-200 bg-white px-4 py-3.5 text-sm text-gray-700 outline-none transition focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:focus:border-gray-300">
                    <option>Semua Role</option>
                    <option>User</option>
                    <option>Admin</option>
                    <option>Superadmin</option>
                </select>

                <select
                    class="rounded-xl dark:border border-gray-200 bg-white px-4 py-3.5 text-sm text-gray-700 outline-none transition focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:focus:border-gray-300">
                    <option>Semua Status</option>
                    <option>Unverified</option>
                    <option>Pending</option>
                    <option>Verified</option>
                    <option>Rejected</option>
                </select>

            </div>

            {{-- TABLE HEADER --}}

            {{-- <div
                class="hidden rounded-t-2xl dark:border border-gray-200 bg-white px-4 py-3 dark:border-gray-600 dark:bg-gray-800 sm:flex sm:items-center sm:gap-5">

                <div class="w-72 text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                    User
                </div>

                <div class="flex-1 text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                    Telepon
                </div>

                <div class="w-24 text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                    Role
                </div>

                <div class="w-28 text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                    Mitra
                </div>

                <div class="w-32 text-[10px] font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                    Login terakhir
                </div>

                <div class="w-9"></div>
            </div> --}}

            {{-- USER LIST --}}

            <div
                class="overflow-hidden rounded-2xl dark:border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700 sm:rounded-t-none">

                {{-- USER ROW --}}

                @forelse ($users as $items)
                    <div
                        class="group border-b border-gray-100 p-4 transition hover:bg-white dark:border-gray-600 dark:hover:bg-gray-600 sm:flex sm:items-center sm:gap-5">

                        {{-- PROFILE + ACTION --}}

                        <div class="flex items-center justify-between gap-3 sm:w-72">
                            <div class="flex min-w-0 items-center gap-3">
                                <img src="{{ $items->profile ? asset('storage/' . $items->profile) : 'images/default-profile.png' }}" class="h-11 w-11 shrink-0 rounded-xl object-cover">

                                <div class="min-w-0">
                                    <h3 class="truncate text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $items->name }}
                                    </h3>
                                    <p class="truncate text-xs text-gray-500 dark:text-gray-400">
                                        {{ $items->email }}
                                    </p>
                                </div>
                            </div>

                            {{-- ACTION MOBILE --}}

                            <a href="{{ route('user.show', $items->id) }}" class="md:hidden">></a>
                        </div>

                        {{-- MOBILE INFORMATION --}}

                        <div class="mt-4 grid grid-cols-2 gap-x-4 gap-y-3 sm:mt-0 sm:contents">

                            {{-- PHONE --}}

                            <div class="sm:flex-1">
                                <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500 sm:hidden">
                                    Telepon
                                </p>
                                <p class="mt-0.5 truncate text-sm text-gray-600 dark:text-gray-300">
                                    {{ $items->telp }}
                                </p>
                            </div>

                            {{-- ROLE --}}

                            <div class="sm:w-24">
                                <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500 sm:hidden">
                                    Role
                                </p>
                                @if ($items->role == 'Superadmin' || $items->role == 'Admin')
                                    <span
                                        class="mt-0.5 inline-flex rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-white dark:text-gray-800">
                                        {{ $items->role }}
                                    </span>
                                @else
                                    <span
                                        class="mt-0.5 inline-flex rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-800 dark:bg-gray-600 dark:text-gray-200">
                                        {{ $items->role }}
                                    </span>
                                @endif
                            </div>

                            {{-- MITRA STATUS --}}

                            <div class="sm:w-28">
                                <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500 sm:hidden">
                                    Mitra
                                </p>
                                @if ($items->mitra_status == 'Verified')
                                    <span
                                        class="mt-0.5 inline-flex rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-white dark:text-gray-800">
                                        Mitra
                                    </span>
                                @else
                                    <span
                                        class="mt-0.5 inline-flex rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-800 dark:bg-gray-600 dark:text-gray-200">
                                        Bukan Mitra
                                    </span>
                                @endif
                            </div>

                            {{-- LAST LOGIN --}}

                            <div class="sm:w-32">
                                <p class="text-[10px] font-medium text-gray-400 dark:text-gray-500 sm:hidden">
                                    Login terakhir
                                </p>
                                <p class="mt-0.5 truncate text-xs text-gray-500 dark:text-gray-400">
                                    {{ $items->last_login_at }}
                                </p>
                            </div>

                        </div>

                        {{-- ACTION DESKTOP --}}

                        <div class="hidden items-center justify-end sm:flex">
                            <a href="{{ route('user.show', $items->id) }}"
                                class="rounded-lg p-2 text-gray-500 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                            <a href="{{ route('user.edit', $items->id) }}"
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
                    </div>
                @empty
                @endforelse
            </div>
        </div>



        {{-- PAGINATION PLACEHOLDER --}}

        <div class="mt-5 flex items-center justify-between">
            <p class="text-xs text-gray-400 dark:text-gray-500">Menampilkan 1–4 dari 128 pengguna</p>

            <div class="flex items-center gap-2">
                <button type="button"
                    class="flex h-9 w-9 items-center justify-center rounded-lg dark:border border-gray-200 text-gray-400 dark:border-gray-600 dark:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15 19-7-7 7-7" />
                    </svg>
                </button>

                <span class="text-xs font-medium text-gray-600 dark:text-gray-300">Halaman 1 dari 32</span>

                <button type="button"
                    class="flex h-9 w-9 items-center justify-center rounded-lg dark:border border-gray-200 text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

    </section>
@endsection
