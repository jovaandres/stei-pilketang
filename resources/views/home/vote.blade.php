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
                @elseif(!Auth::user()->is_token_claimed || !Auth::user()->is_notice_read)
                    <div class="token_container bg-white">
                        <h3 class="text-danger p-2">Kamu belum klaim token.</h3>
                        <h6 class="p-2">Klaim token terlebih dahulu untuk vote.</h6>
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

                    <form id="submitVote" method="POST" action="{{ route('vote.submit') }}">
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
                                    <button data-target="#confirmVote" data-toggle="modal" type="button" class="btn-grad btn btn-block">
                                        PILIH
                                    </button>
                                </div>
                                <div class="modal fade" id="confirmVote" tabindex="-1" role="dialog" aria-labelledby="confirmVoteTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmVoteTitle">Vote</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p id="modal-body">Apakah kamu yakin dengan pilihan kamu?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">TIDAK</button>
                                                <button type="submit" class="btn btn-grad" form="submitVote" onclick="this.disabled=true; this.form.submit();">YA</button>
                                            </div>
                                        </div>
                                    </div>
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
