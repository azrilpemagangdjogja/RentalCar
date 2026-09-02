<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

{{-- MOBILE DRAWER TOGGLE --}}

<input type="checkbox" id="mobile-drawer" class="peer hidden">

{{-- MOBILE DRAWER --}}

<div
    class="pointer-events-none fixed inset-0 z-50 opacity-0 transition-opacity duration-300 peer-checked:pointer-events-auto peer-checked:opacity-100 md:hidden">

    {{-- OVERLAY --}}

    <label for="mobile-drawer" class="absolute inset-0 bg-black/40"></label>

    {{-- DRAWER --}}

    <aside
        class="absolute left-0 top-0 h-full w-72 -translate-x-full bg-gray-50 text-gray-800 shadow-xl transition-transform duration-300 peer-checked:translate-x-0 dark:bg-gray-700 dark:text-gray-50">

        {{-- DRAWER HEADER --}}

        <div class="flex h-16 items-center justify-between border-b border-gray-200 px-5 dark:border-gray-600">
            <span class="text-lg font-bold tracking-tight">RentalCar</span>
            <label for="mobile-drawer"
                class="flex cursor-pointer items-center justify-center rounded-lg p-2 text-gray-500 transition hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </label>
        </div>

        {{-- DRAWER MENU --}}

        <nav class="h-[calc(100%-4rem)] overflow-y-auto scrollbar-none px-3 py-4">
            {{-- DASHBOARD --}}

            <div class="mb-6">
                <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                    Dashboard
                </p>

                <a href="{{ route('mitra.dashboard') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <x-icon.icon-dashboard />
                    <span>Dashboard</span>
                </a>
            </div>

            {{-- OPERASIONAL --}}

            <div class="mb-6">
                <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                    Operasional
                </p>

                <div class="space-y-1">

                    {{-- KENDARAAN --}}

                    <a href="{{ route('vehicle.index') }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <x-icon.icon-car />
                        <span>Kendaraan</span>
                    </a>

                    {{-- PICKUP LOCATION --}}

                    <a href="{{ route('pickup-location.index') }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>

                        <span>Pickup Locations</span>
                    </a>

                    {{-- RENTAL --}}

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1-3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                        </svg>

                        <span>Transaksi</span>
                    </a>

                </div>
            </div>

            {{-- RIWAYAT --}}

            <div class="mb-6">
                <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                    Riwayat
                </p>

                <div class="space-y-1">

                    {{-- RIWAYAT TRANSAKSI --}}

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                        </svg>

                        <span>Riwayat Transaksi</span>
                    </a>

                </div>
            </div>

            {{-- LAINNYA --}}

            <div>
                <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                    Lainnya
                </p>

                <div class="space-y-1">

                    {{-- PENGATURAN --}}

                    <a href="#"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" />
                        </svg>

                        <span>Pengaturan</span>
                    </a>

                    {{-- KELUAR --}}

                    <a href="{{ route('logout', auth()->id()) }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M18 15l3-3m0 0-3-3m3 3H9" />
                        </svg>

                        <span>Keluar</span>
                    </a>

                </div>
            </div>

        </nav>

    </aside>
</div>

<div
    class="hidden h-full w-58 shrink-0 bg-gray-50 pl-2 text-gray-800 dark:bg-gray-700 dark:text-gray-50 md:flex md:flex-col">

    {{-- LOGO --}}

    {{-- SIDEBAR MENU --}}

    <nav class="flex-1 overflow-y-auto scrollbar-none px-3 py-4">

        {{-- DASHBOARD --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Dashboard</p>
            <a href="{{ route('mitra.dashboard') }}"
                class="{{ request()->routeIs('mitra.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                <x-icon.icon-dashboard />
                <span>Dashboard</span>
            </a>
        </div>

        {{-- OPERASIONAL --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Operasional</p>
            <div class="space-y-1">

                {{-- KENDARAAN --}}

                <a href="{{ route('vehicle.index') }}"
                    class="{{ request()->routeIs('vehicle.*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <x-icon.icon-car />
                    <span>Kendaraan</span>
                </a>

                {{-- PICKUP LOCATION --}}

                <a href="{{ route('pickup-location.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <span>Pickup Locations</span>
                </a>

                {{-- RENTAL --}}
                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                    </svg>
                    <span>Transaksi</span>
                </a>

            </div>
        </div>

        {{-- MITRA --}}

        {{-- RIWAYAT --}}
        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Riwayat
            </p>
            <div class="space-y-1">

                {{-- RIWAYAT TRANSAKSI --}}

                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                    </svg>
                    <span>Riwayat Transaksi</span>
                </a>

            </div>
        </div>

        {{-- LAINNYA --}}

        <div>
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Lainnya
            </p>
            <div class="space-y-1">

                {{-- PENGATURAN --}}

                <a href="#"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5ZM19.5 12a7.5 7.5 0 0 0-.114-1.307l1.664-1.296-1.5-2.598-1.97.797a7.47 7.47 0 0 0-2.26-1.307L15 4.125h-3l-.32 2.164a7.47 7.47 0 0 0-2.26 1.307l-1.97-.797-1.5 2.598 1.664 1.296a7.5 7.5 0 0 0 0 1.307Z" />
                    </svg>
                    <span>Pengaturan</span>
                </a>

                {{-- KELUAR --}}

                <a href="{{ route('logout', auth()->id()) }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M18 15l3-3m0 0-3-3m3 3H9" />
                    </svg>
                    <span>Keluar</span>
                </a>

            </div>
        </div>

    </nav>
</div>
