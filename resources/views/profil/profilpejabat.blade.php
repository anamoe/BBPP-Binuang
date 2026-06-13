@extends('layouts-user.main')

@section('content')


{{-- === Info Section === --}}
<section id="info" class="py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-1" data-aos="fade-up">
            <h2>Profil Pimpinan</h2>
        </div>

        <div class="row align-items-start g-1">
              <div class="col-lg-3" data-aos="fade-right">
            </div>
            <div class="col-lg-6" data-aos="fade-right">
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <img src="{{ asset('public/image/profil pimpinan.jpeg') }}"
                        class="img-fluid rounded-3" style="width: 100%;height:50%"
                        alt="BBPP Ketindan">
                </div>
            </div>
            <div class="col-lg-3" data-aos="fade-right">
            </div>

            <!-- <div class="col-lg-6" data-aos="fade-left">
                <h4 class="mb-3">Sekapur Sirih</h4>
                <p>
                    BBPP Binuang adalah singkatan dari Balai Besar Pelatihan Pertanian Binuang — salah satu unit pelaksana teknis di bawah Kementerian Pertanian Republik Indonesia yang berfokus pada pelatihan dan pengembangan sumber daya manusia pertanian.
                </p>


                <ul class="nav nav-tabs mt-4" id="infoTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="organisasi-tab" data-bs-toggle="tab" data-bs-target="#organisasi" type="button" role="tab">Organisasi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tugas-tab" data-bs-toggle="tab" data-bs-target="#tugas" type="button" role="tab">Tugas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="visi-tab" data-bs-toggle="tab" data-bs-target="#visi" type="button" role="tab">Visi</button>
                    </li>
                </ul>

                <div class="tab-content border-start border-end border-bottom p-3 bg-white shadow-sm rounded-bottom" id="infoTabsContent">
                    <div class="tab-pane fade show active" id="organisasi" role="tabpanel">
                        <p style="text-align: justify;">
                            {!! $organisasi->desc ?? 'Belum ada data organisasi yang tersedia.' !!}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tugas" role="tabpanel">
                        <p>{!! $tugas->desc ?? 'Belum ada data yang tersedia.' !!}</p>
                    </div>
                    <div class="tab-pane fade" id="visi" role="tabpanel">
                        <p>{!! $visi->desc ?? 'Belum ada data yang tersedia.' !!}</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>




<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0"
    nonce="FBSDK"></script>
@endsection