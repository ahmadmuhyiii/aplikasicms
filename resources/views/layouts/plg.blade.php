<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }} "></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>


    <script src="{{ asset('/js/dashboard.js') }}" defer></script>
    {{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('/css/adminlte.min.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-wrench-adjustable-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M6.705 8.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27.596-.894Z" />
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm-6.202-4.751 1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.49 4.49 0 0 1-1.592-.29L4.747 14.2a7.031 7.031 0 0 1-2.949-2.951ZM12.496 8a4.491 4.491 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11c.027.2.04.403.04.61Z" />
                    </svg> SiMOSIC
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('home*') ? 'active' : '' }}" aria-current="page"
                                href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pelanggan/pelproduk*') ? 'active' : '' }}"
                                href="/pelanggan/pelproduk">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pelanggan/kategori*', 'pelanggan/pelkategori*') ? 'active' : '' }}"
                                href="/pelanggan/kategori">Kategori</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::is('pelanggan/chat*') ? 'active' : '' }} "
                                href="/pelanggan/chat"> Chat</a>
                        </li>
                        {{-- @if ($chats != null)
                                <span class="badge badge-warning">!</span>
                            @elseif ($chats == null)
                            @endif --}}
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pelanggan/lacak*') ? 'active' : '' }}"
                                href="/pelanggan/lacak">Lacak Paket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pelanggan/keranjang*') ? 'active' : '' }}"
                                href="/pelanggan/keranjang">Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pelanggan/transaksi*') ? 'active' : '' }}"
                                href="/pelanggan/transaksi">Transaksi</a>
                        </li>
                        <li class="nav-hidden">
                            <a class="nav-link {{ Request::is('pelanggan/order*') ? 'active' : '' }}"
                                href="/pelanggan/order">Riwayat Transaksi</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/pelanggan/profil">Profile</a></li>

                                @if (auth()->user()->toko == null)
                                    <li><a class="dropdown-item" href="/pelanggan/toko" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1">Mulai Jual?</a>
                                    </li>
                                @elseif (auth()->user()->toko->id != null)
                                    <li><a class="dropdown-item" href="/pelanggan/toko">Mulai Jual Yuk</a>
                                    </li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrasi Toko
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="/pelanggan/toko" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Toko Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                            id="image" name="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label"></label>
                        <input type="hidden" class="form-control @error('user_id') is-invalid @enderror"
                            id="user_id" name="user_id" required value="{{ Auth()->user()->id }}">
                        @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control @error('nama_toko') is-invalid @enderror"
                            id="nama_toko" name="nama_toko" required autofocus>
                        @error('nama_toko')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image2" class="form-label">Image KTP</label>
                        <img class="img-preview2 img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image2') is-invalid @enderror" type="file"
                            id="image2" name="image2" onchange="previewImage2()">
                        @error('image2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nomor Induk KTP</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" required autofocus>
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                            id="no_telp" name="no_telp" required>
                        @error('no_telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nomor_rek" class="form-label">Nomor Rekening</label>
                        <input type="number" class="form-control @error('nomor_rek') is-invalid @enderror"
                            id="nomor_rek" name="nomor_rek" required>
                        @error('nomor_rek')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <h6>Provinsi</h6>
                            <select name="province_id" class="form-select">
                                <option value="" holder>Pilih Provinsi</option>
                                @foreach ($provinsi as $result)
                                    <option value="{{ $result->id }}">
                                        {{ $result->province }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <h6>Kota</h6>
                            <select name="city_id" id="destination" class="form-select">
                                <option value="" holder>Pilih Kota</option>
                                @foreach ($city as $result)
                                    <option value="{{ $result->id }}">
                                        {{ $result->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat" name="alamat" required>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sudah
                            Daftar?</button>
                        <button type="submit" class="btn btn-primary">Registrasi</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

{{-- Modal Registrasi toko --}}


</html>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }

    function previewImage2() {
        const image2 = document.querySelector('#image2');
        const imgPreview = document.querySelector('.img-preview2');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image2.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
        const blob = URL.createObjectURL(image2.files[0]);
        imgPreview.src = blob;
    }
</script>
