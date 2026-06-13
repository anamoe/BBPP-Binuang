@extends('layouts-user.main')

@section('content')

<section id="pelatihan" class="py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold">Lembaga Sertifikasi Profesi</h2>
            <p class="text-muted">Pilih skema sertifikasi sesuai bidang keahlian Anda</p>
        </div>

        <div class="row justify-content-center g-4">
            @foreach($skemas as $item)
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    
                    <!-- Gambar -->
                    <div class="position-relative">
                        <img src="{{ asset('public/storage/' . $item->image) }}" 
                             alt="{{ $item->name }}" 
                             class="w-100"
                             style="height: 200px; object-fit: cover;">
                    </div>

                    <!-- Bagian bawah -->
                    <div class="p-4 bg-white text-center" style="margin-top: -30px; border-radius: 20px;">
                        <h4 class="fw-semibold pt-4 mb-2" style="font-size: 0.9rem;">
                            {{ $item->keahlian->keahlian_name }}
                        </h4>
                        <div class="desc text-muted" style="font-size: 0.9rem; text-align: justify;">
                            {!! Str::limit(strip_tags($item->desc), 120, '...') !!}
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 1.5rem;
        background: #fff;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .card img {
        transition: transform 0.3s;
    }

    .card:hover img {
        transform: scale(1.03);
    }

    .section-title h2 {
        font-weight: 700;
        color: #333;
    }
</style>

@endsection
