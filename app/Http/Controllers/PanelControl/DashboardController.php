<?php

namespace App\Http\Controllers\PanelControl;

use App\Http\Controllers\Controller;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Book::count();

        $totalUser = User::where('role', 'user')->count();

        $totalPeminjaman = Loan::count();

        $bukuTersedia = Book::where('stok', '>', 0)->count();

        return view('admin.dashboard', compact(
            'totalBuku',
            'totalUser',
            'totalPeminjaman',
            'bukuTersedia'
        ));
    }
}