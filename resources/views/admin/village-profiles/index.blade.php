<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">
                {{ __('Kelola Profil Desa') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            @if (session('success'))
                <div class="relative bg-green-100 mb-4 px-4 py-3 border border-green-400 rounded text-green-700" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="mb-6">
                        <p class="mb-4 text-gray-600">Edit informasi profil Desa Haria (Sejarah, Visi, dan Misi)</p>
                        <a href="{{ route('admin.village-profiles.edit', $profile->id) }}" class="inline-block bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                            <i class="mr-2 fas fa-edit"></i> Edit Profil Desa
                        </a>
                    </div>

                    <!-- Preview Sections -->
                    <div class="space-y-6 mt-8">
                        <!-- Sejarah -->
                        <div class="bg-gray-50 p-6 border rounded-lg">
                            <h3 class="flex items-center mb-3 font-bold text-gray-800 text-lg">
                                <i class="mr-2 text-blue-600 fas fa-book"></i>
                                Sejarah Desa
                            </h3>
                            <div class="text-gray-700 whitespace-pre-line">
                                {{ $profile->history ?: 'Belum diisi' }}
                            </div>
                        </div>

                        <!-- Visi -->
                        <div class="bg-gray-50 p-6 border rounded-lg">
                            <h3 class="flex items-center mb-3 font-bold text-gray-800 text-lg">
                                <i class="mr-2 text-yellow-600 fas fa-eye"></i>
                                Visi
                            </h3>
                            <div class="text-gray-700">
                                {{ $profile->vision ?: 'Belum diisi' }}
                            </div>
                        </div>

                        <!-- Misi -->
                        <div class="bg-gray-50 p-6 border rounded-lg">
                            <h3 class="flex items-center mb-3 font-bold text-gray-800 text-lg">
                                <i class="mr-2 text-green-600 fas fa-bullseye"></i>
                                Misi
                            </h3>
                            <div class="text-gray-700 whitespace-pre-line">
                                {{ $profile->mission ?: 'Belum diisi' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
