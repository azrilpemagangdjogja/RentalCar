<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
<nav
    class="flex h-auto py-2 shrink-0 items-center justify-between
    border-b border-gray-200 dark:border-gray-600
    bg-white px-4 text-gray-800
    dark:bg-gray-700 dark:text-white sm:px-8">

    {{-- SEARCH --}}

    <div class="relative hidden sm:block sm:w-64">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <x-icon.icon-search />
        </div>

        <input
            type="text"
            placeholder="Cari kendaraan..."
            class="w-full rounded-xl border border-gray-200 bg-white/60 py-2.5 pl-10 pr-4
            text-sm text-gray-800 outline-none transition
            placeholder:text-gray-400 focus:border-gray-400 focus:ring-2 focus:ring-gray-200
            dark:border-gray-600 dark:bg-gray-700/60 dark:text-gray-50
            dark:placeholder:text-gray-400 dark:focus:border-gray-500 dark:focus:ring-gray-600">
    </div>

    {{-- NAVIGATION --}}

    <div class="ml-auto flex items-center gap-1">

        {{-- HELP --}}

        <a href="#"
            title="Bantuan"
            class="flex h-10 w-10 items-center justify-center rounded-xl
            transition hover:bg-gray-200 hover:text-gray-800
            dark:hover:bg-gray-600 dark:hover:text-white">
            <x-icon.icon-bell />
        </a>

        {{-- SETTINGS --}}

        {{-- <a href="#"
            title="Pengaturan"
            class="flex h-10 w-10 items-center justify-center rounded-xl
            transition hover:bg-gray-200 hover:text-gray-800
            dark:hover:bg-gray-600 dark:hover:text-white">
            <x-icon.icon-settings />
        </a> --}}

        {{-- NOTIFICATION --}}

        <a href="#"
            title="Notifikasi"
            class="relative flex h-10 w-10 items-center justify-center rounded-xl
            transition hover:bg-gray-200 hover:text-gray-800
            dark:hover:bg-gray-600 dark:hover:text-white">

            <x-icon.icon-bell />

            <span
                class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full
                bg-gray-800 dark:bg-gray-50">
            </span>
        </a>

        {{-- PROFILE --}}

        <a href="{{ route('profile.show', auth()->id()) }}"
            title="Profile"
            class="ml-1 flex h-10 w-10 items-center justify-center overflow-hidden rounded-full
            bg-gray-800 transition hover:ring-2 hover:ring-gray-300
            dark:bg-gray-200 dark:hover:ring-gray-500">

            <img
                src="{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('images/default-profile.png') }}"
                alt="Profile"
                class="h-full w-full object-cover">
        </a>

    </div>

</nav>