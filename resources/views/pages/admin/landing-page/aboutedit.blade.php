@extends('layouts.admin')
@section('content')

    <section class="w-full">

        {{-- HEADER --}}

        <section class="mb-6">
            <div class="hidden sm:flex items-center gap-2 text-sm text-gray-400 dark:text-gray-400">
                <a href="{{ route('landing.about') }}" class="transition hover:text-gray-700 dark:hover:text-gray-200">Landing
                    Page</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                </svg>
                <span>About</span>
            </div>
            <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">Edit About</h1>
            <p class="mt-1 text-sm hidden sm:block text-gray-500 dark:text-gray-400">Atur konten yang ditampilkan pada bagian About landing
                page.</p>
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

        @if ($about)
            <form action="{{ route('landing.about.update', $about->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full">
                @csrf
                @method('PUT')
            @else
                <form action="{{ route('landing.about.create') }}" method="POST" enctype="multipart/form-data"
                    class="w-full">
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
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 15 9 10.5l3 3 2.25-2.25 5.25 5.25" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Konten About</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Atur teks utama yang ditampilkan pada
                                bagian About landing page.</p>
                        </div>
                    </div>

                    {{-- SUBTITLE --}}

                    <div>
                        <label for="subtitle"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Subtitle <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="subtitle" id="subtitle"
                            value="{{ old('subtitle', $about->subtitle ?? '') }}" required
                            placeholder="Contoh: Tentang Kami"
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
                            placeholder="Contoh: Lebih dari sekadar tempat menyewa kendaraan."
                            class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('title', $about->title ?? '') }}</textarea>
                        @error('title')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- DESCRIPTION 1 --}}

                    <div class="mt-5">
                        <label for="description_1"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi Pertama <span
                                class="text-red-500">*</span></label>
                        <textarea name="description_1" id="description_1" rows="4" required placeholder="Jelaskan tentang RentalCar..."
                            class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('description_1', $about->description_1 ?? '') }}</textarea>
                        @error('description_1')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- DESCRIPTION 2 --}}

                    <div class="mt-5">
                        <label for="description_2"
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi Kedua <span
                                class="text-red-500">*</span></label>
                        <textarea name="description_2" id="description_2" rows="4" required
                            placeholder="Jelaskan bagaimana RentalCar membantu pengguna..."
                            class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">{{ old('description_2', $about->description_2 ?? '') }}</textarea>
                        @error('description_2')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </section>

                {{-- FEATURES --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Keunggulan</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Dua informasi singkat yang ditampilkan
                                pada bagian About.</p>
                        </div>
                    </div>

                    <div class="space-y-5">

                        {{-- FEATURE 1 --}}

                        <div
                            class="rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-800">
                            <p class="mb-4 text-sm font-semibold text-gray-700 dark:text-gray-200">Keunggulan 1</p>
                            <div class="grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="feature_1_title"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                                    <input type="text" name="feature_1_title" id="feature_1_title"
                                        value="{{ old('feature_1_title', $about->feature_1_title ?? '') }}"
                                        placeholder="Contoh: Mudah"
                                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                    @error('feature_1_title')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="feature_1_description"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                                    <input type="text" name="feature_1_description" id="feature_1_description"
                                        value="{{ old('feature_1_description', $about->feature_1_description ?? '') }}"
                                        placeholder="Contoh: Pemesanan sederhana"
                                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                    @error('feature_1_description')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- FEATURE 2 --}}

                        <div
                            class="rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-800">
                            <p class="mb-4 text-sm font-semibold text-gray-700 dark:text-gray-200">Keunggulan 2</p>
                            <div class="grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="feature_2_title"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                                    <input type="text" name="feature_2_title" id="feature_2_title"
                                        value="{{ old('feature_2_title', $about->feature_2_title ?? '') }}"
                                        placeholder="Contoh: Aman"
                                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                    @error('feature_2_title')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="feature_2_description"
                                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                                    <input type="text" name="feature_2_description" id="feature_2_description"
                                        value="{{ old('feature_2_description', $about->feature_2_description ?? '') }}"
                                        placeholder="Contoh: Data dan transaksi terjaga"
                                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                                    @error('feature_2_description')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                {{-- FLOATING CARD --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6 flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 7.5h16.5M6.75 3.75h10.5A3.75 3.75 0 0 1 21 7.5v9a3.75 3.75 0 0 1-3.75 3.75H6.75A3.75 3.75 0 0 1 3 16.5v-9a3.75 3.75 0 0 1 3.75-3.75Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800 dark:text-white">Kartu Gambar</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Teks yang muncul pada kartu di bagian
                                bawah gambar.</p>
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="card_title"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                            <input type="text" name="card_title" id="card_title"
                                value="{{ old('card_title', $about->card_title ?? '') }}" placeholder="Contoh: RentalCar"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                            @error('card_title')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="card_description"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <input type="text" name="card_description" id="card_description"
                                value="{{ old('card_description', $about->card_description ?? '') }}"
                                placeholder="Contoh: Partner perjalananmu"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                            @error('card_description')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </section>
            </div>

            {{-- SIDE SETTINGS --}}

            <div class="space-y-6">

                {{-- IMAGE --}}

                <section
                    class="rounded-2xl border border-gray-100 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="mb-6">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 3.75-3.75 3 3 4.5-6 8.25 8.25" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 19.5h16.5A1.5 1.5 0 0 0 21.75 18V6A1.5 1.5 0 0 0 20.25 4.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z" />
                            </svg>
                        </div>
                        <h2 class="mt-4 font-bold text-gray-800 dark:text-white">Gambar About</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Gambar yang digunakan pada bagian About
                            landing page.</p>
                    </div>

                    <div class="mb-4 overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-600">
                        <img src="{{ $about?->image ? asset('storage/' . $about->image) : asset('images/login-background.png') }}"
                            alt="Gambar About" class="h-40 w-full object-cover">
                    </div>

                    <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg"
                        class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-800 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:file:bg-white dark:file:text-gray-800">

                    <p class="mt-2 text-xs leading-5 text-gray-400 dark:text-gray-400">JPG, JPEG, PNG. Maksimal ukuran file
                        2 MB.</p>

                    @error('image')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </section>

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
                        <h2 class="mt-4 font-bold text-gray-800 dark:text-white">Status About</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tentukan apakah About ditampilkan pada
                            landing page.</p>
                    </div>

                    <select name="status" id="status"
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-white/10">
                        <option value="Inactive" @selected(old('status', $about->status ?? 'Active') === 'Inactive')>Tidak Aktif</option>
                        <option value="Active" @selected(old('status', $about->status ?? 'Active') === 'Active')>Aktif</option>
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
                    <a href="{{ route('landing.about') }}"
                        class="mt-3 flex w-full items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-600">
                        Batal
                    </a>
                </section>

            </div>
        </div>
        </form>
    </section>

@endsection
