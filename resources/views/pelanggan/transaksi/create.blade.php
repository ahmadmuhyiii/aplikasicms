@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- right column -->
            <div class="col-sm-12 col-md-11">
                <!-- Form Element sizes -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Transaksi</h3>
                    </div>

                    <form action="/pelanggan/transaksi" class="d-inline" method="POST">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <!-- /.card-header -->
                            <!-- form start --><br>
                            @foreach ($keranjangs as $value)
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="info-box bg-info">
                                            <span class="info-box-icon"><img
                                                    src="{{ asset('storage/' . $value->getProduk->image) }}"
                                                    alt="{{ $value->getProduk->nama_produk }}" style="max-width: 80px">
                                                </td>
                                            </span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">{{ $value->getProduk->nama_produk }}</span>
                                                <span class="info-box-number">Rp. {{ $value->subtotal }}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 100%"></div>
                                                </div>
                                                <span class="progress-description">
                                                    Quantity : {{ $value->qty }}
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                        <!-- /.col -->
                                    </div>
                                </div>
                            @endforeach
                            <!-- /.card -->
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="user_id" name="user_id"
                                    value="{{ auth()->user()->id }}" placeholder="User Id">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"></label>
                                <select hidden class="form-control" name="toko_id">
                                    @foreach ($idToko as $id => $toko_id)
                                        <option value="{{ $toko_id }}">{{ $toko_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Produk Id:</label>
                                <select class="form-control" name="produk_id">
                                    @foreach ($idProduk as $idp => $produk_id)
                                        <option value="{{ $produk_id }}">{{ $produk_id }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="produk_id" name="produk_id"
                                    value="{{ $idProduk }}" placeholder="Produk Id">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value=""
                                    placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    placeholder="No Telepon" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" placeholder="Alamat Lengkap" required>
                            </div>
                            {{-- RajaOngkir --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select hidden class="form-control" name="province_from">
                                            <option selected holder value="{{ $value->getProduk->getToko->province_id }}">
                                                Provinsinya Toko
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select hidden class="form-control" name="origin">
                                            <option selected holder value="{{ $value->getProduk->getToko->city_id }}">
                                                Kotanya
                                                Toko
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label>Kirim ke:</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h6>Provinsi</h6>
                                        <select name="province_to" class="form-select">
                                            <option value="" holder>Pilih Provinsi</option>
                                            @foreach ($provinsi as $result)
                                                <option value="{{ $result->id }}">
                                                    {{ $result->province }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h6>Kota</h6>
                                        <select name="destination" id="destination" class="form-select">
                                            <option value="" holder>Pilih Kota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h6> Berat Paket</h6>
                                        <input id="weight" name="weight" type="text"
                                            value="{{ $value->getProduk->berat }}" class="form-control" readonly>

                                        <small>Dalam Gram (1700 atau 1,7kg)</small>
                                    </div>
                                </div>
                                <div class="col-sm-6"><br>
                                    <div class="form-group">
                                        <select name="courier" id="" class="form-select">
                                            <option value="" holder>Pilih Kurir</option>
                                            <option value="jne" holder>JNE</option>
                                            <option value="tiki" holder>Tiki</option>
                                            <option value="pos" holder>Pos Indonesia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="service" class="form-select">
                                    <option value="" holder>Pilih Service</option>
                                </select>
                            </div>
                            {{-- RajaOngkir --}}


                            <div class="form-group">
                                <label for="jasa_pengiriman">Validasi Pengiriman</label>
                                <select name="jasa_pengiriman" class="form-select">
                                    <option value="" holder></option>
                                </select>
                                <small> Harus Isi sama dengan service</small>
                            </div>
                            <div class="form-group">
                                {{-- <label for="qty">Quantity</label> --}}
                                <input hidden type="text" class="form-control" id="qty" name="qty"
                                    value="{{ $value->qty }}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="no_resi">Nomor Resi</label>
                                <input type="text" class="form-control" id="no_resi" name="no_resi"
                                    placeholder="No Resi">
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <input type="text" class="form-control" id="total_bayar" name="total_bayar"
                                    placeholder="total bayar">
                            </div> --}}
                            <div class="form-group">
                                <label for="status_pembayaran"></label>
                                {{-- status pembayaran, sudah bayar - belum bayar --}}
                                <input type="hidden" class="form-control" id="status_pembayaran"
                                    name="status_pembayaran" value="belum-bayar">
                            </div>
                            <div class="form-group">
                                <label for="status_pesanan"></label>
                                {{-- status Pesanan, Diproses - Dikirim - Diterima --}}
                                <input type="hidden" class="form-control" id="status_pesanan" name="status_pesanan"
                                    value="diproses">
                            </div>

                        </div>

                        <!-- /.card-body   id="paybutton" name="paybutton"-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>

                </div>
                <!-- /.card -->


            </div>
        </div>
    @endsection




    <!-- Scripts raja ongkir -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="province_from"]').on('change', function() {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: '/getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('[name="origin"]').empty();
                            $.each(data, function(key, value) {
                                $('[name="origin"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('[name="origin"]').empty();
                }
            });

            $('select[name="province_to"]').on('change', function() {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: '/getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="destination"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="destination"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="destination"]').empty();
                }
            });
        });

        $(document).ready(function() {
            $('select[name="courier"]').on('change', function() {
                var courierId = $(this).val();
                let token = $("meta[name='csrf-token']").attr("content");
                let city_origin = $('select[name=origin]').val();
                let city_destination = $('select[name=destination]').val();
                let courier = $('select[name=courier]').val();
                let weight = $('#weight').val();
                if (courierId) {
                    $.ajax({
                        url: '/checkongkircuy',
                        type: "POST",
                        data: {
                            _token: token,
                            origin: city_origin,
                            destination: city_destination,
                            courier: courier,
                            weight: weight,
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $('select[name="service"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="service"]').append(
                                    '<option value="' + value
                                    .cost[0].value + '">' + value
                                    .service + '  (' + value
                                    .description + ')' +
                                    '   Rp.' + value
                                    .cost[0].value + ' (Estimasi ' + value.cost[0]
                                    .etd + ' hari)' + '</option>');
                            });
                            $('select[name="jasa_pengiriman"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="jasa_pengiriman"]').append(
                                    '<option value="' + value
                                    .service + '  (' + value
                                    .description + ')' +
                                    '   Rp.' + value
                                    .cost[0].value + ' (Estimasi ' + value.cost[0]
                                    .etd + ' hari)' + '">' + value
                                    .service + '  (' + value
                                    .description + ')' +
                                    '   Rp.' + value
                                    .cost[0].value + ' (Estimasi ' + value.cost[0]
                                    .etd + ' hari)' + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
    <!-- Scripts raja ongkir -->
