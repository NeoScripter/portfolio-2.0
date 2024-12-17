<?php

namespace App\Http\Controllers;

use App\Models\VisitorLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $visitors = VisitorLog::latest()->paginate(10);

        return view('admin.dashboard', compact('visitors'));
    }
}
