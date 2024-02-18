<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'judul', 'slug', 'penulis', 'penerbit', 'tahun_terbit', 'deskripsi', 'gambar', 'stok', 'stok_terkini', 'kategori_id'];

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $table = 'buku';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'buku_id');
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class, 'buku_id');
    }

    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'buku_id');
    }
}
