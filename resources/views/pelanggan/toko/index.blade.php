@extends('layouts.tk')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-7">
                <div class="card card-dark card-outline">
                    @if (auth()->user()->toko === null)
                        <button type="button" class="btn btn-primary">
                            Buat Akun Toko</button>
                    @elseif (auth()->user()->toko->id != null)
                    @endif
                    <div class="card-body box-profile">

                        @foreach ($tokos as $toko)
                            @if ($toko->user_id == Auth::user()->id)
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('storage/' . $toko->image) }}" alt="{{ $toko->image }}">
                                </div>

                                <h3 class="profile-username text-center">{{ $toko->nama_toko }}</h3>

                                <p class="text-muted text-center">Toko</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nama Toko:</b> <a class="float-right">{{ $toko->nama_toko }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Foto KTP:</b> <a class="float-right"><img class="profile-user-img img-fluid"
                                                src="{{ asset('storage/' . $toko->image2) }}" alt="{{ $toko->image2 }}"></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nomor Induk KTP:</b> <a class="float-right">{{ $toko->nik }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $toko->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No Telepon</b> <a class="float-right">{{ $toko->no_telp }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nomor Rekening</b> <a class="float-right">{{ $toko->nomor_rek }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Provinsi</b> <a class="float-right">{{ $toko->province_id }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Kota</b> <a class="float-right">{{ $toko->city_id }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>alamat</b> <a class="float-right">{{ $toko->alamat }}</a>
                                    </li>
                                </ul>

                                <a href="/pelanggan/toko/{{ $toko->id }}/edit" class="btn btn-dark btn-block"><span
                                        data-feather="edit"></span><b>Edit</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
