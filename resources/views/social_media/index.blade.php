@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Daftar Social Media</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      </div>
    @endif

    <div class="card">
      <div class="card-header d-flex justify-content-end">
        <a href="{{ route('social_media.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Link</a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped text-center" id="data-table">
          <thead>
            <tr>
              <th width="50">No</th>
              <th>Link</th>
              <th width="150">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($socialMedias as $key => $item)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td class="text-left">
                  <a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a>
                </td>
                <td>
                  <a href="{{ route('social_media.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('social_media.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus link ini?')">
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
