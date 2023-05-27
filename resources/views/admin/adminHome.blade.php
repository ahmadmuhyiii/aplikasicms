@extends('layouts.adm')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content">
            <div class="col-sm-12 col-md-11">
                <div class="card card-primary card-outline">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        You are a Admin User.

                        <!-- =========================================================== -->
                        <h5 class="mt-4 mb-2"></h5>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-info">
                                    <span class="info-box-icon"><i class="bi bi-people"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Pelanggan</span>
                                        <span class="info-box-number">{{ $jumlah_user }} User</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 10%"></div>
                                        </div>
                                        <span class="progress-description">
                                            Total {{ $jumlah_user }} User
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-success">
                                    <span class="info-box-icon"><i class="bi bi-shop window"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Toko</span>
                                        <span class="info-box-number">{{ $jumlah_toko }} Toko</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 10%"></div>
                                        </div>
                                        <span class="progress-description">
                                            Total {{ $jumlah_toko }} Toko
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-warning">
                                    <span class="info-box-icon"><i class="bi bi-archive"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Kategori</span>
                                        <span class="info-box-number">{{ $jumlah_kategori }} Kategori</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 70%"></div>
                                        </div>
                                        <span class="progress-description">
                                            Total {{ $jumlah_kategori }} Kategori
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-danger">
                                    <span class="info-box-icon"><i class="bi bi-map"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Produk</span>
                                        <span class="info-box-number">{{ $jumlah_produk }} Produk</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 70%"></div>
                                        </div>
                                        <span class="progress-description">
                                            Total {{ $jumlah_produk }} Produk
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
