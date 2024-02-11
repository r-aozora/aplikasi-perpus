<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->input('user');

        $ulasan = Ulasan::with(['user', 'buku'])
            ->when(strlen($user), function ($query) use ($user) {
                return $query->where('user_id', $user);
            })
            ->latest()
            ->get();

        strlen($user) ? $title = 'Ulasan Kamu' : $title = 'Ulasan Buku';
        strlen($user) ? $view = 'dashboard.ulasan.index' : $view = 'dashboard.ulasan.admin.index';

        confirmDelete('Hapus Ulasan?', 'Anda yakin ingin hapus Ulasan?');

        return view($view)
            ->with([
                'title'  => $title,
                'active' => 'Ulasan',
                'ulasan' => $ulasan,
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
    public function show(Ulasan $ulasan)
    {
        $ulasan->load(['user', 'buku']);

        confirmDelete('Hapus Ulasan?', 'Anda yakin ingin hapus Ulasan?');

        return view('dashboard.ulasan.admin.show')
            ->with([
                'title'  => 'Detail Ulasan',
                'active' => 'Ulasan',
                'ulasan' => $ulasan,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();

        toast('Ulasan berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
