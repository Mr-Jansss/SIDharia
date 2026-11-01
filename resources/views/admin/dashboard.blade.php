<x-app-layout>
    <!-- Page Title Bar -->
    <div class="flex md:flex-row flex-col justify-between items-start md:items-center gap-4 mb-6">
        <div>
            <h1 class="font-bold text-gray-800 text-2xl uppercase">SISTEM INFORMASI NEGERI HARIA</h1>
            <p class="text-gray-500 text-sm uppercase tracking-wide">Sistem Pengelolaan Data & Layanan Masyarakat</p>
        </div>
        <div class="bg-white shadow-sm px-4 py-2 rounded text-gray-600 text-sm">
            <i class="mr-2 text-purple-600 fas fa-clock"></i>
            Terakhir login: <span class="font-semibold">{{ now()->format('d M Y') }} | {{ now()->format('H:i') }} WIT</span>
        </div>
    </div>

    <!-- Main Dashboard Card -->
    <div class="bg-white shadow-lg rounded-3xl overflow-hidden">
        <!-- Card Header Bar -->
        <div class="flex md:flex-row flex-col justify-between items-center gap-4 bg-gray-50 px-6 py-4 border-b">
            <!-- Left: Date & Greeting -->
            <div class="flex items-center gap-4">
                <div class="flex justify-center items-center bg-gradient-to-br from-yellow-400 to-orange-400 rounded-2xl w-14 h-14 text-white text-2xl">
                    <i class="fas fa-cloud-sun"></i>
                </div>
                <div>
                    <p class="font-bold text-gray-800 text-lg">{{ now()->format('d F Y') }}</p>
                    <p class="text-gray-600 text-sm">
                        @php
                            $hour = now()->format('H');
                            if ($hour >= 5 && $hour < 11) {
                                echo 'Selamat Pagi';
                            } elseif ($hour >= 11 && $hour < 15) {
                                echo 'Selamat Siang';
                            } elseif ($hour >= 15 && $hour < 18) {
                                echo 'Selamat Sore';
                            } else {
                                echo 'Selamat Malam';
                            }
                        @endphp
                    </p>
                </div>
            </div>
            
            <!-- Right: Dashboard Title & Clock -->
            <div class="text-right">
                <p class="font-bold text-gray-800 text-lg uppercase tracking-wide">DASHBOARD</p>
                <div class="flex justify-end items-center gap-2 text-gray-600 text-sm">
                    <i class="fas fa-clock"></i>
                    <span id="realtime-clock">{{ now()->format('H:i:s') }} WIT</span>
                </div>
            </div>
        </div>

        <!-- Card Content -->
        <div class="p-8">
            <!-- Welcome Message -->
            <div class="mb-6">
                <h2 class="mb-3 font-bold text-3xl">
                    Hi, <span style="color: #2EC4D6;">{{ Auth::user()->name }}</span>
                </h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Selamat datang kembali di halaman Dashboard 
                    <span class="font-bold uppercase">SISTEM INFORMASI NEGERI HARIA</span>
                </p>
            </div>

            <!-- Status Badge -->
            <div class="flex items-center gap-3 bg-green-50 mb-6 px-4 py-3 border-green-200 border-l-4 rounded-lg">
                <div class="flex justify-center items-center bg-green-500 rounded-full w-6 h-6 text-white">
                    <i class="text-xs fas fa-check"></i>
                </div>
                <p class="text-gray-700">
                    Saat ini, <strong>Sistem Aktif dan Berjalan Normal</strong>
                </p>
            </div>

            <!-- Info Alert -->
            <div class="bg-cyan-50 mb-6 px-6 py-5 border border-cyan-200 rounded-xl">
                <div class="flex items-start gap-3">
                    <div class="flex flex-shrink-0 justify-center items-center bg-cyan-500 rounded-full w-8 h-8 text-white">
                        <i class="text-sm fas fa-info"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="mb-2 font-bold text-gray-800">ℹ INFORMASI :</h3>
                        <p class="mb-3 text-gray-700 leading-relaxed">
                            Sistem ini digunakan untuk mengelola seluruh data dan layanan digital Negeri Haria. 
                            Pastikan semua data diperbarui secara berkala untuk kenyamanan masyarakat.
                        </p>
                        <div class="flex flex-wrap gap-4 text-sm">
                            <span class="flex items-center gap-2">
                                <i class="text-purple-600 fas fa-calendar"></i>
                                <span class="font-semibold">{{ now()->format('d F Y') }}</span>
                            </span>
                            <span class="flex items-center gap-2">
                                <i class="text-purple-600 fas fa-clock"></i>
                                <span class="font-semibold">{{ now()->format('H:i') }} WIT</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Button -->
            <div>
                <a href="{{ route('admin.settings.index') }}" 
                   class="inline-flex items-center gap-3 bg-navy hover:bg-opacity-90 px-8 py-4 rounded-full font-bold text-white transition"
                   style="background-color: #0F1A3D;">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan Website</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-8">
        <!-- Profil Negeri -->
        <div class="bg-white shadow-lg hover:shadow-xl p-6 rounded-2xl transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex justify-center items-center bg-blue-100 rounded-xl w-14 h-14 text-blue-600">
                    <i class="text-2xl fas fa-info-circle"></i>
                </div>
                <span class="bg-blue-50 px-3 py-1 rounded-full font-semibold text-blue-600 text-xs">PROFIL</span>
            </div>
            <p class="mb-1 text-gray-600 text-sm">Profil Negeri</p>
            <p class="font-bold text-gray-800 text-3xl">{{ \App\Models\VillageProfile::count() }}</p>
        </div>

        <!-- Potensi Wisata -->
        <div class="bg-white shadow-lg hover:shadow-xl p-6 rounded-2xl transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex justify-center items-center bg-yellow-100 rounded-xl w-14 h-14 text-yellow-600">
                    <i class="text-2xl fas fa-map-marked-alt"></i>
                </div>
                <span class="bg-yellow-50 px-3 py-1 rounded-full font-semibold text-yellow-600 text-xs">POTENSI</span>
            </div>
            <p class="mb-1 text-gray-600 text-sm">Potensi Wisata</p>
            <p class="font-bold text-gray-800 text-3xl">{{ \App\Models\Potential::count() }}</p>
        </div>

        <!-- Produk UMKM -->
        <div class="bg-white shadow-lg hover:shadow-xl p-6 rounded-2xl transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex justify-center items-center bg-green-100 rounded-xl w-14 h-14 text-green-600">
                    <i class="text-2xl fas fa-store"></i>
                </div>
                <span class="bg-green-50 px-3 py-1 rounded-full font-semibold text-green-600 text-xs">UMKM</span>
            </div>
            <p class="mb-1 text-gray-600 text-sm">Produk UMKM</p>
            <p class="font-bold text-gray-800 text-3xl">{{ \App\Models\Product::count() }}</p>
        </div>

        <!-- Pengaduan -->
        <div class="bg-white shadow-lg hover:shadow-xl p-6 rounded-2xl transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex justify-center items-center bg-red-100 rounded-xl w-14 h-14 text-red-600">
                    <i class="text-2xl fas fa-bullhorn"></i>
                </div>
                <span class="bg-red-50 px-3 py-1 rounded-full font-semibold text-red-600 text-xs">PENDING</span>
            </div>
            <p class="mb-1 text-gray-600 text-sm">Pengaduan Pending</p>
            <p class="font-bold text-gray-800 text-3xl">{{ \App\Models\Pengaduan::where('status', 'pending')->count() }}</p>
        </div>
    </div>

    <!-- Realtime Clock Script -->
    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('realtime-clock').textContent = `${hours}:${minutes}:${seconds} WIT`;
        }
        
        // Update clock every second
        setInterval(updateClock, 1000);
        updateClock(); // Initial call
    </script>
</x-app-layout>
