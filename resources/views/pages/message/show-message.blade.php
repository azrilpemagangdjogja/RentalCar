@extends('layouts.admin')

@section('content')
    <section class="flex w-full flex-col">
        {{-- HEADER --}}

        <div class="mb-4 flex items-center gap-3">
            <a href="{{ url()->previous() }}"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7 7" />
                </svg>
            </a>
            <div class="min-w-0">
                <h1 class="truncate text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $receiver->name }}</h1>
                <p class="text-xs text-gray-500 dark:text-gray-300">Percakapan</p>
            </div>
        </div>

        {{-- CHAT --}}

        <div
            class="flex min-h-[600px] flex-col rounded-2xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-800">
            <div class="flex flex-1 flex-col gap-3 overflow-y-auto">
                @if ($message)
                    @foreach ($message as $item)
                        <div class="{{ $item->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }} flex">
                            <div
                                class="max-w-[80%] rounded-2xl px-4 py-2.5 text-sm {{ $item->sender_id == auth()->id() ? 'rounded-br-md bg-gray-700 text-white' : 'rounded-bl-md border border-gray-200 bg-white text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100' }}">
                                <p class="whitespace-pre-line break-words">{{ $item->message }}</p>
                                <p
                                    class="mt-1 text-right text-[10px] {{ $item->sender_id == auth()->id() ? 'text-gray-300' : 'text-gray-500 dark:text-gray-300' }}">
                                    {{ $item->created_at->format('H:i') }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            {{-- INPUT --}}

            <form action="{{ route('message.send', $receiver->id) }}" method="POST" class="mt-4 flex items-end gap-2">
                @csrf
                <textarea name="message" rows="1" placeholder="Tulis pesan..."
                    class="max-h-32 min-h-11 flex-1 resize-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 outline-none focus:border-gray-400 focus:ring-0 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:placeholder-gray-400"></textarea>
                <button type="submit"
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-gray-700 text-white hover:bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </button>
            </form>
        </div>
    </section>
@endsection
