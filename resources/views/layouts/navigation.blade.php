<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6C5CE7&color=fff&size=100" 
             alt="Admin Avatar" 
             class="mx-auto rounded-full w-16 h-16">
        <p class="mt-3 font-semibold text-gray-800">{{ Auth::user()->name }}</p>
        <div class="flex justify-center items-center gap-1 mt-1 text-green-500 text-sm">
            <span class="inline-block bg-green-500 rounded-full w-2 h-2"></span>
            <span>Online</span>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-menu">
        <a href="{{ route('admin.dashboard') }}" 
           class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.village-profiles.index') }}" 
           class="menu-item {{ request()->routeIs('admin.village-profiles.*') ? 'active' : '' }}">
            <i class="fas fa-info-circle"></i>
            <span>Profil Negeri</span>
        </a>

        <a href="{{ route('admin.officials.index') }}" 
           class="menu-item {{ request()->routeIs('admin.officials.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <span>Perangkat Negeri</span>
        </a>

        <a href="{{ route('admin.leader-greetings.index') }}" 
           class="menu-item {{ request()->routeIs('admin.leader-greetings.*') ? 'active' : '' }}">
            <i class="fas fa-comment-dots"></i>
            <span>Sambutan</span>
        </a>

        <a href="{{ route('admin.potentials.index') }}" 
           class="menu-item {{ request()->routeIs('admin.potentials.*') ? 'active' : '' }}">
            <i class="fas fa-map-marked-alt"></i>
            <span>Potensi Negeri</span>
        </a>

        <a href="{{ route('admin.facilities.index') }}" 
           class="menu-item {{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
            <i class="fas fa-building"></i>
            <span>Fasilitas</span>
        </a>

        <a href="{{ route('admin.products.index') }}" 
           class="menu-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fas fa-store"></i>
            <span>Produk UMKM</span>
        </a>

        <a href="{{ route('admin.posts.index') }}" 
           class="menu-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper"></i>
            <span>Berita</span>
        </a>

        <a href="{{ route('admin.transparency.index') }}" 
           class="menu-item {{ request()->routeIs('admin.transparency.*') ? 'active' : '' }}">
            <i class="fas fa-chart-line"></i>
            <span>Transparansi</span>
        </a>

        <a href="{{ route('admin.pengaduan.index') }}" 
           class="menu-item {{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
            <i class="fas fa-bullhorn"></i>
            <span>Pengaduan</span>
        </a>

        <a href="{{ route('admin.hero-sliders.index') }}" 
           class="menu-item {{ request()->routeIs('admin.hero-sliders.*') ? 'active' : '' }}">
            <i class="fas fa-images"></i>
            <span>Hero Slider</span>
        </a>

        <a href="{{ route('admin.statistics.index') }}" 
           class="menu-item {{ request()->routeIs('admin.statistics.*') ? 'active' : '' }}">
            <i class="fas fa-chart-bar"></i>
            <span>Statistik</span>
        </a>

        <a href="{{ route('admin.settings.index') }}" 
           class="menu-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="fas fa-cog"></i>
            <span>Pengaturan</span>
        </a>

        <a href="{{ route('admin.users.index') }}" 
           class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fas fa-users-cog"></i>
            <span>Kelola Admin</span>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="hover:bg-red-50 w-full hover:text-red-600 text-left menu-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
