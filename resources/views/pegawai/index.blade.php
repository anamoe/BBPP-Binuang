@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Data Pegawai</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    @endif

    <div class="card">
      <div class="card-header d-flex justify-content-end">
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Pegawai
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="data-table">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Jabatan</th>
              <th>Golongan</th>
              <th>Unit Kerja</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pegawai as $key => $item)
              <tr class="text-center align-middle">
                <td>{{ $key + 1 }}</td>
                <td>
                  @if ($item->image)
                    <img src="{{ asset('public/storage/'.$item->image) }}" alt="Foto" width="60">
                  @else
                    <span class="text-muted">Tidak ada</span>
                  @endif
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->position }}</td>
                <td>{{ $item->gol }}</td>
                <td>{{ $item->unit_kerja }}</td>
                <td>
                  <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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
