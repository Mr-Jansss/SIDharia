<header class="top-0 z-50 sticky bg-primary shadow-lg">
    <div class="mx-auto px-4 container">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="flex justify-center items-center bg-secondary rounded-full w-12 h-12">
                    <span class="font-bold text-primary text-2xl">H</span>
                </div>
                <div>
                    <h1 class="font-bold text-white text-xl">Negeri Haria</h1>
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
                        Profil <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('profile.sejarah') }}"><i class="fas fa-book"></i> Sejarah</a>
                        <a href="{{ route('profile.visi-misi') }}"><i class="fas fa-bullseye"></i> Visi & Misi</a>
                        <a href="{{ route('profile.pemerintahan') }}"><i class="fas fa-users"></i> Pemerintahan</a>
                        <a href="{{ route('profile.struktur-organisasi') }}"><i class="fas fa-sitemap"></i> Struktur Organisasi</a>
                    </div>
                </div>

                <a href="{{ route('potentials') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('potentials') || request()->routeIs('potential.detail') ? 'text-secondary font-semibold' : '' }}">
                    Potensi Negeri
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
                        Layanan <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('pengajuan-surat.create') }}"><i class="fas fa-file-alt"></i> Pengajuan Surat</a>
                        <a href="{{ route('pengajuan-surat.check-status') }}"><i class="fas fa-search"></i> Cek Status Surat</a>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden focus:outline-none text-white">
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
                    Potensi Negeri
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
                <div class="mt-2 pt-3 border-blue-400 border-t">
                    <p class="mb-2 text-blue-200 text-sm">Layanan</p>
                    <a href="{{ route('pengajuan-surat.create') }}" class="block pl-4 text-white hover:text-secondary transition">
                        📄 Pengajuan Surat
                    </a>
                    <a href="{{ route('pengajuan-surat.check-status') }}" class="block mt-2 pl-4 text-white hover:text-secondary transition">
                        🔍 Cek Status Surat
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Mobile Menu Toggle Script -->
<script>
    // Mobile Menu Toggle
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Desktop Dropdown dengan delay
    document.addEventListener('DOMContentLoaded', function() {
        const dropdowns = document.querySelectorAll('.dropdown');
        
        dropdowns.forEach(dropdown => {
            let timeout;
            const menu = dropdown.querySelector('.dropdown-menu');
            
            // Hover pada parent dropdown
            dropdown.addEventListener('mouseenter', function() {
                clearTimeout(timeout);
                menu.style.display = 'block';
                // Small delay untuk animasi
                setTimeout(() => {
                    menu.classList.add('show');
                }, 10);
            });
            
            // Leave dari parent dropdown
            dropdown.addEventListener('mouseleave', function() {
                // Delay 300ms sebelum hilang
                timeout = setTimeout(() => {
                    menu.classList.remove('show');
                    setTimeout(() => {
                        if (!menu.classList.contains('show')) {
                            menu.style.display = 'none';
                        }
                    }, 200);
                }, 300);
            });
            
            // Hover pada menu dropdown itu sendiri (biar ga hilang)
            menu.addEventListener('mouseenter', function() {
                clearTimeout(timeout);
            });
            
            menu.addEventListener('mouseleave', function() {
                timeout = setTimeout(() => {
                    menu.classList.remove('show');
                    setTimeout(() => {
                        if (!menu.classList.contains('show')) {
                            menu.style.display = 'none';
                        }
                    }, 200);
                }, 300);
            });
        });
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
        opacity: 0;
        transform: translateY(-10px);
        transition: opacity 0.2s ease-out, transform 0.2s ease-out;
    }

    .dropdown-menu.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Area hover yang lebih besar */
    .dropdown::after {
        content: '';
        position: absolute;
        top: 100%;
        left: -10px;
        right: -10px;
        height: 15px;
        z-index: 99;
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
</style>
