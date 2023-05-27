@extends('layouts.plg')

@section('content')
    <!-- Profile Image -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-7">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        @foreach ($users as $user)
                            @if ($user->id == Auth::user()->id)
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->image }}">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">Pelanggan</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nama </b> <a class="float-right">{{ $user->name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                    </li>
                                </ul>

                                <a href="/pelanggan/profil/{{ $user->id }}/edit" class="btn btn-primary btn-block"><span
                                        data-feather="edit"></span><b>Edit</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
