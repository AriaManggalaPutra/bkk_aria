@extends('layouts.navbar-admin')

@section('content')
<h2 class="font-bold text-2xl mb-2">Artikel</h2>
<nav aria-label="breadcrumb" class="w-max mb-2">
    <ol class="flex w-full flex-wrap items-center rounded-md bg-slate-50">
        <li
            class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
            <a href="{{ route('dashboard-user.indexUser') }}">Dashboard</a>
            <span class="pointer-events-none mx-2 text-slate-800">
                /
            </span>
        </li>
        <li
            class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
            <a href="#">Artikel</a>
    </ol>
</nav>
        <div>
            <h1 class="text-1xl font-normal text-gray-500 dark:text-white mb-5 ">Pilih Tipe Artikel Yang Ingin Anda Buat!</h1>
            <div class="flex gap-4 justify-center">
                <div>
                    <a href="{{route('artikel.tipsKarir')}}"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tips Karir</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </a>
                </div>
                <div>
                    <a href="{{route('artikel.beritaWikrama')}}"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Berita Wikrama</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </a>
                </div>
            </div>
        </div>


@endsection
