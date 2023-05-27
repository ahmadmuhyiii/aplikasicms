@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card card-dark card-outline">
                    <div class="card-header">Transaksi : {{ Auth::user()->name }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            @if ($transaksi->all())
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

                                    <tbody>
                                        @foreach ($transaksi as $tf)
                                            @if ($tf->user_id == Auth::user()->id)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $tf->nama }}</td>
                                                    <td>{{ $tf->no_telp }}</td>
                                                    <td>{{ $tf->alamat }}</td>
                                                    <td>{{ $tf->jasa_pengiriman }}</td>
                                                    <td>
                                                        @if ($tf->no_resi != null)
                                                            <span class="badge badge-success">{{ $tf->no_resi }}</span>
                                                        @endif
                                                    </td>
                                                    <td>Rp. {{ number_format($tf->total_bayar) }}</td>
                                                    <td>
                                                        @if ($tf->status_pembayaran == 'belum-bayar')
                                                            <span
                                                                class="badge badge-warning">{{ $tf->status_pembayaran }}</span>
                                                        @elseif ($tf->status_pembayaran == 'sudah-bayar')
                                                            <span
                                                                class="badge badge-success">{{ $tf->status_pembayaran }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($tf->status_pesanan == 'diproses')
                                                            <span
                                                                class="badge badge-warning">{{ $tf->status_pesanan }}</span>
                                                        @elseif ($tf->status_pesanan == 'dikirim')
                                                            <span
                                                                class="badge badge-success">{{ $tf->status_pesanan }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $tf->created_at }}</td>

                                                    <td>
                                                        <form action="{{ route('transaksi.update', $tf->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="hidden" name="status_pembayaran"
                                                                id="status_pembayaran" value="sudah-bayar">
                                                            <button class="badge bg-success border-0">
                                                                <span data-feather="eye"></span>Bayar</button>
                                                        </form>
                                                        {{-- <a href="/pelanggan/order/{{ $tf->id }}/create"
                                                            class="badge bg-warning mb-1">
                                                            <span data-feather="eye"> </span>Bayar</a> --}}

                                                        <form action="/pelanggan/transaksi/{{ $tf->id }}"
                                                            method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="badge bg-danger border-0"
                                                                onclick="return confirm('Are You Sure?')">
                                                                <span data-feather="x-circle"> </span>Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p class="text-center fs-4">No Produk Found</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('paybutton');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("waiting your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script> --}}
@endsection

{{-- <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-QEkSK9GkZKenr6aL"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment --> --}}
