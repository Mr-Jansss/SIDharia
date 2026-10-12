<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl leading-tight">
            {{ __('Detail Pengajuan Surat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-4xl">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-8">
                    <!-- Status Badge -->
                    <div class="mb-6">
                        @if($pengajuan->status == 'pending')
                            <span class="inline-flex bg-yellow-100 px-4 py-2 rounded-full font-semibold text-yellow-800 text-sm">
                                Menunggu Proses
                            </span>
                        @elseif($pengajuan->status == 'diproses')
                            <span class="inline-flex bg-blue-100 px-4 py-2 rounded-full font-semibold text-blue-800 text-sm">
                                Sedang Diproses
                            </span>
                        @elseif($pengajuan->status == 'selesai')
                            <span class="inline-flex bg-green-100 px-4 py-2 rounded-full font-semibold text-green-800 text-sm">
                                Selesai
                            </span>
                        @else
                            <span class="inline-flex bg-red-100 px-4 py-2 rounded-full font-semibold text-red-800 text-sm">
                                Ditolak
                            </span>
                        @endif
                    </div>

                    <!-- Data Pengajuan -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="mb-4 pb-2 border-b font-semibold text-gray-900 text-lg">Data Pemohon</h3>
                            
                            <div class="gap-6 grid grid-cols-1 md:grid-cols-2">
                                <div>
                                    <label class="block mb-1 font-medium text-gray-600 text-sm">NIK</label>
                                    <p class="text-gray-900">{{ $pengajuan->nik }}</p>
                                </div>

                                <div>
                                    <label class="block mb-1 font-medium text-gray-600 text-sm">Nama Lengkap</label>
                                    <p class="text-gray-900">{{ $pengajuan->nama }}</p>
                                </div>

                                <div>
                                    <label class="block mb-1 font-medium text-gray-600 text-sm">Nomor WhatsApp</label>
                                    <p class="text-gray-900">{{ $pengajuan->nomor_wa }}</p>
                                </div>

                                <div>
                                    <label class="block mb-1 font-medium text-gray-600 text-sm">Tanggal Pengajuan</label>
                                    <p class="text-gray-900">{{ $pengajuan->created_at->format('d M Y, H:i') }} WIT</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="mb-4 pb-2 border-b font-semibold text-gray-900 text-lg">Detail Pengajuan</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block mb-1 font-medium text-gray-600 text-sm">Jenis Surat</label>
                                    <p class="text-gray-900">{{ $pengajuan->jenis_surat }}</p>
                                </div>

                                <div>
                                    <label class="block mb-1 font-medium text-gray-600 text-sm">Keperluan</label>
                                    <p class="text-gray-900">{{ $pengajuan->keperluan }}</p>
                                </div>
                            </div>
                        </div>

                        @if($pengajuan->catatan_admin)
                            <div>
                                <h3 class="mb-4 pb-2 border-b font-semibold text-gray-900 text-lg">Catatan Admin</h3>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-gray-900">{{ $pengajuan->catatan_admin }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-8">
                        <a 
                            href="{{ route('admin.pengajuan-surat.edit', $pengajuan->id) }}" 
                            class="flex-1 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold text-white text-center transition"
                        >
                            Edit Status & Catatan
                        </a>
                        <a 
                            href="{{ route('admin.pengajuan-surat.index') }}" 
                            class="flex-1 bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold text-gray-700 text-center transition"
                        >
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
