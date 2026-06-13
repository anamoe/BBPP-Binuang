<?php

use App\Http\Controllers\{ AuthController, RoleController, TaskController, UserController, VisiController, AboutController, ArticleController, BannerController, BerandaController, BeritaController, DashboardController, DokumenPPIDController, InfografisPPIDController, PegawaiController, OrganisasiController, SocialMediaController, UptExternalController, InovasiLayananController, JadwalAgendaController, JenisPPIDController, JenisProgramAnggaranController, KeahlianController, KerjasamaController, PelatihanController, PenyelenggraPelatihanController, PPIDController, ProgramAnggaranController, SaranaPrasaranaController, SaranaPrasaranaSliderController, SkemaSertifikasiController, TagController };
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('index');
Route::get('/kontak', [BerandaController::class, 'kontak'])->name('kontak');
Route::get('/pelatihan', [PenyelenggraPelatihanController::class, 'pelatihan']);
Route::get('/skema-sertifikasi', [PenyelenggraPelatihanController::class, 'skemaSertifikasi']);
Route::get('/agenda/events', [PenyelenggraPelatihanController::class, 'getEvents'])->name('agenda.events');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{article}', [BeritaController::class, 'show'])
    ->name('berita.show');


Route::prefix('informasi-publik')->group(function () {
Route::get('/kinerja', [BerandaController::class, 'kinerja'])->name('kinerja');
Route::get('/keuangan', [BerandaController::class, 'keuangan'])->name('keuangan');
Route::get('/pengadaan-barang-jasa', [BerandaController::class, 'pbj'])->name('pbj');
Route::get('/informasi-program', [KerjasamaController::class, 'programDanKerjasama'])->name('informasi-program');
Route::get('/dokumen-ppid', [PPIDController::class, 'dokumenPPID'])->name('dokumen-ppid');
Route::get('/infografis-ppid', [PPIDController::class, 'infografisPPID'])->name('infografis-ppid');

});

