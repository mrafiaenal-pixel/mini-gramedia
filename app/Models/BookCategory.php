<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name'])]
class BookCategory extends Model
{
    // nama jamak menggunakan s/es ies berperan sebagai nama tabel, jika ingin menggunakan nama tabel lain maka harus menambahkan properti protected $table = 'nama_tabel';
    // ini adalah contoh penggunaan relasi one to many, dimana satu kategori buku memiliki banyak buku
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}

// terkait tefa uts -. erd drd -
