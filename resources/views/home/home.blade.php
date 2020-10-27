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
                    <div class="display-4">Vote Day</div>
                    <a href="{{ url('/vote') }}">
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
                    <h5 class="card-title">Tanggal dan Waktu</h5>
                    <div class="display-4" style="font-size: 30px">
                        <div id="clockbox"></div>
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
@endsection
