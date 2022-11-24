<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    //melindungi kolom id tabel agar tidak dapat diubah
    protected $guarded = ['id'];

    //membuat relasi tabel kategori one to many dengan tabel artikel
    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }
}