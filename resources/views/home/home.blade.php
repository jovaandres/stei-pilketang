@extends('layouts.home')

@section('content')
    <div class="p-5 pt-2">
        <div class="bg-not-dark text-center">
            <h3 class="text-white"><i class="fas fa-user-friends mr-2 text-white"></i>DASHBOARD</h3>
        </div>
        <div class="row text-white">
            <div class="card bg-dark ml-3" style="width: 18rem">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-vote-yea mr-3"></i>
                    </div>
                    <h5 class="card-title">Informasi</h5>
                    @if(config('app.enable_vote'))
                        <h2><b>Vote Day</b></h2>
                        <a href="{{ route('home.vote') }}">
                            <p class="card-text text-white">
                                Area Vote
                                <i class="fas fa-angle-double-right ml-2"></i>
                            </p>
                        </a>
                    @elseif(config('app.enable_claim_token'))
                        <h2>Token Day</h2>
                        <a href="{{ route('home.token') }}">
                            <p class="card-text text-white">
                                Area Token
                                <i class="fas fa-angle-double-right ml-2"></i>
                            </p>
                        </a>
                    @elseif(config('app.enable_see_result'))
                        <h2><b>Hari Pengumuman</b></h2>
                        <a id="result" href="{{ route('vote.result') }}">
                        <p class="card-text text-white">
                            Lihat Hasil
                            <i class="fas fa-angle-double-right ml-2"></i>
                        </p>
                        </a>
                    @else
                        <h2><b>Hari Pengumuman</b></h2>
                        <p class="card-text text-white">
                            Lihat hasil
                            <i class="fas fa-angle-double-right ml-2"></i>
                        </p>
                    @endif
                </div>
            </div>

            <div class="card bg-primary ml-3" style="width: 18rem">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-calendar-alt mr-3"></i>
                    </div>
                    <h5 class="card-title">Countdown</h5>
                    <div class="display-4" style="font-size: 30px">
                        <div id="countdown"></div>
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
                        class="btn btn-grad btn-grad-red"
                        style="display: initial;"
                        target="_blank"
                    >Ikuti</a>
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
                    <h5 class="card-title text-warning">Narahubung</h5>
                    <p style="color: black; font-size: 18px">
                        Kevin Roni: <i class="fab fa-line mr-1"></i>kevinroni
                        <br/>Zakie: <i class="fab fa-line mr-1"></i>pwzakie
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        // Based on UTC
        const countDownDate = new Date("Oct 31, 2020 5:00:00").getTime();

        var x = setInterval(function () {
            $.getJSON('http://time.jsontest.com/', function (data) {
                var utc_date = new Date(data.milliseconds_since_epoch).toUTCString()
                var month = utc_date.substring(8, 11)
                var day = utc_date.substring(5, 7)
                var year = utc_date.substring(12, 16)
                var time = utc_date.substring(17, 25)

                now = new Date(month + " " + day + ", " + year + " " + time)
            });

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            if (distance <= 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = 0 + "d " + 0 + "h "
                    + 0 + "m " + 0 + "s ";
            }
        }, 1000);
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection
