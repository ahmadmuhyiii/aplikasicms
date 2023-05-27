@extends('layouts.adm')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Create New Kategori</h3>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/kategori" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori"
                    name="nama_kategori" required autofocus value="{{ old('nama_kategori') }}">
                @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="motor_id" class="form-label">Merk Motor</label>
                <select class="form-select" name="motor_id">
                    @foreach ($motors as $motor)
                        @if (old('motor_id') == $motor->id)
                            <option value="{{ $motor->id }}" selected>
                                {{ $motor->nama_merk }}
                            </option>
                        @else
                            <option value="{{ $motor->id }}">{{ $motor->nama_merk }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                    name="tahun" required value="{{ old('tahun') }}">
                @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Kategori Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Kategori</button>
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
