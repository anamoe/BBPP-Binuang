@extends('layouts-user.main')

@section('content')
<section id="program-anggaran" class="py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold">LHKPN - LHKASN</h2>
            <p class="text-muted">LHKPN (Laporan Harta Kekayaan Penyelenggara Negara) dan LHKASN (Laporan Harta Kekayaan Aparatur Sipil Negara)</p>
        </div>

        {{-- Loop per jenis program --}}
        @foreach($programs->groupBy('jenis.jenis') as $jenisNama => $items)
        @if($jenisNama == 'LHKPN-ASN')
        <div class="mb-5">
            <!-- Header jenis -->
            <div class="bg-success text-white px-4 py-2 rounded-top d-flex align-items-center shadow-sm">
                <i class="bi bi-journal-text me-2"></i>
                <h5 class="m-0 fw-semibold">{{ $jenisNama }}</h5>
            </div>
           

            <!-- Daftar dokumen -->
            <div class="bg-white border rounded-bottom p-4 shadow-sm">
                <div class="row justify-content-center g-4">
                    @foreach($items as $item)
                        @if($item->jenis_program_anggaran_id == 7)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 hover-card">
                            <div class="card-body text-center">
                                <h6 class="fw-semibold mb-3" style="font-size: 0.95rem;">
                                    {{ $item->name }}
                                </h6>

                               <div class="d-flex gap-2">

                                    {{-- Tombol Lihat --}}
                                    <a href="{{ asset('public/storage/' . $item->file) }}"
                                        target="_blank"
                                        class="btn btn-warning btn-sm rounded-pill d-flex align-items-center">
                                        <i class="bi bi-eye me-1"></i> Lihat
                                    </a>

                                    {{-- Tombol Download --}}
                                    <a href="{{ asset('public/storage/' . $item->file) }}"
                                        download
                                        class="btn btn-success btn-sm rounded-pill d-flex align-items-center">
                                        <i class="bi bi-download me-1"></i> Download
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
         @endif
        @endforeach
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));
    const pdfViewer = document.getElementById('pdfViewer');

    document.querySelectorAll('.view-pdf').forEach(btn => {
        btn.addEventListener('click', function () {
            const fileUrl = this.dataset.file;
            pdfViewer.src = fileUrl + '#toolbar=0';
            pdfModal.show();
        });
    });

    document.getElementById('pdfModal').addEventListener('hidden.bs.modal', function () {
        pdfViewer.src = '';
    });
});
</script>
@endpush
