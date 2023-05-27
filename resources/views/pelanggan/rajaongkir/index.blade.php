<!-- Styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container">
    <div class="card">
        <form action="{{ url('/pelanggan/rajaongkir') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6>Nama Anda</h6>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6>Kirim Dari</h6>
                                    <select name="province_from" class="form-control">
                                        <option value="" holder>Pilih Provinsi</option>
                                        @foreach ($provinsi as $result)
                                            <option value="{{ $result->id }}">{{ $result->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="origin" id="origin" class="form-control">
                                        <option value="" holder>Pilih Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6>Kirim Ke</h6>
                                    <select name="province_to" class="form-control">
                                        <option value="" holder>Pilih Provinsi</option>
                                        @foreach ($provinsi as $result)
                                            <option value="{{ $result->id }}">{{ $result->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="destination" id="destination" class="form-control">
                                        <option value="" holder>Pilih Kota</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h6> Berat Paket</h6>
                                    <input name="weight" type="text" class="form-control">
                                    <small>Dalam Gram (1700 atau 1,7kg)</small>
                                </div>
                            </div>
                            <div class="col-sm-6"><br>
                                <div class="form-group">
                                    <select name="courier" id="" class="form-control">
                                        <option value="" holder>Pilih Kurir</option>
                                        <option value="jne" holder>JNE</option>
                                        <option value="tiki" holder>Tiki</option>
                                        <option value="pos" holder>Pos Indonesia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block"> Hitung Ongkir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @if ($cekongkir)
            <div class="row">
                <div class="col">
                    @foreach ($cekongkir as $result)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio">
                            <label class="form-check-label">{{ $result['service'] }}</label>
                            <label class="form-check-label">Rp.{{ $result['cost'][0]['value'] }}</label>
                            <br /><label class="form-check-label">{{ $result['cost'][0]['etd'] }} hari</label>
                        </div>
                    @endforeach
                    {{-- <table class="table table-striped table-bordered table-hovered" width="100%">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Estimasi</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cekongkir as $result)
                                <tr>
                                    <td>{{ $result['service'] }}</td>
                                    <td>{{ $result['description'] }}</td>
                                    <td>{{ $result['cost'][0]['value'] }}</td>
                                    <td>{{ $result['cost'][0]['etd'] }}</td>
                                    <td>{{ $result['cost'][0]['note'] }}</td>
                                    <td><a class="btn btn-primary" href="#">Check out</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}

                </div>
            </div>
        @else
        @endif
    </div>

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="province_from"]').on('change', function() {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/getCity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="origin"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="origin"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="origin"]').empty();
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
</script>
