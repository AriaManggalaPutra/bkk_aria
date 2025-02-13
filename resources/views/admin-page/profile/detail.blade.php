@extends('layouts.navbar-admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">User Detail</h1>

    <div class="bg-white shadow-md rounded p-6">
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Nama</label>
            <p>{{ $user->nama }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Email</label>
            <p>{{ $user->email }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Roles</label>
            <p>{{ $user->roles }}</p>
        </div>

        <!-- Tampilkan informasi lain yang diperlukan -->

        <div class="mt-6">
            <a href="{{ route('dashboard-admin.indexAdmin') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Kembali</a>
        </div>
    </div>
</div>
@endsection
