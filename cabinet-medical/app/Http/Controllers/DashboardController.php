<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Ordonnance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // إحصائيات
        $totalConsultations = Consultation::count();
        $totalOrdonnances = Ordonnance::count();

        // عدد الكونسولتاسيون حسب الشهر
        $consultationsParMois = Consultation::selectRaw('MONTH(created_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        return view('dashboard', compact(
            'totalConsultations',
            'totalOrdonnances',
            'consultationsParMois'
        ));
    }
}