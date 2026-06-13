@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Daftar Keahlian</h1>
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
        <a href="{{ route('keahlian.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah Keahlian
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped text-center" id="data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Keahlian</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($keahlians as $key => $item)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td class="text-left">{{ $item->keahlian_name }}</td>
              <td>
                <a href="{{ route('keahlian.edit', $item->id) }}" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('keahlian.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
