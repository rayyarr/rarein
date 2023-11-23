@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Beranda</span>
@endsection
@section('content')
<div class="flex flex-row pt-8 px-10">
    <h1 class="text-2xl font-bold text-gray-700">Selamat datang kembali, {{ Auth::user()->name }}!</h1>
</div>
@endsection