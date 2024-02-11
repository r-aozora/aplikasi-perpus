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
                    <div class="breadcrumb-item">Perpustakaan</div>
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
                                    <a href="{{ route('buku.create') }}" class="btn btn-primary" data-toggle="tooltip" title="Tambah Buku">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="{{ route('kategori.index') }}" class="btn btn-success" data-toggle="tooltip" title="Kategori Buku">
                                        <i class="fas fa-paperclip"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Sampul</th>
                                                <th>Judul Buku</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Kategori</th>
                                                <th>Stok</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($buku as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" width="100">
                                                    </td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ $item->penulis }}</td>
                                                    <td>{{ $item->penerbit }}</td>
                                                    <td>{{ $item->tahun_terbit }}</td>
                                                    <td>{{ $item->kategori->kategori }}</td>
                                                    <td>{{ $item->stok }}</td>
                                                    <td>
                                                        <div class="badge badge-{{ $item->stok === 0 ? 'danger' : 'success' }}">
                                                            {{ $item->stok === 0 ? 'Kosong' : 'Tersedia' }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('buku.show', $item->slug) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat Buku">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('buku.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Buku">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a href="{{ route('buku.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Buku">
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
