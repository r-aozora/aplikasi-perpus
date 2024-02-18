<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>

    {{-- <!-- Bootstrap CSS --> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Nunito:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    {{-- Navbar Start --}}
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="#home">Home</a>
                    <a class="nav-link active" href="#buku">Buku</a>
                    <a class="nav-link active" href="#tentang">Tentang</a>
                    @auth
                        <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>
                    @endauth
                    @guest
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    {{-- Navbar End --}}

    {{-- Jumbotron Start --}}
    <section id="home">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4" data-aos="fade-up"><span>Buku idamanmu</span><br> hanya sejauh <span>sentuhan jari</span></h1>
                <a href="{{ route('pustaka.index') }}" class="btn btn-primary">Mulai</a>
            </div>
        </div>
    </section>
    {{-- Jumbotron End --}}

    {{-- Container --}}
    <div class="container">
        {{-- Info Panel --}}
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <div class="col-lg">
                        <img src="{{ asset('images/bag.svg') }}" alt="Peminjaman" height="100" class="float-left">
                        <h4>Peminjaman</h4>
                        <p>Peminjaman cepat dan nyaman untuk menikmati buku impian.</p>
                    </div>
                    <div class="col-lg">
                        <img src="{{ asset('images/bookmarks.svg') }}" alt="Koleksi" height="100" class="float-left">
                        <h4>Koleksi Buku</h4>
                        <p>Telusuri koleksi buku kami yang kaya dan beragam.</p>
                    </div>
                    <div class="col-lg">
                        <img src="{{ asset('images/chat.svg') }}" alt="Ulasan" height="100" class="float-left">
                        <h4>Ulasan</h4>
                        <p>Dapatkan wawasan dan pandangan baru dengan ulasan buku.</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Info Panel End --}}

        {{-- Buku --}}
        <section id="buku" class="buku">
            <div class="row">
                @forelse ($buku as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $item->kategori->kategori }}</h6>
                                <p class="card-text">
                                    @if (strlen($item->deskripsi) > 100)
                                        {{ substr($item->deskripsi, 0, 100).'...' }}
                                    @else
                                        {{ $item->deskripsi }}
                                    @endif
                                </p>
                                <a href="{{ route('pustaka.show', $item->slug) }}" class="card-link">Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col text-center">
                        <h5>Buku Tidak Tersedia.</h5>
                    </div>
                @endforelse
            </div>
            <div class="row mt-5 {{ $buku ? '' : 'd-none' }}">
                <div class="col text-center">
                    <a href="{{ route('pustaka.index') }}" class="btn btn-primary">Lihat Semua</a>
                </div>
            </div>
        </section>
        {{-- Buku End --}}

        {{-- About --}}
        <section id="tentang">
            <div class="row about">
                <div class="col-lg-6">
                    <img src="{{ asset('images/library-2.jpg') }}" alt="About" class="img-fluid">
                </div>
                <div class="col-lg-5">
                    <h3>Pesan, <span>Pinjam</span>, Baca</h3>
                    <p>{{ config('app.name') }}, tempat terbaik untuk memenuhi kebutuhan bacaan Anda dengan mudah dan praktis.</p>
                    <a href="{{ route('pustaka.index') }}" class="btn btn-primary">Pustaka</a>
                </div>
            </div>
        </section>
        {{-- About End --}}

        {{-- Footer --}}
        <div class="row footer">
            <div class="col text-center">
                <p>{{ date('Y') }} All Right Reserved by Muhamad Citra Hidayat.</p>
            </div>
        </div>
        {{-- Footer End --}}
    </div>
    {{-- Container End --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
