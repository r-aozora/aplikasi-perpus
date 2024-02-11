<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['id', 'name', 'slug', 'email', 'username', 'password', 'telepon', 'alamat', 'role', 'gambar'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $table = 'users';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'user_id');
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class, 'user_id');
    }
}