Route::prefix('profil')->group(function () {
Route::get('/sejarah', [BerandaController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi', [BerandaController::class, 'visi'])->name('visi');
Route::get('/dasar-hukum', [BerandaController::class, 'dasarhukum'])->name('dasarhukum');
Route::get('/profil-pejabat', [BerandaController::class, 'profilpejabat'])->name('profil_pejabat');
Route::get('/lhkpn-lhkasn', [BerandaController::class, 'lhkpn'])->name('lhkpn');
Route::get('/sarana-prasarana', [KerjasamaController::class, 'SaranaPrasarana'])->name('sarana');
Route::get('/sarana/{id}', [KerjasamaController::class, 'detailSarana'])
    ->name('sarana.detail');
Route::get('/struktur-organisasi', [BerandaController::class, 'struktur'])->name('struktur');
Route::get('/tugas-fungsi', [BerandaController::class, 'tugas'])->name('tugas');
Route::get('/sejarah', [BerandaController::class, 'sejarah'])->name('sejarah');

});


// Route login & logout (bebas diakses)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware(['auth','role:Admin'])->group(function () {
    // =============================
    // INOVASI LAYANAN
    // =============================
    
    Route::get('/dashboard/inovasi-layanan', [InovasiLayananController::class, 'index'])->name('inovasi_layanan.index');
    Route::get('/dashboard/inovasi-layanan/create', [InovasiLayananController::class, 'create'])->name('inovasi_layanan.create');
    Route::post('/dashboard/inovasi-layanan/store', [InovasiLayananController::class, 'store'])->name('inovasi_layanan.store');
    Route::get('/dashboard/inovasi-layanan/edit/{id}', [InovasiLayananController::class, 'edit'])->name('inovasi_layanan.edit');
    Route::put('/dashboard/inovasi-layanan/update/{id}', [InovasiLayananController::class, 'update'])->name('inovasi_layanan.update');
    Route::delete('/dashboard/inovasi-layanan/delete/{id}', [InovasiLayananController::class, 'destroy'])->name('inovasi_layanan.destroy');

    // =============================
    // UPT EXTERNAL
    // =============================
    Route::get('/dashboard/upt-external', [UptExternalController::class, 'index'])->name('upt_external.index');
    Route::get('/dashboard/upt-external/create', [UptExternalController::class, 'create'])->name('upt_external.create');
    Route::post('/dashboard/upt-external/store', [UptExternalController::class, 'store'])->name('upt_external.store');
    Route::get('/dashboard/upt-external/edit/{id}', [UptExternalController::class, 'edit'])->name('upt_external.edit');
    Route::put('/dashboard/upt-external/update/{id}', [UptExternalController::class, 'update'])->name('upt_external.update');
    Route::delete('/dashboard/upt-external/delete/{id}', [UptExternalController::class, 'destroy'])->name('upt_external.destroy');

    // =============================
    // BANNER
    // =============================
    Route::get('/dashboard/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/dashboard/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/dashboard/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/dashboard/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/dashboard/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/dashboard/banner/delete/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

    // =============================
    // SOCIAL MEDIA
    // =============================
    Route::get('/dashboard/social-media', [SocialMediaController::class, 'index'])->name('social_media.index');
    Route::get('/dashboard/social-media/create', [SocialMediaController::class, 'create'])->name('social_media.create');
    Route::post('/dashboard/social-media/store', [SocialMediaController::class, 'store'])->name('social_media.store');
    Route::get('/dashboard/social-media/edit/{id}', [SocialMediaController::class, 'edit'])->name('social_media.edit');
    Route::put('/dashboard/social-media/update/{id}', [SocialMediaController::class, 'update'])->name('social_media.update');
    Route::delete('/dashboard/social-media/delete/{id}', [SocialMediaController::class, 'destroy'])->name('social_media.destroy');

    // =============================
    // ABOUT
    // =============================
    Route::get('/dashboard/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/dashboard/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/dashboard/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/dashboard/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/dashboard/about/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/dashboard/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

    // =============================
    // TASK
    // =============================
    Route::get('/dashboard/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/dashboard/task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/dashboard/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/dashboard/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/dashboard/task/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/dashboard/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');

    // =============================
    // VISI
    // =============================
    Route::get('/dashboard/visi', [VisiController::class, 'index'])->name('visi.index');
    Route::get('/dashboard/visi/create', [VisiController::class, 'create'])->name('visi.create');
    Route::post('/dashboard/visi/store', [VisiController::class, 'store'])->name('visi.store');
    Route::get('/dashboard/visi/{id}/edit', [VisiController::class, 'edit'])->name('visi.edit');
    Route::put('/dashboard/visi/{id}', [VisiController::class, 'update'])->name('visi.update');
    Route::delete('/dashboard/visi/{id}', [VisiController::class, 'destroy'])->name('visi.destroy');

    // =============================
    // ORGANISASI
    // =============================
    Route::get('/dashboard/organisasi', [OrganisasiController::class, 'index'])->name('organisasi.index');
    Route::get('/dashboard/organisasi/create', [OrganisasiController::class, 'create'])->name('organisasi.create');
    Route::post('/dashboard/organisasi/store', [OrganisasiController::class, 'store'])->name('organisasi.store');
    Route::get('/dashboard/organisasi/{id}/edit', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
    Route::put('/dashboard/organisasi/{id}', [OrganisasiController::class, 'update'])->name('organisasi.update');
    Route::delete('/dashboard/organisasi/{id}', [OrganisasiController::class, 'destroy'])->name('organisasi.destroy');

    // =============================
    // ROLE
    // =============================
    Route::get('/dashboard/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/dashboard/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/dashboard/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/dashboard/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/dashboard/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/dashboard/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // =============================
    // USERS
    // =============================
    Route::get('/dashboard/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/dashboard/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/dashboard/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/dashboard/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/dashboard/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/dashboard/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // =============================
    // PEGAWAI
    // =============================
    Route::get('/dashboard/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/dashboard/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/dashboard/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/dashboard/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/dashboard/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/dashboard/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    // =============================
    // TAG
    // =============================
    Route::resource('/dashboard/tags', TagController::class);

    // =============================
    // CATEGORY
    // =============================
    Route::resource('/dashboard/categories', CategoryController::class);

    // =============================
    // Berita
    // =============================
    Route::resource('/dashboard/articles', ArticleController::class);
});


Route::middleware(['auth'])->group(function () {
    // =============================
    // SARANA PRASARANA
    // =============================
    Route::get('/dashboard/sarana-prasarana', [SaranaPrasaranaController::class, 'index'])->name('sarana_prasarana.index');
    Route::get('/dashboard/sarana-prasarana/create', [SaranaPrasaranaController::class, 'create'])->name('sarana_prasarana.create');
    Route::post('/dashboard/sarana-prasarana/store', [SaranaPrasaranaController::class, 'store'])->name('sarana_prasarana.store');
    Route::get('/dashboard/sarana-prasarana/edit/{id}', [SaranaPrasaranaController::class, 'edit'])->name('sarana_prasarana.edit');
    Route::put('/dashboard/sarana-prasarana/update/{id}', [SaranaPrasaranaController::class, 'update'])->name('sarana_prasarana.update');
    Route::delete('/dashboard/sarana-prasarana/delete/{id}', [SaranaPrasaranaController::class, 'destroy'])->name('sarana_prasarana.destroy');
    // =============================
    // SARANA PRASARANA SLIDER
    // =============================
    Route::get('/dashboard/saranaprasarana-slider', [SaranaPrasaranaSliderController::class, 'index'])->name('sarana_prasarana_slider.index');
    Route::get('/dashboard/saranaprasarana-slider/create', [SaranaPrasaranaSliderController::class, 'create'])->name('sarana_prasarana_slider.create');
    Route::post('/dashboard/saranaprasarana-slider/store', [SaranaPrasaranaSliderController::class, 'store'])->name('sarana_prasarana_slider.store');
    Route::get('/dashboard/saranaprasarana-slider/edit/{id}', [SaranaPrasaranaSliderController::class, 'edit'])->name('sarana_prasarana_slider.edit');
    Route::put('/dashboard/saranaprasarana-slider/update/{id}', [SaranaPrasaranaSliderController::class, 'update'])->name('sarana_prasarana_slider.update');
    Route::delete('/dashboard/saranaprasarana-slider/delete/{id}', [SaranaPrasaranaSliderController::class, 'destroy'])->name('sarana_prasarana_slider.destroy');
    // =============================
    // JENIS PROGRAM ANGGARAN
    // =============================
    Route::get('/dashboard/jenis-program-anggaran', [JenisProgramAnggaranController::class, 'index'])->name('jenis_program_anggaran.index');
    Route::get('/dashboard/jenis-program-anggaran/create', [JenisProgramAnggaranController::class, 'create'])->name('jenis_program_anggaran.create');
    Route::post('/dashboard/jenis-program-anggaran/store', [JenisProgramAnggaranController::class, 'store'])->name('jenis_program_anggaran.store');
    Route::get('/dashboard/jenis-program-anggaran/edit/{id}', [JenisProgramAnggaranController::class, 'edit'])->name('jenis_program_anggaran.edit');
    Route::put('/dashboard/jenis-program-anggaran/update/{id}', [JenisProgramAnggaranController::class, 'update'])->name('jenis_program_anggaran.update');
    Route::delete('/dashboard/jenis-program-anggaran/delete/{id}', [JenisProgramAnggaranController::class, 'destroy'])->name('jenis_program_anggaran.destroy');
    // =============================
    // PROGRAM ANGGARAN
    // =============================
    Route::get('/dashboard/program-anggaran', [ProgramAnggaranController::class, 'index'])->name('program_anggaran.index');
    Route::get('/dashboard/program-anggaran/create', [ProgramAnggaranController::class, 'create'])->name('program_anggaran.create');
    Route::post('/dashboard/program-anggaran/store', [ProgramAnggaranController::class, 'store'])->name('program_anggaran.store');
    Route::get('/dashboard/program-anggaran/edit/{id}', [ProgramAnggaranController::class, 'edit'])->name('program_anggaran.edit');
    Route::put('/dashboard/program-anggaran/update/{id}', [ProgramAnggaranController::class, 'update'])->name('program_anggaran.update');
    Route::delete('/dashboard/program-anggaran/delete/{id}', [ProgramAnggaranController::class, 'destroy'])->name('program_anggaran.destroy');
    // =============================
    // JENIS PPID
    // =============================
    Route::get('/dashboard/jenis-ppid', [JenisPPIDController::class, 'index'])->name('jenis_ppid.index');
    Route::get('/dashboard/jenis-ppid/create', [JenisPPIDController::class, 'create'])->name('jenis_ppid.create');
    Route::post('/dashboard/jenis-ppid/store', [JenisPPIDController::class, 'store'])->name('jenis_ppid.store');
    Route::get('/dashboard/jenis-ppid/edit/{id}', [JenisPPIDController::class, 'edit'])->name('jenis_ppid.edit');
    Route::put('/dashboard/jenis-ppid/update/{id}', [JenisPPIDController::class, 'update'])->name('jenis_ppid.update');
    Route::delete('/dashboard/jenis-ppid/delete/{id}', [JenisPPIDController::class, 'destroy'])->name('jenis_ppid.destroy');
    // =============================
    // DOKOMEN PPID
    // =============================
    Route::get('/dashboard/dokumen-ppid', [DokumenPPIDController::class, 'index'])->name('dokumen_ppid.index');
    Route::get('/dashboard/dokumen-ppid/create', [DokumenPPIDController::class, 'create'])->name('dokumen_ppid.create');
    Route::post('/dashboard/dokumen-ppid/store', [DokumenPPIDController::class, 'store'])->name('dokumen_ppid.store');
    Route::get('/dashboard/dokumen-ppid/edit/{id}', [DokumenPPIDController::class, 'edit'])->name('dokumen_ppid.edit');
    Route::put('/dashboard/dokumen-ppid/update/{id}', [DokumenPPIDController::class, 'update'])->name('dokumen_ppid.update');
    Route::delete('/dashboard/dokumen-ppid/delete/{id}', [DokumenPPIDController::class, 'destroy'])->name('dokumen_ppid.destroy');
    // =============================
    // INFOGRAFIS PPID
    // =============================
    Route::get('/dashboard/infografis-ppid', [InfografisPPIDController::class, 'index'])->name('infografis_ppid.index');
    Route::get('/dashboard/infografis-ppid/create', [InfografisPPIDController::class, 'create'])->name('infografis_ppid.create');
    Route::post('/dashboard/infografis-ppid/store', [InfografisPPIDController::class, 'store'])->name('infografis_ppid.store');
    Route::get('/dashboard/infografis-ppid/edit/{id}', [InfografisPPIDController::class, 'edit'])->name('infografis_ppid.edit');
    Route::put('/dashboard/infografis-ppid/update/{id}', [InfografisPPIDController::class, 'update'])->name('infografis_ppid.update');
    Route::delete('/dashboard/infografis-ppid/delete/{id}', [InfografisPPIDController::class, 'destroy'])->name('infografis_ppid.destroy');
    // =============================
    // JADWAL AGENDA
    // =============================
    Route::get('/dashboard/agenda-kegiatan', [JadwalAgendaController::class, 'index'])->name('agenda_kegiatan.index');
    Route::get('/dashboard/agenda-kegiatan/create', [JadwalAgendaController::class, 'create'])->name('agenda_kegiatan.create');
    Route::post('/dashboard/agenda-kegiatan/store', [JadwalAgendaController::class, 'store'])->name('agenda_kegiatan.store');
    Route::get('/dashboard/agenda-kegiatan/edit/{id}', [JadwalAgendaController::class, 'edit'])->name('agenda_kegiatan.edit');
    Route::put('/dashboard/agenda-kegiatan/update/{id}', [JadwalAgendaController::class, 'update'])->name('agenda_kegiatan.update');
    Route::delete('/dashboard/agenda-kegiatan/delete/{id}', [JadwalAgendaController::class, 'destroy'])->name('agenda_kegiatan.destroy');
    // =============================
    // KEAHLIAN
    // =============================
    Route::get('/dashboard/keahlian', [KeahlianController::class, 'index'])->name('keahlian.index');
    Route::get('/dashboard/keahlian/create', [KeahlianController::class, 'create'])->name('keahlian.create');
    Route::post('/dashboard/keahlian/store', [KeahlianController::class, 'store'])->name('keahlian.store');
    Route::get('/dashboard/keahlian/edit/{id}', [KeahlianController::class, 'edit'])->name('keahlian.edit');
    Route::put('/dashboard/keahlian/update/{id}', [KeahlianController::class, 'update'])->name('keahlian.update');
    Route::delete('/dashboard/keahlian/delete/{id}', [KeahlianController::class, 'destroy'])->name('keahlian.destroy');

    // =============================
    // PELATIHAN
    // =============================
    Route::get('/dashboard/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
    Route::get('/dashboard/pelatihan/create', [PelatihanController::class, 'create'])->name('pelatihan.create');
    Route::post('/dashboard/pelatihan/store', [PelatihanController::class, 'store'])->name('pelatihan.store');
    Route::get('/dashboard/pelatihan/edit/{id}', [PelatihanController::class, 'edit'])->name('pelatihan.edit');
    Route::put('/dashboard/pelatihan/update/{id}', [PelatihanController::class, 'update'])->name('pelatihan.update');
    Route::delete('/dashboard/pelatihan/delete/{id}', [PelatihanController::class, 'destroy'])->name('pelatihan.destroy');

    // =============================
    // SKEMA SERTIFIKASI
    // =============================
    Route::get('/dashboard/skema-sertifikasi', [SkemaSertifikasiController::class, 'index'])->name('skema_sertifikasi.index');
    Route::get('/dashboard/skema-sertifikasi/create', [SkemaSertifikasiController::class, 'create'])->name('skema_sertifikasi.create');
    Route::post('/dashboard/skema-sertifikasi/store', [SkemaSertifikasiController::class, 'store'])->name('skema_sertifikasi.store');
    Route::get('/dashboard/skema-sertifikasi/edit/{id}', [SkemaSertifikasiController::class, 'edit'])->name('skema_sertifikasi.edit');
    Route::put('/dashboard/skema-sertifikasi/update/{id}', [SkemaSertifikasiController::class, 'update'])->name('skema_sertifikasi.update');
    Route::delete('/dashboard/skema-sertifikasi/delete/{id}', [SkemaSertifikasiController::class, 'destroy'])->name('skema_sertifikasi.destroy');
});