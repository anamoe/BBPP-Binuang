@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Daftar Skema Sertifikasi</h1>
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
      <div class="card-header d-flex justify-content-end">
        <a href="{{ route('skema_sertifikasi.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Skema
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped text-center" id="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Keahlian</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($skemas as $key => $item)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $item->keahlian->keahlian_name }}</td>
              <td class="text-left">{!! $item->desc ?? '-' !!}</td>
              <td>
                @if($item->image)
                  <img src="{{ asset('public/storage/'.$item->image) }}" width="80" class="rounded">
                @else
                  <span class="text-muted">Tidak ada</span>
                @endif
              </td>
              <td>
                <a href="{{ route('skema_sertifikasi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('skema_sertifikasi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
