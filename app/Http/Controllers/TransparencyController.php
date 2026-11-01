<?php

namespace App\Http\Controllers;

use App\Models\FinancialTransparency;
use Illuminate\Http\Request;

class TransparencyController extends Controller
{
    // 1. APB Negeri (APBNeg)
    public function apbNegeri(Request $request)
    {
        $year = $request->get('year', date('Y'));
        
        $apbData = FinancialTransparency::category('apb_negeri')
            ->published()
            ->fiscalYear($year)
            ->orderBy('created_at', 'desc')
            ->get();

        $availableYears = FinancialTransparency::category('apb_negeri')
            ->published()
            ->selectRaw('DISTINCT fiscal_year')
            ->orderBy('fiscal_year', 'desc')
            ->pluck('fiscal_year');

        return view('public.transparency.apb-negeri', compact('apbData', 'availableYears', 'year'));
    }

    // 2. Laporan Realisasi Anggaran
    public function realisasiAnggaran(Request $request)
    {
        $year = $request->get('year', date('Y'));
        $semester = $request->get('semester', 'all');

        $query = FinancialTransparency::category('realisasi_anggaran')
            ->published()
            ->fiscalYear($year);

        if ($semester !== 'all') {
            $query->where('semester', $semester);
        }

        $realisasiData = $query->orderBy('semester', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        $availableYears = FinancialTransparency::category('realisasi_anggaran')
            ->published()
            ->selectRaw('DISTINCT fiscal_year')
            ->orderBy('fiscal_year', 'desc')
            ->pluck('fiscal_year');

        return view('public.transparency.realisasi-anggaran', compact('realisasiData', 'availableYears', 'year', 'semester'));
    }

    // 3. Penyaluran BLT & Bansos
    public function bltBansos(Request $request)
    {
        $year = $request->get('year', date('Y'));
        
        $bltData = FinancialTransparency::category('blt_bansos')
            ->published()
            ->fiscalYear($year)
            ->orderBy('created_at', 'desc')
            ->get();

        $availableYears = FinancialTransparency::category('blt_bansos')
            ->published()
            ->selectRaw('DISTINCT fiscal_year')
            ->orderBy('fiscal_year', 'desc')
            ->pluck('fiscal_year');

        // Hitung total penerima manfaat
        $totalBeneficiaries = $bltData->sum('beneficiary_count');
        $totalAmount = $bltData->sum('budget_amount');

        return view('public.transparency.blt-bansos', compact('bltData', 'availableYears', 'year', 'totalBeneficiaries', 'totalAmount'));
    }

    // 4. Laporan Pertanggungjawaban (LPPD / LKPPD)
    public function lppd(Request $request)
    {
        $year = $request->get('year', date('Y'));
        
        $lppdData = FinancialTransparency::category('lppd')
            ->published()
            ->fiscalYear($year)
            ->orderBy('created_at', 'desc')
            ->get();

        $availableYears = FinancialTransparency::category('lppd')
            ->published()
            ->selectRaw('DISTINCT fiscal_year')
            ->orderBy('fiscal_year', 'desc')
            ->pluck('fiscal_year');

        return view('public.transparency.lppd', compact('lppdData', 'availableYears', 'year'));
    }
}
