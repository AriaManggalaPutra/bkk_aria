@extends('layouts.navbar')

@section('content')
    <section class="px-4 lg:px-20">
        <section class="">
            <div class="flex flex-col lg:flex-row">
                <div class="px-4 lg:px-44 max-w-2xl mt-32 lg:mt-44">
                    <!-- Mengubah mt-10 menjadi mt-16 untuk tampilan mobile -->
                    <div class="mb-6 w-[260px] text-center rounded-3xl p-1 border-blue-600 border">
                        <p class="text-blue-600">Temukan Karir Masa Depan Anda</p>
                    </div>
                    <div class="w-full lg:w-[590px]">
                        <h1 class="mb-6 font-bold text-3xl lg:text-5xl">Temukan <span class="text-blue-600">Pekerjaan yang
                                Cocok </span>untuk Anda
                        </h1>
                    </div>
                    <div class="w-full lg:w-[560px]">
                        <p class="mb-6 text-sm lg:text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit
                            amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                            minim
                            veniam,
                        </p>
                    </div>
                    <div>
                        <button type="button"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Lamar
                            Sekarang</button>
                    </div>
                </div>
                {{-- Card --}}
                <div class="hidden lg:grid lg:grid-cols-2 gap-8 lg:ml-52 mt-10 lg:mt-44">
                    <div class="bg-white w-[180px] h-[180px] rounded-md shadow-md"> </div>
                    <div class="bg-white w-[180px] h-[180px] rounded-md shadow-md"> </div>
                    <div class="bg-white w-[180px] h-[180px] rounded-md shadow-md"> </div>
                    <div class="bg-white w-[180px] h-[180px] rounded-md shadow-md"> </div>
                </div>
            </div>
        </section>

        <section class="mt-[80px]">
            <div>
                <div class="bg-white shadow-md rounded-xl w-full lg:w-[1030px] h-[300px] mx-auto"></div>
            </div>
        </section>

        <section class="mt-[50px] text-center">
            <div class="flex justify-center">
                <div class="mb-6 w-[260px] text-center rounded-3xl p-1 border-blue-600 border">
                    <p class="text-blue-600">Cari Pekerjaan Anda Disini</p>
                </div>
            </div>
            <div class="mx-auto text-center w-[90%] lg:w-[500px] text-2xl lg:text-4xl">
                <p class="">Cari Dan <span class="text-blue-600">Temukan Pekerjaan Anda</span> Di Sini</p>
            </div>
        </section>

        <section>
            <form method="GET" action="{{ route('lowongan') }}" class="mt-10 max-w-full lg:max-w-5xl grid grid-cols-1 lg:grid-cols-3 gap-4 mx-auto">
                <!-- Nama Pekerjaan -->
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="nama_pekerjaan" 
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50" 
                        placeholder="Cari Nama Lowongan..." value="{{ request('nama_pekerjaan') }}" />
                </div>
            
                <!-- Lokasi Perusahaan -->
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="w-4 h-4 text-gray-500 fa-solid fa-location-dot"></i>
                    </div>
                    <input type="search" name="lokasi" 
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50" 
                        placeholder="Cari Lokasi Perusahaan..." value="{{ request('lokasi') }}" />
                </div>
            
                <!-- Nama Perusahaan -->
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="w-4 h-4 text-gray-500 fa-regular fa-building"></i>
                    </div>
                    <input type="search" name="nama_perusahaan" 
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50" 
                        placeholder="Cari Nama Perusahaan..." value="{{ request('nama_perusahaan') }}" />
                    <button type="submit" 
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-600 hover:bg-blue-700 font-medium rounded-3xl text-sm px-4 py-2">
                        Search
                    </button>
                </div>
            </form>
            
            

            <div class="ml-0 md:px-[180px] mt-5 text-center md:text-left">
                <p>Hasil <span class="text-blue-600">Pencarian</span></p>
                <h1 class="text-3xl md:mb-5"><span class="text-blue-600">{{ $lowongantotal }} </span>Lamaran Tersedia</h1>

            </div>
            <div class="mt-10 md:mt-[100px]">
                <div class="flex flex-wrap gap-8 mt-10 md:px-[160px]">
                    @foreach ($lowongans as $item)
                    <div class="p-6 bg-white w-full md:w-[500px] rounded-3xl shadow-md border-gray-200 h-auto md:h-[300px]">
                        <div class="flex items-start">
                            <div class="aspect-square rounded-full mt-1 bg-gray-200 w-[50px] md:w-[50px] md:h-[50px]">
                                <img src="{{ asset('storage/gambars/' . $item->perusahaan->logo) }}" alt="" class="rounded-full w-full h-full object-cover">
                            </div>
                            <div class="leading-normal ml-2 mt-2">
                                <p class="text-base md:text-md font-normal">{{ $item->nama_pekerjaan }}</p>
                                <p class="text-gray-400 text-xs md:text-sm">{{ $item->perusahaan->nama_perusahaan }}</p>
                            </div>
                        </div>
                        <div class="mt-5 px-4 md:px-2 grid grid-cols-2 gap-y-2">
                            <div class="mt-2 flex text-gray-400 items-center space-x-2 text-xs md:text-sm">
                                <i class="fa-solid fa-building"></i>
                                <p>{{ $item->sistem_kerja }}</p>
                            </div>
                            <div class="mt-2 flex text-gray-400 items-center space-x-2 text-xs md:text-sm">
                                <i class="fa-solid fa-location-dot"></i>
                                <p>{{ $item->lokasi }}</p>
                            </div>
                            <div class="mt-2 flex text-gray-400 items-center space-x-2 text-xs md:text-sm">
                                <i class="fa-solid fa-user"></i>
                                <p>{{ $item->kebutuhan_kandidat }}</p>
                            </div>
                            <div class="mt-2 flex text-gray-400 items-center space-x-2 text-xs md:text-sm">
                                <i class="fa-solid fa-coins"></i>
                                <p>{{ $item->gaji }}</p>
                            </div>
                            <div class="mt-2 flex text-gray-400 items-center space-x-2 text-xs md:text-sm">
                                <i class="fa-solid fa-briefcase"></i>
                                <p>{{ $item->model_kerja }}</p>
                            </div>
                        </div>
                        <div class="mt-6 md:mt-10">
                            <hr class="border-1 rounded-sm">
                        </div>
                        <div class="text-gray-400 flex py-2 lg:py-3 items-center justify-between">
                            <p class="text-xs lg:text-sm">{{ $item->tanggal_berakhir }}</p>
                            <a href="{{ route('openedlowongan', ['id' => $item->id]) }}">
                                <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs lg:text-sm px-4 lg:px-12 py-1 lg:py-1 ml-auto">Apply</button>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            
                {{-- Pagination desktop --}}
                <div class="md:block hidden">

                    
                        @if ($lowongans->hasPages())
                            <nav role="navigation" aria-label="Pagination Navigation" class="mt-8 flex justify-center">
                                <ul class="flex items-center -space-x-px h-10 text-base">
                                    {{-- Previous Page Link --}}
                                    @if ($lowongans->onFirstPage())
                                        <li>
                                            <span class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                </svg>
                                            </span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $lowongans->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                </svg>
                                            </a>
                                        </li>
                                    @endif
                    
                                    {{-- Pagination Elements --}}
                                    @php
                                        $totalPages = $lowongans->lastPage();
                                        $currentPage = $lowongans->currentPage();
                    
                                        // Logic to display pages
                                        if ($totalPages <= 10) {
                                            // Show all pages if less than or equal to 10
                                            $startPage = 1;
                                            $endPage = $totalPages;
                                        } else {
                                            // For pages greater than 10
                                            $startPage = floor(($currentPage - 1) / 10) * 10 + 1; // Start of the current group of 10
                                            $endPage = min($startPage + 9, $totalPages); // End page, ensuring it does not exceed total pages
                    
                                            // Adjust startPage if close to the last pages
                                            if ($endPage == $totalPages) {
                                                $startPage = max(1, $totalPages - 9); // Ensure we have at least 10 pages showing
                                            }
                                        }
                                    @endphp
                    
                                    {{-- Show pages --}}
                                    @for ($i = $startPage; $i <= $endPage; $i++)
                                        @if ($i == $currentPage)
                                            <li>
                                                <span class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">
                                                    {{ $i }}
                                                </span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $lowongans->url($i) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endif
                                    @endfor
                    
                                    {{-- Ellipsis and Last Page --}}
                                    @if ($endPage < $totalPages)
                                        <li>
                                            <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                                        </li>
                                        <li>
                                            <a href="{{ $lowongans->url($totalPages) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                                {{ $totalPages }}
                                            </a>
                                        </li>
                                    @endif
                    
                                    {{-- Next Page Link --}}
                                    @if ($lowongans->hasMorePages())
                                        <li>
                                            <a href="{{ $lowongans->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                </svg>
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg cursor-not-allowed">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                </svg>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        @endif
                    </div>
                    
