@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Tag</h1>
      </div>
    </div>
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

    <div class="card">
      <div class="card-header d-flex justify-content-end">
        <a href="{{ route('tags.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Data
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="data-table">
          <thead class="text-center">
            <tr>
              <th style="width: 50px;">No</th>
              <th>Nama Tag</th>
              <th style="width: 150px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tags as $key => $item)
              <tr class="text-center align-middle">
                <td>{{ $key + 1 }}</td>
                <td class="text-left">{{ $item->tag_name }}</td>
                <td>
                  <a href="{{ route('tags.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>

                  <form action="{{ route('tags.destroy', $item->id) }}" 
                        method="POST" 
                        class="d-inline" 
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
@endsection