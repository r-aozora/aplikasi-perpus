<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'pinjam_id', 'buku_id', 'jumlah'];

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $table = 'detail_pinjam';

    public function pinjam()
    {
        return $this->belongsTo(Peminjaman::class, 'pinjam_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
