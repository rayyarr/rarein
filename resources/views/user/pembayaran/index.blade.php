@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Pembayaran Undangan</span>
@endsection
@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">

                    <div class="overflow-hidden mb-6">
                        <table class="min-w-full w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Nama Template
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Tanggal Pemesanan
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Jumlah Tagihan
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran as $d)
                                <tr class="border-b">
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        {{ $d->nama_template }}
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        {{-- \Carbon\Carbon::parse($d->tanggal_pemesanan)->format('Y-m-d') --}}
                                        {{ \Carbon\Carbon::parse($d->tanggal_pemesanan)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        {{ "Rp" . number_format($d->jumlah_tagihan,2,',','.') }}
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        @if ($d->metode_pembayaran != NULL && $d->gambar != NULL)
                                            Proses
                                        @else
                                            {{ $d->status }}
                                        @endif
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('pembayaran.proses') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $d->id }}">
                                            <button type="submit" class="@if ($d->metode_pembayaran != NULL && $d->gambar != NULL) cursor-not-allowed @endif inline-flex items-center px-6 py-2 bg-gray-800 border border-transparent text-xs rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150">
                                                Bayar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection