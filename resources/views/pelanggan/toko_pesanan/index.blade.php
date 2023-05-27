@extends('layouts.tk')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <!-- ./row -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card card-dark card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                    href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                    aria-selected="true">Pesanan Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                                    aria-selected="false">Proses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                    href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages"
                                    aria-selected="false">Dikirim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                    href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings"
                                    aria-selected="false">Diterima</a>
                            </li>
                            {{-- <li class="ms-auto"> <a class="btn btn-success" href="" target="_blank">Print Laporan</a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                aria-labelledby="custom-tabs-one-home-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
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
                                                    @if ($transaksi->status_pembayaran == 'belum-bayar')
                                                        <tr>
                                                            <td>{{ $transaksi->id }}</td>
                                                            <td>{{ $transaksi->nama }}</td>
                                                            <td>{{ $transaksi->no_telp }}</td>
                                                            <td>{{ $transaksi->alamat }}</td>
                                                            <td>{{ $transaksi->jasa_pengiriman }}</td>
                                                            <td>{{ $transaksi->no_resi }}</td>
                                                            <td>Rp. {{ number_format($transaksi->total_bayar) }}</td>
                                                            <td><span
                                                                    class="badge badge-warning">{{ $transaksi->status_pembayaran }}</span>
                                                            </td>
                                                            <td><span
                                                                    class="badge badge-warning">{{ $transaksi->status_pesanan }}</span>
                                                            </td>
                                                            <td>{{ $transaksi->created_at }}</td>
                                                            <td>
                                                                {{-- <a id="paybutton" name="paybutton" class="badge bg-success">
                                                            <span data-feather="eye"> </span>Bayar</a> --}}

                                                                <a href="{{ route('chat.show', $transaksi->user_id) }}"
                                                                    class="badge bg-warning mb-1">
                                                                    <span data-feather="edit"></span>Chat Pembeli</a>

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
                                                    @elseif ($transaksi->status_pembayaran != 'belum-bayar')
                                                    @endif
                                                @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-one-profile-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
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
                                            <span style="color:red">Jangan Lupa Isi Nomor Resi!</span>
                                        </thead>
                                        {{-- Diproses dan sudah bayar --}}
                                        <tbody>
                                            @foreach ($transaksis as $transaksi)
                                                @if ($transaksi->toko_id == Auth::user()->toko->id)
                                                    @if ($transaksi->status_pembayaran == 'sudah-bayar')
                                                        @if ($transaksi->no_resi == null)
                                                            <tr>
                                                                <td>{{ $transaksi->id }}</td>
                                                                <td>{{ $transaksi->nama }}</td>
                                                                <td>{{ $transaksi->no_telp }}</td>
                                                                <td>{{ $transaksi->alamat }}</td>
                                                                <td>{{ $transaksi->jasa_pengiriman }}</td>
                                                                <td>{{ $transaksi->no_resi }}</td>
                                                                <td>Rp. {{ number_format($transaksi->total_bayar) }}</td>
                                                                <td><span
                                                                        class="badge badge-success">{{ $transaksi->status_pembayaran }}</span>
                                                                </td>
                                                                <td><span
                                                                        class="badge badge-warning">{{ $transaksi->status_pesanan }}</span>
                                                                </td>
                                                                <td>{{ $transaksi->created_at }}</td>

                                                                <td>

                                                                    <a href="/pelanggan/toko_pesanan/{{ $transaksi->id }}/edit"
                                                                        class="badge bg-warning">
                                                                        <span data-feather="edit"></span>Isi Nomor Resi</a>
                                                                    <form
                                                                        action="/pelanggan/toko_pesanan/{{ $transaksi->id }}"
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
                                                        @elseif ($transaksi->no_resi != null)
                                                        @endif
                                                    @elseif ($transaksi->status_pembayaran != 'sudah-bayar')
                                                    @endif
                                                @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-one-messages-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
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
                                        {{-- Dikirim --}}
                                        <tbody>
                                            @foreach ($transaksis as $transaksi)
                                                @if ($transaksi->toko_id == Auth::user()->toko->id)
                                                    @if ($transaksi->no_resi != null)
                                                        @if ($transaksi->status_pesanan != 'diterima')
                                                            <tr>
                                                                <td>{{ $transaksi->id }}</td>
                                                                <td>{{ $transaksi->nama }}</td>
                                                                <td>{{ $transaksi->no_telp }}</td>
                                                                <td>{{ $transaksi->alamat }}</td>
                                                                <td>{{ $transaksi->jasa_pengiriman }}</td>
                                                                <td><span
                                                                        class="badge badge-success">{{ $transaksi->no_resi }}</span>
                                                                </td>
                                                                <td>Rp. {{ number_format($transaksi->total_bayar) }}</td>
                                                                <td><span
                                                                        class="badge badge-success">{{ $transaksi->status_pembayaran }}</span>
                                                                </td>
                                                                <td><span
                                                                        class="badge badge-primary">{{ $transaksi->status_pesanan }}</span>
                                                                </td>
                                                                <td>{{ $transaksi->created_at }}</td>

                                                                <td>
                                                                    {{-- <a id="paybutton" name="paybutton" class="badge bg-success">
                                                            <span data-feather="eye"> </span>Bayar</a> --}}
                                                                    <a href="/pelanggan/toko_pesanan/{{ $transaksi->id }}/edit2"
                                                                        class="badge bg-warning">
                                                                        <span data-feather="edit"></span>Diterima</a>

                                                                    <form
                                                                        action="/pelanggan/toko_pesanan/{{ $transaksi->id }}"
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
                                                        @elseif ($transaksi->status_pesanan == 'diterima')
                                                        @endif
                                                    @elseif ($transaksi->no_resi == null)
                                                    @endif
                                                @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                                aria-labelledby="custom-tabs-one-settings-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
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
                                        {{-- Diproses dan sudah bayar  PESANAN DITERIMA --}}
                                        <tbody>
                                            @foreach ($transaksis as $transaksi)
                                                @if ($transaksi->toko_id == Auth::user()->toko->id)
                                                    @if ($transaksi->status_pesanan == 'diterima')
                                                        <tr>
                                                            <td>{{ $transaksi->id }}</td>
                                                            <td>{{ $transaksi->nama }}</td>
                                                            <td>{{ $transaksi->no_telp }}</td>
                                                            <td>{{ $transaksi->alamat }}</td>
                                                            <td>{{ $transaksi->jasa_pengiriman }}</td>
                                                            <td><span
                                                                    class="badge badge-success">{{ $transaksi->no_resi }}</span>
                                                            </td>
                                                            <td>Rp. {{ number_format($transaksi->total_bayar) }}</td>
                                                            <td><span
                                                                    class="badge badge-success">{{ $transaksi->status_pembayaran }}</span>
                                                            </td>
                                                            <td><span
                                                                    class="badge badge-primary">{{ $transaksi->status_pesanan }}</span>
                                                            </td>
                                                            <td>{{ $transaksi->created_at }}</td>

                                                            <td>

                                                                {{-- <a href="/pelanggan/toko_pesanan/{{ $transaksi->id }}/edit"
                                                                    class="badge bg-warning">
                                                                    <span data-feather="edit"></span>Isi Nomor Resi</a> --}}
                                                                <form
                                                                    action="/pelanggan/toko_pesanan/{{ $transaksi->id }}"
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
                                                    @elseif ($transaksi->status_pesanan != 'diterima')
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            {{-- Tabel Order --}}

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-11">
                        <div class="card card-dark card-outline">
                            <div class="card-header">Transaksi Berhasil</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User Id</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Order Id</th>
                                                <th scope="col">Total Pembayaran</th>
                                                <th scope="col">PDF Struk</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                @if ($order->toko_id == Auth::user()->toko->id)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $order->getUser->name }}</td>
                                                        <td><span class="badge badge-success">{{ $order->status }}</span>
                                                        </td>
                                                        <td>{{ $order->order_id }}</td>
                                                        <td>Rp. {{ number_format($order->gross_amount) }}</td>
                                                        <td>{{ $order->pdf_url }}</td>

                                                        {{-- <td><img src="{{ asset('storage/' . $produk->image) }}"
                                        alt="{{ $produk->nama_produk }}" style="max-width: 100px"></td> --}}
                                                        <td>
                                                            {{-- <a href="" class="badge bg-info">
                                        <span data-feather="eye"></span></a>
                                    <a href="/pelanggan/jual/{{ $produk->id }}/edit" class="badge bg-warning">
                                        <span data-feather="edit"></span></a> --}}

                                                            <form action="/pelanggan/toko_pesanan/{{ $order->id }}"
                                                                method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="badge bg-danger border-0"
                                                                    onclick="return confirm('Are You Sure?')">
                                                                    <span data-feather="x-circle"></span></button>
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
