@extends('layouts.app')

@section('judul')
<span class="title-animation">Profil</span>
@endsection

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full md:w-1/2">
            <div class="card bg-white rounded-lg p-4 shadow mt-10">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        @if (auth()->user()->image)
                        <img src="{{ asset('images/' . auth()->user()->image) }}" class="w-10 h-10 rounded-full"
                            alt="Profile image">
                        @else
                        <img src="{{ asset('images/default.jpg') }}" class="w-10 h-10 rounded-full" alt="Profile image">
                        @endif
                    </div>
                    <div class="flex-grow ml-4">
                        <h1 class="text-xl font-bold">{{ Auth::user()->name }}</h1>
                        <p class="text-sm">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <form id="uploadForm" action="{{ route('profil') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-4">
                        <label for="image" class="text-sm font-medium">Upload Image</label>
                        <input type="file" name="image" id="image"
                            class="w-full py-2 px-3 rounded-lg border focus:outline-none focus:ring focus:border-blue-300">
                        @error('image')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </form>

                <div class="form-group mt-4">
                    <button id="uploadButton" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('uploadButton').addEventListener('click', function () {
    const fileInput = document.getElementById('image');
    const file = fileInput.files[0];

    if (file) {
        // Membuat objek URL untuk gambar yang akan diunggah
        const imageUrl = URL.createObjectURL(file);

        // Menampilkan konfirmasi SweetAlert dengan gambar
        Swal.fire({
            title: 'Anda yakin ingin mengunggah gambar ini?',
            imageUrl: imageUrl,  // Menambahkan gambar ke dalam pesan
            imageAlt: 'Gambar yang akan diunggah',
            imageHeight: 75,  // Sesuaikan tinggi gambar sesuai kebutuhan
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('uploadForm').submit();
            }
        });
    } else {
        Swal.fire({
            title: 'Anda harus memilih gambar terlebih dahulu.',
            icon: 'warning',
        });
    }
});
</script>
@endsection