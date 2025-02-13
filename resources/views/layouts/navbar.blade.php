<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Bursa Kerja Khusus Wikrama</title>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Quicksand:wght@400;500;600;700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            font-family: 'Rubik', sans-serif;
        }

        body {
            background-color: #F4F4F4;
        }

        .menu-label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .menu-label svg {
            transition: transform 0.3s ease-in-out;
        }

        .menu-label.open svg {
            transform: rotate(45deg);
        }

        #mobile-menu {
            display: none;
            /* Hide mobile menu by default */
        }
    </style>
</head>

<body>
    @yield('content')
    <!-- resources/views/navbar.blade.php -->
    <nav
        class="bg-white shadow-md fixed top-6 left-1/2 transform -translate-x-1/2 z-10 h-[60px] rounded-full w-full max-w-5xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-[60px]">
                <!-- Logo and Brand -->
                <div class="flex items-center">
                    <img class="h-[40px] w-[40px]" src="{{ asset('assets/image.png') }}" alt="Logo" />
                    <span class="ml-1 text-lg font-bold text-gray-800">BKK Wikrama</span>
                </div>
                <!-- Navigation Links (Desktop) -->
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('/') }}"
                        class="@if (request()->routeIs('/')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Beranda</a>
                    <a href="{{ route('lowongan') }}"
                        class="@if (request()->routeIs('lowongan')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Lowongan</a>
                    <a href="{{ route('company') }}"
                        class="@if (request()->routeIs('company')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Rekruter</a>
                    <a href="{{ route('artikel') }}"
                        class="@if (request()->routeIs('artikel')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Artikel
                        & Tips Karir</a>
                    <a href="{{ route('dataKeterserapan') }}"
                        class="@if (request()->routeIs('dataKeterserapan')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Data
                        Keterserapan</a>


                    @if (auth()->check())
                        <!-- Profile Menu dengan Alpine.js -->

                        <?php

                        $user = DB::table('users')->where('id', Auth::id())->first();

                        ?>

                        <div class="relative" x-data="{ isProfileMenuOpen: false }">
                            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                @click="isProfileMenuOpen = !isProfileMenuOpen"
                                @keydown.escape="isProfileMenuOpen = false" aria-label="Account" aria-haspopup="true">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="{{ asset('storage/profiles/' . ($user->profile ?? 'default.png')) }}"
                                    alt="" aria-hidden="true" />
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="isProfileMenuOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                @click.away="isProfileMenuOpen = false"
                                class="absolute right-0 mt-1 w-56 bg-white border border-gray-200 rounded-md shadow-lg dark:bg-gray-700 dark:border-gray-600 z-50 origin-top-right">

                                <!-- Header Profil -->
                                <div class="px-4 py-2">
                                    <p class="text-sm font-semibold text-center text-gray-700 dark:text-gray-300">
                                        {{ Auth::user()->nama }}</p>
                                    <hr class="my-2 border-gray-200 dark:border-gray-600">
                                </div>

                                @if (Auth::user()->roles == 'user')
                                    <a href="{{ route('dashboard-user.indexUser') }}"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        Dashboard
                                    </a>

                                    <form action="{{ route('dashboard-user.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5
                                            4v1a3 3 0 01-3 3H6a3 3 0
                                            01-3-3V7a3 3 0
                                            013-3h7a3 3 0 013
                                            3v1">
                                                </path>
                                            </svg>
                                            Log out
                                        </button>
                                    </form>
                                @endif
                                @if (Auth::user()->roles == 'admin')
                                    <a href="{{ route('profile.detail', ['id' => auth()->user()->id]) }}"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        Profile
                                    </a>

                                    <a href="{{ route('profile.settings') }}"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724
                                        1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37
                                        2.37a1.724 1.724 0 001.065 2.572c1.756.426
                                        1.756 2.924 0 3.35a1.724 1.724 0
                                        00-1.066 2.573c.94 1.543-.826
                                        3.31-2.37 2.37a1.724 1.724 0
                                        00-2.572 1.065c-.426 1.756-2.924
                                        1.756-3.35 0a1.724 1.724 0
                                        00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724
                                        1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924
                                        0-3.35a1.724 1.724 0
                                        001.066-2.573c-.94-1.543.826-3.31
                                        2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Settings
                                    </a>

                                    <form action="{{ route('profile.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5
                                            4v1a3 3 0 01-3 3H6a3 3 0
                                            01-3-3V7a3 3 0
                                            013-3h7a3 3 0 013
                                            3v1">
                                                </path>
                                            </svg>
                                            Log out
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @else
                        <!-- Tombol Login -->
                        <a href="{{ route('login.index') }}"
                            class="@if (request()->routeIs('Login')) text-blue-600 @endif
        hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">
                            Login
                        </a>
                        <a href="{{ route('register.index') }}"
                            class="@if (request()->routeIs('Register')) text-blue-600 @endif
        hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">
                            Register
                        </a>
                    @endif

                </div>

                <!-- Mobile Menu Toggle Button -->
                <div class="md:hidden">
                    <button id="menu-toggle" class="menu-label focus:outline-none">
                        <!-- Hamburger Icon -->
                        <svg class="h-6 w-6 text-gray-800 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        <!-- Close Icon (Initially Hidden) -->
                        <svg class="h-6 w-6 text-gray-800 hover:text-blue-600 hidden"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="bg-white shadow-md rounded-b-lg">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ route('/') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                    <a href="{{ route('lowongan') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Lowongan</a>
                    <a href="{{ route('company') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Rekruter</a>
                    <a href="{{ route('artikel') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Artikel
                        & Tips Karir</a>
                    <a href="{{ route('dataKeterserapan') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Data
                        Keterserapan</a>

                    @if (auth()->check())
                        <!-- Profile Link (Mobile) -->
                        <a href="{{ route('profile.detail', ['id' => auth()->user()->id]) }}"
                            class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Profile</a>
                    @else
                        <!-- Login Link (Mobile) -->
                        <a href="{{ route('login.index') }}"
                            class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Wrapper -->
    <div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
        <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="sm:col-span-2">
                <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                    <img class="w-10 aspect-square" src="{{ asset('assets/image.png') }}" alt="">
                    <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">BKK Wikrama</span>
                </a>
                <div class="mt-6 lg:max-w-sm">
                    <p class="text-sm text-gray-800">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam.
                    </p>
                    <p class="mt-4 text-sm text-gray-800">
                        Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                        explicabo.
                    </p>
                </div>
            </div>
            <div class="space-y-2 text-sm">
                <p class="text-base font-bold tracking-wide text-gray-900">Contacts</p>
                <div class="flex">
                    <p class="mr-1 text-gray-800">Phone:</p>
                    <a href="tel:(0251) 8242411" aria-label="Our phone" title="Our phone"
                        class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">(0251)
                        8242411</a>
                </div>
                <div class="flex">
                    <p class="mr-1 text-gray-800">Email:</p>
                    <a href="mailto:info@lorem.mail" aria-label="Our email" title="Our email"
                        class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">info@lorem.mail</a>
                </div>
                <div class="flex">
                    <p class="mr-1 text-gray-800">Address:</p>
                    <a href="https://www.google.com/maps/place/Wikrama+Bogor+Vocational+School/@-6.6452587,106.8438312,15z/data=!4m5!3m4!1s0x0:0x307fc4a38e65fa2b!8m2!3d-6.6453711!4d106.8438536"
                        target="_blank" rel="noopener noreferrer" aria-label="Our address" title="Our address"
                        class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">
                        Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16146
                    </a>
                </div>
            </div>
            <div>
                <span class="text-base font-bold tracking-wide text-gray-900">Social</span>
                <div class="flex items-center mt-1 space-x-3">

                    <a href="https://www.instagram.com/smkwikrama/"
                        class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                        <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                            <circle cx="15" cy="15" r="4"></circle>
                            <path
                                d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z">
                            </path>
                        </svg>
                    </a>

                    <a href="https://web.facebook.com/smkwikrama"
                        class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                            <path
                                d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                            </path>
                        </svg>
                    </a>

                    <!-- Twitter Icon -->
                    <a href="https://twitter.com/yourtwitterhandle"
                        class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                            <path
                                d="M23.643,4.937c-0.835,0.371-1.73,0.622-2.673,0.735c0.96-0.576,1.695-1.486,2.04-2.573 c-0.899,0.532-1.89,0.91-2.949,1.116c-0.848-0.905-2.056-1.467-3.399-1.467c-2.57,0-4.653,2.08-4.653,4.653 c0,0.364,0.042,0.719,0.123,1.061c-3.869-0.194-7.3-2.049-9.597-4.87c-0.402,0.689-0.632,1.49-0.632,2.341 c0,1.615,0.823,3.042,2.07,3.88c-0.765-0.024-1.49-0.235-2.116-0.586c0,0.019,0,0.038,0,0.057c0,2.26,1.607,4.146,3.74,4.574 c-0.392,0.106-0.803,0.162-1.227,0.162c-0.3,0-0.593-0.029-0.88-0.085c0.593,1.849,2.314,3.194,4.353,3.229 c-1.595,1.249-3.607,1.997-5.792,1.997c-0.376,0-0.749-0.022-1.118-0.065c2.067,1.326,4.522,2.099,7.151,2.099 c8.588,0,13.293-7.118,13.293-13.293c0-0.202-0.005-0.404-0.014-0.605C23.087,5.73,23.358,5.335,23.643,4.937z">
                            </path>
                        </svg>
                    </a>

                    <!-- YouTube Icon -->
                    <a href="https://www.youtube.com/channel/yourchannelid"
                        class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                            <path
                                d="M23.498,7.243c-0.196-1.385-0.779-2.575-1.544-3.43c-0.765-0.855-1.718-1.42-2.773-1.69c-1.366-0.334-5.153-0.353-10.104-0.353 c-4.952,0-8.738,0.019-10.104,0.353c-1.055,0.271-2.008,0.835-2.773,1.69c-0.765,0.855-1.348,2.045-1.544,3.43 c-0.335,2.487-0.335,5.451,0,7.938c0.196,1.385,0.779,2.575,1.544,3.43c0.765,0.855,1.718,1.42,2.773,1.69c1.366,0.334,5.153,0.353,10.104,0.353 c4.952,0,8.738-0.019,10.104-0.353c1.055-0.271,2.008-0.835,2.773-1.69c0.765-0.855,1.348-2.045,1.544-3.43 C23.834,12.693,23.834,9.729,23.498,7.243z M9.637,14.74V9.253l6.152,2.739L9.637,14.74z">
                            </path>
                        </svg>
                    </a>

                </div>
                <p class="mt-4 text-sm text-gray-500">
                    Bacon ipsum dolor amet short ribs pig sausage prosciutto chicken spare ribs salami.
                </p>
            </div>
        </div>
        <!-- Footer -->
        <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
            <p class="text-sm text-gray-600">
                © Copyright 2024 PPLG 27 
            </p>
            <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                <li>
                    <a href="/"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">F.A.Q</a>
                </li>
                <li>
                    <a href="/"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy
                        Policy</a>
                </li>
                <li>
                    <a href="/"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Terms
                        &amp; Conditions</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Scripts -->
    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var mobileMenu = document.getElementById('mobile-menu');
            var menuToggle = this;
            var hamburgerIcon = menuToggle.querySelector('svg:first-child');
            var closeIcon = menuToggle.querySelector('svg:last-child');

            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });
    </script>
    <!-- Flowbite JS -->
    <script src="{{ asset('../assets/js/flowbite.js') }}"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    @stack('script')
</body>

</html>
