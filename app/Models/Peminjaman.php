<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'invoice', 'user_id', 'tgl_pinjam', 'tgl_kembali', 'tenggat', 'status'];

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $table = 'peminjaman';

    public function getRouteKeyName()
    {
        return 'invoice';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailPinjam::class, 'pinjam_id');
    }
}
