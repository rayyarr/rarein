@extends('layouts.app')
@section('judul')

<span class="title-animation">Tamu Undangan</span>
@endsection
@section('content')

<div id="tabelusers"
    class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-[900px] w-full justify-center mx-auto">

    @if(session('success'))
    <div class="hidden bg-green-100 border border-green-400 text-green-700 m-2 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Hore!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif


    <div
        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 p-4 bg-white">
        <div>
            {{--<div class="hidden">
                <select id="countries" onchange="redirectToSelectedValue()"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Pilih data</option>
                    @foreach ($user as $d)
                    <option value="{{ $d->nama }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <script>
                function redirectToSelectedValue() {
                    var selectedValue = document.getElementById('countries').value;
                    var redirectURL = "?search=" + encodeURIComponent(selectedValue);
                    window.location.href = redirectURL;
                }
            </script>--}}

            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                class="!hidden inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5"
                type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <button onclick="openEditModal(edit=false)" data-modal-target="main-modal"
                data-modal-toggle="main-modal"
                class="inline-flex items-center ml-2 text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5">Tambah</button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Reward</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Promote</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Activate account</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete User</a>
                </div>
            </div>
        </div>
        <form action="{{ route('tamu.index') }}" method="GET">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" id="table-search-users"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari tamu">
            </div>
        </form>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Bank
                </th>
                <th scope="col" class="px-6 py-3">
                    No Rekening
                </th>
                <th scope="col" class="px-6 py-3">
                    Pemilik Rekening
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $d)
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <div class="ps-3 w-4 font-medium text-gray-900">
                            {{ $loop->iteration }}
                        </div>
                    </div>
                </td>
                <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <div class="ps-0">
                        <div class="text-base font-semibold">{{ $d->bank }}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    <div class="text-base text-black">{{ $d->no_rekening }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-base text-black">{{ $d->pemilik_rekening }}</div>
                </td>
                <td class="px-6 py-4 flex gap-x-2">
                    <button data-modal-target="main-modal" data-modal-toggle="main-modal"
                        class="flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button"
                        onclick="openEditModal(edit=true, '{{ $d->id }}', '{{ $d->bank }}', '{{ $d->no_rekening }}', '{{ $d->pemilik_rekening }}')">
                        Edit
                    </button>

                    {{--<button type="button" class="btn btn-info btn-sm view-btn" data-toggle="modal"
                        data-target="#viewModal_{{ $loop->iteration }}">
                        <i class="fas fa-eye"></i>
                    </button>
                    <!-- Modal View Data -->
                    <div class="modal fade" id="viewModal_{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-labelledby="viewModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewModalLabel">Detail Aduan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama Murid</th>
                                                <td>{{ $aduan->nama_murid }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kelas</th>
                                                <td>{{ $aduan->kelas }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kategori Aduan</th>
                                                <td>{{ $aduan->kategori_aduan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Aduan</th>
                                                <td>{{ $aduan->aduan }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Bukti Aduan</th>
                                                <td>
                                                    @if ($aduan->bukti_aduan)
                                                    <img src="{{ asset('storage/bukti_aduan/'.$aduan->bukti_aduan) }}"
                                                        alt="Bukti Aduan" width="100">
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <a href="/tamu/hapus/{{ $d->id }}"
                        class="flex text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Hapus
                    </a>
                    <a href="/tamu/edit/{{ $d->id }}" type="button"
                        class="!hidden font-medium text-blue-600 hover:underline">Ubah</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- Edit modal -->
<div id="main-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 id="titleForm" class="text-xl font-semibold text-gray-900 dark:text-white">
                    Send Gift
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="main-modal">
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
                <form id="formHadiah" class="space-y-4" action="#" method="POST">
                    @csrf
                    <div class="!mt-0">
                        <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih rekening bank</label>
                        <select id="bank" name="bank" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Pilih rekening</option>
                            <option value="BRI">BRI</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                            <option value="Mandiri">Mandiri</option>
                        </select> 
                    </div>
                    <div>
                        <label for="no_rekening"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Rekening</label>
                        <input type="text" name="no_rekening" id="no_rekening" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="pemilik_rekening"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemilik</label>
                        <input type="text" name="pemilik_rekening" id="pemilik_rekening" placeholder=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    edit = false;
    function openEditModal(edit, id, bank, no_rekening, pemilik_rekening) {
        if(edit==true){
            titleForm.innerHTML = "Edit Rekening";
            document.getElementById('formHadiah').action = "/hadiah/update " + id;
            document.getElementById('bank').value = bank;
            document.getElementById('no_rekening').value = no_rekening;
            document.getElementById('pemilik_rekening').value = pemilik_rekening;
        } else {
            titleForm.innerHTML = "Tambah Rekening";
            document.getElementById('formHadiah').action = "/hadiah/store ";
            document.getElementById('bank').value = "";
            document.getElementById('no_rekening').value = "";
            document.getElementById('pemilik_rekening').value = "";
        }

        var existingHiddenInput = document.getElementById('formHadiah').querySelector('input[name="_method"]');

        if (edit && !existingHiddenInput) {
            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = '_method';
            hiddenInput.value = 'PUT';
            document.getElementById('formHadiah').appendChild(hiddenInput);
        } else if (!edit && existingHiddenInput) {
            existingHiddenInput.parentNode.removeChild(existingHiddenInput);
        }
    }
</script>

@endsection