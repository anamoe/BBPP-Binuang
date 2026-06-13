@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Tambah Dokumen PPID</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Dokumen PPID</h3>
      </div>

      <form action="{{ route('dokumen_ppid.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

          <div class="form-group">
            <label for="name">Nama Dokumen (Opsional)</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama dokumen" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="jenis_ppid_id">Jenis PPID</label>
            <select name="jenis_ppid_id" id="jenis_ppid_id" class="form-control">
              <option value="">-- Pilih Jenis PPID --</option>
              @foreach($jenis_ppid as $jenis)
                <option value="{{ $jenis->id }}" {{ old('jenis_ppid_id') == $jenis->id ? 'selected' : '' }}>
                  {{ $jenis->jenis }}
                </option>
              @endforeach
            </select>
            @error('jenis_ppid_id') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="file">File Dokumen</label>
            <input type="file" name="file" id="file" class="form-control">
            @error('file') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="{{ route('dokumen_ppid.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
