<header class="sticky top-0 z-50 w-full shrink-0 border-b border-gray-100/50 bg-white/70 text-gray-800 shadow-sm backdrop-blur-md dark:border-gray-600/50 dark:bg-gray-700/70 dark:text-white">
    <nav class="mx-auto flex w-full items-center justify-between gap-4 px-4 py-3 sm:px-16">

        {{-- LOGO --}}
        <a href="{{ route('customer.dashboard') }}" class="flex shrink-0 items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-50 dark:text-gray-800">
                <x-icon.icon-car />
            </div>
            <span class="hidden text-lg font-bold tracking-tight sm:block">RentalCar</span>
        </a>

        {{-- NAVIGATION --}}
        <nav class="hidden items-center gap-1 lg:flex">
            <a href="{{ route('customer.dashboard') }}"
                class="{{ request()->routeIs('customer.dashboard') ? 'bg-gray-800 text-white dark:bg-gray-600' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-100 dark:hover:bg-gray-600' }} rounded-xl px-4 py-2.5 text-sm font-medium transition">
                Dashboard
            </a>
            <a href="{{ route('transaction.index') }}"
                class="{{ request()->routeIs('transaction.index') ? 'bg-gray-800 text-white dark:bg-gray-600' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-100 dark:hover:bg-gray-600' }} rounded-xl px-4 py-2.5 text-sm font-medium transition">
                Transaksi
            </a>
            <a href="#" title="Jelajahi"
                class="rounded-xl px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-100 dark:hover:bg-gray-600">
                Jelajahi
            </a>
            <a href="#" title="Riwayat"
                class="rounded-xl px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-100 dark:hover:bg-gray-600">
                Riwayat
            </a>
            <a href="#" title="Favorit"
                class="rounded-xl px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-100 dark:hover:bg-gray-600">
                Favorit
            </a>
        </nav>

        {{-- SEARCH --}}
        <div class="relative hidden xl:block xl:w-80">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <x-icon.icon-search />
            </div>
            <input type="text" placeholder="Cari kendaraan..."
                class="w-full rounded-xl border border-gray-200 bg-white/60 py-2.5 pl-10 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-400 focus:ring-2 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-700/60 dark:text-gray-50 dark:placeholder:text-gray-400 dark:focus:border-gray-500 dark:focus:ring-gray-600">
        </div>

        {{-- ACTIONS --}}
        <div class="ml-auto flex shrink-0 items-center gap-1">

            {{-- HELP --}}
            <a href="#" title="Bantuan"
                class="hidden md:flex h-10 w-10 items-center justify-center rounded-xl transition hover:bg-gray-100 dark:hover:bg-gray-600">
                <x-icon.icon-bell />
            </a>

            {{-- NOTIFICATION --}}
            <a href="{{ route('message.index') }}" title="Notifikasi"
                class="relative flex h-10 w-10 items-center justify-center rounded-xl transition hover:bg-gray-100 dark:hover:bg-gray-600">
                <x-icon.icon-bell />
                @if ($message->count() > 0)
                <span
                    class="absolute right-1 top-1 flex min-h-3 min-w-3 items-center justify-center rounded-full bg-gray-800 px-1 text-[9px] font-semibold leading-none text-gray-50 dark:bg-white dark:text-gray-800">{{ $message->count() }}</span>
            @endif
                {{-- <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-gray-800 dark:bg-gray-50"></span> --}}
            </a>

            {{-- PROFILE --}}
            <a href="{{ route('profile.show', auth()->id()) }}" title="Profile"
                class="ml-1 flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-gray-800 transition hover:ring-2 hover:ring-gray-300 dark:bg-gray-200 dark:hover:ring-gray-500">
                <img src="{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('images/default-profile.png') }}"
                    alt="Profile" class="h-full w-full object-cover">
            </a>
        </div>
    </nav>

    {{-- MOBILE NAVIGATION --}}
    {{-- <div class="flex items-center gap-1 overflow-x-auto border-t border-gray-100/50 px-4 py-2 dark:border-gray-600/50 lg:hidden">
        <a href="{{ route('customer.dashboard') }}"
            class="{{ request()->routeIs('customer.dashboard') ? 'bg-gray-800 text-white dark:bg-gray-600' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-100 dark:hover:bg-gray-600' }} shrink-0 rounded-lg px-3 py-2 text-xs font-medium transition">
            Dashboard
        </a>
        <a href="{{ route('transaction.index') }}"
            class="{{ request()->routeIs('transaction.index') ? 'bg-gray-800 text-white dark:bg-gray-600' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-100 dark:hover:bg-gray-600' }} shrink-0 rounded-lg px-3 py-2 text-xs font-medium transition">
            Transaksi
        </a>
        <a href="#" class="shrink-0 rounded-lg px-3 py-2 text-xs font-medium transition hover:bg-gray-100 dark:hover:bg-gray-600">
            Jelajahi
        </a>
        <a href="#" class="shrink-0 rounded-lg px-3 py-2 text-xs font-medium transition hover:bg-gray-100 dark:hover:bg-gray-600">
            Riwayat
        </a>
        <a href="#" class="shrink-0 rounded-lg px-3 py-2 text-xs font-medium transition hover:bg-gray-100 dark:hover:bg-gray-600">
            Favorit
        </a>
    </div> --}}
</header>