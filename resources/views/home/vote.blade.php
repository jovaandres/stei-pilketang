@extends('layouts.home')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 p-5 pt-2">
                <div class="bg-not-dark text-center">
                    <h3 class="ml-1 text-gray"><i class="fas fa-vote-yea mr-2 text-gray"></i>VOTE SYSTEM</h3>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif

                @if (session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed')}}
                    </div>
                @endif
                <hr/>

                <form method="POST" action="{{ route('home.vote') }}">
                    @csrf
                    <div class="row">
                        <div class="card-block pl-3 pr-3" style="width: 20rem;">
                            <img class="card-img-top" src="./img/lingga.png" alt="Card image cap">
                            <div class="card-body">
                                <div class="InputGroup">
                                    <input type="radio" name="calon" id="lingga" value="lingga"/>
                                    <label for="lingga" style="font-size: 35px;" class="text-dark">Lingga</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-block ml-lg-3 pl-3 pr-3" style="width: 20rem;">
                            <img class="card-img-top" src="./img/gede.png" alt="Card image cap">
                            <div class="card-body">
                                <div class="InputGroup">
                                    <input type="radio" name="calon" id="gede" value="gede"/>
                                    <label for="gede" style="font-size: 35px;" class="text-dark">Gede</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container bg-primary text-white p-3">
                                <h1>Masukkan Token</h1>
                                <div class="form-group">
                                    <input type="text" name="token" class="form-control  @error('token') is-invalid @enderror" placeholder="Token" >
                                    @error('token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" id="submit" class="btn btn-danger btn-block">
                                    PILIH
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /#page-content-wrapper -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn-primary">Top</button>
    </div>
@endsection

@section('custom-script')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"
    ></script>
@endsection
