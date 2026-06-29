@extends('layouts-admin.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- Jumlah Pelatihan -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $jumlahPelatihan }}</h3>
            <p>Pelatihan</p>
          </div>
          <div class="icon">
            <i class="ion ion-university"></i>
          </div>
          <a href="{{ route('pelatihan.index') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Jumlah Keahlian -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $jumlahKeahlian }}</h3>
            <p>Keahlian</p>
          </div>
          <div class="icon">
            <i class="ion ion-gear-a"></i>
          </div>
          <a href="{{ route('keahlian.index') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Jumlah Skema Sertifikasi -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $jumlahSkema }}</h3>
            <p>Skema Sertifikasi</p>
          </div>
          <div class="icon">
            <i class="ion ion-ribbon-b"></i>
          </div>
          <a href="{{ route('skema_sertifikasi.index') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Jumlah Sarana Prasarana -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $jumlahSarana }}</h3>
            <p>Sarana Prasarana</p>
          </div>
          <div class="icon">
            <i class="ion ion-images"></i>
          </div>
          <a href="{{ route('sarana_prasarana.index') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
<ol class="breadcrumb float-sm-center">

  <h4>Ulang Tahun Pegawai BBPP Binuang</h4>
</ol>
<!-- <table class="table table-bordered">
  <thead>
    <tr>

      <th>No.</th>
      <th>Nama</th>
      <th>Tanggal Lahir</th>
      <th>Umur Akan Datang</th>
      <th>Sisa Hari</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pegawai as $key => $p)
    <tr>
      <td>{{ $key +1 }}</td>
      <td>{{ $p->name }}</td>
      <td>{{ $p->tanggal_lahir }}</td>
      <td>{{ $p->umur_akan_datang }} Tahun</td>
      <td>
        @if($p->sisa_hari == 0)
        🎉 Hari ini
        @else
        {{ $p->sisa_hari }}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table> -->
@endsection