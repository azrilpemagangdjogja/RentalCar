<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
<nav
    class="flex h-16 w-full px-2 sm:px-6 py-4 items-center justify-between
    {{-- sm:border-none --}}
    {{-- sm:bg-transparent sm:dark:bg-transparent --}}
    {{-- border-b border-gray-100 dark:border-gray-600  --}}
    bg-gray-50 dark:bg-gray-700 sm:bg-transparent sm:dark:bg-transparent
    text-gray-800 dark:text-gray-50">

    {{-- PAGE TITLE --}}

    <div class="h-auto w-auto flex justify-start">
        <label for="mobile-drawer"
            class="flex cursor-pointer sm:hidden items-center justify-center rounded-lg p-2 transition hover:bg-gray-200 dark:hover:bg-gray-600 md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>

        <div class="flex gap-3 items-center">
            @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Superadmin')
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                @elseif (auth()->user()->mitra_status == 'Verified')
                    <a href="{{ route('mitra.dashboard') }}" class="flex items-center gap-3">
                    @else
                        <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3">
            @endif
            <div
                class="flex h-9 w-9 items-center justify-center rounded-lg bg-gray-800 text-white dark:bg-gray-50 dark:text-gray-800">
                <x-icon.icon-car />
            </div>
            <span class="text-lg font-bold tracking-tight">{{ $app_identity?->app_name ? $app_identity->app_name : "NamanyaBelumada"}}</span>
            </a>
        </div>
    </div>

    {{-- RIGHT MENU --}}

    <div class="flex items-center gap-3">

        {{-- NOTIFICATION --}}

        <a href="{{ route('message.index') }}"
            class="relative flex h-10 w-10 items-center justify-center rounded-lg text-gray-500 transition duration-200 hover:bg-gray-200 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9a6 6 0 1 0-12 0v.75a8.967 8.967 0 0 1-2.31 6.022c1.69.62 3.506 1.066 5.454 1.31m5.713 0a24.255 24.255 0 0 1-5.713 0m5.713 0a3 3 0 1 1-5.713 0" />
            </svg>
            @if ($message->count() > 0)
                <span
                    class="absolute right-1 top-1 flex min-h-3 min-w-3 items-center justify-center rounded-full bg-gray-800 px-1 text-[9px] font-semibold leading-none text-gray-50 dark:bg-white dark:text-gray-800">{{ $message->count() }}</span>
            @endif
        </a>

        {{-- PROFILE --}}

        <a href="{{ route('profile.show', auth()->id()) }}"
            class="flex items-center gap-3 rounded-xl px-2 py-1.5 transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">

            <div
                class="flex h-9 w-9 items-center border-1 border-gray-700 justify-center overflow-hidden rounded-full bg-gray-800 text-sm font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                <img src="{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : 'images/default-profile.png' }}"
                    alt="">
            </div>

            <div class="hidden text-left sm:block">
                <p class="text-sm font-semibold text-gray-800 dark:text-white">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-400 dark:text-gray-300">{{ auth()->user()->email }}</p>
            </div>
        </a>
    </div>
</nav>
