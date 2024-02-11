@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('buku.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Perpustakaan</div>
                    <div class="breadcrumb-item active">
                        <a href="{{ route('buku.index') }}">
                            Koleksi Buku
                        </a>
                    </div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="judul">Judul Buku</label>
                                        <input type="text" id="judul" class="form-control" value="{{ $buku->judul }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="penulis">Penulis</label>
                                        <input type="text" id="penulis" class="form-control" value="{{ $buku->penulis }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" id="penerbit" class="form-control" value="{{ $buku->penerbit }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="tahun_terbit">Tahun Terbit</label>
                                        <input type="number" id="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="stok">Stok Buku</label>
                                        <input type="number" id="stok" class="form-control" value="{{ $buku->stok }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="kategori">Kategori</label>
                                        <input type="text" id="kategori" class="form-control" value="{{ $buku->kategori->kategori }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" style="height: 250px" readonly>{{ $buku->deskripsi }}</textarea>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Sampul Buku</label>
                                        <img src="{{ asset($buku->gambar) }}" alt="{{ $buku->judul }}" width="250" class="d-block">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-right">
                                <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                                <a href="{{ route('buku.edit', $buku->slug) }}" class="btn btn-warning">
                                    Edit Data
                                </a>
                                <a href="{{ route('user.destroy', $user->slug) }}" class="btn btn-danger" data-confirm-delete="true">
                                    Hapus Data
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection