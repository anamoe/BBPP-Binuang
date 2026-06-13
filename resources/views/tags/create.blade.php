@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Tag</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Tag</h3>
      </div>

      <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="tag_name">Nama Tag</label>
            <input type="text" 
                   name="tag_name" 
                   id="tag_name" 
                   class="form-control" 
                   placeholder="Masukkan nama tag"
                   value="{{ old('tag_name') }}">
            
            @error('tag_name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
          </button>
          <a href="{{ route('tags.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection