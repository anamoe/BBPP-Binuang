@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Infografis PPID</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Infografis</h3>
      </div>

      <form action="{{ route('infografis_ppid.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

          <div class="form-group">
            <label for="image">Gambar Infografis</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('infografis_ppid.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
