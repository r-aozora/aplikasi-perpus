@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('pinjam.index') }}" class="btn btn-icon">
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
                        <a href="{{ route('pinjam.index') }}">
                            Peminjaman
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
                            <form action="{{ route('pinjam.update', $pinjam->invoice) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible show fade">{{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="peminjam">Nama Peminjam</label>
                                            <input type="text" name="peminjam" id="peminjam" class="form-control" value="{{ Auth::user()->name }}" required readonly>
                                        </div>
                                    </div>
                                    <div class="section-title">Buku yang dipinjam</div>
                                    <div class="row">
                                        @foreach ($pinjam->detail as $item)
                                            <div class="form-group col-lg-6">
                                                <label for="buku">Judul Buku</label>
                                                <select name="buku[]" id="buku" class="form-control select2">
                                                    @foreach ($buku as $book)
                                                        <option value="{{ $book->id }}" {{ $item->buku->id == $book->id ? 'selected' : '' }}>{{ $book->judul }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="jumlah">Jumlah Pinjam</label>
                                                <input type="number" name="jumlah[]" id="jumlah" class="form-control" value="{{ $item->jumlah }}">
                                            </div>
                                        @endforeach
                                        <div class="form-group col-12">
                                            <label for="buku">Tambahkan buku lainnya</label>
                                            <select name="buku[]" id="buku" class="form-control select2" multiple>
                                                @foreach ($buku as $item)
                                                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Data
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
@endsection
