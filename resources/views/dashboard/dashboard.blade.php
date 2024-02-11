@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }} as {{ ucfirst(Auth::user()->role) }}</h1>
            </div>
            <div class="section-body">
                
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
