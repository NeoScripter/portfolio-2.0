<?php

namespace App\Http\Controllers;

use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = VisitorLog::query()
        ->selectRaw('
            COUNT(*) as all_time,
            SUM(CASE WHEN DATE(visited_at) = ? THEN 1 ELSE 0 END) as today,
            SUM(CASE WHEN visited_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as last_week,
            SUM(CASE WHEN visited_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as last_month
        ',[
                Carbon::today(),
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
                Carbon::now()->startOfMonth()->subMonth(),
                Carbon::now()->startOfMonth()
            ])
            ->first();

        $visitors =  $stats;

        return view('admin.dashboard', compact('visitors'));
    }
}
