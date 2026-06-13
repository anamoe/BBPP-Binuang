@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit UPT External</h1>
      </div>
      {{-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('upt_external.index') }}">UPT External</a></li>
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
        <h3 class="card-title">Form Edit UPT External</h3>
      </div>

      <form action="{{ route('upt_external.update', $uptExternal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">

          <div class="form-group">
            <label for="image">Gambar Saat Ini</label><br>
            <img src="{{ asset('public/storage/' . $uptExternal->image) }}" alt="Gambar UPT" width="150" class="rounded mb-3">
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
          </div>

          <div class="form-group">
            <label for="link">Link (opsional)</label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $uptExternal->link) }}" placeholder="https://contoh.com">
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('upt_external.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>

  </div>
</section>
@endsection
