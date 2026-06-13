@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Daftar Pelatihan</h1>
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
        <a href="{{ route('pelatihan.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Pelatihan
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped text-center" id="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Pegawai</th>
              <th>Jabatan</th>
              <th>WA</th>
              <th>Keahlian</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pelatihans as $key => $item)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td class="text-left">
                {{ $item->pegawai->name }}
              </td>
              <td class="text-left">
                {{ $item->pegawai->position }}
              </td>
              <td class="text-left">
                {{ $item->pegawai->no_wa }}
              </td>
              <td class="text-left">{{ $item->keahlian->keahlian_name }}</td>
              <td>
                <a href="{{ route('pelatihan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('pelatihan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
