@extends('layouts.admin')
@section('content')
    <section class="w-full">

        {{-- HEADER --}}

        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-800 dark:text-white">Landing Page</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola konten yang ditampilkan pada halaman utama
                    RentalCar.</p>
            </div>
            <a href="{{ route('landing.about.edit') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 7.125L16.875 4.5" />
                </svg>
                Edit About
            </a>
        </div>

        {{-- ABOUT PREVIEW --}}

        <div class="overflow-hidden rounded-2xl bg-white dark:bg-gray-700">

            {{-- CARD HEADER --}}

            <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4 dark:border-gray-600 sm:px-6">
                <div>
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">About Section</h2>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Preview tampilan bagian tentang RentalCar pada
                        landing page.</p>
                </div>
                <span
                    class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    {{ $about->status ?? '' }}
                </span>
            </div>

            {{-- PREVIEW --}}

            <div class="p-4 sm:p-6">
                <div class="overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-700">
                    <section class="py-16 sm:py-20 lg:py-24">
                        <div class="mx-auto grid max-w-7xl items-center gap-10 px-6 sm:gap-14 lg:grid-cols-2 lg:px-8">

                            {{-- IMAGE --}}

                            <div class="relative">
                                <div class="overflow-hidden rounded-3xl">
                                    <img src="{{ $about?->image ? asset('storage/' . $about->image) : asset('images/login-background.png') }}"
                                        alt="Tentang RentalCar" class="h-[380px] w-full object-cover sm:h-[480px]">
                                </div>
                                <div
                                    class="absolute -bottom-5 -right-3 rounded-2xl bg-white p-4 shadow-xl dark:bg-gray-800 sm:-bottom-6 sm:right-6 sm:p-5">
                                    <p class="text-xl font-bold text-gray-800 dark:text-white">{{ $about->card_title ?? '' }}</p>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-300 sm:text-sm">
                                        {{ $about->card_description ?? '' }}</p>
                                </div>
                            </div>

                            {{-- CONTENT --}}

                            <div>
                                <span
                                    class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">{{ $about->subtitle ?? '' }}</span>
                                <h2
                                    class="mt-3 text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl dark:text-white">
                                    {{ $about->title ?? '' }}</h2>
                                <p class="mt-5 text-base leading-7 text-gray-500 dark:text-gray-300">
                                    {{ $about->description_1 ?? '' }}</p>
                                <p class="mt-4 text-base leading-7 text-gray-500 dark:text-gray-300">
                                    {{ $about->description_2 ?? '' }}</p>

                                {{-- FEATURES --}}

                                <div class="mt-8 grid grid-cols-2 gap-6">
                                    <div>
                                        <p class="text-3xl font-bold text-gray-800 dark:text-white">
                                            {{ $about->feature_1_title ?? '' }}</p>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                                            {{ $about->feature_1_description ?? '' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-3xl font-bold text-gray-800 dark:text-white">
                                            {{ $about->feature_2_title ?? '' }}</p>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                                            {{ $about->feature_2_description ?? '' }}</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>

    </section>
@endsection
