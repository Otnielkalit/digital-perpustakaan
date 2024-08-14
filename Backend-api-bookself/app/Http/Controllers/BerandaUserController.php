<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use App\Models\Buku;
use Illuminate\Http\Request;

class BerandaUserController extends Controller
{
    public function index()
    {
        return view('user.pages.home', [
            'title' => 'Selamat Datang di Digital Perpusatakaan'
        ]);
    }

    public function buku(Request $request)
    {
        $categories = BookCategory::all();
        $query = Buku::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $search = $request->search;
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('bookcategory_id', $request->category);
        }

        $books = $query->paginate(10);

        return view('user.pages.book', [
            'title' => 'List Buku Digital Perpustakaan',
            'books' => $books,
            'categories' => $categories,
        ]);
    }


    public function bukuDetail($book_id)
    {
        $book = Buku::findOrFail($book_id);

        return view('user.pages.book_detail', [
            'title' => 'Detail Buku ' . $book->title,
            'book' => $book
        ]);
    }
}
