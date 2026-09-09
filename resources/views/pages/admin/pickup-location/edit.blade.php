@extends('layouts.admin')
@section('content')
    <section class="w-full">


        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('pickup-location.index') }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Pickup Locations</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <a href="{{ route('pickup-location.show', $pickupLocation->id) }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">{{ $pickupLocation->name }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>Profile</span>                
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Profile Pickup
                    Location</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola informasi dasar dan identitas pickup
                    location.</p>
            </div>
        </div>

        {{-- FORM --}}

        <form action="{{ route('pickup-location.addprofile', $pickupLocation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                {{-- PROFILE INFORMATION --}}

                <div class="lg:col-span-2">
                    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Profile</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Ubah informasi dasar yang digunakan
                                untuk mengenali pickup location.</p>
                        </div>

                        <div class="space-y-5 p-5 sm:p-6">

                            {{-- NAME --}}

                            <div>
                                <label for="name"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Pickup
                                    Location</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $pickupLocation->name) }}" required
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                @error('name')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}

                            <div>
                                <label for="description"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
                                <textarea name="description" id="description" rows="6" required
                                    class="w-full resize-none rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm leading-6 text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('description', $pickupLocation->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- STATUS --}}

                <div class="space-y-6">
                    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-600">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Status</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tentukan apakah pickup location dapat
                                digunakan.</p>
                        </div>

                        <div class="p-5">
                            <label for="status"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Status Pickup
                                Location</label>
                            <select name="status" id="status"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                                <option value="Active"
                                    {{ old('status', $pickupLocation->status) === 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="Inactive"
                                    {{ old('status', $pickupLocation->status) === 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- ACTION --}}

                    <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-800">
                        <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 11.25h1.5v4.5h-1.5v-4.5Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                            </svg>
                            <div>
                                <p class="text-xs font-medium text-gray-600 dark:text-gray-300">Informasi</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">Perubahan pada profile
                                    hanya memengaruhi identitas dan status pickup location.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER ACTION --}}

            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('pickup-location.show', $pickupLocation->id) }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    Simpan Perubahan
                </button>
            </div>
        </form>

        {{-- DANGER ZONE --}}

        <div class="mt-10 rounded-2xl border border-red-200 bg-white dark:border-red-900/50 dark:bg-gray-700">
            <div class="border-b border-red-100 p-5 dark:border-red-900/50 sm:p-6">
                <h2 class="text-base font-semibold text-red-600 dark:text-red-400">Zona Berbahaya</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tindakan di bagian ini tidak dapat dibatalkan
                    dengan mudah.</p>
            </div>

            <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">
                <div>
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Hapus Pickup Location</h3>
                    <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">Pickup location akan dihapus dari
                        sistem beserta relasi kendaraan yang terkait.</p>
                </div>

                <button type="button"
                    class="inline-flex w-full shrink-0 items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-600/20 sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21.75H8.084a2.25 2.25 0 0 1-2.244-2.077L4.77 5.79m14.458 0a48.108 48.108 0 0 0-3.478-.397m-10.98.562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m0 0V4.5A2.25 2.25 0 0 1 11.52 2.25h.96a2.25 2.25 0 0 1 2.25 2.25v.893m-7.5 0a48.667 48.667 0 0 1 7.5 0" />
                    </svg>
                    Hapus Pickup Location
                </button>
            </div>
        </div>

    </section>
@endsection
