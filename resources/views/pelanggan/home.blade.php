@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-dark ">
                    <div class="card-header">
                        <h3 class="card-title"> Sistem Informasi Pasar (Marketplace) Sparepart Motor Classic Berbasis Website
                        </h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ __('User You are logged in!') }}
                            </div>
                        @endif

                        {{-- carousel --}}
                        <div class="row justify-content-center">
                            <div class="col-sm-8 col-md-7 justify-content-center"></div>
                            <div id="carouselExampleControls" class="carousel slide" style="justify-content:center"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img style="width:600px;height:400px;" src="/img/cb100.jpg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item ">
                                        <img style="width:600px;height:400px;" src="/img/honda_nsr_150_rr.jpg"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item ">
                                        <img style="width:600px;height:400px;" src="/img/rxking.jpg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item ">
                                        <img style="width:600px;height:400px;" src="/img/Suzuki.jpg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item ">
                                        <img style="width:600px;height:400px;" src="/img/HondaC70.jpg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item ">
                                        <img style="width:600px;height:400px;" src="/img/vespa.jpg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item ">
                                        <img style="width:600px;height:400px;" src="/img/100.jpg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item ">
                                        <img style="width:600px;height:400px;" src="/img/ninja2.png" class="d-block w-100"
                                            alt="...">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



            <!-- right column -->
            <div class="col-md-6">
                <!-- Form Element sizes -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Rekomendasi Barang Yang sering Dilihat</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                @foreach ($produks as $produk)
                                    <div class="col-md-4 mb-3">
                                        <div class="card h-70">
                                            <img src="{{ asset('storage/' . $produk->image) }}" class="img-fluid mt-0"
                                                alt="{{ $produk->nama_produk }}" style="width:250px;height:230px;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $produk->nama_produk }}</h5><br />
                                                <h5 class="card-title">Rp.{{ number_format($produk->harga) }}</h5>
                                                <br /><br />
                                                {{-- <p class="card-text">Kategori:{{ $produk->kategori->nama_kategori }}</p> --}}
                                                <form
                                                    action="{{ route('pelproduk.update', [$produk->id, $produk->nama_produk]) }}"
                                                    method="POST" class="d-inline">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="view" id="view"
                                                        value="{{ $produk->view + 1 }}">
                                                    <button class="badge bg-success border-0">
                                                        <span data-feather="eye"></span>Lihat Produk</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>

        {{-- Colom Toko
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Form Element sizes -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Toko Yang tersedia</h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    @foreach ($tokos as $toko)
                                        <div class="col-md-4 mb-3">
                                            <div class="card h-70">
                                                <img src="{{ asset('storage/' . $toko->image) }}" class="img-fluid mt-0"
                                                    alt="{{ $toko->nama_toko }}" style="width:250px;height:230px;">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $toko->nama_toko }}</h5><br />
                                                    <a href="/pelanggan/pelproduk/{{ $produk->id }}"
                                                        class="btn btn-primary">Lihat
                                                        Toko</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div> --}}
    @endsection
