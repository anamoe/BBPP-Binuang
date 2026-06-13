@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Sarana Prasarana</h1>
      </div>
    </div>
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
        <a href="{{ route('sarana_prasarana.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Data
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped text-center" id="data-table">
          <thead>
            <tr>
              <th style="width: 50px;">No</th>
              <th class="text-left">Nama</th>
              <th>Foto</th>
              <th>Status</th>
              <th>WA</th>
              <th>Form Pemesanan</th>
              <th class="text-left">Deskripsi</th>
              <th style="width: 150px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $key => $item)
              <tr class="align-middle">
                <td>{{ $key + 1 }}</td>
                <td class="text-left">{{ $item->name }}</td>
                <td>
                  @if ($item->image)
                    <img src="{{ asset('public/storage/'.$item->image) }}" alt="Foto" width="60" class="rounded">
                  @else
                    <span class="text-muted">Tidak ada</span>
                  @endif
                </td>
                <td>{{ $item->status ?? '-' }}</td>
                <td>{{ $item->wa ?? '-' }}</td>
                <td>{{ $item->form_pemesanan ?? '-' }}</td>
                <td class="text-left">{!! $item->desc ?? '-' !!}</td>
                <td>
                  <a href="{{ route('sarana_prasarana.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('sarana_prasarana.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
