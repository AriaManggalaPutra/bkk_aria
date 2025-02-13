@extends('layouts.navbar-admin')

@section('content')
    @if (Session::get('success'))
        <div id="toast-success"
            class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
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
    <div class="">
        <h2 class="font-bold text-2xl mb-2">Berita Wikrama</h2>
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
                    <span class="pointer-events-none mx-2 text-slate-800">
                        /
                    </span>
                </li>
                <li
                    class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
                    <a href="{{ route('dashboard-user.indexUser') }}">Berita Wikrama</a>
            </ol>
        </nav>
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
            class="block mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Tambah Artikel
        </button>

        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-3xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Buat Artikel Terbaru!
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="" action="{{ route('artikel.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-5">
                                <label for="judul"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                    Artikel</label>
                                <input type="text" name="judul" id="judul"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="mb-5">
                                <label for="konten"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten
                                    Artikel</label>
                                <textarea id="content" name="konten" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here..."></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="kategori"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                                    Artikel</label>
                                <select id="kategori" name="kategori"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option hidden selected>Pilih Kategori</option>
                                    <option value="Berita Wikrama">Berita Wikrama</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload Gambar</label>
                                <input name="gambar"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" type="file">
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                                Artikel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <section class="container mx-auto px-8 py-8 lg:py-2">
        @foreach ($artikels as $artikel)
        <div class="flex flex-wrap -mx-4">
            <div class="w-full max-w-full mb-8 sm:w-1/2 px-4 lg:w-1/3 flex flex-col h-full">
                <!-- Gambar -->
                <div class="flex-shrink-0 h-48">
                    <img src="{{ asset('storage/gambars/' . $artikel['gambar']) }}" alt="Card img"
                        class="object-cover object-center w-full h-full" />
                </div>
        
                <!-- Konten Card -->
                <div class="flex flex-grow flex-col justify-between px-4 py-6 bg-white border border-gray-400">
                    <div>
                        <a href="#"
                            class="inline-block mb-4 text-xs font-bold capitalize border-b-2 border-blue-600 hover:text-blue-600">
                            {{ $artikel->kategori }}</a>
                        <a href="#"
                            class="block mb-4 text-2xl font-black leading-tight hover:underline hover:text-blue-600">
                            {{ $artikel->judul }}
                        </a>
                        <p class="mb-4">
                            {!! Str::limit($artikel->konten, 100) !!}
                        </p>
                    </div>
        
                    <div class="flex items-center gap-2">
                        <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-white">
                            {{ $artikel->judul }}</h4>
                        <i class="fa-solid fa-eye text-green-500"></i>
                        <button id="{{ $artikel->id }}" data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                            class="edit-artikel" type="button">
                            <i class="fa-solid fa-pen-to-square text-blue-500"></i>
                        </button>
                        <button id="{{ $artikel->id }}" class="delete-artikel" data-modal-target="delete-modal"
                            data-modal-toggle="delete-modal" type="button">
                            <i class="fa-solid fa-trash text-red-500"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
    </section>

    <div id="edit-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Artikel Yang Sudah Anda Buat!
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-5">
                            <label for="judul"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                Artikel</label>
                            <input type="text" name="judul" id="editjudul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="konten"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten
                                Artikel</label>
                            <textarea id="editcontent" name="editkonten" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="mb-5">
                            <label for="kategori"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                                Artikel</label>
                            <select id="editkategori" name="kategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Kategori</option>
                                <option value="Berita Wikrama">Berita Wikrama</option>
                                <option value="Tips Karir">Tips Karir</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload file</label>
                            <input name="gambar"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file">
                            <p class="mt-2 text-sm text-gray-500">(Jika tidak ingin mengubah gambar, biarkan kolom gambar
                                kosong.)</p>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                            Artikel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="delete-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="delete-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Kamu Ingin Menghapus
                        Artikel Ini?</h3>
                    <button id="confirm-delete" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Ya, Hapus
                    </button>
                    <button data-action="cancel" type="button"
                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Tidak, Batalkan
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.edit-artikel');
            const modal = document.getElementById('edit-modal');
            const judul = document.getElementById('editjudul');
            const kategori = document.getElementById('editkategori');
            const form = modal.querySelector('form');

            buttons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const artikelId = this.getAttribute('id');

                    $.ajax({
                        url: `/artikel-list/edit/${artikelId}`,
                        method: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            judul.value = response.artikel.judul;
                            window.editor.setData(response.artikel.konten);
                            kategori.value = response.artikel.kategori;
                            form.setAttribute('action',
                                `/artikel-list/update/${artikelId}`);
                            modal.classList.remove('hidden');
                        },
                        error: function(error) {
                            alert('Gagal memuat data artikel.');
                        }
                    });
                });
            });

            // Handle form submission
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(form);

                $.ajax({
                    url: form.getAttribute('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log('Success:', response);
                        window.location.reload();
                        modal.classList.add('hidden');
                        // Optionally refresh the article list or update the UI
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr);
                        alert('Gagal mengupdate artikel.');
                    }
                });
            });

            // Close modal functionality
            const closeButton = document.querySelector('[data-modal-hide="edit-modal"]');
            closeButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set up AJAX to include the CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            });

            const buttons = document.querySelectorAll('.delete-artikel');
            const modal = document.getElementById('delete-modal');
            let artikelIdToDelete = null;

            if (!modal) {
                console.error('Delete modal not found.');
                return;
            }

            buttons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    artikelIdToDelete = this.getAttribute('id');
                    modal.classList.remove('hidden');
                });
            });

            const confirmButton = document.getElementById('confirm-delete');
            if (confirmButton) {
                confirmButton.addEventListener('click', function() {
                    if (artikelIdToDelete) {
                        $.ajax({
                            url: `/artikel-list/delete/${artikelIdToDelete}`,
                            method: 'DELETE',
                            dataType: 'json',
                            success: function(response) {
                                console.log('Success:', response);
                                modal.classList.add('hidden');
                                window.location.reload(); // Refresh the page
                            },
                            error: function(xhr) {
                                console.error('Error:', xhr);
                                alert('Gagal menghapus artikel.');
                            }
                        });
                    }
                });
            } else {
                console.error('Confirm delete button not found.');
            }

            const cancelButton = modal.querySelector('button[data-action="cancel"]');
            if (cancelButton) {
                cancelButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            } else {
                console.error('Cancel button not found.');
            }

            const closeButton = modal.querySelector('button[data-modal-hide="delete-modal"]');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            } else {
                console.error('Close button not found.');
            }
        });
    </script>
@endpush
