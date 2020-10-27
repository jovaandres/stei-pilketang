@extends('layouts.home')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="p-5 pt-2">
                @if(Auth::user()->is_voted)
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="token_container bg-white">
                        <h3 class="text-danger p-2">Kamu sudah memilih ketang. 1 akun + 1 token hanya bisa digunakan untuk 1
                            vote.</h3>
                        <h3 class="p-2">Ditunggu pengumumannya ;D</h3>
                    </div>
                @else
                    <div class="bg-not-dark text-center">
                        <h3 class="ml-1 text-white"><i class="fas fa-vote-yea mr-2 text-white"></i>VOTE SYSTEM</h3>
                    </div>

                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif

                    @error ('calon')
                    <div class="alert alert-danger text-center">
                        <strong>Anda harus memilih</strong>
                    </div>
                    @enderror
                    <hr/>

                    <form method="POST" action="{{ route('vote.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="card-block pl-3 pr-3" style="width: 20rem;">
                                <img class="card-img-top" src="{{ asset('img/lingga.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <div class="InputGroup">
                                        <input type="radio" name="calon" id="lingga" value="lingga"/>
                                        <label for="lingga" style="font-size: 35px;" class="text-dark">Lingga</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block ml-lg-3 pl-3 pr-3" style="width: 20rem;">
                                <img class="card-img-top" src="{{ asset('img/gede.png') }}" alt="gede">
                                <div class="card-body">
                                    <div class="InputGroup">
                                        <input type="radio" name="calon" id="gede" value="gede"/>
                                        <label for="gede" style="font-size: 35px;" class="text-dark">Gede</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="container bg-white text-center text-black-50 p-3">
                                    <h1>Masukkan Token</h1>
                                    <div class="form-group">
                                        <input type="text" name="token"
                                               class="form-control  @error('token') is-invalid @enderror"
                                               value="{{ old('token') }}"
                                               placeholder="Token">
                                        @error('token')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" id="submit" class="btn-grad btn btn-block">
                                        PILIH
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>

        </div>
    </div>
@endsection

@section('custom-script')

@endsection
