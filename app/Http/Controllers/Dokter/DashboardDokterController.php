<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardDokterController extends Controller
{
    public function dashboardDokter()
    {
        $dokters = dokter::with(['jadwal'])
            ->where('id', Auth::user()->id_dokter)
            ->firstOrFail();

        return view('dokter.dashboard', compact('dokters'));
    }
}
