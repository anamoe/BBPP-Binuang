@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Agenda</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Agenda</h3>
      </div>

      <form action="{{ route('agenda_kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="agenda_name">Nama Agenda</label>
            <input type="text" name="agenda_name" id="agenda_name" class="form-control" value="{{ old('agenda_name') }}" placeholder="Masukkan nama agenda">
            @error('agenda_name')<small class="text-danger">{{ $message }}</small>@enderror
          </div>

          <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
            @error('start_date')<small class="text-danger">{{ $message }}</small>@enderror
          </div>

          <div class="form-group">
            <label for="end_date">Tanggal Selesai</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
            @error('end_date')<small class="text-danger">{{ $message }}</small>@enderror
          </div>

          <div class="form-group">
            <label for="desc">Deskripsi</label>
            <textarea name="desc" id="desc" class="form-control">{{ old('desc') }}</textarea>
            @error('desc')<small class="text-danger">{{ $message }}</small>@enderror
          </div>

          <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('agenda_kegiatan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
