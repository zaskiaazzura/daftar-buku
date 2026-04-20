<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // 🔹 TAMPIL SEMUA DATA
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // 🔹 FORM CREATE
    public function create()
    {
        return view('books.create');
    }

    // 🔹 SIMPAN DATA
    public function store(Request $request)
    {
        $data = $request->all();

        // upload cover
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('cover'), $filename);

            $data['cover'] = $filename;
        }

        Book::create($data);

        return redirect()->route('books.index');
    }

    // 🔹 DETAIL
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    // 🔹 FORM EDIT
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // 🔹 UPDATE DATA
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $data = $request->all();

        // kalau upload cover baru
        if ($request->hasFile('cover')) {

            // hapus cover lama (opsional tapi bagus)
            if ($book->cover && file_exists(public_path('cover/' . $book->cover))) {
                unlink(public_path('cover/' . $book->cover));
            }

            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('cover'), $filename);

            $data['cover'] = $filename;
        }

        $book->update($data);

        return redirect()->route('books.index');
    }

    // 🔹 HAPUS DATA
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // hapus cover dari folder
        if ($book->cover && file_exists(public_path('cover/' . $book->cover))) {
            unlink(public_path('cover/' . $book->cover));
        }

        $book->delete();

        return redirect()->route('books.index');
    }
}