<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentalCar - Temukan Kendaraan Pilihanmu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-800 dark:bg-gray-800 dark:text-white">

    {{-- NAVBAR --}}

    <header class="fixed bg-black/60 backdrop-blur-sm dark:bg-black/10 left-0 right-0 top-0 z-50">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-8">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18M6 15.75h.01M18 15.75h.01" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight text-white">RentalCar</span>
            </a>

            <div class="hidden items-center gap-8 md:flex">
                <a href="#beranda" class="text-sm font-medium text-white transition hover:text-gray-500">Beranda</a>
                <a href="#tentang" class="text-sm font-medium text-white transition hover:text-gray-500">Tentang Kami</a>
                <a href="#cara-sewa" class="text-sm font-medium text-white transition hover:text-gray-500">Cara Sewa</a>
                <a href="#kendaraan" class="text-sm font-medium text-white transition hover:text-gray-500">Kendaraan</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="hidden rounded-xl px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-100 hover:text-gray-800 sm:block dark:text-gray-200 dark:hover:bg-gray-700">Masuk</a>
                <a href="{{ route('register') }}" class="rounded-xl bg-gray-800 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-100 hover:text-gray-800 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-200">Daftar</a>
            </div>
        </nav>
    </header>

    {{-- HERO SECTION --}}

    <main>
        <section id="beranda" class="relative min-h-screen overflow-hidden bg-gray-100 dark:bg-gray-700">
            <div class="absolute inset-0">
                <img src="{{ $hero?->background_image ? asset('storage/' . $hero?->background_image) : asset('images/login-background.png') }}" alt="RentalCar" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-800/90 via-gray-800/70 to-gray-800/20 dark:from-gray-800/95 dark:via-gray-800/80 dark:to-gray-800/30"></div>
            </div>

            <div class="relative mx-auto flex min-h-screen max-w-7xl items-center px-6 pb-16 pt-32 lg:px-8">
                <div class="max-w-2xl text-white">
                    <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 backdrop-blur-sm">
                        <span class="h-2 w-2 rounded-full bg-white"></span>
                        <span class="text-sm font-medium text-gray-100">{{ $hero?->badge ?? ''}}</span>
                    </div>

                    <h1 class="text-5xl font-bold leading-[1.1] tracking-tight sm:text-6xl lg:text-7xl">
                        {{ $hero?->title ?? ''}}
                    </h1>

                    <p class="mt-6 max-w-xl text-base leading-7 text-gray-300 sm:text-lg">
                        {{ $hero?->description ?? ''}}
                    </p>

                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ $hero?->secondary_button_url ? route($hero?->secondary_button_url) : route('register') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-gray-800 transition hover:bg-gray-200">
                            {{ $hero?->primary_button_text }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        <a href="{{ $hero?->secondary_button_url ? route($hero?->secondary_button_url) : route('login')}}" class="inline-flex items-center justify-center rounded-xl border border-white/30 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition hover:bg-white/20">
                            {{ $hero?->secondary_button_text }}
                        </a>
                    </div>

                    <div class="mt-12 flex flex-wrap items-center gap-x-8 gap-y-4 border-t border-white/20 pt-6">
                        <div>
                            <p class="text-2xl font-bold">{{ $hero?->feature_1_title }}</p>
                            <p class="mt-1 text-sm text-gray-400">{{ $hero?->feature_1_description }}</p>
                        </div>
                        <div class="h-10 w-px bg-white/20"></div>
                        <div>
                            <p class="text-2xl font-bold">{{ $hero?->feature_2_title }}</p>
                            <p class="mt-1 text-sm text-gray-400">{{ $hero?->feature_2_description }}</p>
                        </div>
                        <div class="h-10 w-px bg-white/20"></div>
                        <div>
                            <p class="text-2xl font-bold">{{ $hero?->feature_3_title }}</p>
                            <p class="mt-1 text-sm text-gray-400">{{ $hero?->feature_3_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ABOUT SECTION --}}

        <section id="tentang" class="bg-gray-100 py-24 dark:bg-gray-700">
            <div class="mx-auto grid max-w-7xl items-center gap-14 px-6 lg:grid-cols-2 lg:px-8">
                <div class="relative">
                    <div class="overflow-hidden rounded-3xl">
                        <img src="{{ $about?->image ? asset('storage/'. $about->image) : asset('images/login-background.png') }}" alt="Tentang RentalCar" class="h-[480px] w-full object-cover">
                    </div>
                    <div class="absolute -bottom-6 -right-4 rounded-2xl bg-white p-5 shadow-xl dark:bg-gray-800 sm:right-6">
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $about?->card_title }}</p>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ $about?->card_description }}</p>
                    </div>
                </div>

                <div>
                    <span class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">{{ $about?->subtitle }}</span>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl dark:text-white">{{ $about?->title }}</h2>
                    <p class="mt-5 text-base leading-7 text-gray-500 dark:text-gray-300">{{ $about?->description_1 }}</p>
                    <p class="mt-4 text-base leading-7 text-gray-500 dark:text-gray-300">{{ $about?->description_2 }}</p>

                    <div class="mt-8 grid grid-cols-2 gap-6">
                        <div>
                            <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $about?->feature_1_title }}</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">{{ $about?->feature_1_description }}</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $about?->feature_2_title }}</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">{{ $about?->feature_2_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- HOW TO RENT SECTION --}}

        <section id="cara-sewa" class="bg-gray-50 py-24 dark:bg-gray-800">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <span class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">{{ $howto?->subtitle }}</span>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl dark:text-white">{{ $howto?->title }}</h2>
                    <p class="mt-4 text-base leading-7 text-gray-500 dark:text-gray-300">{{ $howto?->description }}</p>
                </div>

                <div class="mt-14 grid gap-8 md:grid-cols-3">

                    {{-- STEP 1 --}}

                    <div class="relative rounded-2xl border border-gray-200 p-7 dark:border-gray-600">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-lg font-bold text-white dark:bg-gray-200 dark:text-gray-800">01</div>
                        <h3 class="mt-6 text-xl font-bold text-gray-800 dark:text-white">{{ $howto?->step_1_title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-gray-500 dark:text-gray-300">{{ $howto?->step_1_description }}</p>
                    </div>

                    {{-- STEP 2 --}}

                    <div class="relative rounded-2xl border border-gray-200 p-7 dark:border-gray-600">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-lg font-bold text-white dark:bg-gray-200 dark:text-gray-800">02</div>
                        <h3 class="mt-6 text-xl font-bold text-gray-800 dark:text-white">{{ $howto?->step_2_title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-gray-500 dark:text-gray-300">{{ $howto?->step_2_description }}</p>
                    </div>

                    {{-- STEP 3 --}}

                    <div class="relative rounded-2xl border border-gray-200 p-7 dark:border-gray-600">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-lg font-bold text-white dark:bg-gray-200 dark:text-gray-800">03</div>
                        <h3 class="mt-6 text-xl font-bold text-gray-800 dark:text-white">{{ $howto?->step_3_title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-gray-500 dark:text-gray-300">{{ $howto?->step_3_description }}</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- TRUSTED PARTNER SECTION --}}

        <section class="bg-gray-100 py-24 dark:bg-gray-700">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                {{-- HEADING --}}

                <div class="mx-auto max-w-2xl text-center">
                    <span class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">Mitra Terpercaya</span>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl dark:text-white">Temukan kendaraan dari mitra pilihan.</h2>
                    <p class="mt-4 text-base leading-7 text-gray-500 dark:text-gray-300">RentalCar bekerja sama dengan berbagai mitra untuk menyediakan kendaraan yang terpercaya dan sesuai kebutuhan perjalananmu.</p>
                </div>

                {{-- PARTNER CARDS --}}

                <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                    {{-- PARTNER 1 --}}

                    <a href="#" class="group rounded-2xl border border-gray-200 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-gray-600 dark:bg-gray-800">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-700">
                                    <img src="{{ asset('images/mitra-1.png') }}" alt="Logo Mitra" class="h-full w-full object-cover">
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 dark:text-white">Mitra Rental Jaya</h3>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Jakarta</p>
                                </div>
                            </div>

                            <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-700 dark:text-gray-300">Unggulan</span>
                        </div>

                        <div class="mt-6 grid grid-cols-3 divide-x divide-gray-200 border-y border-gray-100 py-4 dark:divide-gray-600 dark:border-gray-600">
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">4.9</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Rating</p>
                            </div>
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">42</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kendaraan</p>
                            </div>
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">328</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ulasan</p>
                            </div>
                        </div>

                        <div class="mt-5 flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400">98% ulasan positif</span>
                            <span class="flex items-center gap-1 text-sm font-semibold text-gray-700 dark:text-gray-200">Lihat profil
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </span>
                        </div>
                    </a>

                    {{-- PARTNER 2 --}}

                    <a href="#" class="group rounded-2xl border border-gray-200 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-gray-600 dark:bg-gray-800">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-700">
                                    <img src="{{ asset('images/mitra-2.png') }}" alt="Logo Mitra" class="h-full w-full object-cover">
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 dark:text-white">Nusantara Rental</h3>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Bandung</p>
                                </div>
                            </div>

                            <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-700 dark:text-gray-300">Terpopuler</span>
                        </div>

                        <div class="mt-6 grid grid-cols-3 divide-x divide-gray-200 border-y border-gray-100 py-4 dark:divide-gray-600 dark:border-gray-600">
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">4.8</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Rating</p>
                            </div>
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">67</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kendaraan</p>
                            </div>
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">512</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ulasan</p>
                            </div>
                        </div>

                        <div class="mt-5 flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400">97% ulasan positif</span>
                            <span class="flex items-center gap-1 text-sm font-semibold text-gray-700 dark:text-gray-200">Lihat profil
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </span>
                        </div>
                    </a>

                    {{-- PARTNER 3 --}}

                    <a href="#" class="group rounded-2xl border border-gray-200 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-gray-600 dark:bg-gray-800">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-gray-100 dark:bg-gray-700">
                                    <img src="{{ asset('images/mitra-3.png') }}" alt="Logo Mitra" class="h-full w-full object-cover">
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 dark:text-white">Sahabat Mobil</h3>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Yogyakarta</p>
                                </div>
                            </div>

                            <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-700 dark:text-gray-300">Terpercaya</span>
                        </div>

                        <div class="mt-6 grid grid-cols-3 divide-x divide-gray-200 border-y border-gray-100 py-4 dark:divide-gray-600 dark:border-gray-600">
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">4.9</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Rating</p>
                            </div>
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">35</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kendaraan</p>
                            </div>
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-800 dark:text-white">274</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ulasan</p>
                            </div>
                        </div>

                        <div class="mt-5 flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400">99% ulasan positif</span>
                            <span class="flex items-center gap-1 text-sm font-semibold text-gray-700 dark:text-gray-200">Lihat profil
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>

                {{-- VIEW ALL --}}

                <div class="mt-10 text-center">
                    <a href="#" class="inline-flex items-center gap-2 rounded-xl border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-800 hover:text-white dark:border-gray-500 dark:text-gray-200 dark:hover:bg-gray-200 dark:hover:text-gray-800">
                        Lihat Semua Mitra
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- VEHICLE CATEGORY SECTION --}}

        <section class="bg-white py-24 dark:bg-gray-800">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="max-w-2xl">
                    <span class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">Kategori</span>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl dark:text-white">Pilih sesuai kebutuhanmu.</h2>
                    <p class="mt-4 text-base leading-7 text-gray-500 dark:text-gray-300">Temukan berbagai jenis kendaraan untuk menemani berbagai macam perjalanan.</p>
                </div>

                <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                    {{-- CATEGORY 1 --}}

                    <a href="#" class="group rounded-2xl border border-gray-200 bg-gray-50 p-6 transition hover:-translate-y-1 hover:border-gray-300 hover:bg-white hover:shadow-lg dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-white transition group-hover:scale-105 dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.5h18M5.25 13.5l1.5-6h10.5l1.5 6M6 17.25h.01M18 17.25h.01M5.25 13.5v3.75A1.5 1.5 0 0 0 6.75 18.75h10.5a1.5 1.5 0 0 0 1.5-1.5V13.5" />
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-bold text-gray-800 dark:text-white">City Car</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-300">Ringkas dan nyaman untuk perjalanan dalam kota.</p>
                        <div class="mt-5 flex items-center gap-1 text-xs font-semibold text-gray-700 dark:text-gray-200">Lihat kendaraan
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5 transition group-hover:translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </a>

                    {{-- CATEGORY 2 --}}

                    <a href="#" class="group rounded-2xl border border-gray-200 bg-gray-50 p-6 transition hover:-translate-y-1 hover:border-gray-300 hover:bg-white hover:shadow-lg dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-white transition group-hover:scale-105 dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.5h18M5.25 13.5l1.5-6h10.5l1.5 6M6 17.25h.01M18 17.25h.01M5.25 13.5v3.75A1.5 1.5 0 0 0 6.75 18.75h10.5a1.5 1.5 0 0 0 1.5-1.5V13.5" />
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-bold text-gray-800 dark:text-white">MPV</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-300">Pilihan tepat untuk keluarga dan perjalanan bersama.</p>
                        <div class="mt-5 flex items-center gap-1 text-xs font-semibold text-gray-700 dark:text-gray-200">Lihat kendaraan
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5 transition group-hover:translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </a>

                    {{-- CATEGORY 3 --}}

                    <a href="#" class="group rounded-2xl border border-gray-200 bg-gray-50 p-6 transition hover:-translate-y-1 hover:border-gray-300 hover:bg-white hover:shadow-lg dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-white transition group-hover:scale-105 dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.5h18M5.25 13.5l1.5-6h10.5l1.5 6M6 17.25h.01M18 17.25h.01M5.25 13.5v3.75A1.5 1.5 0 0 0 6.75 18.75h10.5a1.5 1.5 0 0 0 1.5-1.5V13.5" />
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-bold text-gray-800 dark:text-white">SUV</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-300">Nyaman untuk perjalanan jauh dan berbagai medan.</p>
                        <div class="mt-5 flex items-center gap-1 text-xs font-semibold text-gray-700 dark:text-gray-200">Lihat kendaraan
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5 transition group-hover:translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </a>

                    {{-- CATEGORY 4 --}}

                    <a href="#" class="group rounded-2xl border border-gray-200 bg-gray-50 p-6 transition hover:-translate-y-1 hover:border-gray-300 hover:bg-white hover:shadow-lg dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-white transition group-hover:scale-105 dark:bg-gray-200 dark:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.5h18M5.25 13.5l1.5-6h10.5l1.5 6M6 17.25h.01M18 17.25h.01M5.25 13.5v3.75A1.5 1.5 0 0 0 6.75 18.75h10.5a1.5 1.5 0 0 0 1.5-1.5V13.5" />
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-bold text-gray-800 dark:text-white">Sedan</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-300">Elegan dan nyaman untuk kebutuhan perjalananmu.</p>
                        <div class="mt-5 flex items-center gap-1 text-xs font-semibold text-gray-700 dark:text-gray-200">Lihat kendaraan
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-3.5 w-3.5 transition group-hover:translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        {{-- VEHICLE SECTION --}}

        <section id="kendaraan" class="bg-white py-24 dark:bg-gray-800">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div class="max-w-2xl">
                        <span class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">Pilihan Kendaraan</span>
                        <h2 class="mt-3 text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl dark:text-white">Kendaraan untuk setiap perjalanan.</h2>
                        <p class="mt-4 text-base leading-7 text-gray-500 dark:text-gray-300">Temukan kendaraan yang sesuai dengan kebutuhan perjalananmu, mulai dari perjalanan singkat hingga perjalanan bersama keluarga.</p>
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-800 hover:underline dark:text-white">Lihat semua kendaraan
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>

                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- VEHICLE CARD 1 --}}

                    <div class="group overflow-hidden rounded-2xl border border-gray-200 bg-white transition hover:-translate-y-1 hover:shadow-xl dark:border-gray-600 dark:bg-gray-700">
                        <div class="relative h-56 overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <img src="{{ asset('images/car-1.jpg') }}" alt="Kendaraan RentalCar" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <span class="absolute left-4 top-4 rounded-full bg-white px-3 py-1.5 text-xs font-semibold text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-200">Tersedia</span>
                        </div>
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Toyota Avanza</h3>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">MPV · 7 Penumpang</p>
                                </div>
                                <span class="text-lg font-bold text-gray-800 dark:text-white">Rp250rb</span>
                            </div>
                            <div class="mt-5 flex items-center justify-between border-t border-gray-100 pt-4 dark:border-gray-600">
                                <span class="text-xs text-gray-500 dark:text-gray-300">per hari</span>
                                <a href="{{ route('register') }}" class="rounded-lg bg-gray-800 px-4 py-2 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">Sewa</a>
                            </div>
                        </div>
                    </div>

                    {{-- VEHICLE CARD 2 --}}

                    <div class="group overflow-hidden rounded-2xl border border-gray-200 bg-white transition hover:-translate-y-1 hover:shadow-xl dark:border-gray-600 dark:bg-gray-700">
                        <div class="relative h-56 overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <img src="{{ asset('images/car-2.jpg') }}" alt="Kendaraan RentalCar" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <span class="absolute left-4 top-4 rounded-full bg-white px-3 py-1.5 text-xs font-semibold text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-200">Tersedia</span>
                        </div>
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Honda Brio</h3>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">City Car · 5 Penumpang</p>
                                </div>
                                <span class="text-lg font-bold text-gray-800 dark:text-white">Rp200rb</span>
                            </div>
                            <div class="mt-5 flex items-center justify-between border-t border-gray-100 pt-4 dark:border-gray-600">
                                <span class="text-xs text-gray-500 dark:text-gray-300">per hari</span>
                                <a href="{{ route('register') }}" class="rounded-lg bg-gray-800 px-4 py-2 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">Sewa</a>
                            </div>
                        </div>
                    </div>

                    {{-- VEHICLE CARD 3 --}}

                    <div class="group overflow-hidden rounded-2xl border border-gray-200 bg-white transition hover:-translate-y-1 hover:shadow-xl dark:border-gray-600 dark:bg-gray-700">
                        <div class="relative h-56 overflow-hidden bg-gray-100 dark:bg-gray-600">
                            <img src="{{ asset('images/car-3.jpg') }}" alt="Kendaraan RentalCar" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <span class="absolute left-4 top-4 rounded-full bg-white px-3 py-1.5 text-xs font-semibold text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-200">Tersedia</span>
                        </div>
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Toyota Innova</h3>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">MPV · 7 Penumpang</p>
                                </div>
                                <span class="text-lg font-bold text-gray-800 dark:text-white">Rp400rb</span>
                            </div>
                            <div class="mt-5 flex items-center justify-between border-t border-gray-100 pt-4 dark:border-gray-600">
                                <span class="text-xs text-gray-500 dark:text-gray-300">per hari</span>
                                <a href="{{ route('register') }}" class="rounded-lg bg-gray-800 px-4 py-2 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">Sewa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SEARCH RENTAL SECTION --}}

        {{-- <section class="relative z-20 -mt-10 px-6 bg-gray-100">
            <div class="mx-auto max-w-6xl">
                <div class="rounded-2xl bg-white p-5 shadow-xl dark:bg-gray-700 sm:p-6">
                    <div class="mb-5">
                        <h2 class="text-lg font-bold text-gray-800 dark:text-white">Cari kendaraan</h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Tentukan kebutuhan rentalmu dan temukan kendaraan yang tersedia.</p>
                    </div>

                    <form action="#" method="GET" class="grid gap-4 md:grid-cols-4">
                        <div>
                            <label for="location" class="mb-2 block text-xs font-semibold text-gray-600 dark:text-gray-300">Lokasi</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 10.5-7.5 10.5S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="location" name="location" placeholder="Kota atau lokasi" class="w-full rounded-xl border border-gray-200 bg-gray-100 py-3 pl-10 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-700 focus:ring-2 focus:ring-gray-700/10 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder:text-gray-300 dark:focus:border-gray-200">
                            </div>
                        </div>

                        <div>
                            <label for="start_date" class="mb-2 block text-xs font-semibold text-gray-600 dark:text-gray-300">Mulai Rental</label>
                            <input type="date" id="start_date" name="start_date" class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-700 focus:ring-2 focus:ring-gray-700/10 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:focus:border-gray-200">
                        </div>

                        <div>
                            <label for="end_date" class="mb-2 block text-xs font-semibold text-gray-600 dark:text-gray-300">Selesai Rental</label>
                            <input type="date" id="end_date" name="end_date" class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-gray-700 focus:ring-2 focus:ring-gray-700/10 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:focus:border-gray-200">
                        </div>

                        <div class="flex items-end">
                            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                                </svg>
                                Cari Kendaraan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section> --}}

        {{-- WHY RENTALCAR SECTION --}}

        <section class="bg-gray-100 py-24 dark:bg-gray-700">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-14 lg:grid-cols-2 lg:items-center">
                    <div>
                        <span class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">Mengapa RentalCar?</span>
                        <h2 class="mt-3 text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl dark:text-white">Rental kendaraan yang dibuat sederhana.</h2>
                        <p class="mt-5 max-w-xl text-base leading-7 text-gray-500 dark:text-gray-300">Kami ingin setiap proses rental terasa jelas sejak mencari kendaraan sampai kendaraan dikembalikan.</p>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">

                        {{-- FEATURE 1 --}}

                        <div class="rounded-2xl bg-white p-6 dark:bg-gray-800">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </div>
                            <h3 class="mt-5 font-bold text-gray-800 dark:text-white">Pilihan Beragam</h3>
                            <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-300">Berbagai jenis kendaraan dapat disesuaikan dengan kebutuhan perjalanan.</p>
                        </div>

                        {{-- FEATURE 2 --}}

                        <div class="rounded-2xl bg-white p-6 dark:bg-gray-800">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <h3 class="mt-5 font-bold text-gray-800 dark:text-white">Transaksi Aman</h3>
                            <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-300">Informasi rental dan transaksi dikelola melalui sistem yang terstruktur.</p>
                        </div>

                        {{-- FEATURE 3 --}}

                        <div class="rounded-2xl bg-white p-6 dark:bg-gray-800">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75v6l3.75 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <h3 class="mt-5 font-bold text-gray-800 dark:text-white">Fleksibel</h3>
                            <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-300">Atur periode rental sesuai dengan rencana perjalananmu.</p>
                        </div>

                        {{-- FEATURE 4 --}}

                        <div class="rounded-2xl bg-white p-6 dark:bg-gray-800">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 3.75-1.3M9 19.128a9.38 9.38 0 0 1-3.75-1.3M15 19.128v.002M9 19.128v.002M12 12.75a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM19.5 9.75a2.25 2.25 0 1 0-4.5 0M4.5 9.75a2.25 2.25 0 1 1 4.5 0" />
                                </svg>
                            </div>
                            <h3 class="mt-5 font-bold text-gray-800 dark:text-white">Terhubung dengan Mitra</h3>
                            <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-300">Pengguna dapat menemukan kendaraan dari berbagai mitra rental.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA SECTION --}}

        <section class="bg-gray-100 py-20 dark:bg-gray-700">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="overflow-hidden rounded-3xl bg-gray-800 px-6 py-14 text-center text-white sm:px-12 dark:bg-gray-600">
                    <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Siap memulai perjalanan?</h2>
                    <p class="mx-auto mt-4 max-w-xl text-sm leading-6 text-gray-300">Buat akun RentalCar dan temukan kendaraan yang tepat untuk perjalananmu.</p>
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                        <a href="{{ route('register') }}" class="rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-gray-800 transition hover:bg-gray-200">Daftar Sekarang</a>
                        <a href="{{ route('login') }}" class="rounded-xl border border-white/30 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">Sudah punya akun</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- FOOTER --}}

        <footer class="border-t border-gray-200 bg-gray-50 dark:border-gray-600 dark:bg-gray-800">
            <div class="mx-auto flex max-w-7xl flex-col gap-6 px-6 py-10 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18M6 15.75h.01M18 15.75h.01" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800 dark:text-white">RentalCar</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Partner perjalananmu</p>
                    </div>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">© {{ date('Y') }} RentalCar. All rights reserved.</p>
            </div>
        </footer>

    </main>

</body>

</html>
