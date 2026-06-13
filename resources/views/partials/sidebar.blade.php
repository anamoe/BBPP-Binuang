<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #007B2E;">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('public/image/binuang.png') }}" alt="" style="width: 200px">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Sarana & Prasarana -->
        <li class="nav-item {{ Request::is('dashboard/sarana-prasarana*') ||  Request::is('dashboard/saranaprasarana-slider*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('dashboard/sarana-prasarana*') ||  Request::is('dashboard/saranaprasarana-slider*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                  Sarana Prasarana
                  <i class="fas fa-angle-left right"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('sarana_prasarana.index') }}" class="nav-link {{ Request::is('dashboard/sarana-prasarana*') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sarana Prasarana</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('sarana_prasarana_slider.index') }}" class="nav-link {{ Request::is('dashboard/saranaprasarana-slider*') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Gambar Slider</p>
                  </a>
              </li>
          </ul>
        </li>

        <!-- Program dan Anggaran -->
        <li class="nav-header">DATA PELAPORAN</li>
        <li class="nav-item {{ Request::is('dashboard/jenis-program-anggaran*') ||  Request::is('dashboard/program-anggaran*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('dashboard/jenis-program-anggaran*') ||  Request::is('dashboard/program-anggaran*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('jenis_program_anggaran.index') }}" class="nav-link {{ Request::is('dashboard/jenis-program-anggaran*') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Jenis</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('program_anggaran.index') }}" class="nav-link {{ Request::is('dashboard/program-anggaran*') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pelaporan</p>
                  </a>
              </li>
          </ul>
        </li>

        <!-- PPID -->
        <li class="nav-header">PPID</li>
        <li class="nav-item {{ Request::is('dashboard/jenis-ppid*') || Request::is('dashboard/dokumen-ppid*') || Request::is('dashboard/infografis-ppid*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('dashboard/jenis-ppid*') || Request::is('dashboard/dokumen-ppid*') || Request::is('dashboard/infografis-ppid*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-folder-open"></i>
            <p>
              Data PPID
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('jenis_ppid.index') }}" class="nav-link {{ Request::is('dashboard/jenis-ppid*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Jenis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dokumen_ppid.index') }}" class="nav-link {{ Request::is('dashboard/dokumen-ppid*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dokumen PPID</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('infografis_ppid.index') }}" class="nav-link {{ Request::is('dashboard/infografis-ppid*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Infografis PPID</p>
              </a>
            </li>
          </ul>
        </li>

         <!-- Data Pelatihan -->
        <li class="nav-header">DATA PELATIHAN</li>
          <li class="nav-item">
            <a href="{{ route('pelatihan.index') }}" class="nav-link {{ Request::is('dashboard/pelatihan*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher nav-icon"></i> <!-- ikon guru/pelatihan -->
                <p>Pelatihan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('keahlian.index') }}" class="nav-link {{ Request::is('dashboard/keahlian*') ? 'active' : '' }}">
                <i class="fas fa-id-badge nav-icon"></i> <!-- ikon sertifikat -->
                <p>Keahlian</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('skema_sertifikasi.index') }}" class="nav-link {{ Request::is('dashboard/skema-sertifikasi*') ? 'active' : '' }}">
                <i class="fas fa-project-diagram nav-icon"></i> <!-- ikon skema/proyek -->
                <p>Skema Sertifikasi</p>
            </a>
        </li>

        </li>
        <li class="nav-item">
          <a href="{{ route('agenda_kegiatan.index') }}" class="nav-link {{ Request::is('dashboard/agenda-kegiatan*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Agenda Kegiatan</p>
          </a>
        </li>

        @if (Auth::user()->role->name === "Admin")
        <!-- Master Data -->
        <li class="nav-header">MASTER DATA</li>
        <li class="nav-item"><a href="{{ route('tags.index') }}" class="nav-link {{ Request::is('dashboard/tags*') ? 'active' : '' }}"><i class="nav-icon fas fa-tag"></i><p>Tag</p></a></li>
        <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"><i class="nav-icon fas fa-folder-open"></i><p>Kategori</p></a></li>
        <li class="nav-item"><a href="{{ route('articles.index') }}" class="nav-link {{ Request::is('dashboard/articles*') ? 'active' : '' }}"><i class="nav-icon fas fa-newspaper"></i><p>Berita</p></a></li>
        <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}"><i class="nav-icon fas fa-user"></i><p>User</p></a></li>
        <li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('dashboard/roles*') ? 'active' : '' }}"><i class="nav-icon fas fa-user-shield"></i><p>Role</p></a></li>
        <li class="nav-item"><a href="{{ route('organisasi.index') }}" class="nav-link {{ Request::is('dashboard/organisasi*') ? 'active' : '' }}"><i class="nav-icon fas fa-building"></i><p>Organisasi</p></a></li>
        <li class="nav-item"><a href="{{ route('task.index') }}" class="nav-link {{ Request::is('dashboard/task*') ? 'active' : '' }}"><i class="nav-icon fas fa-tasks"></i><p>Tugas</p></a></li>
        <li class="nav-item"><a href="{{ route('visi.index') }}" class="nav-link {{ Request::is('dashboard/visi*') ? 'active' : '' }}"><i class="nav-icon fas fa-eye"></i><p>Visi</p></a></li>
        <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link {{ Request::is('dashboard/about*') ? 'active' : '' }}"><i class="nav-icon fas fa-info-circle"></i><p>Tentang</p></a></li>
        <li class="nav-item"><a href="{{ route('pegawai.index') }}" class="nav-link {{ Request::is('dashboard/pegawai*') ? 'active' : '' }}"><i class="nav-icon fas fa-users"></i><p>Pegawai</p></a></li>
        {{-- <li class="nav-item"><a href="{{ route('social_media.index') }}" class="nav-link {{ Request::is('dashboard/social-media*') ? 'active' : '' }}"><i class="nav-icon fas fa-comment"></i><p>Platform Sosial Media</p></a></li> --}}
        <li class="nav-item"><a href="{{ route('banner.index') }}" class="nav-link {{ Request::is('dashboard/banner*') ? 'active' : '' }}"><i class="nav-icon fas fa-images"></i><p>Banner</p></a></li>
        <li class="nav-item"><a href="{{ route('upt_external.index') }}" class="nav-link {{ Request::is('dashboard/upt-external*') ? 'active' : '' }}"><i class="nav-icon fas fa-link"></i><p>UPT External</p></a></li>
        <li class="nav-item mb-4"><a href="{{ route('inovasi_layanan.index') }}" class="nav-link {{ Request::is('dashboard/inovasi-layanan*') ? 'active' : '' }}"><i class="nav-icon fas fa-lightbulb"></i><p>Inovasi Layanan</p></a></li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
