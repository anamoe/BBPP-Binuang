@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Kategori</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Kategori</h3>
      </div>

      <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">
          <div class="form-group">
            <label for="category_name">Nama Kategori</label>
            <input type="text"
                   name="category_name"
                   id="category_name"
                   class="form-control"
                   value="{{ old('category_name', $category->category_name) }}">

            @error('category_name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Update
          </button>
          <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </div>

      </form>
    </div>
  </div>
</section>
@endsection