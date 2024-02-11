@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('user.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Pengaturan</div>
                    <div class="breadcrumb-item active">
                        <a href="{{ route('user.index') }}">
                            Kelola Pengguna
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
                                        <label for="nama">Nama Pengguna</label>
                                        <input type="text" id="nama" class="form-control" value="{{ $user->name }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" class="form-control" value="{{ '@'.$user->username }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="telepon">Telepon</label>
                                        <input type="text" id="telepon" class="form-control" value="{{ $user->telepon }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="role">Role</label>
                                        <input type="text" id="role" class="form-control" value="{{ ucfirst($user->role) }}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" style="height: 250px" readonly>{{ $user->alamat }}</textarea>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Foto Profil</label>
                                        <img src="{{ $user->gambar }}" alt="{{ $user->name }}" width="250" class="d-block">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                                <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-warning">
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
