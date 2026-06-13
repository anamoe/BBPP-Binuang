@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit </h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Program Anggaran</h3>
      </div>

      <form action="{{ route('program_anggaran.update', $programAnggaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">
          <div class="form-group">
            <label for="name">Nama Program</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $programAnggaran->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="jenis_program_anggaran_id">Jenis Program</label>
            <select name="jenis_program_anggaran_id" id="jenis_program_anggaran_id" class="form-control">
              <option value="">-- Pilih Jenis Program --</option>
              @foreach($jenis as $j)
                <option value="{{ $j->id }}" {{ old('jenis_program_anggaran_id', $programAnggaran->jenis_program_anggaran_id) == $j->id ? 'selected' : '' }}>
                  {{ $j->jenis }}
                </option>
              @endforeach
            </select>
            @error('jenis_program_anggaran_id') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="form-group">
            <label for="file">File (PDF/Word/Excel)</label>
            <input type="file" name="file" id="file" class="form-control">
            @if($programAnggaran->file)
              <p class="mt-2"><a href="{{ asset('public/storage/'.$programAnggaran->file) }}" target="_blank">Lihat File Saat Ini</a></p>
            @endif
            @error('file') <small class="text-danger">{{ $message }}</small> @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('program_anggaran.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
