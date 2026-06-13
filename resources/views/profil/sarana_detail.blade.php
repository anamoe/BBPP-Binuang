@extends('layouts-user.main')

@section('content')
<section class="py-5 bg-light">
    <div class="container">

        <div class="row g-5">

            {{-- GAMBAR --}}
            <div class="col-lg-6">
                <div class="card border-0 shadow rounded-4 overflow-hidden">
                    <img src="{{ asset('public/storage/' . $item->image) }}" 
                         class="img-fluid"
                         style="width:100%; height:450px; object-fit:cover;"
                         alt="{{ $item->name }}">
                </div>
            </div>

            {{-- INFORMASI --}}
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">{{ $item->name }}</h2>

                {{-- STATUS --}}
                @if($item->status)
                <span class="badge 
                    @if($item->status == 'Tersedia') bg-success
                    @elseif($item->status == 'Tidak Tersedia') bg-danger
                    @else bg-secondary
                    @endif
                    px-3 py-2 rounded-pill mb-3">
                    {{ $item->status }}
                </span>
                @endif

                {{-- DESKRIPSI --}}
                <div class="mt-3 text-muted" style="line-height:1.8;">
                    {!! $item->desc !!}
                </div>

                {{-- TOMBOL --}}
                <div class="mt-4 d-flex gap-3">

                    @if($item->wa)
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $item->wa) }}" 
                       target="_blank"
                       class="btn btn-success px-4 rounded-pill">
                        <i class="bi bi-whatsapp me-2"></i> Hubungi via WhatsApp
                    </a>
                    @endif

                    @if($item->form_pemesanan)
                    <a href="{{ $item->form_pemesanan }}" 
                       target="_blank"
                       class="btn btn-warning px-4 rounded-pill">
                        <i class="bi bi-file-earmark-text me-2"></i> Form Pemesanan
                    </a>
                    @endif

                </div>

            </div>

        </div>

        {{-- SECTION TAMBAHAN --}}
        <div class="mt-5 p-4 bg-white shadow-sm rounded-4">
            <h4 class="fw-semibold mb-3">Informasi Tambahan</h4>
            <ul class="list-unstyled text-muted">
                <li><i class="bi bi-check-circle text-success me-2"></i> Fasilitas terawat dan siap digunakan</li>
                <li><i class="bi bi-check-circle text-success me-2"></i> Mendukung kegiatan pelatihan dan operasional</li>
                <li><i class="bi bi-check-circle text-success me-2"></i> Dapat dipesan sesuai prosedur</li>
            </ul>
        </div>

    </div>
</section>
@endsection