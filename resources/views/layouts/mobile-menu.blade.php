<!-- Mobile Navigation with Dropdown -->
<nav id="mobile-menu" class="hidden lg:hidden mt-4 pb-4">
    <div class="flex flex-col space-y-1 bg-white/10 backdrop-blur-sm p-4 rounded-lg">
        <a href="{{ route('home') }}" class="flex items-center hover:bg-white/20 px-4 py-3 rounded-lg text-white transition">
            <i class="w-5 fas fa-home"></i>
            <span class="ml-3">Beranda</span>
        </a>
        
        <!-- Profil Negeri Dropdown -->
        <div class="mobile-dropdown">
            <button class="flex justify-between items-center hover:bg-white/20 px-4 py-3 rounded-lg w-full text-white text-left transition mobile-dropdown-btn">
                <span class="flex items-center">
                    <i class="w-5 fas fa-landmark"></i>
                    <span class="ml-3">Profil Negeri</span>
                </span>
                <i class="text-sm transition-transform fas fa-chevron-down"></i>
            </button>
            <div class="hidden space-y-1 mt-1 pl-2 mobile-dropdown-content">
                <a href="{{ route('profile') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-home"></i>
                    <span class="ml-2">Profil Negeri</span>
                </a>
                <a href="{{ route('profile.sejarah') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-book"></i>
                    <span class="ml-2">Sejarah</span>
                </a>
                <a href="{{ route('profile.visi-misi') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-bullseye"></i>
                    <span class="ml-2">Visi & Misi</span>
                </a>
                <a href="{{ route('profile.pemerintahan') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-building"></i>
                    <span class="ml-2">Pemerintahan</span>
                </a>
                <a href="{{ route('profile.struktur-organisasi') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-sitemap"></i>
                    <span class="ml-2">Struktur Organisasi</span>
                </a>
                <a href="{{ route('profile.peraturan-negeri') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-gavel"></i>
                    <span class="ml-2">Peraturan Negeri</span>
                </a>
            </div>
        </div>

        <!-- Transparansi Dropdown -->
        <div class="mobile-dropdown">
            <button class="flex justify-between items-center hover:bg-white/20 px-4 py-3 rounded-lg w-full text-white text-left transition mobile-dropdown-btn">
                <span class="flex items-center">
                    <i class="w-5 fas fa-file-invoice-dollar"></i>
                    <span class="ml-3">Transparansi</span>
                </span>
                <i class="text-sm transition-transform fas fa-chevron-down"></i>
            </button>
            <div class="hidden space-y-1 mt-1 pl-2 mobile-dropdown-content">
                <a href="{{ route('transparency.apb-negeri') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-file-invoice-dollar"></i>
                    <span class="ml-2">APB Negeri</span>
                </a>
                <a href="{{ route('transparency.realisasi-anggaran') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-chart-line"></i>
                    <span class="ml-2">Realisasi Anggaran</span>
                </a>
                <a href="{{ route('transparency.blt-bansos') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-hand-holding-usd"></i>
                    <span class="ml-2">BLT & Bansos</span>
                </a>
                <a href="{{ route('transparency.lppd') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-file-alt"></i>
                    <span class="ml-2">LPPD</span>
                </a>
            </div>
        </div>

        <a href="{{ route('potentials') }}" class="block flex items-center hover:bg-white/20 px-4 py-3 rounded-lg text-white transition">
            <i class="w-5 fas fa-mountain"></i>
            <span class="ml-3">Potensi Negeri</span>
        </a>
        
        <a href="{{ route('statistics') }}" class="block flex items-center hover:bg-white/20 px-4 py-3 rounded-lg text-white transition">
            <i class="w-5 fas fa-chart-bar"></i>
            <span class="ml-3">Statistik</span>
        </a>
        
        <a href="{{ route('facilities') }}" class="block flex items-center hover:bg-white/20 px-4 py-3 rounded-lg text-white transition">
            <i class="w-5 fas fa-building"></i>
            <span class="ml-3">Fasilitas</span>
        </a>
        
        <a href="{{ route('products') }}" class="block flex items-center hover:bg-white/20 px-4 py-3 rounded-lg text-white transition">
            <i class="w-5 fas fa-store"></i>
            <span class="ml-3">Produk UMKM</span>
        </a>
        
        <a href="{{ route('posts') }}" class="block flex items-center hover:bg-white/20 px-4 py-3 rounded-lg text-white transition">
            <i class="w-5 fas fa-newspaper"></i>
            <span class="ml-3">Berita</span>
        </a>

        <!-- Layanan Dropdown -->
        <div class="mobile-dropdown">
            <button class="flex justify-between items-center hover:bg-white/20 px-4 py-3 rounded-lg w-full text-white text-left transition mobile-dropdown-btn">
                <span class="flex items-center">
                    <i class="w-5 fas fa-bullhorn"></i>
                    <span class="ml-3">Layanan</span>
                </span>
                <i class="text-sm transition-transform fas fa-chevron-down"></i>
            </button>
            <div class="hidden space-y-1 mt-1 pl-2 mobile-dropdown-content">
                <a href="{{ route('pengaduan.create') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-comment-dots"></i>
                    <span class="ml-2">Pengaduan Masyarakat</span>
                </a>
                <a href="{{ route('pengaduan.check-status') }}" class="block flex items-center hover:bg-white/20 px-4 py-2 rounded-lg text-white text-sm transition">
                    <i class="w-4 text-xs fas fa-search"></i>
                    <span class="ml-2">Cek Status Pengaduan</span>
                </a>
            </div>
        </div>
    </div>
</nav>
