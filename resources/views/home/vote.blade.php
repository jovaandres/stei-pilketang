@extends('layouts.home')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="px-2 pt-2">
                @if(Auth::user()->is_voted)
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="token_container bg-white">
                        <h3 class="text-danger p-2">Kamu sudah melakukan voting!. 1 akun + 1 token hanya bisa digunakan
                            untuk 1
                            vote.</h3>
                        <h5 class="p-2">Untuk memeriahkan voting, kamu bisa screenshot bukti voting kamu
                            <span>
                                <a href="{{ route('vote.identifier', [ 'identifier' => base64_encode(Auth::user()->identifier_id) ]) }}">disini</a>.
                            </span>
                            Barcode tidak perlu di sensor karena hanya sebagai fingerprint/unique identifier
                            peserta vote dan tidak terasosiasi dengan data sensitif kamu kok!<br>
                            Jangan lupa share di Instagram dan tag @stei20itb ya!</h5>
                        <h6 class="p-2">Ditunggu pengumumannya ;D</h6>
                    </div>
                @elseif(!Auth::user()->is_token_claimed || !Auth::user()->is_notice_read)
                    <div class="token_container bg-white">
                        <h3 class="text-danger p-2">Kamu belum klaim token.</h3>
                        <h6 class="p-2">Klaim token terlebih dahulu untuk vote.</h6>
                    </div>
                @else
                    <div class="bg-not-dark text-center">
                        <h3 class="py-2 ml-1 text-white"><i class="fas fa-vote-yea mr-2 text-white"></i>VOTE SYSTEM</h3>
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
                        <div class="middle">
                            <label>
                                <input type="radio" name="calon" id="calon2" value="timothy"/>
                                <div class="check box" style="
                                    background-image: url({{ asset("img/calon-02.png") }});">
                                    <span>Calon 02</span>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="calon" id="calon3" value="steven"/>
                                <div class="check box" style="
                                    background-image: url({{ asset("img/calon-03.png") }});">
                                    <span>Calon 03</span>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="calon" id="calon4" value="hassan"/>
                                <div class="check box" style="
                                    background-image: url({{ asset("img/calon-04.png") }});">
                                    <span>Calon 04</span>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="calon" id="calon5" value="nadhira"/>
                                <div class="check box" style="
                                    background-image: url({{ asset("img/calon-05.png") }});">
                                    <span>Calon 05</span>
                                </div>
                            </label>
                        </div>

                        <div class="card text-center">
                            <div class="card-header">
                                Wakil TPB STEI 2020
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">TOKEN SPESIAL</h5>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('token') is-invalid @enderror"
                                           placeholder="Token" aria-label="Token"
                                           value="{{ old('token') }}" name="token" aria-describedby="basic-addon1">
                                    @error('token')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-danger"
                                        data-target="#confirmVote" data-toggle="modal">VOTE</button>
                            </div>
                            <div class="modal fade" id="confirmVote" tabindex="-1" role="dialog"
                                 aria-labelledby="confirmVoteTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmVoteTitle">Vote</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p id="modal-body">Apakah kamu yakin dengan pilihan kamu?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                TIDAK
                                            </button>
                                            <button type="submit" class="btn btn-grad" form="submitVote"
                                                    onclick="this.disabled=true; this.form.submit();">YA
                                            </button>
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
    <script>
        var calonId = {"timothy": 2, "steven": 3, "hassan": 4, "nadhira": 5};
        var calon = "{{ old("calon", 0) }}";
        if (calon !== "0")
        {
            $("#calon" + calonId[calon].toString()).prop("checked", true);
        }
    </script>
@endsection
