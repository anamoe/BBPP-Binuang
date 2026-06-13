@extends('layouts-user.main')

@section('content')


{{-- === Info Section === --}}
<section id="info" class="py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2>Tugas dan Fungsi</h2>
        </div>

        <div class="row align-items-start g-4">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <img src="{{ asset('public/image/tugasfungsi.jpeg') }}"
                        class="img-fluid rounded-3"
                        alt="BBPP Binuang">
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
              
                <p>
                    Dalam melaksanakan tugasnya sebagaimana diatur dalam Peraturan Menteri Pertanian 
                    Nomor : 104/Permentan/OT.140/10/ 2013 di atas, BBPP Binuang menyelenggarakan fungsi 
                    sebagai berikut :
                </p>
                <br>
<ol>
    <li>Penyusunan program, rencana kerja, anggaran, dan pelaksanaan kerja sama.</li>
    <li>Pelaksanaan identifikasi kebutuhan pelatihan.</li>
    <li>Pelaksanaan penyusunan bahan Standar Kompetensi Kerja (SKK) di bidang pertanian.</li>
    <li>Pelaksanaan pelatihan fungsional di bidang pertanian bagi aparatur.</li>
    <li>Pelaksanaan pelatihan teknis di bidang perkebunan dan teknologi lahan pasang surut bagi aparatur dan nonaparatur pertanian dalam dan luar negeri.</li>
    <li>Pelaksanaan pelatihan profesi di bidang perkebunan dan teknologi lahan pasang surut bagi aparatur dan nonaparatur.</li>
    <li>Pelaksanaan unit kompetensi di bidang pertanian.</li>
    <li>Pelaksanaan penyusunan paket pembelajaran dan media pelatihan fungsional dan teknis di bidang pertanian.</li>
    <li>Pengembangan model dan teknik pelatihan fungsional dan teknis di bidang perkebunan dan teknologi lahan pasang surut.</li>
    <li>Pelaksanaan pengembangan kelembagaan pelatihan pertanian swadaya.</li>
    <li>Pelaksanaan pemberian konsultasi di bidang pertanian.</li>
    <li>Pelaksanaan bimbingan lanjutan pelatihan di bidang pertanian bagi aparatur dan nonaparatur.</li>
    <li>Pelaksanaan pemberian pelayanan penyelenggaraan pelatihan fungsional bagi aparatur, pelatihan teknis dan profesi, serta pengembangan model dan teknik pelatihan fungsional dan teknis di bidang pertanian bagi aparatur dan nonaparatur.</li>
    <li>Pengelolaan unit inkubator usahatani.</li>
    <li>Pelaksanaan pemantauan dan evaluasi pelatihan di bidang pertanian.</li>
    <li>Pelaksanaan data dan informasi pelatihan serta pelaporan.</li>
    <li>Pelaksanaan pengelolaan sarana teknis.</li>
    <li>Pengelolaan urusan kepegawaian, keuangan, rumah tangga, perlengkapan, dan instalasi BBPP Binuang.</li>
</ol>



          
            </div>
        </div>
    </div>
</section>




<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0"
    nonce="FBSDK"></script>
@endsection