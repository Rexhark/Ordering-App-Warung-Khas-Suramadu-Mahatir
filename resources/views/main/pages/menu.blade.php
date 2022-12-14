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
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#gado-gado">
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
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#nasi-ayam-crispy">
                            <i class="fas fa-2x fa-drumstick-bite"></i>
                            <div class="ps-3">
                                <small class="text-body">Populer</small>
                                <h6 class="mt-n1 mb-0">Nasi Ayam Crispy</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#minuman">
                            <i class="fas fa-2x fa-coffee"></i>
                            <div class="ps-3">
                                <small class="text-body">Fresh!</small>
                                <h6 class="mt-n1 mb-0">Minuman</h6>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="gado-gado" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @foreach ($gadoGado as $a)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$a->image) }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $a->name }}</span>
                                            <span class="text-primary">Rp{{ $a->price }}</span>
                                        </h5>
                                        <div class="d-flex justify-content-between">
                                            <small class="fst-italic">{{ strip_tags($a->description) }}</small>
                                            <div>
                                                <a href="{{ url('menu/'.$a->slug.'/like') }}"><button class="btn btn-primary rounded-pill py-2"><i class="far fa-heart text-light"></i></button></a>
                                                <a href="{{ url('menu/'.$a->slug.'/beli') }}"><button class="btn btn-primary rounded-pill py-2"><i class="fas fa-plus text-light"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="soto" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            @foreach ($soto as $a)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$a->image) }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $a->name }}</span>
                                            <span class="text-primary">Rp{{ $a->price }}</span>
                                        </h5>
                                        <div class="d-flex justify-content-between">
                                            <small class="fst-italic">{{ strip_tags($a->description) }}</small>
                                            <div>
                                                <a href="{{ url('menu/'.$a->slug.'/like') }}"><button class="btn btn-primary rounded-pill py-2"><i class="far fa-heart text-light"></i></button></a>
                                                <a href="{{ url('menu/'.$a->slug.'/beli') }}"><button class="btn btn-primary rounded-pill py-2"><i class="fas fa-plus text-light"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="nasi-campur" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            @foreach ($nasiCampur as $a)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$a->image) }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $a->name }}</span>
                                            <span class="text-primary">Rp{{ $a->price }}</span>
                                        </h5>
                                        <div class="d-flex justify-content-between">
                                            <small class="fst-italic">{{ strip_tags($a->description) }}</small>
                                            <div>
                                                <a href="{{ url('menu/'.$a->slug.'/like') }}"><button class="btn btn-primary rounded-pill py-2"><i class="far fa-heart text-light"></i></button></a>
                                                <a href="{{ url('menu/'.$a->slug.'/beli') }}"><button class="btn btn-primary rounded-pill py-2"><i class="fas fa-plus text-light"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="nasi-kuning" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            @foreach ($nasiKuning as $a)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$a->image) }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $a->name }}</span>
                                            <span class="text-primary">Rp{{ $a->price }}</span>
                                        </h5>
                                        <div class="d-flex justify-content-between">
                                            <small class="fst-italic">{{ strip_tags($a->description) }}</small>
                                            <div>
                                                <a href="{{ url('menu/'.$a->slug.'/like') }}"><button class="btn btn-primary rounded-pill py-2"><i class="far fa-heart text-light"></i></button></a>
                                                <a href="{{ url('menu/'.$a->slug.'/beli') }}"><button class="btn btn-primary rounded-pill py-2"><i class="fas fa-plus text-light"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="nasi-pecel" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            @foreach ($nasiPecel as $a)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$a->image) }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $a->name }}</span>
                                            <span class="text-primary">Rp{{ $a->price }}</span>
                                        </h5>
                                        <div class="d-flex justify-content-between">
                                            <small class="fst-italic">{{ strip_tags($a->description) }}</small>
                                            <div>
                                                <a href="{{ url('menu/'.$a->slug.'/like') }}"><button class="btn btn-primary rounded-pill py-2"><i class="far fa-heart text-light"></i></button></a>
                                                <a href="{{ url('menu/'.$a->slug.'/beli') }}"><button class="btn btn-primary rounded-pill py-2"><i class="fas fa-plus text-light"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="nasi-ayam-crispy" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            @foreach ($nasiAyamCrispy as $a)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$a->image) }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $a->name }}</span>
                                            <span class="text-primary">Rp{{ $a->price }}</span>
                                        </h5>
                                        <div class="d-flex justify-content-between">
                                            <small class="fst-italic">{{ strip_tags($a->description) }}</small>
                                            <div>
                                                <a href="{{ url('menu/'.$a->slug.'/like') }}"><button class="btn btn-primary rounded-pill py-2"><i class="far fa-heart text-light"></i></button></a>
                                                <a href="{{ url('menu/'.$a->slug.'/beli') }}"><button class="btn btn-primary rounded-pill py-2"><i class="fas fa-plus text-light"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="minuman" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            @foreach ($minuman as $a)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/' . $a->image) }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $a->name }}</span>
                                            <span class="text-primary">Rp{{ $a->price }}</span>
                                        </h5>
                                        <div class="d-flex justify-content-between">
                                            <small class="fst-italic">{{ strip_tags($a->description) }}</small>
                                            <div>
                                                <a href="{{ url('menu/'.$a->slug.'/like') }}"><button class="btn btn-primary rounded-pill py-2"><i class="far fa-heart text-light"></i></button></a>
                                                <a href="{{ url('menu/'.$a->slug.'/beli') }}"><button class="btn btn-primary rounded-pill py-2"><i class="fas fa-plus text-light"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection