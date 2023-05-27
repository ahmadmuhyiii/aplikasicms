@extends('layouts.tk')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-lg-8">
                            <form action="/pelanggan/toko_pesanan/{{ $transaksi->id }}" method="POST" class="mb-5"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="form-group">
                                    <label for="no_resi"> No Resi</label>
                                    <input type="text" class="form-control" id="no_resi" name="no_resi"
                                        value="{{ old('no_resi', $transaksi->no_resi) }}">
                                </div>
                                <div class="form-group">
                                    <label for="status_pesanan">Status Pesanan</label>
                                    {{-- status pesanan, Dari Diproses - Dikirim --}}
                                    <input type="text" class="form-control" id="status_pesanan" name="status_pesanan"
                                        value="dikirim" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
