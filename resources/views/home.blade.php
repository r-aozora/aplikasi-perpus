<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PinjamBuku.id</title>

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
            <a class="navbar-brand" href="#">PinjamBuku.id</a>
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
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><span>Buku idamanmu</span><br> hanya sejauh <span>sentuhan jari</span></h1>
            <a href="#" class="btn btn-primary">Lihat Buku</a>
        </div>
    </div>
    {{-- Jumbotron End --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
