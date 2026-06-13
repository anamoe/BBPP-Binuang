@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Skema Sertifikasi</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Skema</h3>
      </div>

      <form action="{{ route('skema_sertifikasi.update', $skemaSertifikasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">

          {{-- Keahlian --}}
          <div class="form-group">
            <label for="keahlian_id">Keahlian</label>
            <select name="keahlian_id" id="keahlian_id" class="form-control">
              <option value="">-- Pilih Keahlian --</option>
              @foreach($keahlians as $keahlian)
                <option value="{{ $keahlian->id }}" {{ $skemaSertifikasi->keahlian_id == $keahlian->id ? 'selected' : '' }}>
                  {{ $keahlian->keahlian_name }}
                </option>
              @endforeach
            </select>
            @error('keahlian_id')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          {{-- Deskripsi --}}
          <div class="form-group">
            <label for="desc">Deskripsi</label>
            <textarea name="desc" id="desc" class="form-control">{{ old('desc', $skemaSertifikasi->desc) }}</textarea>
            @error('desc')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          {{-- Gambar --}}
          <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($skemaSertifikasi->image)
              <img src="{{ asset('public/storage/'.$skemaSertifikasi->image) }}" width="100" class="mt-2 rounded">
            @endif
            @error('image')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('skema_sertifikasi.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
