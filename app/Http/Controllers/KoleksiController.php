<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->input('user');

        $koleksi = Koleksi::with('buku')
            ->where('user_id', $user)
            ->latest()
            ->get();

        return view('dashboard.koleksi.index')
            ->with([
                'title' => 'Koleksi Buku Kamu',
                'active' => 'Koleksi',
                'koleksi' => $koleksi
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show(Koleksi $koleksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Koleksi $koleksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Koleksi $koleksi)
    {
        //
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
