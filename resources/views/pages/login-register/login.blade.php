<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RentalCar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 dark:bg-gray-800">

    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="w-full max-w-5xl overflow-hidden rounded-3xl bg-white shadow-2xl dark:bg-gray-900">
            <div class="grid min-h-[600px] md:grid-cols-2">

                {{-- LEFT SIDE --}}

                <div class="relative hidden overflow-hidden bg-gray-700 md:block">
                    <div class="absolute inset-0">
                        <img src="{{ asset('images/login-background.png') }}" alt="RentalCar"
                            class="h-full w-full object-cover opacity-60">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-br from-black/30 to-black/20"></div>
                    <div class="relative z-10 flex h-full flex-col justify-between p-10 text-white">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18M6 15.75h.01M18 15.75h.01" />
                                    </svg>
                                </div>
                                <span class="text-2xl font-bold tracking-tight">RentalCar</span>
                            </div>
                            <div class="mt-20 max-w-md">
                                <h1 class="text-4xl font-bold leading-tight lg:text-5xl">Perjalanan lebih mudah bersama RentalCar.</h1>
                                <p class="mt-5 text-base leading-7 text-gray-300">Temukan kendaraan yang sesuai dengan kebutuhanmu dan nikmati pengalaman rental yang aman dan nyaman.</p>
                            </div>
                        </div>
                        <div class="text-sm text-gray-400">© {{ date('Y') }} RentalCar. All rights reserved.</div>
                    </div>
                </div>

                {{-- RIGHT SIDE --}}

                <div class="flex items-center justify-center p-6 dark:bg-gray-700 sm:p-10 lg:p-14">
                    <div class="w-full max-w-md">

                        {{-- MOBILE LOGO --}}

                        <div class="mb-10 flex items-center justify-center gap-3 md:hidden">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-900 text-white dark:bg-white dark:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM18.75 18.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 1 1 3 0ZM3 18.75V9.75l2.25-4.5h13.5L21 9.75v9M3 12h18M6 15.75h.01M18 15.75h.01" />
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">RentalCar</span>
                        </div>

                        {{-- HEADING --}}

                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Selamat datang kembali</h2>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Masuk ke akunmu untuk melanjutkan.</p>
                        </div>

                        {{-- VALIDATION ERROR --}}

                        @if ($errors->any())
                            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-900/50 dark:bg-red-950/30">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-5 w-5 shrink-0 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m0 3.75h.007v.008H12v-.008ZM10.5 3.75h3L21 18.75H3L10.5 3.75Z" />
                                    </svg>
                                    <div>
                                        @foreach ($errors->all() as $error)
                                            <p class="text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- LOGIN FORM --}}

                        <form action="{{ route('authorized') }}" method="POST" class="space-y-5">
                            @csrf

                            {{-- EMAIL --}}

                            <div>
                                <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0l-7.5-4.615A2.25 2.25 0 0 1 2.25 6.993V6.75" />
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                        placeholder="nama@email.com"
                                        class="w-full rounded-xl border border-gray-300 bg-gray-50 py-3.5 pl-12 pr-4 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-gray-900 focus:bg-white focus:ring-2 focus:ring-gray-900/10 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-white dark:focus:bg-gray-800 dark:focus:ring-white/10">
                                </div>
                            </div>

                            {{-- PASSWORD --}}

                            <div>
                                <div class="mb-2 flex items-center justify-between">
                                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                    <a href="#" class="text-sm font-medium text-gray-900 hover:underline dark:text-white">Lupa password?</a>
                                </div>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21H6.75A2.25 2.25 0 0 1 4.5 18.75v-6a2.25 2.25 0 0 1 2.25-2.25Z" />
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" required
                                        placeholder="Masukkan password"
                                        class="w-full rounded-xl border border-gray-300 bg-gray-50 py-3.5 pl-12 pr-4 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-gray-900 focus:bg-gray-50 focus:ring-2 focus:ring-gray-900/10 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-white dark:focus:bg-gray-800 dark:focus:ring-white/10">
                                </div>
                            </div>

                            {{-- REMEMBER --}}

                            <div class="flex items-center">
                                <label class="flex cursor-pointer items-center gap-2">
                                    <input type="checkbox" name="remember"
                                        class="h-4 w-4 rounded border-gray-300 text-gray-900 focus:ring-gray-900 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:ring-white">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
                                </label>
                            </div>

                            {{-- SUBMIT --}}

                            <button type="submit"
                                class="w-full rounded-xl bg-gray-900 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-900/20 active:scale-[0.99] dark:bg-white dark:text-gray-900 dark:hover:bg-gray-200 dark:focus:ring-white/20">
                                Masuk
                            </button>
                        </form>

                        {{-- REGISTER --}}

                        <p class="mt-8 text-center text-sm text-gray-500 dark:text-gray-400">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="font-semibold text-gray-900 hover:underline dark:text-white">Daftar sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>