@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Tambah Template</span>
@endsection
@section('content')
<div class="flex flex-row justify-center py-10">

    <div class="max-w-[800px] mx-auto">
        <div class="flex flex-col bg-white m-auto p-2 rounded-2xl mb-5 shadow">
            <h1 class="flex py-5 lg:px-20 md:px-10 px-5 mx-auto font-bold text-2xl text-gray-800">
                Tambah Template
            </h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <p class="flex justify-center py-5 px-5 mx-auto text-md text-gray-800">
                    Whoops! There were some problems with your input.<br><br>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </p>
            </div>
            @endif
            
            <div class="flex overflow-x-scroll pb-5">
                <div class="flex flex-nowrap mx-10 snap-x snap-mandatory overflow-x-auto">

                    <form action="{{ route('template.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="my-5 snap-center px-3">
                        <div class="flex font-sans max-w-[500px]">
                            <div class="flex-none w-44 md:w-56 relative bg-gray-50 rounded-s-2xl">
                                    <label for="uploadInput" class="flex flex-col justify-center items-center text-center cursor-pointer h-full z-100">
                                        <svg class='fill-none stroke stroke-1 stroke-black w-[50px] h-[50px]' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) translate(2.000000, 2.000000)'><line x1='19.791' y1='10.1207' x2='7.75' y2='10.1207'></line><polyline points='16.8643 7.2047 19.7923 10.1207 16.8643 13.0367'></polyline><path d='M0.2588,5.6299 C0.5888,2.0499 1.9288,0.7499 7.2588,0.7499 C14.3598,0.7499 14.3598,3.0599 14.3598,9.9999 C14.3598,16.9399 14.3598,19.2499 7.2588,19.2499 C1.9288,19.2499 0.5888,17.9499 0.2588,14.3699' transform='translate(7.309300, 9.999900) scale(-1, 1) translate(-7.309300, -9.999900) '></path></g></svg>
                                        <input id="uploadInput" type="file" class="hidden" accept=".png, .jpg, .jpeg, .gif" name="image" />
                                        <span class="mt-2 text-sm">Upload Foto</span>
                                    </label>
                            
                                <img id="uploadedImage" src="" alt="" class="hidden absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
                                <script>
                                    const uploadInput = document.getElementById('uploadInput');
                                    const uploadedImage = document.getElementById('uploadedImage');
                                    
                                    uploadInput.addEventListener('change', (event) => {
                                        const file = event.target.files[0];
                                
                                        if (file && /\.(png|jpg|jpeg|gif)$/i.test(file.name)) {
                                            const reader = new FileReader();
                                
                                            reader.onload = function (e) {
                                                uploadedImage.src = e.target.result;
                                            };
                                
                                            reader.readAsDataURL(file);
                                            uploadedImage.classList.remove("hidden");
                                        } else {
                                            // File tidak valid, tambahkan penanganan kesalahan di sini
                                            alert('File harus berupa gambar dengan format PNG, JPG, JPEG, atau GIF.');
                                            uploadInput.value = ''; // Membersihkan nilai input
                                        }
                                    });
                                </script>
                            </div>
                            
                            <div class="flex-auto p-6 bg-white rounded-e-2xl shadow">
                                <div class="flex flex-wrap">
                                    <h1 class="flex-auto font-medium text-xl text-slate-900">
                                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Template" name="name" required>
                                    </h1>
                                    <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
                                        <div class="flex gap-5">
                                            <span>Rp</span>
                                            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="000" name="price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex items-baseline mb-6 pb-6 border-b border-slate-200">
                                    <textarea rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Deskripsi Template" name="desc"></textarea>
                                </div>
                                <div class="flex space-x-4 mb-5 text-sm font-medium">
                                    <div class="flex-auto flex space-x-4">
                                        <button type="submit" class="h-10 px-8 font-semibold rounded-full bg-violet-600 border text-white hover:bg-transparent hover:border-slate-200 hover:text-slate-900 transition" type="submit">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    
                </div>
            </div>
        </div>
    </div>

    {{--
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Template</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('template.index') }}"> Back</a>
            </div>
        </div>
    </div>
    --}}

    {{-- 

    <form action="{{ route('template.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="text" name="image" class="form-control" placeholder="Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    --}}

</div>

@endsection