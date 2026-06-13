@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Pelatihan</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Pelatihan</h3>
      </div>

      <form action="{{ route('pelatihan.store') }}" method="POST">
        @csrf
        <div class="card-body">
          {{-- Pegawai --}}
          <div class="form-group">
            <label for="pegawai_id">Pegawai</label>
            <select name="pegawai_id" id="pegawai_id" class="form-control">
              <option value="">-- Pilih Pegawai --</option>
              @foreach($pegawais as $pegawai)
                <option value="{{ $pegawai->id }}" {{ old('pegawai_id') == $pegawai->id ? 'selected' : '' }}>
                  {{ $pegawai->name }} - {{ $pegawai->position }} - {{ $pegawai->no_wa }}
                </option>
              @endforeach
            </select>
            @error('pegawai_id')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          {{-- Keahlian --}}
          <div class="form-group">
            <label for="keahlian_id">Keahlian</label>
            <select name="keahlian_id" id="keahlian_id" class="form-control">
              <option value="">-- Pilih Keahlian --</option>
              @foreach($keahlians as $keahlian)
                <option value="{{ $keahlian->id }}" {{ old('keahlian_id') == $keahlian->id ? 'selected' : '' }}>
                  {{ $keahlian->keahlian_name }}
                </option>
              @endforeach
            </select>
            @error('keahlian_id')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('pelatihan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
