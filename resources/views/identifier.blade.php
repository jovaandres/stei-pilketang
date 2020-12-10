@extends('layouts.sso')

@section('custom-head')
    <title>Identitas Voting</title>
@endsection

@section('content')
    <div class="form-signin bg-white rounded">
        @if(!is_null($user))
            <h1 class="mb-4">Voting Wakil TPB</h1>
            {!! QrCode::size(250)->color(75,0,130)->generate(config('app.url').'/identity/'.base64_encode($user->identifier_id)); !!}
            <p class="mt-1 font-italic text-muted">Scan barcode untuk verifikasi keaslian cap ini</p>
            <p class="mt-4">Nama: {{ $user->name }}<br/>
            Status: {!! $user->is_voted ? '<span class="text-success">Sudah Vote</span>':'<span class="text-danger">Belum Vote</span>' !!}
            </p>
        @else
            <h1 class="text-danger">Cap tidak valid</h1>
        @endif
    </div>
@endsection
