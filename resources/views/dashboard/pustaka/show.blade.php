@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Perpustakaan</div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('pustaka.index') }}">Pustaka Buku</a>
                    </div>
                    <div class="breadcrumb-item">Detail Buku</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Buku</h4>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                                    <i class="fas fa-list"></i>
                                    Ulasan Buku
                                </a>
                                <div class="tickets">
                                    <div class="ticket-items" id="ticket-items">
                                        @foreach ($buku->ulasan as $item)
                                            <div class="ticket-item">
                                                <div class="ticket-title">
                                                    <h4>{{ $item->ulasan }}</h4>
                                                </div>
                                                <div class="ticket-desc">
                                                    <div>{{ $item->user->name }}</div>
                                                    <div class="bullet"></div>
                                                    <div>{{ $item->rating }}<i class="fas fa-star"></i></div>
                                                    <div class="bullet"></div>
                                                    <div>{{ $item->created_at->format('j-n-Y') }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="ticket-content">
                                        <div class="ticket-header">
                                            <div class="ticket-detail">
                                                <div class="ticket-title">
                                                    <h4>{{ $buku->judul }}</h4>
                                                </div>
                                                <div class="ticket-info">
                                                    <div class="font-weight-600">{{ $buku->penulis }}</div>
                                                    <div class="bullet"></div>
                                                    <div class="font-weight-600">{{ $buku->penerbit }}</div>
                                                    <div class="bullet"></div>
                                                    <div class="font-weight-600">{{ $buku->tahun_terbit }}</div>
                                                    <div class="bullet"></div>
                                                    <div class="font-weight-600">{{ number_format($buku->ulasan_avg_rating, 1) }} <i class="fas fa-star"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-description">
                                            {{ $buku->deskripsi }}
                                            <div class="gallery mt-2">
                                                <div class="gallery-item" data-image="{{ asset($buku->gambar) }}" data-title="{{ $buku->judul }}"></div>
                                            </div>
                                            <div class="ticket-divider"></div>
                                            <div class="ticket-form">
                                                <div class="{{ $koleksi ? 'd-none' : '' }}">
                                                    <form action="{{ route('koleksi.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                                        <button type="submit" class="btn btn-lg btn-primary">
                                                            <i class="fas fa-star"></i>
                                                            Tambah ke Koleksi
                                                        </button>
                                                    </form>
                                                </div>
                                                <form action="{{ route('ulasan.store') }}" method="POST" novalidate>
                                                    @csrf
                                                    <div class="section-title">Tulis Ulasan dan Rating Kamu</div>
                                                    <div class="form-group">
                                                        <label for="rating">Rating</label>
                                                        <div class="selectgroup selectgroup-pills">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="rating" value="{{ $i }}" class="selectgroup-input" required>
                                                                    <span class="selectgroup-button selectgroup-button-icon">
                                                                        {{ $i }}
                                                                        <i class="fas fa-star"></i>
                                                                    </span>
                                                                </label>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ulasan">Ulasan</label>
                                                        <textarea class="form-control" name="ulasan" id="ulasan" style="height: 150px" placeholder="Tulis ulasan kamu..." required>{{ old('ulasan') }}</textarea>
                                                    </div>
                                                    <div class="form-group text-right">
                                                        <button class="btn btn-primary btn-lg">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endsection
