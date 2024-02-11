@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
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
                    <div class="breadcrumb-item">Tambah Buku</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                            </div>
                            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                <div class="card-body">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible show fade">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="judul">Judul Buku</label>
                                            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required autofocus>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="penulis">Penulis</label>
                                            <input type="text" name="penulis" id="penulis" class="form-control" value="{{ old('penulis') }}" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="penerbit">Penerbit</label>
                                            <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ old('penerbit') }}" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tahun_terbit">Tahun Terbit</label>
                                            <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="{{ old('tahun_terbit') }}" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="stok">Stok Buku</label>
                                            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="kategori">Kategori</label>
                                            <select name="kategori" id="kategori" class="form-control select2" required>
                                                <option disabled selected>Kategori</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" style="height: 250px" required>{{ old('deskripsi') }}</textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="image-upload">Sampul Buku</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih Gambar</label>
                                                <input type="file" name="sampul" id="image-upload">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection
