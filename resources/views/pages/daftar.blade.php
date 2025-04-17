@extends('layouts.auth')

@section('title', 'Daftar')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-warning m-0">
        <div class="card-header justify-content-center">
            <h4 class="text-center text-warning">Daftar User</h4>
        </div>

        <div class="card-body">
            <form action="daftar" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">Nama</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="password" class="d-block">Password</label>
                        <input name="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator">
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="password_confirmation" class="d-block">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="biography">Biografi (Opsional)</label>
                    <textarea name="biography" class="form-control">{{ old('biography') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Foto Profil (Opsional)</label>
                    <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" value="{{ old('image') }}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" hidden>
                    <label for="role" class="form-label">Role</label>
                    <input name="role" class="form-control" type="text" value="user">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-lg btn-block">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-muted mt-3 mb-4 text-center">
        Sudah punya akun? <a href="{{ url('login') }}" class="text-warning" style="text-decoration: none">Login di sini!</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
