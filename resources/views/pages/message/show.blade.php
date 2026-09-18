@extends('layouts.admin')

@section('content')
    <section class="w-full">
        {{-- HEADER --}}

        <div class="mb-6 flex items-center gap-3">
            <a href="{{ url()->previous() }}"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Detail Pesan</h1>
                <p class="text-sm text-gray-500 dark:text-gray-300">Lihat isi pesan secara lengkap.</p>
            </div>
        </div>

        {{-- MESSAGE --}}

        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 px-5 py-5 dark:border-gray-600">
                <div class="flex items-start gap-3">
                    @if ($message?->category === 'Announcement')
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                            <img src="{{ asset('images/logo.png') }}" alt="Rental Car" class="h-8 w-8 object-contain">
                        </div>
                    @else
                        <div class="h-12 w-12 shrink-0 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                            @if ($message?->sender?->profile)
                                <img src="{{ asset('storage/' . $message?->sender->profile) }}"
                                    alt="{{ $message?->sender->name }}" class="h-full w-full object-cover">
                            @else
                                <div
                                    class="flex h-full w-full items-center justify-center text-sm font-semibold text-gray-600 dark:text-gray-200">
                                    {{ strtoupper(substr($message?->sender?->name ?? '?', 0, 1)) }}
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h2 class="text-base font-semibold text-gray-800 dark:text-gray-100">
                                @if ($message?->category === 'Announcement')
                                    Rental Car
                                @else
                                    {{ $message?->sender?->name ?? 'Unknown User' }}
                                @endif
                            </h2>
                            <span
                                class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                {{ $message?->category }}
                            </span>
                        </div>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                            {{ $message?->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- CONTENT --}}

            <div class="px-5 py-6">
                @if ($message?->title)
                    <h3 class="mb-3 text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $message?->title }}</h3>
                @endif
                <p class="whitespace-pre-line text-sm leading-6 text-gray-600 dark:text-gray-200">{{ $message?->message }}
                </p>
            </div>

            @if ($message?->category === 'Message')
                {{-- REPLY --}}

                <div class="border-t border-gray-200 px-5 py-4 dark:border-gray-600">
                    <a href="#"
                        class="inline-flex items-center gap-2 rounded-xl bg-gray-800 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l9-7 9 7m-9-7v18" />
                        </svg>
                        Balas Pesan
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
