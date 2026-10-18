<header class="top-0 z-50 sticky bg-primary shadow-lg">
    <style>
        /* Smooth Navigation Animations */
        .nav-link {
            @apply relative text-white transition-all duration-300;
            padding-bottom: 2px;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: #FCD34D;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover {
            color: #FCD34D;
            transform: translateY(-2px);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link.active {
            color: #FCD34D;
            font-weight: 600;
        }
        
        .nav-link.active::after {
            width: 100%;
        }
        
        /* Logo Animation */
        .logo-container {
            transition: all 0.3s ease;
        }
        
        .logo-container:hover {
            transform: scale(1.05);
        }
        
        .logo-icon {
            transition: all 0.3s ease;
        }
        
        .logo-container:hover .logo-icon {
            transform: rotate(5deg) scale(1.1);
        }
        
        /* Dropdown Smooth Animations */
        .dropdown {
            position: relative;
        }
        
        .dropdown-menu {
            @apply absolute bg-white shadow-2xl mt-2 py-2 rounded-xl w-56;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: top;
        }
        
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }
        
        .dropdown-item {
            @apply block px-4 py-3 text-gray-800 transition-all duration-200;
            display: flex;
            align-items: center;
        }
        
        .dropdown-item:hover {
            @apply bg-gradient-to-r from-blue-50 to-blue-100 text-primary;
            padding-left: 1.25rem;
            border-left: 3px solid #1e40af;
        }
        
        .dropdown-item i {
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover i {
            transform: scale(1.2);
        }
        
        /* Mobile Menu Slide Animation */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        #mobile-menu.show {
            max-height: 500px;
        }
        
        /* Icon Animations */
        .icon-bounce {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        
        /* Chevron Rotation */
        .chevron-rotate {
            transition: transform 0.3s ease;
        }
        
        .dropdown:hover .chevron-rotate {
            transform: rotate(180deg);
        }
    </style>
    
    <div class="mx-auto px-4 container">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 logo-container">
                <div class="flex justify-center items-center bg-secondary shadow-lg rounded-full w-12 h-12 logo-icon">
                    <span class="font-bold text-primary text-2xl">H</span>
                </div>
                <div>
                    <h1 class="font-bold text-white text-xl">Negeri Haria</h1>
                    <p class="text-blue-200 text-xs">Saparua, Maluku Tengah</p>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="mr-1 fas fa-home"></i>Beranda
                </a>
                
                <!-- Profil Dropdown -->
                <div class="dropdown">
                    <a href="{{ route('profile') }}" class="nav-link flex items-center {{ request()->routeIs('profile*') ? 'active' : '' }}">
                        <i class="mr-1 fas fa-info-circle"></i>Profil
                        <i class="ml-1 text-xs fas fa-chevron-down chevron-rotate"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('profile.sejarah') }}" class="dropdown-item">
                            <i class="mr-2 text-primary fas fa-book"></i> Sejarah
                        </a>
                        <a href="{{ route('profile.visi-misi') }}" class="dropdown-item">
                            <i class="mr-2 text-primary fas fa-bullseye"></i> Visi & Misi
                        </a>
                        <a href="{{ route('profile.pemerintahan') }}" class="dropdown-item">
                            <i class="mr-2 text-primary fas fa-users"></i> Pemerintahan
                        </a>
                        <a href="{{ route('profile.struktur-organisasi') }}" class="dropdown-item">
                            <i class="mr-2 text-primary fas fa-sitemap"></i> Struktur Organisasi
                        </a>
                    </div>
                </div>

                <a href="{{ route('potentials') }}" class="nav-link {{ request()->routeIs('potentials') || request()->routeIs('potential.detail') ? 'active' : '' }}">
                    <i class="mr-1 fas fa-map-marked-alt"></i>Potensi Negeri
                </a>
                <a href="{{ route('products') }}" class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}">
                    <i class="mr-1 fas fa-store"></i>Produk UMKM
                </a>
                <a href="{{ route('posts') }}" class="nav-link {{ request()->routeIs('posts') || request()->routeIs('post.detail') ? 'active' : '' }}">
                    <i class="mr-1 fas fa-newspaper"></i>Berita
                </a>
                <a href="{{ route('statistics') }}" class="nav-link {{ request()->routeIs('statistics') ? 'active' : '' }}">
                    <i class="mr-1 fas fa-chart-bar"></i>Statistik
                </a>
                
                <!-- Layanan Dropdown -->
                <div class="dropdown">
                    <a href="#" class="nav-link flex items-center {{ request()->routeIs('pengajuan-surat.*') ? 'active' : '' }}">
                        <i class="mr-1 fas fa-hands-helping"></i>Layanan
                        <i class="ml-1 text-xs fas fa-chevron-down chevron-rotate"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('pengajuan-surat.create') }}" class="dropdown-item">
                            <i class="mr-2 text-primary fas fa-file-alt"></i> Pengajuan Surat
                        </a>
                        <a href="{{ route('pengajuan-surat.check-status') }}" class="dropdown-item">
                            <i class="mr-2 text-primary fas fa-search"></i> Cek Status Surat
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden focus:outline-none text-white hover:scale-110 transition-transform duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="lg:hidden pb-4">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('home') }}" class="text-white hover:text-secondary transition-all duration-200 hover:pl-2 {{ request()->routeIs('home') ? 'text-secondary font-semibold' : '' }}">
                    <i class="mr-2 fas fa-home"></i>Beranda
                </a>
                <a href="{{ route('profile') }}" class="text-white hover:text-secondary transition-all duration-200 hover:pl-2 {{ request()->routeIs('profile*') ? 'text-secondary font-semibold' : '' }}">
                    <i class="mr-2 fas fa-info-circle"></i>Profil
                </a>
                <a href="{{ route('potentials') }}" class="text-white hover:text-secondary transition-all duration-200 hover:pl-2 {{ request()->routeIs('potentials') || request()->routeIs('potential.detail') ? 'text-secondary font-semibold' : '' }}">
                    <i class="mr-2 fas fa-map-marked-alt"></i>Potensi Negeri
                </a>
                <a href="{{ route('products') }}" class="text-white hover:text-secondary transition-all duration-200 hover:pl-2 {{ request()->routeIs('products') ? 'text-secondary font-semibold' : '' }}">
                    <i class="mr-2 fas fa-store"></i>Produk UMKM
                </a>
                <a href="{{ route('posts') }}" class="text-white hover:text-secondary transition-all duration-200 hover:pl-2 {{ request()->routeIs('posts') || request()->routeIs('post.detail') ? 'text-secondary font-semibold' : '' }}">
                    <i class="mr-2 fas fa-newspaper"></i>Berita
                </a>
                <a href="{{ route('statistics') }}" class="text-white hover:text-secondary transition-all duration-200 hover:pl-2 {{ request()->routeIs('statistics') ? 'text-secondary font-semibold' : '' }}">
                    <i class="mr-2 fas fa-chart-bar"></i>Statistik
                </a>
                <div class="mt-2 pt-3 border-blue-400 border-t">
                    <p class="mb-2 font-semibold text-blue-200 text-sm">Layanan</p>
                    <a href="{{ route('pengajuan-surat.create') }}" class="block pl-4 hover:pl-6 text-white hover:text-secondary transition-all duration-200">
                        <i class="mr-2 fas fa-file-alt"></i>Pengajuan Surat
                    </a>
                    <a href="{{ route('pengajuan-surat.check-status') }}" class="block mt-2 pl-4 hover:pl-6 text-white hover:text-secondary transition-all duration-200">
                        <i class="mr-2 fas fa-search"></i>Cek Status Surat
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Mobile Menu Toggle Script -->
<script>
    // Mobile Menu Toggle with Animation
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('show');
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
