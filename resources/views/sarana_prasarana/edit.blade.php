@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Sarana Prasarana</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Sarana Prasarana</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('sarana_prasarana.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name) }}">
            @error('name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="image">Foto</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($item->image)
              <div class="mt-2">
                <img src="{{ asset('public/storage/'.$item->image) }}" alt="Foto" width="100" class="rounded">
              </div>
            @endif
            @error('image')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $item->status) }}">
          </div>

          <div class="form-group mb-3">
            <label for="wa">WA</label>
            <input type="text" name="wa" id="wa" class="form-control" value="{{ old('wa', $item->wa) }}">
          </div>

          <div class="form-group mb-3">
            <label for="form_pemesanan">Form Pemesanan</label>
            <input type="text" name="form_pemesanan" id="form_pemesanan" class="form-control" value="{{ old('form_pemesanan', $item->form_pemesanan) }}">
          </div>

          <div class="form-group mb-3">
            <label for="desc">Deskripsi</label>
            <textarea name="desc" id="desc" class="form-control" rows="4">{{ old('desc', $item->desc) }}</textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success">
              <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('sarana_prasarana.index') }}" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

        </form>
      </div>
    </div>

  </div>
</section>
@endsection