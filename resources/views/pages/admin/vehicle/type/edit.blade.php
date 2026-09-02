@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                    <a href="{{ route('vehicle-type.index') }}"
                        class="transition hover:text-gray-700 dark:hover:text-gray-200">Vehicle Types</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                    </svg>
                    <span>{{ $vehicleType->name }}</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Edit Tipe Kendaraan
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Perbarui informasi tipe kendaraan yang tersedia
                    pada sistem.</p>
            </div>
        </div>

        {{-- FORM --}}

        <form action="{{ route('vehicle-type.update', $vehicleType->id) }}" method="POST" onsubmit="return confirm('simpan perubahan?')">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                {{-- TYPE INFORMATION --}}

                <div class="lg:col-span-2">

                    <div class="rounded-2xl bg-gray-50 dark:bg-gray-700">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-600 sm:p-6">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi Vehicle Type</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Masukkan informasi dasar untuk jenis
                                kendaraan ini.</p>
                        </div>

                        <div class="space-y-5 p-5 sm:p-6">

                            {{-- NAME --}}

                            <div>
                                <label for="name"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Nama
                                    Tipe</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $vehicleType->name) }}" placeholder="Contoh: SUV, MPV, Sedan"
                                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                @error('name')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- DESCRIPTION --}}

                            <div>
                                <label for="description"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
                                <textarea name="description" id="description" rows="6" placeholder="Jelaskan tipe kendaraan ini..."
                                    class="w-full resize-none rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm leading-6 text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('description', $vehicleType->description) }}</textarea>
                                @error('description')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- SIDE INFORMATION --}}

                <div class="space-y-6">

                    {{-- STATUS --}}

                    <section
                        class="rounded-2xl border border-gray-100 bg-gray-50 p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                        <div class="mb-6">
                            <h2 class="mt-4 font-bold text-gray-800 dark:text-white">Status</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Aktifkan atau nonaktifkan tipe
                                kendaraan.</p>
                        </div>
                        <div class="mt-5">
                            <label for="status"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" id="status"
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                                <option value="Inactive" @selected($vehicleType->status == 'Inactive') >Tidak Aktif</option>
                                <option value="Active" @selected($vehicleType->status == 'Active')>Aktif</option>
                            </select>
                        </div>
                    </section>

                    {{-- <section class="rounded-2xl dark:border border-gray-200 bg-gray-50 dark:border-gray-600 dark:bg-gray-700">
                        <div class="border-b border-gray-200 p-5 dark:border-gray-600">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-white">Informasi</h2>
                        </div>

                        <div class="space-y-4 p-5">
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm text-gray-500 dark:text-gray-400">ID</span>
                                <span
                                    class="text-sm font-medium text-gray-800 dark:text-white">#{{ $vehicleType->id }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Kendaraan</span>
                                <span
                                    class="text-sm font-medium text-gray-800 dark:text-white">{{ $vehicleType->vehicles_count ?? $vehicleType->vehicles->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Dibuat</span>
                                <span
                                    class="text-right text-xs text-gray-500 dark:text-gray-400">{{ $vehicleType->created_at?->format('d M Y, H:i') ?? '-' }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Diperbarui</span>
                                <span
                                    class="text-right text-xs text-gray-500 dark:text-gray-400">{{ $vehicleType->updated_at?->format('d M Y, H:i') ?? '-' }}</span>
                            </div>
                        </div>
                    </section> --}}
                </div>
            </div>
            {{-- ACTION --}}

            <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('vehicle-type.index') }}"
                    class="inline-flex w-full items-center justify-center rounded-xl border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 sm:w-auto">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                    Simpan Perubahan
                </button>
            </div>
        </form>

        {{-- DELETE --}}

        <div class="mt-6 rounded-2xl dark:border border-red-100 bg-gray-50 dark:border-red-500/20 dark:bg-gray-700">
            <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">
                <div>
                    <h2 class="text-sm font-semibold text-red-600 dark:text-red-400">Hapus Tipe Kendaraan</h2>
                    <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                        Tipe kendaraan akan dihapus secara permanen. Pastikan tipe ini tidak sedang digunakan oleh
                        kendaraan.
                    </p>
                </div>

                <form action="{{ route('vehicle-type.destroy', $vehicleType->id) }}" method="POST"
                    onsubmit="return confirm('Hapus tipe kendaraan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl px-3.5 py-2.5 text-xs font-semibold text-red-600 transition hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21H8.084a2.25 2.25 0 0 1-2.244-1.327L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12.28.397c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.78 0V4.5A2.25 2.25 0 0 0 13.5 2.25h-3A2.25 2.25 0 0 0 8.25 4.5v.898m7.78 0a48.667 48.667 0 0 0-7.78 0" />
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>

    </section>
@endsection
