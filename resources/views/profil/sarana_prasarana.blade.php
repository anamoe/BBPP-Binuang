@extends('layouts-user.main')

@section('content')

<section id="pelatihan" class="py-5 bg-light">
    <div class="container mb-4">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold">Sarana dan Prasarana</h2>
            <p class="text-muted">Berbagai fasilitas pendukung kegiatan.</p>
        </div>

        {{-- GRID SARANA --}}
        <div class="row justify-content-center g-4">
            @foreach($sarana_prasarana as $item)
            <div class="col-lg-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                    <img src="{{ asset('public/storage/' . $item->image) }}"
                        alt="{{ $item->name }}"
                        class="card-img-top"
                        style="height: 220px; object-fit: cover;">

                    <div class="card-body text-center">
                        <h5 class="fw-semibold mb-2">{{ $item->name }}</h5>
                        @if($item->status)
                        <span class="badge 
                                @if($item->status == 'Tersedia') bg-success 
                                @elseif($item->status == 'Tidak Tersedia') bg-danger 
                                @else bg-secondary 
                                @endif
                                mb-3 px-3 py-2 rounded-pill">
                            {{ $item->status }}
                        </span>
                        @endif

                        @if($item->desc)
                        <p class="text-muted small text-justify">
                            {!! Str::limit($item->desc, 110, '...') !!}
                        </p>
                        @endif
                    </div>

                    <div class="card-footer bg-white border-0 pb-4 text-center">

                            <a href="{{ route('sarana.detail', $item->id) }}"
                                target="_blank"
                                class="btn btn-primary btn-sm rounded-pill px-3">
                                 Detail
                            </a>
                           
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- SLIDER VERTIKAL DINAMIS --}}
        <div class="d-flex justify-content-center mt-5">
            <div class="vertical-slider position-relative overflow-hidden" style="width: 70%; max-width: 700px;">
                <div class="slider-wrapper position-relative">
                    @foreach ($sliders as $slider)
                    <div class="slide text-center">
                        <img src="{{ asset('public/storage/' . $slider->image) }}"
                            class="rounded-4 img-fluid mx-auto d-block"
                            style="max-height: 450px; object-fit: cover;"
                            alt="slider">
                    </div>
                    @endforeach
                </div>

                <!-- Tombol navigasi -->
                <button class="btn-nav btn-up"><i class="bi bi-chevron-up fs-3"></i></button>
                <button class="btn-nav btn-down"><i class="bi bi-chevron-down fs-3"></i></button>
            </div>
        </div>

        <style>
            .vertical-slider {
                position: relative;
                overflow: hidden;
                transition: height 0.6s ease-in-out;
            }

            .slider-wrapper {
                position: relative;
                transition: transform 0.8s ease-in-out;
            }

            .slide {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-shrink: 0;
                padding: 10px;
            }

            /* Tombol panah */
            .btn-nav {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                background: rgba(255, 255, 255, 0.9);
                border: none;
                border-radius: 50%;
                width: 45px;
                height: 45px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: background 0.3s;
                z-index: 10;
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            }

            .btn-nav:hover {
                background: rgba(255, 255, 255, 1);
            }

            .btn-up {
                top: 10px;
            }

            .btn-down {
                bottom: 10px;
            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const wrapper = document.querySelector(".slider-wrapper");
                const slides = document.querySelectorAll(".slide");
                const btnUp = document.querySelector(".btn-up");
                const btnDown = document.querySelector(".btn-down");
                const sliderContainer = document.querySelector(".vertical-slider");

                let currentIndex = 0;
                const totalSlides = slides.length;

                // Fungsi untuk update tampilan slide & tinggi container
                const updateSlide = () => {
                    const activeSlide = slides[currentIndex];
                    const slideHeight = activeSlide.offsetHeight;

                    // Atur tinggi container agar sesuai tinggi gambar aktif
                    sliderContainer.style.height = slideHeight + "px";

                    // Geser wrapper ke posisi yang sesuai
                    let offset = 0;
                    for (let i = 0; i < currentIndex; i++) {
                        offset += slides[i].offsetHeight;
                    }
                    wrapper.style.transform = `translateY(-${offset}px)`;
                };

                // Tombol navigasi manual
                btnDown.addEventListener("click", () => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlide();
                });

                btnUp.addEventListener("click", () => {
                    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateSlide();
                });

                // Auto slide tiap 4 detik
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlide();
                }, 4000);

                // Saat halaman selesai load, sesuaikan tinggi awal
                window.addEventListener("load", updateSlide);
                window.addEventListener("resize", updateSlide);
            });
        </script>

    </div>
</section>
@endsection