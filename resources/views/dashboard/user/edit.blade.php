@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
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
                            <form action="{{ route('user.update', $user->slug) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible show fade">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="nama">Nama Pengguna</label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->name }}" required autofocus>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $user->telepon }}" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="role">Role</label>
                                            <select name="role" id="role" class="form-control selectric" required>
                                                @if ($user->role === 'pembaca')
                                                    <option value="pembaca" {{ $user->role === 'pembaca' ? 'selected' : '' }}>Pembaca</option>
                                                @else
                                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="pustakawan" {{ $user->role === 'pustakawan' ? 'selected' : '' }}>Pustakawan</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat" style="height: 250px" required>{{ $user->alamat }}</textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Foto Profil</label>
                                            <img src="{{ $user->gambar }}" alt="{{ $user->name }}" width="250" class="d-block">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="image-upload">Edit Foto Profil</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih Gambar</label>
                                                <input type="file" name="foto_profil" id="image-upload">
                                            </div>
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
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection
