<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class PustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buku = Buku::with('kategori')
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('dashboard.pustaka.show')
            ->with([
                'title'  => $buku->judul,
                'active' => 'Pustaka',
                'buku'   => $buku,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
