@extends('layouts-user.main')

@section('content')

<section class="py-5">
<div class="container">

    <div class="text-center mb-5">
        <h2 class="fw-bold">Berita</h2>
        <p class="text-muted">
            Informasi terbaru, pengumuman resmi, dan perkembangan kegiatan terkini.
        </p>
    </div>

    <div class="row">

        {{-- LEFT --}}
        <div class="col-lg-8" id="berita-container">
            @include('berita-list')
        </div>

        {{-- RIGHT --}}
        <div class="col-lg-4">

            {{-- SEARCH --}}
            <div class="mb-5">
                <form method="GET" action="{{ route('berita.index') }}">
                    <div class="position-relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               class="form-control search-input"
                               placeholder="Cari berita...">

                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- CATEGORY --}}
            <div class="mb-5">
                <h6 class="fw-bold mb-3 border-bottom pb-2">Kategori</h6>

                @foreach($categories as $cat)
                <a href="{{ route('berita.index', [
                        'category' => $cat->id,
                        'search'   => request('search'),
                        'tag'      => request('tag')
                    ]) }}"
                   class="d-flex justify-content-between py-2 sidebar-link text-decoration-none 
                   {{ request('category') == $cat->id ? 'active-category' : 'text-dark' }}">

                    <span>{{ $cat->category_name }}</span>
                    <span class="text-muted small">
                        ({{ $cat->articles_count }})
                    </span>
                </a>
                @endforeach
            </div>

            {{-- TAG --}}
            <div class="mb-5">
                <h6 class="fw-bold mb-3 border-bottom pb-2">Tag</h6>

                @foreach($tags as $tag)
                <a href="{{ route('berita.index', [
                        'tag'      => $tag->id,
                        'search'   => request('search'),
                        'category' => request('category')
                    ]) }}"
                   class="tag-item text-decoration-none 
                   {{ request('tag') == $tag->id ? 'active-tag' : 'bg-success text-white' }}">
                    {{ $tag->tag_name }}
                </a>
                @endforeach
            </div>

            {{-- POPULAR --}}
            <div>
                <h6 class="fw-bold mb-3 border-bottom pb-2">Popular Post</h6>

                @foreach($popular as $item)
                <a href="{{ route('berita.show', $item->slug) }}" 
                   class="text-decoration-none text-dark">

                    <div class="d-flex mb-4 popular-item">

                        <img src="{{ asset('public/storage/'.$item->image) }}"
                             width="80"
                             height="70"
                             style="object-fit:cover; border-radius:6px;"
                             class="me-3">

                        <div>
                            <h6 class="mb-1 fw-bold" style="font-size: 0.9rem;">
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
.sidebar-link:hover {
    color: #0d6efd;
    transform: translateX(3px);
}
.active-category {
    color: #198754 !important;
    font-weight: bold;
}
.tag-item {
    display: inline-block;
    padding: 4px 10px;
    font-size: 0.8rem;
    border-radius: 20px;
    margin: 4px 4px 0 0;
    border: 1px solid #ddd;
    transition: 0.2s;
}
.tag-item:hover {
    background: #0d6efd;
    color: #fff;
}
.active-tag {
    background: #198754 !important;
    color: #fff !important;
    font-weight: bold;
}
.popular-item:hover {
    transform: translateX(5px);
}
.search-input {
    padding-right: 40px;
    border-radius: 30px;
}
.search-btn {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    border: none;
    background: none;
}
</style>

{{-- ================= AJAX SEARCH SCRIPT ================= --}}
<script>
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let searchValue = document.querySelector('input[name="search"]').value;

    fetch("{{ route('berita.index') }}?search=" + encodeURIComponent(searchValue), {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('berita-container').innerHTML = data;
    })
    .catch(error => console.log(error));
});
</script>

@endsection