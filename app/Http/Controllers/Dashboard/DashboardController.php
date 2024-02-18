<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function landing()
    {
        $buku = Buku::with('kategori')
            ->where('stok_terkini', '>', 0)
            ->orderBy('judul')
            ->get();

        return view('home')->with(['buku' => $buku]);
    }

    public function dashboard()
    {
        if (Auth::user()->role === 'pembaca') {
            $data = [
                'pinjam' => [
                    'title' => 'Peminjaman Kamu',
                    'data' => Peminjaman::latest()
                        ->where('user_id', Auth::id())
                        ->limit(5),
                ],
                'buku' => [
                    'title' => 'Koleksi Kamu',
                    'data' => Koleksi::with(['buku', 'buku.kategori'])
                        ->where('user_id', Auth::id())
                        ->limit(5),
                ],
                'ulasan' => [
                    'title' => 'Ulasan Kamu',
                    'data' => Ulasan::with('buku')
                        ->where('user_id', Auth::id())
                        ->limit(5),
                ],
            ];
        } else {
            $data = [
                'sumbox' => [
                    'buku' => Buku::count(),
                    'pinjam' => Peminjaman::count(),
                    'ulasan' => Ulasan::count(),
                    'user' => User::where('role', 'pembaca')->count(),
                ],
                'pinjam' => [
                    'title' => 'Peminjaman Terbaru',
                    'data' => Peminjaman::with('user')
                        ->latest()
                        ->limit(5),
                ],
                'buku' => [
                    'title' => 'Buku Paling Populer',
                    'data' => Buku::with('kategori')
                        ->orderBy('stok_terkini')
                        ->limit(5),
                ],
                'ulasan' => [
                    'title' => 'Ulasan Terbaru',
                    'data' => Ulasan::with(['buku', 'user'])
                        ->limit(5),
                ],
            ];
        }

        return view('dashboard.dashboard')
            ->with([
                'title'  => 'Dashboard',
                'active' => 'Dashboard',
                'data'   => $data,
            ]);
    }
}
