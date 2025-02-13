@extends('layouts.navbar-admin')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Footer Settings</h2>

    @if (Session::has('success'))
    <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="ms-3 text-sm font-normal">{{ Session::get('success') }}.</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-6">
        <form>
            @foreach(['detail_information', 'phone', 'email', 'address', 'button_link_instagram', 'button_link_facebook', 'button_link_twitter', 'button_link_youtube', 'social_media_description'] as $field)
            <div class="mb-5">
                <label class="block text-gray-700 font-medium">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                <input type="text" value="{{ $footerSettings->$field }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed" disabled>
            </div>
            @endforeach

            <button type="button" data-modal-target="footer-modal" data-modal-toggle="footer-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Edit Footer
            </button>
        </form>
    </div>
</div>

<!-- Modal Edit Footer -->
<div id="footer-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Edit Footer</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8"
                    data-modal-hide="footer-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="p-4">
                <form id="editFooterForm" method="POST" action="{{ route('CMS.footer.update', $footerSettings->id) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="footer_id" name="id" value="{{ $footerSettings->id }}">

                    @foreach(['detail_information', 'phone', 'email', 'address', 'button_link_instagram', 'button_link_facebook', 'button_link_twitter', 'button_link_youtube', 'social_media_description'] as $field)
                    <div class="mb-5">
                        <label for="{{ $field }}" class="block text-gray-700 font-medium">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                        <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ $footerSettings->$field }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>
                    @endforeach

                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('editFooterForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const form = this;
    const submitButton = form.querySelector('button[type="submit"]');
    const id = document.getElementById('footer_id').value;
    const formData = new FormData(form);

    submitButton.disabled = true;
    submitButton.textContent = 'Menyimpan...';

    try {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const response = await fetch(`{{ route('CMS.footer.update', $footerSettings->id) }}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: formData
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(result.message || 'Terjadi kesalahan saat memperbarui data');
        }

        alert(result.success);
        location.reload();
    } catch (error) {
        alert(error.message || 'Gagal memperbarui footer. Silakan coba lagi.');
        console.error('Error:', error);
    } finally {
        submitButton.disabled = false;
        submitButton.textContent = 'Simpan Perubahan';
    }
});
</script>
@endsection
