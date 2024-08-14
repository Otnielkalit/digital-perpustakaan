<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use RealRashid\SweetAlert\Facades\Alert;

class BookCategory extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            if ($category->books()->count() > 0) {
                Alert::error('Tidak bisa dihapus', 'Category ini terpakai di tabel buku.');
                return false;
            }
        });
    }

    public function books(): HasMany
    {
        return $this->hasMany(Buku::class, 'bookcategory_id');
    }
}
