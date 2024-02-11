@extends('layouts.auth')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('login.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="user">Email atau Username</label>
                    <input id="user" type="user" class="form-control" name="user" tabindex="1" value="{{ old('user') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
    </div>
@endsection
