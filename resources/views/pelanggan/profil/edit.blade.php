@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Profil Saya</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{ route('profil.update', $user->id) }} --}}
                        <div class="col-lg-8">
                            <form action="/pelanggan/profil/{{ $user->id }}" method="post" class="mb-5"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama User</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" readonly value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"> Image User</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image"
                                                id="exampleInputFile" />
                                            <label for="exampleInputFile" class="custom-file-label">choose image</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="input-group-append">
                                    <button type="submit">Upload</button>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="image" class="form-label">Profil Image</label>
                                    <input type="hidden" name="oldImage" value="{{ $user->image }}">
                                    @if ($user->image)
                                        <img src="{{ asset('storage/' . $user->image) }}"
                                            class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

                                {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
                            </form>
                        </div>
                        {{-- <script>
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
                        </script> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
