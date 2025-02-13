@extends('layouts.navbar-user')

@section('content')
<h2 class="font-bold text-2xl mb-2">Daftar Lamaran</h2>
<nav aria-label="breadcrumb" class="w-max mb-2">
    <ol class="flex w-full flex-wrap items-center rounded-md bg-slate-50">
        <li
            class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
            <a href="{{ route('dashboard-user.indexUser') }}">Dashboard</a>
            <span class="pointer-events-none mx-2 text-slate-800">
                /
            </span>
        </li>
        <li
            class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
            <a href="#">Daftar Lamaran</a>
    </ol>
</nav>
    <div class="container mx-auto">
        <div class="mt-6">
            <a href="{{ route('lowongan') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Cari Lowongan
            </a>
        </div>
        <br>
        <!-- Breadcrumb -->

        <!-- Cek jika tidak ada lamaran -->
        @if ($lamarans->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p class="font-bold">Tidak ada lamaran yang ditemukan</p>
                <p>Anda belum mengajukan lamaran pekerjaan. Coba cari lowongan yang tersedia dan ajukan lamaran.</p>
            </div>
        @else
            <!-- Tabel Data Lamaran -->
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                CV
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status Lamaran
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($lamarans as $lamaran)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $lamaran->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-500">
                                    <a href="/path/to/cv/{{ $lamaran->cv }}" target="_blank" class="hover:underline">Lihat CV</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if ($lamaran->status == 0)
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Sedang Diproses</span>
                                    @elseif($lamaran->status == 1)
                                        <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Diterima</span>
                                    @elseif($lamaran->status == 2)
                                        <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Ditolak</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $lamaran->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                    <button @click="openModal = true" class="text-blue-500 hover:underline">
                                        Lihat Detail Lamaran
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal untuk Detail Lamaran -->
                            <div x-data="{ openModal: false }">
                                <template x-if="openModal">
                                    <div class="fixed z-10 inset-0 overflow-y-auto">
                                        <!-- Modal content tetap sama -->
                                    </div>
                                </template>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

      
    </div>
@endsection
