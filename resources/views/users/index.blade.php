@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Daftar User</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    @endif

    <div class="card">
      <div class="card-header d-flex justify-content-end">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah User
        </a>
      </div>

      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="data-table">
          <thead class="text-center">
            <tr>
              <th width="50">No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              <th width="150">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $key => $user)
              <tr class="text-center align-middle">
                <td>{{ $key + 1 }}</td>
                <td class="text-left">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name ?? '-' }}</td>
                <td>
                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
