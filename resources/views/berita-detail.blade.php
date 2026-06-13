@extends('layouts-user.main')

@section('content')

<section class="py-5">
<div class="container">

    <div class="row">

        {{-- ================= LEFT SIDE ================= --}}
        <div class="col-lg-8">

            <h2 class="fw-bold mb-3">
                {{ $article->title }}
            </h2>

            <div class="text-muted mb-3">
                {{ $article->created_at->format('d F Y') }} |
                Dilihat {{ $article->view }} kali
            </div>

            <img src="{{ asset('public/storage/'.$article->image) }}"
                 class="img-fluid rounded mb-4">

            <div style="line-height:1.8;">
                {!! $article->desc !!}
            </div>

            {{-- ================= SIMILAR POST ================= --}}
            @if($similar->count())
            <hr class="my-5">

            <h5 class="fw-bold mb-4">Artikel Terkait</h5>

            <div class="row">
                @foreach($similar as $item)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('berita.show', $item->slug) }}" 
                    class="text-decoration-none text-dark">

                        <div class="card h-100 border-0 shadow-sm similar-card">

                            <img src="{{ asset('public/storage/'.$item->image) }}"
                                class="card-img-top"
                                style="height:160px; object-fit:cover;">

                            <div class="card-body">
                                <small class="text-muted">
                            {{ $item->created_at->format('d M Y') }}
                                </small>

                                <p class="fw-bold mt-1">
                                    {{ $item->title }}
                                </p>

                                <a href="{{ route('berita.show', $item->slug) }}" 
                                class="btn btn-sm btn-outline-primary">
                                    Baca Selengkapnya
                                </a>
                            </div>

                        </div>

                    </a>
                </div>
                @endforeach
            </div>
            @endif

        </div>


        {{-- ================= RIGHT SIDE (SAMA SEPERTI BERITA) ================= --}}
        <div class="col-lg-4">

            {{-- Kategori --}}
            <div class="mb-5">
                <h6 class="fw-bold mb-3 border-bottom pb-2">
                    Kategori
                </h6>

                @foreach($categories as $cat)
                <div class="d-flex justify-content-between py-2 sidebar-link">
                    <span>{{ $cat->category_name }}</span>
                    <span class="text-muted small">
                        ({{ $cat->articles_count ?? 0 }})
                    </span>
                </div>
                @endforeach
            </div>


            {{-- Tag --}}
            <div class="mb-5">
                <h6 class="fw-bold mb-3 border-bottom pb-2">
                    Tag
                </h6>

                @foreach($tags as $tag)
                <span class="tag-item bg-success text-white">
                    {{ $tag->tag_name }}
                </span>
                @endforeach
            </div>


            {{-- ================= POPULAR POST ================= --}}
            <div>
                <h6 class="fw-bold mb-3 border-bottom pb-2">
                    Popular Post
                </h6>

                @foreach($popular as $item)
                <a href="{{ route('berita.show', $item->slug) }}" 
                   class="text-decoration-none text-success font-bold" style="font-weight: bold">

                    <div class="d-flex mb-4 popular-item">

                        <img src="{{ asset('public/storage/'.$item->image) }}"
                             width="80"
                             height="70"
                             style="object-fit:cover; border-radius:6px;"
                             class="me-3">

                        <div>
                            <h6 class="mb-1" style="font-size: 0.9rem;">
                                {{ Str::limit($item->title, 55) }}
                            </h6>

                            <small class="text-muted">
                                {{ $item->created_at->format('d M Y') }}
                            </small>
                        </div>

                    </div>

                </a>
                @endforeach

            </div>

        </div>

    </div>

</div>
</section>

<style>
    
/* Tag */
.tag-item {
    display: inline-block;
    padding: 4px 10px;
    font-size: 0.8rem;
    border: 1px solid #ddd;
    border-radius: 20px;
    margin: 4px 4px 0 0;
    transition: 0.2s;
}
.tag-item:hover {
    background: #0d6efd;
    color: #fff;
    border-color: #0d6efd;
}
</style>

@endsection