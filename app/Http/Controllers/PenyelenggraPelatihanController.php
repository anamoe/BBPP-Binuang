<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Visitor;
use App\Models\Pelatihan;
use App\Models\JadwalAgenda;
use Illuminate\Http\Request;
use App\Helpers\VisitorHelper;
use Illuminate\Support\Carbon;
use App\Models\SkemaSertifikasi;

class PenyelenggraPelatihanController extends Controller
{
    public function pelatihan()
    {
        $pelatihans = Pelatihan::with(['pegawai', 'keahlian'])->get();
        $agendas = JadwalAgenda::orderBy('start_date', 'desc')->get();

        $visitorData = VisitorHelper::getFooterAndVisitor();

        return view('pelatihan', array_merge(
            compact('pelatihans','agendas'),
            $visitorData
        ));
    }
    

    public function skemaSertifikasi()
    {
        $skemas = SkemaSertifikasi::with('keahlian')->get();
        $visitorData = VisitorHelper::getFooterAndVisitor();
        return view('skema_sertifikasi', array_merge(
            compact('skemas'),
            $visitorData
        ));
    }

    public function getEvents()
    {
        $events = JadwalAgenda::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->agenda_name,
                'start' => $item->start_date,
                'end' => $item->end_date,
                'backgroundColor' => '#ff9800',
                'textColor' => '#fff',
                'extendedProps' => [
                    'desc' => $item->desc,
                    'image' => $item->image,
                ],
            ];
        });

        return response()->json($events);
    }
}
