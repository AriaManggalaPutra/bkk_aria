@extends('layouts.navbar-admin')

@section('content')
    <h2 class="font-bold text-2xl mb-2">Tracer Study</h2>
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
                <a href="#">Tracer Study</a>
                <span class="pointer-events-none mx-2 text-slate-800">
                    /
                </span>
            </li>
            <li
                class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
                <a href="#">{{ $murid->nama }}</a>
            </li>
        </ol>
    </nav>

    <div>
        <div class="">
            <div class="w-full bg-white shadow-lg rounded-lg">
                <div class="px-6 py-5">
                    <div class="flex items-center">
                        <div class="flex-grow truncate">
                            <div class="w-full sm:flex justify-between items-center mb-1">
                                <div class="flex">
                                    <img class="rounded-full w-12 h-12"
                                        src="{{ asset('storage/profiles/' . $murid->profile) }}"
                                        alt="No Image">
                                    <div class="ml-4">
                                        <h2 class="font-bold">{{ $murid->nama }}</h2>
                                        <h2 class="text-gray-500 text-sm">{{ $murid->email }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row mt-5 gap-4"> <!-- Ensure flex-col on small screens and flex-row on larger -->
        <div class="w-full md:w-1/2">
            <div class="w-full bg-white shadow-lg rounded-lg">
                <div class="px-6 py-3">
                    <div class="flex items-center">
                        <div class="flex-grow truncate">
                            <div class="w-full sm:flex justify-between items-center mb-1">
                                <div class="flex w-full items-center">
                                    <h2 class="font-bold">Data Pribadi</h2>
                                    <div class="ml-auto">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="w-full">
                            <div>
                                <div class="text-sm mt-3">
                                    <label for="first_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" id="first_name" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->nama }}" required />
                                </div>
                                <div class="text-sm mt-3">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                                    <input type="text" id="email" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->email }}" required />
                                </div>
                                <div class="text-sm mt-3">
                                    <label for="telp"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                        Telepon</label>
                                    <input type="text" id="telp" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->no_telepon ?? '-' }}" required />
                                </div>
                                <div class="text-sm mt-3">
                                    <label for="jurusan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                    <input type="text" id="jurusan" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->jurusan ?? '-' }}" required />
                                </div>
                                <div class="text-sm mt-3">
                                    <label for="rayon"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rayon</label>
                                    <input type="text" id="rayon" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->rayon ?? '-' }}" required />
                                </div>
                                <div class="text-sm mt-3">
                                    <label for="alamat"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <input type="text" id="alamat" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->alamat ?? '-' }}" required />
                                </div>
                                <div class="text-sm mt-3">
                                    <label for="alamat"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <input type="text" id="alamat" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->status ?? '-' }}" required />
                                </div>
                                <div class="text-sm mt-3">
                                    <label for="feedback"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feedback</label>
                                    <input type="text" id="feedback" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->feedback ?? '-' }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2">
            <div class="w-full bg-white shadow-lg rounded-lg">
                <div class="px-6 py-3">
                    <div class="flex items-center">
                        <div class="flex-grow truncate">
                            <div class="w-full sm:flex justify-between items-center mb-1">
                                <div class="flex w-full items-center">
                                    <h2 class="font-bold">Data Pekerjaan</h2>
                                    <div class="ml-auto">
                                        <i class="fa-solid fa-briefcase "></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="w-full">
                            @foreach ($pekerjaans as $pekerjaan)
                                <div class="w-full bg-white border mt-4 shadow-lg rounded-lg">
                                    <div class="px-6 py-3">
                                        <div class="flex-grow truncate">
                                            <div class="w-full sm:flex justify-between items-center mb-1">
                                                <div class="block w-full items-center">
                                                    <div class="flex items-center">
                                                        <p class="font-bold">{{ $pekerjaan->posisi }}</p>
                                                    </div>
                                                    <div class="flex items-center text-sm">
                                                        <p>{{ $pekerjaan->nama_perusahaan }}</p>
                                                        <div class="rounded-full mx-1 bg-black w-0.5 h-0.5"></div>
                                                        <p>{{ $pekerjaan->model_kerja }}</p>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        <p>{{ \Carbon\Carbon::parse($pekerjaan->tanggal_mulai)->translatedFormat('F j, Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($pekerjaan->tanggal_berakhir)->translatedFormat('F j, Y') }}
                                                        </p>
                                                        <p>{{ $pekerjaan->alamat_perusahaan }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row mt-5 gap-4">
        <div class="w-full mt-6 md:w-1/2">
            <div class="w-full bg-white shadow-lg rounded-lg">
                <div class="px-6 py-3">
                    <div class="flex items-center">
                        <div class="flex-grow truncate">
                            <div class="w-full sm:flex justify-between items-center mb-1">
                                <div class="flex w-full items-center">
                                    <h2 class="font-bold">Data Pendidikan</h2>
                                    <div class="ml-auto">
                                        <i class="fa-solid fa-book"></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="w-full">
                            @foreach ($pendidikans as $pendidikan)
                                <div class="w-full bg-white border mt-4 shadow-lg rounded-lg">
                                    <div class="px-6 py-3">
                                        <div class="flex-grow truncate">
                                            <div class="w-full sm:flex justify-between items-center mb-1">
                                                <div class="block w-full items-center">
                                                    <div class="flex">
                                                        <p class="font-bold">{{ $pendidikan->nama_universitas }}</p>
                                                    </div>
                                                    <div class="flex items-center text-sm">
                                                        <p>{{ $pendidikan->jurusan }}</p>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        <p>{{ \Carbon\Carbon::parse($pendidikan->tanggal_mulai)->translatedFormat('F j, Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($pendidikan->tanggal_berakhir)->translatedFormat('F j, Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-6 md:w-1/2">
            <div class="w-full bg-white shadow-lg rounded-lg">
                <div class="px-6 py-3">
                    <div class="flex items-center">
                        <div class="flex-grow truncate">
                            <div class="w-full sm:flex justify-between items-center mb-1">
                                <div class="flex w-full items-center">
                                    <h2 class="font-bold">Data Wirausaha</h2>
                                    <div class="ml-auto">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="w-full">
                            @foreach ($wirausahas as $wirausaha)
                                <div class="w-full bg-white border mt-4 shadow-lg rounded-lg">
                                    <div class="px-6 py-3">
                                        <div class="flex-grow truncate">
                                            <div class="w-full sm:flex justify-between items-center mb-1">
                                                <div class="block w-full items-center">
                                                    <div class="flex">
                                                        <p class="font-bold">{{ $wirausaha->nama_usaha }}</p>
                                                    </div>
                                                    <div class="flex items-center text-sm">
                                                        <p>{{ $wirausaha->bidang_usaha }}</p>
                                                        <div class="rounded-full mx-1 bg-black w-0.5 h-0.5"></div>
                                                        <p>{{ 'Rp ' . number_format($wirausaha->omzet, 0, ',', '.') }}</p>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        <p>{{ \Carbon\Carbon::parse($wirausaha->tanggal_mulai)->translatedFormat('F j, Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($wirausaha->tanggal_berakhir)->translatedFormat('F j, Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="wirausahaedit-{{ $wirausaha->id }}" data-modal-backdrop="static" tabindex="-1"
                                    aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit Data Wirausaha
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="wirausahaedit-{{ $wirausaha->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div>
                                                    <form
                                                        action="{{ route('tracerStudy.updateWirausaha', $wirausaha->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="text-sm mt-3">
                                                            <label for="nama_usaha"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                                Usaha</label>
                                                            <input type="text" name="nama_usaha" id="nama_usaha"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $wirausaha->nama_usaha }}"
                                                                placeholder="Masukkan Nama Usaha" required />
                                                        </div>
                                                        <div class="text-sm mt-3">
                                                            <label for="omzet"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Omzet</label>
                                                            <input type="text" name="omzet" id="omzet"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $wirausaha->omzet }}"
                                                                placeholder="Masukkan Jurusan" required />
                                                        </div>
                                                        <div class="text-sm mt-3">
                                                            <label for="tanggal_mulai"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Mulai</label>
                                                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $wirausaha->tanggal_mulai }}" required />
                                                        </div>
                                                        <div class="text-sm mt-3">
                                                            <label for="tanggal_berakhir"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Berakhir</label>
                                                            <input type="date" name="tanggal_berakhir"
                                                                id="tanggal_berakhir"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $wirausaha->tanggal_berakhir }}" required />
                                                        </div>
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="pekerjaanadd-modal" type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                    accept</button>
                                                </form>
                                                <button data-modal-hide="pekerjaanadd-modal" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
