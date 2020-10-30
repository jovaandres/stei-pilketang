@extends('layouts.sso')

@section('custom-head')
    <title>Ketua Angkatan STEI 2020</title>
    <style>
        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(1.1);
        }

        div {
            animation-name: jeng;
            animation-duration: 4s;
            position: relative;
        }

        @keyframes jeng {
            0% {
                top: -400px;
            }
            100% {
                top: 0;
            }
        }

        body {
            background-image: url("img/congrats.png");
            background-size: cover;
        }

        .bg-not-dark {
            background-color: rgba(22, 22, 22, 0.4);
            backdrop-filter: blur(2px);
        }

        hr {
            background-color: white;
        }
    </style>
@endsection

@section('content')
    <div id="ketang" class="text-white p-5 pt-2 mt-auto mb-auto ml-auto mr-auto container-fluid" style="display: none">
        <div class="bg-not-dark text-center mt-2 mb-5">
            <h3 class="text-white"><i class="fas fa-user-friends mr-2 text-white"></i>KETUA ANGKATAN STEI 2020</h3>
        </div>
        <div class="row">
            <div class="zoom card ml-auto mr-auto mb-5" style="width: 20rem; background-color: #1c2329">
                <img id="image" class="card-img-top" alt="Foto Ketua Angkatan">
                <div class="card-body">
                    <h4 id="name" class="card-title"></h4>
                    <h6 class="no-class">{{ $result }}</h6>
                </div>
            </div>

            <div class="zoom card ml-auto mr-auto" style="width: 44rem; background-color: #1c2329">
                <div class="card-body position-relative">
                    <h4>Visi</h4>
                    <hr>
                    <p id="visi"></p><br>
                    <h4>Misi</h4>
                    <hr>
                    <ol id="misi" class="text-left"></ol>
                </div>
            </div>
            <div class="zoom card ml-auto mr-auto mt-5" style="width: 44rem; background-color: #1c2329">
                <div class="card-body position-relative">
                    <h4>Informasi Tambahan</h4>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <img id="my-button" src="{{ asset('img/card.jpg') }}"
         class="zoom ml-auto mr-auto" alt="Card" style="width: 100%; max-width: 510px; position: relative">
@endsection

@section('custom-script')
    <script type="module">

        $('#my-button').click(function () {
            $('#ketang').toggle('slow', function () {
            });
            $('#my-button').hide();
        });

        const panggilan = document.querySelector(".no-class").textContent;
        const image = document.getElementById('image');
        const name = document.getElementById('name');
        const visi = document.getElementById('visi');
        const misi = document.getElementById('misi');
        if (panggilan === 'lingga') {
            image.src = 'img/lingga.png';
            name.innerHTML = "Lingga Aradhana Sahadewa"
            visi.innerHTML = "Menjadikan STEI'20 sebagai angkatan yang solid, inovatif, dan berintegritas yang mampu memberikan kontribusi kepada lingkungan di sekitarnya serta mampu menjadi pelopor dalam bersinergi dan berkolaborasi dengan seluruh civitas akademika Institut Teknologi Bandung"
            misi.innerHTML = '<li>Mempererat tali persaudaraan seluruh anggota STEI\'20</li>\n' +
                '            <li>Mengajak seluruh anggota STEI\'20 untuk memanfaatkan lingkungan kampus sebagai wadah\n' +
                '                pengembangan dan aktualisasi diri\n' +
                '            </li>\n' +
                '            <li>Menjalin serta menjaga hubungan baik dengan seluruh civitas akademika ITB</li>\n' +
                '            <li>Mengembangkan budaya aktif berkontribusi terhadap lingkungan dan masyarakat sekitar</li>'
        } else if (panggilan === 'gede') {
            image.src = 'img/gede.png';
            name.innerHTML = "I Gede Arya Raditya Parameswara"
            visi.innerHTML = "Menciptakan keluarga STEI 20 yang unggul dalam bidangnya, non-individualis, serta saling bahu membahu dengan tetap mengutamakan pribadi yang berkarakter."
            misi.innerHTML = '      <li>Menyelenggarakan program kerja yang dapat menyatukan keluarga STEI 20.</li>\n' +
                '                    <li>Menyediakan sebuah tempat di mana mahasiswa dapat berbagi ilmu serta belajar dengan efektif.\n' +
                '                    </li>\n' +
                '                    <li>Menyediakan suatu ruang yang kondusif sehingga tidak ada mahasiswa yang kurang informasi.</li>'
        }
    </script>
@endsection
