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

            <div class="text-center wow fadeInUp table-responsive"  data-wow-delay="0.1s">
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
                      @if (isset($orderdetail))
                      @foreach ($orderdetail as $o)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $o->food->name }}</td>
                        <td>{{ $o->quantity }}</td>
                        <td>Rp{{ $o->totalPrice }}</td>
                        <td>
                          <a href="#"><button class="btn btn-primary rounded-pill py-1"><i class="fas fa-minus text-light"></i></button></a>
                          <a href="#"><button class="btn btn-primary rounded-pill py-1"><i class="fas fa-plus text-light"></i></button></a>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td>1</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Rp0</td>
                        <td></td>
                      </tr>
                      @endif
                    </tbody>
                    <tfoot>
                        <tr>
                          <td colspan="3">Total:</td>
                          @if (isset($order))
                          <td colspan="1">Rp{{ $order->totalPayment }}</td>
                          @else
                          <td colspan="1">Rp0</td>
                          @endif
                          <td></td>
                        </tr>
                    </tfoot>
                  </table>
            </div>
        </div>
    </div>
    <!-- Menu End -->
@endsection