@extends('layouts/home')

@section('content')

    @if(!$user->is_notice_read)
        <div class="row d-flex justify-content-center">
            <div class="col-md-14 p-2 pt-2 bg-not-dark">
                <h2 class="text-danger text-center">Silahkan menyetujui aturan klaim token terlebih dahulu di
                    profil</h2>
            </div>
        </div>
    @elseif($user->is_token_claimed)
        <div class="row d-flex justify-content-center">
            <div class="col-md-14 p-2 pt-2 bg-not-dark">
                <h2 class="text-danger">Kamu sudah klaim token.</h2>
            </div>
        </div>
    @else
        <!--token-before-->
        <div id="token-before">
            <div class="token_container container w-50 text-center p-3 my-3 bg-white rounded shadow-sm">
                <div class="lh-100">
                    <h4 class="mb-0 text-black lh-100">
                        Tekan Tombol Berikut untuk Membuat Token
                    </h4>
                    <hr/>
                    <button id="btn-token" type="button" class="btn-grad btn-block btn btn-danger btn-lg"
                    >
                        Buat Token
                    </button>
                </div>
            </div>
        </div>
        <!--token generate-->
        <div id="token-generate" style="display: none;">
            <div class="container bg-light text-center p-3 my-3 rounded">
                <div>
                    <h3 style="color: #ff0000;">SEDANG MEMBUAT TOKEN<br>MOHON JANGAN REFRESH HALAMAN</h3>
                    <div class="progress">
                        <div
                            class="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar"
                            style="width: 100%"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
        <!--token after-->
        <div id="token-after" style="display: none;">
            <div class="token_container container bg-light text-center p-3 my-3 rounded">
                <div>
                    <h3>TOKEN ANDA</h3>
                    <h1 id="token" class="bg-info text-white" style="font-size: 65px; font-family: monospace;"></h1>
                </div>
                <div>
                    <h4 style="color: red;">!!! Silahakan Catat/Simpan Token Anda Secepat dan Seaman Mungkin !!!<br>
                        <span style="font-size: 35px;">TOKEN HANYA MUNCUL SATU KALI</span>
                    </h4>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('custom-script')
    <script type="module">
        !function () {
            var e = $("#token-before"), t = $("#token-generate"), n = $("#token-after");
            $("#btn-token").click(function () {
                e.hide(), t.show();
                var o = new XMLHttpRequest;
                o.onreadystatechange = function () {
                    if (4 === o.readyState && 200 === o.status) {
                        var s = JSON.parse(o.responseText);
                        $("#token").text(s.token), t.hide(), n.show(), window.onbeforeunload = function () {
                            return ""
                        }
                    } else 4 === o.readyState && (alert(o.status + " " + o.statusText + ": " + o.response), t.hide(), e.show())
                }, o.open("POST", "{{ route('token.generate') }}"), o.setRequestHeader("Content-Type", "application/json"), o.send(JSON.stringify({_token: "{{ csrf_token() }}"}))
            })
        }();
    </script>
@endsection
