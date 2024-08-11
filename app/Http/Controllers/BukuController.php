<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\BookCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class BukuController extends Controller
{



    public function exportPDF()
    {
        $books = Buku::all(); // Retrieve all books
        $pdf = Pdf::loadView('admin.pages.buku.pdf', ['books' => $books]);
        return $pdf->download('books-list.pdf'); // This should prompt a download
    }


    public function index(Request $request)
    {
        $categories = BookCategory::all();
        $query = Buku::query();
        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $search = $request->q;
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }
        if ($request->filled('category')) {
            $query->where('bookcategory_id', $request->category);
        }
        $books = $query->paginate(10);

        return view('admin.pages.buku.index', [
            'title' => 'List Buku',
            'categories' => $categories,
            'books' => $books
        ]);
    }


    public function create()
    {
        $categories = BookCategory::all();

        return view('admin.pages.buku.create', [
            'title' => 'Tambah Buku',
            'categories' => $categories
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'bookcategory_id' => 'required|exists:book_categories,id',
            'quantity' => 'required|integer|min:1',
            'cover_path' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'file_path' => 'required|file|mimes:pdf|max:10240',
        ]);

        $book = new Buku();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->bookcategory_id = $request->bookcategory_id;
        $book->quantity = $request->quantity;
        $book->user_id = auth()->id();
        if ($request->hasFile('cover_path')) {
            $coverPath = $request->file('cover_path')->store('covers', 'public');
            $book->cover_path = $coverPath;
        }
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('books', 'public');
            $book->file_path = $filePath;
        }
        $book->save();
        Alert::success('Success', 'Buku berhasil ditambahkan.');
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show($book_id)
    {
        $book = Buku::findOrFail($book_id);

        return view('admin.pages.buku.detail_buku', [
            'title' => 'Detail Buku ' . $book->title,
            'book' => $book
        ]);
    }


    public function edit(Buku $book)
    {
        $categories = BookCategory::all();
        return view('admin.pages.buku.edit', [
            'title' => 'Edit Buku ' . $book->title,
            'book' => $book,
            'categories' => $categories,
        ]);
    }



    public function update(Request $request, string $id)
    {
        $book = Buku::findOrFail($id);

        // Validate the request with the correct field names
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'bookcategory_id' => 'required|exists:book_categories,id',
            'description' => 'required|string',
            'cover_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_path' => 'nullable|mimes:pdf|max:10000',
            'quantity' => 'required|integer|min:1',
        ]);

        // Update the book fields
        $book->title = $data['title'];
        $book->bookcategory_id = $data['bookcategory_id'];
        $book->description = $data['description'];
        $book->quantity = $data['quantity'];

        // Handle file uploads if provided
        if ($request->hasFile('cover_path')) {
            $coverPath = $request->file('cover_path')->store('covers', 'public');
            $book->cover_path = $coverPath;
        }

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('files', 'public');
            $book->file_path = $filePath;
        }

        $book->save();
        Alert::success('Success', 'Mengupdate Data');
        return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully');
    }




    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->cover_path && \Storage::disk('public')->exists($buku->cover_path)) {
            \Storage::disk('public')->delete($buku->cover_path);
        }
        if ($buku->file_path && \Storage::disk('public')->exists($buku->file_path)) {
            \Storage::disk('public')->delete($buku->file_path);
        }
        $buku->delete();
        Alert::success('Success', 'Berhasil menghapus Buku');
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}
