<?php

namespace App\Http\Controllers;

use App\Models\DokumenPPID;
use Illuminate\Http\Request;
use App\Helpers\VisitorHelper;
use App\Models\InfografisPPID;

class PPIDController extends Controller
{
    public function dokumenPPID() {
        $dokumenPPID = DokumenPPID::all();
        $visitorData = VisitorHelper::getFooterAndVisitor();
        return view('dokumen_ppid', array_merge(
            compact('dokumenPPID'),
            $visitorData
        ));

    }

    public function infografisPPID() {
        $infografis = InfografisPPID::all();
        $visitorData = VisitorHelper::getFooterAndVisitor();
        return view('infografis_ppid', array_merge(
            compact('infografis'),
            $visitorData
        ));
    }
}
