<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Wisata Haria')</title>
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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header / Navigation -->
    <header class="top-0 z-50 sticky bg-primary shadow-lg">
        <div class="mx-auto px-4 container">
            <div class="flex justify-between items-center py-4">
                <!-- Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="flex justify-center items-center bg-white rounded-full w-12 h-12">
                        <i class="text-primary text-2xl fas fa-mountain"></i>
                    </div>
                    <div class="text-white">
                        <h1 class="font-bold text-xl">Desa Wisata Haria</h1>
                        <p class="text-gray-200 text-xs">Kecamatan Sabu Barat</p>
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
                    <a href="{{ route('profile') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('profile') ? 'text-secondary font-semibold' : '' }}">
                        Profil Desa
                    </a>
                    <a href="{{ route('potentials') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('potentials') ? 'text-secondary font-semibold' : '' }}">
                        Wisata
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
                        Profil Desa
                    </a>
                    <a href="{{ route('potentials') }}" class="text-white hover:text-secondary transition {{ request()->routeIs('potentials') ? 'text-secondary font-semibold' : '' }}">
                        Wisata
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
                    <h3 class="mb-4 font-bold text-secondary text-xl">Desa Wisata Haria</h3>
                    <p class="mb-4 text-gray-300">
                        Desa wisata dengan keindahan alam dan budaya lokal yang memikat di Kecamatan Sabu Barat.
                    </p>
                    <div class="space-y-2 text-gray-300">
                        <p><i class="mr-2 text-secondary fas fa-map-marker-alt"></i> Kec. Sabu Barat, Kab. Sabu Raijua</p>
                        <p><i class="mr-2 text-secondary fas fa-envelope"></i> info@desaharia.id</p>
                        <p><i class="mr-2 text-secondary fas fa-phone"></i> +62 xxx xxxx xxxx</p>
                    </div>
                </div>

                <!-- Link Cepat -->
                <div>
                    <h3 class="mb-4 font-bold text-secondary text-xl">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-secondary transition">Beranda</a></li>
                        <li><a href="{{ route('profile') }}" class="text-gray-300 hover:text-secondary transition">Profil Desa</a></li>
                        <li><a href="{{ route('potentials') }}" class="text-gray-300 hover:text-secondary transition">Potensi Wisata</a></li>
                        <li><a href="{{ route('facilities') }}" class="text-gray-300 hover:text-secondary transition">Fasilitas Umum</a></li>
                        <li><a href="{{ route('products') }}" class="text-gray-300 hover:text-secondary transition">Produk UMKM</a></li>
                        <li><a href="{{ route('posts') }}" class="text-gray-300 hover:text-secondary transition">Berita & Kegiatan</a></li>
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
                <p>&copy; {{ date('Y') }} Desa Wisata Haria. Dibuat dengan ❤️ untuk masyarakat.</p>
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

    @stack('scripts')
</body>
</html>
