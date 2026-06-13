@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Pegawai</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Pegawai</h3>
      </div>

      <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama pegawai" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" value="{{ old('nip') }}">
            @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="position" class="form-control" placeholder="Masukkan jabatan" value="{{ old('position') }}">
            @error('position') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Pangkat</label>
            <input type="text" name="rank" class="form-control" placeholder="Masukkan pangkat" value="{{ old('rank') }}">
            @error('rank') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Golongan</label>
            <input type="text" name="gol" class="form-control" placeholder="Masukkan golongan" value="{{ old('gol') }}">
            @error('gol') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>No WhatsApp</label>
            <input type="text" name="no_wa" class="form-control" placeholder="Masukkan nomor WhatsApp" value="{{ old('no_wa') }}">
            @error('no_wa') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control" placeholder="Masukkan unit kerja" value="{{ old('unit_kerja') }}">
            @error('unit_kerja') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>TTD Digital (opsional)</label>
            <input type="text" name="ttdx" class="form-control" placeholder="Masukkan nama file ttd atau link" value="{{ old('ttdx') }}">
            @error('ttdx') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>User</label>
            <select name="user_id" class="form-control">
              <option value="">-- Pilih User --</option>
              @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
              @endforeach
            </select>
            @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('pegawai.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>

      </form>
    </div>
  </div>
</section>
@endsection
