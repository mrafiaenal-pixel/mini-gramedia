<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['cover' , 'title', 'price' , 'description' , 'language' , 'publisher' , 'writer' , 'released_date' , 'page_of_book' , 'book_category_id'])]

class Book extends Model
{
    // nama tunggal tanpa s/es/ies berperan sebagai nama tabel, jika ingin menggunakan nama tabel lain maka harus menambahkan properti protected $table = 'nama_tabel';
    // ini adalah contoh penggunaan relasi many to one, dimana banyak buku memiliki satu kategori buku

    // book categori sebagai one
    public function bookCategory():BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }
    public function checkoutBooks():HasMany
    {
        return $this->hasMany(CheckoutBook::class);
    }
    public function subscriptionPackageBooks():HasMany
    {
        return $this->hasMany(SubscriptionPackageBook::class);
    }
}
