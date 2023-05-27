@extends('layouts.adm')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Produk</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="/produkpdf" class="btn btn-primary mb-3" target="_blank">CETAK
                            PDF</a>

                        <div class="row justify-content-end">
                            <div class="col-md-5 mb-3">
                                <form action="{{ route('produk.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ request('search') }}">
                                </form>
                            </div>
                        </div>


                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Nama Produk</th>
                                    <th>Kode Produk</th>
                                    <th>Kategori Id</th>
                                    <th>Kategori Sukucadang</th>
                                    <th>Toko Id</th>
                                    <th>Kondisi</th>
                                    <th>Harga</th>
                                    <th>Quantity</th>
                                    <th>Berat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $produk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/' . $produk->image) }}"
                                                alt="{{ $produk->nama_produk }}" style="max-width: 100px"></td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->code }}</td>
                                        <td>{{ $produk->kategori->nama_kategori }}</td>
                                        <td>{{ $produk->Getsukucadang->nama_sukucadang }}</td>
                                        <td>{{ $produk->toko_id }}</td>
                                        <td>{{ $produk->kondisi }}</td>
                                        <td>{{ $produk->harga }}</td>
                                        <td>{{ $produk->qty }}</td>
                                        <td>{{ $produk->berat }}</td>

                                        <td>
                                            <a href="" class="badge bg-info">
                                                <span data-feather="eye"></span></a>
                                            <a href="/admin/produk/{{ $produk->id }}/edit" class="badge bg-warning">
                                                <span data-feather="edit"></span></a>

                                            <form action="/admin/produk/{{ $produk->id }}" method="POST"
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
                        <div class="d-flex justify-content-center mt-3">{{ $produks->links() }}</div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
