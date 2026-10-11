<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-gray-800 text-xl leading-tight">
                {{ __('Edit Profil Desa') }}
            </h2>
            <a href="{{ route('admin.village-profiles.index') }}" class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded font-bold text-white">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.village-profiles.update', $villageProfile->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Sejarah -->
                        <div class="mb-6">
                            <label for="history" class="block mb-2 font-medium text-gray-700 text-sm">
                                <i class="mr-1 text-blue-600 fas fa-book"></i> Sejarah Desa
                            </label>
                            <textarea name="history" id="history" rows="8" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('history') border-red-500 @enderror"
                                placeholder="Masukkan sejarah Desa Haria...">{{ old('history', $villageProfile->history) }}</textarea>
                            @error('history')
                                <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-gray-500 text-xs">Ceritakan sejarah dan latar belakang Desa Haria</p>
                        </div>

                        <!-- Visi -->
                        <div class="mb-6">
                            <label for="vision" class="block mb-2 font-medium text-gray-700 text-sm">
                                <i class="mr-1 text-yellow-600 fas fa-eye"></i> Visi
                            </label>
                            <textarea name="vision" id="vision" rows="4" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('vision') border-red-500 @enderror"
                                placeholder="Masukkan visi Desa Haria...">{{ old('vision', $villageProfile->vision) }}</textarea>
                            @error('vision')
                                <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-gray-500 text-xs">Visi jangka panjang Desa Haria</p>
                        </div>

                        <!-- Misi -->
                        <div class="mb-6">
                            <label for="mission" class="block mb-2 font-medium text-gray-700 text-sm">
                                <i class="mr-1 text-green-600 fas fa-bullseye"></i> Misi
                            </label>
                            <textarea name="mission" id="mission" rows="10" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('mission') border-red-500 @enderror"
                                placeholder="Masukkan misi Desa Haria (pisahkan tiap poin dengan enter)...">{{ old('mission', $villageProfile->mission) }}</textarea>
                            @error('mission')
                                <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                            @enderror>
                            <p class="mt-1 text-gray-500 text-xs">Langkah-langkah untuk mencapai visi (pisahkan tiap poin dengan enter)</p>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end items-center space-x-3">
                            <a href="{{ route('admin.village-profiles.index') }}" class="bg-gray-300 hover:bg-gray-400 px-6 py-2 rounded font-bold text-gray-800">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded font-bold text-white">
                                <i class="mr-2 fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
