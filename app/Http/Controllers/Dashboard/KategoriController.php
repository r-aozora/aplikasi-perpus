<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::withCount('buku')
            ->orderBy('kategori')
            ->get();

        confirmDelete('Hapus Kategori Buku?', 'Anda yakin ingin hapus Kategori Buku?');

        return view('dashboard.kategori.index')
            ->with([
                'title'    => 'Kategori Buku',
                'active'   => 'Kategori',
                'kategori' => $kategori,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategori,kategori']
        ]);

        try {
            Kategori::create([
                'kategori' => $request->input('nama_kategori'),
            ]);

            toast('Kategori Buku berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('Kategori Buku gagal dibuat.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategori,kategori,' . $kategori->id]
        ]);

        try {
            $kategori->update([
                'kategori' => $request->input('nama_kategori'),
            ]);

            toast('Kategori Buku berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Kategori Buku gagal diedit.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        toast('Kategori Buku berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
