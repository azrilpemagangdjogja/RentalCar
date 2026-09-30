<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

{{-- MOBILE DRAWER TOGGLE --}}

<input type="checkbox" id="mobile-drawer" class="peer hidden">

{{-- MOBILE DRAWER OVERLAY --}}

<div
    class="pointer-events-none fixed inset-0 z-50 opacity-0 transition-opacity duration-300 peer-checked:pointer-events-auto peer-checked:opacity-100 md:hidden">

    {{-- OVERLAY --}}

    <label for="mobile-drawer" class="absolute inset-0 bg-black/40"></label>
</div>

{{-- MOBILE DRAWER --}}

<aside
    class="pointer-events-none fixed left-0 top-0 z-[60] h-full w-72 -translate-x-full bg-gray-50 text-gray-800 shadow-xl transition-transform duration-300 peer-checked:pointer-events-auto peer-checked:translate-x-0 md:hidden dark:bg-gray-700 dark:text-gray-50">

    {{-- DRAWER HEADER --}}

    <div class="flex h-16 items-center justify-between border-b border-gray-200 px-5 dark:border-gray-600">

        <span class="text-lg font-bold tracking-tight">
            RentalCar
        </span>

        <label for="mobile-drawer"
            class="flex cursor-pointer items-center justify-center rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                stroke="currentColor" class="h-5 w-5">

                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />

            </svg>

        </label>

    </div>

    {{-- DRAWER MENU --}}

    <nav class="flex-1 overflow-y-auto scrollbar-none px-3 py-4">

        {{-- DASHBOARD --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Dashboard</p>
            <a href="{{ route('customer.dashboard') }}"
                class="{{ request()->routeIs('customer.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                <x-icon.icon-dashboard />
                <span>Dashboard</span>
            </a>
        </div>

        {{-- OPERATIONAL --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Operasional</p>
            <a href="{{ route('transaction.index') }}"
                class="{{ request()->routeIs('transaction.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                <x-icon.icon-car />
                <span>Transaksi</span>
            </a>
        </div>

    </nav>

</aside>


{{-- DESKTOP SIDEBAR --}}

<div
    class="hidden h-full w-18 shrink-0 flex-col items-center border-r border-gray-200 bg-white px-2 py-4 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 md:flex">

    <div class="flex flex-1 flex-col items-center">

        {{-- LOGO --}}

        <div class="mb-8 flex items-center gap-3">
            <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-lg bg-gray-800 text-white dark:bg-gray-50 dark:text-gray-800">
                    <x-icon.icon-car />
                </div>
            </a>
        </div>

        {{-- NAVIGATION --}}

        <nav class="flex flex-col items-center gap-3">

            {{-- DASHBOARD --}}

            <a href="{{ route('customer.dashboard') }}" title="Dashboard"
                class="{{ request()->routeIs('customer.dashboard')
                    ? 'flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500'
                    : 'flex h-11 w-11 items-center justify-center rounded-xl transition duration-200 hover:bg-gray-100 dark:hover:bg-gray-600' }}">
                <x-icon.icon-dashboard />
            </a>

            {{-- TRANSAKSI --}}

            <a href="{{ route('transaction.index') }}" title="Transaksi"
                class="{{ request()->routeIs('transaction.index')
                    ? 'flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500'
                    : 'flex h-11 w-11 items-center justify-center rounded-xl transition duration-200 hover:bg-gray-100 dark:hover:bg-gray-600' }}">
                <x-icon.icon-car />
            </a>

            {{-- JELAJAHI --}}

            <a href="#" title="Jelajahi"
                class="flex h-11 w-11 items-center justify-center rounded-xl transition duration-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                <x-icon.icon-search />
            </a>

            {{-- RIWAYAT --}}

            <a href="#" title="Riwayat"
                class="flex h-11 w-11 items-center justify-center rounded-xl transition duration-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                <x-icon.icon-history />
            </a>

            {{-- FAVORIT --}}

            <a href="#" title="Favorit"
                class="flex h-11 w-11 items-center justify-center rounded-xl transition duration-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                <x-icon.icon-heart />
            </a>

        </nav>
    </div>

    {{-- PROFILE --}}

    <a href="{{ route('profile.show', auth()->id()) }}" title="Profile"
        class="ml-1 flex h-10 w-10 items-center justify-center overflow-hidden rounded-full
            bg-gray-800 transition hover:ring-2 hover:ring-gray-300
            dark:bg-gray-200 dark:hover:ring-gray-500">

        <img src="{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('images/default-profile.png') }}"
            alt="Profile" class="h-full w-full object-cover">
    </a>

</div>


{{-- MOBILE BOTTOM NAVBAR --}}

<nav
    class="fixed bottom-0 left-0 right-0 z-50 flex h-16 items-center justify-around
    border-t border-gray-200 bg-white/95 px-2 backdrop-blur-sm
    text-gray-700 dark:border-gray-600 dark:bg-gray-700/95 dark:text-gray-50 md:hidden">

    {{-- DASHBOARD --}}

    <a href="{{ route('customer.dashboard') }}"
        class="{{ request()->routeIs('customer.dashboard')
            ? 'flex h-11 w-14 flex-col items-center justify-center gap-0.5 rounded-xl bg-gray-800 text-white dark:bg-gray-600'
            : 'flex h-11 w-14 flex-col items-center justify-center gap-0.5 rounded-xl transition hover:bg-gray-100 dark:hover:bg-gray-600' }}">

        <x-icon.icon-dashboard />

        <span class="text-[10px]">Dashboard</span>
    </a>

    {{-- TRANSAKSI --}}

    <a href="{{ route('transaction.index') }}"
        class="{{ request()->routeIs('transaction.index')
            ? 'flex h-11 w-14 flex-col items-center justify-center gap-0.5 rounded-xl bg-gray-800 text-white dark:bg-gray-600'
            : 'flex h-11 w-14 flex-col items-center justify-center gap-0.5 rounded-xl transition hover:bg-gray-100 dark:hover:bg-gray-600' }}">

        <x-icon.icon-car />

        <span class="text-[10px]">Transaksi</span>
    </a>

    {{-- JELAJAHI --}}

    <a href="#"
        class="flex h-11 w-14 flex-col items-center justify-center gap-0.5 rounded-xl transition hover:bg-gray-100 dark:hover:bg-gray-600">

        <x-icon.icon-search />

        <span class="text-[10px]">Jelajahi</span>
    </a>

    {{-- RIWAYAT --}}

    <a href="#"
        class="flex h-11 w-14 flex-col items-center justify-center gap-0.5 rounded-xl transition hover:bg-gray-100 dark:hover:bg-gray-600">

        <x-icon.icon-history />

        <span class="text-[10px]">Riwayat</span>
    </a>

    {{-- FAVORIT --}}

    <a href="#"
        class="flex h-11 w-14 flex-col items-center justify-center gap-0.5 rounded-xl transition hover:bg-gray-100 dark:hover:bg-gray-600">

        <x-icon.icon-heart />

        <span class="text-[10px]">Favorit</span>
    </a>

</nav>