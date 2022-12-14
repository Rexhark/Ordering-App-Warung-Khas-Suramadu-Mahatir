@extends('layouts.app')

@section('title', 'Edit '.$food->name)

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
                    <a href="{{ url('dashboard/makanan/'.$food->slug) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{$food->name}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('dashboard/makanan') }}">Makanan</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('dashboard/makanan/'.$food->slug) }}">{{$food->name}}</a></div>
                    <div class="breadcrumb-item active">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit {{$food->name}}</h2>
                <p class="section-lead">
                    Pada halaman ini Anda bisa mengubah data {{$food->name}} pada database dengan mengubah kolom di bawah.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit {{$food->name}}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('dashboard/makanan/edit/'.$food->slug) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input name="id" class="form-control" type="number" value="{{ $food->id }}" hidden>
                                    <input name="image_lama" class="form-control" type="string" value="{{ $food->image }}" hidden>
                                    {{-- Nama --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Makanan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $food->name }}" required autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Kategori --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="kategori" class="form-control selectric @error('kategori') is-invalid @enderror" required>
                                                @foreach ($kategori as $a)
                                                <option value={{ $a->id }} @if($a->id == $food->category_id) selected @endif >{{ $a->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Tags --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="tag" type="text" class="form-control inputtags @error('tag') is-invalid @enderror"> 
                                            @error('tag')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small>*Kosongkan kolom tag bila tidak ingin mengganti semua tag!</small>
                                        </div>
                                    </div>
                                    {{-- Harga --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                                        <div class="input-group col-sm-12 col-md-7">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input name="price" type="number" class="form-control currency @error('price') is-invalid @enderror" step="1000" value="{{ $food->price }}" required>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Deskripsi --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="description" class="summernote-simple @error('description') is-invalid @enderror" required>{{ $food->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Gambar --}}
                                    <div class="form-group row mb-4">
                                        <label for="image" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Makanan (Opsional)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih Gambar</label>
                                                <input name="image" type="file" accept="image/*" id="image-upload" class="@error('image') is-invalid @enderror">
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Submit Button --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
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
