@extends('layouts.navbar-admin')

@section('content')
    <h2 class="font-bold text-2xl mb-2">Daftar Lamaran</h2>
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
                <a href="#">List Pekerjaan</a>
                <span class="pointer-events-none mx-2 text-slate-800">
                    /
                </span>
            </li>
            <li
                class="flex cursor-pointer items-center text-sm text-slate-500 transition-colors duration-300 hover:text-slate-800">
                <a href="#">Lamaran : {{ $lowongan->nama_pekerjaan }}</a>
        </ol>
    </nav>

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

    <div>
        <table id="search-table">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">Name</span>
                    </th>
                    <th>
                        <span class="flex items-center">E-mail</span>
                    </th>
                    <th>
                        <span class="flex items-center">Jurusan</span>
                    </th>
                    <th>
                        <span class="flex items-center">Progress Rekrutmen</span>
                    </th>
                    <th>
                        <span class="flex items-center">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lamaran as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->user->jurusan }}</td>
                        <td>{{ $item->status }}</td>
                        <td class="flex gap-2">
                            <button data-modal-target="crud-modal-{{ $item->id }}"
                                data-modal-toggle="crud-modal-{{ $item->id }}"
                                class="bg-green-500 p-2 w-8 h-8 rounded-full flex items-center justify-center">
                                <i class="text-white fa-solid fa-envelope"></i>
                            </button>
                            <a href="{{ asset('storage/cv/' . $item->cv) }}" target="_blank">
                                <button class="bg-red-500 p-2 w-8 h-8 rounded-full flex items-center justify-center">
                                    <i class="text-white fa-solid fa-file"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach ($lamaran as $lamar)
        <div id="crud-modal-{{ $lamar->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Kirim E-mail & Update Status
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal-{{ $lamar->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('lamaran-admin.send.email', ['id' => $lamar->id]) }}" class="p-4 md:p-5">
                        @csrf
                        <input type="hidden" name="perusahaan" value="{{ $lowongan->perusahaan->nama_perusahaan }}">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                                <input value="{{ $lamar->nama }}" type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                    Lamaran</label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Pilih status lamaran yang baru</option>
                                    <option value="Lamaran Diterima">Lamaran Diterima</option>
                                    <option value="Proses Seleksi">Proses Seleksi</option>
                                    <option value="Wawancara">Wawancara</option>
                                    <option value="On Boarding">On Boarding</option>
                                    <option value="Ditolak">On Ditolak</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi Pesan
                                    Email</label>
                                <textarea id="pesanEmail-{{ $lamar->id }}" name="pesanEmail" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Mohon Isi Pesan Email..."></textarea>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Kirim E-mail!
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('script')
<script>
    if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#search-table", {
            template: (options, dom) => "<div class='" + options.classes.top + "'>" +
                "<div class='flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto'>" +
                (options.paging && options.perPageSelect ? 
                    "<div class='" + options.classes.dropdown + "'>" +
                    "<label>" +
                    "<select class='" + options.classes.selector + "'></select> " + options.labels.perPage +
                    "</label>" +
                    "</div>" : ""
                ) +
                "<button id='exportDropdownButton' type='button' class='flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto'>" +
                "Export as" +
                "<svg class='-me-0.5 ms-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'>" +
                "<path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m19 9-7 7-7-7' />" +
                "</svg>" +
                "</button>" +
                "<div id='exportDropdown' class='z-10 hidden w-52 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700' data-popper-placement='bottom'>" +
                "<ul class='p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400' aria-labelledby='exportDropdownButton'>" +
                "<li>" +
                "<button onclick='window.location.href=\"{{ route('lamaran-admin.export', ['LowonganId' => $lowongan->id]) }}\"' id='export-txt' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z' clip-rule='evenodd'/>" +
                "</svg>" +
                "<span>Export Excel</span>" +
                "</button>" +
                "</li>" +
                "</ul>" +
                "</div>" +
                "</div>" +
                (options.searchable ? 
                    "<div class='" + options.classes.search + "'>" +
                    "<input class='" + options.classes.input + "' placeholder='" + options.labels.placeholder + 
                    "' type='search' title='" + options.labels.searchTitle + "'" + (dom.id ? 
                        " aria-controls='" + dom.id + "'" : "") + ">" +
                    "</div>" : ""
                ) +
                "</div>" +
                "<div class='" + options.classes.container + "'" + (options.scrollY.length ? 
                    " style='height: " + options.scrollY + "; overflow-Y: auto;'" : "") + "></div>" +
                "<div class='" + options.classes.bottom + "'>" +
                (options.paging ? 
                    "<div class='" + options.classes.info + "'></div>" : ""
                ) +
                "<nav class='" + options.classes.pagination + "'></nav>" +
                "</div>"
        });

        const $exportButton = document.getElementById("exportDropdownButton");
        const $exportDropdownEl = document.getElementById("exportDropdown");
        const dropdown = new Dropdown($exportDropdownEl, $exportButton);
        console.log(dropdown);
    }
</script>

@endpush
