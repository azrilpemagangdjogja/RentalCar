@extends('layouts.admin')
@section('content')

    <section class="w-full">

        {{-- HEADER --}}

        <section class="mb-6">
            <div class="flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                <a href="{{ route('landing.howto') }}"
                    class="transition hover:text-gray-700 dark:hover:text-gray-200">Landing Page</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                </svg>
                <span>How To Use</span>
            </div>
            <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Edit How To Use
            </h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Atur konten yang ditampilkan pada bagian cara
                menggunakan layanan RentalCar.</p>
        </section>

        {{-- VALIDATION ERROR --}}

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 dark:border-red-900/50 dark:bg-red-950/30">
                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 shrink-0 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.007v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                    </svg>
                    <div class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- FORM --}}

        @if ($howToUse)
            <form action="{{ route('landing.howto.update', $howToUse->id) }}" method="POST" class="w-full">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('landing.howto.create') }}" method="POST" class="w-full">
            @csrf
        @endif

        <div class="grid gap-6 lg:grid-cols-3">

            {{-- MAIN FORM --}}

            <div class="space-y-6 lg:col-span-2">

                {{-- CONTENT --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 6.75A2.25 2.25 0 0 1 6.75 4.5h10.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 17.25V6.75Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h7.5M8.25 13.5h5.25" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Konten How To Use</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Atur judul dan deskripsi bagian cara
                                menggunakan layanan RentalCar.</p>
                        </div>
                    </div>

                    {{-- SUBTITLE --}}

                    <div>
                        <label for="subtitle"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Subtitle <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="subtitle" id="subtitle"
                            value="{{ old('subtitle', $howToUse->subtitle ?? '') }}" required
                            placeholder="Contoh: Cara Sewa"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                        @error('subtitle')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- TITLE --}}

                    <div class="mt-5">
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul
                            <span class="text-red-500">*</span></label>
                        <textarea name="title" id="title" rows="2" required
                            placeholder="Contoh: Sewa kendaraan dalam beberapa langkah."
                            class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('title', $howToUse->title ?? '') }}</textarea>
                        @error('title')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- DESCRIPTION --}}

                    <div class="mt-5">
                        <label for="description"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi <span
                                class="text-red-500">*</span></label>
                        <textarea name="description" id="description" rows="4" required
                            placeholder="Jelaskan secara singkat cara menggunakan layanan RentalCar..."
                            class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('description', $howToUse->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </section>

                {{-- STEPS --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 6.75h10.5M9 12h10.5M9 17.25h10.5" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 6.75h.008v.008H4.5v-.008ZM4.5 12h.008v.008H4.5V12ZM4.5 17.25h.008v.008H4.5v-.008Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Langkah Rental</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Atur tiga langkah yang ditampilkan pada
                                bagian How To Use.</p>
                        </div>
                    </div>

                    <div class="space-y-5">

                        {{-- STEP 1 --}}

                        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-800">
                            <p class="mb-4 text-sm font-semibold text-gray-700 dark:text-gray-200">Langkah 1</p>
                            <div class="space-y-5">
                                <div>
                                    <label for="step_1_title"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="step_1_title" id="step_1_title"
                                        value="{{ old('step_1_title', $howToUse->step_1_title ?? '') }}" required
                                        placeholder="Contoh: Pilih kendaraan"
                                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                    @error('step_1_title')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="step_1_description"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi
                                        <span class="text-red-500">*</span></label>
                                    <textarea name="step_1_description" id="step_1_description" rows="3" required
                                        placeholder="Contoh: Cari kendaraan yang sesuai dengan kebutuhan dan budget perjalananmu."
                                        class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('step_1_description', $howToUse->step_1_description ?? '') }}</textarea>
                                    @error('step_1_description')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- STEP 2 --}}

                        <div
                            class="rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-800">
                            <p class="mb-4 text-sm font-semibold text-gray-700 dark:text-gray-200">Langkah 2</p>
                            <div class="space-y-5">
                                <div>
                                    <label for="step_2_title"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="step_2_title" id="step_2_title"
                                        value="{{ old('step_2_title', $howToUse->step_2_title ?? '') }}" required
                                        placeholder="Contoh: Tentukan waktu"
                                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                    @error('step_2_title')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="step_2_description"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi
                                        <span class="text-red-500">*</span></label>
                                    <textarea name="step_2_description" id="step_2_description" rows="3" required
                                        placeholder="Contoh: Tentukan tanggal mulai dan selesai rental sesuai dengan rencana perjalananmu."
                                        class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('step_2_description', $howToUse->step_2_description ?? '') }}</textarea>
                                    @error('step_2_description')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- STEP 3 --}}

                        <div
                            class="rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-800">
                            <p class="mb-4 text-sm font-semibold text-gray-700 dark:text-gray-200">Langkah 3</p>
                            <div class="space-y-5">
                                <div>
                                    <label for="step_3_title"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="step_3_title" id="step_3_title"
                                        value="{{ old('step_3_title', $howToUse->step_3_title ?? '') }}" required
                                        placeholder="Contoh: Mulai perjalanan"
                                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                    @error('step_3_title')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="step_3_description"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi
                                        <span class="text-red-500">*</span></label>
                                    <textarea name="step_3_description" id="step_3_description" rows="3" required
                                        placeholder="Contoh: Selesaikan proses pemesanan dan gunakan kendaraan untuk perjalananmu."
                                        class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('step_3_description', $howToUse->step_3_description ?? '') }}</textarea>
                                    @error('step_3_description')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

            {{-- SIDE SETTINGS --}}

            <div class="space-y-6">

                {{-- STATUS --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0Z" />
                            </svg>
                        </div>
                        <h2 class="mt-4 font-bold text-gray-800 dark:text-white">Status How To Use</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tentukan apakah bagian How To Use
                            ditampilkan pada landing page.</p>
                    </div>

                    <select name="status" id="status"
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                        <option value="Inactive" @selected(old('status', $howToUse->status ?? 'Active') === 'Inactive')>Tidak Aktif</option>
                        <option value="Active" @selected(old('status', $howToUse->status ?? 'Active') === 'Active')>Aktif</option>
                    </select>

                    @error('status')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </section>

                {{-- ACTION --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3.5 text-sm font-semibold text-white transition duration-200 hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 active:scale-[0.98] dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:ring-white/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('landing.howto') }}"
                        class="mt-3 flex w-full items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-600">
                        Batal
                    </a>
                </section>

            </div>
        </div>
        </form>
    </section>

@endsection
