{{-- ================= HEADLINE ================= --}}
@if($headline)
<div class="mb-5">
    <img src="{{ asset('public/storage/'.$headline->image) }}" 
         class="w-100 rounded"
         style="height:400px; object-fit:cover;">

    <div class="mt-3">
        <small class="text-muted">
            {{ $headline->category->category_name ?? '-' }} • 
            {{ $headline->created_at->format('d M Y') }}
        </small>

        <h3 class="fw-bold mt-2">
            {{ $headline->title }}
        </h3>

        <p class="text-muted">
            {!! Str::limit(strip_tags($headline->desc), 200) !!}
        </p>

        <a href="{{ route('berita.show', $headline->slug) }}" 
        class="btn btn-sm btn-outline-primary">
            Baca Selengkapnya
        </a>
    </div>
</div>
<hr>
@endif


{{-- ================= LIST BERITA ================= --}}
@forelse($articles as $item)
<div class="row py-4 news-item">
    <div class="col-md-4">
        <img src="{{ asset('public/storage/'.$item->image) }}" 
             class="w-100 rounded"
             style="height:160px; object-fit:cover;">
    </div>

    <div class="col-md-8">
        <small class="text-muted">
            {{ $item->created_at->format('d M Y') }}
        </small>

        <h5 class="fw-bold mt-1">
            {{ $item->title }}
        </h5>

        <p class="text-muted mb-2">
            {!! Str::limit(strip_tags($item->desc), 120) !!}
        </p>

        <a href="{{ route('berita.show', $item->slug) }}" 
        class="btn btn-sm btn-outline-primary">
            Baca Selengkapnya
        </a>
    </div>
</div>

<hr class="news-separator">
@empty
<div class="text-center py-5">
    <h5 class="text-muted">Berita tidak ditemukan</h5>
</div>
@endforelse


{{-- ================= PAGINATION ================= --}}
@if($articles->hasPages())
<div class="mt-4">
    {{ $articles->links() }}
</div>
@endif