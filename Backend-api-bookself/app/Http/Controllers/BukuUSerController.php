<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BukuUSerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $selectedCategory = $request->input('category_id', 'all');
        if ($selectedCategory == 'all') {
            $books = Buku::where('user_id', $user->id)->paginate(6);
        } else {
            $books = Buku::where('user_id', $user->id)
                ->where('bookcategory_id', $selectedCategory)
                ->paginate(6);
        }
        $categories = BookCategory::all();

        return view('user.pages.buku.index', [
            'title' => 'List Buku - ' . $user->fullname,
            'books' => $books,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }

    public function create()
    {
        $categories = BookCategory::all();
        return view('user.pages.buku.create', [
            'title' => 'Tambah Buku Baru',
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
        return redirect()->route('user-book.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show($book_id)
    {
        $book = Buku::findOrFail($book_id);

        return view('user.pages.buku.detail', [
            'title' => 'Detail Buku ' . $book->title,
            'book' => $book
        ]);
    }

    public function edit(string $id)
    {
        // Retrieve the book by its ID
        $book = Buku::findOrFail($id);

        // Retrieve all categories for the dropdown menu
        $categories = BookCategory::all();

        return view('user.pages.buku.edit', [
            'title' => 'Edit Buku - ' . $book->title,
            'book' => $book,
            'categories' => $categories
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Buku::findOrFail($id);

        // Validate and update the book
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:book_categories,id',
            'description' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|mimes:pdf|max:10000',
        ]);

        // Update the book fields
        $book->update($data);

        // Handle file uploads if provided
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $book->cover_path = $coverPath;
        }

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('files', 'public');
            $book->file_path = $filePath;
        }

        $book->save();

        return redirect()->route('user-book.show', $book->id)->with('success', 'Book updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
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
        return redirect()->route('user-book.index')->with('success', 'Buku berhasil dihapus');
    }
}
