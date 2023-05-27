@extends('layouts.adm')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Merk Motor</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="/admin/admmotor/create" class="btn btn-primary">Create New Merk Motor</a>
                        <div class="row justify-content-end">
                            <div class="col-md-5 mb-3">
                                <form action="{{ route('admmotor.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ request('search') }}">
                                </form>
                            </div>
                        </div>



                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Merk Motor</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($motors as $motor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $motor->nama_merk }}</td>
                                        <td><img src="{{ asset('storage/' . $motor->image) }}" alt="{{ $motor->nama_merk }}"
                                                style="max-width: 70px"></td>
                                        <td>
                                            <a href="/admin/admmotor/{{ $motor->id }}/edit" class="badge bg-warning">
                                                <span data-feather="edit"></span></a>

                                            <form action="/admin/admmotor/{{ $motor->id }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger border-0"
                                                    onclick="return confirm('Are You Sure?')">
                                                    <span data-feather="x-circle"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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
