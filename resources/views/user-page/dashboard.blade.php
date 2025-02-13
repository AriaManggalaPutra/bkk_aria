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

    <h2 class="font-bold text-2xl mb-2">Dashboard</h2>
    <nav aria-label="breadcrumb" class="w-max mb-2">
        <ol class="flex w-full flex-wrap items-center rounded-md bg-slate-50">
            <li
                class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
                <a href="{{ route('dashboard-user.indexUser') }}">Dashboard</a>
        </ol>
    </nav>

    <div class="grid gap-6 mb-8 md:grid-cols-3 ">
        <!-- Card Perusahaan -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Perusahaan Yang Tersedia
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $countPerusahaan }}
                </p>
            </div>
        </div>
        <!-- Card Lowongan -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Lowongan Yang Tersedia
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $countlowongans }}
                </p>
            </div>
        </div>
        <!-- Card Data Kosong -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Data Yang Masih Kosong
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $emptyField }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white p-5 w-1/2 h-1/1 rounded-md shadow-sm">
        <p class="font-medium text-gray-600 mb-4">Progress Lamaran Anda</p>
        <div class="mt-5">
            <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                <!-- Tahap Pengajuan -->
                <li class="flex items-center {{ isset($latestLamaran) ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }} space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border {{ isset($latestLamaran) ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500 dark:border-gray-400' }} rounded-full shrink-0">
                        1
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Pengajuan Lamaran</h3>
                        <p class="text-sm">Lamaran telah diajukan</p>
                    </span>
                </li>
                
                <!-- Tahap Proses -->
                <li class="flex items-center {{ isset($latestLamaran) && $latestLamaran->status == 0 ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }} space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border {{ isset($latestLamaran) && $latestLamaran->status == 0 ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500 dark:border-gray-400' }} rounded-full shrink-0">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Sedang Diproses</h3>
                        <p class="text-sm">Lamaran sedang ditinjau</p>
                    </span>
                </li>
                
                <!-- Tahap Hasil -->
                <li class="flex items-center {{ isset($latestLamaran) && ($latestLamaran->status == 1 || $latestLamaran->status == 2) ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400' }} space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border {{ isset($latestLamaran) && ($latestLamaran->status == 1 || $latestLamaran->status == 2) ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500 dark:border-gray-400' }} rounded-full shrink-0">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Hasil</h3>
                        <p class="text-sm">
                            @if(isset($latestLamaran))
                                @if($latestLamaran->status == 1)
                                    Lamaran diterima
                                @elseif($latestLamaran->status == 2)
                                    Lamaran ditolak
                                @else
                                    Menunggu hasil
                                @endif
                            @else
                                Menunggu hasil
                            @endif
                        </p>
                    </span>
                </li>
            </ol>
        </div>
    </div>
@endsection