<?php

use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\BerandaUserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuUSerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BerandaUserController::class, 'index'])->name('user.beranda');
Route::get('book', [BerandaUserController::class, 'buku'])->name('publik.buku');
Route::get('detail/book/{book_id}', [BerandaUserController::class, 'bukuDetail'])->name('publik.buku-detail');

Route::prefix('user')->middleware(['auth', 'auth.user'])->group(function () {
    Route::resource('user-book', BukuUSerController::class);
});






Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('dashboard', [BerandaAdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('book-category', BookCategoryController::class);
    Route::resource('books', BukuController::class);
    Route::get('admin/books/pdf', [BukuController::class, 'exportPDF'])->name('books.pdf');
});


Route::get('logout', [LoginController::class, 'logout']);
Auth::routes();
