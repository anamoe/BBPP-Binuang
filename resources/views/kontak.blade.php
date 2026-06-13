@extends('layouts-user.main')
@section('content')

<style>
    .page-title-bar {
        background-color: #1abc70;
        color: white;
        padding: 25px 0;
    }

    .page-title-bar h2 {
        margin: 0;
        font-weight: 600;
    }

    .header-kontak {
        background-color: #f4f6f9;
        color: Black;
        padding: 5px 0;
        text-align: center;
    }

    .card-kontak {
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-kirim {
        background-color: #1abc50;
        color: white;
        border-radius: 30px;
    }

    .btn-kirim:hover {
        background-color: #1abc50;
    }

    /* BAGIAN YANG SUDAH DIRAPIKAN */
    .info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .info-icon {
        background-color: #1abc50;
        color: white;
        padding: 8px;
        border-radius: 50%;
        min-width: 35px;
        text-align: center;
        margin-right: 12px;
    }

    .map-container iframe {
        border-radius: 12px;
    }
</style>

<!-- HEADER -->
<div class="header-kontak">
    <h2>Kontak Kami</h2>
    <p>Silakan hubungi kami melalui Telp/Fax, Email atau berkunjung ke kantor</p>
</div>

<div class="container my-5">
    <div class="row">

        <!-- INFO KONTAK -->
        <div class="col-md-5">
            <div class="card card-kontak p-4">

                <h5 class="mb-3">Informasi Kontak</h5>

                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div>
                        Jl. Jend. Ahmad Yani Km.85, Binuang,<br>
                        Kabupaten Tapin, Kalimantan Selatan<br>
                        Kode Pos 71183
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div>(+62) 341 426235 / 429725</div>
                </div>

                <div class="info-item">
                    <div class="info-icon">📱</div>
                    <div>+628979798700</div>
                </div>

                <div class="info-item">
                    <div class="info-icon">✉️</div>
                    <div>bbpp.binuang@pertanian.go.id</div>
                </div>

                <hr>

                <h6>Waktu Pelayanan</h6>
                <p>Senin - Jumat, 08.00 - 16.00 WIB</p>
                <div class="social-icons mt-3">
                    <a href="https://www.facebook.com/humasbbppbinuang" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter"></i></a>
                    <a href="https://youtube.com" target="_blank"><i class="bi bi-youtube"></i></a>
                    <a href="https://wa.me/" target="_blank"><i class="bi bi-whatsapp"></i></a>
                </div>


            </div>
        </div>

        <!-- FORM KONTAK -->
        <div class="col-md-7">
            <div class="card card-kontak p-4">
                <h5 class="mb-3">Kirim Pesan</h5>

                <form id="formWa">


                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                    </div>



                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Pesan atau komentar" name="pesan"></textarea>
                    </div>

                    <button type="submit" class="btn btn-kirim w-100">
                        Kirim Pesan WhatsApp
                    </button>

                </form>
            </div>
        </div>

    </div>

    <!-- MAP -->
    <div class="row mt-5">
        <div class="col">
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps?q=BBPPBinuang+Binuang+Tapin+Kalimantan+Selatan&output=embed"
                    width="100%"
                    height="350"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>

</div>
<script>
    document.getElementById("formWa").addEventListener("submit", function(e) {
        e.preventDefault();

        let nama = document.querySelector("input[name=nama]").value;
        let alamat = document.querySelector("input[name=alamat]").value;
        let pesan = document.querySelector("textarea[name=pesan]").value;

        let nomorTujuan = "6282257661154"; // ganti nomor WA tujuan (pakai kode negara, tanpa +)

        let text = `Halo, saya ingin menghubungi: Nama: ${nama} Alamat: ${alamat} Pesan:${pesan}`;

        let url = "https://wa.me/" + nomorTujuan + "?text=" + encodeURIComponent(text);

        window.open(url, "_blank");
    });
</script>

@endsection
@push('scripts')

@endpush