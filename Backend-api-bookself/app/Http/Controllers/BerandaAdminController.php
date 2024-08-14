<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCategory;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class BerandaAdminController extends Controller
{
    public function index()
    {
        $adminName = Auth::user()->fullname;
        $categoryCount = BookCategory::count();
        $userCount = User::where('role', 'user')->count();
        $bookCount = Buku::count();

        return view('admin.pages.dashboard', [
            'title' => 'Dashboard Admin',
            'adminName' => $adminName,
            'categoryCount' => $categoryCount,
            'userCount' => $userCount,
            'bookCount' => $bookCount,
        ]);
    }

    public function buku()
    {
        return view('admin.pages.buku', [
            'title' => 'Daftar Buku'
        ]);
    }
}
