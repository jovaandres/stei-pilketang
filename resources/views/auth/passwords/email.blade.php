@extends('layouts.sso')

@section('custom-head')
    <title>Lupa Password</title>
@endsection

@section('content')
    <form method="POST" action="{{ route('password.email') }}" class="rounded form-signin bg-light">
        @csrf
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <img class="mb-4" src="{{ asset('img/logo.png') }}" alt="logo stei" height="80px" />
        <h1 class="h3 mb-3 font-weight-normal">Lupa Password</h1>
        <label for="inputEmail" class="sr-only">Alamat Email</label>
        <input
            type="email"
            id="inputEmail"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Email address"
            name="email"
            value="{{ old('email') }}"
            autocomplete="email"
            required
            autofocus
        />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">
            Kirim Email Reset Password
        </button>
        <p class="mt-3">
            <a href="{{ route('login') }}">Masuk akun</a><br />
            <a href="{{ route('register') }}">Buat akun</a>
        </p>
    </form>
@endsection
