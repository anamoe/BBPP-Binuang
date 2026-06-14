@extends('layouts-user.main')

@section('content')
{{-- === Hero Section === --}}
<section id="beranda" class="hero" data-aos="fade-in">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            @foreach($banner as $index => $item)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('public/storage/' . $item->image) }}"
                    class="d-block w-100"
                    alt="Banner"
                    style="height: 500px; object-fit: cover;">
            </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

{{-- === Inovasi & Layanan === --}}
<section id="layanan" class="py-5">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
            <h2>Inovasi dan Layanan</h2>
        </div>
        <div class="row text-center justify-content-center mb-4">
            @foreach($inovasi_layanan as $item)
            <div class="col-6 col-md-3 g-3" data-aos="zoom-in">

                <a href="{{ $item->link }}" target="_blank" class="text-decoration-none">
                    <div class="img-wrapper">
                        <img src="{{ asset('public/storage/' . $item->image) }}"
                            alt=""
                            class="w-100 shadow-sm rounded">

                        <!-- Overlay muncul saat hover -->
                        <div class="img-title-overlay">
                            {{ $item->title }}
                        </div>
                    </div>
                </a>

                <!-- <p class="mt-3 text-dark fw-bold">
                    {{ $item->title }}
                </p> -->
            </div>

            @endforeach
        </div>
    </div>
</section>



{{-- === Sosial Media === --}}


<section id="sosial" class="py-5">
    <div class="container text-center">
        <div class="section-title text-center mb-4">
            <h2 class="mb-4">Platform Sosial Media</h2>
        </div>

        <div class="row justify-content-center align-items-stretch mt-4">

            <!-- Instagram -->
            <div class="col-md-4 mb-4 d-flex">
                <iframe
                    src="https://www.instagram.com/bbppbinuang/embed"
                    width="340"
                    height="440"
                    frameborder="0"
                    scrolling="no">
                </iframe>

            </div>



            <!-- Facebook -->
            <div class="col-md-4 mb-4 d-flex">
                <div class="fb-page"
                    data-href="https://www.facebook.com/humasbbppbinuang"
                    data-tabs="timeline"
                    data-width="330"
                    data-height="400"
                    data-small-header="false"
                    data-hide-cover="false"
                    data-show-facepile="true">
                </div>
            </div>

            <div class="col-md-4 mb-4 d-flex">
                <iframe
                    src="https://www.tiktok.com/embed/@bbpp.binuang"
                    width="330"
                    height="400"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>

            <div class="container mt-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">YouTube</h3>
                </div>

                <div class="ratio ratio-16x9 shadow rounded-4 overflow-hidden">
                    <iframe width="500" height="300" src="https://www.youtube.com/embed/jHeBUpjLiHA?si=DI4Ja7wCTDNTiADU"
                        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
                        clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- === Alumni Section === --}}
<section class="alumni-section text-center text-white py-5" data-aos="fade-up">
    <div class="overlay"></div>
    <div class="container position-relative">
        <h2 class="fw-bold mb-2">Alumni Peserta Pelatihan</h2>
        <!-- <p class="mb-5">Update Agustus 2025</p> -->
        <p id="update-text" class="mb-5"></p>
        <div class="row justify-content-center">
            <div class="col-6 col-md-3 mb-4">
                <h3 class="fw-bold display-6">1.113</h3>
                <p class="mb-0">Aparatur</p>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <h3 class="fw-bold display-6">15.918</h3>
                <p class="mb-0">Non Aparatur</p>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <h3 class="fw-bold display-6">33</h3>
                <p class="mb-0">Sertifikasi</p>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <h3 class="fw-bold display-6">21</h3>
                <p class="mb-0">Kerjasama</p>
            </div>
        </div>
    </div>
</section>

{{-- === UPT External === --}}
<section id="upt" class="py-5 bg-light position-relative">
    <div class="container">
        <div class="section-title text-center mb-4" data-aos="fade-up">
            <h2>UPT External</h2>
        </div>

        <div class="swiper mySwiper mb-4" data-aos="zoom-in">
            <div class="swiper-wrapper">
                @foreach($upt_external as $item)
                <div class="swiper-slide">
                    <div class="card shadow-sm border-0 text-center m-2 rounded p-2">
                        <a href="{{ $item->link }}" target="_blank">
                            <img src="{{ asset('public/storage/' . $item->image) }}"
                                class="card-img-top mx-auto"
                                alt="UPT Image"
                                style="object-fit: contain;">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="swiper-button-prev custom-nav-btn"><i class="fa-solid fa-chevron-left"></i></div>
    <div class="swiper-button-next custom-nav-btn"><i class="fa-solid fa-chevron-right"></i></div>
</section>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0"
    nonce="FBSDK"></script>
@endsection

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {

        setTimeout(function() {
            speak("Selamat datang di Website Balai Besar Pelatihan Pertanian Binuang");
        }, 800);

    });
</script>
@endsection