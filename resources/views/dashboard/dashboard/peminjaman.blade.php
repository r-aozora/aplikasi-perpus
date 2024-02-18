<div class="row">
    <div class="col-12">
        @if (Auth::user()->role !== 'pembaca')    
            <div class="card">
                <div class="card-header">
                    <h4>{{ $data['pinjam']['title'] }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Peminjam</th>
                                <th>Waktu</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tenggat</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($data['pinjam']['data'] as $item)
                                <tr>
                                    <td>{{ $item->invoice }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->tgl_pinjam ?? '-' }}</td>
                                    <td>{{ $item->tenggat ?? '-' }}</td>
                                    <td>{{ $item->tgl_kembali ?? '-' }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                <div class="badge badge-warning">Dipesan</div>
                                                @break
                                            @case(1)
                                                <div class="badge badge-info">Dipinjam</div>
                                                @break
                                            @case(2)
                                                <div class="badge badge-success">Dikembalikan</div>
                                                @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('peminjaman.show', $item->invoice) }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada data :(</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    <h4>{{ $data['pinjam']['title'] }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('pinjam.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Waktu</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tenggat</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($data['pinjam']['data'] as $item)
                                <tr>
                                    <td>{{ $item->invoice }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->tgl_pinjam ?? '-' }}</td>
                                    <td>{{ $item->tenggat ?? '-' }}</td>
                                    <td>{{ $item->tgl_kembali ?? '-' }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case(0)
                                                <div class="badge badge-warning">Dipesan</div>
                                                @break
                                            @case(1)
                                                <div class="badge badge-info">Dipinjam</div>
                                                @break
                                            @case(2)
                                                <div class="badge badge-success">Dikembalikan</div>
                                                @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('pinjam.show', $item->invoice) }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data :(</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
