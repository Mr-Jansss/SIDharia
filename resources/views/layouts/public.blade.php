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

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header / Navigation -->
    <header class="top-0 z-50 sticky bg-primary shadow-lg">
        <div class="mx-auto px-4 container">
            <div class="flex justify-between items-center py-4">
                <!-- Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="flex justify-center items-center bg-white p-1 rounded-full w-12 h-12">
                        <img src="{{ asset('storage/logo/logonegeriharia.png') }}" alt="Logo Negeri Haria" class="w-full h-full object-contain">
                    </div>
                    <div class="text-white">
                        <h1 class="font-bold text-xl">Negeri Haria</h1>
                        <p class="text-gray-200 text-xs">Kecamatan Saparua, Maluku Tengah</p>
                    </div>
                </a>

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
                        <a href="#" class="text-white hover:text-secondary transition {{ request()->routeIs('pengajuan-surat.*') || request()->routeIs('pengaduan.*') ? 'text-secondary font-semibold' : '' }}">
                            Layanan <i class="ml-1 text-xs fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('pengajuan-surat.create') }}"><i class="fas fa-file-alt"></i> Pengajuan Surat</a>
                            <a href="{{ route('pengajuan-surat.check-status') }}"><i class="fas fa-search"></i> Cek Status Surat</a>
                            <div class="my-1 border-gray-200 border-t"></div>
                            <a href="{{ route('pengaduan.create') }}"><i class="fas fa-bullhorn"></i> Pengaduan Masyarakat</a>
                            <a href="{{ route('pengaduan.check-status') }}"><i class="fas fa-search"></i> Cek Status Pengaduan</a>
                        </div>
                    </div>

                    @auth
                        <!-- Jika sudah login, tampilkan link ke Dashboard -->
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center bg-secondary hover:bg-yellow-400 px-4 py-2 rounded-lg font-semibold text-primary transition">
                            <i class="mr-2 fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    @else
                        <!-- Jika belum login, tampilkan tombol Login -->
                        <a href="{{ route('login') }}" class="flex items-center bg-secondary hover:bg-yellow-400 px-4 py-2 rounded-lg font-semibold text-primary transition">
                            <i class="mr-2 fas fa-sign-in-alt"></i> Login Admin
                        </a>
                    @endauth
                </nav>
            </div>

            <!-- Mobile Navigation -->
            <nav id="mobile-menu" class="hidden lg:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('home') ? 'text-secondary font-semibold' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('profile') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('profile') ? 'text-secondary font-semibold' : '' }}">
                        Profil Negeri
                    </a>
                    <a href="{{ route('potentials') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('potentials') ? 'text-secondary font-semibold' : '' }}">
                        Potensi Negeri
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

                    <div class="mt-2 pt-3 border-blue-400 border-t">
                        <p class="mb-2 text-blue-200 text-sm">Layanan</p>
                        <a href="{{ route('pengajuan-surat.create') }}" class="block pl-4 text-white hover:text-secondary transition">
                            📄 Pengajuan Surat
                        </a>
                        <a href="{{ route('pengajuan-surat.check-status') }}" class="block mt-2 pl-4 text-white hover:text-secondary transition">
                            🔍 Cek Status Surat
                        </a>
                        <a href="{{ route('pengaduan.create') }}" class="block mt-2 pl-4 text-white hover:text-secondary transition">
                            📢 Pengaduan Masyarakat
                        </a>
                        <a href="{{ route('pengaduan.check-status') }}" class="block mt-2 pl-4 text-white hover:text-secondary transition">
                            🔎 Cek Status Pengaduan
                        </a>
                    </div>

                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-secondary hover:bg-yellow-400 px-4 py-2 rounded-lg font-semibold text-primary text-center transition">
                            <i class="mr-2 fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-secondary hover:bg-yellow-400 px-4 py-2 rounded-lg font-semibold text-primary text-center transition">
                            <i class="mr-2 fas fa-sign-in-alt"></i> Login Admin
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
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
                        <li><a href="{{ route('pengajuan-surat.create') }}" class="text-gray-300 hover:text-secondary transition">Pengajuan Surat</a></li>
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
