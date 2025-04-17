@extends('main.layouts.app')

@section('hero')
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Pesanan</h1>
        </div>
    </div>
@endsection

@section('main')
    <!-- Menu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Pesanan</h5>
                <h1 class="mb-5">List Belanja</h1>
            </div>

            <div class="container-fluid">
                @include('components.message')
            </div>

            <div class="text-center wow fadeInUp table-responsive" data-wow-delay="0.1s">
                <table class="table table-bordered table-hover rounded-5 shadow-sm">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="30%">Item</th>
                            <th width="10%">Kuantitas</th>
                            <th width="30%">Harga</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($cart) && count($cart) > 0)
                            @foreach ($cart as $id => $o)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $o['name'] ?? 'Tidak diketahui' }}</td>
                                    <td>{{ $o['quantity'] ?? 0 }}</td>
                                    <td>Rp{{ number_format($o['totalPrice'] ?? 0, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('order.kurang', ['id' => $id]) }}">
                                            <button class="btn btn-primary rounded-pill py-1">
                                                <i class="fas fa-minus text-light"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('order.tambah', ['id' => $id]) }}">
                                            <button class="btn btn-primary rounded-pill py-1">
                                                <i class="fas fa-plus text-light"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Belum ada pesanan.</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Total:</td>
                            <td colspan="1">
                                Rp{{ number_format($totalPayment ?? 0, 0, ',', '.') }}
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                {{-- Checkout --}}
                <div class="text-center">
                    <a href="{{ route('order.checkout') }}">
                        <button class="btn btn-primary rounded-pill py-2 px-4">
                            Checkout
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
@endsection
