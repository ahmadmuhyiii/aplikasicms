@extends('layouts.tk')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Toko</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-lg-8">
                            <form action="/pelanggan/toko/{{ $toko->id }}" method="post" class="mb-5"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_toko" class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control @error('nama_toko') is-invalid @enderror"
                                        id="nama_toko" name="nama_toko" required
                                        value="{{ old('nama_toko', $toko->nama_toko) }}">
                                    @error('nama_toko')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Toko Image</label>
                                    <input type="hidden" name="oldImage" value="{{ $toko->image }}">
                                    @if ($toko->image)
                                        <img src="{{ asset('storage/' . $toko->image) }}"
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
                                <div class="mb-3">
                                    <label for="image2" class="form-label">Image KTP</label>
                                    <input type="hidden" name="oldImage" value="{{ $toko->image2 }}">
                                    @if ($toko->image2)
                                        <img src="{{ asset('storage/' . $toko->image2) }}"
                                            class="img-preview2 img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                        <img class="img-preview2 img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input class="form-control @error('image2') is-invalid @enderror" type="file"
                                        id="image2" name="image2" onchange="previewImage2()">
                                    @error('image2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">Nomer Induk Kependudukan</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" required value="{{ old('nik', $toko->nik) }}">
                                    @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" required value="{{ old('email', $toko->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                        id="no_telp" name="no_telp" required
                                        value="{{ old('no_telp', $toko->no_telp) }}">
                                    @error('no_telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_rek" class="form-label">Nomor Rekening</label>
                                    <input type="text" class="form-control @error('nomor_rek') is-invalid @enderror"
                                        id="nomor_rek" name="nomor_rek" required
                                        value="{{ old('nomor_rek', $toko->nomor_rek) }}">
                                    @error('nomor_rek')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="province_id" class="form-label">Provinsi </label>
                                    <select class="form-select" name="province_id">
                                        <option value="" holder>Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">
                                                {{ $province->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="city_id" class="form-label">Kota </label>
                                    <select class="form-select" name="city_id">
                                        <option value="" holder>Pilih City</option>
                                        @foreach ($citys as $city)
                                            <option value="{{ $city->id }}">
                                                {{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" required value="{{ old('alamat', $toko->alamat) }}">
                                    @error('alamat')
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

                            function previewImage2() {
                                const image2 = document.querySelector('#image2');
                                const imgPreview = document.querySelector('.img-preview2');

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
