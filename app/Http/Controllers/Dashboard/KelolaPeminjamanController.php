<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class KelolaPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'detail', 'detail.buku', 'detail.buku.kategori'])
            ->latest()
            ->get();

        return view('dashboard.peminjaman.admin.index')
            ->with([
                'title'  => 'Data Peminjaman',
                'active' => 'Peminjaman',
                'pinjam' => $peminjaman,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load(['user', 'detail', 'detail.buku', 'detail.buku.kategori']);

        return view('dashboard.peminjaman.admin.show')
            ->with([
                'title'  => 'Detail Peminjaman',
                'active' => 'Peminjaman',
                'pinjam' => $peminjaman,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        if ($request->status == 1) {
            $peminjaman->update([
                'tgl_pinjam' => now(),
                'tenggat'    => now()->addDays(14),
                'status'     => $request->status,
            ]);

            foreach ($peminjaman->detail as $detail) {
                $buku = Buku::find($detail->buku_id);
                if ($buku) {
                    $buku->stok_terkini -= $detail->jumlah;
                    $buku->save();
                }
            }
        } else if ($request->status == 2) {
            $peminjaman->update([
                'tgl_kembali' => now(),
                'status'      => $request->status,
            ]);

            foreach ($peminjaman->detail as $detail) {
                $buku = Buku::find($detail->buku_id);
                if ($buku) {
                    $buku->stok_terkini += $detail->jumlah;
                    $buku->save();
                }
            }
        }

        toast('Peminjaman berhasil diupdate!', 'success');

        return redirect()->back();
    }
}
