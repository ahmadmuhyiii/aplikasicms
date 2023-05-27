@extends('layouts.tk')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Produk Saya</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-lg-8">
                            <form method="post" action="/pelanggan/jual" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                        id="nama_produk" name="nama_produk" required autofocus
                                        value="{{ old('nama_produk') }}">
                                    @error('nama_produk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="code" class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                        id="code" name="code" required autofocus value="{{ old('code') }}">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kategori_id" class="form-label">Id Kategori</label>
                                    <select class="form-select" name="kategori_id">
                                        @foreach ($kategoris as $kategori)
                                            @if (old('kategori_id') == $kategori->id)
                                                <option value="{{ $kategori->id }}" selected>{{ $kategori->nama_kategori }}
                                                </option>
                                            @else
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sukucadang_id" class="form-label">Id Kategori Sukucadang</label>
                                    <select class="form-select" name="sukucadang_id">
                                        @foreach ($sukucadangs as $sukucadang)
                                            @if (old('sukucadang_id') == $sukucadang->id)
                                                <option value="{{ $sukucadang->id }}" selected>
                                                    {{ $sukucadang->nama_sukucadang }}
                                                </option>
                                            @else
                                                <option value="{{ $sukucadang->id }}">{{ $sukucadang->nama_sukucadang }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="toko_id" class="form-label"></label>
                                    <input type="hidden" class="form-control @error('toko_id') is-invalid @enderror"
                                        id="toko_id" name="toko_id" required value="{{ auth()->user()->toko->id }}">
                                </div>
                                <div class="mb-3"><br>
                                    <div class="form-group"><label for="kondisi" class="form-label">Kondisi</label>
                                        <select name="kondisi" id="" class="form-select">
                                            <option value="" holder>Pilih Kondisi</option>
                                            <option value="Baru" holder>Baru</option>
                                            <option value="Bekas" holder>Bekas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                        id="harga" name="harga" required value="{{ old('harga') }}">
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small>Penulisan Harga (500000) tanpa titik.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="text" class="form-control @error('qty') is-invalid @enderror"
                                        id="qty" name="qty" required value="{{ old('qty') }}">
                                    @error('qty')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="berat" class="form-label">Berat</label>
                                    <input type="text" class="form-control @error('berat') is-invalid @enderror"
                                        id="berat" name="berat" required value="{{ old('berat') }}">
                                    @error('berat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <Small>Dalam Gram (1700 atau 1,7kg)</Small>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                        id="deskripsi" name="deskripsi" required value="{{ old('deskripsi') }}">
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Produk Image</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Create Produk</button>
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
