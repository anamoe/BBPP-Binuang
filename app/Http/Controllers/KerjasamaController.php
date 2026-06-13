<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\VisitorHelper;
use App\Models\ProgramAnggaran;
use App\Models\SaranaPrasarana;
use App\Models\SaranaPrasaranaSlider;

class KerjasamaController extends Controller
{
    public function programDanKerjasama()
    {

        $programs = ProgramAnggaran::with('jenis')->get();
        $visitorData = VisitorHelper::getFooterAndVisitor();

        return view('program_kerjasama', array_merge(
            compact('programs'),
            $visitorData
        ));
    }

    public function SaranaPrasarana()
    {
        $sarana_prasarana = SaranaPrasarana::all();
        $sliders = SaranaPrasaranaSlider::all();
        $visitorData = VisitorHelper::getFooterAndVisitor();

        return view('profil.sarana_prasarana', array_merge(
            compact('sarana_prasarana', 'sliders'),
            $visitorData
        ));
    }
    public function detailSarana($id)
    {
        $item = SaranaPrasarana::findOrFail($id);
        // return $sarana_prasarana;
        $visitorData = VisitorHelper::getFooterAndVisitor();

        // return view('profil.sarana_detail', compact('item'));
         return view('profil.sarana_detail', array_merge(
            compact('item'),
            $visitorData
        ));
    }
}
