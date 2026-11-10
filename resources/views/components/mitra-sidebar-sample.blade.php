<div
    class="hidden h-full w-18 shrink-0 flex-col items-center border-r border-gray-100 bg-white px-2 py-4 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 md:flex">

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

<div
    class="hidden h-full w-18 shrink-0 flex-col items-center border-r border-gray-100 bg-white px-2 py-4 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 md:flex">

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

            <a href="{{ route('mitra.dashboard') }}" title="Dashboard"
                class="{{ request()->routeIs('mitra.dashboard')
                    ? 'flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500'
                    : 'flex h-11 w-11 items-center justify-center rounded-xl transition duration-200 hover:bg-gray-100 dark:hover:bg-gray-600' }}">
                <x-icon.icon-dashboard />
            </a>

            {{-- TRANSAKSI --}}

            <a href="{{ route('vehicle.index') }}" title="Transaksi"
                class="{{ request()->routeIs('vehicle.*')
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

            <a href="{{ route('user-history.index') }}" title="Riwayat"
                class="{{ request()->routeIs('user-history.*')
                    ? 'flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500'
                    : 'flex h-11 w-11 items-center justify-center rounded-xl transition duration-200 hover:bg-gray-100 dark:hover:bg-gray-600' }}">
                <x-icon.icon-history />
            </a>

            {{-- FAVORIT --}}

            <a href="{{ route('join-pickup-location.index') }}" title="Favorit"
                class="{{ request()->routeIs('join-pickup-location.*')
                    ? 'flex h-11 w-11 items-center justify-center rounded-xl bg-gray-800 text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500'
                    : 'flex h-11 w-11 items-center justify-center rounded-xl transition duration-200 hover:bg-gray-100 dark:hover:bg-gray-600' }}">
                <x-icon.icon-location />
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