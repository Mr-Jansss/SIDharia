<!-- Mobile Navigation with Dropdown -->
<nav id="mobile-menu" class="hidden lg:hidden mt-4 pb-4">
    <div class="flex flex-col space-y-1 bg-white/10 backdrop-blur-sm p-4 rounded-lg">
        <a href="{{ route('home') }}" class="text-white hover:bg-white/20 px-4 py-3 rounded-lg transition">
            🏠 Beranda
        </a>
        
        <!-- Profil Negeri Dropdown -->
        <div class="mobile-dropdown">
            <button class="mobile-dropdown-btn w-full text-left text-white hover:bg-white/20 px-4 py-3 rounded-lg transition flex justify-between items-center">
                <span>🏛️ Profil Negeri</span>
                <i class="fas fa-chevron-down transition-transform text-sm"></i>
            </button>
            <div class="mobile-dropdown-content hidden pl-2 mt-1 space-y-1">
                <a href="{{ route('profile') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Profil Negeri</a>
                <a href="{{ route('profile.sejarah') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Sejarah</a>
                <a href="{{ route('profile.visi-misi') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Visi & Misi</a>
                <a href="{{ route('profile.pemerintahan') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Pemerintahan</a>
                <a href="{{ route('profile.struktur-organisasi') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Struktur Organisasi</a>
                <a href="{{ route('profile.peraturan-negeri') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Peraturan Negeri</a>
            </div>
        </div>

        <!-- Transparansi Dropdown -->
        <div class="mobile-dropdown">
            <button class="mobile-dropdown-btn w-full text-left text-white hover:bg-white/20 px-4 py-3 rounded-lg transition flex justify-between items-center">
                <span>💰 Transparansi</span>
                <i class="fas fa-chevron-down transition-transform text-sm"></i>
            </button>
            <div class="mobile-dropdown-content hidden pl-2 mt-1 space-y-1">
                <a href="{{ route('transparency.apb-negeri') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• APB Negeri</a>
                <a href="{{ route('transparency.realisasi-anggaran') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Realisasi Anggaran</a>
                <a href="{{ route('transparency.blt-bansos') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• BLT & Bansos</a>
                <a href="{{ route('transparency.lppd') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• LPPD</a>
            </div>
        </div>

        <a href="{{ route('potentials') }}" class="block text-white hover:bg-white/20 px-4 py-3 rounded-lg transition">🌴 Potensi Negeri</a>
        <a href="{{ route('statistics') }}" class="block text-white hover:bg-white/20 px-4 py-3 rounded-lg transition">📈 Statistik</a>
        <a href="{{ route('facilities') }}" class="block text-white hover:bg-white/20 px-4 py-3 rounded-lg transition">🏢 Fasilitas</a>
        <a href="{{ route('products') }}" class="block text-white hover:bg-white/20 px-4 py-3 rounded-lg transition">🛍️ Produk UMKM</a>
        <a href="{{ route('posts') }}" class="block text-white hover:bg-white/20 px-4 py-3 rounded-lg transition">📰 Berita</a>

        <!-- Layanan Dropdown -->
        <div class="mobile-dropdown">
            <button class="mobile-dropdown-btn w-full text-left text-white hover:bg-white/20 px-4 py-3 rounded-lg transition flex justify-between items-center">
                <span>📢 Layanan</span>
                <i class="fas fa-chevron-down transition-transform text-sm"></i>
            </button>
            <div class="mobile-dropdown-content hidden pl-2 mt-1 space-y-1">
                <a href="{{ route('pengaduan.create') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Pengaduan Masyarakat</a>
                <a href="{{ route('pengaduan.check-status') }}" class="block text-white hover:bg-white/20 px-4 py-2 rounded-lg transition text-sm">• Cek Status Pengaduan</a>
            </div>
        </div>
    </div>
</nav>
