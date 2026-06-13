<?php

namespace App\Helpers;

use App\Models\About;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorHelper
{
    public static function getFooterAndVisitor()
    {
        $footer = About::first();

        $ip = request()->ip();
        $today = Carbon::today();

        if (!Visitor::where('ip_address', $ip)->whereDate('visited_at', $today)->exists()) {
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

        return compact('footer', 'mingguIni', 'bulanIni', 'tahunIni', 'total');
    }
}
