<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Negeri Haria')</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/logonegeriharia.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #00529B;
            --secondary-yellow: #FFD100;
            --text-dark: #1F2937;
        }
        
        .bg-primary { background-color: var(--primary-blue); }
        .bg-secondary { background-color: var(--secondary-yellow); }
        .text-primary { color: var(--primary-blue); }
        .text-secondary { color: var(--secondary-yellow); }
        .border-primary { border-color: var(--primary-blue); }
        .hover-primary:hover { background-color: #003d73; }

        /* Hero Slider Styles */
        .hero-slider {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        /* Slider Controls - Right Bottom */
        .slider-controls {
            position: absolute;
            bottom: 2rem;
            right: 2rem;
            display: flex;
            gap: 0.5rem;
            z-index: 20;
        }

        .slider-btn {
            background: rgba(255, 255, 255, 0.3);
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            cursor: pointer;
            font-size: 1.2rem;
            transition: all 0.3s;
            backdrop-filter: blur(5px);
            border-radius: 0.5rem;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-btn:hover {
            background: rgba(255, 255, 255, 0.5);
            transform: scale(1.1);
        }

        .slider-indicators {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 20;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .indicator.active {
            background: var(--secondary-yellow);
            width: 40px;
            border-radius: 6px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .animation-delay-400 {
            animation-delay: 0.4s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        @media (max-width: 768px) {
            .hero-slider {
                height: 500px;
            }
            
            .slider-controls {
                bottom: 1rem;
                right: 1rem;
                gap: 0.25rem;
            }
            
            .slider-btn {
                padding: 0.5rem 0.75rem;
                font-size: 1rem;
                width: 40px;
                height: 40px;
            }
        }

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
            margin-top: 0.25rem;
            z-index: 100;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease-in-out, transform 0.2s ease-in-out;
            transform: translateY(-10px);
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
            animation: fadeInDown 0.3s ease-out;
        }

        /* Perpanjang area hover dengan pseudo-element */
        .dropdown::before {
            content: '';
            position: absolute;
            top: 100%;
            left: -20px;
            right: -20px;
            height: 20px;
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

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Header / Navigation -->
    <header class="top-0 z-50 sticky bg-primary shadow-lg">
        <div class="mx-auto px-4 container">
            <div class="flex justify-between items-center py-4">
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-3">
                    <!-- Logo yang bisa diklik untuk login admin -->
                    <a href="{{ route('login') }}" class="flex justify-center items-center bg-white hover:bg-gray-100 p-1 rounded-full w-12 h-12 hover:scale-110 transition-all duration-300" title="Login Admin">
                        <img src="{{ asset('storage/logo/logonegeriharia.png') }}" alt="Logo Negeri Haria" class="w-full h-full object-contain">
                    </a>
                    <!-- Text Brand -->
                    <a href="{{ route('home') }}" class="text-white">
                        <h1 class="font-bold text-xl">Negeri Haria</h1>
                        <p class="text-gray-200 text-xs">Kecamatan Saparua, Maluku Tengah</p>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden text-white">
                    <i class="text-2xl fas fa-bars"></i>
                </button>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('home') ? 'text-secondary font-semibold' : '' }}">
                        Beranda
                    </a>
                    
                    <!-- Dropdown Profil Negeri -->
                    <div class="dropdown">
                        <a href="{{ route('profile') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('profile*') ? 'text-secondary font-semibold' : '' }}">
                            Profil Negeri <i class="ml-1 text-xs fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('profile') }}"><i class="fas fa-home"></i> Profil Negeri</a>
                            <a href="{{ route('profile.sejarah') }}"><i class="fas fa-book"></i> Sejarah</a>
                            <a href="{{ route('profile.visi-misi') }}"><i class="fas fa-bullseye"></i> Visi & Misi</a>
                            <a href="{{ route('profile.pemerintahan') }}"><i class="fas fa-landmark"></i> Pemerintahan</a>
                            <a href="{{ route('profile.struktur-organisasi') }}"><i class="fas fa-sitemap"></i> Struktur Organisasi</a>
                            <a href="{{ route('profile.peraturan-negeri') }}"><i class="fas fa-gavel"></i> Peraturan Negeri</a>
                        </div>
                    </div>

                    <!-- Dropdown Transparansi Keuangan -->
                    <div class="dropdown">
                        <a href="#" class="text-white hover:text-secondary transition {{ request()->routeIs('transparency.*') ? 'text-secondary font-semibold' : '' }}">
                            Transparansi <i class="ml-1 text-xs fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('transparency.apb-negeri') }}"><i class="fas fa-file-invoice-dollar"></i> APB Negeri</a>
                            <a href="{{ route('transparency.realisasi-anggaran') }}"><i class="fas fa-chart-line"></i> Laporan Realisasi Anggaran</a>
                            <a href="{{ route('transparency.blt-bansos') }}"><i class="fas fa-hand-holding-usd"></i> Penyaluran BLT & Bansos</a>
                            <a href="{{ route('transparency.lppd') }}"><i class="fas fa-file-alt"></i> LPPD / LKPPD</a>
                        </div>
                    </div>

                    <a href="{{ route('potentials') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('potentials') ? 'text-secondary font-semibold' : '' }}">
                        Potensi Negeri
                    </a>
                    <a href="{{ route('statistics') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('statistics') ? 'text-secondary font-semibold' : '' }}">
                        Statistik
                    </a>
                    <a href="{{ route('facilities') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('facilities') ? 'text-secondary font-semibold' : '' }}">
                        Fasilitas
                    </a>
                    <a href="{{ route('products') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('products') ? 'text-secondary font-semibold' : '' }}">
                        Produk UMKM
                    </a>
                    <a href="{{ route('posts') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('posts') ? 'text-secondary font-semibold' : '' }}">
                        Berita
                    </a>

                    <!-- Dropdown Layanan -->
                    <div class="dropdown">
                        <a href="#" class="text-white hover:text-secondary transition {{ request()->routeIs('pengaduan.*') ? 'text-secondary font-semibold' : '' }}">
                            Layanan <i class="ml-1 text-xs fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('pengaduan.create') }}"><i class="fas fa-bullhorn"></i> Pengaduan Masyarakat</a>
                            <a href="{{ route('pengaduan.check-status') }}"><i class="fas fa-search"></i> Cek Status Pengaduan</a>
                        </div>
                    </div>
                </nav>
            </div>

        </div>

        @include('layouts.mobile-menu')
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 mt-16 text-white">
        <div class="mx-auto px-4 py-12 container">
            <div class="gap-8 grid grid-cols-1 md:grid-cols-3">
                <!-- Info Desa -->
                <div>
                    <h3 class="mb-4 font-bold text-secondary text-xl">Negeri Haria</h3>
                    <p class="mb-4 text-gray-300">
                        Negeri adat dengan keindahan alam dan budaya lokal yang memikat di Kecamatan Saparua.
                    </p>
                    <div class="space-y-2 text-gray-300">
                        <p><i class="mr-2 text-secondary fas fa-map-marker-alt"></i> Kec. Saparua, Kab. Maluku Tengah</p>
                        <p><i class="mr-2 text-secondary fas fa-envelope"></i> info@desaharia.id</p>
                        <p><i class="mr-2 text-secondary fas fa-phone"></i> +62 xxx xxxx xxxx</p>
                    </div>
                </div>

                <!-- Link Cepat -->
                <div>
                    <h3 class="mb-4 font-bold text-secondary text-xl">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-secondary transition">Beranda</a></li>
                        <li><a href="{{ route('profile') }}" class="text-gray-300 hover:text-secondary transition">Profil Negeri</a></li>
                    <li><a href="{{ route('potentials') }}" class="text-gray-300 hover:text-secondary transition">Potensi Negeri</a></li>
                        <li><a href="{{ route('facilities') }}" class="text-gray-300 hover:text-secondary transition">Fasilitas Umum</a></li>
                        <li><a href="{{ route('products') }}" class="text-gray-300 hover:text-secondary transition">Produk UMKM</a></li>
                        <li><a href="{{ route('posts') }}" class="text-gray-300 hover:text-secondary transition">Berita & Kegiatan</a></li>
                        <li><a href="{{ route('pengaduan.create') }}" class="text-gray-300 hover:text-secondary transition">Pengaduan Masyarakat</a></li>
                    </ul>
                </div>

                <!-- Media Sosial -->
                <div>
                    <h3 class="mb-4 font-bold text-secondary text-xl">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="flex justify-center items-center bg-secondary hover:bg-yellow-400 rounded-full w-10 h-10 text-primary transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="flex justify-center items-center bg-secondary hover:bg-yellow-400 rounded-full w-10 h-10 text-primary transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="flex justify-center items-center bg-secondary hover:bg-yellow-400 rounded-full w-10 h-10 text-primary transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="flex justify-center items-center bg-secondary hover:bg-yellow-400 rounded-full w-10 h-10 text-primary transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-gray-700 border-t text-gray-400 text-center">
                <p>&copy; {{ date('Y') }} Negeri Haria. Dibuat dengan ❤️ untuk masyarakat.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Mobile Dropdown Accordion
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.mobile-dropdown');
            
            dropdowns.forEach(dropdown => {
                const btn = dropdown.querySelector('.mobile-dropdown-btn');
                const content = dropdown.querySelector('.mobile-dropdown-content');
                const icon = btn.querySelector('i');
                
                btn.addEventListener('click', function() {
                    // Toggle current dropdown
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                    
                    // Close other dropdowns
                    dropdowns.forEach(other => {
                        if (other !== dropdown) {
                            other.querySelector('.mobile-dropdown-content').classList.add('hidden');
                            other.querySelector('i').classList.remove('rotate-180');
                        }
                    });
                });
            });
        });
    </script>

    <!-- Hero Slider Script -->
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const indicators = document.querySelectorAll('.indicator');
        let slideInterval;

        function showSlide(n) {
            if (slides.length === 0) return;
            
            if (n >= slides.length) currentSlide = 0;
            if (n < 0) currentSlide = slides.length - 1;
            
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));
            
            slides[currentSlide].classList.add('active');
            if (indicators[currentSlide]) indicators[currentSlide].classList.add('active');
        }

        function changeSlide(n) {
            currentSlide += n;
            showSlide(currentSlide);
            resetInterval();
        }

        function goToSlide(n) {
            currentSlide = n;
            showSlide(currentSlide);
            resetInterval();
        }

        function autoSlide() {
            currentSlide++;
            showSlide(currentSlide);
        }

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(autoSlide, 5000);
        }

        // Auto slide every 5 seconds
        if (slides.length > 1) {
            slideInterval = setInterval(autoSlide, 5000);
        }
    </script>

    @stack('scripts')
</body>
</html>
