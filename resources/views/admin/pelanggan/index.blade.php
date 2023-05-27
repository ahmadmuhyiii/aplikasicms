@extends('layouts.adm')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pelanggan</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="/pdf" class="btn btn-primary mb-3" target="_blank">CETAK
                            PDF</a>
                        <a href="/admin/pelanggan/create" class="btn btn-primary mb-3">Create New User</a>

                        <div class="row justify-content-end">
                            <div class="col-md-5 mb-3">
                                <form action="{{ route('pelanggan.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ request('search') }}">
                                </form>
                            </div>
                        </div>


                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $u)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            <a href="" class="badge bg-info">
                                                <span data-feather="eye"></span></a>
                                            <a href="/admin/pelanggan/{{ $u->id }}/edit" class="badge bg-warning">
                                                <span data-feather="edit"></span></a>

                                            <form action="/admin/pelanggan/{{ $u->id }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="badge bg-danger border-0"
                                                    onclick="return confirm('Are You Sure?')">
                                                    <span data-feather="x-circle"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">{{ $user->links() }}</div>
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