</div>

<div class="md:hidden block">
    @if ($lowongans->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="mt-8 flex justify-center">
        <ul class="flex items-center -space-x-px h-10 text-base">
            {{-- Previous Page Link --}}
            @if ($lowongans->onFirstPage())
                <li>
                    <span class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $lowongans->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @php
                $totalPages = $lowongans->lastPage();
                $currentPage = $lowongans->currentPage();
                $startPage = floor(($currentPage - 1) / 4) * 4 + 1;
            @endphp

            {{-- Show 4 Pages --}}
            @for ($i = $startPage; $i < min($startPage + 4, $totalPages + 1); $i++)
                <li>
                    <a href="{{ $lowongans->url($i) }}" class="flex items-center justify-center px-4 h-10 leading-tight {{ $currentPage == $i ? 'text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700' }}">
                        {{ $i }}
                    </a>
                </li>
            @endfor

            {{-- Ellipsis and Last Page --}}
            @if ($startPage + 3 < $totalPages)
                <li>
                    <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                </li>
                <li>
                    <a href="{{ $lowongans->url($totalPages) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                        {{ $totalPages }}
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($lowongans->hasMorePages())
                <li>
                    <a href="{{ $lowongans->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg cursor-not-allowed">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
</div>

            </div>
            
        </div>
        </section>


    </section>

    <div class="mt-10 md:mt-[100px]"></div>
@endsection
