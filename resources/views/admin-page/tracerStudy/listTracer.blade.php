@extends('layouts.navbar-admin')

@section('content')
    <div>
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
            <a href="{{ route('tracerStudyAdmin.export') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Silahkan Ekspor Excel Tracer Study Disini 
                <i class="ml-2 fa-solid fa-download"></i>
            </a>
        </div>
        <form class="max-w-3xl mt-4 mx-auto gap-2 grid grid-cols-1 lg:grid-cols-3">
            <div class="relative w-full">
                <label for="company-name" class="sr-only">Nama Murid</label>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                    </svg>
                </div>
                <input type="text" id="company-name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama Murid..." required />
            </div>

            <div class="relative w-full">
                <label for="company-location" class="sr-only">NISN Murid</label>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                    </svg>
                </div>
                <input type="text" id="company-location"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="NISN Murid..." required />
            </div>

            <div class="relative w-full">
                <label for="branch-search" class="sr-only">Jenis Kegiatan</label>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                    </svg>
                </div>
                <input type="text" id="branch-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jenis Kegiatan..." required />
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

        <div class="pt-10 grid grid-cols-3">
            @foreach ($murid as $item)
                    <div class="max-w-xs mb-5">
                        <div class="bg-white shadow-xl rounded-lg py-3">
                            <div class="photo-wrapper p-2">
                                <img class="w-32 h-32 rounded-full mx-auto"
                                    src="{{ asset('storage/profiles/' . $item->profile) }}"
                                    alt="No Pic">
                            </div>
                            <div class="p-2">
                                <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ $item->nama }}</h3>
                                <div class="text-center text-gray-400 text-xs font-semibold">
                                    <p>{{$item->jurusan}}</p>
                                </div>
                                <table class="text-xs my-3">
                                    <tbody>
                                        <tr>
                                            <td class="px-2 py-2 text-gray-500 font-semibold">Address</td>
                                            <td class="px-2 py-2">{{ \Illuminate\Support\Str::limit($item->alamat, 30, '...') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-gray-500 font-semibold">Phone</td>
                                            <td class="px-2 py-2">{{ $item->no_telepon }}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                                            <td class="px-2 py-2">{{ \Illuminate\Support\Str::limit($item->email, 30, '...') }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="text-center my-3">
                                    <a class="text-xs text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium"
                                        href="{{ route('tracerStudyAdmin.show', $item->id) }}">View Profile</a>
                                </div>

                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection
