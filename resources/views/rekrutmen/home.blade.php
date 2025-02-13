<!-- resources/views/home.blade.php -->
@extends('layouts.navbar')

@section('content')
<div style="background-image: url('{{ asset( $about->large_image) }}')" class="bg-cover bg-center min-h-screen flex flex-col items-center justify-center text-white">
    <!-- Hero Section -->
    <div class="text-center max-w-5xl mx-auto px-4 -mt-44 pt-24 md:pt-32">
        <h1 class="text-2xl sm:text-4xl md:text-6xl font-bold leading-tight mb-8 font-rubik">
            {{ $about->title }} <span class="text-blue-600">{{ $about->highlighted_text }}</span>
        </h1>
        <p class="text-sm md:text-sm mb-6 font-rubik">
            {{ $about->detail_information }}
        </p>
        <div class="flex flex-col md:flex-row items-center justify-center mb-10 space-y-4 md:space-y-0 md:space-x-4">
            <!-- Container for Search Bar and Button -->
            <div class="flex w-full max-w-md space-x-4">
                <input
                    type="text"
                    placeholder="Search for a job"
                    class="w-full p-2 rounded-lg text-gray-800 focus:outline-none font-rubik text-sm md:text-base"
                />
                <button class="bg-blue-600 text-white px-4 py-2 text-sm md:text-base rounded-lg hover:bg-blue-700 transition duration-300 font-bold font-rubik">
                    Search
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Cards Section -->
<div class="-mt-28 flex flex-wrap justify-center items-center py-8 w-full">
    <div class="bg-white rounded-lg drop-shadow-lg p-5 flex flex-col items-center justify-center m-5 w-80">
        <div class="text-3xl font-bold text-black mb-2 font-rubik">
            <i id="userCount">0</i>
        </div>
        <div class="text-gray-700 text-center font-rubik">Total Siswa</div>
    </div>
    <div class="bg-white rounded-lg drop-shadow-lg p-5 flex flex-col items-center justify-center m-5 w-80">
        <div class="text-3xl font-bold text-black mb-2 font-rubik">
            <i id="companyCount">0</i>
        </div>
        <div class="text-gray-700 text-center font-rubik">Perusahaan Tersedia</div>
    </div>
    <div class="bg-white rounded-lg drop-shadow-lg p-5 flex flex-col items-center justify-center m-5 w-80">
        <div class="text-3xl font-bold text-black mb-2 font-rubik">
            <i id="lowonganCount">0</i>
        </div>
        <div class="text-gray-700 text-center font-rubik">Lowongan Tersedia</div>
    </div>
</div>

<div class="flex flex-col items-center">
    <!-- Keunggulan Section -->
    <div data-aos="fade-up" data-aos-duration="1000" class="mb-6 text-center rounded-3xl w-[150px] p-1 border-blue-600 border">
        <p class="text-blue-600">Keunggulan</p>
    </div>
    <!-- Why Choose Us Section -->
    <div data-aos="fade-up" data-aos-duration="1000" class="text-center w-full max-w-3xl px-4">
        <h1 class="text-2xl md:text-4xl">
            Mengapa memilih kami? <span class="text-blue-600">Temukan Keunggulannya</span> Bersama BKK Wikrama
        </h1>
        <p class="text-md md:text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolorum tempora perspiciatis excepturi a reprehenderit, veritatis quibusdam tenetur repellendus tempore?</p>
    </div>
</div>

<div class="flex flex-wrap justify-center items-center py-6 w-full">
    <div data-aos="fade-up" data-aos-duration="1000" class="relative bg-white rounded-3xl shadow-2xl p-5 flex flex-col items-center justify-center m-12 w-[400px] h-64">
        <!-- Blue Circle -->
        <div class="absolute shadow-md top-4 left-4 w-12 aspect-square bg-blue-600 rounded-full"></div>
        <!-- Title and Text -->
        <div class="text-xl mt-12 font-normal text-black mb-2 font-rubik text-left w-full">Title Of The Card</div>
        <div class="text-gray-700 text-left font-rubik">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" class="relative bg-white rounded-3xl shadow-2xl p-5 flex flex-col items-center justify-center m-12 w-[400px] h-64">
        <!-- Blue Circle -->
        <div class="absolute shadow-md top-4 left-4 w-12 aspect-square bg-blue-600 rounded-full"></div>
        <!-- Title and Text -->
        <div class="text-xl mt-12 font-normal text-black mb-2 font-rubik text-left w-full">Title Of The Card</div>
        <div class="text-gray-700 text-left font-rubik">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" class="relative bg-white rounded-3xl shadow-2xl p-5 flex flex-col items-center justify-center m-12 w-[400px] h-64">
        <!-- Blue Circle -->
        <div class="absolute shadow-md top-4 left-4 w-12 aspect-square bg-blue-600 rounded-full"></div>
        <!-- Title and Text -->
        <div class="text-xl mt-12 font-normal text-black mb-2 font-rubik text-left w-full">Title Of The Card</div>
        <div class="text-gray-700 text-left font-rubik">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div>
    </div>
