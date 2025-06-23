<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\AnnisaAntrian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $totalAntrian = AnnisaAntrian::whereDate('created_at', $today)->count();
        $antrianMenunggu = AnnisaAntrian::whereDate('created_at', $today)->where('status', 'menunggu')->count();
        $antrianSelesai = AnnisaAntrian::whereDate('created_at', $today)->where('status', 'selesai')->count();

        return view('petugas.dashboard', compact('totalAntrian', 'antrianMenunggu', 'antrianSelesai'));
    }
}
