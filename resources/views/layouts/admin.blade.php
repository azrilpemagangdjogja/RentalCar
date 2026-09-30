<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalCar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Superadmin')
    <div
        class="flex h-screen w-full flex-col overflow-hidden 
        bg-gradient-to-b from-slate-200/60 via-slate-200/50 to-slate-100/90
        {{-- bg-slate-100/80 dark:bg-gray-800/95 --}}
        dark:bg-gradient-to-t dark:from-slate-800 dark:via-gray-800 dark:to-gray-800/95
        text-gray-800 dark:text-gray-50">
        <x-admin-navbar />
    @elseif (auth()->user()->mitra_status == 'Verified')
    <div
        class="flex h-screen w-full flex-col overflow-hidden 
        bg-gradient-to-b from-slate-200/60 via-slate-200/50 to-slate-100/90
        {{-- bg-slate-100/80 dark:bg-gray-800/95 --}}
        dark:bg-gradient-to-t dark:from-slate-800 dark:via-gray-800 dark:to-gray-800/95
        text-gray-800 dark:text-gray-50">
        <x-admin-navbar />
    @else
    <div
        class="flex h-screen w-full flex-col overflow-hidden 
        {{-- bg-gradient-to-b from-slate-100 via-slate-100/90 to-slate-100/80 --}}
        bg-slate-100/80 dark:bg-gray-800/95
        {{-- dark:bg-gradient-to-t dark:from-slate-800 dark:via-gray-800 dark:to-gray-800/95 --}}
        text-gray-800 dark:text-gray-50">
        
    @endif
        <div class="flex min-h-0 w-full flex-1">
            @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Superadmin')
                <x-admin-sidebar />
                <main class="min-h-0 w-full relative flex-1 overflow-y-auto md:px-6 px-4 py-4 scrollbar-thin scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 scrollbar-track-transparent">
                    @yield('content')
                <x-mitra-footer />
                </main>
            @elseif (auth()->user()->mitra_status == 'Verified')
                <x-mitra-sidebar />
                <main class="min-h-0 w-full relative flex-1 overflow-y-auto md:px-6 px-4 py-4 scrollbar-thin scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 scrollbar-track-transparent">
                    @yield('content')
                <x-mitra-footer />
                </main>
            @else
                <x-customer-sidebar/>
                <div class="min-h-0 w-full flex flex-col">
                    <x-customer-navbar/>
                    <main class="min-h-0 w-full relative flex-1 overflow-y-auto sm:px-8 px-4 py-8 scrollbar-none scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 scrollbar-track-transparent">
                        @yield('content')
                    <x-mitra-footer />
                    </main>
                </div>
            @endif
            {{-- <main class="min-h-0 w-full relative flex-1 overflow-y-auto md:px-6 px-4 py-4 scrollbar-thin scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 scrollbar-track-transparent"> --}}
        </div>
    </div>
</body>

</html>
