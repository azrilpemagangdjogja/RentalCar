@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Landing Page
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Kelola konten yang ditampilkan pada halaman utama RentalCar.
                </p>
            </div>

            <a href="{{ route('landing.hero.edit') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 7.125L16.875 4.5" />
                </svg>
                Edit Hero
            </a>
        </div>

        {{-- HERO PREVIEW --}}
        <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700">

            {{-- CARD HEADER --}}
            <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4 dark:border-gray-600 sm:px-6">
                <div>
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                        Hero Section
                    </h2>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Preview tampilan bagian utama landing page.
                    </p>
                </div>

                <span
                    class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    {{ $hero?->status}}
                </span>
            </div>

            {{-- PREVIEW --}}
            <div class="p-4 sm:p-6">

                <div class="relative min-h-[500px] overflow-hidden rounded-2xl">

                    {{-- BACKGROUND --}}
                    <div class="absolute inset-0">
                        <img src="{{ $hero?->background_image ?  asset('storage/' . $hero?->background_image) : asset('images/login-background.png') }}" alt="Hero Background"
                            class="h-full w-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-r from-gray-800/90 via-gray-800/70 to-gray-800/20">
                        </div>
                    </div>

                    {{-- CONTENT --}}
                    <div class="relative flex min-h-[500px] items-center px-6 py-12 sm:px-10 lg:px-14">

                        <div class="max-w-2xl text-white">

                            {{-- BADGE --}}
                            <div
                                class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 backdrop-blur-sm">
                                <span class="h-2 w-2 rounded-full bg-white"></span>

                                <span class="text-sm font-medium text-gray-100">
                                    {{ $hero?->badge }}
                                </span>
                            </div>

                            {{-- TITLE --}}
                            <h1 class="text-4xl font-bold leading-[1.1] tracking-tight sm:text-5xl">
                                {{ $hero?->title }}
                            </h1>

                            {{-- DESCRIPTION --}}
                            <p class="mt-5 max-w-xl text-sm leading-6 text-gray-300 sm:text-base">
                                {{ $hero?->description }}
                            </p>

                            {{-- BUTTONS --}}
                            <div class="mt-7 flex flex-col gap-3 sm:flex-row">

                                <span
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-gray-800">
                                    {{ $hero?->primary_button_text }}

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>

                                <span
                                    class="inline-flex items-center justify-center rounded-xl border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur-sm">
                                    {{ $hero?->secondary_button_text }}
                                </span>

                            </div>

                            {{-- FEATURES --}}
                            <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4 border-t border-white/20 pt-5">

                                <div>
                                    <p class="text-xl font-bold">{{ $hero?->feature_1_title }}</p>
                                    <p class="mt-1 text-xs text-gray-400">
                                        {{ $hero?->feature_1_description }}
                                    </p>
                                </div>

                                <div class="h-8 w-px bg-white/20"></div>

                                <div>
                                    <p class="text-xl font-bold">{{ $hero?->feature_2_title }}</p>
                                    <p class="mt-1 text-xs text-gray-400">
                                        {{ $hero?->feature_2_description }}
                                    </p>
                                </div>

                                <div class="h-8 w-px bg-white/20"></div>

                                <div>
                                    <p class="text-xl font-bold">{{ $hero?->feature_3_title }}</p>
                                    <p class="mt-1 text-xs text-gray-400">
                                        {{ $hero?->feature_3_description }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
