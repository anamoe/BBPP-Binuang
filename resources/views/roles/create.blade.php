@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Role</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Role</h3>
      </div>

      <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Nama Role</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama role" value="{{ old('name') }}">
            @error('name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('roles.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
