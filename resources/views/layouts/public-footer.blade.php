<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Tentang Desa -->
            <div>
                <h3 class="text-xl font-bold mb-4 text-yellow-400">Desa Haria</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    Desa wisata yang terletak di Pulau Saparua, Maluku Tengah, dengan keindahan alam dan kearifan lokal yang mempesona.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-pink-600 hover:bg-pink-700 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-red-600 hover:bg-red-700 rounded-full flex items-center justify-center transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Menu Cepat -->
            <div>
                <h3 class="text-xl font-bold mb-4 text-yellow-400">Menu Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-yellow-400 transition">Beranda</a></li>
                    <li><a href="{{ route('profile') }}" class="text-gray-400 hover:text-yellow-400 transition">Profil Desa</a></li>
                    <li><a href="{{ route('potentials') }}" class="text-gray-400 hover:text-yellow-400 transition">Potensi Wisata</a></li>
                    <li><a href="{{ route('products') }}" class="text-gray-400 hover:text-yellow-400 transition">Produk UMKM</a></li>
                    <li><a href="{{ route('posts') }}" class="text-gray-400 hover:text-yellow-400 transition">Berita & Kegiatan</a></li>
                    <li><a href="{{ route('statistics') }}" class="text-gray-400 hover:text-yellow-400 transition">Statistik Desa</a></li>
                </ul>
            </div>

            <!-- Layanan & Kontak -->
            <div>
                <h3 class="text-xl font-bold mb-4 text-yellow-400">Layanan & Kontak</h3>
                <ul class="space-y-2 text-sm mb-4">
                    <li><a href="{{ route('pengajuan-surat.create') }}" class="text-gray-400 hover:text-yellow-400 transition">📄 Pengajuan Surat</a></li>
                    <li><a href="{{ route('pengajuan-surat.check-status') }}" class="text-gray-400 hover:text-yellow-400 transition">🔍 Cek Status Surat</a></li>
                </ul>
                <div class="space-y-2 text-sm">
                    <p class="text-gray-400">
                        <i class="fas fa-map-marker-alt text-yellow-400 mr-2"></i>
                        Pulau Saparua, Maluku Tengah
                    </p>
                    <p class="text-gray-400">
                        <i class="fas fa-phone text-yellow-400 mr-2"></i>
                        <a href="{{ admin_wa_url() }}" class="hover:text-yellow-400 transition">{{ admin_wa_number() }}</a>
                    </p>
                    <p class="text-gray-400">
                        <i class="fas fa-envelope text-yellow-400 mr-2"></i>
                        info@desaharia.id
                    </p>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Desa Wisata Haria. All rights reserved.</p>
        </div>
    </div>
</footer>
