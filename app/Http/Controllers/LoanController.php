<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $loans = Loan::with(['user', 'book']);

        if ($search) {

            $loans->where(function ($query) use ($search) {

                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });

                $query->orWhereHas('book', function ($q) use ($search) {
                    $q->where('judul', 'LIKE', "%{$search}%");
                });

                $query->orWhere('status', 'LIKE', "%{$search}%");
            });
        }

        $loans = $loans->latest()->get();

        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();

        $books = Book::where('stok', '>', 0)->get();

        return view(
            'loans.create',
            compact('users', 'books')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required'
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stok <= 0) {
            return back()->with(
                'error',
                'Stok buku habis'
            );
        }

        Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => now(),
            'status' => 'borrowed'
        ]);

        $book->decrement('stok');

        return redirect()
            ->route('loans.index')
            ->with('success', 'Peminjaman berhasil');
    }

    public function returnBook($id)
    {
        $loan = Loan::findOrFail($id);

        if ($loan->status == 'returned') {
            return back();
        }

        $loan->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        $loan->book->increment('stok');

        return redirect()
            ->route('loans.index')
            ->with('success', 'Buku dikembalikan');
    }

    public function userLoans()
    {
        $loans = Loan::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.loans', compact('loans'));
    }

    public function userDashboard()
    {
        $userId = Auth::id();

        $totalBooks = Book::count();

        $borrowedBooks = Loan::where('user_id', $userId)
            ->where('status', 'borrowed')
            ->count();

        $loanHistory = Loan::where('user_id', $userId)
            ->count();

        $returnedBooks = Loan::where('user_id', $userId)
            ->where('status', 'returned')
            ->count();

        return view('user.dashboard', compact(
            'totalBooks',
            'borrowedBooks',
            'loanHistory',
            'returnedBooks'
        ));
    }
}