</div>


<div class="flex flex-wrap justify-center items-center py-6 w-full">
    <div class="relative bg-white rounded-3xl shadow-2xl p-5 flex flex-col items-center justify-between m-8 w-[1500px] h-auto">
        <!-- First Step (Top) -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full mb-8">
            <!-- Left side with image -->
            <div class="bg-slate-100 rounded-2xl h-64 w-64 md:h-80 md:w-96 flex-shrink-0 mb-12 md:mb-0 md:ml-24 md:mr-16">
                <img src="{{ asset('assets/background.png') }}" alt="Step Image" class="h-full w-full object-cover rounded-lg" />
            </div>
            <!-- Right side with text -->
            <div class="flex flex-col items-center md:items-start">
                <div class="mb-10 text-center rounded-3xl w-[150px] p-1 border-blue-600 border">
                    <p class="text-blue-600">How it Work</p>
                </div>
                <h2 class="text-2xl md:text-4xl text-black mb-4 -mt-6 font-rubik">Step <span class="text-blue-600">Lamaran</span> 1</h2>
                <p class="text-gray-700 mb-4 font-rubik">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, mollitia odio quia esse dolorem ducimus atque eligendi ipsam in, est nostrum aperiam distinctio eveniet! Veritatis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, mollitia odio quia esse dolorem ducimus atque eligendi ipsam in, est nostrum aperiam distinctio eveniet! Veritatis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, mollitia odio quia esse dolorem ducimus atque eligendi ipsam in, est nostrum aperiam distinctio eveniet! Veritatis.
                </p>
                <button class="bg-black text-white px-10 py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-800 transition duration-300 font-rubik">
                    Search Job
                </button>
            </div>
        </div>

        <!-- Second Step (Bottom) -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full">
            <!-- Right side with text (ordered first in HTML) -->
            <div class="flex flex-col items-center md:items-start order-2 md:order-1 ml-6 md:ml-24">
                <div class="mb-16 text-center rounded-3xl w-[150px] p-1 border-blue-600 border">
                    <p class="text-blue-600">How it Work</p>
                </div>
                <h2 class="text-2xl md:text-4xl text-black mb-4 -mt-6 font-rubik">Step <span class="text-blue-600">Lamaran</span> 2</h2>
                <p class="text-gray-700 mb-4 font-rubik">
                   Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex cupiditate natus corporis voluptatum doloribus odio! Nam error voluptatem dolore nihil. Voluptates temporibus obcaecati excepturi dicta!
                </p>
                <button class="bg-black text-white px-10     py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-800 transition duration-300 font-rubik">
                    Search Job
                </button>
            </div>

            <!-- Left side with image (ordered second in HTML) -->
            <div class="bg-slate-100 rounded-2xl h-64 w-64 md:h-80 md:w-96 flex-shrink-0 mb-6 md:mb-0 md:ml-24 md:mr-16 order-1 md:order-2">
                <img src="{{ asset('assets/background.png') }}" alt="Step Image" class="h-full w-full object-cover rounded-lg" />
            </div>
        </div>
    </div>
</div>


