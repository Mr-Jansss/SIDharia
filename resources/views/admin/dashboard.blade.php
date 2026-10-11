<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Admin Dashboard - Desa Haria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <!-- Welcome Card -->
            <div class="bg-white shadow-sm mb-6 sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-2 font-bold text-2xl">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">Anda login sebagai Administrator Desa Haria</p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mb-6">
                <!-- Profil Desa -->
                <div class="bg-blue-500 shadow-sm sm:rounded-lg overflow-hidden">
                    <div class="p-6 text-white">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-blue-100 text-sm">Profil Desa</p>
                                <p class="font-bold text-3xl">{{ \App\Models\VillageProfile::count() }}</p>
                            </div>
                            <svg class="w-12 h-12 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Potensi Wisata -->
                <div class="bg-yellow-500 shadow-sm sm:rounded-lg overflow-hidden">
                    <div class="p-6 text-white">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-yellow-100 text-sm">Potensi Wisata</p>
                                <p class="font-bold text-3xl">{{ \App\Models\Potential::count() }}</p>
                            </div>
                            <svg class="w-12 h-12 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Produk UMKM -->
                <div class="bg-green-500 shadow-sm sm:rounded-lg overflow-hidden">
                    <div class="p-6 text-white">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-green-100 text-sm">Produk UMKM</p>
                                <p class="font-bold text-3xl">{{ \App\Models\Product::count() }}</p>
                            </div>
                            <svg class="w-12 h-12 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Pengaduan -->
                <div class="bg-red-500 shadow-sm sm:rounded-lg overflow-hidden">
                    <div class="p-6 text-white">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-red-100 text-sm">Pengaduan Pending</p>
                                <p class="font-bold text-3xl">{{ \App\Models\Complaint::where('status', 'pending')->count() }}</p>
                            </div>
                            <svg class="w-12 h-12 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <h4 class="mb-4 font-bold text-gray-900 text-lg">Quick Actions</h4>
                    <div class="gap-4 grid grid-cols-1 md:grid-cols-3">
                        <a href="{{ route('admin.village-profiles.index') }}" class="block hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition">
                            <h5 class="font-semibold text-gray-900">Kelola Profil Desa</h5>
                            <p class="text-gray-600 text-sm">Edit sejarah, visi, dan misi desa</p>
                        </a>
                        <a href="{{ route('admin.potentials.index') }}" class="block hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition">
                            <h5 class="font-semibold text-gray-900">Kelola Potensi Wisata</h5>
                            <p class="text-gray-600 text-sm">Tambah dan edit destinasi wisata</p>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="block hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition">
                            <h5 class="font-semibold text-gray-900">Kelola Produk UMKM</h5>
                            <p class="text-gray-600 text-sm">Tambah produk dan hubungkan WhatsApp</p>
                        </a>
                        <a href="{{ route('admin.officials.index') }}" class="block hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition">
                            <h5 class="font-semibold text-gray-900">Kelola Perangkat Desa</h5>
                            <p class="text-gray-600 text-sm">Atur struktur pemerintahan desa</p>
                        </a>
                        <a href="{{ route('admin.posts.index') }}" class="block hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition">
                            <h5 class="font-semibold text-gray-900">Kelola Berita & Kegiatan</h5>
                            <p class="text-gray-600 text-sm">Publikasikan informasi terbaru desa</p>
                        </a>
                        <a href="{{ route('admin.facilities.index') }}" class="block hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition">
                            <h5 class="font-semibold text-gray-900">Kelola Fasilitas Umum</h5>
                            <p class="text-gray-600 text-sm">Tambah fasilitas dengan lokasi GPS</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
