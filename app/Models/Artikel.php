<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    //melindungi kolom id tabel agar tidak dapat diubah
    protected $guarded = ['id'];

    //membuat relasi tabel artikel one to many dengan tabel kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}