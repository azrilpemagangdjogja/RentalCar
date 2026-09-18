@extends('layouts.admin')

@section('content')
    <section class="w-full">
        {{-- HEADER --}} <section class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="hidden items-center gap-2 text-sm text-gray-400 dark:text-gray-400 md:flex"> <a href="#"
                            class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a> <svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg> <span>Approvement</span> </div>
                    <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        Approvement Identitas Mitra </h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Periksa dan kelola pengajuan identitas pengguna yang ingin menjadi mitra. </p>
                </div>
            </div>
        </section>


        {{-- SUMMARY --}}
        <section class="mb-6 grid grid-cols-2 gap-3 sm:grid-cols-4 sm:gap-5">
            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Total</span>
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.5a3 3 0 0 0 6 0v-15a3 3 0 0 0-6 0v15ZM9 4.5a3 3 0 0 0-6 0v15a3 3 0 0 0 6 0v-15ZM6 7.5h12M6 16.5h12" />
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">{{ $approvement->total() }}</p>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Pengajuan identitas</p>
            </div>

            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Pending</span>
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $approvement->where('status', 'Pending')->count() }}
                </p>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Menunggu keputusan</p>
            </div>

            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Approved</span>
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 4.5 4.5 10.5-10.5" />
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $approvement->where('status', 'Approved')->count() }}
                </p>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Telah disetujui</p>
            </div>

            <div class="rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-300 sm:text-sm">Rejected</span>
                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
                <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $approvement->where('status', 'Rejected')->count() }}
                </p>
                <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">Telah ditolak</p>
            </div>
        </section>

        {{-- FILTER --}}
        <section class="mb-8 rounded-2xl border border-gray-100 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="relative w-full lg:max-w-lg">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.5-4.5m2.25-5.25a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Cari nama, NIK, atau email..."
                        class="w-full rounded-xl border border-gray-200 bg-white py-3 pl-11 pr-4 text-sm text-gray-800 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-white/10">
                </div>

                <div class="w-full sm:w-auto">
                    <select
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-600 outline-none transition focus:border-gray-500 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-300 dark:focus:ring-white/10 sm:min-w-48">
                        <option value="">Semua Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
            </div>
        </section>

        {{-- APPROVEMENT LIST --}}
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white sm:text-xl">Pengajuan Identitas</h2>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 sm:text-sm">
                    Periksa data identitas sebelum menyetujui pengajuan mitra.
                </p>
            </div>
        </div>

        <section class="mb-8">
            <div class="space-y-4">
                @forelse ($approvement as $item)
                    <article
                        class="rounded-2xl border border-gray-100 bg-white p-5 transition hover:border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 sm:p-6">
                        <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                            <div class="flex min-w-0 items-start gap-4">
                                <div class="h-14 w-14 shrink-0 overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-600">
                                    @if ($item->user?->profile)
                                        <img src="{{ asset('storage/' . $item->user->profile) }}"
                                            alt="{{ $item->user->name }}" class="h-full w-full object-cover">
                                    @else
                                        <div
                                            class="flex h-full w-full items-center justify-center text-gray-400 dark:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.8" stroke="currentColor" class="h-7 w-7">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0M4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h3 class="truncate text-base font-bold text-gray-800 dark:text-white sm:text-lg">
                                            {{ $item->longname ?? $item->user?->name }}
                                        </h3>

                                        @if ($item->status == 'Pending')
                                            <span
                                                class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                                Pending
                                            </span>
                                        @elseif ($item->status == 'Approved')
                                            <span
                                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                                Approved
                                            </span>
                                        @elseif ($item->status == 'Rejected')
                                            <span
                                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                Rejected
                                            </span>
                                        @else
                                            <span
                                                class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </div>

                                    <p class="mt-1 truncate text-sm text-gray-500 dark:text-gray-400">
                                        {{ $item->user?->email ?? ($item->email ?? '-') }}
                                    </p>

                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">
                                        Diajukan {{ $item->created_at?->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            </div>

                            <div
                                class="grid grid-cols-2 gap-4 border-t border-gray-100 pt-4 dark:border-gray-600 sm:grid-cols-3 sm:border-0 sm:pt-0 lg:min-w-[430px]">
                                <div>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">NIK</p>
                                    <p class="mt-1 truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->nik ?? '-' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">No. Telepon</p>
                                    <p class="mt-1 truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->user?->telp ?? ($item->telp ?? '-') }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">Nama Akun</p>
                                    <p class="mt-1 truncate text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $item->user?->name ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-2 border-t border-gray-100 pt-4 dark:border-gray-600 lg:border-0 lg:pt-0">
                                <a href="{{ route('approval-mitra-identity.show', $item->id) }}"
                                    class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-gray-100 px-4 py-2.5 text-xs font-semibold text-gray-700 transition hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 sm:flex-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    Detail
                                </a>

                                @if ($item->status == 'Pending')
                                    <form action="{{ route('approval-mitra-identity.approve', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Setujui pengajuan identitas {{ $item->longname ?? $item->user?->name }}?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="flex h-full items-center justify-center rounded-xl bg-gray-800 px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                                            Approve
                                        </button>
                                    </form>

                                    <a href=""
                                        class="flex items-center justify-center rounded-xl border border-gray-200 px-4 py-2.5 text-xs font-semibold text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600">
                                        Reject
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <div
                        class="rounded-2xl border border-gray-100 bg-white px-6 py-16 text-center dark:border-gray-600 dark:bg-gray-700">
                        <div class="flex flex-col items-center">
                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-gray-400 dark:bg-gray-600 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-7 w-7">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.5a3 3 0 0 0 6 0v-15a3 3 0 0 0-6 0v15ZM9 4.5a3 3 0 0 0-6 0v15a3 3 0 0 0 6 0v-15ZM6 7.5h12M6 16.5h12" />
                                </svg>
                            </div>
                            <p class="mt-4 font-semibold text-gray-700 dark:text-gray-200">
                                Belum ada pengajuan
                            </p>
                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-400">
                                Belum ada pengajuan identitas mitra yang perlu diproses.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($approvement->hasPages())
                <div class="mt-6">
                    {{ $approvement->links() }}
                </div>
            @endif
        </section>
    </section>
@endsection
@if (session('error'))
    <script>
        alert(@js(session('error')));
    </script>
@endif