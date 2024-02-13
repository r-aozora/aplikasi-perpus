<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $buku = Buku::with('kategori')
            ->when(strlen($search), function ($query) use ($search) {
                return $query->where('judul', 'like', "%$search%")
                    ->orWhere('penulis', 'like', "%$search%")
                    ->orWhere('penerbit', 'like', "%$search%")
                    ->orWhere('tahun_terbit', 'like', "%$search%")
                    ->orWhereHas('kategori', function ($query) use ($search) {
                        $query->where('kategori', 'like', "%$search%");
                    });
            })
            ->withAvg('ulasan', 'rating')
            ->where('stok', '!=', 0)
            ->orderBy('judul')
            ->get();

        return view('dashboard.pustaka.index')
            ->with([
                'title'  => 'Pustaka Buku',
                'active' => 'pustaka',
                'buku'   => $buku,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $buku->load(['kategori', 'ulasan', 'ulasan.user'])
            ->withAvg('ulasan', 'rating');

        $koleksi = Koleksi::where('user_id', Auth::user()->id)
            ->where('buku_id', $buku->id)
            ->exists();

        return view('dashboard.pustaka.show')
            ->with([
                'title'   => $buku->judul,
                'active'  => 'Pustaka',
                'buku'    => $buku,
                'koleksi' => $koleksi,
            ]);
    }
}
