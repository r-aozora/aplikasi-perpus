@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                                <div class="card-header-action">
                                    <a href="#role-pembaca" data-tab="role-tab" class="btn active">Pembaca</a>
                                    <a href="#role-petugas" data-tab="role-tab" class="btn">Petugas</a>
                                    <a href="{{ route('user.create') }}" class="btn btn-primary" data-toggle="tooltip" title="Tambah Pengguna">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="summary">
                                    <div class="summary-chart active" data-tab-group="role-tab" id="role-pembaca">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th>Foto Profil</th>
                                                        <th>Nama</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Telepon</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user['pembaca'] as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" width="100">
                                                            </td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ '@'.$item->username }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->telepon }}</td>
                                                            <td>
                                                                <a href="{{ route('user.show', $item->slug) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat Pengguna">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('user.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Pengguna">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <a href="{{ route('user.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Pengguna">
                                                                    <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="summary-chart" data-tab-group="role-tab" id="role-petugas">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th>Foto Profil</th>
                                                        <th>Nama</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Telepon</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user['petugas'] as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" width="100">
                                                            </td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ '@'.$item->username }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->telepon }}</td>
                                                            <td>{{ ucfirst($item->role) }}</td>
                                                            <td>
                                                                <a href="{{ route('user.show', $item->slug) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat Pengguna">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('user.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Pengguna">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <a href="{{ route('user.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Pengguna">
                                                                    <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
