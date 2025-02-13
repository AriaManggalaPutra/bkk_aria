@extends('layouts.navbar')

@section('content')
    <div style="background-image: url('{{ asset('assets/background.png') }}')"
        class="bg-cover bg-center min-h-screen flex flex-col items-center justify-center text-white">
        <!-- Hero Section -->
        <div class="text-center max-w-5xl mx-auto px-4 -mt-44 pt-24 md:pt-32">
            <h1 class="text-2xl sm:text-4xl md:text-6xl font-bold leading-tight mb-8 font-rubik">
                Baca Semua <span class="text-blue-600">Tips & Trick</span> Dari <span
                    class="text-blue-600">Professional</span>
            </h1>
            <p class="text-sm md:text-base mb-6 font-rubik">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit
                amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam.
            </p>
        </div>
    </div>

    <div class="flex flex-wrap justify-center items-center py-8 w-full -mt-28 sm:-mt-32">
        <div
            class="bg-white rounded-lg drop-shadow-lg p-5 flex flex-col items-center justify-center m-5 w-full sm:w-1/2 h-32">
            <div class="text-3xl font-bold text-black mb-2 font-rubik"><i>{{ $artikel->count() }}</i></div>
            <div class="text-gray-700 text-center font-rubik">Artikel Tersedia</div>
        </div>
    </div>

    <div class="px-6 sm:px-14 py-10">
        {{-- start informasi --}}
        <h1 class="text-4xl sm:text-5xl font-bold">Dapatkan <span class="text-blue-600">Informasi</span></h1>
        <p class="w-full sm:w-[450px] leading-tight mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,Lorem ipsum dolor sit amet,</p>
        {{-- start card --}}
        {{-- carousel desktop --}}



        <div id="default-carousel" class="sm:block hidden z-10 relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-[430px] overflow-hidden rounded-lg md:h-[850px]">
                @php
                    $chunks = $tipsKarir->chunk(6);
                @endphp
            
                <!-- Loop through each chunk and display them as slides -->
                @foreach ($chunks as $index => $chunk)
                    <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $index }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                            @foreach ($chunk as $item)
                            <a href="{{ route('openedartikel', ['id' => $item->id]) }}" class="no-underline">
                                    <div class="flex flex-col sm:flex-row px-8 py-4 bg-white border border-gray-300 h-auto sm:h-[265px] rounded-xl shadow-md">
                                        <div class="order-2 sm:order-1">
                                            <div class="w-36 px-1 py-0.5 bg-blue-600 rounded-full">
                                                <p class="text-white font-bold text-center">Artikel Wikrama</p>
                                            </div>
                                            <h1 class="w-full sm:w-[350px] text-lg sm:text-xl mt-3 leading-tight font-bold">
                                                {{ $item->judul }}
                                            </h1>
                                            <div class="md:hidden block w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                                <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt="" class="w-full h-full object-cover rounded-xl">
                                            </div>
                                            <p class="w-full sm:w-[320px] mb-4 text-xs mt-3 text-gray-500">
                                                {!! Str::limit($item->konten, 40) !!}
                                            </p>
                                            <div class="flex items-center gap-2">
                                                <p class="text-xs text-gray-500">John Doe</p>
                                                <div class="bg-gray-300 w-2 h-2 rounded-full"></div>
                                                <p class="text-xs text-gray-500">20 July 2024</p>
                                            </div>
                                        </div>
                                        <div class="md:block hidden w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                            <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt="" class="w-full h-full object-cover rounded-xl">
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            

            
                @if ($chunks->count() > 1)
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        @foreach ($chunks as $index => $chunk)
                            <button type="button"
                                class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-gray-800' : 'bg-gray-400' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                                data-carousel-slide-to="{{ $index }}"></button>
                        @endforeach
                    </div>

                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>

                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                @endif
           
        </div>

        {{-- end carousel desktop --}}


        {{-- start carousel mobile --}}

<div id="default-carousel" class="sm:hidden block z-10 relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[430px] overflow-hidden rounded-lg md:h-[850px]">
      
        @php
            // Split the collection into chunks of 1 article per slide for mobile
            $chunks = $tipsKarir->chunk(1);
        @endphp

        <!-- Loop through each chunk and display them as slides -->
        @foreach ($chunks as $index => $chunk)
            <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                data-carousel-item="{{ $index }}">
                
                <div class="grid grid-cols-1 gap-4 mt-5">
                    @foreach ($chunk as $item)
                        <a href="{{ route('openedartikel', ['id' => $item->id]) }}" class="no-underline">
                            <div
                                class="flex flex-col sm:flex-row px-8 py-4 bg-white border border-gray-300 h-auto sm:h-[265px] rounded-xl shadow-md">
                                <div class="order-2 sm:order-1">
                                    <div class="w-36 px-1 py-0.5 bg-blue-600 rounded-full">
                                        <p class="text-white font-bold text-center">Artikel Wikrama</p>
                                    </div>
                                    <h1 class="w-full sm:w-[350px] text-lg sm:text-xl mt-3 leading-tight font-bold">
                                        {{ $item->judul }}</h1>
                                    <div
                                        class="md:hidden block w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                        <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt=""
                                            class="w-full h-full object-cover rounded-xl">
                                    </div>
                                    <p class="w-full sm:w-[320px] mb-4 text-xs mt-3 text-gray-500">
                                        {!! $item->konten !!}</p>
                                    <div class="flex items-center gap-2">
                                        <p class="text-xs text-gray-500">John Doe</p>
                                        <div class="bg-gray-300 w-2 h-2 rounded-full"></div>
                                        <p class="text-xs text-gray-500">20 July 2024</p>
                                    </div>
                                </div>
                                <div
                                    class="md:block hidden w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                    <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt=""
                                        class="w-full h-full object-cover rounded-xl">
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    @if ($chunks->count() > 1)
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            @foreach ($chunks as $index => $chunk)
                <button type="button"
                    class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-gray-800' : 'bg-gray-400' }}"
                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}"
                    data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>

        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>

        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    @endif
</div>

