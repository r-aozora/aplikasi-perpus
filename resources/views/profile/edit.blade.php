@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
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
                <div class="breadcrumb-item">Pengaturan</div>
                <div class="breadcrumb-item">{{ $title }}</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
            <p class="section-lead">
                Ubah informasi tentang diri Anda di halaman ini.
            </p>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible show fade">{{ $error }}</div>
                @endforeach
            @endif
            <div class="row mt-sm-4">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('profile.update', Auth::user()->slug) }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Informasi Profil</h4>
                            </div>
                            <div class="card-body">
                                <p>Perbarui informasi profil Anda.</p>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->name }}" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="telepon">Telepon</label>
                                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ Auth::user()->telepon }}" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" style="height: 100px" required>{{ Auth::user()->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label>Foto Profil</label>
                                        <img src="{{ Auth::user()->gambar }}" alt="{{ Auth::user()->name }}" height="250" class="d-block">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="image-upload">Foto Profil</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Pilih Gambar</label>
                                            <input type="file" name="foto_profil" id="image-upload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('password.update') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Perbarui Password</h4>
                            </div>
                            <div class="card-body">
                                <p>Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="current_password">Password Saat Ini</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="password">Password Baru</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection