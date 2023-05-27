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


                <div class="container">
                    <div class="row justify-content-center">
                        <p>{{ $kategoris->nama_kategori }} / {{ $sukucadangs->nama_sukucadang }}</p>
                        @foreach ($produks as $produk)
                            @if ($produks->all())
                                @if ($produk->kategori_id == $kategoris->id)
                                    @if ($produk->sukucadang_id == $sukucadangs->id)
                                        @if ($produk->qty > 0)
                                            <div class="col-md-3 mb-2">
                                                <div class="card h-70">
                                                    <img src="{{ asset('storage/' . $produk->image) }}"
                                                        class="img-fluid mt-0" alt="{{ $produk->nama_produk }}"
                                                        style="width:260px;height:230px;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $produk->nama_produk }}</h5><br />
                                                        <h5 class="card-title">Rp.{{ number_format($produk->harga) }}</h5>
                                                        <br /><br />
                                                        {{-- <p class="card-text">Kategori:{{ $produk->kategori->nama_kategori }}</p> --}}
                                                        <a href="{{ route('pelproduk.show', $produk->id) }}"
                                                            class="btn btn-dark">Lihat
                                                            Produk</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    @endif
                                @endif
                            @else
                                <p class="text-center fs-4">No Produk Found</p>
                            @endif
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
