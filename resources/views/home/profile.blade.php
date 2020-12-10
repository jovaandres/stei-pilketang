@extends('layouts.home')

@section('content')
    <div class="px-2 pt-2">
        <div class="bg-not-dark text-center mb-3 ">
            <h3 class="ml-1 text-white py-3"><i class="fas fa-user mr-2 text-white"></i>PROFIL</h3>
        </div>

        <div class="row z-depth-3 mr-auto ml-auto">
            <div class="col-sm-4 bg-primary rounded-left ">
                <div class="card-block text-center text-white">
                    <i class="fas fa-user-tie fa-7x mt-5"></i>
                    <h2 class="font-weight-bold mt-4">{{ $user->name }}</h2>
                    <p style="font-size: 24px;">Keluarga STEI 20</p>
                </div>
            </div>
            <div class="col-sm-8 bg-light rounded-right">
                <h3 class="mt-3 text-center">Informasi</h3>
                <hr class="badge-primary mt-0 w-25">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="font-weight-bold" style="font-size: 20px;">Email:</p>
                        <h6 class="text-muted">{{ $user->email }}</h6>
                    </div>
                </div>
                <h4 class="mt-3">Status</h4>
                <hr class="bg-primary">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="{{ ($user->is_notice_read ? ($user->is_token_claimed ? 'text-success':'text-warning'):'text-danger') }}"
                            style="font-size: 28px;">
                            {{ ($user->is_notice_read ? ($user->is_token_claimed ? ($user->is_voted ? 'Sudah Vote' : 'Belum Vote, Sudah Klaim Token') :'Belum Klaim Token'):'Belum Menyetujui Aturan') }}
                        </h6>
                    </div>
                </div>
                <hr class="bg-primary">
                @if(!$user->is_notice_read)
                    <button type="button" class="btn btn-grad btn-grad-gold btn-lg btn-block mb-3" data-toggle="modal"
                            data-target="#claimToken">Setujui Aturan Klaim Token
                    </button>
                    <div class="modal fade" id="claimToken" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-danger" id="judul">PERHATIAN!</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-left"><strong>MOHON BACA ATURAN DENGAN SEKSAMA. KESALAHAN KLAIM
                                            TOKEN KARENA TIDAK MEMBACA ATURAN AKAN DIABAIKAN OLEH PANITIA. PASTIKAN
                                            BACA DENGAN CERMAT</strong></p>
                                    <ol>
                                        <li><strong>JANGAN PERNAH MEMBAGI TOKEN KEPADA SIAPAPUN!</strong></li>
                                        <li>Untuk menjaga kerahasiaan voting, token ini bersifat <strong>tidak
                                                terikat</strong>, yang berarti identitas anda <strong>tidak akan
                                                terekam</strong> dengan pilihan anda di sistem.
                                        </li>
                                        <li class="text-danger">Karena sistem yang dijelaskan di no. 2, maka token
                                            akan dimunculkan <strong>HANYA SEKALI</strong> dan <strong>TIDAK AKAN
                                                BISA DITAMPILKAN KEMBALI</strong></li>
                                        <li>Ketika token sedang dibuat, harap <strong>JANGAN TUTUP, REFRESH HALAMAN,
                                                ATAU MEMATIKAN INTERNET ANDA!.</strong></li>
                                        <li>Ketika token telah dibuat, harap <strong>LANGSUNG SIMPAN DAN
                                                CATAT.</strong></li>
                                        <li>Kesalahan yang terjadi akibat kelalaian anda <strong>TIDAK MENJADI
                                                TANGGUNG JAWAB PANITIA </strong>dan<strong> TIDAK AKAN ADA TOKEN
                                                TAMBAHAN TERSEDIA.</strong></li>
                                    </ol>
                                    <form method="POST" action="{{ route('token.notice.mark-notice') }}"
                                          id="mark-notice-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                       id="notice-agreement" value="true"
                                                       name="mark_notice" {{ old('mark_notice')=='true' ? 'checked' : '' }} />
                                                <h6><strong>Saya telah membaca semua aturan tersebut dan setuju
                                                        dengan aturan tersebut.</strong></h6>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-grad" href="#"
                                       onclick="event.preventDefault();
                                       this.disabled=true;this.value='Menyubmit...';
                                       document.getElementById('mark-notice-form').submit();">
                                        Submit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <button type="button" class="btn-grad btn btn-lg btn-block mb-3" data-toggle="modal"
                            data-target="#claimToken">Baca Aturan Klaim Token
                    </button>
                    <div class="modal fade" id="claimToken" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-center text-danger" id="judul">PERHATIAN!</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-left"><strong>MOHON BACA ATURAN DENGAN SEKSAMA. KESALAHAN KLAIM
                                            TOKEN KARENA TIDAK MEMBACA ATURAN AKAN DIABAIKAN OLEH PANITIA. PASTIKAN
                                            BACA DENGAN CERMAT</strong></p>
                                    <ol>
                                        <li><strong>JANGAN PERNAH MEMBAGI TOKEN KEPADA SIAPAPUN!</strong></li>
                                        <li>Untuk menjaga kerahasiaan voting, token ini bersifat <strong>tidak
                                                terikat</strong>, yang berarti identitas anda <strong>tidak akan
                                                terekam</strong> dengan pilihan anda di sistem.
                                        </li>
                                        <li class="text-danger">Karena sistem yang dijelaskan di no. 2, maka token
                                            akan dimunculkan <strong>HANYA SEKALI</strong> dan <strong>TIDAK AKAN
                                                BISA DITAMPILKAN KEMBALI</strong></li>
                                        <li>Ketika token sedang dibuat, harap <strong>JANGAN TUTUP, REFRESH HALAMAN,
                                                ATAU MEMATIKAN INTERNET ANDA!.</strong></li>
                                        <li>Ketika token telah dibuat, harap <strong>LANGSUNG SIMPAN DAN
                                                CATAT.</strong></li>
                                        <li>Kesalahan yang terjadi akibat kelalaian anda <strong>TIDAK MENJADI
                                                TANGGUNG JAWAB PANITIA </strong>dan<strong> TIDAK AKAN ADA TOKEN
                                                TAMBAHAN TERSEDIA.</strong></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
