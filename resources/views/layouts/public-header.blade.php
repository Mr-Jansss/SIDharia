<header class="bg-primary shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center">
                    <span class="text-primary text-2xl font-bold">H</span>
                </div>
                <div>
                    <h1 class="text-white font-bold text-xl">Desa Haria</h1>
                    <p class="text-blue-200 text-xs">Saparua, Maluku Tengah</p>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('home') ? 'text-secondary font-semibold' : '' }}">
                    Beranda
                </a>
                
                <!-- Profil Dropdown -->
                <div class="dropdown">
                    <a href="{{ route('profile') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('profile*') ? 'text-secondary font-semibold' : '' }}">
                        Profil <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('profile.sejarah') }}"><i class="fas fa-book"></i> Sejarah</a>
                        <a href="{{ route('profile.visi-misi') }}"><i class="fas fa-bullseye"></i> Visi & Misi</a>
                        <a href="{{ route('profile.pemerintahan') }}"><i class="fas fa-users"></i> Pemerintahan</a>
                        <a href="{{ route('profile.struktur-organisasi') }}"><i class="fas fa-sitemap"></i> Struktur Organisasi</a>
                    </div>
                </div>

                <a href="{{ route('potentials') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('potentials') || request()->routeIs('potential.detail') ? 'text-secondary font-semibold' : '' }}">
                    Wisata
                </a>
                <a href="{{ route('products') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('products') ? 'text-secondary font-semibold' : '' }}">
                    Produk UMKM
                </a>
                <a href="{{ route('posts') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('posts') || request()->routeIs('post.detail') ? 'text-secondary font-semibold' : '' }}">
                    Berita
                </a>
                <a href="{{ route('statistics') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('statistics') ? 'text-secondary font-semibold' : '' }}">
                    Statistik
                </a>
                
                <!-- Layanan Dropdown -->
                <div class="dropdown">
                    <a href="#" class="text-white hover:text-secondary transition {{ request()->routeIs('pengajuan-surat.*') ? 'text-secondary font-semibold' : '' }}">
                        Layanan <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('pengajuan-surat.create') }}"><i class="fas fa-file-alt"></i> Pengajuan Surat</a>
                        <a href="{{ route('pengajuan-surat.check-status') }}"><i class="fas fa-search"></i> Cek Status Surat</a>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="hidden lg:hidden pb-4">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('home') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('home') ? 'text-secondary font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('profile') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('profile*') ? 'text-secondary font-semibold' : '' }}">
                    Profil
                </a>
                <a href="{{ route('potentials') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('potentials') || request()->routeIs('potential.detail') ? 'text-secondary font-semibold' : '' }}">
                    Wisata
                </a>
                <a href="{{ route('products') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('products') ? 'text-secondary font-semibold' : '' }}">
                    Produk UMKM
                </a>
                <a href="{{ route('posts') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('posts') || request()->routeIs('post.detail') ? 'text-secondary font-semibold' : '' }}">
                    Berita
                </a>
                <a href="{{ route('statistics') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('statistics') ? 'text-secondary font-semibold' : '' }}">
                    Statistik
                </a>
                <div class="border-t border-blue-400 pt-3 mt-2">
                    <p class="text-blue-200 text-sm mb-2">Layanan</p>
                    <a href="{{ route('pengajuan-surat.create') }}" class="text-white hover:text-secondary transition block pl-4">
                        📄 Pengajuan Surat
                    </a>
                    <a href="{{ route('pengajuan-surat.check-status') }}" class="text-white hover:text-secondary transition block pl-4 mt-2">
                        🔍 Cek Status Surat
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Mobile Menu Toggle Script -->
<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>

<style>
    :root {
        --primary-blue: #00529B;
        --secondary-yellow: #FFD100;
    }
    
    .bg-primary { background-color: var(--primary-blue); }
    .text-primary { color: var(--primary-blue); }
    .bg-secondary { background-color: var(--secondary-yellow); }
    .text-secondary { color: var(--secondary-yellow); }
    
    /* Dropdown Menu Styles */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 220px;
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        padding: 0.5rem 0;
        margin-top: 0.5rem;
        z-index: 100;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
        animation: fadeInDown 0.3s ease-out;
    }

    .dropdown-menu a {
        display: block;
        padding: 0.75rem 1.25rem;
        color: var(--primary-blue);
        text-decoration: none;
        transition: all 0.2s;
        font-size: 0.95rem;
    }

    .dropdown-menu a:hover {
        background: var(--secondary-yellow);
        color: var(--primary-blue);
        padding-left: 1.5rem;
    }

    .dropdown-menu a i {
        margin-right: 0.5rem;
        width: 20px;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
