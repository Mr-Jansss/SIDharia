<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Edit Profil Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.village-profiles.update', $villageProfile) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Tabs Navigation -->
                        <div class="mb-6 border-gray-200 border-b">
                            <nav class="flex space-x-8 -mb-px">
                                <button type="button" onclick="switchTab('overview')" id="tab-overview" class="px-1 py-4 border-blue-500 border-b-2 font-medium text-blue-600 text-sm tab-button active">
                                    Profil Desa
                                </button>
                                <button type="button" onclick="switchTab('sejarah')" id="tab-sejarah" class="px-1 py-4 border-transparent hover:border-gray-300 border-b-2 font-medium text-gray-500 hover:text-gray-700 text-sm tab-button">
                                    Sejarah
                                </button>
                                <button type="button" onclick="switchTab('visi')" id="tab-visi" class="px-1 py-4 border-transparent hover:border-gray-300 border-b-2 font-medium text-gray-500 hover:text-gray-700 text-sm tab-button">
                                    Visi & Misi
                                </button>
                                <button type="button" onclick="switchTab('pemerintahan')" id="tab-pemerintahan" class="px-1 py-4 border-transparent hover:border-gray-300 border-b-2 font-medium text-gray-500 hover:text-gray-700 text-sm tab-button">
                                    Pemerintahan
                                </button>
                                <button type="button" onclick="switchTab('struktur')" id="tab-struktur" class="px-1 py-4 border-transparent hover:border-gray-300 border-b-2 font-medium text-gray-500 hover:text-gray-700 text-sm tab-button">
                                    Struktur Organisasi
                                </button>
                            </nav>
                        </div>

                        <!-- Tab: Profil Desa -->
                        <div id="content-overview" class="space-y-4 tab-content">
                            <div>
                                <label for="village_name" class="block font-medium text-gray-700 text-sm">Nama Desa</label>
                                <input type="text" name="village_name" id="village_name" value="{{ old('village_name', $villageProfile->village_name) }}"
                                    class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                @error('village_name')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="profile_overview" class="block font-medium text-gray-700 text-sm">Deskripsi Profil Desa</label>
                                <textarea name="profile_overview" id="profile_overview" rows="6"
                                    class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">{{ old('profile_overview', $villageProfile->profile_overview) }}</textarea>
                                @error('profile_overview')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="gap-4 grid grid-cols-2">
                                <div>
                                    <label for="address" class="block font-medium text-gray-700 text-sm">Alamat</label>
                                    <input type="text" name="address" id="address" value="{{ old('address', $villageProfile->address) }}"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('address')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block font-medium text-gray-700 text-sm">Telepon</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone', $villageProfile->phone) }}"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('phone')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block font-medium text-gray-700 text-sm">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $villageProfile->email) }}"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('email')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="website" class="block font-medium text-gray-700 text-sm">Website</label>
                                    <input type="url" name="website" id="website" value="{{ old('website', $villageProfile->website) }}"
                                        class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">
                                    @error('website')
                                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                @if($villageProfile->logo)
                                <label class="block mb-2 font-medium text-gray-700 text-sm">Logo Saat Ini</label>
                                <img src="{{ Storage::url($villageProfile->logo) }}" alt="Logo" class="mb-4 h-32">
                                @endif
                                <label for="logo" class="block font-medium text-gray-700 text-sm">Logo Desa (Opsional)</label>
                                <input type="file" name="logo" id="logo" accept="image/*"
                                    class="block mt-1 w-full">
                                <p class="mt-1 text-gray-500 text-xs">Format: JPG, PNG, GIF. Max: 2MB</p>
                                @error('logo')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tab: Sejarah -->
                        <div id="content-sejarah" class="hidden space-y-4 tab-content">
                            <div>
                                <label for="sejarah" class="block font-medium text-gray-700 text-sm">Sejarah Desa</label>
                                <textarea name="sejarah" id="sejarah" rows="15"
                                    class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">{{ old('sejarah', $villageProfile->sejarah) }}</textarea>
                                @error('sejarah')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tab: Visi & Misi -->
                        <div id="content-visi" class="hidden space-y-4 tab-content">
                            <div>
                                <label for="visi" class="block font-medium text-gray-700 text-sm">Visi</label>
                                <textarea name="visi" id="visi" rows="6"
                                    class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">{{ old('visi', $villageProfile->visi) }}</textarea>
                                @error('visi')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="misi" class="block font-medium text-gray-700 text-sm">Misi</label>
                                <textarea name="misi" id="misi" rows="10"
                                    class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">{{ old('misi', $villageProfile->misi) }}</textarea>
                                <p class="mt-1 text-gray-500 text-xs">Pisahkan setiap poin misi dengan baris baru</p>
                                @error('misi')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tab: Pemerintahan -->
                        <div id="content-pemerintahan" class="hidden space-y-4 tab-content">
                            <div>
                                <label for="pemerintahan" class="block font-medium text-gray-700 text-sm">Pemerintahan Desa</label>
                                <textarea name="pemerintahan" id="pemerintahan" rows="15"
                                    class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">{{ old('pemerintahan', $villageProfile->pemerintahan) }}</textarea>
                                <p class="mt-1 text-gray-500 text-xs">Jelaskan sistem pemerintahan desa, tugas dan wewenang</p>
                                @error('pemerintahan')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tab: Struktur Organisasi -->
                        <div id="content-struktur" class="hidden space-y-4 tab-content">
                            <div>
                                <label for="struktur_organisasi" class="block font-medium text-gray-700 text-sm">Struktur Organisasi</label>
                                <textarea name="struktur_organisasi" id="struktur_organisasi" rows="15"
                                    class="block shadow-sm mt-1 border-gray-300 focus:border-indigo-500 rounded-md focus:ring-indigo-500 w-full">{{ old('struktur_organisasi', $villageProfile->struktur_organisasi) }}</textarea>
                                <p class="mt-1 text-gray-500 text-xs">Jelaskan struktur organisasi pemerintahan desa</p>
                                @error('struktur_organisasi')
                                    <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mt-6 pt-6 border-t">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded font-bold text-white">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.village-profiles.index') }}" class="bg-gray-500 hover:bg-gray-700 px-4 py-2 rounded font-bold text-white">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            // Remove active state from all buttons
            document.querySelectorAll('.tab-button').forEach(el => {
                el.classList.remove('border-blue-500', 'text-blue-600');
                el.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Show selected tab content
            document.getElementById('content-' + tab).classList.remove('hidden');
            // Add active state to selected button
            const button = document.getElementById('tab-' + tab);
            button.classList.remove('border-transparent', 'text-gray-500');
            button.classList.add('border-blue-500', 'text-blue-600');
        }

        // Check if there's a tab parameter in URL
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            
            if (tabParam && ['overview', 'sejarah', 'visi', 'pemerintahan', 'struktur'].includes(tabParam)) {
                switchTab(tabParam);
            } else {
                // Default to overview
                switchTab('overview');
            }
        });
    </script>
</x-app-layout>
