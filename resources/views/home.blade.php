@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Beranda</span>
@endsection
@section('content')
<div class="flex flex-row justify-center py-10">
    <div
        class="inline-grid sm:grid-cols-2 md:grid-cols-3 overflow-hidden w-9/12 md:w-fit rounded-3xl bg-transparent md:bg-white shadow">

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
            <div class="col-start-1 whitespace-nowrap text-slate-500">Total Likes</div>
            <div class="col-start-1 text-blue-600 whitespace-nowrap text-4xl font-extrabold my-2">25.6K</div>
            <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs">21% more than last month</div>
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
            <div class="col-start-1 whitespace-nowrap text-slate-500">Page Views</div>
            <div class="col-start-1 text-pink-500 whitespace-nowrap text-4xl font-extrabold my-2">2.6M</div>
            <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs">21% more than last month</div>
        </a>

        <a href="#"
            class="inline-grid border-gray-200 w-full p-4 sm:col-span-2 md:col-span-1 order-first md:order-last bg-white hover:bg-slate-50 md:bg-transparent border-b md:border-0 md:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
            <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-pink-500">
                <div class="relative inline-flex ">
                    <div class="w-16 rounded-full">
                        @if (auth()->user()->image)
                        <img src="{{ asset('images/' . auth()->user()->image) }}"
                            alt="Profile image">
                        @else
                        <img src="{{ asset('images/default.jpg') }}" alt="Profile image">
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-xl font-bold">{{ Auth::user()->name }}</div>
            <div class="col-start-1 whitespace-nowrap text-slate-500 my-2">Student</div>
            <div class="col-start-1 text-pink-500 whitespace-nowrap text-xs">21% more than last month</div>
        </a>

    </div>
</div>

@endsection