@extends('layouts-user.main')

@section('content')

<section id="infografis" class="py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold">Infografis PPID</h2>
            <p class="text-muted">Kumpulan infografis informasi publik, laporan, dan kegiatan PPID.</p>
        </div>

        {{-- MASONRY GALLERY INTERAKTIF --}}
        <div class="masonry-gallery">
            @foreach($infografis as $item)
                <a href="{{ asset('public/storage/' . $item->image) }}" 
                   class="glightbox masonry-item mb-4" 
                   data-gallery="infografis"
                   data-title="{{ $item->title ?? 'Infografis PPID' }}">
                    <div class="img-wrapper position-relative">
                        <img src="{{ asset('public/storage/' . $item->image) }}" 
                             alt="{{ $item->title ?? 'Infografis PPID' }}" 
                             class="img-fluid rounded-4 shadow-sm">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <i class="bi bi-zoom-in text-white fs-3"></i>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- CSS STYLING --}}
<style>
    /* Layout dasar */
    .masonry-gallery {
        column-count: 3;
        column-gap: 1.5rem;
    }

    .masonry-item {
        display: inline-block;
        width: 100%;
        break-inside: avoid;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .img-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
    }

    .img-wrapper img {
        transition: transform 0.4s ease;
    }

    /* Efek hover */
    .overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 1rem;
    }

    .masonry-item:hover .overlay {
        opacity: 1;
    }

    .masonry-item:hover img {
        transform: scale(1.08);
    }

    /* Responsif */
    @media (max-width: 992px) {
        .masonry-gallery { column-count: 2; }
    }

    @media (max-width: 576px) {
        .masonry-gallery { column-count: 1; }
    }
</style>

{{-- GLightbox CDN --}}
<link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

{{-- INIT GLIGHTBOX --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true,
            closeButton: true,
            plyr: {
                css: 'https://cdn.plyr.io/3.6.8/plyr.css',
                js: 'https://cdn.plyr.io/3.6.8/plyr.js'
            }
        });
    });
</script>

@endsection
