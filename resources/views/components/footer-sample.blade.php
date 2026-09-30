<nav
    class="fixed inset-x-0 bottom-0 z-50 border-t border-gray-100 bg-white px-2 pb-[env(safe-area-inset-bottom)] shadow-[0_-2px_10px_rgba(0,0,0,0.05)] dark:border-gray-600 dark:bg-gray-700 sm:hidden">
    <div class="mx-auto flex h-16 max-w-lg items-center justify-around">

        {{-- BERANDA --}}
        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Superadmin')
            <a href="{{ route('admin.dashboard') }}"
                class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 {{ request()->routeIs('admin.dashboard') ? 'font-semibold text-gray-800 dark:text-gray-50' : 'text-gray-500 dark:text-gray-300' }}">
            @elseif (auth()->user()->mitra_status == 'Verified')
                <a href="{{ route('mitra.dashboard') }}"
                    class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 {{ request()->routeIs('mitra.dashboard') ? 'font-semibold text-gray-800 dark:text-gray-50' : 'text-gray-500 dark:text-gray-300' }}">
                @else
                    <a href="{{ route('customer.dashboard') }}"
                        class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 {{ request()->routeIs('customer.dashboard') ? 'font-semibold text-gray-800 dark:text-gray-50' : 'text-gray-500 dark:text-gray-300' }}">
        @endif
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m2.25 12 8.954-8.954a1.125 1.125 0 0 1 1.592 0L21.75 12M4.5 9.75v9.375a1.125 1.125 0 0 0 1.125 1.125h3.75v-5.25h5.25v5.25h3.75a1.125 1.125 0 0 0 1.125-1.125V9.75" />
        </svg>
        <span class="text-[10px] font-medium">Beranda</span>
        </a>

        {{-- TRANSAKSI --}}
        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Superadmin')
            <a href="{{ route('admin.dashboard') }}"
                class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-300">
            @elseif (auth()->user()->mitra_status == 'Verified')
                <a href="{{ route('mitra.dashboard') }}"
                    class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-300">
                @else
                    <a href="{{ route('customer.dashboard') }}"
                        class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-300">
        @endif
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12h6m-6 4h4m-7 5h8a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3Z" />
        </svg>
        <span class="text-[10px] font-medium">Transaksi</span>
        </a>

        {{-- SEWA --}}
        <a href="#"
            class="-mt-5 flex h-14 w-14 items-center justify-center rounded-full bg-gray-800 text-white shadow-lg ring-4 ring-white transition duration-200 hover:bg-gray-700 dark:bg-gray-100 dark:text-gray-800 dark:ring-gray-700 dark:hover:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
            </svg>
        </a>

        {{-- RIWAYAT --}}
        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Superadmin')
            <a href="{{ route('user-history.index') }}"
                class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 {{ request()->routeIs('user-history.index') ? 'font-semibold text-gray-800 dark:text-gray-50' : 'text-gray-500 dark:text-gray-300' }}">
            @elseif (auth()->user()->mitra_status == 'Verified')
                <a href="{{ route('mitra.dashboard') }}"
                    class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-300">
                @else
                    <a href="{{ route('customer.dashboard') }}"
                        class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-300">
        @endif
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 8v4l2.5 2.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span class="text-[10px] font-medium">Riwayat</span>
        </a>

        {{-- PROFIL --}}
        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Superadmin')
            <a href="{{ route('admin.dashboard') }}"
                class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-300">
            @elseif (auth()->user()->mitra_status == 'Verified')
                <a href="{{ route('mitra.dashboard') }}"
                    class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-300">
                @else
                    <a href="{{ route('customer.dashboard') }}"
                        class="relative flex h-14 w-16 flex-col items-center justify-center gap-1 text-gray-500 dark:text-gray-300">
        @endif
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 1 1-7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0" />
        </svg>
        <span class="text-[10px] font-medium">Profil</span>
        </a>

    </div>
</nav>