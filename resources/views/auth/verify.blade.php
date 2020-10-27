@extends('layouts.sso')

@section('custom-head')
    <title>Verifikasi Email</title>
@endsection

@section('content')
    <form method="POST" action="{{ route('verification.resend') }}" class="rounded form-signin bg-light">
        @csrf
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                Verifikasi email baru sudah dikirim ke email anda.
            </div>
        @endif
        <h2>Halo, {{ Auth::user()->name }}!</h2>
        <p>
            Untuk melanjutkan ke dashboard, harap verifikasi email anda terlebih dahulu.
        </p>
        <p>Tidak menerima email?</p>
        <button class="btn-grad btn btn-lg btn-block mb-2" type="submit">
            Kirim Ulang Verifikasi Email
        </button>
        <a class="text-danger" href="#"
           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </form>
@endsection
