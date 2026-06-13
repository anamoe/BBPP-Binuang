<footer style="padding:50px 0;">
  <div class="container">
    <div class="row">
        <div class="col-md-5 mb-4 pr-0">
        <h5>Tentang Kami</h5>
        <div class="d-flex justify-content-start align-items-center mt-2 mb-4 flex-wrap" style="gap: 10px;">
          <img src="{{ asset('public/image/kementan.png') }}" alt="Kementan" style="height: 40px;">
          <img src="{{ asset('public/image/bppsdmp.png') }}" alt="BPPSDMP" style="height: 40px;">
          <img src="{{ asset('public/image/melyani.png') }}" alt="Melyani" style="height: 40px;">
          <img src="{{ asset('public/image/berakhlak.png') }}" alt="Berakhlak" style="height: 40px;">
        </div>
        <p>
          {!! $footer->desc !!}
        </p>
        <div>
            <a href="https://www.facebook.com/humasbbppbinuang/?locale=id_ID" target="_blank" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/bbppbinuang" target="_blank" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="https://www.tiktok.com/@bbpp.binuang" target="_blank" class="social-icon"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.youtube.com/c/BBPPBinuang" target="_blank" class="social-icon"><i class="bi bi-youtube"></i></a>
        </div>
    </div>

      <!-- Menu -->
     <div class="col-md-2 mb-4 pr-0">
      <h5>Menu</h5>
      <ul class="list-unstyled">
        <li><a href="{{url('')}}"><i class="fas fa-angle-right me-2"></i> Beranda</a></li>
        <li><a href="{{url('dokumen-ppid')}}"><i class="fas fa-angle-right me-2"></i> Dokumen PPID</a></li>
        <li><a href="{{url('infografis-ppid')}}"><i class="fas fa-angle-right me-2"></i> Infografis PPID</a></li>
        <li><a href="{{url('kontak')}}"><i class="fas fa-angle-right me-2"></i> Kontak</a></li>
    
        <!-- <li><a href="{{url('ppi')}}"><i class="fas fa-angle-right me-2"></i> Tentang Kami</a></li> -->
      </ul>
    </div>

      <!-- Lokasi -->
      <div class="col-md-3 mb-4">
        <h5>Lokasi</h5>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7720490522925!2d115.08673019999998!3d-3.1547122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de5c8a25aae02d3%3A0xa98e801841821528!2sBBPP%20Binuang!5e0!3m2!1sid!2sid!4v1761189053507!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <!-- Statistik -->
      <div class="col-md-2 mb-4 pr-0">
        <h5>Statistik</h5>
        <div style="background:#3e7712; padding:20px; border-radius:10px; text-align:center;">
          <p>Minggu Ini</p>
          <h3 class="text-white">{{ number_format($mingguIni) }}</h3>
          <hr>
          <p class="mb-0">Bulan Ini</p>
          <h5 class="text-white">{{ number_format($bulanIni) }}</h5>
          <p class="mb-0">Tahun Ini</p>
          <h5 class="text-white">{{ number_format($tahunIni) }}</h5>
          <p class="mb-0">Total</p>
          <h5 class="text-white">{{ number_format($total) }}</h5>
        </div>
      </div>
    </div>

    <div class="footer-bottom text-center mt-4">
      <p class="mb-0" id="c"></p>
    </div>
  </div>
</footer>
