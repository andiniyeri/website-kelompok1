<?php

namespace App\Http\Controllers\PanelControl;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
{
    $totalBuku = 0;
    $totalUser = 0;
    $totalPeminjaman = 0;
    $bukuTersedia = 0;

    return view('admin.dashboard', compact(
        'totalBuku',
        'totalUser',
        'totalPeminjaman',
        'bukuTersedia'
    ));
}
}
