@extends('layouts.home')

@section('content')
    <div class="col-md-12 p-5 pt-2">
        <h3><i class="fas fa-columns mr-1"></i>DASHBOARD</h3>
        <hr />

        <div class="row text-white">
            <div class="card bg-dark ml-3" style="width: 18rem">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="far fa-question-circle mr-3"></i>
                    </div>
                    <h5 class="card-title">Informasi</h5>
                    <div class="display-4">Sample</div>
                    <a href="">
                        <p class="card-text text-white">
                            Area Voting
                            <i class="fas fa-angle-double-right ml-2"></i>
                        </p>
                    </a>
                </div>
            </div>

            <div class="card bg-primary ml-3" style="width: 18rem">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-calendar-alt mr-3"></i>
                    </div>
                    <h5 class="card-title">Tanggal</h5>
                    <div class="display-4" style="font-size: 40px">
                        Hari, dd/mm/yyyy
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div
                class="card ml-3 text-white text-center"
                style="width: 18rem"
            >
                <div class="card-header bg-danger display-4 pt-4 pb-4">
                    <i class="fab fa-instagram"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-danger">Instagram</h5>
                    <a
                        href="https://www.instagram.com/stei20itb/"
                        class="btn btn-primary btn-danger"
                        target="_blank"
                    >Follow</a>
                </div>
            </div>

            <div
                class="card ml-3 text-white text-center"
                style="width: 18rem"
            >
                <div class="card-header bg-warning display-4 pt-4 pb-4">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-warning">Contact Person</h5>
                    <p style="color: black; font-size: 18px">
                        Kevin Roni: <i class="fab fa-line mr-1"></i>kevinroni
                        <br />Zakie: <i class="fab fa-line mr-1"></i>pwzakie
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
