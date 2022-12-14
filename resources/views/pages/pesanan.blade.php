@extends('layouts.app')

@section('title', 'Pesanan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pesanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pesanan</a></div>
                    <div class="breadcrumb-item">Daftar Pesanan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Daftar Pesanan</h2>
                <p class="section-lead">Berikut merupakan daftar pesanan.</p>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-bordered table-md table">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Nama Pelanggan</th>
                                    <th width="30%">Daftar Pesanan</th>
                                    <th width="15%">Total</th>
                                    <th width="20%">Action</th>
                                </tr>
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
                                    <td>
                                        <div class="container-fluid row m-0 px-0">
                                            <a href="#" class="btn btn-warning col mx-2 rounded-pill">Edit</a>
                                            <button type="button" class="col btn btn-danger mx-2 rounded-pill" data-toggle="modal" data-target="#hapusdata{{$o->id}}">Hapus</button>
                                            {{-- Modal Delete --}}
                                            <div class="modal fade" id="hapusdata{{$o->id}}" tabindex="-1" aria-labelledby="hapusdata{{$o->id}}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusdata{{$o->id}}">Konfirmasi Hapus Data User</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin menghapus user ini?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <form action="user/hapus" method="post">   
                                                                @csrf
                                                                @method('delete')
                                                                <input type="text" name="id" class="form-control" value="{{$o->id}}" hidden>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
