@extends('layouts.sso')

@section('custom-head')
    <title>Buat Akun</title>
@endsection

@section('content')
    <form method="POST" action="{{ route('register') }}" class="roundedd form-signup bg-light">
        @csrf
        <img class="mb-4" src="{{ asset('img/logo.png') }}" alt="logo stei" height="80px" />
        <h1 class="h3 mb-3 font-weight-normal">Buat Akun</h1>

        <input
            type="text"
            id="inputNama"
            class="form-control my-2 @error('name') is-invalid @enderror"
            placeholder="Nama"
            value="{{ old('name') }}"
            name="name"
            required
            autofocus
        />
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input
            type="email"
            id="inputEmail"
            class="form-control my-2 @error('email') is-invalid @enderror"
            placeholder="Alamat Email"
            value="{{ old('email') }}"
            name="email"
            required
        />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input
            type="password"
            id="inputPassword"
            class="form-control my-2 @error('password') is-invalid @enderror"
            placeholder="Password"
            name="password"
            required
        />
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input
            type="password"
            id="inputKonfirmasi"
            class="form-control"
            placeholder="Konfirmasi Password"
            name="password_confirmation"
            required
        />

        <button class="btn-grad btn btn-lg btn-block mt-4" type="submit">
            Daftar
        </button>
        <p class="mt-3"><a href="{{ route('login') }}">Sudah punya akun</a></p>
    </form>
@endsection
