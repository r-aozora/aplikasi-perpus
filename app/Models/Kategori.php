<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'kategori'];

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $table = 'kategori';

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kategori_id');
    }
}