{{-- end carousel mobile --}}


        {{-- end carousel mobile --}}


        {{-- end card --}}
    </div>
    </div>

    <div class="px-6 sm:px-14 py-10">
        <h1 class="text-4xl sm:text-5xl font-bold">Tips <span class="text-blue-600">Karir</span></h1>
        <p class="w-full sm:w-[450px] leading-tight mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,Lorem ipsum dolor sit amet,</p>

            <div id="default-carousel" class="sm:block hidden z-10 relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-[430px] overflow-hidden rounded-lg md:h-[850px]">
                    @php
                        $chunks = $tipsKarir->chunk(6);
                    @endphp
                
                    <!-- Loop through each chunk and display them as slides -->
                    @foreach ($chunks as $index => $chunk)
                        <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $index }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                                @foreach ($chunk as $item)
                                <a href="{{ route('openedartikel', ['id' => $item->id]) }}" class="no-underline">
                                        <div class="flex flex-col sm:flex-row px-8 py-4 bg-white border border-gray-300 h-auto sm:h-[265px] rounded-xl shadow-md">
                                            <div class="order-2 sm:order-1">
                                                <div class="w-36 px-1 py-0.5 bg-blue-600 rounded-full">
                                                    <p class="text-white font-bold text-center">Artikel Wikrama</p>
                                                </div>
                                                <h1 class="w-full sm:w-[350px] text-lg sm:text-xl mt-3 leading-tight font-bold">
                                                    {{ $item->judul }}
                                                </h1>
                                                <div class="md:hidden block w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                                    <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt="" class="w-full h-full object-cover rounded-xl">
                                                </div>
                                                <p class="w-full sm:w-[320px] mb-4 text-xs mt-3 text-gray-500">
                                                    {!! Str::limit($item->konten, 40) !!}
                                                </p>
                                                <div class="flex items-center gap-2">
                                                    <p class="text-xs text-gray-500">John Doe</p>
                                                    <div class="bg-gray-300 w-2 h-2 rounded-full"></div>
                                                    <p class="text-xs text-gray-500">20 July 2024</p>
                                                </div>
                                            </div>
                                            <div class="md:block hidden w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                                <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt="" class="w-full h-full object-cover rounded-xl">
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                
    
                
                    @if ($chunks->count() > 1)
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            @foreach ($chunks as $index => $chunk)
                                <button type="button"
                                    class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-gray-800' : 'bg-gray-400' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                                    data-carousel-slide-to="{{ $index }}"></button>
                            @endforeach
                        </div>
    
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
    
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    @endif
               
            </div>
    
            {{-- end carousel desktop --}}
    
    
            {{-- start carousel mobile --}}
    
    <div id="default-carousel" class="sm:hidden block z-10 relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[430px] overflow-hidden rounded-lg md:h-[850px]">
          
            @php
                // Split the collection into chunks of 1 article per slide for mobile
                $chunks = $tipsKarir->chunk(1);
            @endphp
    
            <!-- Loop through each chunk and display them as slides -->
            @foreach ($chunks as $index => $chunk)
                <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                    data-carousel-item="{{ $index }}">
                    
                    <div class="grid grid-cols-1 gap-4 mt-5">
                        @foreach ($chunk as $item)
                            <a href="{{ route('openedartikel', ['id' => $item->id]) }}" class="no-underline">
                                <div
                                    class="flex flex-col sm:flex-row px-8 py-4 bg-white border border-gray-300 h-auto sm:h-[265px] rounded-xl shadow-md">
                                    <div class="order-2 sm:order-1">
                                        <div class="w-36 px-1 py-0.5 bg-blue-600 rounded-full">
                                            <p class="text-white font-bold text-center">Artikel Wikrama</p>
                                        </div>
                                        <h1 class="w-full sm:w-[350px] text-lg sm:text-xl mt-3 leading-tight font-bold">
                                            {{ $item->judul }}</h1>
                                        <div
                                            class="md:hidden block w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                            <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt=""
                                                class="w-full h-full object-cover rounded-xl">
                                        </div>
                                        <p class="w-full sm:w-[320px] mb-4 text-xs mt-3 text-gray-500">
                                            {!! $item->konten !!}</p>
                                        <div class="flex items-center gap-2">
                                            <p class="text-xs text-gray-500">John Doe</p>
                                            <div class="bg-gray-300 w-2 h-2 rounded-full"></div>
                                            <p class="text-xs text-gray-500">20 July 2024</p>
                                        </div>
                                    </div>
                                    <div
                                        class="md:block hidden w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                        <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt=""
                                            class="w-full h-full object-cover rounded-xl">
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    
        @if ($chunks->count() > 1)
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach ($chunks as $index => $chunk)
                    <button type="button"
                        class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-gray-800' : 'bg-gray-400' }}"
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"
                        data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>
    
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
    
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        @endif
    </div>
    
    {{-- end carousel mobile --}}
    </div>

    <div class="px-6 sm:px-14 py-10">
        <h1 class="text-4xl sm:text-5xl font-bold">Berita <span class="text-blue-600">Wikrama</span></h1>
        <p class="w-full sm:w-[450px] leading-tight mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,Lorem ipsum dolor sit amet,</p>

            {{-- carousel desktop --}}



