@extends('layouts.plg')

@section('content')
    <div class="container">
        <div class="row ">
            <p>{{ $kategoris->nama_kategori }} /</p>
            @foreach ($sukucadangs as $sukucadang)
                <div class="card mb-3" style="max-width: 270px;">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <img src="{{ asset('storage/' . $sukucadang->image) }}" class="img-fluid rounded-start"
                                alt="{{ $sukucadang->nama_sukucadang }}">
                        </div>
                        <div class="col-md-8 mt-0">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sukucadang->nama_sukucadang }}</h5> <br />
                                <a href="{{ route('pelkategori.indexsukucadang', ['kategori' => $kategoris, 'sukucadang' => $sukucadang]) }}"
                                    class="btn btn-primary" style=" font-size:10px">Lihat Produk</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            <br /><br />
        </div>
    </div>




    <div class="container">
        <div class="row justify-content-center">
            <h4 style="text-align: center;">Semua Produk {{ $kategoris->nama_kategori }}</h4> <br />
            @foreach ($produks as $produk)
                @if ($produk->kategori_id == $kategoris->id)
                    @if ($produk->qty > 0)
                        <div class="col-md-3 mb-2">
                            <div class="card h-70">
                                <img src="{{ asset('storage/' . $produk->image) }}" class="img-fluid mt-0"
                                    alt="{{ $produk->nama_produk }}" style="width:260px;height:230px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produk->nama_produk }}</h5><br />
                                    <h5 class="card-title">Rp.{{ number_format($produk->harga) }}</h5><br /><br />
                                    {{-- <p class="card-text">Kategori:{{ $produk->kategori->nama_kategori }}</p> --}}
                                    <a href="{{ route('pelproduk.show', $produk->id) }}" class="btn btn-dark">Lihat
                                        Produk</a>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                @endif
            @endforeach
        </div>
    </div>
@endsection
