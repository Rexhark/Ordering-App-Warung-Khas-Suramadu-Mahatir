@extends('layouts.app')

@section('title', $food->name)

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url('dashboard/makanan') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{$food->name}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('dashboard/makanan') }}">Makanan</a></div>
                    <div class="breadcrumb-item active">{{$food->name}}</div>
                </div>
            </div>
            
            <div class="container-fluid">
                @include('components.message')
            </div>
            
            <div class="section-body">
                <h2 class="section-title">{{$food->name}}</h2>
                <p class="section-lead">
                    Ini merupakan halaman detail {{strToLower($food->name)}}.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header p-0">
                                <div class="col-12 p-0">
                                    <div class="hero hero-bg-image hero-bg-parallax text-white p-4 pl-5" style="background-image: url('{{ asset('storage/'.$food->image) }}');">
                                        <div class="hero-inner">
                                            <h2>{{$food->name}}</h2>
                                            {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatedata{{$c->id}}">Edit</button> --}}
                                            <a href="{{ url('dashboard/makanan/edit/'.$food->slug) }}" class="btn btn-outline-white btn-lg btn-icon icon-left">
                                                <i class="fa-solid fa-pencil"></i> Edit
                                            </a> 
                                            <small class="pl-3">Rp.{{ $food->price }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">

                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    {{ $food->description }}
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
