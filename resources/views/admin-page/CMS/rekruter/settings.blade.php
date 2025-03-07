@extends('layouts.navbar-admin')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Halaman Rekruter</h2>
    <div>
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-medium">Rekruter Section</h3>
            <button onclick="openEditModal()" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Edit
            </button>
        </div>
        <div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="outline_title" class="block text-sm font-medium text-gray-700">Outline Title*</label>
                    <input type="text" name="outline_title" id="outline_title" value="{{ $rekruter->outline_title }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100 cursor-not-allowed"
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="solid_title" class="block text-sm font-medium text-gray-700">Solid Title*</label>
                    <input type="text" name="solid_title" id="solid_title" value="{{ $rekruter->solid_title }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100 cursor-not-allowed"
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100 cursor-not-allowed"
                        readonly>{{ $rekruter->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="button_label" class="block text-sm font-medium text-gray-700">Button Label*</label>
                    <input type="text" name="button_label" id="button_label" value="{{ $rekruter->button_label }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100 cursor-not-allowed"
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="button_link" class="block text-sm font-medium text-gray-700">Button Link*</label>
                    <input type="text" name="button_link" id="button_link" value="{{ $rekruter->button_link }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-gray-100 cursor-not-allowed"
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="small_image" class="block text-sm font-medium text-gray-700">Image</label>
                    <img src="{{ asset('storage/' . $rekruter->image) }}" alt="Rekruter Image" class="w-40 h-40 rounded-md">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
    <div class="relative bg-white p-6 rounded-lg shadow-lg w-1/2 max-w-2xl mx-auto my-8 overflow-y-auto max-h-[90vh]">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">Edit Rekruter Section</h3>
            <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <form action="{{ route('CMS.rekruter.update', $rekruter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Outline Title</label>
                <input type="text" name="outline_title" id="edit_outline_title" value="{{ $rekruter->outline_title }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Solid Title</label>
                <input type="text" name="solid_title" id="edit_solid_title" value="{{ $rekruter->solid_title }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="edit_description" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">{{ $rekruter->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Button Label</label>
                <input type="text" name="button_label" id="edit_button_label" value="{{ $rekruter->button_label }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Button Link</label>
                <input type="text" name="button_link" id="edit_button_link" value="{{ $rekruter->button_link }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="edit_image"
                    class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer"
                    accept="image/*">
                <p class="text-sm text-gray-500">Current Image:</p>
                <img src="{{ asset('storage/' . $rekruter->image) }}" alt="Current Image" class="w-32 h-32 rounded-md mt-2">
            </div>

            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeEditModal()"
                    class="mr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-700">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal() {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
