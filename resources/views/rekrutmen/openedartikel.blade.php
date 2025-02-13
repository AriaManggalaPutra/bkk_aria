@extends('layouts.navbar')

@section('content')
@if(isset($artikels))
    <div class="container mx-auto px-4 py-32">
        
        <div class="-mb-12"></div>

        <div class="min-h-screen flex flex-col items-center justify-center mb-8">
            <!-- Image Container -->
            <div class="w-full md:w-[1100px]  h-[500px]"> <!-- Menetapkan lebar dan tinggi yang konsisten -->
                <img src="{{ asset('storage/gambars/' . $artikels->gambar) }}" class="w-full h-full bg-cover rounded-xl"> <!-- Menggunakan object-cover agar gambar menyesuaikan ukuran container tanpa distorsi -->
            </div>

            <div class="text-center px-4 md:py-10 py-8">
                <h1 class="text-4xl font-bold mb-4">{{ $artikels->judul }}</h1>
            </div>

            <div class="flex justify-center space-x-4 -py-6 text-gray-600 mb-8">
                <span>By: John Doe</span> <!-- Replace with dynamic author if available -->
                <div class="bg-gray-300 w-2 h-2 rounded-full"></div>
                <span>{{ $artikels->created_at->format('d M Y') }}</span>
            </div>

            <!-- Article Content -->
        
        </div>


        <div class="hidden md:block prose md:px-48 sm:px-12 w-full md:max-w-12xl  mb-16">
            <p class="font-semibold">{!! $artikels->konten !!}</p>
        </div>

        <div class="block md:hidden prose md:px-48 sm:px-12 w-full md:max-w-4xl  mb-16">
            <p class="font-semibold">{!! $artikels->konten !!}</p>
        </div>
          
        
        
        
        
    </div>
@else
    <p>Article not found.</p>
@endif

<div class="py-16"></div>
@endsection
