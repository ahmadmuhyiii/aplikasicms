@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Keranjang </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-lg-8">
                            <form action="/pelanggan/keranjang/{{ $keranjang->id }}" method="post" class="mb-5"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="image" class="form-label">Produk Image</label>
                                    @if ($keranjang->getProduk->image)
                                        <img src="{{ asset('storage/' . $keranjang->getProduk->image) }}"
                                            class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @endif
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                        id="nama_produk" name="nama_produk" required readonly
                                        value="{{ $keranjang->getProduk->nama_produk }}">
                                    @error('nama_produk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="number" class="form-control @error('qty') is-invalid @enderror"
                                        id="qty" name="qty" required value="{{ old('qty', $keranjang->qty) }}">
                                    @error('qty')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Update</button>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
