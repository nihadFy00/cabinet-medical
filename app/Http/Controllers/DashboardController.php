<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Ordonnance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // إحصائيات أساسية
        $totalConsultations = Consultation::count();
        $totalOrdonnances = Ordonnance::count();

        // كونسولتاسيون حسب الشهر
        $consultationsParMois = Consultation::selectRaw('MONTH(created_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        // كونسولتاسيون حسب اليوم
        $consultationsParJour = Consultation::selectRaw('DATE(created_at) as jour, COUNT(*) as total')
            ->groupBy('jour')
            ->orderBy('jour')
            ->limit(7)
            ->get();

        return view('dashboard', compact(
            'totalConsultations',
            'totalOrdonnances',
            'consultationsParMois',
            'consultationsParJour'
        ));
    }
}