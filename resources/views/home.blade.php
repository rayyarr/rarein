@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Beranda</span>
@endsection
@section('content')
<div class="flex flex-row justify-center pt-10">
    <div
        class="inline-grid sm:grid-cols-2 md:grid-cols-4 md:mx-4 overflow-hidden w-9/12 md:w-fit rounded-3xl bg-transparent md:bg-white shadow">

        <a href="#"
            class="inline-grid border-gray-200 md:border-e w-full p-4 sm:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent sm:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
            <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </div>
            <div class="col-start-1 whitespace-nowrap text-slate-500">Total Undangan</div>
            <div class="col-start-1 text-blue-600 whitespace-nowrap text-4xl font-extrabold my-2">{{
                $userdata->total_undangan }}</div>
            <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs">2 undangan aktif</div>
        </a>

        <a href="#"
            class="inline-grid border-gray-200 w-full p-4 sm:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent border-t sm:border-0 md:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
            <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-pink-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <div class="col-start-1 whitespace-nowrap text-slate-500">Undangan Dilihat</div>
            <div class="col-start-1 text-pink-500 whitespace-nowrap text-4xl font-extrabold my-2">{{
                $userdata->undangan_dilihat }}</div>
            <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs hidden"></div>
        </a>

        <a href="#"
            class="inline-grid border-gray-200 border-t md:border-0 md:border-e w-full p-4 sm:col-span-2 md:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent gap-x-4 hover:scale-105 transition ease-in-out duration-200">
            <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-teal-600">
                <svg fill="none" class="inline-block w-8 h-8 stroke-current stroke-2" xmlns='http://www.w3.org/2000/svg'
                    viewBox='0 0 24 24'>
                    <g transform='translate(2.000000, 2.000000)'>
                        <line x1='13.9394' y1='10.413' x2='13.9484' y2='10.413'></line>
                        <line x1='9.9304' y1='10.413' x2='9.9394' y2='10.413'></line>
                        <line x1='5.9214' y1='10.413' x2='5.9304' y2='10.413'></line>
                        <path
                            d='M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z'>
                        </path>
                    </g>
                </svg>
            </div>
            <div class="col-start-1 whitespace-nowrap text-slate-500">Ucapan & Do'a</div>
            <div class="col-start-1 text-teal-600 whitespace-nowrap text-4xl font-extrabold my-2">{{
                $userdata->total_ucapan }}</div>
            <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs hidden"></div>
        </a>

        <a href="{{ route('profil') }}"
            class="inline-grid border-gray-200 w-full p-4 sm:col-span-2 md:col-span-1 order-first md:order-last bg-white hover:bg-slate-50 md:bg-transparent border-b md:border-0 md:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
            <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-pink-500">
                <div class="relative inline-flex ">
                    <div class="w-16 rounded-full">
                        @if (auth()->user()->image)
                        <img src="{{ asset('images/' . auth()->user()->image) }}" alt="Profile image">
                        @else
                        <img src="{{ asset('images/default.webp') }}" alt="Profile image">
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-gray-700 text-xl font-bold md:max-w-[10ch] md:text-ellipsis md:overflow-hidden">{{
                Auth::user()->name }}</div>
            <div class="col-start-1 whitespace-nowrap text-slate-500 my-2">VIP User</div>
            <div class="col-start-1 text-pink-500 whitespace-nowrap text-xs hidden"></div>
        </a>

    </div>
</div>

<div class="w-full md:max-w-[800px] mx-auto mb-10">
    <div class="card bg-white rounded-2xl p-5 shadow mt-10">
        <h1 class="font-bold text-2xl flex justify-center mb-10 mt-3 hidden">Data Pasangan</h1>
        <div class="flex items-center justify-between gap-5">
            <div class="flex p-4 rounded-2xl w-full">
                <div class="w-full">
                    <h3 class="font-medium text-lg text-gray-900 mb-8">Calon Pengantin Pria</h3>

                    <label class="block mb-3 text-sm text-gray-900">Nama</label>
                    <input type="text"
                        class="border border-gray-300 text-black text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="Rayya" disabled>

                    <label class="block mt-5 mb-3 text-sm text-gray-900">Bio</label>
                    <input type="text"
                        class="hidden border border-gray-300 text-black text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="Rayya" disabled>
                    <textarea id="message" rows="3" class="block p-2.5 w-full text-sm text-gray-900 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500" disabled>Ini bio</textarea>

                    <label class="block mt-5 mb-3 text-sm text-gray-900">Instagram</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 rounded-e-0 border-gray-300 rounded-s-md">
                            <svg class="w-5 h-5 text-gray-500" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
                                <g>
                                    <path
                                        d='M22,3H10a7,7,0,0,0-7,7V22a7,7,0,0,0,7,7H22a7,7,0,0,0,7-7V10A7,7,0,0,0,22,3Zm5,19a5,5,0,0,1-5,5H10a5,5,0,0,1-5-5V10a5,5,0,0,1,5-5H22a5,5,0,0,1,5,5Z'>
                                    </path>
                                    <path
                                        d='M16,9.5A6.5,6.5,0,1,0,22.5,16,6.51,6.51,0,0,0,16,9.5Zm0,11A4.5,4.5,0,1,1,20.5,16,4.51,4.51,0,0,1,16,20.5Z'>
                                    </path>
                                    <circle cx='23' cy='9' r='1'></circle>
                                </g>
                            </svg>
                        </span>
                        <input type="text"
                            class="border border-gray-300 text-black text-sm rounded-none rounded-e-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="Rayya" disabled>
                    </div>
                </div>
            </div>
            <div class="flex p-4 rounded-2xl w-full">
                <div class="w-full">
                    <h3 class="font-medium text-lg text-gray-900 mb-8">Calon Pengantin Wanita</h3>

                    <label class="block mb-3 text-sm text-gray-900">Nama</label>
                    <input type="text"
                        class="border border-gray-300 text-black text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="Rayya" disabled>

                    <label class="block mt-5 mb-3 text-sm text-gray-900">Bio</label>
                    <input type="text"
                        class="hidden border border-gray-300 text-black text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="Rayya" disabled>
                    <textarea id="message" rows="3" class="block p-2.5 w-full text-sm text-gray-900 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500" disabled>Ini bio</textarea>

                    <label class="block mt-5 mb-3 text-sm text-gray-900">Instagram</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 rounded-e-0 border-gray-300 rounded-s-md">
                            <svg class="w-5 h-5 text-gray-500" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
                                <g>
                                    <path
                                        d='M22,3H10a7,7,0,0,0-7,7V22a7,7,0,0,0,7,7H22a7,7,0,0,0,7-7V10A7,7,0,0,0,22,3Zm5,19a5,5,0,0,1-5,5H10a5,5,0,0,1-5-5V10a5,5,0,0,1,5-5H22a5,5,0,0,1,5,5Z'>
                                    </path>
                                    <path
                                        d='M16,9.5A6.5,6.5,0,1,0,22.5,16,6.51,6.51,0,0,0,16,9.5Zm0,11A4.5,4.5,0,1,1,20.5,16,4.51,4.51,0,0,1,16,20.5Z'>
                                    </path>
                                    <circle cx='23' cy='9' r='1'></circle>
                                </g>
                            </svg>
                        </span>
                        <input type="text"
                            class="border border-gray-300 text-black text-sm rounded-none rounded-e-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="Rayya" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection