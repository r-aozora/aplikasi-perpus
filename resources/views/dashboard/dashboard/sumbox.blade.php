<div class="row">
    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('buku.index') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-danger bg-danger">
                    <i class="fas fa-book ml-0"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Buku</h4>
                    </div>
                    <div class="card-body">{{ $data['sumbox']['buku'] }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('peminjaman.index') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-shopping-cart ml-0"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Peminjaman</h4>
                    </div>
                    <div class="card-body">{{ $data['sumbox']['pinjam'] }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('ulasan.index') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-success bg-success">
                    <i class="fas fa-comments ml-0"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Ulasan</h4>
                    </div>
                    <div class="card-body">{{ $data['sumbox']['ulasan'] }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <a href="{{ route('user.index') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-info bg-info">
                    <i class="fas fa-users ml-0"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pembaca</h4>
                    </div>
                    <div class="card-body">{{ $data['sumbox']['user'] }}</div>
                </div>
            </div>
        </a>
    </div>
</div>