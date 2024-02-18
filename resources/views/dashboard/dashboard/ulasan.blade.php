<div class="col-lg-6">
    @if (Auth::user()->role !== 'pembaca')
        <div class="card">
            <div class="card-header">
                <h4>{{ $data['ulasan']['title'] }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('ulasan.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>Dari</th>
                            <th>Untuk Buku</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($data['ulasan']['data'] as $item)
                            <tr>
                                <td>{{ '@'.$item->user->username }}</td>
                                <td>{{ $item->buku->judul }}</td>
                                <td>
                                    <div class="badge {{ $item->rating > 4 ? 'badge-success' : 'badge-warning' }}">
                                        {{ $item->rating }} 
                                        <i class="fas-fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('ulasan.show', $item->slug) }}" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data :(</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4>{{ $data['ulasan']['title'] }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('ulasan.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>Untuk Buku</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($data['ulasan']['data'] as $item)
                            <tr>
                                <td>{{ $item->buku->judul }}</td>
                                <td>
                                    <div class="badge {{ $item->rating > 4 ? 'badge-success' : 'badge-warning' }}">
                                        {{ $item->rating }} 
                                        <i class="fas-fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('pustaka.show', $item->slug) }}" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data :(</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        
    @endif
</div>