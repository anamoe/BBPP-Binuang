@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Daftar Banner</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    {{-- Notifikasi sukses --}}
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
        <a href="{{ route('banner.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Banner</a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped text-center" id="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($banners as $key => $item)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td><img src="{{ asset('public/storage/' . $item->image) }}" width="120" class="rounded"></td>
                <td>{{ $item->desc ?? '-' }}</td>
                <td>{{ $item->status ?? '-' }}</td>
                <td>
                  <a href="{{ route('banner.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('banner.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus banner ini?')">
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
