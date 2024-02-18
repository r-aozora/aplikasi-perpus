<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;

        $koleksi = Koleksi::with(['buku', 'buku.kategori'])
            ->where('user_id', $user)
            ->latest()
            ->get();

        confirmDelete('Hapus Koleksi?', 'Anda yakin ingin hapus Buku dari Koleksi?');

        return view('dashboard.koleksi.index')
            ->with([
                'title'   => 'Koleksi Buku Kamu',
                'active'  => 'Koleksi',
                'koleksi' => $koleksi
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
        ]);

        Koleksi::create([
            'user_id' => $request->input('user_id'),
            'buku_id' => $request->input('buku_id'),
        ]);

        toast('Berhasil ditambahkan ke Koleksi!', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Koleksi $koleksi)
    {
        $koleksi->delete();

        toast('Berhasil dihapus dari Koleksi.', 'success');

        return redirect()->back();
    }
}
