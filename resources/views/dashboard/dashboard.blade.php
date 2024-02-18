@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }} Admin</h1>
            </div>
            <div class="section-body">
                @dump($data)
                @if (Auth::user()->role !== 'pembaca')
                    @include('dashboard.dashboard.sumbox')
                @endif
                @include('dashboard.dashboard.peminjaman')
                <div class="row">
                    @include('dashboard.dashboard.buku')
                    @include('dashboard.dashboard.ulasan')
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
