@extends('layouts.admin')

@section('content')
    <section class="w-full">
        {{-- HEADER --}}

        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Messages</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Lihat pemberitahuan dan pesan yang masuk.</p>
        </div>

        {{-- MESSAGE LIST --}}

        <div class="space-y-3">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Sistem</h2>
            @foreach ($announcement as $item)
                <a href="{{ route('message.show', $item->id) }}"
                    class="flex items-center gap-3 rounded-2xl border border-gray-100 bg-white px-4 py-3 dark:border-gray-600 dark:bg-gray-700">

                    {{-- PROFILE --}}

                    <div class="shrink-0">
                        @if ($item->category === 'Announcement')
                            <div
                                class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                                <img src="{{ asset('images/mitra-default.png') }}" alt="Rental Car"
                                    class="h-7 w-7 object-contain">
                            </div>
                        @else
                            <div class="h-11 w-11 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                                @if ($item->sender?->profile)
                                    <img src="{{ asset('storage/' . $item->sender->profile) }}"
                                        alt="{{ $item->sender->name }}" class="h-full w-full object-cover">
                                @else
                                    <div
                                        class="flex h-full w-full items-center justify-center text-sm font-semibold text-gray-600 dark:text-gray-200">
                                        {{ strtoupper(substr($item->sender?->name ?? '?', 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    {{-- MESSAGE --}}

                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2">
                            <h2 class="truncate text-sm font-semibold text-gray-800 dark:text-gray-100">
                                @if ($item->category === 'Announcement')
                                    Rental Car
                                @else
                                    {{ $item->sender?->name ?? 'Unknown User' }}
                                @endif
                            </h2>
                            @if ($item->category === 'Announcement')
                                <span
                                    class="shrink-0 rounded-full bg-gray-100 px-2 py-0.5 text-[10px] font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-200">Announcement</span>
                            @endif
                        </div>
                        <p class="mt-0.5 truncate text-sm text-gray-600 dark:text-gray-300">
                            {{ $item->message }}</p>
                    </div>

                    {{-- TIME --}}

                    <div class="shrink-0 self-start pt-1 text-right">
                        <span class="text-xs text-gray-500 dark:text-gray-300">{{ $item->created_at->format('H:i') }}</span>
                    </div>
                </a>
            @endforeach
            <h2 class="text-lg font-semibold text-gray-800 mt-6 dark:text-gray-100">Pesan</h2>
            @foreach ($message as $item)
                @foreach ($item->messages as $item)
                    <a href="{{ route('message.show', $item->id) }}"
                        class="flex items-center gap-3 rounded-2xl border border-gray-100 bg-white px-4 py-3 dark:border-gray-600 dark:bg-gray-700">

                        {{-- PROFILE --}}

                        <div class="shrink-0">
                            @if ($item->category === 'Announcement')
                                <div
                                    class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                                    <img src="{{ asset('images/mitra-default.png') }}" alt="Rental Car"
                                        class="h-7 w-7 object-contain">
                                </div>
                            @else
                                <div class="h-11 w-11 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                                    @if ($item->sender?->profile)
                                        <img src="{{ asset('storage/' . $item->sender->profile) }}"
                                            alt="{{ $item->sender->name }}" class="h-full w-full object-cover">
                                    @else
                                        <div
                                            class="flex h-full w-full items-center justify-center text-sm font-semibold text-gray-600 dark:text-gray-200">
                                            {{ strtoupper(substr($item->sender?->name ?? '?', 0, 1)) }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        {{-- MESSAGE --}}

                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2">
                                <h2 class="truncate text-sm font-semibold text-gray-800 dark:text-gray-100">
                                    @if ($item->category === 'Announcement')
                                        Rental Car
                                    @else
                                        @if ($item->sender?->id == auth()->id())
                                            {{ $item->receiver?->name }}
                                        @else
                                            {{ $item->sender?->name }}
                                        @endif
                                    @endif
                                </h2>
                                @if ($item->category === 'Announcement')
                                    <span
                                        class="shrink-0 rounded-full bg-gray-100 px-2 py-0.5 text-[10px] font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-200">Announcement</span>
                                @endif
                            </div>
                            @if ($item->sender?->id == auth()->id())
                                <p class="mt-0.5 truncate text-sm text-gray-600 dark:text-gray-300">
                                    Anda : {{ $item->message }}</p>
                            @else
                                <p class="mt-0.5 truncate text-sm text-gray-600 dark:text-gray-300">
                                    {{ $item->message }}</p>
                            @endif
                        </div>

                        {{-- TIME --}}

                        <div class="shrink-0 self-start pt-1 text-right">
                            <span
                                class="text-xs text-gray-500 dark:text-gray-300">{{ $item->created_at->format('H:i') }}</span>
                        </div>
                    </a>
                @endforeach
            @endforeach
        </div>
    </section>
@endsection
