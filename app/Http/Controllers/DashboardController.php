<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sewa;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil total user
        $totalUser = User::where('role', 'user')->count();

        // Ambil total sewa yang telah dilakukan
        $totalSewa = Sewa::count();

        // Ambil data sewa harian
        $dailyRentals = Sewa::selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Format Chart Batang untuk sewa harian
        $chart = new Chart;
        $chart->labels($dailyRentals->pluck('date')->toArray());
        $chart->dataset('Jumlah Sewa', 'bar', $dailyRentals->pluck('count')->toArray())
            ->backgroundColor('rgba(0, 123, 255, 0.6)')
            ->color('rgba(0, 123, 255, 1)');

        // Kirim data ke view
        return view('pages.dashboard', compact('totalUser', 'totalSewa', 'chart'));
    }
}
