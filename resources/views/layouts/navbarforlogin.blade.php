<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Bursa Kerja Khusus Wikrama</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Quicksand:wght@400;500;600;700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Rubik';
        }

        body {
            background-color: #F4F4F4F4;
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
            /* add this rule to hide the mobile menu by default */
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
                <div class="flex items-center">
                    <img class="h-[40px] w-[40px]" src="{{ asset('assets/image.png') }}" alt="Logo" />
                    <span class="ml-1 text-lg font-bold text-gray-800">BKK Wikrama</span>
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('/') }}"
                        class="@if (request()->routeIs('/')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Beranda</a>
                    <a href="{{ route('lowongan') }}"
                        class=" @if (request()->routeIs('lowongan')) text-blue-600 @endif  hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Lowongan</a>
                    <a href="{{ route('company') }}"
                        class="@if (request()->routeIs('company')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Rekruter</a>
                    <a href="{{ route('artikel') }}" class="@if (request()->routeIs('artikel')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Artikel &
                        Tips Karir</a>
                    <a href="{{ route('dataKeterserapan') }}" class=" hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Data
                        Keterserapan</a>
                    @if (request()->routeIs('login.index'))
                    <a href="{{ route('register.index') }}" class="@if (request()->routeIs('register.index')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Register</a>
                    @elseif (request()->routeIs('register.index'))
                    <a href="{{ route('login.index') }}" class="@if (request()->routeIs('login.index')) text-blue-600 @endif hover:text-blue-600 px-2 py-2 rounded-md text-sm font-medium">Login</a>
                    @endif
                </div>

                <div class="md:hidden">
                    <!-- Hamburger Menu -->
                    <!-- Hamburger Menu -->
                    <button id="menu-toggle" class="menu-label">
                        <svg class="h-6 w-6 text-gray-800 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        <svg class="h-6 w-6 text-gray-800 hover:text-blue-600 hidden" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden">
            <div class="bg-white shadow-md rounded-b-lg">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ route('/') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                    <a href="{{ route('lowongan') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Lowongan</a>
                    <a href="{{ route('company') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Rekruter</a>
                    <a href="#"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Artikel
                        & Tips Karir</a>
                    <a href="#"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Data
                        Keterserapan</a>
                    <a href="{{ route('login.index') }}"
                        class="block text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var mobileMenu = document.getElementById('mobile-menu');
            var menuToggle = this;
            var hamburgerIcon = menuToggle.querySelector('svg:first-child');
            var closeIcon = menuToggle.querySelector('svg:last-child');

            if (mobileMenu.style.display === 'none' || mobileMenu.style.display === '') {
                mobileMenu.style.display = 'block';
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                mobileMenu.style.display = 'none';
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
