@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Inovasi Layanan</h1>
      </div>
      {{-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Inovasi Layanan</li>
        </ol>
      </div> --}}
    </div>
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
        {{-- <h3 class="card-title"> Inovasi Layanan</h3> --}}
        <a href="{{ route('inovasi_layanan.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Data
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="data-table">
          <thead class="text-center">
            <tr>
              <th style="width: 50px;">No</th>
              <th>Judul</th>
              <th>Gambar</th>
              <th>Link</th>
              <th style="width: 150px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($inovasiLayanan as $key => $item)
              <tr class="text-center align-middle">
                <td>{{ $key + 1 }}</td>
                <td class="text-left">{{ $item->title }}</td>
                <td>
                  <img src="{{ asset('public/storage/' . $item->image) }}" alt="{{ $item->title }}" width="100" class="rounded">
                </td>
                <td>
                  @if ($item->link)
                    <a href="{{ $item->link }}" target="_blank" class="btn btn-outline-info btn-sm">
                      <i class="fas fa-link"></i> Buka Link
                    </a>
                  @else
                    <span class="badge badge-secondary">Tidak ada link</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('inovasi_layanan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('inovasi_layanan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i>
                    </button>
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
