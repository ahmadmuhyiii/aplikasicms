<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Membuat Laporan PDF Produk
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Produk</th>
                <th>Kode Produk</th>
                <th>Kategori Id</th>
                <th>Toko Id</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Berat</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $produk)
                <tr>
                    <td>{{ $produk->id }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->code }}</td>
                    <td>{{ $produk->kategori_id }}</td>
                    <td>{{ $produk->toko_id }}</td>
                    <td>Rp. {{ number_format($produk->harga) }}</td>
                    <td>{{ $produk->qty }}</td>
                    <td>{{ $produk->berat }}gram</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
