@extends('layouts.admin')

@section('content')
    <section class="w-full">
        {{-- HEADER --}} <section class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    {{-- <div class="hidden items-center gap-2 text-sm text-gray-400 dark:text-gray-400 sm:flex"> <a href="#"
                            class="transition hover:text-gray-700 dark:hover:text-gray-200">Operasional</a> <svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                        </svg> <span>Approvement</span> </div> --}}
                    <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-800 dark:text-white sm:text-3xl">
                        Setujui Identitas Mitra </h1>
                    <p class="mt-1 hidden sm:block text-sm text-gray-500 dark:text-gray-400">
                        Periksa dan kelola pengajuan identitas pengguna yang ingin menjadi mitra. </p>
                </div>
            </div>
        </section>

        {{-- SUMMARY --}}

        <div class="mt-8 hidden grid-cols-2 gap-3 sm:grid sm:grid-cols-4">

            {{-- TOTAL PENGAJUAN --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Pengajuan</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">{{ $approvement->total() }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.25h13.5v13.5H5.25z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h7.5M8.25 14.25h4.5" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- PENDING --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Pending</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $approvement->where('status', 'Pending')->count() }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- APPROVED --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Approved</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $approvement->where('status', 'Approved')->count() }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 4.5 4.5 10.5-10.5" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- REJECTED --}}

            <div class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Rejected</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $approvement->where('status', 'Rejected')->count() }}</p>
                    </div>
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        {{-- SEARCH & FILTER --}}

        <form action="{{ route('approval-vehicle.index') }}" class="mt-8 mb-4 flex flex-col gap-3 sm:flex-row">

            <div class="relative flex-1">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z" />
                    </svg>
                </div>
                <input type="search" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama, NIK, atau email..."
                    class="w-full rounded-xl border border-gray-200 bg-white py-3.5 pl-12 pr-4 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
            </div>

            <select name="status"
                class="rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-sm text-gray-700 outline-none transition focus:border-gray-800 focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:focus:border-gray-300 sm:min-w-48">
                <option value="">Semua Status</option>
                <option value="Pending" @selected(request('status') == 'Pending')>Pending</option>
                <option value="Approved" @selected(request('status') == 'Approved')>Approved</option>
                <option value="Rejected" @selected(request('status') == 'Rejected')>Rejected</option>
            </select>

            <button type="submit"
                class="rounded-xl bg-gray-800 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-gray-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white">
                Cari
            </button>

        </form>

        {{-- APPROVEMENT LIST --}}


        <section class="mb-8">
            {{-- DESKTOP TABLE --}}
            <div
                class="hidden overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700 lg:block">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead
                            class="border-b border-gray-200 bg-gray-50 text-xs uppercase text-gray-500 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-300">
                            <tr>
                                <th class="px-5 py-4 font-semibold">Pemohon</th>
                                <th class="px-5 py-4 font-semibold">NIK</th>
                                <th class="px-5 py-4 font-semibold">No. Telepon</th>
                                <th class="px-5 py-4 font-semibold">Diajukan</th>
                                <th class="px-5 py-4 font-semibold">Status</th>
                                <th class="px-5 py-4 text-right font-semibold">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 dark:divide-gray-600">
                            @forelse ($approvement as $item)
                                <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-600/50">
                                    {{-- APPLICANT --}}
                                    <td class="px-5 py-4">
                                        <div class="flex min-w-0 items-center gap-3">
                                            <div
                                                class="h-11 w-11 shrink-0 overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-600">
                                                @if ($item->applicant?->profile)
                                                    <img src="{{ asset('storage/' . $item->applicant->profile) }}"
                                                        alt="{{ $item->applicant->name }}"
                                                        class="h-full w-full object-cover">
                                                @else
                                                    <div
                                                        class="flex h-full w-full items-center justify-center text-gray-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                            class="h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0M4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="min-w-0">
                                                <p class="truncate font-semibold text-gray-800 dark:text-white">
                                                    {{ $item->longname ?? $item->applicant?->name }}
                                                </p>
                                                <p class="mt-1 truncate text-xs text-gray-400">
                                                    {{ $item->applicant?->email ?? ($item->email ?? '-') }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- NIK --}}
                                    <td class="whitespace-nowrap px-5 py-4 font-medium text-gray-700 dark:text-gray-200">
                                        {{ $item->nik ?? '-' }}
                                    </td>

                                    {{-- PHONE --}}
                                    <td class="whitespace-nowrap px-5 py-4 text-gray-600 dark:text-gray-300">
                                        {{ $item->applicant?->telp ?? ($item->telp ?? '-') }}
                                    </td>

                                    {{-- DATE --}}
                                    <td class="whitespace-nowrap px-5 py-4 text-gray-600 dark:text-gray-300">
                                        {{ $item->created_at?->format('d M Y, H:i') }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-5 py-4">
                                        @if ($item->status == 'Pending')
                                            <span
                                                class="inline-flex rounded-full bg-gray-800 px-3 py-1 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                                Pending
                                            </span>
                                        @elseif($item->status == 'Approved')
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                                Approved
                                            </span>
                                        @elseif($item->status == 'Rejected')
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                Rejected
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </td>

                                    {{-- ACTION --}}
                                    <td class="px-5 py-4">
                                        <div class="flex justify-end gap-1">
                                            <a href="{{ route('approval-mitra-identity.show', $item->id) }}"
                                                class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                title="Lihat Detail">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                    class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </a>

                                            @if ($item->status == 'Pending')
                                                <form action="{{ route('approval-mitra-identity.approve', $item->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Setujui pengajuan identitas {{ $item->longname ?? $item->applicant?->name }}?')">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                        class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        title="Approve">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                            class="h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m5 12.75 4 3.75L19 7.5" />
                                                        </svg>
                                                    </button>
                                                </form>

                                                <a href="{{ route('approval-mitra-identity.rejection', $item->id) }}"
                                                    class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-gray-800 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    title="Reject">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
                                                        class="h-5 w-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m7.5 7.5 9 9m0-9-9 9" />
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <p class="font-semibold text-gray-700 dark:text-gray-200">
                                            Belum ada pengajuan
                                        </p>
                                        <p class="mt-1 text-xs text-gray-400">
                                            Belum ada pengajuan identitas mitra yang perlu diproses.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- TABLET AND MOBILE CARDS --}}
            <div class="space-y-3 lg:hidden">
                @forelse ($approvement as $item)
                    <article class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-700">
                        {{-- APPLICANT --}}
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="h-14 w-14 shrink-0 overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-600">
                                @if ($item->applicant?->profile)
                                    <img src="{{ asset('storage/' . $item->applicant->profile) }}"
                                        alt="{{ $item->applicant->name }}" class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full w-full items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0M4.5 20.25a7.5 7.5 0 0 1 15 0" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="min-w-0 flex-1">
                                <p class="truncate font-semibold text-gray-800 dark:text-white">
                                    {{ $item->longname ?? $item->applicant?->name }}
                                </p>
                                <p class="mt-1 truncate text-xs text-gray-400">
                                    {{ $item->applicant?->email ?? ($item->email ?? '-') }}
                                </p>
                            </div>

                            @if ($item->status == 'Pending')
                                <span
                                    class="shrink-0 rounded-full bg-gray-800 px-2.5 py-1 text-[10px] font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                    Pending
                                </span>
                            @elseif($item->status == 'Approved')
                                <span
                                    class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-300">
                                    Approved
                                </span>
                            @elseif($item->status == 'Rejected')
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

                        {{-- SUMMARY --}}
                        <div class="mt-4 grid grid-cols-2 gap-3 border-t border-gray-200 pt-3 dark:border-gray-600">
                            <div class="min-w-0">
                                <p class="text-xs text-gray-400">NIK</p>
                                <p class="mt-1 truncate text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{ $item->nik ?? '-' }}
                                </p>
                            </div>

                            <div class="min-w-0">
                                <p class="text-xs text-gray-400">No. Telepon</p>
                                <p class="mt-1 truncate text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{ $item->applicant?->telp ?? ($item->telp ?? '-') }}
                                </p>
                            </div>

                            <div class="col-span-2 min-w-0">
                                <p class="text-xs text-gray-400">Diajukan</p>
                                <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">
                                    {{ $item->created_at?->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>

                        {{-- ACTION --}}
                        <div class="mt-4 flex gap-2 border-t border-gray-200 pt-3 dark:border-gray-600">
                            <a href="{{ route('approval-mitra-identity.show', $item->id) }}"
                                class="flex flex-1 items-center justify-center rounded-xl bg-gray-100 px-3 py-2.5 text-xs font-semibold text-gray-700 transition hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">
                                Lihat Detail
                            </a>

                            @if ($item->status == 'Pending')
                                <form action="{{ route('approval-mitra-identity.approve', $item->id) }}" method="POST"
                                    class="flex flex-1"
                                    onsubmit="return confirm('Setujui pengajuan identitas {{ $item->longname ?? $item->applicant?->name }}?')">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                        class="w-full rounded-xl bg-gray-800 px-3 py-2.5 text-xs font-semibold text-white dark:bg-gray-200 dark:text-gray-800">
                                        Approve
                                    </button>
                                </form>

                                <a href="{{ route('approval-mitra-identity.rejection', $item->id) }}"
                                    class="flex flex-1 items-center justify-center rounded-xl border border-gray-200 px-3 py-2.5 text-xs font-semibold text-gray-700 dark:border-gray-500 dark:text-gray-200">
                                    Reject
                                </a>
                            @endif
                        </div>
                    </article>
                @empty
                    <div
                        class="rounded-2xl border border-gray-200 bg-white px-6 py-16 text-center dark:border-gray-600 dark:bg-gray-700">
                        <p class="font-semibold text-gray-700 dark:text-gray-200">
                            Belum ada pengajuan
                        </p>
                        <p class="mt-1 text-xs text-gray-400">
                            Belum ada pengajuan identitas mitra yang perlu diproses.
                        </p>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
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
