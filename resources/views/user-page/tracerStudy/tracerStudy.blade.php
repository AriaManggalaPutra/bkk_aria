@extends('layouts.navbar-user')

@section('content')
    @if (Session::get('success'))
        <div id="toast-success"
            class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ Session::get('success') }}.</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

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
                                        src="{{ asset('storage/profiles/' . $murid->profile) }}" alt="No Image">
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
                                        <i class="cursor-pointer fa-solid fa-pen-to-square"
                                            data-modal-target="profile-modal" data-modal-toggle="profile-modal"></i>
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
                                    <label for="angkatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angkatan</label>
                                    <input type="text" id="angkatan" disabled
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $murid->angkatan }}" required />
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
                                        <i class="fa-solid cursor-pointer fa-plus" data-modal-target="pekerjaanadd-modal"
                                            data-modal-toggle="pekerjaanadd-modal"></i>
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
                                                        <i data-modal-target="pekerjaanedit-{{ $pekerjaan->id }}"
                                                            data-modal-toggle="pekerjaanedit-{{ $pekerjaan->id }}"
                                                            class="fa-regular ml-auto cursor-pointer fa-pen-to-square"></i>
                                                    </div>
                                                    <div class="flex items-center text-sm">
                                                        <p>{{ $pekerjaan->nama_perusahaan }}</p>
                                                        <div class="rounded-full mx-1 bg-black w-0.5 h-0.5"></div>
                                                        <p>{{ $pekerjaan->model_kerja }}</p>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        <p>{{ \Carbon\Carbon::parse($pekerjaan->tanggal_mulai)->translatedFormat('F j, Y') }}
                                                            -
                                                            @if ($pekerjaan->status_bekerja == 'Tidak')
                                                            {{ \Carbon\Carbon::parse($pekerjaan->tanggal_berakhir)->translatedFormat('F j, Y') }}

                                                            @elseif ($pekerjaan->status_bekerja == 'Masih')
                                                            {{ "Sekarang" }}
                                                            @endif
                                                        </p>
                                                        <p>{{ $pekerjaan->alamat_perusahaan }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="pekerjaanedit-{{ $pekerjaan->id }}" data-modal-backdrop="static" tabindex="-1"
                                    aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit Data Pekerjaan
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="pekerjaanedit-{{ $pekerjaan->id }}">
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
                                                        action="{{ route('tracerStudy.updatePekerjaan', $pekerjaan->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="text-sm mt-3">
                                                            <label for="nama_perusahaan"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                                Perusahaan</label>
                                                            <input type="text" name="nama_perusahaan"
                                                                id="nama_perusahaan"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pekerjaan->nama_perusahaan }}"
                                                                placeholder="Masukkan Nama Perusahaan" required />
                                                        </div>
                                                        <div class="text-sm mt-3">
                                                            <label for="posisi"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                                                            <input type="text" name="posisi" id="posisi"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pekerjaan->posisi }}"
                                                                placeholder="Masukkan Posisi" required />
                                                        </div>
                                                        <div class="text-sm mt-3">
                                                            <label for="model_kerja"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                                                Model
                                                                Kerja</label>
                                                            <select id="model_kerja" name="model_kerja"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option value="" disabled
                                                                    {{ is_null($pekerjaan->model_kerja) ? 'selected' : '' }}>
                                                                    Pilih Model Kerja</option>
                                                                <option value="Magang"
                                                                    {{ $pekerjaan->model_kerja == 'Magang' ? 'selected' : '' }}>
                                                                    Magang</option>
                                                                <option value="Penuh Waktu"
                                                                    {{ $pekerjaan->model_kerja == 'Penuh Waktu' ? 'selected' : '' }}>
                                                                    Penuh Waktu</option>
                                                                <option value="Paruh Waktu"
                                                                    {{ $pekerjaan->model_kerja == 'Paruh Waktu' ? 'selected' : '' }}>
                                                                    Paruh Waktu</option>
                                                            </select>
                                                        </div>
                                                        <div class="text-sm mt-3">
                                                            <label for="tanggal_mulai"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Mulai</label>
                                                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pekerjaan->tanggal_mulai }}" required />
                                                        </div>
                                                        @if ($pekerjaan->status_bekerja == 'Tidak')
                                                        <div class="text-sm mt-3">
                                                            <label for="tanggal_berakhir"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Berakhir</label>
                                                            <input type="date" name="tanggal_berakhir"
                                                                id="tanggal_berakhir"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pekerjaan->tanggal_berakhir }}" required />
                                                        </div>
                                                        @elseif($pekerjaan->status_bekerja == 'Masih')
                                                        <div class="text-sm mt-3">
                                                            <label for="keberlanjutan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Apakah Masih Bekerja Disini?
                                                            </label>
                                                            <div class="flex">
                                                                <div class="flex items-center me-4">
                                                                    <input id="masihBekerjaEdit" type="radio" value="Masih" name="statusBekerja"
                                                                        onclick="toggleTanggalBerakhirBekerjaEdit()"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ $pekerjaan->status_bekerja == 'Masih' ? 'checked' : '' }}>
                                                                    <label for="masihBekerjaEdit" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Masih</label>
                                                                </div>
                                                                <div class="flex items-center me-4">
                                                                    <input id="tidakBekerjaEdit" type="radio" value="Tidak" name="statusBekerja"
                                                                        onclick="toggleTanggalBerakhirBekerjaEdit()"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ $pekerjaan->status_bekerja == 'Tidak' ? 'checked' : '' }}>
                                                                    <label for="tidakBekerjaEdit" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="tanggal_berakhir_bekerja_edit_div" class="text-sm mt-3 hidden">
                                                            <label for="tanggal_berakhir"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Berakhir</label>
                                                            <input type="date" name="tanggal_berakhir" value="{{ $pekerjaan->tanggal_berakhir }}" id="tanggal_berakhir"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        @endif
                                                        <div class="text-sm mt-3">
                                                            <label for="alamat"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                            <input type="text" name="alamat" id="alamat"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pekerjaan->alamat_perusahaan }}" required />
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
                                        <i class="fa-solid cursor-pointer fa-plus" data-modal-target="pendidikanadd-modal"
                                            data-modal-toggle="pendidikanadd-modal"></i>
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
                                                        <i data-modal-target="pendidikanedit-{{ $pendidikan->id }}"
                                                            data-modal-toggle="pendidikanedit-{{ $pendidikan->id }}"
                                                            class="fa-regular ml-auto cursor-pointer fa-pen-to-square"></i>
                                                    </div>
                                                    <div class="flex items-center text-sm">
                                                        <p>{{ $pendidikan->jurusan }}</p>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        <p>{{ \Carbon\Carbon::parse($pendidikan->tanggal_mulai)->translatedFormat('F j, Y') }}
                                                            -
                                                            @if ($pendidikan->status_pendidikan == 'Tidak')
                                                            {{ \Carbon\Carbon::parse($pendidikan->tanggal_berakhir)->translatedFormat('F j, Y') }}

                                                            @elseif ($pendidikan->status_pendidikan == 'Masih')
                                                            {{ "Sekarang" }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="pendidikanedit-{{ $pendidikan->id }}" data-modal-backdrop="static"
                                    tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit Data Pendidikan
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="pendidikanedit-{{ $pendidikan->id }}">
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
                                                        action="{{ route('tracerStudy.updatePendidikan', $pendidikan->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="text-sm mt-3">
                                                            <label for="nama_universitas"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                                Universitas</label>
                                                            <input type="text" name="nama_universitas"
                                                                id="nama_universitas"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pendidikan->nama_universitas }}"
                                                                placeholder="Masukkan Nama Universitas" required />
                                                        </div>
                                                        <div class="text-sm mt-3">
                                                            <label for="jurusan"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                                            <input type="text" name="jurusan" id="jurusan"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pendidikan->jurusan }}"
                                                                placeholder="Masukkan Jurusan" required />
                                                        </div>
                                                        <div class="text-sm mt-3">
                                                            <label for="tanggal_mulai"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Mulai</label>
                                                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pendidikan->tanggal_mulai }}" required />
                                                        </div>
                                                        @if ($pendidikan->status_pendidikan == 'Tidak')
                                                        <div class="text-sm mt-3">
                                                            <label for="tanggal_berakhir"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Berakhir</label>
                                                            <input type="date" name="tanggal_berakhir"
                                                                id="tanggal_berakhir"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $pendidikan->tanggal_berakhir }}" required />
                                                        </div>
                                                        @elseif($pendidikan->status_pendidikan == 'Masih')
                                                        <div class="text-sm mt-3">
                                                            <label for="keberlanjutan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Apakah Masih Menempuh Pendiidkan Disini?
                                                            </label>
                                                            <div class="flex">
                                                                <div class="flex items-center me-4">
                                                                    <input id="masihPendidikanEdit" type="radio" value="Masih" name="statusPendidikan"
                                                                        onclick="toggleTanggalBerakhirPendidikanaEdit()"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ $pendidikan->status_pendidikan == 'Masih' ? 'checked' : '' }}>
                                                                    <label for="masihPendidikanEdit" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Masih</label>
                                                                </div>
                                                                <div class="flex items-center me-4">
                                                                    <input id="tidakPendidikanEdit" type="radio" value="Tidak" name="statusPendidikan"
                                                                        onclick="toggleTanggalBerakhirPendidikanaEdit()"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ $pendidikan->status_pendidikan == 'Tidak' ? 'checked' : '' }}>
                                                                    <label for="tidakPendidikanEdit" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="tanggal_berakhir_pendidikan_edit_div" class="text-sm mt-3 hidden">
                                                            <label for="tanggal_berakhir"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Berakhir</label>
                                                            <input type="date" name="tanggal_berakhir" value="{{ $pendidikan->tanggal_berakhir }}" id="tanggal_berakhir"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        @endif
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
                                        <i class="fa-solid cursor-pointer fa-plus" data-modal-target="wirausahaadd-modal"
                                            data-modal-toggle="wirausahaadd-modal"></i>
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
                                                        <i data-modal-target="wirausahaedit-{{ $wirausaha->id }}"
                                                            data-modal-toggle="wirausahaedit-{{ $wirausaha->id }}"
                                                            class="fa-regular ml-auto cursor-pointer fa-pen-to-square"></i>
                                                    </div>
                                                    <div class="flex items-center text-sm">
                                                        <div class="flex items-center text-sm">
                                                            <p>{{ $wirausaha->bidang_usaha }}</p>
                                                            <div class="rounded-full mx-1 bg-black w-0.5 h-0.5"></div>
                                                            <p>{{ 'Rp ' . number_format($wirausaha->omzet, 0, ',', '.') }}</p>

                                                        </div>
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        <p>{{ \Carbon\Carbon::parse($wirausaha->tanggal_mulai)->translatedFormat('F j, Y') }}
                                                            -
                                                            @if ($wirausaha->status_wirausaha == 'Tidak')
                                                            {{ \Carbon\Carbon::parse($wirausaha->tanggal_berakhir)->translatedFormat('F j, Y') }}

                                                            @elseif ($wirausaha->status_wirausaha == 'Masih')
                                                            {{ "Sekarang" }}
                                                            @endif
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
                                                            <label for="nama_universitas"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang
                                                                Usaha</label>
                                                            <input type="text" name="bidang_usaha" id="bidang_usaha"
                                                                value="{{ $wirausaha->bidang_usaha }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Masukkan Bidang Usaha" required />
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
                                                        @if ($wirausaha->status_wirausaha == 'Tidak')
                                                        <div class="text-sm mt-3">
                                                            <label for="tanggal_berakhir"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Berakhir</label>
                                                            <input type="date" name="tanggal_berakhir"
                                                                id="tanggal_berakhir"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                value="{{ $wirausaha->tanggal_berakhir }}" required />
                                                        </div>
                                                        @elseif($wirausaha->status_wirausaha == 'Masih')
                                                        <div class="text-sm mt-3">
                                                            <label for="keberlanjutan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Apakah Masih berwirausaha?
                                                            </label>
                                                            <div class="flex">
                                                                <div class="flex items-center me-4">
                                                                    <input id="masihWirausahaEdit" type="radio" value="Masih" name="statusWirausaha"
                                                                        onclick="toggleTanggalBerakhirWirausahaEdit()"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ $wirausaha->status_wirausaha == 'Masih' ? 'checked' : '' }}>
                                                                    <label for="masihWirausahaEdit" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Masih</label>
                                                                </div>
                                                                <div class="flex items-center me-4">
                                                                    <input id="tidakWirausahaEdit" type="radio" value="Tidak" name="statusWirausaha"
                                                                        onclick="toggleTanggalBerakhirWirausahaEdit()"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ $wirausaha->status_wirausaha == 'Tidak' ? 'checked' : '' }}>
                                                                    <label for="tidakWirausahaEdit" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="tanggal_berakhir_wirausaha_edit_div" class="text-sm mt-3 hidden">
                                                            <label for="tanggal_berakhir"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Berakhir</label>
                                                            <input type="date" name="tanggal_berakhir" value="{{ $wirausaha->tanggal_berakhir }}" id="tanggal_berakhir"
                                                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                        </div>
                                                        @endif
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

    <div id="profile-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Data Pribadi
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="profile-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <form action="{{ route('tracerStudy.updateProfile', $murid->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="text-sm mt-3">
                                <label for="first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="nama" id="first_name"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $murid->nama }}" required />
                            </div>
                            <div class="text-sm mt-3">

                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Profile</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" name="profile" id="file_input" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG,
                                    JPG.</p>

                        </div>
                            <div class="text-sm mt-3">
                                <label for="angkatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angkatan</label>
                                <input type="text" name="angkatan" id="angkatan"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $murid->angkatan }}" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                                <input type="text" name="email" id="email"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $murid->email }}" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="telp"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                    Telepon</label>
                                <input type="text" name="no_telepon" id="telp"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $murid->no_telepon ?? '-' }}" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="jurusan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                <select id="jurusan" name="jurusan"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled {{ is_null($murid->jurusan) ? 'selected' : '' }}>Pilih
                                        Jurusan Saat Ini</option>
                                    <option value="Pengembangan Perangkat Lunak Dan Gim" {{ $murid->jurusan == 'Pengembangan Perangkat Lunak Dan Gim' ? 'selected' : '' }}>Pengembangan Perangkat Lunak Dan Gim
                                    </option>
                                    <option value="Manajemen Perkantoran dan Layanan Bisnis" {{ $murid->jurusan == 'Manajemen Perkantoran dan Layanan Bisnis' ? 'selected' : '' }}>Manajemen Perkantoran dan Layanan Bisnis
                                    </option>
                                    <option value="Kuliner" {{ $murid->jurusan == 'Kuliner' ? 'selected' : '' }}>
                                        Kuliner</option>
                                    <option value="Teknik Jaringan Komputer Dan Telekomunikasi" {{ $murid->jurusan == 'Teknik Jaringan Komputer Dan Telekomunikasi' ? 'selected' : '' }}>
                                        Teknik Jaringan Komputer Dan Telekomunikasi</option>
                                    <option value="Pemasaran" {{ $murid->jurusan == 'Pemasaran' ? 'selected' : '' }}>
                                        Pemasaran</option>
                                    <option value="Desain Komunikasi Visual" {{ $murid->jurusan == 'Desain Komunikasi Visual' ? 'selected' : '' }}>
                                        Desain Komunikasi Visual</option>
                                    <option value="Hotel" {{ $murid->jurusan == 'Hotel' ? 'selected' : '' }}>
                                        Hotel</option>
                                    <option value="-" {{ $murid->jurusan == '-' ? 'selected' : '' }}>
                                        -</option>
                                </select>
                            </div>
                            <div class="text-sm mt-3">
                                <label for="rayon"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rayon</label>
                                <input type="text" name="rayon" id="rayon"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $murid->rayon ?? '-' }}" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" name="alamat" id="alamat"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $murid->alamat ?? '-' }}" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="status" name="status"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled {{ is_null($murid->status) ? 'selected' : '' }}>Pilih
                                        Status Saat Ini</option>
                                    <option value="Kuliah" {{ $murid->status == 'Kuliah' ? 'selected' : '' }}>Kuliah
                                    </option>
                                    <option value="Kerja" {{ $murid->status == 'Kerja' ? 'selected' : '' }}>Kerja
                                    </option>
                                    <option value="Wirausaha" {{ $murid->status == 'Wirausaha' ? 'selected' : '' }}>
                                        Wirausaha</option>
                                </select>
                            </div>
                            <div class="text-sm mt-3">
                                <label for="feedback"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feedback</label>
                                <input type="text" name="feedback" id="feedback"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $murid->feedback ?? '-' }}" required />
                            </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="profile-modal" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    </form>
                    <button data-modal-hide="profile-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>

    <div id="pekerjaanadd-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Pekerjaan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="pekerjaanadd-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <form action="{{ route('tracerStudy.createPekerjaan') }}" method="post">
                            @csrf
                            <div class="text-sm mt-3">
                                <label for="nama_perusahaan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Perusahaan</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Nama Perusahaan" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="posisi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                                <input type="text" name="posisi" id="posisi"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Posisi" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="model_kerja"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Model
                                    Kerja</label>
                                <select id="model_kerja" name="model_kerja"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Pilih Model Kerja</option>
                                    <option value="Magang">Magang</option>
                                    <option value="Penuh Waktu">Penuh Waktu</option>
                                    <option value="Paruh Waktu">Paruh Waktu</option>
                                </select>

                            </div>
                            <div class="text-sm mt-3">
                                <label for="tanggal_mulai"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="keberlanjutan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah Masih
                                    Bekerja Disini?</label>
                                <div class="flex">
                                    <div class="flex items-center me-4">
                                        <input id="masihBekerja" type="radio" value="Masih" name="statusBekerja"
                                            onclick="toggleTanggalBerakhirBekerja()"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="masihBekerja"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Masih</label>
                                    </div>
                                    <div class="flex items-center me-4">
                                        <input id="tidakBekerja" type="radio" value="Tidak" name="statusBekerja"
                                            onclick="toggleTanggalBerakhirBekerja()"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="tidakBekerja"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div id="tanggal_berakhir_bekerja_div" class="text-sm mt-3 hidden">
                                <label for="tanggal_berakhir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Berakhir</label>
                                <input type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" name="alamat" id="alamat"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
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

    {{-- Pendidikan Modal --}}
    <div id="pendidikanadd-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Pendidikan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="pendidikanadd-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <form action="{{ route('tracerStudy.createPendidikan') }}" method="post">
                            @csrf
                            <div class="text-sm mt-3">
                                <label for="nama_universitas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Universitas</label>
                                <input type="text" name="nama_universitas" id="nama_universitas"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Nama Universitas" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="jurusan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Jurusan " required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="tanggal_mulai"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="keberlanjutan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah Masih
                                    Menempuh Pendidikan Disini?</label>
                                <div class="flex">
                                    <div class="flex items-center me-4">
                                        <input id="masihPendidikan" type="radio" value="Masih" name="statusPendidikan"
                                            onclick="toggleTanggalBerakhirPendidikan()"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="masihPendidikan"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Masih</label>
                                    </div>
                                    <div class="flex items-center me-4">
                                        <input id="tidakPendidikan" type="radio" value="Tidak" name="statusPendidikan"
                                            onclick="toggleTanggalBerakhirPendidikan()"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="tidakPendidikan"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div id="tanggal_berakhir_pendidikan_div" class="text-sm mt-3 hidden">
                                <label for="tanggal_berakhir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Berakhir</label>
                                <input type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="pendidikanadd-modal" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    </form>
                    <button data-modal-hide="pendidikanadd-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Wirausaha Modal --}}
    <div id="wirausahaadd-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Wirausaha
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="wirausahaadd-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <form action="{{ route('tracerStudy.createWirausaha') }}" method="post">
                            @csrf
                            <div class="text-sm mt-3">
                                <label for="nama_universitas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Usaha</label>
                                <input type="text" name="nama_usaha" id="nama_usaha"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Nama Usaha" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="nama_universitas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bidang
                                    Usaha</label>
                                <input type="text" name="bidang_usaha" id="bidang_usaha"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Bidang Usaha" required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="jurusan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Omzet</label>
                                <input type="text" name="omzet" id="omzet"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Omzet " required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="tanggal_mulai"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="text-sm mt-3">
                                <label for="keberlanjutan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah Masih
                                    Berwirausaha ?</label>
                                <div class="flex">
                                    <div class="flex items-center me-4">
                                        <input id="masihWirausaha" type="radio" value="Masih" name="statusWirausaha"
                                            onclick="toggleTanggalBerakhirWirausaha()"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="masihWirausaha"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Masih</label>
                                    </div>
                                    <div class="flex items-center me-4">
                                        <input id="tidakWirausaha" type="radio" value="Tidak" name="statusWirausaha"
                                            onclick="toggleTanggalBerakhirWirausaha()"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="tidakWirausaha"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div id="tanggal_berakhir_wirausaha_div" class="text-sm mt-3 hidden">
                                <label for="tanggal_berakhir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Berakhir</label>
                                <input type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="pendidikanadd-modal" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    </form>
                    <button data-modal-hide="pendidikanadd-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleTanggalBerakhirBekerja() {
            const tidakRadio = document.getElementById('tidakBekerja');
            const tanggalBerakhirDiv = document.getElementById('tanggal_berakhir_bekerja_div');

            if (tidakRadio.checked) {
                tanggalBerakhirDiv.classList.remove('hidden');
            } else {
                tanggalBerakhirDiv.classList.add('hidden');
            }
        }

        function toggleTanggalBerakhirPendidikan() {
            const tidakRadioPendidikan = document.getElementById('tidakPendidikan');
            const tanggalBerakhirDivPendidikan = document.getElementById('tanggal_berakhir_pendidikan_div');

            if (tidakRadioPendidikan.checked) {
                tanggalBerakhirDivPendidikan.classList.remove('hidden');
            } else {
                tanggalBerakhirDivPendidikan.classList.add('hidden');
            }
        }

        function toggleTanggalBerakhirWirausaha() {
            const tidakRadioWirausaha = document.getElementById('tidakWirausaha');
            const tanggalBerakhirDivWirausaha = document.getElementById('tanggal_berakhir_wirausaha_div');

            if (tidakRadioWirausaha.checked) {
                tanggalBerakhirDivWirausaha.classList.remove('hidden');
            } else {
                tanggalBerakhirDivWirausaha.classList.add('hidden');
            }
        }

        function toggleTanggalBerakhirBekerjaEdit() {
            const tidakRadioedit = document.getElementById('tidakBekerjaEdit');
            const tanggalBerakhirDivedit = document.getElementById('tanggal_berakhir_bekerja_edit_div');

            if (tidakRadioedit.checked) {
                tanggalBerakhirDivedit.classList.remove('hidden');
            } else {
                tanggalBerakhirDivedit.classList.add('hidden');
            }
        }

        function toggleTanggalBerakhirPendidikanaEdit() {
            const tidakRadioPendidikanedit = document.getElementById('tidakPendidikanEdit');
            const tanggalBerakhirDivPendidikanedit = document.getElementById('tanggal_berakhir_pendidikan_edit_div');

            if (tidakRadioPendidikanedit.checked) {
                tanggalBerakhirDivPendidikanedit.classList.remove('hidden');
            } else {
                tanggalBerakhirDivPendidikanedit.classList.add('hidden');
            }
        }

        function toggleTanggalBerakhirWirausahaEdit() {
            const tidakRadioWirausahaEdit = document.getElementById('tidakWirausahaEdit');
            const tanggalBerakhirDivWirausahaEdit = document.getElementById('tanggal_berakhir_wirausaha_edit_div');

            if (tidakRadioWirausahaEdit.checked) {
                tanggalBerakhirDivWirausahaEdit.classList.remove('hidden');
            } else {
                tanggalBerakhirDivWirausahaEdit.classList.add('hidden');
            }
        }
    </script>
@endsection
