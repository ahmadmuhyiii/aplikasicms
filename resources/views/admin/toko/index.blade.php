@extends('layouts.adm')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Toko</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="/tokopdf" class="btn btn-primary mb-3" target="_blank">CETAK
                            PDF</a>

                        <div class="row justify-content-end">
                            <div class="col-md-5 mb-3">
                                <form action="{{ route('toko.index') }}" method="GET">
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
                                    <th>Nama Toko</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tokos as $toko)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/' . $toko->image) }}" alt="{{ $toko->image }}"
                                                style="max-width: 50px">
                                        </td>
                                        <td>{{ $toko->nama_toko }}</td>
                                        <td>{{ $toko->email }}</td>
                                        <td>{{ $toko->no_telp }}</td>
                                        <td>{{ $toko->province_id }}</td>
                                        <td>{{ $toko->city_id }}</td>
                                        <td>{{ $toko->alamat }}</td>


                                        <td>
                                            <a href="/admin/toko/{{ $toko->id }}/edit" class="badge bg-warning">
                                                <span data-feather="edit"></span></a>
                                            <form action="/admin/toko/{{ $toko->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger border-0"
                                                    onclick="return confirm('Are You Sure?')">
                                                    <span data-feather="x-circle"> </span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">{{ $tokos->links() }}</div>
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
