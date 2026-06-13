@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Daftar Agenda</h1>
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
        <a href="{{ route('agenda_kegiatan.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Agenda
        </a>
    </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped text-center" id="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Agenda</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($agendas as $key => $agenda)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $agenda->agenda_name }}</td>
              <td>{{ $agenda->start_date }}</td>
              <td>{{ $agenda->end_date }}</td>
              <td>{!! $agenda->desc !!}</td>
              <td>
                @if($agenda->image)
                  <img src="{{ asset('public/storage/'.$agenda->image) }}" width="80" class="rounded">
                @else
                  <span class="text-muted">Tidak ada</span>
                @endif
              </td>
              <td>
                <a href="{{ route('agenda_kegiatan.edit', $agenda->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <form action="{{ route('agenda_kegiatan.destroy', $agenda->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
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
