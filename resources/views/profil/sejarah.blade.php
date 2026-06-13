@extends('layouts-user.main')

@section('content')


{{-- === Info Section === --}}
<section id="info" class="py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-1" data-aos="fade-up">
            <h2>Sejarah Singkat</h2>
        </div>

        <div class="row align-items-start g-4">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <img src="{{ asset('public/image/sejarah.jpeg') }}"
                        class="img-fluid rounded-3"
                        alt="BBPP">
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
             
                <div class="sejarah-wrapper" style=" text-align: justify; font-size: 14px;">
                    <p>
                        Balai Besar Pelatihan Pertanian (BBPP) Binuang merupakan Unit Pelaksana Teknis (UPT) di bawah
                        Badan Penyuluhan dan Pengembangan Sumber Daya Manusia Pertanian (BPPSDMP).
                        Awal berdiri pada tahun 1952 dengan nama Balai Pendidikan Masyarakat Desa (BPMD),
                        kemudian pada tahun 1953 berubah menjadi Pusat Kursus Pertanian Kalimantan (PKPK).
                    </p>

                    <p>
                        Seiring perkembangan pembangunan pertanian dan peningkatan beban tugas, pada tahun 1969
                        ditingkatkan menjadi Pusat Pengembangan Pertanian. Pada tahun 1975 statusnya kembali meningkat
                        berdasarkan SK Menteri Pertanian Nomor 190/Kpts/Org/5/1975 menjadi Pusat Latihan Pertanian (PLP).
                        Selanjutnya melalui SK Menteri Pertanian Nomor 52/Kpts/Org/1/1978, PLP ditingkatkan fungsinya
                        menjadi Balai Latihan Pegawai Pertanian (BLPP) Binuang.
                    </p>

                    <p>
                        Fungsi BLPP kemudian diperluas menjadi Balai Diklat Pertanian (BDP) Binuang melalui
                        SK Menteri Pertanian Nomor 84/Kpts/OT.210/2/2000 tanggal 29 Februari 2000.
                        Untuk pengembangan potensi wilayah dan menyesuaikan arah pembangunan pertanian,
                        diterbitkan SK Menteri Pertanian Nomor 333/Kpts/OT.210/5/2002 tanggal 8 Mei 2002,
                        yang memberikan tugas pelatihan teknis di bidang perkebunan dan teknologi lahan pasang surut,
                        sehingga berubah nama menjadi Balai Diklat Agribisnis Perkebunan dan Teknologi Pasang Surut
                        (BDAPTPS) Binuang.
                    </p>

                    <p>
                        Melalui Peraturan Menteri Pertanian RI Nomor 18/Permentan/OT.140/2/2007 tanggal 19 Februari 2007,
                        eselonering ditingkatkan menjadi II-b dengan perubahan nama menjadi Balai Besar Pelatihan Pertanian
                        (BBPP) Binuang, dengan tugas melaksanakan dan mengembangkan teknik pelatihan teknis, fungsional,
                        dan kewirausahaan di bidang pertanian bagi aparatur dan nonaparatur.
                    </p>

                    <p>
                        Pada tahun 2013, tugas BBPP Binuang disempurnakan melalui Peraturan Menteri Pertanian
                        Nomor 104/Permentan/OT.140/10/2013 tanggal 9 Oktober 2013, yaitu melaksanakan pelatihan fungsional
                        bagi aparatur, pelatihan teknis dan profesi, serta pengembangan model dan teknik pelatihan
                        fungsional dan teknis bidang pertanian bagi aparatur dan nonaparatur pertanian.
                    </p>

                    <p>
                        Wilayah kerja BBPP Binuang meliputi Provinsi Kalimantan Selatan, Kalimantan Tengah,
                        Kalimantan Barat, Kalimantan Timur, dan Kalimantan Utara.
                    </p>
                </div>




            </div>
        </div>
    </div>
</section>




<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0"
    nonce="FBSDK"></script>
@endsection