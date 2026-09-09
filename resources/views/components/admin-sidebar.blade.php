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
    class="pointer-events-none fixed left-0 top-0 z-[60] h-full w-72 overflow-auto scrollbar-thin -translate-x-full bg-gray-50 text-gray-800 shadow-xl transition-transform duration-300 peer-checked:pointer-events-auto peer-checked:translate-x-0 md:hidden dark:bg-gray-700 dark:text-gray-50">

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

    <nav class="flex-1 px-3 py-4">

        {{-- DASHBOARD --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Dashboard
            </p>

            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 3.75h6.5v6.5h-6.5v-6.5ZM13.75 3.75h6.5v6.5h-6.5v-6.5ZM3.75 13.75h6.5v6.5h-6.5v-6.5ZM13.75 13.75h6.5v6.5h-6.5v-6.5Z" />
                </svg>
                <span>Dashboard</span>
            </a>
        </div>

        {{-- PENGELOLAAN --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Pengelolaan
            </p>

            <div class="space-y-1">

                {{-- USERS --}}

                <a href="{{ route('user.index') }}"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                    </svg>
                    <span>Kelola Users</span>
                </a>

                {{-- REGION FILTER --}}

                <a href="{{ route('region-filter.index') }}"
                    class="{{ request()->routeIs('region-filter.*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 21h16.5M5.25 21V8.25l6.75-4.5 6.75 4.5V21M9 21v-6h6v6M8.25 9.75h.008v.008H8.25V9.75ZM12 9.75h.008v.008H12V9.75ZM15.75 9.75h.008v.008h-.008V9.75Z" />
                    </svg>
                    <span>Filter Region</span>
                </a>

                {{-- RENTAL TIMES --}}

                <a href="{{ route('rental-time.index') }}"
                    class="{{ request()->routeIs('rental-time.*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                    </svg>
                    <span>Kelola Waktu Rental</span>
                </a>

                {{-- TYPE VEHICLES --}}

                <a href="{{ route('vehicle-type.index') }}"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                    </svg>
                    <span>Kelola Jenis Kendaraan</span>
                </a>

                {{-- PICKUP LOCATIONS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <span>Pickup Locations</span>
                </a>

            </div>
        </div>

        {{-- APPROVAL --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Approval
            </p>

            <div class="space-y-1">

                {{-- MITRA APPROVAL --}}

                <a href="#"
                    class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}' }}">

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Approval Mitra</span>
                    </div>

                    <span
                        class="rounded-full bg-gray-800 px-2 py-0.5 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                        3
                    </span>
                </a>

                {{-- MEMBER APPROVAL --}}

                <a href="#"
                    class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}' }}">

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.75-1.67M18 18.72a9.094 9.094 0 0 1-12 0M18 18.72V21m-12-2.28V21m12-2.28a9.094 9.094 0 0 0 3.75-1.67M6 18.72a9.094 9.094 0 0 1-3.75-1.67M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM21 12a3 3 0 1 1-6 0M3 12a3 3 0 1 1 6 0" />
                        </svg>
                        <span>Approval Member Mitra</span>
                    </div>

                    <span
                        class="rounded-full bg-gray-800 px-2 py-0.5 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                        5
                    </span>
                </a>

                {{-- FINE APPROVAL --}}

                <a href="#"
                    class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}' }}">

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                        </svg>
                        <span>Approval Denda</span>
                    </div>

                    <span
                        class="rounded-full bg-gray-800 px-2 py-0.5 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                        2
                    </span>
                </a>

            </div>
        </div>

        {{-- TRANSAKSI --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Transaksi
            </p>

            <div class="space-y-1">

                {{-- RENTAL --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1-3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                    </svg>
                    <span>Kelola Transaksi</span>
                </a>

                {{-- PAYMENTS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5v10.5H3.75V6.75ZM3.75 10.5h16.5M7.5 15h3" />
                    </svg>
                    <span>Pembayaran</span>
                </a>

                {{-- REFUND --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12a7.5 7.5 0 0 1 12.803-5.303L19.5 9M19.5 9V4.5M19.5 9H15M19.5 12a7.5 7.5 0 0 1-12.803 5.303L4.5 15M4.5 15v4.5M4.5 15H9" />
                    </svg>
                    <span>Refund</span>
                </a>

            </div>
        </div>

        {{-- LAPORAN --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Laporan
            </p>

            <div class="space-y-1">

                {{-- REPORT TRANSACTIONS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 19.5V9.75M10.5 19.5V4.5M16.5 19.5v-6.75M21 19.5H3" />
                    </svg>
                    <span>Laporan Transaksi</span>
                </a>

                {{-- REPORT MITRA --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 21h16.5M5.25 21V8.25l6.75-4.5 6.75 4.5V21M9 21v-6h6v6" />
                    </svg>
                    <span>Laporan Mitra</span>
                </a>

                {{-- REPORT REVENUE --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m4.5-9.75h-6a2.25 2.25 0 0 0 0 4.5h3a2.25 2.25 0 0 1 0 4.5h-6" />
                    </svg>
                    <span>Pendapatan Platform</span>
                </a>

            </div>
        </div>

        {{-- SISTEM --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Sistem
            </p>

            <div class="space-y-1">

                {{-- SYSTEM SETTINGS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5ZM19.5 12a7.5 7.5 0 0 0-.114-1.307l1.664-1.296-1.5-2.598-1.97.797a7.47 7.47 0 0 0-2.26-1.307L15 4.125h-3l-.32 2.164a7.47 7.47 0 0 0-2.26 1.307l-1.97-.797-1.5 2.598 1.664 1.296a7.5 7.5 0 0 0 0 1.307Z" />
                    </svg>
                    <span>Pengaturan Sistem</span>
                </a>

                {{-- PLATFORM FEE --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m4.5-9.75h-6a2.25 2.25 0 0 0 0 4.5h3a2.25 2.25 0 0 1 0 4.5h-6" />
                    </svg>
                    <span>Biaya & Komisi</span>
                </a>

                {{-- RENTAL SETTINGS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m4.5-9.75h-6a2.25 2.25 0 0 0 0 4.5h3a2.25 2.25 0 0 1 0 4.5h-6" />
                    </svg>
                    <span>Aturan Persewaan</span>
                </a>

                {{-- FINE SETTINGS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                    </svg>
                    <span>Aturan Denda</span>
                </a>

            </div>
        </div>

        {{-- LANDING PAGE --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Landing Page
            </p>

            <div class="space-y-1">

                {{-- LANDING HERO --}}

                <a href="{{ route('landing.hero') }}"
                    class="{{ request()->routeIs('landing.hero') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 5.25h15v13.5h-15V5.25ZM8.25 9h7.5M8.25 12h7.5M8.25 15h4.5" />
                    </svg>
                    <span>Hero Section</span>
                </a>

                {{-- LANDING ABOUT --}}

                <a href="{{ route('landing.about') }}"
                    class="{{ request()->routeIs('landing.about') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m3.75 16.5 4.5-4.5 3 3 4.5-6 4.5 5.25M3.75 19.5h16.5M5.25 4.5h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V6a1.5 1.5 0 0 1 1.5-1.5Z" />
                    </svg>
                    <span>About Section</span>
                </a>

                {{-- LANDING HOWTOUSE --}}

                <a href="{{ route('landing.howto') }}"
                    class="{{ request()->routeIs('landing.howto') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Fitur & Keunggulan</span>
                </a>

                {{-- LANDING FAQ --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 9.75a2.25 2.25 0 1 1 4.5 0c0 1.5-2.25 1.5-2.25 3M12 16.5h.008v.008H12V16.5ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>FAQ</span>
                </a>

                {{-- TESTIMONIAL --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 8.25h9m-9 3h6M6 19.5l-2.25 1.125V6A2.25 2.25 0 0 1 6 3.75h12A2.25 2.25 0 0 1 20.25 6v9A2.25 2.25 0 0 1 18 17.25H9L6 19.5Z" />
                    </svg>
                    <span>Testimoni</span>
                </a>

            </div>
        </div>

        {{-- LAINNYA --}}

        <div>
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Lainnya
            </p>

            <div class="space-y-1">

                {{-- ACTIVITY LOG --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l4 2M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Aktivitas Sistem</span>
                </a>

                {{-- SETTINGS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5ZM19.5 12a7.5 7.5 0 0 0-.114-1.307l1.664-1.296-1.5-2.598-1.97.797a7.47 7.47 0 0 0-2.26-1.307L15 4.125h-3l-.32 2.164a7.47 7.47 0 0 0-2.26 1.307l-1.97-.797-1.5 2.598 1.664 1.296a7.5 7.5 0 0 0 0 1.307Z" />
                    </svg>
                    <span>Pengaturan</span>
                </a>

                {{-- LOGOUT --}}

                <a href="{{ route('logout', auth()->id()) }}"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M18 15l3-3m0 0-3-3m3 3H9" />
                    </svg>
                    <span>Keluar</span>
                </a>

            </div>
        </div>

    </nav>

</aside>


<div
    class="hidden h-full w-58 shrink-0 bg-gray-50 pl-2 text-gray-800 dark:bg-gray-700 dark:text-gray-50 md:flex md:flex-col">

    {{-- LOGO --}}

    {{-- <div class="flex h-16 shrink-0 items-center px-5">
        <div>
            <p class="text-lg font-bold tracking-tight text-gray-800 dark:text-white">RentalCar</p>
            <p class="text-[10px] font-medium uppercase tracking-wider text-gray-400 dark:text-gray-300">Admin Panel</p>
        </div>
    </div> --}}

    {{-- SIDEBAR MENU --}}

    <nav class="flex-1 overflow-y-auto px-3 py-4 scrollbar-none">

        {{-- DASHBOARD --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Dashboard
            </p>

            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 3.75h6.5v6.5h-6.5v-6.5ZM13.75 3.75h6.5v6.5h-6.5v-6.5ZM3.75 13.75h6.5v6.5h-6.5v-6.5ZM13.75 13.75h6.5v6.5h-6.5v-6.5Z" />
                </svg>
                <span>Dashboard</span>
            </a>
        </div>

        {{-- PENGELOLAAN --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Pengelolaan
            </p>

            <div class="space-y-1">

                {{-- USERS --}}

                <a href="{{ route('user.index') }}"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                    </svg>
                    <span>Kelola Users</span>
                </a>

                {{-- REGION FILTER --}}

                <a href="{{ route('region-filter.index') }}"
                    class="{{ request()->routeIs('region-filter.*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 21h16.5M5.25 21V8.25l6.75-4.5 6.75 4.5V21M9 21v-6h6v6M8.25 9.75h.008v.008H8.25V9.75ZM12 9.75h.008v.008H12V9.75ZM15.75 9.75h.008v.008h-.008V9.75Z" />
                    </svg>
                    <span>Filter Region</span>
                </a>

                {{-- RENTAL TIMES --}}

                <a href="{{ route('rental-time.index') }}"
                    class="{{ request()->routeIs('rental-time.*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                    </svg>
                    <span>Kelola Waktu Rental</span>
                </a>

                {{-- TYPE VEHICLES --}}

                <a href="{{ route('vehicle-type.index') }}"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                    </svg>
                    <span>Kelola Jenis Kendaraan</span>
                </a>

                {{-- PICKUP LOCATIONS --}}

                <a href="{{ route('pickup-location.index') }}"
                    class="{{ request()->routeIs('pickup-location.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <span>Pickup Locations</span>
                </a>

            </div>
        </div>

        {{-- APPROVAL --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Approval
            </p>

            <div class="space-y-1">

                {{-- MITRA APPROVAL --}}

                <a href="#"
                    class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}' }}">

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Approval Mitra</span>
                    </div>

                    <span
                        class="rounded-full bg-gray-800 px-2 py-0.5 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                        3
                    </span>
                </a>

                {{-- MEMBER APPROVAL --}}

                <a href="#"
                    class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}' }}">

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.75-1.67M18 18.72a9.094 9.094 0 0 1-12 0M18 18.72V21m-12-2.28V21m12-2.28a9.094 9.094 0 0 0 3.75-1.67M6 18.72a9.094 9.094 0 0 1-3.75-1.67M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM21 12a3 3 0 1 1-6 0M3 12a3 3 0 1 1 6 0" />
                        </svg>
                        <span>Approval Member Mitra</span>
                    </div>

                    <span
                        class="rounded-full bg-gray-800 px-2 py-0.5 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                        5
                    </span>
                </a>

                {{-- FINE APPROVAL --}}

                <a href="#"
                    class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}' }}">

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                        </svg>
                        <span>Approval Denda</span>
                    </div>

                    <span
                        class="rounded-full bg-gray-800 px-2 py-0.5 text-[10px] font-semibold text-white dark:bg-gray-50 dark:text-gray-800">
                        2
                    </span>
                </a>

            </div>
        </div>

        {{-- TRANSAKSI --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Transaksi
            </p>

            <div class="space-y-1">

                {{-- RENTAL --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1-3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18" />
                    </svg>
                    <span>Kelola Transaksi</span>
                </a>

                {{-- PAYMENTS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5v10.5H3.75V6.75ZM3.75 10.5h16.5M7.5 15h3" />
                    </svg>
                    <span>Pembayaran</span>
                </a>

                {{-- REFUND --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12a7.5 7.5 0 0 1 12.803-5.303L19.5 9M19.5 9V4.5M19.5 9H15M19.5 12a7.5 7.5 0 0 1-12.803 5.303L4.5 15M4.5 15v4.5M4.5 15H9" />
                    </svg>
                    <span>Refund</span>
                </a>

            </div>
        </div>

        {{-- LAPORAN --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Laporan
            </p>

            <div class="space-y-1">

                {{-- REPORT TRANSACTIONS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 19.5V9.75M10.5 19.5V4.5M16.5 19.5v-6.75M21 19.5H3" />
                    </svg>
                    <span>Laporan Transaksi</span>
                </a>

                {{-- REPORT MITRA --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 21h16.5M5.25 21V8.25l6.75-4.5 6.75 4.5V21M9 21v-6h6v6" />
                    </svg>
                    <span>Laporan Mitra</span>
                </a>

                {{-- REPORT REVENUE --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m4.5-9.75h-6a2.25 2.25 0 0 0 0 4.5h3a2.25 2.25 0 0 1 0 4.5h-6" />
                    </svg>
                    <span>Pendapatan Platform</span>
                </a>

            </div>
        </div>

        {{-- SISTEM --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Sistem
            </p>

            <div class="space-y-1">

                {{-- SYSTEM SETTINGS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5ZM19.5 12a7.5 7.5 0 0 0-.114-1.307l1.664-1.296-1.5-2.598-1.97.797a7.47 7.47 0 0 0-2.26-1.307L15 4.125h-3l-.32 2.164a7.47 7.47 0 0 0-2.26 1.307l-1.97-.797-1.5 2.598 1.664 1.296a7.5 7.5 0 0 0 0 1.307Z" />
                    </svg>
                    <span>Pengaturan Sistem</span>
                </a>

                {{-- PLATFORM FEE --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m4.5-9.75h-6a2.25 2.25 0 0 0 0 4.5h3a2.25 2.25 0 0 1 0 4.5h-6" />
                    </svg>
                    <span>Biaya & Komisi</span>
                </a>

                {{-- RENTAL SETTINGS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m4.5-9.75h-6a2.25 2.25 0 0 0 0 4.5h3a2.25 2.25 0 0 1 0 4.5h-6" />
                    </svg>
                    <span>Aturan Persewaan</span>
                </a>

                {{-- FINE SETTINGS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                    </svg>
                    <span>Aturan Denda</span>
                </a>

            </div>
        </div>

        {{-- LANDING PAGE --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Landing Page
            </p>

            <div class="space-y-1">

                {{-- LANDING HERO --}}

                <a href="{{ route('landing.hero') }}"
                    class="{{ request()->routeIs('landing.hero') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 5.25h15v13.5h-15V5.25ZM8.25 9h7.5M8.25 12h7.5M8.25 15h4.5" />
                    </svg>
                    <span>Hero Section</span>
                </a>

                {{-- LANDING ABOUT --}}

                <a href="{{ route('landing.about') }}"
                    class="{{ request()->routeIs('landing.about') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m3.75 16.5 4.5-4.5 3 3 4.5-6 4.5 5.25M3.75 19.5h16.5M5.25 4.5h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V6a1.5 1.5 0 0 1 1.5-1.5Z" />
                    </svg>
                    <span>About Section</span>
                </a>

                {{-- LANDING HOWTOUSE --}}

                <a href="{{ route('landing.howto') }}"
                    class="{{ request()->routeIs('landing.howto') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Fitur & Keunggulan</span>
                </a>

                {{-- LANDING FAQ --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 9.75a2.25 2.25 0 1 1 4.5 0c0 1.5-2.25 1.5-2.25 3M12 16.5h.008v.008H12V16.5ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>FAQ</span>
                </a>

                {{-- TESTIMONIAL --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 8.25h9m-9 3h6M6 19.5l-2.25 1.125V6A2.25 2.25 0 0 1 6 3.75h12A2.25 2.25 0 0 1 20.25 6v9A2.25 2.25 0 0 1 18 17.25H9L6 19.5Z" />
                    </svg>
                    <span>Testimoni</span>
                </a>

            </div>
        </div>

        {{-- LAINNYA --}}

        <div>
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">
                Lainnya
            </p>

            <div class="space-y-1">

                {{-- ACTIVITY LOG --}}

                <a href="{{ route('user-history.index') }}"
                    class="{{ request()->routeIs('user-history.*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6l4 2M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Aktivitas Sistem</span>
                </a>

                {{-- SETTINGS --}}

                <a href="#"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5ZM19.5 12a7.5 7.5 0 0 0-.114-1.307l1.664-1.296-1.5-2.598-1.97.797a7.47 7.47 0 0 0-2.26-1.307L15 4.125h-3l-.32 2.164a7.47 7.47 0 0 0-2.26 1.307l-1.97-.797-1.5 2.598 1.664 1.296a7.5 7.5 0 0 0 0 1.307Z" />
                    </svg>
                    <span>Pengaturan</span>
                </a>

                {{-- LOGOUT --}}

                <a href="{{ route('logout', auth()->id()) }}"
                    class="{{ request()->routeIs('user.index') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M18 15l3-3m0 0-3-3m3 3H9" />
                    </svg>
                    <span>Keluar</span>
                </a>

            </div>
        </div>

    </nav>
</div>
