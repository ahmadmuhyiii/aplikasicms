@extends('layouts.tk')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card card-primary card-outline">
                    <div class="card-header">Transaksi {{ Auth::user()->name }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Telepon</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Pengiriman</th>
                                        <th scope="col">No Resi</th>
                                        <th scope="col">Total_bayar</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Status Pesanan</th>
                                        <th scope="col">Tanggal Pesanan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                {{-- Pesanan masuk --}}
                                <tbody>
                                    @foreach ($transaksis as $transaksi)
                                        @if ($transaksi->toko_id == Auth::user()->toko->id)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $transaksi->nama }}</td>
                                                <td>{{ $transaksi->no_telp }}</td>
                                                <td>{{ $transaksi->alamat }}</td>
                                                <td>{{ $transaksi->jasa_pengiriman }}</td>
                                                <td>{{ $transaksi->no_resi }}</td>
                                                <td>{{ $transaksi->total_bayar }}</td>
                                                <td>{{ $transaksi->status_pembayaran }}</td>
                                                <td>{{ $transaksi->status_pesanan }}</td>
                                                <td>{{ $transaksi->created_at }}</td>
                                                {{-- {{ route('post.edit', $post->id) }} --}}
                                                <td>
                                                    <a href="/pelanggan/toko_pesanan/{{ $transaksi->id }}/edit"
                                                        class="badge bg-warning">
                                                        <span data-feather="edit"></span>Edit</a>
                                                    <form action="/pelanggan/toko_pesanan/{{ $transaksi->id }}"
                                                        method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger border-0"
                                                            onclick="return confirm('Are You Sure?')">
                                                            <span data-feather="x-circle">
                                                            </span>Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
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
