@extends('layouts.navbar-admin')

@section('content')
<h2 class="font-bold text-2xl mb-2">Dashboard</h2>
<nav aria-label="breadcrumb" class="w-max mb-2">
    <ol class="flex w-full flex-wrap items-center rounded-md bg-slate-50">
        <li
            class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
            <a href="{{ route('dashboard-user.indexUser') }}">Dashboard</a>
    </ol>
</nav>

<div class="grid gap-6 mb-8 md:grid-cols-3">
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                </path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Pelajar
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ DB::table('users')->wherenotIn('roles', ['admin'])->count() }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Perusahaan
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ DB::table('perusahaans')->count() }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                </path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Lowongan
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ DB::table('lowongans')->count() }}
            </p>
        </div>
    </div>
</div>

<div class="grid gap-6 mb-8 md:grid-cols-2">

    
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Statistik Pengunjung
        </h4>
        <canvas id="line"></canvas>
    </div>


    <div>
        <section>
            <form class="max-w-full mb-5 lg:max-w-5xl grid grid-cols-1 lg:grid-cols-3 gap-4 mx-auto">
                <!-- Tahun -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <select name="TracerTahun" id="year-select"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" hidden disabled selected>Cari Tahun</option>
                    </select>
                </div>
            
                <!-- Jurusan -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="w-4 h-4 text-gray-500 fa-solid fa-location-dot"></i>
                    </div>
                    <select name="TracerJurusan" id="default-search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" hidden disabled selected>Cari Jurusan</option>
                        <option value="Pengembangan Perangkat Lunak Dan Gim">PPLG</option>
                        <option value="Teknik Jaringan Komputer Dan Telekomunikasi">TJKT</option>
                        <option value="Desain Komunikasi Visual">DKV</option>
                        <option value="Pemasaran">PMN</option>
                        <option value="Manajemen Perkantoran Dan Layanan Bisnis">MPLB</option>
                        <option value="Hotel">HTL</option>
                        <option value="Kuliner">KLN</option>
                    </select>
                </div>
            
                <!-- Search Button -->
                <div class="relative">
                    <button type="submit"
                        class="block w-full p-4 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-3xl text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Search
                    </button>
                </div>
            </form>
            
        </section>
        <div class="max-w-6xl p-4  bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="py-0.5 font-semibold text-gray-800 dark:text-gray-300">
                Statistik Tracer Study
            </h4>
            <div class="max-w-lg mx-auto"> <!-- Inner container to control chart width -->
                <canvas id="pie"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Chart legend -->
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-blue-600 rounded-full"></span>
                        <span>Bekerja</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                        <span>Kuliah</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Wirausaha</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')

<script>
    // Data dari controller
    var months = {!! json_encode($months) !!};
    var viewCounts = {!! json_encode($viewCounts) !!};

    const lineConfig = {
      type: 'line',
      data: {
        labels: months, // Menggunakan data bulan dan tahun dari controller
        datasets: [
          {
            label: 'Pengunjung',
            backgroundColor: '#7F3CEF',
            borderColor: '#7F3CEF',
            data: viewCounts, // Menggunakan data jumlah pengunjung dari controller
            fill: false,
          }
        ],
      },
      options: {
        responsive: true,
        legend: {
          display: false,
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true,
        },
        scales: {
          x: {
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Bulan & Tahun',
            },
          },
          y: {
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Jumlah Pengunjung',
            },
          },
        },
      },
    }

    const lineCtx = document.getElementById('line')
    window.myLine = new Chart(lineCtx, lineConfig)
</script>

<script>
    const select = document.getElementById('year-select');
    const currentYear = new Date().getFullYear();
    const startYear = 2024; // Starting year
    const endYear = currentYear + 5; // End year, 5 years from now

    for (let year = currentYear; year >= startYear; year--) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        select.appendChild(option);
    }

    // Add years up to 5 years ahead
    for (let year = currentYear + 1; year <= endYear; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        select.appendChild(option);
    }
</script>
<script>
    /**
     * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
     */
    const kerja = {{ $Kerja }};
    const kuliah = {{ $Kuliah }};
    const wirausaha = {{ $Wirausaha }};

    const pieConfig = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [kuliah, kerja, wirausaha],
                /**
                 * These colors come from Tailwind CSS palette
                 * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                 */
                backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
                label: 'Total',
            }, ]
        },
        options: {
            responsive: true,
            cutoutPercentage: 80,
            /**
             * Default legends are ugly and impossible to style.
             * See examples in charts.html to add your own legends
             *  */
            legend: {
                display: false,
            },
        },
    }

    // change this to the id of your chart element in HMTL
    const pieCtx = document.getElementById('pie')
    window.myPie = new Chart(pieCtx, pieConfig)
</script>
@endpush
