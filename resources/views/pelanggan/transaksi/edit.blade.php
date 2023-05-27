@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- right column -->
            <div class="col-sm-10 col-md-9">
                <div class="card card-dark card-outline">
                    <div class="card-header">Transaksi : {{ Auth::user()->name }}</div>
                    <div class="card-body">
                        <h2>Pembayaran</h2>
                        <h5 class="card-title">Lanjutkan Pembayaran ?</h5><br />
                        <a href="/pelanggan/order/{{ $transaksi->id }}/create" class="badge bg-warning mb-1">
                            <span data-feather="eye"> </span>Ya</a>
                        <a href="/pelanggan/transaksi" class="badge bg-success mb-1">
                            <span data-feather="eye"></span>Back</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