<div id="default-carousel" class="sm:block hidden z-10 relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[430px] overflow-hidden rounded-lg md:h-[850px]">
      
        @php
            // Split the collection into chunks of 6 articles per slide
            $chunks = $beritaWikrama->chunk(6);
        @endphp

        <!-- Loop through each chunk and display them as slides -->
        @foreach ($chunks as $index => $chunk)
                        <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $index }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                                @foreach ($chunk as $item)
                                <a href="{{ route('openedartikel', ['id' => $item->id]) }}" class="no-underline">
                                        <div class="flex flex-col sm:flex-row px-8 py-4 bg-white border border-gray-300 h-auto sm:h-[265px] rounded-xl shadow-md">
                                            <div class="order-2 sm:order-1">
                                                <div class="w-36 px-1 py-0.5 bg-blue-600 rounded-full">
                                                    <p class="text-white font-bold text-center">Artikel Wikrama</p>
                                                </div>
                                                <h1 class="w-full sm:w-[350px] text-lg sm:text-xl mt-3 leading-tight font-bold">
                                                    {{ $item->judul }}
                                                </h1>
                                                <div class="md:hidden block w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                                    <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt="" class="w-full h-full object-cover rounded-xl">
                                                </div>
                                                <p class="w-full sm:w-[320px] mb-4 text-xs mt-3 text-gray-500">
                                                    {!! Str::limit($item->konten, 40) !!}
                                                </p>
                                                <div class="flex items-center gap-2">
                                                    <p class="text-xs text-gray-500">John Doe</p>
                                                    <div class="bg-gray-300 w-2 h-2 rounded-full"></div>
                                                    <p class="text-xs text-gray-500">20 July 2024</p>
                                                </div>
                                            </div>
                                            <div class="md:block hidden w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                                <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt="" class="w-full h-full object-cover rounded-xl">
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                
    
                
                    @if ($chunks->count() > 1)
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            @foreach ($chunks as $index => $chunk)
                                <button type="button"
                                    class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-gray-800' : 'bg-gray-400' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                                    data-carousel-slide-to="{{ $index }}"></button>
                            @endforeach
                        </div>
    
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
    
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    @endif
               
            </div>

{{-- end carousel desktop --}}

{{-- start carousel mobile --}}

<div id="default-carousel" class="sm:hidden block z-10 relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[430px] overflow-hidden rounded-lg md:h-[850px]">
       
        @php
            // Split the collection into chunks of 6 articles per slide
            $chunks = $beritaWikrama->chunk(1);
        @endphp

        <!-- Loop through each chunk and display them as slides -->
        @foreach ($chunks as $index => $chunk)
        <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
            data-carousel-item="{{ $index }}">
            
            <div class="grid grid-cols-1 gap-4 mt-5">
                @foreach ($chunk as $item)
                    <a href="{{ route('openedartikel', ['id' => $item->id]) }}" class="no-underline">
                        <div
                            class="flex flex-col sm:flex-row px-8 py-4 bg-white border border-gray-300 h-auto sm:h-[265px] rounded-xl shadow-md">
                            <div class="order-2 sm:order-1">
                                <div class="w-36 px-1 py-0.5 bg-blue-600 rounded-full">
                                    <p class="text-white font-bold text-center">Artikel Wikrama</p>
                                </div>
                                <h1 class="w-full sm:w-[350px] text-lg sm:text-xl mt-3 leading-tight font-bold">
                                    {{ $item->judul }}</h1>
                                <div
                                    class="md:hidden block w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                    <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt=""
                                        class="w-full h-full object-cover rounded-xl">
                                </div>
                                <p class="w-full sm:w-[320px] mb-4 text-xs mt-3 text-gray-500">
                                    {!! $item->konten !!}</p>
                                <div class="flex items-center gap-2">
                                    <p class="text-xs text-gray-500">John Doe</p>
                                    <div class="bg-gray-300 w-2 h-2 rounded-full"></div>
                                    <p class="text-xs text-gray-500">20 July 2024</p>
                                </div>
                            </div>
                            <div
                                class="md:block hidden w-[120px] sm:w-[220px] rounded-xl order-1 sm:order-2 mt-4 sm:mt-0 sm:ml-auto aspect-square">
                                <img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt=""
                                    class="w-full h-full object-cover rounded-xl">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@if ($chunks->count() > 1)
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($chunks as $index => $chunk)
            <button type="button"
                class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-gray-800' : 'bg-gray-400' }}"
                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}"
                data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>

    <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
@endif
</div>

{{-- end carousel mobile --}}

    </div>

    <div class="mt-24"></div>

@endsection
