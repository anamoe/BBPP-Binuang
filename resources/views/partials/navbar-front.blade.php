<nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-bbpp">
    <div class="container pt-1 pb-1">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/image/bbppbinuang.png')}}" alt="" style="width: 200px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}" data-voice="Beranda">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('profil*') || Request::is('profil*')  ? 'active' :
                     '' }}" href="#" data-bs-toggle="dropdown" data-voice="">
                        Profil</a>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="{{route('sejarah')}}" data-voice="Sejarah Singkat">Sejarah Singkat</a></li>
                        <li><a class="dropdown-item" href="{{route('visi')}}">Visi Misi</a></li>
                        <li><a class="dropdown-item" href="{{route('dasarhukum')}}">Dasar Hukum</a></li>
                        <li><a class="dropdown-item" href="{{route('tugas')}}">Tugas dan Fungsi</a></li>
                        <li><a class="dropdown-item" href="{{route('struktur')}}">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="{{route('profil_pejabat')}}">Profil Pejabat</a></li>
                        <li><a class="dropdown-item" href="{{route('lhkpn')}}">LHKPN-LHKASN</a></li>
                        <li><a class="dropdown-item" href="{{route('sarana')}}">Sarana Prasarana</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('informasi-program') || 
                    Request::is('sarana-dan-prasarana')  ? 'active' : '' }}"
                        href="#" data-bs-toggle="dropdown" data-voice="">Informasi Publik</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('informasi-program')}}">Informasi Program</a></li>
                        <li><a class="dropdown-item" href="{{route('kinerja')}}">Kinerja</a></li>
                        <li><a class="dropdown-item" href="{{route('keuangan')}}">Keuangan</a></li>
                        <li><a class="dropdown-item" href="{{route('infografis-ppid')}}">PPID</a></li>

                        <li><a class="dropdown-item" href="{{route('dokumen-ppid')}}">Dokumen PPID</a></li>
                        <li><a class="dropdown-item" href="{{route('pbj')}}" data-voice="Pengadaan Barang Jasa">Pengadaan Barang Jasa</a></li>
                    </ul>
                </li>


                <li class="nav-item"><a class="nav-link {{ Request::is('berita*') ? 'active' : '' }}" href="{{url('berita')}}">Berita</a></li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pelatihan*') ? 'active' : '' }}" href="{{url('pelatihan')}}" data-voice="Agenda">
                        Agenda</a>
                </li>

                <li class="nav-item"><a class="nav-link {{ Request::is('kontak*') ? 'active' : '' }}" href="{{url('kontak')}}" data-voice="Kontak">Kontak</a></li>

            </ul>
        </div>
    </div>
</nav>