<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class BookCategoryController extends Controller
{
    public function index()
    {
        $bookCategories = BookCategory::all();
        return view('admin.pages.kategori_buku.index', [
            'title' => 'Kategori Buku',
            'categories' => $bookCategories,
        ]);
    }

    public function create()
    {
        return view('admin.pages.kategori_buku.create', [
            'title' => 'Buat Kategori buku'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $category = new BookCategory();
        $category->category_name = $request->category_name;

        if ($request->hasFile('image')) {
            // Simpan gambar ke dalam storage dan ambil path-nya
            $path = $request->file('image')->store('categories', 'public');
            $category->image = $path;
        }

        $category->save();
        Alert::success('Berhasil', 'Kategori buku berhasil ditambahkan.');
        return redirect()->route('book-category.index')->with('success', 'Kategori buku berhasil ditambahkan.');
    }

    public function show(BookCategory $bookCategory)
    {
        return view('admin.pages.show_category', compact('bookCategory'));
    }

    public function edit(BookCategory $bookCategory)
    {
        return view('admin.pages.kategori_buku.edit', [
            'title' => 'Edit Data ' . $bookCategory->category_name,
            'bookCategory' => $bookCategory
        ]);
    }


    public function update(Request $request, BookCategory $bookCategory)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $bookCategory->category_name = $request->category_name;

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($bookCategory->image) {
                Storage::disk('public')->delete($bookCategory->image);
            }

            // Store the new image
            $path = $request->file('image')->store('categories', 'public');
            $bookCategory->image = $path;
        }

        $bookCategory->save();

        return redirect()->route('book-category.index')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        $category = BookCategory::find($id);
        if ($category->books()->count() > 0) {
            Alert::error('Tidak bisa dihapus', 'Category ini terpakai di tabel buku.');
            return redirect()->route('book-category.index')->with('error', 'Category tidak bisa di hapus');
        }
        $category->delete();
        Alert::success('Category Dihapus', 'Category berhasil dihapus.');
        return redirect()->route('book-category.index')->with('success', 'Category deleted successfully.');
    }
}