<div class="flex flex-wrap justify-center items-center py-6 w-full">
    <div class="relative bg-white rounded-3xl shadow-2xl p-5 flex flex-col items-center justify-between m-8 w-[1500px] h-auto">
        <!-- Third Step (Top) -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full mb-8">
            <!-- Left side with image -->
            <div class="bg-slate-100 rounded-2xl h-64 w-64 md:h-80 md:w-96 flex-shrink-0 mb-12 md:mb-0 md:ml-24 md:mr-16">
                <img src="{{ asset('assets/background.png') }}" alt="Step Image" class="h-full w-full object-cover rounded-lg" />
            </div>
            <!-- Right side with text -->
            <div class="flex flex-col items-center md:items-start">
                <div class="mb-16 text-center rounded-3xl w-[150px] p-1 border-blue-600 border">
                    <p class="text-blue-600">How it Work</p>
                </div>
                <h2 class="text-2xl md:text-4xl text-black mb-4 -mt-6 font-rubik">Step <span class="text-blue-600">Lamaran</span> 3</h2>
                <p class="text-gray-700 mb-4 font-rubik">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, mollitia odio quia esse dolorem ducimus atque eligendi ipsam in, est nostrum aperiam distinctio eveniet! Veritatis.
                </p>
                <button class="bg-black text-white px-10 py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-800 transition duration-300 font-rubik">
                    Search Job
                </button>
            </div>
        </div>

        <!-- Fourth Step (Bottom) -->
        <div class="flex flex-col md:flex-row items-center justify-center w-full">
            <!-- Right side with -->
            <div class="flex flex-col items-center md:items-start order-2 md:order-1 ml-6 md:ml-24">
                <div class="mb-16 text-center rounded-3xl w-[150px] p-1 border-blue-600 border">
                    <p class="text-blue-600">How it Work</p>
                </div>
                <h2 class="text-2xl md:text-4xl text-black mb-4 -mt-6 font-rubik">Step <span class="text-blue-600">Lamaran</span> 4</h2>
                <p class="text-gray-700 mb-4 font-rubik">
                   Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex cupiditate natus corporis voluptatum doloribus odio! Nam error voluptatem dolore nihil. Voluptates temporibus obcaecati excepturi dicta!
                </p>
                <button class="bg-black text-white px-10 py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-800 transition duration-300 font-rubik">
                    Search Job
                </button>
            </div>

            <!-- Left side with image (ordered second in HTML) -->
            <div class="bg-slate-100 rounded-2xl h-64 w-64 md:h-80 md:w-96 flex-shrink-0 mb-6 md:mb-0 md:ml-24 md:mr-16 order-1 md:order-2">
                <img src="{{ asset('assets/background.png') }}" alt="Step Image" class="h-full w-full object-cover rounded-lg" />
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col items-center">
    <div class="mb-6 text-center rounded-3xl w-[150px] p-1 border-blue-600 border">
        <p class="text-blue-600">Testimonials</p>
    </div>
    <div class="text-center w-full max-w-3xl px-4">
        <h1 class="text-2xl md:text-4xl">
            Dengarkan <span class="text-blue-600">Pendapat Klien Kami yang puas</span> Tentang BKK Wikrama
        </h1>
        <p class="text-md md:text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolorum tempora perspiciatis excepturi a reprehenderit, veritatis quibusdam tenetur repellendus tempore?</p>
    </div>
</div>

<div class="flex justify-center items-center py-12 w-full">
    <div class="flex flex-wrap justify-center gap-6 mb-5">
        @foreach($testimoni as $testimonial)
            <div class="bg-white rounded-2xl shadow-lg p-2 md:p-4 w-[380px] md:w-[400px] md:m-12">
                <div class="flex items-center mb-4">
                    <div class="flex text-blue-600">
                        @for ($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial->rating)
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.429L24 9.588l-6 5.847 1.42 8.28L12 18.896l-7.42 4.119L6 15.435 0 9.588l8.332-1.572z"/>
                                </svg>
                            @else
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.429L24 9.588l-6 5.847 1.42 8.28L12 18.896l-7.42 4.119L6 15.435 0 9.588l8.332-1.572z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                </div>
                <p class="text-gray-700 mb-4">"{{ $testimonial->message }}"</p>
                <div class="flex items-center">
                    <img class="w-[40px] h-[40px] rounded-full" src="{{ asset($testimonial->photo ?? 'assets/profilehome.png') }}" alt="Client Profile">
                    <div class="ml-4">
                        <div class="text-sm font-semibold text-gray-900">{{ $testimonial->name }}</div>
                        <div class="text-sm text-gray-400">{{ $testimonial->jabatan }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




<script>
    function animateValue(id, start, end, duration) {
        let obj = document.getElementById(id);
        let range = end - start;
        let stepCount = 100; // Tentukan jumlah langkah tetap (misalnya 100 langkah untuk semua animasi)
        let increment = range / stepCount; // Hitung increment berdasarkan range dan jumlah langkah
        let current = start;
        let stepTime = duration / stepCount; // Tentukan durasi per langkah (agar total durasi tetap sama)

        let timer = setInterval(function () {
            current += increment;
            if (current >= end) {
                current = end; // Pastikan nilai tidak melebihi end
                clearInterval(timer);
            }
            obj.innerHTML = `+${Math.floor(current)}`;
        }, stepTime);
    }

    // Jalankan semua animasi secara bersamaan tanpa delay
    document.addEventListener("DOMContentLoaded", function () {
        let duration = 2000; // Durasi 2 detik untuk semua animasi
        animateValue("userCount", 0, {{ $user }}, duration);
        animateValue("companyCount", 0, {{ $company }}, duration);
        animateValue("lowonganCount", 0, {{ $lowonganss }}, duration);
    });
</script>

@endsection
