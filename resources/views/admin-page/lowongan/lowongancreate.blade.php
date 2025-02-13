@extends('layouts.navbar-admin')

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
<h2 class="font-bold text-2xl mb-2">Create Lowongan</h2>
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
            <a href="">Lowongan Pekerjaan</a>
            <span class="pointer-events-none mx-2 text-slate-800">
                /
            </span>
        </li>
        <li
        class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
        <a href="">{{$perusahaan->nama_perusahaan}}</a>
    </ol>
</nav>

    <button data-modal-target="lowongan-modal" data-modal-toggle="lowongan-modal"
        class="mt-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Tambah Lowongan
    </button>

    <div id="lowongan-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Buat Lowongan Untuk {{ $perusahaan->nama_perusahaan }}
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="lowongan-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form action="{{ route('lowongan-admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id }}">
                        <div class="mb-2">
                            <label for="nama_pekerjaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pekerjaan</label>
                            <input type="text" name="nama_pekerjaan" id="nama_pekerjaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-2">
                            <label for="lokasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                                Pekerjaan</label>
                            <input type="text" name="lokasi" id="lokasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-2">
                            <label for="kebutuhan_kandidat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Butuh
                                Berapa Kandidat</label>
                            <input type="number" name="kebutuhan_kandidat" id="kebutuhan_kandidat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-2">
                            <label for="gaji" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaji
                                Pekerjaan</label>
                            <input type="number" name="gaji" id="gaji"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-2">
                            <label for="about_job"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tentang
                                Pekerjaan</label>
                            <textarea id="about_job" name="about_job" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="requirement"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill Dan Keahlian Yang
                                Dibutuhkan</label>
                            <textarea id="requirement" name="requirement" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="responsibility"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggung Jawab</label>
                            <textarea id="responsibility" name="responsibility" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="sistem_kerja"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sistem Kerja</label>
                            <select id="sistem_kerja" name="sistem_kerja"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Sistem Kerja</option>
                                <option value="WFH">WFH</option>
                                <option value="WFO">WFO</option>
                                <option value="HYBRID">HYBRID</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="model_kerja"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model Kerja</label>
                            <select id="model_kerja" name="model_kerja"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Model Kerja</option>
                                <option value="Magang">Magang</option>
                                <option value="Penuh Waktu">Penuh Waktu</option>
                                <option value="Paruh Waktu">Paruh Waktu</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_berakhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Berakhir</label>
                            <input type="date" name="tanggal_berakhir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                            Lowongan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Pekerjaan</th>
                    <th scope="col" class="px-6 py-3">Lokasi</th>
                    <th scope="col" class="px-6 py-3">Kebutuhan Kandidat</th>
                    <th scope="col" class="px-6 py-3">Tentang Pekerjaan</th>
                    <th scope="col" class="px-6 py-3">Skill Dan Keahlian</th>
                    <th scope="col" class="px-6 py-3">Tanggung Jawab</th>
                    <th scope="col" class="px-6 py-3">Sistem Kerja</th>
                    <th scope="col" class="px-6 py-3">Model Kerja</th>
                    <th scope="col" class="px-6 py-3">Gaji</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowongan as $data)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data->nama_pekerjaan }}</td>
                        <td class="px-6 py-4">{{ $data->lokasi }}</td>
                        <td class="px-6 py-4">{{ $data->kebutuhan_kandidat }}</td>
                        <td class="px-6 py-4">{!! Str::limit($data->about_job, 30) !!}</td>
                        <td class="px-6 py-4">{!! Str::limit($data->requirement, 30) !!}</td>
                        <td class="px-6 py-4">{!! Str::limit($data->responsibility, 30) !!}</td>
                        <td class="px-6 py-4">{{ $data->sistem_kerja }}</td>
                        <td class="px-6 py-4">{{ $data->model_kerja }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($data->gaji, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <!-- View Detail Icon -->
                            <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">
                                <i class="fas fa-eye"></i>
                            </a>

                            <!-- Edit Icon -->
                            <button data-modal-target="editLowonganModal-{{ $data->id }}"
                                data-modal-toggle="editLowonganModal-{{ $data->id }}"
                                class="text-yellow-500 dark:text-yellow-400 hover:underline">
                                <i class="fas fa-pen-to-square"></i>
                            </button>

                            <button data-modal-target="delete-modal-{{ $data->id }}"
                                data-modal-toggle="delete-modal-{{ $data->id }}"
                                class="text-red-600 dark:text-red-500 hover:underline">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Edit Perusahaan -->
                    <div id="editLowonganModal-{{$data->id}}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-3xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Buat Lowongan Untuk {{ $perusahaan->nama_perusahaan }}
                                    </h3>
                                    <button type="button"
                                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="lowongan-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form action="{{ route('lowongan-admin.update', $data->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id }}">
                                        <div class="mb-2">
                                            <label for="nama_pekerjaan"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Pekerjaan</label>
                                            <input value="{{ $data->nama_pekerjaan }}" type="text" name="nama_pekerjaan" id="nama_pekerjaan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                        <div class="mb-2">
                                            <label for="lokasi"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                                                Pekerjaan</label>
                                            <input value="{{ $data->lokasi }}" type="text" name="lokasi" id="lokasi"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                        <div class="mb-2">
                                            <label for="kebutuhan_kandidat"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Butuh
                                                Berapa Kandidat</label>
                                            <input value="{{ $data->kebutuhan_kandidat }}" type="number" name="kebutuhan_kandidat" id="kebutuhan_kandidat"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                        <div class="mb-2">
                                            <label for="gaji"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaji
                                                Pekerjaan</label>
                                            <input value="{{ $data->gaji }}" type="number" name="gaji" id="gaji"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                        <div class="mb-2">
                                            <label for="about_job"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tentang
                                                Pekerjaan</label>
                                            <textarea id="about_job" name="about_job" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $data->about_job }}</textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label for="requirement"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill
                                                Dan Keahlian Yang
                                                Dibutuhkan</label>
                                            <textarea id="requirement" name="requirement" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $data->requirement }}</textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label for="responsibility"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggung
                                                Jawab</label>
                                            <textarea id="responsibility" name="responsibility" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $data->responsibility }}</textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label for="sistem_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sistem Kerja</label>
                                            <select id="sistem_kerja" name="sistem_kerja"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Pilih Sistem Kerja</option>
                                                <option value="WFH" {{ old('sistem_kerja', $data->sistem_kerja ?? '') == 'WFH' ? 'selected' : '' }}>WFH</option>
                                                <option value="WFO" {{ old('sistem_kerja', $data->sistem_kerja ?? '') == 'WFO' ? 'selected' : '' }}>WFO</option>
                                                <option value="HYBRID" {{ old('sistem_kerja', $data->sistem_kerja ?? '') == 'HYBRID' ? 'selected' : '' }}>HYBRID</option>
                                            </select>                                            
                                        </div>
                                        <div class="mb-2">
                                            <label for="model_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model Kerja</label>
                                            <select id="model_kerja" name="model_kerja"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Pilih Model Kerja</option>
                                                <option value="Magang" {{ old('model_kerja', $data->model_kerja ?? '') == 'Magang' ? 'selected' : '' }}>Magang</option>
                                                <option value="Penuh Waktu" {{ old('model_kerja', $data->model_kerja ?? '') == 'Penuh Waktu' ? 'selected' : '' }}>Penuh Waktu</option>
                                                <option value="Paruh Waktu" {{ old('model_kerja', $data->model_kerja ?? '') == 'Paruh Waktu' ? 'selected' : '' }}>Paruh Waktu</option>
                                            </select>                                            
                                        </div>
                                        <div class="mb-2">
                                            <label for="tanggal_berakhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Berakhir</label>
                                            <input value="{{ $data->tanggal_berakhir }}" type="date" name="tanggal_berakhir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                                            Lowongan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="delete-modal-{{ $data->id }}" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="delete-modal-{{ $data->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Kamu Ingin
                                        Menghapus
                                        Artikel Ini?</h3>
                                    <form id="delete-form-{{ $data->id }}"
                                        action="{{ route('lowongan-admin.destroy', $data->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Ya, Hapus
                                        </button>
                                    </form>
                                    <button type="button"
                                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Tidak, Batalkan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
