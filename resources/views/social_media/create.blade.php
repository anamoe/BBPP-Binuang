@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Social Media</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">

    <div class="card card-primary">
      <div class="card-header"><h3 class="card-title">Form Tambah Link</h3></div>

      <form action="{{ route('social_media.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" id="link" class="form-control" placeholder="https://contoh.com" required>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('social_media.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>

  </div>
</section>
@endsection
