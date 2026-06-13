@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Berita</h1>
  </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card card-primary">
<div class="card-header">
  <h3 class="card-title">Form Tambah Berita</h3>
</div>

<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="card-body">

{{-- Judul --}}
<div class="form-group">
  <label for="title">Judul</label>
  <input 
    type="text" 
    name="title" 
    id="title"
    class="form-control @error('title') is-invalid @enderror"
    value="{{ old('title') }}"
    placeholder="Masukkan judul berita"
  >
  @error('title')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

{{-- Kategori --}}
<div class="form-group">
  <label for="category_id">Kategori</label>
  <select 
    name="category_id" 
    id="category_id"
    class="form-control @error('category_id') is-invalid @enderror"
  >
    <option value="">-- Pilih Kategori --</option>
    @foreach($categories as $category)
      <option 
        value="{{ $category->id }}"
        {{ old('category_id') == $category->id ? 'selected' : '' }}
      >
        {{ $category->category_name }}
      </option>
    @endforeach
  </select>
  @error('category_id')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

{{-- Tag --}}
<div class="form-group">
  <label for="tags">Tag</label>
  <select 
    name="tags[]" 
    id="tags"
    class="form-control @error('tags') is-invalid @enderror"
    multiple
  >
    @foreach($tags as $tag)
      <option 
        value="{{ $tag->id }}"
        {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}
      >
        {{ $tag->tag_name }}
      </option>
    @endforeach
  </select>
  @error('tags')
    <div class="invalid-feedback d-block">{{ $message }}</div>
  @enderror
</div>

{{-- Gambar --}}
<div class="form-group">
  <label for="image">Gambar</label>
  <input 
    type="file" 
    name="image" 
    id="image"
    class="form-control @error('image') is-invalid @enderror"
  >
  @error('image')
    <div class="invalid-feedback d-block">{{ $message }}</div>
  @enderror
</div>

{{-- Deskripsi --}}
<div class="form-group">
  <label for="desc">Deskripsi</label>
  <textarea 
    name="desc" 
    id="desc"
    rows="5"
    class="form-control @error('desc') is-invalid @enderror"
    placeholder="Masukkan isi berita..."
  >{{ old('desc') }}</textarea>
  @error('desc')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

</div>

<div class="card-footer">
  <button type="submit" class="btn btn-success">
    <i class="fas fa-save"></i> Simpan
  </button>

  <a href="{{ route('articles.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Kembali
  </a>
</div>

</form>
</div>

</div>
</section>
@endsection