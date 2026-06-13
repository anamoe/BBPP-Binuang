@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Banner</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header"><h3 class="card-title">Form Edit Banner</h3></div>

      <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label>Gambar Saat Ini</label><br>
            <img src="{{ asset('public/storage/' . $banner->image) }}" width="150" class="rounded mb-3">
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="desc" class="form-control" rows="3">{{ old('desc', $banner->desc) }}</textarea>
          </div>

          <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $banner->status) }}">
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('banner.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
