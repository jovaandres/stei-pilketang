@extends('layouts.home')

@section('content')
    <div class="px-2 pt-2">
        <div class="bg-not-dark text-center">
            <h3 class="text-white py-3"><i class="fas fa-user-friends mr-2 text-white"></i>DASHBOARD</h3>
        </div>
        <div class="row text-white">
            <div class="card bg-dark ml-3" style="width: 18rem">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-vote-yea mr-3"></i>
                    </div>
                    <h5 class="card-title">Informasi</h5>
                    @if(!config('app.is_vote_ended'))
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
                        @else
                            <h2><b>Registration day</b></h2>
                            <p class="card-text text-white">
                                Belum ada yang menarik hari ini. Ditunggu ya!
                                <i class="fas fa-angle-double-right ml-2"></i>
                            </p>
                        @endif
                    @else
                        @if(config('app.enable_see_result'))
                            <h2><b>Hari Pengumuman</b></h2>
                            <a id="result" href="{{ route('vote.result') }}">
                                <p class="card-text text-white">
                                    Lihat Hasil
                                    <i class="fas fa-angle-double-right ml-2"></i>
                                </p>
                            </a>
                        @else
                            <h2><b>Vote has ended</b></h2>
                            <p class="card-text text-white">
                                Tunggu pengumuman selanjutnya ya!
                                <i class="fas fa-angle-double-right ml-2"></i>
                            </p>
                        @endif
                    @endif
                </div>
            </div>

            <div class="card bg-primary ml-3" style="width: 18rem">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-calendar-alt mr-3"></i>
                    </div>
                    @if(config('app.is_vote_ended'))
                        <h5 class="card-title">Countdown</h5>
                        <div class="display-4" style="font-size: 30px">
                            <div id="countdown"></div>
                        </div>
                    @else
                        <h5 class="card-title">Tanggal dan Waktu</h5>
                        <div class="display-4" style="font-size: 30px">
                            <div id="clockbox"></div>
                        </div>
                    @endif
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
                        Farhandika: <i class="fab fa-line mr-1"></i>championarts
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')

    @if(config('app.is_vote_ended'))
    {{--    Countdown Script--}}
    <script>
        // Based on UTC
        const countDownDate = new Date("{{ config('app.countdown_date') }}").getTime();

        var x = setInterval(function () {
            var distance = countDownDate - Date.now();

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
    @else
    {{--    Clock Script--}}
    <script type="text/javascript">
        var tday = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        var tmonth = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        function GetClock() {
            var d = new Date();
            var nday = d.getDay(), ndate = d.getDate(), nmonth = d.getMonth(), nyear = d.getFullYear();
            var nhour = d.getHours(), nmin = d.getMinutes(), nsec = d.getSeconds();
            if (nmin <= 9) nmin = "0" + nmin;
            if (nsec <= 9) nsec = "0" + nsec;
            var clocktext = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + " " + nhour + ":" + nmin + ":" + nsec + "";
            document.getElementById('clockbox').innerHTML = clocktext;
        }

        GetClock();
        setInterval(GetClock, 1000);
    </script>
    @endif
@endsection
