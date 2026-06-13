@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Daftar Laporan</h1>
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
        <a href="{{ route('program_anggaran.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Data
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped text-center" id="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Program</th>
              <th>File</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($programs as $key => $item)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td class="text-left">{{ $item->name }}</td>
                <td class="text-left">{{ $item->jenis->jenis }}</td>
                <td>
                  @if($item->file)
                    <a href="{{ asset('public/storage/'.$item->file) }}" target="_blank">Lihat File</a>
                  @else
                    <span class="text-muted">Tidak ada</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('program_anggaran.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('program_anggaran.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
