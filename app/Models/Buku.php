<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    // The table associated with the model
    protected $table = 'bukus';

    // The attributes that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'bookcategory_id',
        'quantity',
        'user_id',
        'cover_path',
        'file_path',
    ];

    // Relationship with the BookCategory model
    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'bookcategory_id');
    }

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'user_id');
    }
}
