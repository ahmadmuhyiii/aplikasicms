@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card card-dark card-outline">
                    <div class="card-header">Keranjang {{ Auth::user()->name }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                {{-- <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Produk id</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead> --}}
                                @if ($keranjangs->all())
                                    <tbody>
                                        @foreach ($keranjangs as $keranjang)
                                            @if ($keranjang->user_id == Auth::user()->id)
                                                <tr>
                                                    <td><img src="{{ asset('storage/' . $keranjang->getProduk->image) }}"
                                                            alt="{{ $keranjang->getProduk->image }}"
                                                            style="max-width: 100px">
                                                    </td>
                                                    <td>Total : Rp.{{ number_format($keranjang->subtotal) }}</td>
                                                    {{-- <td>{{ $keranjang->produk_id }}</td> --}}
                                                    <td>Produk : {{ $keranjang->getProduk->nama_produk }}</td>
                                                    <td>Quantity : {{ $keranjang->qty }}</td>

                                                    <td>

                                                        <a href="/pelanggan/keranjang/{{ $keranjang->id }}/edit"
                                                            class="badge bg-warning">
                                                            <span data-feather="edit"></span>Edit</a>
                                                        <form action="/pelanggan/keranjang/{{ $keranjang->id }}"
                                                            method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="badge bg-danger border-0"
                                                                onclick="return confirm('Are You Sure?')">
                                                                <span data-feather="x-circle"></span>Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @if ($keranjangs != null)
                                            <a href="{{ route('transaksi.create') }}" class=" float-lg-right badge bg-dark">
                                                <span data-feather="shopping-bag"></span>Check Out</a>
                                        @elseif ($keranjangs == null)
                                            <a href="{{ route('pelproduk.index') }}"
                                                class=" float-lg-right badge bg-success">
                                                <span data-feather="shopping-cart"></span>Lihat Produk</a>
                                        @endif
                                    </tbody>
                                @else
                                    <p class="text-center fs-4">Tidak Ada Produk di Keranjang</p>
                                @endif

                            </table>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
