@extends('layouts.adm')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kategori</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="/admin/kategori/create" class="btn btn-primary">Create New Kategori</a>
                        <div class="row justify-content-end">
                            <div class="col-md-5 mb-3">
                                <form action="{{ route('kategori.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ request('search') }}">
                                </form>
                            </div>
                        </div>



                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Merk Motor</th>
                                    <th>Nama kategori</th>
                                    <th>Tahun</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategori->Getmotor->nama_merk }}</td>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td>{{ $kategori->tahun }}</td>
                                        <td><img src="{{ asset('storage/' . $kategori->image) }}"
                                                alt="{{ $kategori->nama_kategori }}" style="max-width: 100px"></td>
                                        <td>
                                            <a href="" class="badge bg-info">
                                                <span data-feather="eye"></span></a>
                                            <a href="/admin/kategori/{{ $kategori->id }}/edit" class="badge bg-warning">
                                                <span data-feather="edit"></span></a>

                                            <form action="/admin/kategori/{{ $kategori->id }}" method="POST"
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
                        <div class="d-flex justify-content-center mt-3">{{ $kategoris->links() }}</div>
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
