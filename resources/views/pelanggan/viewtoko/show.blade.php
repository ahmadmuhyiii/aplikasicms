@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-9">


                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $produks->getToko->image) }}" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2>{{ $produks->getToko->nama_toko }} <a class="btn btn-warning"
                                        href="{{ route('chat.show', $produks->getToko->user->id) }}">Chat
                                        Toko</a></h2>
                                <p class="card-text mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                                        <path fill-rule="evenodd"
                                            d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                                    </svg> &nbsp&nbsp{{ $produks->getToko->alamat }}</p>
                                <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg>&nbsp&nbsp{{ $produks->getToko->no_telp }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        @foreach ($produk as $produk)
                            @if ($produk->toko_id == $toko->id)
                                <div class="col-md-2 mb-1">
                                    <div class="card h-70">
                                        <img src="{{ asset('storage/' . $produk->image) }}" class="img-fluid mt-0"
                                            alt="{{ $produk->nama_produk }}" style="width:200px;height:170px;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $produk->nama_produk }}</h5><br />
                                            <h5 class="card-title">Rp.{{ number_format($produk->harga) }}</h5><br /><br />
                                            {{-- <p class="card-text">Kategori:{{ $produk->kategori->nama_kategori }}</p> --}}

                                            <form action="{{ route('pelproduk.update', $produk->id) }}" method="POST"
                                                class="d-inline">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="view" id="view"
                                                    value="{{ $produk->view + 1 }}">
                                                <button class="badge bg-success border-0">
                                                    <span data-feather="eye"></span>Lihat Produk</button>
                                            </form>

                                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-id="{{ $produk->id }}" data-namapro="{{ $produk->nama_produk }}"
                                            data-view="{{ $produk->view }}" data-bs-target="#edit">lihat produk
                                            langsung
                                        </button> --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
