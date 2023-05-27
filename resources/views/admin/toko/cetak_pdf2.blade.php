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
        <h5>Membuat Laporan PDF Toko
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>Nama Toko</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $toko)
                <tr>
                    <td>{{ $toko->id }}</td>
                    <td>{{ $toko->user_id }}</td>
                    <td>{{ $toko->nama_toko }}</td>
                    <td>{{ $toko->email }}</td>
                    <td>{{ $toko->no_telp }}</td>
                    <td>{{ $toko->alamat }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
