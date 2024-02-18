<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\DetailPinjam;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'     => 'Super Admin',
                'slug'     => 'super-admin',
                'email'    => 'admin@example.com',
                'username' => 'superAdmin',
                'password' => Hash::make('password'),
                'telepon'  => '098765432123',
                'alamat'   => 'Kantor PinjamBuku.id',
                'role'     => 'admin',
                // 'status'   => 1,
            ], [
                'name'     => 'Pustakawan',
                'slug'     => 'pustakawan',
                'email'    => 'pustakawan@example.com',
                'username' => 'pustaKawan',
                'password' => Hash::make('password'),
                'telepon'  => '098765432123',
                'alamat'   => 'Perpustakaan PinjamBuku.id',
                'role'     => 'pustakawan',
                // 'status'   => 1,
            ], [
                'name'     => 'Muhamad Citra Hidayat',
                'slug'     => 'muhamad-citra-hidayat',
                'email'    => 'zytrahidayat11@gmail.com',
                'username' => 'citrahdy',
                'password' => Hash::make('password'),
                'telepon'  => '089513886227',
                'alamat'   => 'Rumah Citra',
                'role'     => 'pembaca',
                // 'status'   => 1,
            ]
        ]);

        Kategori::insert([
            [
                'kategori' => 'Light Novel',
            ], [
                'kategori' => 'Non Fiksi',
            ]
        ]);

        Buku::insert([
            [
                'judul'        => 'Relay',
                'slug'         => 'relay',
                'penulis'      => 'Rain Aozora',
                'penerbit'     => 'Aozora Project',
                'tahun_terbit' => '2018',
                'deskripsi'    => 'Sebuah light novel misteri karya Rain Aozora.',
                'stok'         => 3,
                'stok_terkini' => 3,
                'kategori_id'  => 1,
            ], [
                'judul'        => 'Relay: Zero',
                'slug'         => 'relay-zero',
                'penulis'      => 'Rain Aozora',
                'penerbit'     => 'Aozora Project',
                'tahun_terbit' => '2019',
                'deskripsi'    => 'Cerita prekuel light novel karya Rain Aozora, Relay.',
                'stok'         => 3,
                'stok_terkini' => 3,
                'kategori_id'  => 1,
            ]
        ]);

        Koleksi::insert([
            [
                'user_id' => 3,
                'buku_id' => 1,
            ], [
                'user_id' => 3,
                'buku_id' => 2,
            ]
        ]);

        Peminjaman::insert([
            [
                'invoice'    => 'INV-'.Str::random(10),
                'user_id'    => 3,
                'created_at' => now(),
            ]
        ]);

        DetailPinjam::insert([
            [
                'pinjam_id' => 1,
                'buku_id'   => 1,
                'jumlah'    => 1,
            ], [
                'pinjam_id' => 1,
                'buku_id'   => 2,
                'jumlah'    => 1,
            ]
        ]);

        User::factory(5)->create();
        Kategori::factory(10)->create();
        Buku::factory(20)->create();
        Ulasan::factory(50)->create();
    }
}
