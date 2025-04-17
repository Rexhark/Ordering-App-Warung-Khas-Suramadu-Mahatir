@extends('layouts.app')

@section('title', 'Tambah User Baru')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url('dashboard/user') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Tambah User Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">User</a></div>
                    <div class="breadcrumb-item">Tambah User Baru</div>
                </div>
            </div>
            
            <div class="container-fluid">
                @include('components.message')
            </div>

            <div class="section-body">
                <h2 class="section-title">Tambah User Baru</h2>
                <p class="section-lead">
                    Pada halaman ini Anda bisa memasukkan user baru pada database dengan mengisi semua kolom.
                </p>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan Data Makanan</h4>
                            </div>
                            <div class="card-body">
                                <form action="tambah" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Name --}}
                                    <div class="form-group row mb-4">
                                        <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Username --}}
                                    <div class="form-group row mb-4">
                                        <label for="username" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Email --}}
                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Password --}}
                                    <div class="form-group row mb-4">
                                        <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                        <div class="input-group col-sm-12 col-md-7">
                                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Biografi --}}
                                    <div class="form-group row mb-4">
                                        <label for="biography" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biografi (Opsional)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="biography" class="summernote-simple">{{ old('biography') }}</textarea>
                                        </div>
                                    </div>
                                    {{-- Gambar --}}
                                    <div class="form-group row mb-4">
                                        <label for="image" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil (Opsional)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input name="image" type="file" accept="image/*" id="image-upload" class="@error('image') is-invalid @enderror" value="{{ old('image') }}">
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Role --}}
                                    <div class="form-group row mb-4">
                                        <label for="role" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="role" class="form-control selectric @error('role') is-invalid @enderror" required>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Submit Button --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Buat User</button>
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
