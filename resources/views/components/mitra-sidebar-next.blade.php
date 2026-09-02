<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
<div class="hidden h-full w-58 shrink-0 bg-gray-50 pl-2 text-gray-800 dark:bg-gray-700 dark:text-gray-50 md:flex md:flex-col">

    {{-- LOGO --}}

    <div class="flex h-16 items-center px-5">
        <span class="text-xl font-bold">RentalCar</span>
    </div>

    {{-- SIDEBAR MENU --}}

    <nav class="flex-1 overflow-y-auto px-3 py-4">

        {{-- DASHBOARD --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">Dashboard</p>
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                <x-icon.icon-dashboard />
                <span>Dashboard</span>
            </a>
        </div>

        {{-- OPERASIONAL --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">Operasional</p>
            <div class="space-y-1">

                {{-- KENDARAAN --}}

                <a href="{{ $mitra ? route('vehicle.index') : route('mitra.profile') }}" class="{{ request()->routeIs('vehicle.*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <x-icon.icon-car />
                    <span>Kendaraan</span>
                </a>

                {{-- PICKUP LOCATION --}}

                <a href="{{ $mitra ? route('pickup-location.index') : route('mitra.profile') }}" class="{{ request()->routeIs('pickup-location.*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.5-7.5 10.5-7.5 10.5S4.5 18 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <span>Pickup Locations</span>
                </a>

            </div>
        </div>

        {{-- MITRA --}}

        <div class="mb-6">
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">Mitra</p>
            <div class="space-y-1">

                {{-- PROFILE MITRA --}}

                <a href="{{ route('mitra.profile') }}" class="{{ request()->routeIs('mitra.profile') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
                    </svg>
                    <span>Profile Mitra</span>
                </a>

                {{-- MEMBER MITRA --}}

                @if ($mitra && $isOwner && $mitra->type === 'Organization')
                    <a href="{{ route('mitra.members') }}" class="{{ request()->routeIs('mitra.members*') ? 'flex items-center gap-3 rounded-lg bg-gray-800 px-3 py-2.5 text-sm font-medium text-white transition duration-200 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500' : 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 3.75.782 9.75 9.75 0 0 0 3.75-.75M15 19.128v-3.375a6.375 6.375 0 0 0-12.75 0v3.375M15 19.128a9.37 9.37 0 0 1-3.75.782 9.37 9.37 0 0 1-3.75-.782M12 9.75a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0ZM19.5 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span>Member Mitra</span>
                    </a>
                @endif

            </div>
        </div>

        {{-- LAINNYA --}}

        <div>
            <p class="mb-2 px-2 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-300">Lainnya</p>
            <div class="space-y-1">

                {{-- SETTINGS --}}

                <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5ZM19.5 12a7.5 7.5 0 0 0-.114-1.307l1.664-1.296-1.5-2.598-1.97.797a7.47 7.47 0 0 0-2.26-1.307L15 4.125h-3l-.32 2.164a7.47 7.47 0 0 0-2.26 1.307l-1.97-.797-1.5 2.598 1.664 1.296A7.5 7.5 0 0 0 7.5 12c0 .45.04.891.114 1.32L5.95 14.616l1.5 2.598 1.97-.797a7.47 7.47 0 0 0 2.26 1.307l.32 2.164h3l.32-2.164a7.47 7.47 0 0 0 2.26-1.307l1.97.797 1.5-2.598-1.664-1.296c.074-.426.114-.864.114-1.307Z" />
                    </svg>
                    <span>Pengaturan</span>
                </a>

                {{-- LOGOUT --}}

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-medium transition duration-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-500 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M18 15l3-3m0 0-3-3m3 3H9" />
                        </svg>
                        <span>Keluar</span>
                    </button>
                </form>

            </div>
        </div>
    </nav>
</div>
