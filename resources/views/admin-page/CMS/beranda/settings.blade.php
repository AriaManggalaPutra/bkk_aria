@extends('layouts.navbar-admin')

@section('content')
@if (Session::get('success'))
<div id="toast-success"
    class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 z-50"
    role="alert">
    <div
        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ Session::get('success') }}.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
        data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
@endif

<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Home Page Setting</h2>
    <div>
        <!-- About Section -->
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-medium">1. About Section</h3>
            <button onclick="openEditModal()" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Edit
            </button>
        </div>

        <form class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="outline_title" class="block text-sm font-medium text-gray-700">Outline title</label>
                <input type="text" id="outline_title" value="{{ $about->outline_title ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <div class="mb-4">
                <label for="solid_title" class="block text-sm font-medium text-gray-700">Solid title</label>
                <input type="text" id="solid_title" value="{{ $about->solid_title ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <div class="mb-4">
                <label for="detail_information" class="block text-sm font-medium text-gray-700">Detail Information</label>
                <textarea id="detail_information" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" readonly>{{ $about->detail_information ?? '' }}</textarea>
            </div>

            <div class="mb-4">
                <label for="button_label" class="block text-sm font-medium text-gray-700">Button Label</label>
                <input type="text" id="button_label" value="{{ $about->button_label ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <div class="mb-4">
                <label for="button_link" class="block text-sm font-medium text-gray-700">Button Link</label>
                <input type="text" id="button_link" value="{{ $about->button_link ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <div class="mb-4">
                <label for="large_image" class="block text-sm font-medium text-gray-700">Large Image</label>
                @if ($about->large_image)
                <img src="{{ asset($about->large_image) }}" alt="Large Image" class="w-full h-64 object-cover rounded-lg shadow-md">
                @endif
            </div>
        </form>

        <!-- Modal Edit About -->
        <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0;">
            <div class="relative bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-2xl mx-auto my-8 overflow-y-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">Edit About Section</h3>
                    <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('CMS.beranda.settings.updateAbout', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="outline_title" class="block text-sm font-medium text-gray-700">Outline title</label>
                        <input type="text" name="outline_title" id="outline_title" value="{{ $about->outline_title ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="solid_title" class="block text-sm font-medium text-gray-700">Solid title</label>
                        <input type="text" name="solid_title" id="solid_title" value="{{ $about->solid_title ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="detail_information" class="block text-sm font-medium text-gray-700">Detail Information</label>
                        <textarea name="detail_information" id="detail_information" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ $about->detail_information ?? '' }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="button_label" class="block text-sm font-medium text-gray-700">Button Label</label>
                        <input type="text" name="button_label" id="button_label" value="{{ $about->button_label ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="button_link" class="block text-sm font-medium text-gray-700">Button Link</label>
                        <input type="text" name="button_link" id="button_link" value="{{ $about->button_link ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="large_image" class="block text-sm font-medium text-gray-700">Large Image</label>
                        <input type="file" name="large_image" id="large_image" class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer" accept="image/*">
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>


            <!-- Keunggulan Section -->
            <br>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium">1. Keunggulan Section</h3>
                <button onclick="openEditModalKeunggulan()" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Edit
                </button>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $keunggulan->title ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">description</label>
                <input type="text" name="description" id="description" value="{{ $keunggulan->description ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" readonly>
            </div>


            {{-- Modal Update Keunggulan Section --}}
        <div id="editModalKeunggulan" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0;">
            <div class="relative bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-2xl mx-auto my-8 overflow-y-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">Edit Keunggulan Section</h3>
                    <button onclick="closeEditModalKeunggulan()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('CMS.keunggulan.update', $keunggulan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" name="title" id="title" value="{{ $keunggulan->title ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" name="description" id="description" value="{{ $keunggulan->description ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="button" onclick="closeEditModalKeunggulan()" class="mr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

            <!-- Lamaran Section -->
            <br>
            <h3 class="text-lg font-medium mb-4">3. Lamaran Section :</h3>

            <div class="mb-4">
                <label for="lamaran_title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="lamaran_title" id="lamaran_title"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Masukkan Judul">
            </div>

            <div class="mb-4">
                <label for="lamaran_description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="lamaran_description" id="lamaran_description" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Deskripsi langkah lamaran"></textarea>
            </div>

            <div class="mb-4">
                <label for="lamaran_image" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="lamaran_image" id="lamaran_image" class="mt-1 block w-full text-sm text-gray-500">
            </div>

            <!-- Testimoni Section -->
            <br>
            <h3 class="text-lg font-medium mb-4">4. Testimoni Section :</h3>
            <div class="mb-4">
                <label for="testimoni_name" class="block text-sm font-medium text-gray-700">Nama*</label>
                <input type="text" name="testimoni_name" id="testimoni_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Masukkan nama">
            </div>

            <div class="mb-4">
                <label for="testimoni_jabatan" class="block text-sm font-medium text-gray-700">Jabatan*</label>
                <input type="text" name="testimoni_jabatan" id="testimoni_jabatan"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Masukkan jabatan">
            </div>

            <div class="mb-4">
                <label for="testimoni_rating" class="block text-sm font-medium text-gray-700">Rating (1-5)*</label>
                <select name="testimoni_rating" id="testimoni_rating"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" disabled selected>Pilih rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="testimoni_message" class="block text-sm font-medium text-gray-700">Testimoni Message</label>
                <textarea name="testimoni_message" id="testimoni_message" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Masukkan pesan testimoni"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>

    function openEditModal() {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
        document.body.style.overflow = 'auto'; // Re-enable scrolling
    }

    // Close modal when clicking outside
    document.getElementById('editModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditModal();
        }
    });

    // Close modal on escape key press
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('editModal').classList.contains('hidden')) {
            closeEditModal();
        }
    });

    function openEditModalKeunggulan() {
        document.getElementById('editModalKeunggulan').classList.remove('hidden');
        document.getElementById('editModalKeunggulan').classList.add('flex');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeEditModalKeunggulan() {
        document.getElementById('editModalKeunggulan').classList.add('hidden');
        document.getElementById('editModalKeunggulan').classList.remove('flex');
        document.body.style.overflow = 'auto'; // Re-enable scrolling
    }

    // Close modal when clicking outside
    document.getElementById('editModalKeunggulan').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditModalKeunggulan();
        }
    });

    // Close modal on escape key press
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('editModalKeunggulan').classList.contains('hidden')) {
            closeEditModalKeunggulan();
        }
    });


</script>
@endsection
