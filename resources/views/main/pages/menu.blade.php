@extends('main.layouts.app')

@section('hero')
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
        </div>
    </div>
@endsection

@section('main')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu</h5>
            </div>

            <div class="container-fluid">
                @include('components.message')
            </div>

            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                            href="#gado-gado">
                            <i class="fas fa-2x fa-cloud-meatball"></i>
                            <div class="ps-3">
                                <small class="text-body">Tradisional</small>
                                <h6 class="mt-n1 mb-0">Gado-Gado</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#soto">
                            <i class="fas fa-2x fa-cloud-meatball"></i>
                            <div class="ps-3">
                                <small class="text-body">Khas Indonesia</small>
                                <h6 class="mt-n1 mb-0">Soto</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#nasi-campur">
                            <i class="fas fa-2x fa-utensils"></i>
                            <div class="ps-3">
                                <small class="text-body">Khas Indonesia</small>
                                <h6 class="mt-n1 mb-0">Nasi Campur</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#nasi-kuning">
                            <i class="fas fa-2x fa-utensils"></i>
                            <div class="ps-3">
                                <small class="text-body">Khas Indonesia</small>
                                <h6 class="mt-n1 mb-0">Nasi Kuning</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#nasi-pecel">
                            <i class="fas fa-2x fa-utensils"></i>
                            <div class="ps-3">
                                <small class="text-body">Khas Indonesia</small>
                                <h6 class="mt-n1 mb-0">Nasi Pecel</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                            href="#nasi-ayam-crispy">
                            <i class="fas fa-2x fa-drumstick-bite"></i>
                            <div class="ps-3">
                                <small class="text-body">Populer</small>
                                <h6 class="mt-n1 mb-0">Nasi Ayam Crispy</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                            href="#minuman">
                            <i class="fas fa-2x fa-coffee"></i>
                            <div class="ps-3">
                                <small class="text-body">Fresh!</small>
                                <h6 class="mt-n1 mb-0">Minuman</h6>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    @foreach (['gado-gado' => $gadoGado, 'soto' => $soto, 'nasi-campur' => $nasiCampur, 'nasi-kuning' => $nasiKuning, 'nasi-pecel' => $nasiPecel, 'nasi-ayam-crispy' => $nasiAyamCrispy, 'minuman' => $minuman] as $id => $items)
                        <div id="{{ $id }}" class="tab-pane fade show p-0 {{ $loop->first ? 'active' : '' }}">
                            <div class="row g-4">
                                @foreach ($items as $item)
                                    @include('main.components.menu-item', [
                                        'item' => $item,
                                        'isLiked' => in_array($item->id, $likedItems),
                                    ])
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.like-btn').click(function() {
                console.log('clicked');
                let button = $(this);
                let slug = button.data('slug');
                let isLiked = button.data('liked') === 'true';

                $.ajax({
                    url: "/menu/" + slug + "/like",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        button.find("i").toggleClass("fas far");
                        button.attr("data-liked", response.liked ? "true" : "false");
                        setTimeout(() => button.blur(), 50);
                    }
                });
            });
        });
    </script>
@endpush
