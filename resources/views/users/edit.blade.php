@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Edit User</h1>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit User</h3>
      </div>

      <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">
          {{-- Nama --}}
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $user->name) }}" placeholder="Masukkan nama lengkap">
            @error('name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          {{-- Email --}}
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email', $user->email) }}" placeholder="Masukkan alamat email">
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          {{-- Password --}}
          <div class="form-group">
            <label for="password">Kata Sandi (Opsional)</label>
            <input type="password" name="password" id="password" class="form-control"
                   placeholder="Kosongkan jika tidak ingin mengubah password">
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          {{-- Role --}}
          <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" class="form-control">
              <option value="">-- Pilih Role --</option>
              @foreach ($roles as $role)
                <option value="{{ $role->id }}" 
                        {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                  {{ $role->name }}
                </option>
              @endforeach
            </select>
            @error('role_id')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
          <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
