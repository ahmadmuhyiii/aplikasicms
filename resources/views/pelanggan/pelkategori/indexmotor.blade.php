@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <p> Kategori /</p>

                <div class="container">
                    <div class="row ">
                        @foreach ($motors as $motor)
                            <div class="card mb-3" style="max-width: 270px;">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <img src="{{ asset('storage/' . $motor->image) }}" class="img-fluid rounded-start"
                                            alt="{{ $motor->nama_merk }}">
                                    </div>
                                    <div class="col-md-8 mt-0">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $motor->nama_merk }}</h5> <br />
                                            <a href="{{ route('pelkategori.index2', $motor->id) }}" class="btn btn-dark"
                                                style=" font-size:10px">Lihat Produk</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
