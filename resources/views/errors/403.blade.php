@extends('layouts.admin')
@section('content')
    <main class="flex min-h-screen items-center justify-center px-5">
        <div class="w-full max-w-md text-center">

            <div class="mb-6 text-xl font-bold text-gray-700 dark:text-gray-200">
                403
            </div>

            <h1 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                Akses Ditolak
            </h1>

            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Kamu perlu izin dan syarat yang cukup untuk mengakses halaman ini
            </p>

            <a href="{{ url()->previous() }}"
                class="mt-6 inline-flex rounded-xl bg-gray-700 px-5 py-3 text-sm font-medium text-white transition hover:bg-gray-800">
                Kembali
            </a>

        </div>
    </main>
@endsection
