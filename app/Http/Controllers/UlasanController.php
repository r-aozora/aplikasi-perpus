<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'pembaca') {
            $user = Auth::user()->id;

            $data = [
                'ulasan' => Ulasan::with('buku')
                    ->where('user_id', $user)
                    ->latest()
                    ->get(),
                'title'  => 'Ulasan Kamu',
                'view'   => 'dashboard.ulasan.index',
            ];
        } else {
            $data = [
                'ulasan' => Ulasan::with(['user', 'buku'])
                    ->latest()
                    ->get(),
                'title'  => 'Ulasan Buku',
                'view'   => 'dashboard.ulasan.admin.index',
            ];
        }

        confirmDelete('Hapus Ulasan?', 'Anda yakin ingin hapus Ulasan?');

        return view($data['view'])
            ->with([
                'title'  => $data['title'],
                'active' => 'Ulasan',
                'ulasan' => $data['ulasan'],
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
        $params = $request->validate([
            'user_id' => ['required'],
            'buku_id' => ['required'],
            'ulasan'  => ['required'],
            'rating'  => ['required'],
        ]);

        try {
            Ulasan::create($params);

            toast('Ulasan berhasil diposting!', 'success');
        } catch (\Exception $e) {
            toast('Ulasan gagal diposting.', 'warning');
        }

        return redirect()->back();
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
        $params = $request->validate([
            'user_id' => ['required'],
            'buku_id' => ['required'],
            'ulasan'  => ['required'],
            'rating'  => ['required'],
        ]);

        try {
            $ulasan->update($params);

            toast('Ulasan berhasil diedit!', 'success');
        } catch (\Exception $e) {
            dd($e);

            toast('Ulasan gagal diedit.', 'warning');
        }

        return redirect()->back();
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
