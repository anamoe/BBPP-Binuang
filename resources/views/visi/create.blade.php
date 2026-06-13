@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Visi</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Visi</h3>
      </div>

      <form action="{{ route('visi.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="desc">Deskripsi</label>
            <textarea name="desc" id="desc" class="form-control">{{ old('desc', $visi->desc ?? '') }}</textarea>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('visi.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
