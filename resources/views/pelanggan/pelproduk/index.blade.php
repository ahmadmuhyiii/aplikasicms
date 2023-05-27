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

                <div class="row justify-content-center mb-3">
                    <div class="col-md-6">
                        <h5 class="text-center display-5">Semua Produk</h5>
                        <form action="{{ route('pelproduk.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control form-control-lg"
                                    placeholder="Cari Nama Barang.." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-md btn-default">
                                        <span data-feather="search"></span>Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



                {{-- @if ($produk->count())
                    <div class="card mb-4">
                        <div style="max-height: 100px; overflow:hidden"><img
                                src="{{ asset('storage/' . $produk[0]->image) }}" class="card-img-top"
                                alt="{{ $produk[0]->nama_produk }}"></div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $produk[0]->nama_produk }}</h5>
                            <h3 class="card-text">Rp.{{ number_format($produk[0]->harga) }}</h3>
                            <p class="card-text"><small
                                    class="text-muted">{{ $produk[0]->created_at->diffForHumans() }}</small>
                            </p>

                            <form action="{{ route('pelproduk.update', $produk[0]->id) }}" method="POST" class="d-inline">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="view" id="view" value="{{ $produk[0]->view + 1 }}">
                                <button class="badge bg-success border-0">
                                    <span data-feather="eye"></span>Lihat Produk</button>
                            </form>
                        </div>
                    </div>
                @endif --}}
                @if ($produks->all())
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($produks as $produk)
                                @if ($produk->qty > 0)
                                    <div class="col-md-2 mb-1">
                                        <div class="card h-70">
                                            <img src="{{ asset('storage/' . $produk->image) }}" class="img-fluid mt-0"
                                                alt="{{ $produk->nama_produk }}" style="width:200px;height:170px;">
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

                                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-id="{{ $produk->id }}" data-namapro="{{ $produk->nama_produk }}"
                                            data-view="{{ $produk->view }}" data-bs-target="#edit">lihat produk
                                            langsung
                                        </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
@else
    <p class="text-center fs-4">No Produk Found</p>
    @endif

    <div class="d-flex justify-content-center">{{ $produks->links() }}</div>
@endsection
