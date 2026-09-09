<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div
        class="flex h-screen w-full flex-col overflow-hidden bg-slate-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50">
        <x-admin-navbar />
        <div class="flex min-h-0 w-full flex-1">
            @if (auth()->user()->role == "Admin" || auth()->user()->role == "Superadmin")

                <x-admin-sidebar/>
            
            @elseif (auth()->user()->mitra_status == "Verified")

                <x-mitra-sidebar/>

            @else

                <x-customer-sidebar/>

            @endif
            <main class="min-h-0 w-full flex-1 overflow-y-auto bg-gray-100 px-6 py-4 dark:bg-gray-800 scrollbar-thin scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 scrollbar-track-transparent">
                @yield('content')
                <x-mitra-footer/>
            </main>     
        </div>
    </div>
</body>

</html>
