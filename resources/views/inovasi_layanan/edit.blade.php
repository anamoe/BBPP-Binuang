@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Inovasi Layanan</h1>
      </div>
      {{-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('inovasi_layanan.index') }}">Inovasi Layanan</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div> --}}
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Inovasi Layanan</h3>
      </div>

      <form action="{{ route('inovasi_layanan.update', $inovasi_layanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $inovasi_layanan->title }}" required>
          </div>

          <div class="form-group">
            <label>Gambar Saat Ini</label><br>
            <img src="{{ asset('public/storage/' . $inovasi_layanan->image) }}" alt="{{ $inovasi_layanan->title }}" width="150" class="rounded mb-2 border">
          </div>

          <div class="form-group">
            <label for="image">Ganti Gambar (opsional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
          </div>

          <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" id="link" class="form-control" value="{{ $inovasi_layanan->link }}" placeholder="https://contoh.com">
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('inovasi_layanan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>

  </div>
</section>
@endsection
