<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPinjam;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjam = Peminjaman::where('user_id', Auth::user()->id)
            ->latest()
            ->get();

        return view('dashboard.peminjaman.index')
            ->with([
                'title'  => 'Peminjaman',
                'active' => 'Pinjam',
                'pinjam' => $pinjam,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user()->id;

        $buku = Buku::whereHas('koleksi', function ($query) use ($user) {
                $query->where('user_id', $user);
            })
            ->orderBy('judul')
            ->get();

        return view('dashboard.peminjaman.create')
            ->with([
                'title'  => 'Buat Peminjaman',
                'active' => 'Pinjam',
                'buku'   => $buku,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'peminjam' => ['required'],
            'buku'     => ['required', 'array', 'min:1'],
            'buku.*'   => ['required', 'exists:buku,id'],
        ]);

        $user = User::where('name', $request->input('peminjam'))
            ->first();

        try {
            $pinjam = Peminjaman::create([
                'invoice' => 'INV-'.Str::random(10),
                'user_id' => $user->id,
            ]);
    
            foreach ($request->buku as $buku) {
                DetailPinjam::create([
                    'pinjam_id' => $pinjam->id,
                    'buku_id'   => $buku,
                ]);
            }
    
            toast('Peminjaman berhasil dibuat!', 'success');
    
            return redirect()->route('pinjam.show', $pinjam->invoice);
        } catch (\Exception $e) {
            toast('Peminjaman gagal dibuat.', 'warning');
    
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $pinjam)
    {
        $pinjam->load(['detail', 'detail.buku', 'detail.buku.kategori']);

        return view('dashboard.peminjaman.show')
            ->with([
                'title'  => 'Detail Peminjaman',
                'active' => 'Pinjam',
                'pinjam' => $pinjam,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $pinjam)
    {
        $pinjam->load(['user', 'detail', 'detail.buku']);

        $user = Auth::user()->id;

        $buku = Buku::whereHas('koleksi', function ($query) use ($user) {
                $query->where('user_id', $user);
            })
            ->orderBy('judul')
            ->get();

        return view('dashboard.peminjaman.edit')
            ->with([
                'title'  => 'Edit Peminjaman',
                'active' => 'Pinjam',
                'pinjam' => $pinjam,
                'buku'   => $buku,

            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $pinjam)
    {
        $request->validate([
            'buku'     => ['required', 'array', 'min:1'],
            'buku.*'   => ['required', 'exists:buku,id'],
            'jumlah'   => ['required', 'array', 'min:1'],
            'jumlah.*' => ['required', 'integer', 'min:1'],
        ]);

        try {
            $pinjam->detail()->delete();

            for ($i = 0; $i < count($request->buku); $i++) {
                DetailPinjam::create([
                    'pinjam_id' => $pinjam->id,
                    'buku_id'   => $request->buku[$i],
                    'jumlah'    => $request->jumlah[$i],
                ]);
            }
    
            toast('Peminjaman berhasil diedit!', 'success');
    
            return redirect()->route('pinjam.show', $pinjam->invoice);
        } catch (\Exception $e) {
            toast('Peminjaman gagal diedit.', 'warning');
    
            return redirect()->back();
        }
    }
}
