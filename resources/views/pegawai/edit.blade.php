@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Pegawai</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Pegawai</h3>
      </div>

      <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $pegawai->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Foto (Kosongkan jika tidak diubah)</label><br>
            @if ($pegawai->image)
              <img src="{{ asset('public/storage/'.$pegawai->image) }}" alt="Foto" width="80" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip', $pegawai->nip) }}">
            @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="position" class="form-control" value="{{ old('position', $pegawai->position) }}">
            @error('position') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Pangkat</label>
            <input type="text" name="rank" class="form-control" value="{{ old('rank', $pegawai->rank) }}">
            @error('rank') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Golongan</label>
            <input type="text" name="gol" class="form-control" value="{{ old('gol', $pegawai->gol) }}">
            @error('gol') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>No WhatsApp</label>
            <input type="text" name="no_wa" class="form-control" value="{{ old('no_wa', $pegawai->no_wa) }}">
            @error('no_wa') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>Unit Kerja</label>
            <input type="text" name="unit_kerja" class="form-control" value="{{ old('unit_kerja', $pegawai->unit_kerja) }}">
            @error('unit_kerja') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>TTD Digital</label>
            <input type="text" name="ttdx" class="form-control" value="{{ old('ttdx', $pegawai->ttdx) }}">
            @error('ttdx') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label>User</label>
            <select name="user_id" class="form-control">
              @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $pegawai->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
              @endforeach
            </select>
            @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Perbarui</button>
          <a href="{{ route('pegawai.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>

      </form>
    </div>
  </div>
</section>
@endsection
