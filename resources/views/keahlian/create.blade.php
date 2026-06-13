@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Keahlian</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Keahlian</h3>
      </div>

      <form action="{{ route('keahlian.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="keahlian_name">Nama Keahlian</label>
            <input type="text" name="keahlian_name" id="keahlian_name" class="form-control" value="{{ old('keahlian_name') }}" placeholder="Masukkan nama keahlian">
            @error('keahlian_name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('keahlian.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
