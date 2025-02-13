@extends('layouts.navbar')

@section('content')
    <section class="px-4 lg:px-20">
        <section class="">
            <div class="flex flex-col lg:flex-row">
                <div class="px-4 lg:px-44 max-w-2xl mt-32 lg:mt-44">
                    <!-- Mengubah mt-10 menjadi mt-16 untuk tampilan mobile -->
                    <div class="mb-6 w-[260px] text-center rounded-3xl p-1 border-blue-600 border">
                        <p class="text-blue-600">Wikrama Success Process</p>
                    </div>
                    <div class="w-full lg:w-[590px]">
                        <h1 class="mb-6 font-bold text-3xl lg:text-5xl">Look at direction of <span
                                class="text-blue-600">Wikrama Path </span>
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
                </div>

            </div>
        </section>



        <section>
            <form class="mt-10 max-w-full lg:max-w-5xl grid grid-cols-1 lg:grid-cols-3 gap-4 mx-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <select name="TracerTahun" id="year-select"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" hidden disabled selected>Cari Tahun</option>
                    </select>
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="w-4 h-4 text-gray-500 fa-solid fa-location-dot"></i>
                    </div>
                    <select type="search" name="TracerJurusan" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" hidden disabled selected>Cari Jurusan</option>
                        <option value="Pengembangan Perangkat Lunak Dan Gim">Pengembangan Perangkat Lunak Dan Gim</option>
                        <option value="Teknik Jaringan Komputer Dan Telekomunikasi">Teknik Jaringan Komputer Dan Telekomunikasi</option>
                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        <option value="Pemasaran">Pemasaran</option>
                        <option value="Manajemen Perkantoran Dan Layanan Bisnis">Manajemen Perkantoran Dan Layanan Bisnis</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Kuliner">Kuliner</option>
                    </select>
                </div>

                <div class="relative">
                    <button type="submit"
                        class="block w-full p-4 text-white absolute bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-3xl text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </section>

        <div class="mx-auto mt-10 max-w-6xl p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
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
    @endsection

    @push('script')
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
