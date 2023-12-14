@extends('layouts.app')
@section('judul')
<span class="title-animation">Lengkapi Formulir</span>
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/pasangan.css') }}">

<div class="w-full max-w-[700px] mx-auto mt-10 bg-white rounded-[5px] shadow py-4 px-6">
    <ol class="flex items-center w-full space-x-2 text-base font-medium text-center text-gray-500 sm:space-x-6">
        <li class="flex items-center">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-gray-500 rounded-full shrink-0">
                1
            </span>
            Mulai
        </li>
        <li class="flex items-center">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-gray-500 rounded-full shrink-0">
                2
            </span>
            Data <span class="hidden sm:inline-flex sm:ms-1">Pasangan</span>
        </li>
        <li class="flex items-center text-blue-600">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-blue-600 rounded-full shrink-0">
                3
            </span>
            Lokasi Acara
        </li>
    </ol>
</div>

<div class="container-cus mx-auto mt-5 shadow">
    <form method="POST" action="{{ route('setup.store') }}">
        @csrf
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3" role="alert">
            <strong class="font-bold">Validation Error</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
        </div>
        @endif
        <div class="content-cus">
            <div class="flex flex-col items-center justify-center">
                <h2 class="font-bold text-xl text-black mb-5">LOKASI ACARA</h2>
            </div>
            <div class="user-details flex-col !gap-4">
                <div class="input-box">
                    <span class="details">Tempat Akad</span>
                    <input type="text" name="tempat_akad" placeholder="e.g. Hotel 1"
                        value="{{ $dataAcara->tempat_akad ?? '' }}" required>
                </div>
                <div class="input-box">
                    <span class="details">Tempat Resepsi</span>
                    <input type="text" name="tempat_resepsi" placeholder="e.g. Hotel 2"
                    value="{{ $dataAcara->tempat_resepsi }}" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Lanjut">
            </div>
        </div>
    </form>
</div>
@endsection