@extends('layouts.app')

@section('title', 'Makanan')

@push('style')
    <!-- CSS Libraries -->
    <style>
        .modal-backdrop {
            /* bug fix - no overlay */    
            display: none;    
        }
    
        .modal{
            /* bug fix - custom overlay */   
            background-color: rgba(10,10,10,0.45);
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Makanan</h1>
                <div class="section-header-button">
                    <a href="{{ url('dashboard/makanan/tambah') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active">Makanan</div>
                </div>
            </div>
            
            <div class="container-fluid">
                @include('components.message')
            </div>

            <div class="section-body">
                <h2 class="section-title">Daftar Makanan</h2>
                <p class="section-lead">Berikut merupakan daftar makanan.</p>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($makanan as $m)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-c rounded shadow-sm">
                                    <div class="article-header">
                                        <div class="article-image rounded-top" data-background="{{ asset('storage/'.$m->image) }}">
                                        </div>
                                    </div>
                                    <div class="article-details rounded-bottom">
                                        <div class="article-category"><a href="{{ url('dashboard/kategori/'.$m->category->name) }}">{{ $m->category->name }}</a>
                                            <div class="bullet"></div><a style="pointer-events: none; cursor: default;">Rp{{ $m->price }}</a>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="article-title">
                                            <h2><a href="{{ url('dashboard/makanan/'.$m->slug) }}">{{ $m->name }}</a></h2>
                                        </div>
                                        <p>{{ strip_tags($m->description) }}</p>
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col">
                                                <button type="button" class="col btn btn-danger mx-2 rounded-pill" data-toggle="modal" data-target="#hapusdata{{$m->id}}">Hapus</button>
                                                {{-- Modal Delete --}}
                                                <div class="modal fade" id="hapusdata{{$m->id}}" tabindex="-1" aria-labelledby="hapusdata{{$m->id}}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusdata{{$m->id}}">Konfirmasi Hapus Makanan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Apakah anda yakin ingin menghapus makanan ini?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="makanan/hapus" method="post">   
                                                                    @csrf
                                                                    @method('delete')
                                                                    <input type="text" name="id" class="form-control" value="{{$m->id}}" hidden>
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
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
