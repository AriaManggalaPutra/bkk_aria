@extends('layouts.navbar')

@section('content')
    <section class="px-4 md:px-20">
        <div class="flex flex-col md:flex-row">
            {{-- Card --}}
            <div class="hidden md:flex md:flex-row gap-8 md:px-24 mt-10 md:mt-44">
                <div class="bg-white w-[220px] h-[400px] rounded-xl shadow-2xl"></div>
                <div class="bg-white w-[220px] md:mt-16 h-[400px] rounded-xl shadow-2xl"></div>
            </div>
            <div class="px-4 md:px-44 max-w-2xl mt-32 md:mt-44">
                <div class="mb-6 w-[360px] text-center rounded-3xl p-1 border-blue-600 border -ml-4 md:-ml-[20px]">
                    <p class="text-blue-600">Temukan perusahaan yang cocok untuk Anda</p>
                </div>
                <div class="w-full md:w-[590px] mr-[40px] md:-ml-32">
                    <h1 class="mb-6 font-bold text-3xl md:text-5xl">Banyak <span class="text-blue-600">Perusahaan</span></h1>
                </div>
                <div class="w-full md:w-[590px] -mt-6 ml-[30px] md:-ml-[35px] md:-mt-4">
                    <h1 class="mb-6 font-bold text-3xl md:text-5xl"><span class="text-blue-600">Menunggu</span> Anda</h1>
                </div>
                <div class="w-full md:w-[560px] md:-ml-52">
                    <p class="mb-6 text-sm md:text-right text-center">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet,
                        consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam,
                    </p>
                </div>
                <div>
                    <button type="button"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 me-2 mb-2 focus:outline-none ml-24 md:w-[180px] md:ml-[180px] "><b>Lamar
                            Sekarang</b></button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-[80px]">
        <div>
            <div class="bg-white shadow-md rounded-xl w-full md:w-[1030px] h-[300px] mx-auto"></div>
        </div>
    </section>

    <section>
        <form method="GET" action="{{ route('company') }}"
            class="mt-10 max-w-full md:max-w-5xl grid grid-cols-1 md:grid-cols-3 gap-4 mx-auto">
            <!-- Nama Pekerjaan -->
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" name="nama_pekerjaan" id="nama_pekerjaan"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari Nama Lowongan..." value="{{ request('nama_pekerjaan') }}" />
            </div>

            <!-- Lokasi Perusahaan -->
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="w-4 h-4 text-gray-500 fa-solid fa-location-dot"></i>
                </div>
                <input type="search" name="lokasi" id="lokasi"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari Lokasi Perusahaan..." value="{{ request('lokasi') }}" />
            </div>

            <!-- Nama Perusahaan -->
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="w-4 h-4 text-gray-500 fa-regular fa-building"></i>
                </div>
                <input type="search" name="nama_perusahaan" id="nama_perusahaan"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari Nama Perusahaan..." value="{{ request('nama_perusahaan') }}" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-3xl text-sm px-4 py-2">
                    Search
                </button>
            </div>
        </form>


        <div class="ml-0 md:px-64 mt-5 text-center md:text-left">
            <p>Hasil <span class="text-blue-600">Pencarian</span></p>
            <h1 class="text-3xl md:mb-5"><span class="text-blue-600">{{ $perusahaanss }} </span>Lamaran Tersedia</h1>

            <!-- Card Grid Section Start -->

            {{-- start desktop --}}
            <section class="sm:block hidden py-10 px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-14 gap-y-8 justify-items-center">
                    @foreach ($perusahaans as $item)
                        <div class="w-full md:w-[500px]">
                            <div style="background-image: url('{{ asset('storage/gambars/' . $item->banner) }}');"
                                class="md:h-[90px] w-full bg-cover bg-center rounded-t-lg">
                                <div class="flex items-center px-5 py-6 md:px-5">
                                    <div class="w-[50px] h-[50px] rounded-full bg-white p-0.5 shadow">
                                        <img src="{{ asset('storage/gambars/' . $item->logo) }}" alt=""
                                            class="rounded-full w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 bg-white rounded-b-lg shadow-lg border-gray-200 h-auto md:h-[200px] relative">
                                <div class="flex justify-between">
                                    <div class="flex flex-col">
                                        <h2 class="text-md font-semibold">{{ $item->nama_perusahaan }}</h2>
                                        <p class="text-gray-600 text-sm h-[72px] overflow-hidden">
                                            {{ Str::limit($item->deskripsi_perusahaan, 100) }}
                                        </p>
                                    </div>
                                    <div class="flex items-start md:items-center md:px-8">
                                        <div class="text-sm text-gray-600 space-y-2">
                                            <div class="flex items-center gap-x-4">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <p class="leading-none">{{ Str::limit($item->alamat, 15) }}</p>
                                            </div>
                                            <div class="flex items-center gap-x-3">
                                                <i class="fa-solid fa-suitcase"></i>
                                                <p class="leading-none">{{ $item->jenis_industri }}</p>
                                            </div>
                                            <div class="flex items-center gap-x-3.5">
                                                <i class="fa-regular fa-user"></i>
                                                <p class="leading-none">{{ $item->jumlah_karyawan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute bottom-6  text-blue-600 text-sm">
                                    <?php
                                    $count = DB::table('lowongans')->where('id', $item->id)->count();
                                    ?>
                                    {{ $count }} Current Offers
                                </div>
                                <div class="text-right relative md:px-6 mt-6">
                                    <a href="{{ route('openedcompany', ['id' => $item->id]) }}"
                                        class="text-black bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-7 py-0.5 border border-black inline-block">
                                        See More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Tailwind CSS Pagination --}}
                @if ($perusahaans->hasPages())
                    <nav role="navigation" aria-label="Pagination Navigation" class="mt-8 flex justify-center">
                        <ul class="flex items-center -space-x-px h-10 text-base">
                            {{-- Previous Page Link --}}
                            @if ($perusahaans->onFirstPage())
                                <li>
                                    <span
                                        class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $perusahaans->previousPageUrl() }}"
                                        class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                    </a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @php
                                $totalPages = $perusahaans->lastPage();
                                $currentPage = $perusahaans->currentPage();

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
                                        <span
                                            class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">
                                            {{ $i }}
                                        </span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $perusahaans->url($i) }}"
                                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endif
                            @endfor

                            {{-- Ellipsis and Last Page --}}
                            @if ($endPage < $totalPages)
                                <li>
                                    <span
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                                </li>
                                <li>
                                    <a href="{{ $perusahaans->url($totalPages) }}"
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                        {{ $totalPages }}
                                    </a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($perusahaans->hasMorePages())
                                <li>
                                    <a href="{{ $perusahaans->nextPageUrl() }}"
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <span
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg cursor-not-allowed">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </section>

            {{-- end desktop --}}

            {{-- start mobile --}}
            <section class="sm:hidden py-6 px-4">
                <div class="space-y-6">
                    @foreach ($perusahaans as $item)
                        <div class="w-full bg-white rounded-lg shadow-lg overflow-hidden">
                            <div style="background-image: url('{{ asset('storage/gambars/' . $item->logo) }}')"
                                class="h-20 bg-cover bg-center">
                                <div class="flex items-center h-full px-4">
                                    <div class="w-12 h-12 rounded-full bg-white p-0.5 shadow">
                                        <img src="{{ asset('storage/gambars/' . $item->logo) }}" alt=""
                                            class="rounded-full w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h2 class="text-lg font-semibold mb-2">{{ $item->nama_perusahaan }}</h2>
                                <p class="text-sm text-start text-gray-600 mb-4">
                                    {{ Str::limit($item->deskripsi_perusahaan, 150) }}
                                </p>
                                <div class="flex justify-between items-end mt-4">
                                    <!-- Added 'mt-4' to move button lower -->
                                    <div class="text-sm text-gray-600 space-y-1">
                                        <div class="flex items-center gap-x-2">
                                            <i class="fa-solid fa-location-dot w-4 text-center"></i>
                                            <p>{{ $item->alamat }}</p>
                                        </div>
                                        <div class="flex items-center gap-x-2">
                                            <i class="fa-solid fa-suitcase w-4 text-center"></i>
                                            <p>Unknown</p>
                                        </div>
                                        <div class="flex items-center gap-x-2">
                                            <i class="fa-regular fa-user w-4 text-center"></i>
                                            <p>20-50</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('openedcompany', ['id' => $item->id]) }}"
                                        class="text-black bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-7 py-0.5 border border-black inline-block">
                                        See More
                                    </a>
                                </div>
                                <p class="text-sm text-start text-blue-600 mt-4">12 Current Offers</p>
                            </div>
                        </div>
                    @endforeach

                    @if ($perusahaans->hasPages())
                        <nav role="navigation" aria-label="Pagination Navigation" class="mt-8 flex justify-center">
                            <ul class="flex items-center -space-x-px h-10 text-base">
                                {{-- Previous Page Link --}}
                                @if ($perusahaans->onFirstPage())
                                    <li>
                                        <span
                                            class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                            </svg>
                                        </span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $perusahaans->previousPageUrl() }}"
                                            class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @php
                                    $totalPages = $perusahaans->lastPage();
                                    $currentPage = $perusahaans->currentPage();
                                    $startPage = floor(($currentPage - 1) / 4) * 4 + 1;
                                @endphp

                                {{-- Show 4 Pages --}}
                                @for ($i = $startPage; $i < min($startPage + 4, $totalPages + 1); $i++)
                                    <li>
                                        <a href="{{ $perusahaans->url($i) }}"
                                            class="flex items-center justify-center px-4 h-10 leading-tight {{ $currentPage == $i ? 'text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700' }}">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor

                                {{-- Ellipsis and Last Page --}}
                                @if ($startPage + 3 < $totalPages)
                                    <li>
                                        <span
                                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
                                    </li>
                                    <li>
                                        <a href="{{ $perusahaans->url($totalPages) }}"
                                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                            {{ $totalPages }}
                                        </a>
                                    </li>
                                @endif

                                {{-- Next Page Link --}}
                                @if ($perusahaans->hasMorePages())
                                    <li>
                                        <a href="{{ $perusahaans->nextPageUrl() }}"
                                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <span
                                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg cursor-not-allowed">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg>
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>
            </section>


            {{-- end mobile --}}
            <!-- Card Grid Section End -->


        </div>
    </section>
@endsection
