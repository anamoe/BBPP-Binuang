@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah UPT External</h1>
      </div>
      {{-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('upt_external.index') }}">UPT External</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div> --}}
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah UPT External</h3>
      </div>

      <form action="{{ route('upt_external.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

          <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
          </div>

          <div class="form-group">
            <label for="link">Link (opsional)</label>
            <input type="url" name="link" id="link" class="form-control" placeholder="https://contoh.com">
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('upt_external.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>

  </div>
</section>
@endsection
