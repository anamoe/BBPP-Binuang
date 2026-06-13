@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Slider Sarana Prasarana</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Slider</h3>
      </div>

      <form action="{{ route('sarana_prasarana_slider.update', $sarana_prasarana_slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="image">Foto</label>
            @if ($sarana_prasarana_slider->image)
              <div class="mb-2">
                <img src="{{ asset('public/storage/'.$sarana_prasarana_slider->image) }}" alt="Foto" width="100" class="rounded">
              </div>
            @endif
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @error('image')
              <small class="text-danger">{{ $message }}</small>
            @enderror
            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('sarana_prasarana_slider.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
