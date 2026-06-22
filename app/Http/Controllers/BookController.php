<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required|numeric'
        ]);

        Book::create($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required|numeric'
        ]);

        $book->update($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        Book::destroy($id);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}