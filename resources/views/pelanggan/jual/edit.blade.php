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
                            <form action="/pelanggan/jual/{{ $produk->id }}" method="post" class="mb-5"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                        id="nama_produk" name="nama_produk" required
                                        value="{{ old('nama_produk', $produk->nama_produk) }}">
                                    @error('nama_produk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="code" class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                        id="code" name="code" required value="{{ old('code', $produk->code) }}">
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
                                    <label for="kondisi" class="form-label">Kondisi</label>
                                    <select class="form-select" name="kondisi">
                                        <option value="">Pilih Kondisi</option>
                                        <option value="Baru" @if (old('kondisi', $produk->kondisi) == 'Baru') selected @endif>Baru
                                        </option>
                                        <option value="Bekas" @if (old('kondisi', $produk->kondisi) == 'Bekas') selected @endif>Bekas
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                        id="harga" name="harga" required value="{{ old('harga', $produk->harga) }}">
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="text" class="form-control @error('qty') is-invalid @enderror"
                                        id="qty" name="qty" required value="{{ old('qty', $produk->qty) }}">
                                    @error('qty')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="berat" class="form-label">Berat</label>
                                    <input type="text" class="form-control @error('berat') is-invalid @enderror"
                                        id="berat" name="berat" required value="{{ old('berat', $produk->berat) }}">
                                    @error('berat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                        id="deskripsi" name="deskripsi" required
                                        value="{{ old('deskripsi', $produk->deskripsi) }}">
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Produk Image</label>
                                    <input type="hidden" name="oldImage" value="{{ $produk->image }}">
                                    @if ($produk->image)
                                        <img src="{{ asset('storage/' . $produk->image) }}"
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
