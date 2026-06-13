<?php

namespace App\Http\Controllers;

use App\Helpers\VisitorHelper;
use App\Models\About;
use Carbon\Carbon;
use App\Models\Task;
use App\Models\Visi;
use App\Models\Banner;
use App\Models\InovasiLayanan;
use App\Models\Visitor;
use App\Models\Organisasi;
use App\Models\ProgramAnggaran;
use App\Models\UptExternal;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $ip = request()->ip(); // ambil IP pengunjung

        // Cek apakah IP sudah tercatat hari ini
        $today = Carbon::today();
        $exists = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->exists();

        if (!$exists) {
            Visitor::create([
                'ip_address' => $ip,
                'visited_at' => now(),
            ]);
        }

        // Hitung jumlah pengunjung
        $mingguIni = Visitor::whereBetween('visited_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $bulanIni  = Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();
        $tahunIni  = Visitor::whereYear('visited_at', Carbon::now()->year)->count();
        $total     = Visitor::count();

        // get banner;
        $banner = Banner::all();
        $organisasi = Organisasi::first();
        $tugas = Task::first();
        $visi = Visi::first();
        $inovasi_layanan = InovasiLayanan::all();
        $upt_external = UptExternal::all();
        $footer = About::first();
        return view('beranda', compact('mingguIni', 'bulanIni', 'tahunIni', 'total', 'banner', 'organisasi', 'tugas', 'visi', 'inovasi_layanan', 'upt_external', 'footer'));
    }
    public function sejarah()
    {
        $ip = request()->ip(); // ambil IP pengunjung

        // Cek apakah IP sudah tercatat hari ini
        $today = Carbon::today();
        $exists = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->exists();

        if (!$exists) {
            Visitor::create([
                'ip_address' => $ip,
                'visited_at' => now(),
            ]);
        }

        // Hitung jumlah pengunjung
        $mingguIni = Visitor::whereBetween('visited_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $bulanIni  = Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();
        $tahunIni  = Visitor::whereYear('visited_at', Carbon::now()->year)->count();
        $total     = Visitor::count();

        // get banner;
        $banner = Banner::all();
        $organisasi = Organisasi::first();
        $tugas = Task::first();
        $visi = Visi::first();
        $inovasi_layanan = InovasiLayanan::all();
        $upt_external = UptExternal::all();
        $footer = About::first();
        return view('profil.sejarah', compact('mingguIni', 'bulanIni', 'tahunIni', 'total', 'banner', 'organisasi', 'tugas', 'visi', 'inovasi_layanan', 'upt_external', 'footer'));
    }

    public function visi()
    {
        $ip = request()->ip(); // ambil IP pengunjung
        $today = Carbon::today();
        $exists = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->exists();
        if (!$exists) {
            Visitor::create([
                'ip_address' => $ip,
                'visited_at' => now(),
            ]);
        }

        $mingguIni = Visitor::whereBetween('visited_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $bulanIni  = Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();
        $tahunIni  = Visitor::whereYear('visited_at', Carbon::now()->year)->count();
        $total     = Visitor::count();

        $banner = Banner::all();
        $organisasi = Organisasi::first();
        $tugas = Task::first();
        $visi = Visi::first();
        $inovasi_layanan = InovasiLayanan::all();
        $upt_external = UptExternal::all();
        $footer = About::first();
        return view('profil.visimisi', compact('mingguIni', 'bulanIni', 'tahunIni', 'total', 'banner', 'organisasi', 'tugas', 'visi', 'inovasi_layanan', 'upt_external', 'footer'));
    }

    public function tugas()
    {
        $ip = request()->ip(); // ambil IP pengunjung
        $today = Carbon::today();
        $exists = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->exists();
        if (!$exists) {
            Visitor::create([
                'ip_address' => $ip,
                'visited_at' => now(),
            ]);
        }

        $mingguIni = Visitor::whereBetween('visited_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $bulanIni  = Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();
        $tahunIni  = Visitor::whereYear('visited_at', Carbon::now()->year)->count();
        $total     = Visitor::count();

        $banner = Banner::all();
        $organisasi = Organisasi::first();
        $tugas = Task::first();
        $visi = Visi::first();
        $inovasi_layanan = InovasiLayanan::all();
        $upt_external = UptExternal::all();
        $footer = About::first();
        return view('profil.tugasfungsi', compact('mingguIni', 'bulanIni', 'tahunIni', 'total', 'banner', 'organisasi', 'tugas', 'visi', 'inovasi_layanan', 'upt_external', 'footer'));
    }


    public function profilpejabat()
    {
        $ip = request()->ip(); // ambil IP pengunjung
        $today = Carbon::today();
        $exists = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->exists();
        if (!$exists) {
            Visitor::create([
                'ip_address' => $ip,
                'visited_at' => now(),
            ]);
        }

        $mingguIni = Visitor::whereBetween('visited_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $bulanIni  = Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();
        $tahunIni  = Visitor::whereYear('visited_at', Carbon::now()->year)->count();
        $total     = Visitor::count();

        $banner = Banner::all();
        $organisasi = Organisasi::first();
        $tugas = Task::first();
        $visi = Visi::first();
        $inovasi_layanan = InovasiLayanan::all();
        $upt_external = UptExternal::all();
        $footer = About::first();
        return view('profil.profilpejabat', compact('mingguIni', 'bulanIni', 'tahunIni', 'total', 'banner', 'organisasi', 'tugas', 'visi', 'inovasi_layanan', 'upt_external', 'footer'));
    }

    public function struktur()
    {
        $ip = request()->ip(); // ambil IP pengunjung
        $today = Carbon::today();
        $exists = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->exists();
        if (!$exists) {
            Visitor::create([
                'ip_address' => $ip,
                'visited_at' => now(),
            ]);
        }

        $mingguIni = Visitor::whereBetween('visited_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $bulanIni  = Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();
        $tahunIni  = Visitor::whereYear('visited_at', Carbon::now()->year)->count();
        $total     = Visitor::count();

        $banner = Banner::all();
        $organisasi = Organisasi::first();
        $tugas = Task::first();
        $visi = Visi::first();
        $inovasi_layanan = InovasiLayanan::all();
        $upt_external = UptExternal::all();
        $footer = About::first();
        return view('profil.struktur', compact('mingguIni', 'bulanIni', 'tahunIni', 'total', 'banner', 'organisasi', 'tugas', 'visi', 'inovasi_layanan', 'upt_external', 'footer'));
    }

    public function dasarhukum()
    {
        $ip = request()->ip(); // ambil IP pengunjung
        $today = Carbon::today();
        $exists = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->exists();
        if (!$exists) {
            Visitor::create([
                'ip_address' => $ip,
                'visited_at' => now(),
            ]);
        }

        $mingguIni = Visitor::whereBetween('visited_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $bulanIni  = Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();
        $tahunIni  = Visitor::whereYear('visited_at', Carbon::now()->year)->count();
        $total     = Visitor::count();

        $banner = Banner::all();
        $organisasi = Organisasi::first();
        $tugas = Task::first();
        $visi = Visi::first();
        $inovasi_layanan = InovasiLayanan::all();
        $upt_external = UptExternal::all();
        $footer = About::first();
        return view('profil.dasarhukum', compact('mingguIni', 'bulanIni', 'tahunIni', 'total', 'banner', 'organisasi', 'tugas', 'visi', 'inovasi_layanan', 'upt_external', 'footer'));
    }

    public function lhkpn()
    {

        $programs = ProgramAnggaran::with('jenis')->get();
        $visitorData = VisitorHelper::getFooterAndVisitor();

        // return $programs;

        return view('profil.lhkpnasn', array_merge(
            compact('programs'),
            $visitorData
        ));
    }

    public function kontak()
    {
       
         $visitorData = VisitorHelper::getFooterAndVisitor();

        return view('kontak', array_merge(
           
            $visitorData
        ));
    }

    //kinerja
    public function kinerja()
    {

        $programs = ProgramAnggaran::with('jenis')->get();
        $visitorData = VisitorHelper::getFooterAndVisitor();

        return view('informasi_publik.kinerja', array_merge(
            compact('programs'),
            $visitorData
        ));
    }

    public function keuangan()
    {

        $programs = ProgramAnggaran::with('jenis')->get();
        $visitorData = VisitorHelper::getFooterAndVisitor();

        return view('informasi_publik.keuangan', array_merge(
            compact('programs'),
            $visitorData
        ));
    }
    public function pbj()
    {

        $programs = ProgramAnggaran::with('jenis')->get();
        $visitorData = VisitorHelper::getFooterAndVisitor();

        return view('informasi_publik.pbj', array_merge(
            compact('programs'),
            $visitorData
        ));
    }
}
