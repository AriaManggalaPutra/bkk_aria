@extends('layouts.navbar-admin')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Halaman Data Keterserapan</h2>
    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="outline_title" class="block text-sm font-medium text-gray-700">Outline Title*</label>
                <input type="text" name="outline_title" id="outline_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan outline title">
            </div>
            
            <div class="mb-4">
                <label for="solid_title" class="block text-sm font-medium text-gray-700">Solid Title*</label>
                <input type="text" name="solid_title" id="solid_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan solid title">
            </div>
            
            <div class="mb-4">
                <label for="detail_information" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="detail_information" id="detail_information" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan informasi detail"></textarea>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
