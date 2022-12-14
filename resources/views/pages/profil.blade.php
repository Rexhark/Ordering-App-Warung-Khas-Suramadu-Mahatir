@extends('layouts.app')

@section('title', 'Profil')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content @if(auth()->user()->role == 'user') pl-5 @endauth">
        <section class="section">
            <div class="section-header">
                <h1>Profil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profil</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ auth()->user()->username }}!</h2>
                <p class="section-lead">
                    Ubah informasi akun Anda di bawah.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card author-box card-primary">
                            <div class="card-body">
                                <div class="author-box-left">
                                    <img alt="image"
                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                        class="rounded-circle author-box-picture">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="author-box-details">
                                    <div class="author-box-name">
                                        <a style="pointer-events: none; cursor: default;">{{ auth()->user()->name }}</a>
                                    </div>
                                    <div class="author-box-job">{{ Str::title(auth()->user()->role) }}</div>
                                    <div class="author-box-description">
                                        {{ auth()->user()->biography }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Edit Profil</h4>
                            </div>
                            <div class="container-fluid">
                                @include('components.message')
                            </div>
                            <div class="card-body">
                                <form action="profil/edit" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input name="id" class="form-control" type="text" value="{{ auth()->user()->id }}" hidden>
                                    <input name="image_lama" class="form-control" type="string" value="{{ auth()->user()->image }}" hidden>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Lengkap</label>
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Username</label>
                                            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ auth()->user()->username }}" required>
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Role</label>
                                            <select name="role" class="form-control selectric @error('role') is-invalid @enderror" @if (auth()->user()->role == 'user') disabled @endif>
                                                <option value="admin" @if (auth()->user()->role == 'admin') selected @endif>Admin</option>
                                                <option value="user" @if (auth()->user()->role == 'user') selected @endif>User</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Password Lama</label>
                                            <input name="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror">
                                            @error('password_lama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Password Baru</label>
                                            <input name="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror">
                                            @error('password_baru')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 m-0 text-center">
                                            <label for="image" class="form-label pb-2">Foto Profil</label>
                                            <div class="d-flex justify-content-center">
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Pilih file</label>
                                                    <input name="image" type="file" accept="image/*" id="image-upload" class="@error('image') is-invalid @enderror">
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 m-0">
                                            <label>Bio</label>
                                            <textarea name="biography" class="form-control summernote-simple">{{ auth()->user()->biography }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <small>*Kosongkan kolom password bila tidak ingin ganti password</small>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 m-0">
                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
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

    <!-- Page Specific JS File -->
@endpush
