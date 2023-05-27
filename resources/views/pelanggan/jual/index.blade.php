@extends('layouts.tk')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card card-dark card-outline">
                    <div class="card-header">Produk {{ auth()->user()->toko->nama_toko }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <a href="/pelanggan/jual/create" class="btn btn-dark mb-3">Create New produk</a>
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama produk</th>
                                        <th scope="col">Kode Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Kategori Sukucadang</th>
                                        <th scope="col">Toko</th>
                                        <th scope="col">Kondisi</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Berat</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produks as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->nama_produk }}</td>
                                            <td>{{ $produk->code }}</td>
                                            <td>{{ $produk->kategori->nama_kategori }}</td>
                                            <td>{{ $produk->sukucadang_id }}</td>
                                            <td>{{ $produk->toko_id }}</td>
                                            <td>{{ $produk->kondisi }}</td>
                                            <td>Rp{{ number_format($produk->harga) }}</td>
                                            <td>{{ $produk->qty }}</td>
                                            <td>{{ $produk->berat }}</td>
                                            <td>{{ $produk->deskripsi }}</td>
                                            <td><img src="{{ asset('storage/' . $produk->image) }}"
                                                    alt="{{ $produk->nama_produk }}" style="max-width: 100px"></td>
                                            <td>

                                                <a href="/pelanggan/jual/{{ $produk->id }}/edit"
                                                    class="badge bg-warning">
                                                    <span data-feather="edit"></span></a>

                                                <form action="/pelanggan/jual/{{ $produk->id }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger border-0"
                                                        onclick="return confirm('Are You Sure?')">
                                                        <span data-feather="x-circle"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
