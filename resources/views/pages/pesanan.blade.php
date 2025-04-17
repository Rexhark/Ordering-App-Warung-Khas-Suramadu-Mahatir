@extends('layouts.app')

@section('title', 'Pesanan')

@push('style')
    <!-- CSS Libraries -->
    <style>
        .modal-backdrop {
            /* bug fix - no overlay */
            display: none;
        }

        .modal {
            /* bug fix - custom overlay */
            background-color: rgba(10, 10, 10, 0.45);
        }
    </style>
@endpush

@section('main')
    <div class="main-content @if (auth()->user()->role == 'user') pl-5 @endif">
        <section class="section">
            <div class="section-header">
                <h1>Pesanan</h1>
                @if (Auth::user()->role == 'admin')
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Pesanan</a></div>
                        <div class="breadcrumb-item">Daftar Pesanan</div>
                    </div>
                @endif
            </div>

            <div class="section-body">
                <h2 class="section-title">Daftar Pesanan</h2>
                <p class="section-lead">Berikut merupakan daftar pesanan.</p>
                <div class="row">
                    <div class="col">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills" id="kategori-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all"
                                            role="tab" aria-controls="all" aria-selected="true">Semua</a>
                                    </li>
                                    <li class="nav-item pl-1">
                                        <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab"
                                            aria-controls="user" aria-selected="false">Pesanan Sendiri</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="tab-content no-padding" id="kategori-panel">
                            @foreach (['all' => $order, 'user' => $order->where('user_id', Auth::id())] as $tab => $orders)
                                <div class="tab-pane fade {{ $tab === 'all' ? 'show active' : '' }}"
                                    id="{{ $tab }}" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table-bordered table-md table">
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="20%">Nama Pelanggan</th>
                                                        <th width="40%">Daftar Pesanan</th>
                                                        <th width="15%">Total</th>
                                                        @if (Auth::user()->role == 'admin')
                                                            <th width="20%">Action</th>
                                                        @endif
                                                    </tr>
                                                    @foreach ($orders as $o)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $o->user->name }}</td>
                                                            <td>
                                                                <ul>
                                                                    @foreach ($o->orderDetails as $od)
                                                                        <li>{{ $od->food->name }} x {{ $od->quantity }}
                                                                            (Rp{{ number_format($od->food->price ?? 0, 0, ',', '.') }})
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>Rp{{ number_format($o->totalPayment ?? 0, 0, ',', '.') }}
                                                            </td>
                                                            @if (Auth::user()->role == 'admin')
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <button type="button"
                                                                            class="col btn btn-danger mx-2"
                                                                            data-toggle="modal"
                                                                            data-target="#hapusdata{{ $o->id }}">Hapus</button>
                                                                    </div>

                                                                    {{-- Modal Delete --}}
                                                                    <div class="modal fade"
                                                                        id="hapusdata{{ $o->id }}" tabindex="-1"
                                                                        aria-labelledby="hapusdata{{ $o->id }}"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">
                                                                                        Konfirmasi Hapus Data User
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p>Apakah Anda yakin ingin menghapus
                                                                                        user ini?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <form action="user/hapus"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        @method('delete')
                                                                                        <input type="hidden" name="id"
                                                                                            value="{{ $o->id }}">
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger">Hapus</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
