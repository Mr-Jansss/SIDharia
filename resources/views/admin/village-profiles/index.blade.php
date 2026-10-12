<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Profil Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            @if (session('success'))
                <div class="bg-green-100 mb-4 px-4 py-3 border border-green-400 rounded text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="mb-8">
                        <h3 class="mb-4 font-semibold text-gray-900 text-lg">Edit Section Profil Desa</h3>
                        <p class="mb-6 text-gray-600">Pilih section yang ingin Anda edit:</p>
                        
                        <div class="gap-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                            <!-- Card 1: Profil Desa -->
                            <a href="{{ route('admin.village-profiles.edit', $profile) }}?tab=overview" class="block bg-gradient-to-br from-blue-50 to-blue-100 hover:shadow-lg p-6 border-2 border-blue-200 hover:border-blue-400 rounded-lg transition">
                                <div class="flex items-center mb-3">
                                    <i class="mr-3 text-blue-600 text-3xl fas fa-home"></i>
                                    <h4 class="font-bold text-blue-900 text-lg">Profil Desa</h4>
                                </div>
                                <p class="text-blue-700 text-sm">Edit informasi umum, kontak, dan logo desa</p>
                            </a>

                            <!-- Card 2: Sejarah -->
                            <a href="{{ route('admin.village-profiles.edit', $profile) }}?tab=sejarah" class="block bg-gradient-to-br from-green-50 to-green-100 hover:shadow-lg p-6 border-2 border-green-200 hover:border-green-400 rounded-lg transition">
                                <div class="flex items-center mb-3">
                                    <i class="mr-3 text-green-600 text-3xl fas fa-book"></i>
                                    <h4 class="font-bold text-green-900 text-lg">Sejarah</h4>
                                </div>
                                <p class="text-green-700 text-sm">Edit sejarah dan latar belakang desa</p>
                            </a>

                            <!-- Card 3: Visi & Misi -->
                            <a href="{{ route('admin.village-profiles.edit', $profile) }}?tab=visi" class="block bg-gradient-to-br from-purple-50 to-purple-100 hover:shadow-lg p-6 border-2 border-purple-200 hover:border-purple-400 rounded-lg transition">
                                <div class="flex items-center mb-3">
                                    <i class="mr-3 text-purple-600 text-3xl fas fa-bullseye"></i>
                                    <h4 class="font-bold text-purple-900 text-lg">Visi & Misi</h4>
                                </div>
                                <p class="text-purple-700 text-sm">Edit visi dan misi desa</p>
                            </a>

                            <!-- Card 4: Pemerintahan -->
                            <a href="{{ route('admin.village-profiles.edit', $profile) }}?tab=pemerintahan" class="block bg-gradient-to-br from-orange-50 to-orange-100 hover:shadow-lg p-6 border-2 border-orange-200 hover:border-orange-400 rounded-lg transition">
                                <div class="flex items-center mb-3">
                                    <i class="mr-3 text-orange-600 text-3xl fas fa-landmark"></i>
                                    <h4 class="font-bold text-orange-900 text-lg">Pemerintahan</h4>
                                </div>
                                <p class="text-orange-700 text-sm">Edit informasi sistem pemerintahan desa</p>
                            </a>

                            <!-- Card 5: Struktur Organisasi -->
                            <a href="{{ route('admin.village-profiles.edit', $profile) }}?tab=struktur" class="block bg-gradient-to-br from-red-50 to-red-100 hover:shadow-lg p-6 border-2 border-red-200 hover:border-red-400 rounded-lg transition">
                                <div class="flex items-center mb-3">
                                    <i class="mr-3 text-red-600 text-3xl fas fa-sitemap"></i>
                                    <h4 class="font-bold text-red-900 text-lg">Struktur Organisasi</h4>
                                </div>
                                <p class="text-red-700 text-sm">Edit struktur organisasi pemerintahan</p>
                            </a>

                            <!-- Card 6: Lihat Semua -->
                            <a href="{{ route('admin.village-profiles.edit', $profile) }}" class="block bg-gradient-to-br from-gray-50 to-gray-100 hover:shadow-lg p-6 border-2 border-gray-300 hover:border-gray-400 rounded-lg transition">
                                <div class="flex items-center mb-3">
                                    <i class="mr-3 text-gray-600 text-3xl fas fa-edit"></i>
                                    <h4 class="font-bold text-gray-900 text-lg">Edit Semua</h4>
                                </div>
                                <p class="text-gray-700 text-sm">Edit semua section sekaligus dengan tabs</p>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Preview -->
                    <div class="mt-10 pt-6 border-t">
                        <h3 class="mb-4 font-semibold text-gray-900 text-lg">Quick Preview</h3>
                        <div class="gap-6 grid grid-cols-1 md:grid-cols-2 text-sm">
                            <div>
                                <p class="font-semibold text-gray-700">Nama Desa:</p>
                                <p class="text-gray-900">{{ $profile->village_name ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Alamat:</p>
                                <p class="text-gray-900">{{ $profile->address ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Telepon:</p>
                                <p class="text-gray-900">{{ $profile->phone ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Email:</p>
                                <p class="text-gray-900">{{ $profile->email ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
