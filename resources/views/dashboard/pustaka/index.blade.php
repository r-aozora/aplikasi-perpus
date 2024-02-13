@extends('layouts.app')

@section('link')
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
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title mt-0">Cari Buku</div>
                                <form action="{{ route('pustaka.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Cari buku..." value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($buku as $item)
                        <div class="col-12 col-md-4 col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                    <div class="article-image" data-background="{{ asset($item->gambar) }}"></div>
                                </div>
                                <div class="article-details">
                                    <div class="article-category">
                                        <a href="#">{{ $item->kategori->kategori }}</a>
                                        <div class="bullet"></div>
                                        <a href="#">{{ $item->stok }} tersisa</a>
                                        <div class="bullet"></div>
                                        <a href="#">{{ number_format($item->ulasan_avg_rating, 1) }} / 5</a>
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="{{ route('pustaka.show', $item->slug) }}">{{ $item->judul }}</a></h2>
                                    </div>
                                    <p>
                                        @if ($item->deskripsi > 100)
                                            {{ substr($item->deskripsi, 0, 100).'...' }}
                                        @else
                                            {{ $item->dekripsi }}
                                        @endif
                                    </p>
                                    <div class="article-user">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">{{ $item->penulis }}</a>
                                            </div>
                                            <div class="text-job">
                                                {{ $item->penerbit }}
                                                <div class="bullet"></div>
                                                {{ $item->tahun_terbit }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
