<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sambutan Pemimpin Negeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.leader-greetings.update', $leaderGreeting) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="leader_name" class="block text-gray-700 text-sm font-bold mb-2">
                                Nama Pemimpin <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="leader_name" 
                                   id="leader_name" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_name') border-red-500 @enderror"
                                   value="{{ old('leader_name', $leaderGreeting->leader_name) }}"
                                   required>
                            @error('leader_name')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="leader_position" class="block text-gray-700 text-sm font-bold mb-2">
                                Jabatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="leader_position" 
                                   id="leader_position" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_position') border-red-500 @enderror"
                                   value="{{ old('leader_position', $leaderGreeting->leader_position) }}"
                                   placeholder="Contoh: Kepala Negeri Haria"
                                   required>
                            @error('leader_position')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="greeting_text" class="block text-gray-700 text-sm font-bold mb-2">
                                Kata Sambutan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="greeting_text" 
                                      id="greeting_text" 
                                      rows="6" 
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('greeting_text') border-red-500 @enderror"
                                      required>{{ old('greeting_text', $leaderGreeting->greeting_text) }}</textarea>
                            @error('greeting_text')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="leader_photo" class="block text-gray-700 text-sm font-bold mb-2">
                                Foto Pemimpin
                            </label>
                            
                            @if($leaderGreeting->leader_photo)
                                <div class="mb-3">
                                    <img src="{{ Storage::url($leaderGreeting->leader_photo) }}" alt="{{ $leaderGreeting->leader_name }}" class="h-32 w-32 object-cover rounded-lg">
                                    <p class="text-sm text-gray-600 mt-1">Foto saat ini</p>
                                </div>
                            @endif
                            
                            <input type="file" 
                                   name="leader_photo" 
                                   id="leader_photo" 
                                   accept="image/*"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_photo') border-red-500 @enderror">
                            <p class="text-gray-600 text-xs italic mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</p>
                            @error('leader_photo')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_active" 
                                       value="1" 
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       {{ old('is_active', $leaderGreeting->is_active) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">Aktifkan sambutan ini</span>
                            </label>
                            <p class="text-gray-600 text-xs italic mt-1">Hanya satu sambutan yang dapat aktif dalam satu waktu.</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <a href="{{ route('admin.leader-greetings.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Kembali
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
