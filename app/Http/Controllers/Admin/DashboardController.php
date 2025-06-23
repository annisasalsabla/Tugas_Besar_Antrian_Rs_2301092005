<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnnisaAntrian;
use App\Models\AnnisaDokter;
use App\Models\AnnisaPasien;
use App\Models\AnnisaPoli;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPasien = AnnisaPasien::count();
        $totalDokter = AnnisaDokter::count();
        $totalPoli = AnnisaPoli::count();
        $antrianHariIni = AnnisaAntrian::whereDate('created_at', Carbon::today())->count();

        return view('admin.dashboard', compact('totalPasien', 'totalDokter', 'totalPoli', 'antrianHariIni'));
    }
}
