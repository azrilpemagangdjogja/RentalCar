@extends('layouts.admin')

@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8">
            <div class="mb-2">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-gray-800 dark:text-gray-400 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                    Kembali
                </a>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                Tambah User
            </h1>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Buat akun user baru dan tentukan informasi serta hak aksesnya.
            </p>
        </div>

        {{-- FORM --}}

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- PROFILE INFORMATION --}}

            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Informasi Profil
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Masukkan informasi dasar mengenai user.
                    </p>
                </div>

                <div class="space-y-5 p-5 sm:p-6">

                    {{-- PROFILE --}}

                    <div>
                        <label for="profile" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Foto Profil
                        </label>

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                            <div
                                class="flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                                <img src="{{ asset('images/default-profile.png') }}" alt="Preview"
                                    class="h-full w-full object-cover">
                            </div>

                            <div class="flex-1">
                                <input type="file" name="profile" id="profile" accept="image/*"
                                    class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-gray-50 dark:file:text-gray-800">

                                <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">
                                    JPG, JPEG, PNG. Maksimal ukuran file 2 MB.
                                </p>

                                @error('profile')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- NAME --}}

                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama Lengkap
                        </label>

                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                            placeholder="Contoh: Ahmad Fauzan"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- EMAIL + PHONE --}}

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Email
                            </label>

                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                placeholder="nama@example.com"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('email')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="telp" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nomor Telepon
                            </label>

                            <input type="text" name="telp" id="telp" value="{{ old('telp') }}"
                                placeholder="081234567890"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('telp')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </div>
            </div>

            {{-- ACCESS INFORMATION --}}

            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Hak Akses
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Tentukan role dan status mitra untuk akun ini.
                    </p>
                </div>

                <div class="space-y-5 p-5 sm:p-6">

                    {{-- ROLE --}}

                    <div>
                        <label for="role" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Role
                        </label>

                        <select name="role" id="role" required
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-800 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10 ">

                            <option value="" class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white" disabled {{ old('role') ? '' : 'selected' }}>
                                Pilih role
                            </option>

                            <option value="User" class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white" {{ old('role') === 'User' ? 'selected' : '' }}>
                                User
                            </option>

                            <option value="Admin" class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white" {{ old('role') === 'Admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="Superadmin" class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white" {{ old('role') === 'Superadmin' ? 'selected' : '' }}>
                                Superadmin
                            </option>

                        </select>

                        <p class="mt-2 text-xs leading-5 text-gray-400 dark:text-gray-500">
                            Superadmin memiliki hak akses paling tinggi. Berikan role sesuai kebutuhan.
                        </p>

                        @error('role')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- MITRA STATUS --}}

                    <div>
                        <label for="mitra_status" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status Mitra
                        </label>

                        <select name="mitra_status" id="mitra_status" required
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-800 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            <option value="Unverified" class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white"
                                {{ old('mitra_status', 'Unverified') === 'Unverified' ? 'selected' : '' }}>
                                Unverified
                            </option>

                            <option value="Verified" class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white" {{ old('mitra_status') === 'Verified' ? 'selected' : '' }}>
                                Verified
                            </option>

                            <option value="Pending" class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white" {{ old('mitra_status') === 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Rejected" class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white" {{ old('mitra_status') === 'Rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>

                        </select>

                        <p class="mt-2 text-xs leading-5 text-gray-400 dark:text-gray-500">
                            Status ini digunakan untuk proses verifikasi user sebagai mitra.
                        </p>

                        @error('mitra_status')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- PASSWORD --}}

            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

                <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Keamanan Akun
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Tentukan password yang akan digunakan user untuk masuk ke sistem.
                    </p>
                </div>

                <div class="p-5 sm:p-6">

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        {{-- PASSWORD --}}

                        <div>
                            <label for="password" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Password
                            </label>

                            <input type="password" name="password" id="password" required
                                placeholder="Masukkan password"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">

                            @error('password')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- CONFIRM PASSWORD --}}

                        <div>
                            <label for="password_confirmation"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Konfirmasi Password
                            </label>

                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                placeholder="Ulangi password"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:bg-gray-800 dark:focus:ring-gray-300/10">
                        </div>

                    </div>

                    <div class="mt-5 flex gap-3 rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-500 dark:text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                        </svg>

                        <p class="text-xs leading-5 text-gray-500 dark:text-gray-400">
                            Gunakan password yang kuat dan jangan membagikan password kepada orang lain.
                        </p>
                    </div>

                </div>
            </div>

            {{-- ACTION --}}

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a href="{{ url()->previous() }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">
                    Batal
                </a>

                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    Simpan User
                </button>

            </div>

        </form>

    </section>
@endsection
