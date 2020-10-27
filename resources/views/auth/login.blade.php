@extends('layouts.sso')

@section('custom-head')
    <title>Masuk</title>
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}" class="roundedd form-signin bg-light">
        @csrf
        <img class="mb-4" src="{{ asset('img/logo.png') }}" alt="logo stei" height="80px" />
        <h1 class="h3 mb-3 font-weight-normal">Masuk</h1>
        <label for="inputEmail" class="sr-only">Alamat Email</label>
        <input
            type="email"
            id="inputEmail"
            class="form-control my-2 @error('email') is-invalid @enderror"
            placeholder="Alamat Email"
            name="email"
            autocomplete="email"
            value="{{ old('email') }}"
            required
            autofocus
        />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="inputPassword" class="sr-only">Password</label>
        <input
            type="password"
            id="inputPassword"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Password"
            autocomplete="password"
            name="password"
            required
        />
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="checkbox mb-2">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} /> Ingat saya
            </label>
        </div>
        <button class="btn-grad btn btn-lg btn-primary btn-block mb-2" type="submit">
            Masuk
        </button>
        <p>
            <a href="{{ route('password.request') }}">Lupa Password?</a><br />
            <a href="{{ route('register') }}">Buat akun</a>
        </p>
    </form>
@endsection
