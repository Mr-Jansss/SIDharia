<footer class="bg-gray-900 py-12 text-white">
    <div class="mx-auto px-4 container">
        <div class="gap-8 grid grid-cols-1 md:grid-cols-3">
            <!-- Tentang Desa -->
            <div>
                <h3 class="mb-4 font-bold text-yellow-400 text-xl">Negeri Haria</h3>
                <p class="mb-4 text-gray-400 text-sm leading-relaxed">
                    Negeri adat yang terletak di Pulau Saparua, Maluku Tengah, dengan keindahan alam dan kearifan lokal yang mempesona.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="flex justify-center items-center bg-blue-600 hover:bg-blue-700 rounded-full w-10 h-10 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="flex justify-center items-center bg-pink-600 hover:bg-pink-700 rounded-full w-10 h-10 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="flex justify-center items-center bg-red-600 hover:bg-red-700 rounded-full w-10 h-10 transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Menu Cepat -->
            <div>
                <h3 class="mb-4 font-bold text-yellow-400 text-xl">Menu Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-yellow-400 transition">Beranda</a></li>
                    <li><a href="{{ route('profile') }}" class="text-gray-400 hover:text-yellow-400 transition">Profil Negeri</a></li>
                    <li><a href="{{ route('potentials') }}" class="text-gray-400 hover:text-yellow-400 transition">Potensi Negeri</a></li>
                    <li><a href="{{ route('products') }}" class="text-gray-400 hover:text-yellow-400 transition">Produk UMKM</a></li>
                    <li><a href="{{ route('posts') }}" class="text-gray-400 hover:text-yellow-400 transition">Berita & Kegiatan</a></li>
                    <li><a href="{{ route('statistics') }}" class="text-gray-400 hover:text-yellow-400 transition">Statistik Negeri</a></li>
                </ul>
            </div>

            <!-- Layanan & Kontak -->
            <div>
                <h3 class="mb-4 font-bold text-yellow-400 text-xl">Layanan & Kontak</h3>
                <ul class="space-y-2 mb-4 text-sm">
                    <li><a href="{{ route('pengajuan-surat.create') }}" class="text-gray-400 hover:text-yellow-400 transition">📄 Pengajuan Surat</a></li>
                    <li><a href="{{ route('pengajuan-surat.check-status') }}" class="text-gray-400 hover:text-yellow-400 transition">🔍 Cek Status Surat</a></li>
                </ul>
                <div class="space-y-2 text-sm">
                    <p class="text-gray-400">
                        <i class="mr-2 text-yellow-400 fas fa-map-marker-alt"></i>
                        Pulau Saparua, Maluku Tengah
                    </p>
                    <p class="text-gray-400">
                        <i class="mr-2 text-yellow-400 fas fa-phone"></i>
                        <a href="{{ admin_wa_url() }}" class="hover:text-yellow-400 transition">{{ admin_wa_number() }}</a>
                    </p>
                    <p class="text-gray-400">
                        <i class="mr-2 text-yellow-400 fas fa-envelope"></i>
                        info@desaharia.id
                    </p>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-8 pt-8 border-gray-800 border-t text-gray-500 text-sm text-center">
            <p>&copy; {{ date('Y') }} Negeri Haria. All rights reserved.</p>
        </div>
    </div>
</footer>
