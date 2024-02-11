<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('kategori')
            ->orderBy('judul')
            ->get();

        confirmDelete('Hapus Buku?', 'Anda yakin ingin hapus Buku dari Koleksi Buku?');

        return view('dashboard.buku.index')
            ->with([
                'title'  => 'Koleksi Buku',
                'active' => 'Buku',
                'buku'   => $buku,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.buku.create')
            ->with([
                'title'    => 'Tambah Koleksi Buku',
                'active'   => 'Buku',
                'kategori' => $kategori,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'        => ['required', 'string', 'max:255', 'unique:buku,judul'],
            'penulis'      => ['required', 'string', 'max:255'],
            'penerbit'     => ['required', 'string', 'max:255'],
            'tahun_terbit' => ['required', 'numeric'],
            'stok'         => ['required', 'numeric'],
            'kategori'     => ['required'],
            'deskripsi'    => ['required'],
        ]);

        $buku = [
            'judul'        => $judul = $request->input('judul'),
            'slug'         => $slug = Str::slug($judul),
            'penulis'      => $request->input('penulis'),
            'penerbit'     => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'stok'         => $request->input('stok'),
            'kategori_id'  => $request->input('kategori'),
            'deskripsi'    => $request->input('deskripsi'),
        ];

        if ($request->hasFile('sampul')) {
            $request->validate([
                'sampul' => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg,gif,svg,webp']
            ]);

            $file = $request->file('sampul');
            $gambar = $slug . '.' . $file->extension();
            $file->move(public_path('storage/buku'), $gambar);

            $buku['gambar'] = '/storage/buku/' . $gambar;
        }

        try {
            Buku::create($buku);

            toast('Buku berhasil ditambahkan!', 'success');

            return redirect()->route('buku.index');
        } catch (\Exception $e) {
            toast('Buku gagal ditambahkan.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        confirmDelete('Hapus Buku?', 'Anda yakin ingin hapus Buku dari Koleksi Buku?');

        return view('dashboard.buku.show')
            ->with([
                'title'  => 'Detail Buku',
                'active' => 'Buku',
                'buku'   => $buku,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.buku.edit')
            ->with([
                'title'    => 'Edit Buku',
                'active'   => 'Buku',
                'kategori' => $kategori,
                'buku'     => $buku,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul'        => ['required', 'string', 'max:255', 'unique:buku,judul,' . $buku->id],
            'penulis'      => ['required', 'string', 'max:255'],
            'penerbit'     => ['required', 'string', 'max:255'],
            'tahun_terbit' => ['required', 'numeric'],
            'stok'         => ['required', 'numeric'],
            'kategori'     => ['required'],
            'deskripsi'    => ['required'],
        ]);

        $updatedBuku = [
            'judul'        => $judul = $request->input('judul'),
            'slug'         => $slug = Str::slug($judul),
            'penulis'      => $request->input('penulis'),
            'penerbit'     => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'stok'         => $request->input('stok'),
            'kategori_id'  => $request->input('kategori'),
            'deskripsi'    => $request->input('deskripsi'),
        ];

        if ($request->hasFile('sampul')) {
            $request->validate([
                'sampul' => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg,gif,svg,webp']
            ]);

            $file = $request->file('sampul');
            $gambar = $slug . '.' . $file->extension();

            if ($buku->gambar !== '/images/buku.png') {
                File::delete(public_path($buku->gambar));
            }

            $file->move(public_path('storage/buku'), $gambar);
            $updatedBuku['gambar'] = '/storage/buku/' . $gambar;
        }

        try {
            $buku->update($updatedBuku);

            toast('Buku berhasil diedit!', 'success');

            return redirect()->route('buku.index');
        } catch (\Exception $e) {
            toast('Buku gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->gambar !== '/images/buku.png') {
            File::delete(public_path($buku->gambar));
        }

        $buku->delete();

        toast('Buku berhasil dihapus dari Koleksi Buku.', 'success');

        return redirect()->back();
    }
}
