@extends('layouts.app')

@section('title', $category->name)

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
                <h1>{{$category->name}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('dashboard/makanan') }}">Makanan</a></div>
                    <div class="breadcrumb-item active">{{$category->name}}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{$category->name}}</h2>
                <p class="section-lead">Berikut merupakan daftar makanan di kategori {{$category->name}}.</p>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($food as $m)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-c rounded shadow-sm">
                                    <div class="article-header">
                                        <div class="article-image rounded-top" data-background="{{ asset('storage/'.$m->image) }}">
                                        </div>
                                    </div>
                                    <div class="article-details rounded-bottom">
                                        <div class="article-category">
                                            <a style="pointer-events: none; cursor: default;">Rp{{ $m->price }}</a>
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
