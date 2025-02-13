@extends('layouts.navbar')

@section('content')
    <section class="py-32 px-8 lg:px-20">
        <!-- Job Title and Location -->
        <h1 class="font-bold text-3xl">{{ $lowongan->nama_pekerjaan }} - {{ $lowongan->lokasi }}</h1>
        <div class="flex items-center mt-4 space-x-4">
            <div class="bg-gray-200 px-4 py-1 text-center rounded-full border border-gray-400 w-[150px]">
                <p class="font-semibold">{{ $lowongan->sistem_kerja }}</p>
            </div>
            <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
            <p class="text-lg"><i class="fas fa-map-marker-alt"></i> {{ $lowongan->lokasi }} </p>
            <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
            <p class="text-lg">Posted on {{ $lowongan->created_at->format('d M Y') }}</p>
        </div>

        <!-- Apply Button -->
        @auth
        <div class="mt-6">
            <button id="openModalButton"
                class="text-white shadow-md bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-12 py-2">
                Lamar
            </button>
        </div>
        @endauth

        <!-- Modal for Apply -->
        @auth
        <div id="applyModal"
            class="hidden z-20 fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Lamar Pekerjaan
                    </h3>
                    <button id="closeModalButton" class="text-gray-500 hover:text-gray-900">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="pt-4">
                    <form action="{{ route('lamaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Hidden Fields for ID User and ID Lowongan -->
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="id_lowongan" value="{{ $lowongan->id }}">
                        
                        <!-- Nama Lengkap -->
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" value="{{ Auth::user()->nama }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-gray-100">
                        </div>
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-gray-100">
                        </div>
                        <!-- Upload CV -->
                        <div class="mb-4">
                            <label for="cv" class="block text-sm font-medium text-gray-700">Upload CV (PDF Only)</label>
                            <input type="file" name="cv" id="cv" accept=".pdf"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700">
                            Lamar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endauth

        <div class="mt-10">
            <hr class="border rounded-full border-gray-300">
        </div>

        <!-- Job Description Section -->
        <div class="mt-12 flex flex-col lg:flex-row gap-8">
            <!-- Job Details -->
            <div class="w-full lg:w-2/3">
                <div class="bg-white text-blue-600 p-6 rounded-lg shadow-sm">
                    <h2 class="font-semibold text-lg mb-4">Requirement:</h2>
                    <ul class="list-disc list-inside space-y-2 text-blue-600">
                        {{ $lowongan->requirement }}
                    </ul>
                </div>
                <div class="bg-blue-600 mt-5 text-white p-6 rounded-lg shadow-sm">
                    <h2 class="font-semibold text-lg mb-4">About This Job:</h2>
                    <ul class="list-disc list-inside space-y-2 text-white">
                        {{ $lowongan->about_job }}
                    </ul>
                </div>
                <div class="bg-white mt-5 text-blue-600 p-6 rounded-lg shadow-sm">
                    <h2 class="font-semibold text-lg mb-4">Responsibility:</h2>
                    <ul class="list-disc list-inside space-y-2 text-blue-600">
                        {{ $lowongan->responsibility }}
                    </ul>
                </div>
            </div>

            <!-- Company Information -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="mb-5">
                        <div class="w-14 h-14 rounded-full shadow-md">
                            <img src="{{ asset('storage/gambars/' . $lowongan->perusahaan->logo) }}" alt=""
                                class="rounded-full w-full h-full object-cover">
                        </div>
                        <hr class="mt-5">
                    </div>
                    <h3 class="font-semibold text-lg mb-4">{{ $lowongan->perusahaan->nama_perusahaan }}</h3>
                    <p class="text-gray-600 mb-6">{{ $lowongan->perusahaan->deskripsi_perusahaan }}</p>
                    <div class="space-y-4">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-globe mr-2"></i> {{ $lowongan->perusahaan->web }}
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-briefcase mr-2"></i> {{ $lowongan->sistem_kerja }}
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-users mr-2"></i> {{ $lowongan->kebutuhan_kandidat }} People
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Get the modal and buttons
        const modal = document.getElementById('applyModal');
        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');

        // Open modal when button is clicked
        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Close modal when close button is clicked
        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside the modal content
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
@endsection
