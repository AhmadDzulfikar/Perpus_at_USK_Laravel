<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori_id',
        'penerbit_id',
        'pengarang',
        'tahun_terbit',          
        'isbn',                     
        'j_buku_baik',
        'j_buku_rusak'
    ];

    public function kategori_id()
    {
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
}
