@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Infografis PPID</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Infografis</h3>
      </div>

      <form action="{{ route('infografis_ppid.update', $infografisPpid->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">

          <div class="form-group">
            <label for="image">Gambar Infografis</label>
            <input type="file" name="image" id="image" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          @if($infografisPpid->image)
            <div class="mb-2">
              <img src="{{ asset('public/storage/'.$infografisPpid->image) }}" width="150" alt="Infografis" class="rounded">
            </div>
          @endif

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('infografis_ppid.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
