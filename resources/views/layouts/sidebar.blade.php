<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">
                {{ config('app.name') }}
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">.ID</a>
        </div>
        <ul class="sidebar-menu mb-5">
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'pustakawan')
                <li class="menu-header">Dashboard</li>
                <li class="dropdown {{ $active === 'Dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-header">Perpustakaan</li>
                <li class="dropdown {{ $active === 'Buku' ? 'active' : '' }}">
                    <a href="{{ route('buku.index') }}" class="nav-link">
                        <i class="fas fa-book"></i>
                        <span>Koleksi Buku</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Kategori' ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}" class="nav-link">
                        <i class="fas fa-paperclip"></i>
                        <span>Kategori Buku</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Peminjaman' ? 'active' : '' }}">
                    <a href="{{ route('peminjaman.index') }}" class="nav-link">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Ulasan' ? 'active' : '' }}">
                    <a href="{{ route('ulasan.index') }}" class="nav-link">
                        <i class="fas fa-comments"></i>
                        <span>Ulasan Buku</span>
                    </a>
                </li>
                <li class="menu-header">Pengaturan</li>
                @if (Auth::user()->role === 'admin')
                    <li class="dropdown {{ $active === 'User' ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="fas fa-users"></i>
                            <span>Kelola Pengguna</span>
                        </a>
                    </li>
                @endif
                <li class="dropdown {{ $active === 'Profil' ? 'active' : '' }}">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            @else
                <li class="menu-header">Dashboard</li>
                <li class="dropdown {{ $active === 'Dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-header">Perpustakaan</li>
                <li class="dropdown {{ $active === 'Pustaka' ? 'active' : '' }}">
                    <a href="{{ route('pustaka.index') }}" class="nav-link">
                        <i class="fas fa-book"></i>
                        <span>Pustaka</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Koleksi' ? 'active' : '' }}">
                    <a href="{{ route('koleksi.index') }}" class="nav-link">
                        <i class="fas fa-bookmark"></i>
                        <span>Koleksi</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Pinjam' ? 'active' : '' }}">
                    <a href="{{ route('pinjam.index') }}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>
                <li class="dropdown {{ $active === 'Ulasan' ? 'active' : '' }}">
                    <a href="{{ route('ulasan.index') }}" class="nav-link">
                        <i class="fas fa-comment"></i>
                        <span>Ulasan</span>
                    </a>
                </li>
                <li class="menu-header">Pengaturan</li>
                <li class="dropdown {{ $active === 'Profil' ? 'active' : '' }}">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>
