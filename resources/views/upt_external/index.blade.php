@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar UPT External</h1>
      </div>
      {{-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">UPT External</li>
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
        <a href="{{ route('upt_external.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Data
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="data-table">
          <thead class="text-center">
            <tr>
              <th style="width: 50px;">No</th>
              <th>Gambar</th>
              <th>Link</th>
              <th style="width: 150px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($uptExternal as $key => $item)
              <tr class="text-center align-middle">
                <td>{{ $key + 1 }}</td>
                <td>
                  <img src="{{ asset('public/storage/' . $item->image) }}" alt="Gambar" width="100" class="rounded">
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
                  <a href="{{ route('upt_external.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('upt_external.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
