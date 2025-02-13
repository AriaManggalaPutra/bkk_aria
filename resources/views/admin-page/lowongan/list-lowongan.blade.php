@extends('layouts.navbar-admin')

@section('content')
<h2 class="font-bold text-2xl mb-2">Lowongan Pekerjaan</h2>
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
            <a href="#">Lowongan Pekerjaan</a>
    </ol>
</nav>

        <div class="">
            <h1 class="text-1xl mb-5 text-gray-500 font-normal">Sebelum membuat lowongan pekerjaan, silakan pilih perusahaan
                yang terkait terlebih dahulu.</h1>


                <form method="GET" action="" class="max-w-3xl mx-auto gap-2 grid grid-cols-1 lg:grid-cols-3">
                    <div class="relative w-full">
                        <label for="company-name" class="sr-only">Nama Perusahaan</label>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                            </svg>
                        </div>
                        <input type="text" name="company-name" id="company-name" value="{{ request('company-name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama Perusahaan..." />
                    </div>
                
                    <div class="relative w-full">
                        <label for="company-location" class="sr-only">Lokasi Perusahaan</label>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                            </svg>
                        </div>
                        <input type="text" name="company-location" id="company-location" value="{{ request('company-location') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Lokasi Perusahaan..." />
                    </div>
                
                    <div class="relative w-full">
                        <label for="branch-search" class="sr-only">Search branch name</label>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                            </svg>
                        </div>
                        <input type="text" name="branch-search" id="branch-search" value="{{ request('branch-search') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Jenis Perusahaan..." />
                        <button type="submit"
                            class="absolute inset-y-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>
                

            <section class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                @foreach ($perusahaans as $perusahaan)
                    <div
                        class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <a href="{{ route('lowongan-admin.create', $perusahaan->id) }}">
                            <div class="flex justify-center md:justify-end -mt-16">
                                <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500"
                                    src="{{ asset('storage/gambars/' . $perusahaan['logo']) }}">
                            </div>
                            <div>
                                <h2 class="text-gray-800 text-3xl font-semibold">{{ $perusahaan->nama_perusahaan }}</h2>
                                <p class="mt-2 text-gray-600">{!! Str::limit($perusahaan->deskripsi_perusahaan, 200) !!}</p>
                            </div>
                            <div class="flex justify-between mt-4">
                                <p class="mt-2 text-gray-400 font-bold">{{ $perusahaan->jenis_industri }}</p>
                                <a href="#" class="text-xl font-medium text-indigo-500">{!! Str::limit($perusahaan->alamat, 10) !!}</a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </section>

        </div>

@endsection
