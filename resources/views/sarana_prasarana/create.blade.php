@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Sarana Prasarana</h1>
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

    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Form Tambah Sarana Prasarana</h3>
        </div>
      <div class="card-body">
        <form action="{{ route('sarana_prasarana.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama sarana/prasarana" value="{{ old('name') }}">
            @error('name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="image">Foto</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control" placeholder="Masukkan status" value="{{ old('status') }}">
          </div>

          <div class="form-group mb-3">
            <label for="wa">WA</label>
            <input type="text" name="wa" id="wa" class="form-control" placeholder="Masukkan nomor WA" value="{{ old('wa') }}">
          </div>

          <div class="form-group mb-3">
            <label for="form_pemesanan">Form Pemesanan</label>
            <input type="text" name="form_pemesanan" id="form_pemesanan" class="form-control" placeholder="Masukkan link form pemesanan" value="{{ old('form_pemesanan') }}">
          </div>

          <div class="form-group mb-3">
            <label for="desc">Deskripsi</label>
            <textarea name="desc" id="desc" class="form-control" rows="4">{{ old('desc') }}</textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success">
              <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('sarana_prasarana.index') }}" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

        </form>
      </div>
    </div>

  </div>
</section>
@endsection
