@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Organisasi</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="card">
      <div class="card-header">
        <a href="{{ route('organisasi.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Data
        </a>
      </div>

      <div class="card-body">
        @if ($organisasi)
            <div>{!! $organisasi->desc !!}</div> {{-- pakai {!! !!} agar HTML dari Trix bisa dirender --}}
            <a href="{{ route('organisasi.edit', $organisasi->id) }}" class="btn btn-warning btn-sm mt-3">
            <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('organisasi.destroy', $organisasi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
            <button class="btn btn-danger btn-sm mt-3"><i class="fas fa-trash"></i> Hapus</button>
            </form>
        @else
            <p class="text-muted">Belum ada data Organisasi.</p>
        @endif
</div>
    </div>
  </div>
</section>
@endsection
