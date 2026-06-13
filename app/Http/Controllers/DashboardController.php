<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\Pegawai;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Models\SaranaPrasarana;
use App\Models\SkemaSertifikasi;
use App\Models\SaranaPrasaranaSlider; // sesuaikan nama model
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPelatihan = Pelatihan::count();
        $jumlahKeahlian = Keahlian::count();
        $jumlahSkema = SkemaSertifikasi::count();
        $jumlahSarana = SaranaPrasarana::count();


        $pegawai = Pegawai::select('name', 'nip')->get()
            ->map(function ($p) {

                if (!$p->nip || !preg_match('/^[0-9]{8}/', trim($p->nip))) {
                    return null;
                }

                $nipBersih = preg_replace('/\s+/', '', $p->nip);
                $tgl = substr($nipBersih, 0, 8);

                $lahir = Carbon::createFromFormat('Ymd', $tgl);

                $ultah = Carbon::create(
                    now()->year,
                    $lahir->month,
                    $lahir->day
                );

                if ($ultah->isPast()) {
                    $ultah->addYear();
                }

                return (object)[
                    'name' => $p->name,
                    'tanggal_lahir' => $lahir->format('d-m-Y'),
                    'tahun_lahir' => $lahir->year,
                    'umur_akan_datang' => $lahir->age + 1, // umur saat ultah berikutnya
                    'sisa_hari' => now()->diffInDays($ultah)
                ];
            })
            ->filter()
            ->sortBy('sisa_hari', SORT_NUMERIC)
            ->values();
            // return $pegawai;

            // dd($pegawai->pluck('sisa_hari'));


        return view('dashboard.index', compact(
            'jumlahPelatihan',
            'jumlahKeahlian',
            'jumlahSkema',
            'jumlahSarana',
            'pegawai'
        ));
    }

    public function update_password()
    {
        User::query()->update([
            'password' => Hash::make('admin1234')
        ]);
    }

    public function ultah()
    {
        $pegawai = Pegawai::all()->map(function ($p) {

            $p->sisa_hari = null;
            $p->tanggal_lahir = null;

            // Pastikan nip valid (8 digit angka)
            if ($p->nip && preg_match('/^[0-9]{8}/', trim($p->nip))) {

                $nipBersih = preg_replace('/\s+/', '', $p->nip);
                $tgl = substr($nipBersih, 0, 8);

                $lahir = Carbon::createFromFormat('Ymd', $tgl);

                $p->tanggal_lahir = $lahir->format('d-m-Y');

                $ultah = Carbon::create(
                    now()->year,
                    $lahir->month,
                    $lahir->day
                );

                if ($ultah->isPast()) {
                    $ultah->addYear();
                }

                $p->sisa_hari = now()->diffInDays($ultah);
            }

            return $p;
        });
        return $pegawai;
        // return view('dashboard.index', compact('pegawai'));
    }
}
