@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-warning mb-0">
        <div class="card-header justify-content-center p-0">
            <h4 class="text-warning">Login</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="login" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" tabindex="1" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                            <a href="{{ url('auth-forgot-password') }}" class="text-small text-warning" style="text-decoration: none">
                                Lupa password?
                            </a>
                        </div>
                    </div>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" tabindex="2" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-muted mt-3 text-center">
        Belum punya akun? <a href="{{ url('daftar') }}" class="text-warning" style="text-decoration: none">Daftar di sini!</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
@endpush
