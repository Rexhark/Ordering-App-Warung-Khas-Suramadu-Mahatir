@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Makanan dengan Jumlah Suka Terbanyak</h4>
                            <div class="card-header-action">
                                <a href="dashboard/makanan" class="btn btn-primary">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                @foreach ($mostFavFood as $food)
                                <div class="col text-center">
                                    <div class="gallery mb-3">
                                        <img alt="Gambar" src="{{ asset('storage/'.$food->image) }}" class="img-fluid rounded-circle">
                                    </div>
                                    <span class="badge badge-primary p-1 pl-3">Suka:  <span class="badge badge-white">{{ $food->favorite }}</span></span>
                                    <div class="font-weight-bold mt-2">{{$loop->iteration}}. {{$food->name}}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Makanan dengan Jumlah Pesanan Terbanyak</h4>
                            <div class="card-header-action">
                                <a href="dashboard/makanan" class="btn btn-primary">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($mostOrderedFood as $food)
                                <div class="col text-center">
                                    <div class="gallery mb-3">
                                        <img alt="Gambar" src="{{ asset('storage/'.$food->image) }}" class="img-fluid rounded-circle">
                                    </div>
                                    <span class="badge badge-primary p-1 pl-3">Order:  <span class="badge badge-white">{{ $food->ordered }}</span></span>
                                    <div class="font-weight-bold mt-2">{{$loop->iteration}}. {{$food->name}}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pesanan Terbaru</h4>
                            <div class="card-header-action">
                                <a href="dashboard/pesanan" class="btn btn-primary">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-bordered mb-0 table">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="20%">Nama Pelanggan</th>
                                            <th width="40%">Daftar Pesanan</th>
                                            <th width="15%">Total</th>
                                            <th width="20%">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($order as $o)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $o->user->name }}</td>
                                            <td>
                                                @foreach ($o->orderdetail as $od)
                                                <ul>{{ $od->food->name }} x {{ $od->quantity }}</ul>
                                                @endforeach
                                            </td>
                                            <td>Rp{{ $o->totalPayment }}</td>
                                            <td>{{$o->created_at->toDateString()}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total User</h4>
                                </div>
                                <div class="card-body">
                                    {{ $jumlahUser }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Online User</h4>
                                </div>
                                <div class="card-body">
                                    {{ $onlineUser }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pesanan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalOrder }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pendapatan</h4>
                                </div>
                                <div class="card-body">
                                    Rp{{ $allOrder->sum('totalPayment') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
