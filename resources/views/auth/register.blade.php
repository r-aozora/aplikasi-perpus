@extends('layouts.auth')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('register.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="form-divider">
                    Informasi Lainnya
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="telepon">Telepon</label>
                        <input id="telepon" type="text" class="form-control" name="telepon" value="{{ old('telepon') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
