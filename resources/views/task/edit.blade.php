@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit Tugas</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Tugas</h3>
      </div>

      <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="desc">Deskripsi</label>
            <textarea name="desc" id="desc" class="form-control">{{ old('desc', $task->desc ?? '') }}</textarea>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('task.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
