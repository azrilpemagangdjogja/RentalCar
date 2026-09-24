@extends('layouts.admin')

@section('content')
    <section class="w-full">
        {{-- HEADER --}}

        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Messages</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Lihat pemberitahuan dan pesan yang masuk.</p>
        </div>

        {{-- MESSAGE LIST --}}

        <div class="space-y-2">
            {{-- UNREADED ANNOUNCEMENT --}}

            @foreach ($announcement as $item)
                <a href="{{ route('message.show', $item->id) }}"
                    class="flex items-center gap-3 rounded-2xl border border-gray-200 bg-white px-4 py-3 dark:border-gray-600 dark:bg-gray-700">
                    {{-- PROFILE --}}

                    <div class="shrink-0">
                        <div
                            class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                            <img src="{{ asset('images/mitra-default.png') }}" alt="Rental Car"
                                class="h-7 w-7 object-contain">
                        </div>
                    </div>

                    {{-- MESSAGE --}}

                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2">
                            <h2 class="truncate text-sm font-semibold text-gray-800 dark:text-gray-100">
                                Rental Car
                            </h2>
                            <span
                                class="shrink-0 rounded-full bg-gray-100 px-2 py-0.5 text-[10px] font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                Announcement
                            </span>
                        </div>
                        <p class="mt-0.5 truncate text-sm text-gray-600 dark:text-gray-300">
                            {{ $item->message }}
                        </p>
                    </div>

                    {{-- TIME --}}

                    <div class="shrink-0 self-start pt-1 text-right">
                        <span class="text-xs text-gray-500 dark:text-gray-300">{{ $item->created_at->format('H:i') }}</span>
                    </div>
                </a>
            @endforeach

            {{-- READED ANNOUNCEMENT --}}

            @foreach ($readedAnnouncement as $item)
                <div
                    class="flex items-center gap-2 rounded-2xl border border-gray-200 bg-white px-3 py-2 dark:border-gray-600 dark:bg-gray-700">
                    <a href="{{ route('message.show', $item->id) }}"
                        class="flex min-w-0 flex-1 items-center opacity-55 gap-3 px-1 py-1">
                        {{-- PROFILE --}}

                        <div class="shrink-0">
                            <div
                                class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-gray-100 dark:bg-gray-600">
                                <img src="{{ asset('images/mitra-default.png') }}" alt="Rental Car"
                                    class="h-7 w-7 object-contain">
                            </div>
                        </div>

                        {{-- MESSAGE --}}

                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2">
                                <h2 class="truncate text-sm font-semibold text-gray-800 dark:text-gray-100">
                                    Rental Car
                                </h2>
                                <span
                                    class="shrink-0 rounded-full bg-gray-100 px-2 py-0.5 text-[10px] font-medium text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                                    Announcement
                                </span>
                            </div>
                            <p class="mt-0.5 truncate text-sm text-gray-600 dark:text-gray-300">
                                {{ $item->message }}
                            </p>
                        </div>

                        {{-- TIME --}}

                        <div class="shrink-0 self-start pt-1 text-right">
                            <span class="text-xs text-gray-500 dark:text-gray-300">
                                @if ($item->created_at->isToday())
                                    {{ $item->created_at->format('H:i') }}
                                @elseif ($item->created_at->isYesterday())
                                    Kemarin
                                @else
                                    {{ $item->created_at->format('d M Y') }}
                                @endif
                            </span>
                        </div>
                    </a>

                    {{-- DELETE --}}

                    <form action="{{ route('message.destroy', $item->id) }}" method="POST"
                        onsubmit="return confirm('Hapus announcement ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex h-9 w-9 shrink-0 opacity-100 items-center bg-gray-100 dark:bg-gray-600 justify-center rounded-xl text-gray-500 transition hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-500 dark:hover:text-white"
                            title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21.75H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12.102.562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0C9.01 2.633 8.1 3.617 8.1 4.797v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
@endsection
