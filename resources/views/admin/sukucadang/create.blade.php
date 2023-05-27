@extends('layouts.adm')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Create New Kategori Sukucadang</h3>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/sukucadang" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_sukucadang" class="form-label">Nama Kategori Sukucadang</label>
                <input type="text" class="form-control @error('nama_sukucadang') is-invalid @enderror" id="nama_sukucadang"
                    name="nama_sukucadang" required autofocus value="{{ old('nama_sukucadang') }}">
                @error('nama_sukucadang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image Sukucadang</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Kategori Sukucadang</button>
        </form>
    </div>


    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
