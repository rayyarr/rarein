@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Kustomisasi Template</span>
@endsection
@section('content')
<div class="flex flex-col lg:flex-row justify-center w-full gap-5">

    <div class="flex flex-col max-w-[600px] lg:w-[600px]">

        <form method="POST" action="{{ route('setup.publish') }}">
            @csrf
            <div class="card bg-white rounded-2xl p-5 shadow">
                <h1 class="font-bold text-2xl flex justify-center mb-10 mt-3 hidden">Data Pasangan</h1>
                <div class="flex flex-col sm:flex-col justify-between gap-5">
                    <div class="flex p-4 w-full">
                        <div class="w-full">
                            @if ($errors->any())
                            <div class="alert alert-danger mb-5">
                                <p class="flex py-5 px-5 text-md text-gray-800">
                                    Waduh! Terjadi kesalahan dengan input kamu.<br>
                                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </p>
                            </div>
                            @endif
                            <h3 class="font-medium text-lg text-gray-900 mb-5">Setup Awal</h3>

                            <div class="relative z-0 w-full mb-5 group">
                                <input name="nama_acara" value="{{ $data->nama_acara ?? 'Pernikahan Wahyu & Riski' }}"
                                    type="text"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Judul Acara
                                </label>
                            </div>

                            <div class="w-full flex flex-col sm:flex-row gap-5 sm:gap-x-7">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input name="nama_pria" value="{{ $data->nama_pria ?? 'Wahyu' }}" type="text"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Nama Pria
                                    </label>
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input name="nama_wanita" value="{{ $data->nama_wanita ?? 'Riski' }}" type="text"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Nama Wanita
                                    </label>
                                </div>
                            </div>

                            <div class="w-full flex flex-col sm:flex-row gap-5 sm:gap-x-7">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="bio_pria"
                                        value="{{ $data->bio_pria ?? 'Saya seorang UI/UX Designer' }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Biodata Pria
                                    </label>
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="bio_wanita"
                                        value="{{ $data->bio_wanita ?? 'Saya seorang SEO Specialist' }}"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Biodata Wanita
                                    </label>
                                </div>
                            </div>

                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                            <div class="relative w-full mb-5">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="datetime-local" name="tanggal_akad" placeholder="Tanggal dan waktu akad"
                                    id="akad"
                                    class="datetimePicker border-0 border-b-2 border-gray-300 text-gray-900 text-sm focus:border-blue-500 focus:outline-none focus:ring-0 block w-full ps-7 py-2.5 px-0 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-500 dark:text-white dark:focus:border-blue-500">
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 z-10 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Tanggal dan waktu akad
                                </label>
                            </div>

                            <div class="relative w-full mb-5">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="datetime-local" name="tanggal_resepsi"
                                    placeholder="Tanggal dan waktu resepsi" id="resepsi"
                                    class="datetimePicker border-0 border-b-2 border-gray-300 text-gray-900 text-sm focus:border-blue-500 focus:outline-none focus:ring-0 block w-full ps-7 py-2.5 px-0 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-500 dark:text-white dark:focus:border-blue-500">
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 z-10 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Tanggal dan waktu resepsi
                                </label>
                            </div>

                            <script>
                                flatpickr("#akad", {
                                    enableTime: true,
                                    dateFormat: "Y-m-d H:i",
                                    time_24hr: true,
                                    defaultDate: "{{ $data->tanggal_akad ?? '' }}"
                                    //minDate: "today"
                                });

                                flatpickr("#resepsi", {
                                    enableTime: true,
                                    dateFormat: "Y-m-d H:i",
                                    time_24hr: true,
                                    defaultDate: "{{ $data->tanggal_resepsi ?? '' }}"
                                    //minDate: "today"
                                });
                            </script>

                        </div>
                    </div>

                    {{--<div class="hidden flex p-4 w-full">
                        <div class="w-full">
                            <h3 class="font-medium text-lg text-gray-900 mb-5">Calon Pengantin Wanita</h3>

                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="name"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Nama Mempelai Wanita
                                </label>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="name"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Nama
                                </label>
                            </div>
                        </div>
                    </div>--}}
                </div>
                <button type="submit" name="submit"
                    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-2xl text-sm px-5 py-2.5 text-center me-2 mb-2">Simpan</button>
            </div>
        </form>

    </div>

    <div class="flex flex-col w-full lg:max-w-[300px] gap-y-5">
        <div
            class="w-full p-6 bg-white border border-gray-200 rounded-2xl shadow dark:bg-gray-800 dark:border-gray-700">
            <svg class="hidden w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
            </svg>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Eh kamu.. Kapan
                    nikah? Nunggu jodoh turun dari langit? 🤣</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Mending segera deh! Kami siap mendesain
                undangan pernikahan digital untuk Anda ;)</p>
            <a href="/demo" target="_blank" class="inline-flex items-center text-blue-600 hover:underline">
                Lihat demo
                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                </svg>
            </a>
        </div>
        <div
            class="w-full h-fit p-6 bg-white border border-gray-200 rounded-2xl shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pengen punya cuan sendiri?
                😲</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Mohon maaf kami bukan mesin ATM 🏃</p>
        </div>
    </div>

</div>

@endsection