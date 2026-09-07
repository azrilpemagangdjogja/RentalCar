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
            <a href="{{ route('landing.howto.edit') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 7.125L16.875 4.5" />
                </svg>
                Edit How To Use
            </a>
        </div>

        {{-- HOW TO USE PREVIEW --}}

        <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700">

            {{-- CARD HEADER --}}

            <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4 dark:border-gray-600 sm:px-6">
                <div>
                    <h2 class="text-base font-semibold text-gray-800 dark:text-white">How To Use Section</h2>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Preview tampilan bagian cara menggunakan
                        layanan RentalCar pada landing page.</p>
                </div>
                <span
                    class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                    {{ $howToUse?->status ?? 'Belum Ada' }}
                </span>
            </div>

            {{-- PREVIEW --}}

            <div class="p-4 sm:p-6">
                <div class="overflow-hidden rounded-2xl bg-gray-50 dark:bg-gray-800">
                    <section class="py-16 sm:py-20 lg:py-24">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">

                            {{-- SECTION HEADER --}}

                            <div class="mx-auto max-w-2xl text-center">
                                <span
                                    class="text-sm font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">{{ $howToUse?->subtitle ?? 'Belum Ada' }}</span>
                                <h2
                                    class="mt-3 text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl dark:text-white">
                                    {{ $howToUse?->title ?? 'Belum Ada' }}</h2>
                                <p class="mt-4 text-base leading-7 text-gray-500 dark:text-gray-300">
                                    {{ $howToUse?->description ?? 'Belum Ada' }}</p>
                            </div>

                            {{-- STEPS --}}

                            <div class="mt-14 grid gap-8 md:grid-cols-3">

                                {{-- STEP 1 --}}

                                <div class="relative rounded-2xl border border-gray-200 p-7 dark:border-gray-600">
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-lg font-bold text-white dark:bg-gray-200 dark:text-gray-800">
                                        01</div>
                                    <h3 class="mt-6 text-xl font-bold text-gray-800 dark:text-white">
                                        {{ $howToUse?->step_1_title ?? 'Belum Ada' }}</h3>
                                    <p class="mt-3 text-sm leading-6 text-gray-500 dark:text-gray-300">
                                        {{ $howToUse?->step_1_description ?? 'Belum Ada' }}</p>
                                </div>

                                {{-- STEP 2 --}}

                                <div class="relative rounded-2xl border border-gray-200 p-7 dark:border-gray-600">
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-lg font-bold text-white dark:bg-gray-200 dark:text-gray-800">
                                        02</div>
                                    <h3 class="mt-6 text-xl font-bold text-gray-800 dark:text-white">
                                        {{ $howToUse?->step_2_title ?? 'Belum Ada' }}</h3>
                                    <p class="mt-3 text-sm leading-6 text-gray-500 dark:text-gray-300">
                                        {{ $howToUse?->step_2_description ?? 'Belum Ada' }}</p>
                                </div>

                                {{-- STEP 3 --}}

                                <div class="relative rounded-2xl border border-gray-200 p-7 dark:border-gray-600">
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-800 text-lg font-bold text-white dark:bg-gray-200 dark:text-gray-800">
                                        03</div>
                                    <h3 class="mt-6 text-xl font-bold text-gray-800 dark:text-white">
                                        {{ $howToUse?->step_3_title ?? 'Belum Ada' }}</h3>
                                    <p class="mt-3 text-sm leading-6 text-gray-500 dark:text-gray-300">
                                        {{ $howToUse?->step_3_description ?? 'Belum Ada' }}</p>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </section>
@endsection
