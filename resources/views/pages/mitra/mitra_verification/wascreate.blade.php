@extends('layouts.admin')

@section('content')
    <section class="w-full">


        {{-- HEADER --}}
        <div class="mb-8">
            <div class="mb-2">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-gray-800 dark:text-gray-400 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                    Kembali
                </a>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                Pengajuan Mitra
            </h1>

            <p class="mt-1 hidden text-sm text-gray-500 dark:text-gray-400 sm:block">
                Informasi mengenai pengajuan Mitra yang sedang kamu ajukan di RentalCar.
            </p>
        </div>

        {{-- STATUS HERO --}}
        <div class="relative mb-6 overflow-hidden rounded-2xl bg-white dark:bg-gray-700">

            {{-- BACKGROUND --}}
            <div class="absolute inset-0 bg-white dark:bg-gray-700"></div>

            {{-- DECORATION --}}
            <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-gray-100/80 dark:bg-gray-600">
            </div>

            <div class="absolute -bottom-24 -left-10 h-40 w-40 rounded-full bg-gray-100/80 dark:bg-gray-600">
            </div>

            {{-- CONTENT --}}
            <div class="relative px-6 py-10 sm:px-10 sm:py-12">
                <div class="max-w-2xl">

                    {{-- STATUS ICON --}}
                    <div
                        class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-gray-700 shadow-sm ring-1 ring-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:ring-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    {{-- STATUS --}}
                    <div class="mb-3">
                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs font-semibold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-gray-500 dark:bg-gray-300"></span>
                            Sedang Diproses
                        </span>
                    </div>

                    {{-- TITLE --}}
                    <h2 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        Pengajuanmu sedang diproses
                    </h2>

                    {{-- DESCRIPTION --}}
                    <p class="mt-3 max-w-xl text-sm leading-6 text-gray-600 dark:text-gray-300 sm:text-base">
                        Kamu sudah pernah mengajukan permintaan menjadi Mitra. Saat ini pengajuan tersebut
                        masih dalam proses pemeriksaan dan belum dapat diajukan kembali.
                    </p>

                </div>
            </div>
        </div>

        {{-- CURRENT STATUS --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Status Pengajuan
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Berikut gambaran posisi pengajuanmu saat ini.
                </p>
            </div>

            <div class="p-5 sm:p-6">

                <div class="flex items-start gap-4">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l3.5 2M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Menunggu pemeriksaan
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Data identitas yang kamu kirim akan diperiksa oleh pihak RentalCar.
                            Selama proses ini berlangsung, kamu tidak perlu mengirimkan pengajuan baru.
                        </p>
                    </div>
                </div>

                <div class="mt-5 rounded-xl bg-white p-4 dark:bg-gray-800">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="mt-0.5 h-5 w-5 shrink-0 text-gray-500 dark:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0 3h.008v.008H12V15.75ZM10.34 3.94 2.92 17a1.75 1.75 0 0 0 1.52 2.62h15.12a1.75 1.75 0 0 0 1.52-2.62L13.66 3.94a1.9 1.9 0 0 0-3.32 0Z" />
                        </svg>

                        <p class="text-sm leading-6 text-gray-600 dark:text-gray-300">
                            Jangan membuat pengajuan baru selama pengajuan sebelumnya masih diproses.
                            Pengajuan baru tidak diperlukan dan dapat menyebabkan data menjadi tidak sesuai.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- WHAT HAPPENS NEXT --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Apa yang akan terjadi setelah ini?
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Proses pengajuanmu akan berjalan melalui beberapa tahap.
                </p>
            </div>

            <div
                class="grid grid-cols-1 divide-y divide-gray-200 dark:divide-gray-600 sm:grid-cols-3 sm:divide-x sm:divide-y-0">

                {{-- STEP 1 --}}
                <div class="p-5 sm:p-6">
                    <div
                        class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-white text-sm font-bold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        1
                    </div>

                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                        Pemeriksaan Data
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Data dan identitas yang kamu kirim akan diperiksa untuk memastikan informasi
                        yang diberikan dapat digunakan dalam proses verifikasi.
                    </p>
                </div>

                {{-- STEP 2 --}}
                <div class="p-5 sm:p-6">
                    <div
                        class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-white text-sm font-bold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        2
                    </div>

                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                        Hasil Verifikasi
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Setelah pemeriksaan selesai, status pengajuanmu akan diperbarui berdasarkan
                        hasil pemeriksaan yang dilakukan.
                    </p>
                </div>

                {{-- STEP 3 --}}
                <div class="p-5 sm:p-6">
                    <div
                        class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-white text-sm font-bold text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        3
                    </div>

                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                        Akses Mitra
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Jika pengajuan disetujui, kamu dapat menggunakan fitur Mitra dan mulai
                        mengelola kendaraan serta lokasi pengambilan.
                    </p>
                </div>

            </div>
        </div>

        {{-- USER RESPONSIBILITY --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Selama menunggu, apa yang perlu dilakukan?
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Tidak banyak yang perlu kamu lakukan. Pastikan beberapa hal berikut tetap diperhatikan.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2 sm:p-6">

                {{-- ITEM 1 --}}
                <div class="flex items-start gap-3">
                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-9.75 6-9.75-6" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Perhatikan informasi akun
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Pastikan informasi kontak pada akunmu tetap dapat digunakan apabila
                            RentalCar perlu menyampaikan informasi terkait pengajuan.
                        </p>
                    </div>
                </div>

                {{-- ITEM 2 --}}
                <div class="flex items-start gap-3">
                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Tunggu proses selesai
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Pemeriksaan membutuhkan waktu. Tidak perlu mengulangi pengajuan selama
                            status pengajuanmu masih dalam proses.
                        </p>
                    </div>
                </div>

                {{-- ITEM 3 --}}
                <div class="flex items-start gap-3">
                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Pastikan data benar
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Jika terdapat informasi yang perlu diperbarui, pastikan perubahan dilakukan
                            sesuai fitur yang tersedia pada akunmu.
                        </p>
                    </div>
                </div>

                {{-- ITEM 4 --}}
                <div class="flex items-start gap-3">
                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 18.75a6.75 6.75 0 0 0 6.75-6.75V9a6.75 6.75 0 1 0-13.5 0v3A6.75 6.75 0 0 0 12 18.75ZM12 18.75v2.25m-3 0h6" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Perhatikan pemberitahuan
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Hasil pemeriksaan dapat disampaikan melalui sistem RentalCar. Periksa
                            akunmu secara berkala untuk mengetahui perubahan status.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- IMPORTANT INFORMATION --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-800">

            <div class="p-5 sm:p-6">
                <div class="flex items-start gap-4">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-gray-700 ring-1 ring-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:ring-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0 3h.008v.008H12V15.75ZM10.34 3.94 2.92 17a1.75 1.75 0 0 0 1.52 2.62h15.12a1.75 1.75 0 0 0 1.52-2.62L13.66 3.94a1.9 1.9 0 0 0-3.32 0Z" />
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-800 dark:text-white">
                            Mengapa kamu tidak dapat mengajukan lagi?
                        </h2>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Setiap pengguna hanya memerlukan satu pengajuan yang sedang diproses.
                            Pembatasan ini membantu mencegah pengajuan ganda dan memastikan proses
                            pemeriksaan menggunakan data yang konsisten.
                        </p>

                        <p class="mt-3 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Setelah pengajuan sebelumnya mendapatkan hasil, sistem akan menentukan
                            langkah berikutnya berdasarkan status pengajuan tersebut.
                        </p>
                    </div>

                </div>
            </div>
        </div>

        {{-- AFTER VERIFICATION --}}
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">

            <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                    Setelah hasil verifikasi tersedia
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Langkah berikutnya bergantung pada hasil pemeriksaan pengajuanmu.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2 sm:p-6">

                {{-- APPROVED --}}
                <div class="rounded-2xl border border-gray-200 p-5 dark:border-gray-600">
                    <div
                        class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-white text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                        </svg>
                    </div>

                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                        Jika pengajuan disetujui
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Status Mitra akan diperbarui dan fitur yang berkaitan dengan pengelolaan
                        kendaraan serta lokasi pengambilan dapat mulai digunakan.
                    </p>
                </div>

                {{-- REJECTED --}}
                <div class="rounded-2xl border border-gray-200 p-5 dark:border-gray-600">
                    <div
                        class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-white text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>

                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                        Jika pengajuan tidak disetujui
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        Informasi mengenai hasil pemeriksaan akan ditampilkan pada sistem. Jika
                        pengajuan dapat diajukan kembali, kamu akan mendapatkan kesempatan untuk
                        melakukan pengajuan sesuai ketentuan yang berlaku.
                    </p>
                </div>

            </div>
        </div>

        {{-- BOTTOM ACTION --}}
        <div
            class="flex flex-col gap-3 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:flex-row sm:items-center sm:justify-between sm:p-6">

            <div>
                <h2 class="text-sm font-semibold text-gray-800 dark:text-white">
                    Tidak perlu melakukan pengajuan ulang
                </h2>

                <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">
                    Pengajuanmu sudah tercatat dan sedang menunggu proses pemeriksaan.
                </p>
            </div>

            <a href="{{ url()->previous() }}"
                class="inline-flex w-full shrink-0 items-center justify-center gap-2 rounded-xl bg-gray-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-800/20 dark:bg-gray-50 dark:text-gray-800 dark:hover:bg-gray-200 dark:focus:ring-gray-50/20 sm:w-auto">
                Kembali
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>

        </div>

    </section>
@endsection
