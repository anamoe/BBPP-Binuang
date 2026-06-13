@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Berita</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
    <div class="container-fluid">

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
        </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Berita
                </a>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped" id="data-table">
                    <thead class="text-center">
                        <tr>
                            <th width="50">No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tag</th>
                            <th>View</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $key => $item)
                        <tr class="align-middle">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->category_name }}</td>
                            <td>
                            @foreach ($item->tags as $tag)
                            <span class="badge badge-info">
                                {{ $tag->tag_name }}
                            </span>
                            @endforeach
                            </td>
                            <td class="text-center">{{ $item->view }}</td>
                            <td class="text-center">
                            <a href="{{ route('articles.edit',$item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('articles.destroy',$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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