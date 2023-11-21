@extends('layouts.app')
@section('judul')
<span class="title-animation">Buat</span>
@endsection
@section('content')
<div class="flex flex-row justify-center pt-10">
    <div class="max-w-[800px] mx-auto">
        <div class="flex flex-col bg-white m-auto p-2 rounded-2xl mb-5 shadow">
            <h1 class="flex py-5 lg:px-20 md:px-10 px-5 mx-auto font-bold text-2xl text-gray-800">
                Temukan Pilihan Anda
            </h1>
            <div class="flex overflow-x-scroll pb-5">
                <div class="flex flex-nowrap mx-10 snap-x snap-mandatory overflow-x-auto">
                    <!-- For Each -->
                    @foreach ($template as $t)
                    <div class="my-5 snap-center px-3">
                        <div class="flex font-sans w-[500px]">
                            <div class="flex-none w-56 relative scale-105 -rotate-1">
                                <img src="{{ asset('images/template/' . $t->image) }}" alt=""
                                    class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
                            </div>
                            <form class="flex-auto p-6 bg-white rounded-e-2xl shadow">
                                <div class="flex flex-wrap">
                                    <h1 class="flex-auto font-medium text-xl text-slate-900">
                                        {{ $t->name }}
                                    </h1>
                                    <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
                                        Rp{{ $t->price }}
                                    </div>
                                </div>
                                <p class="mt-4 text-sm text-slate-500">
                                    {{ $t->desc }}
                                </p>
                                <div class="flex items-baseline mb-6 pb-6 border-b border-slate-200">

                                </div>
                                <div class="flex space-x-4 mb-5 text-sm font-medium">
                                    <div class="flex-auto flex space-x-4">
                                        <button class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white" type="submit">
                                            Beli
                                        </button>
                                        <button class="h-10 px-6 font-semibold rounded-full border border-slate-200 text-slate-900"
                                            type="button">
                                            Wish
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    <!-- End For Each -->
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection