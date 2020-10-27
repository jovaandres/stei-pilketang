@extends('layouts.home')

@section('content')
    <div class="p-5 pt-2">
        <div class="bg-not-dark text-center mb-t">
            <h3 class="text-white"><i class="fas fa-user-friends mr-2 text-white"></i>PROFIL CALON KETUA ANGKATAN</h3>
        </div>
        <div class="row mt-4">
            <div class="card ml-3 mb-3 ml-auto mr-auto border-dark" style="width: 16rem">
                <img src="{{ asset('img/lingga.png') }}" class="card-img-top" alt="Foto Lingga Aradhana Sahadewa">
                <div class="card-body">
                    <h4 class="card-title">Lingga Aradhana Sahadewa</h4>
                    <h5>Calon No. Urut 01</h5>
                </div>
            </div>

            <div class="card ml-auto mr-auto border-dark" style="width: 44rem">
                <div class="card-body position-relative">
                    <h3 class="card-title">Visi dan Misi</h3><hr>
                    <h4>Visi</h4><hr>
                    <p>Menjadikan STEI'20 sebagai angkatan yang solid, inovatif, dan berintegritas yang mampu memberikan kontribusi kepada lingkungan di sekitarnya serta mampu menjadi pelopor dalam bersinergi dan berkolaborasi dengan seluruh civitas akademika Institut Teknologi Bandung</p><br>
                    <h4>Misi</h4><hr>
                    <ol>
                        <li>Mempererat tali persaudaraan seluruh anggota STEI'20</li>
                        <li>Mengajak seluruh anggota STEI'20 untuk memanfaatkan lingkungan kampus sebagai wadah pengembangan dan aktualisasi diri</li>
                        <li>Menjalin serta menjaga hubungan baik dengan seluruh civitas akademika ITB</li>
                        <li>Mengembangkan budaya aktif berkontribusi terhadap lingkungan dan masyarakat sekitar</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="card ml-3 mb-3 ml-auto mr-auto border-dark" style="width: 16rem">
                <img src="{{ asset('img/gede.png')  }}" alt="Foto I Gede Arya Raditya P" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">I Gede Arya Raditya P</h4>
                    <h5>Calon No. Urut  02</h5>
                </div>
            </div>

            <div class="card ml-auto mr-auto border-dark" style="width: 44rem">
                <div class="card-body">
                    <h3 class="card-title">Visi dan Misi</h3><hr>
                    <h4>Visi</h4><hr>
                    <p>Menciptakan keluarga STEI 20 yang unggul dalam bidangnya,  non-individualis, serta saling bahu membahu dengan tetap mengutamakan pribadi yang berkarakter.</p><br>
                    <h4>Misi</h4><hr>
                    <ol>
                        <li>Menyelenggarakan program kerja yang dapat menyatukan keluarga STEI 20.</li>
                        <li>Menyediakan sebuah tempat di mana mahasiswa dapat berbagi ilmu serta belajar dengan efektif.</li>
                        <li>Menyediakan suatu ruang yang kondusif sehingga tidak ada mahasiswa yang kurang informasi.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
