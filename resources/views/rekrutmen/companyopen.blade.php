@extends('layouts.navbar')

@section('content')
<div class="container mx-auto mt-10 md:mt-[130px] p-4">

    <!-- Company Banner -->
    <div class="w-full flex justify-center mb-4">
        <img src="{{ asset('storage/gambars/' . $perusahaan->banner) }}" alt="Company Banner" class="w-full md:w-[1000px] h-[250px] bg-cover">
    </div>

    <!-- Logo and Company Name -->
    <div class="flex flex-col md:flex-row items-center justify-start py-4 md:px-[245px] text-center md:text-left">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/gambars/' . $perusahaan->logo) }}" alt="Company Logo" class="w-32">
        </div>

        <!-- Company Information Section next to the logo -->
        <div class="md:p-4 mt-4 md:mt-0">
            <h2 class="text-xl font-semibold">{{ $perusahaan->nama_perusahaan }}</h2>
            <p class="text-gray-600 mt-2">Industri: Computer Software & Networking</p>
            <p class="text-gray-600 mt-2">Lokasi: Jakarta, Indonesia</p>
        </div>
    </div>

    <!-- Tabs Navigation (Moved below the logo and company name) -->
    <div class="p-20 md:px-56 md:py-2">
      <nav class="border-b border-gray-200">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
          <li class="mr-2">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" 
              class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg">
              Tentang
            </button>
          </li>
          <li class="mr-2">
            <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="true" 
              class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg">
              Lowongan
            </button>
          </li>
          <!-- Add more tabs as needed -->
        </ul>
      </nav>
      
        
        <div id="defaultTabContent">
            <div class="p-4" id="about" role="tabpanel" aria-labelledby="about-tab">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Sekilas tentang Perusahaan</h2>
                <p class="md:py-4 text-gray-500 dark:text-gray-400">Deskripsi : {{ $perusahaan->deskripsi_perusahaan }}</p>
                <a href="{{ $perusahaan->web }}" class="text-gray-500 dark:text-gray-400">Web : {{ $perusahaan->web }}</a>
                <p class="md:py-4 text-gray-500 dark:text-gray-400">Jenis Industri : {{ $perusahaan->jenis_industri }}</p>
            </div>
            <div class="hidden p-4" id="services" role="tabpanel" aria-labelledby="services-tab">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Lowongan yang tersedia:</h2>


                {{-- list lowongan --}}


                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10 md:px-[0px]">
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
              </div>
            </div>
        </div>
    </div>
    


</div>
@endsection
