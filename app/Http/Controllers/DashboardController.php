<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $anggaranChartData = Anggaran::select('sub_judul', DB::raw('SUM(jumlah_anggaran) as total_anggaran'))
            ->groupBy('sub_judul')
            ->orderByDesc('total_anggaran')
            ->limit(10)
            ->get();

        return view('dashboard', [
            'chartData' => $anggaranChartData
        ]);
    }
}
