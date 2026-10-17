# Fitur Sambutan Pemimpin Negeri

## Deskripsi
Fitur ini menampilkan sambutan dari pemimpin negeri (Kepala Negeri Haria) di halaman beranda, tepat setelah section statistik (Potensi Wisata, Produk UMKM, Fasilitas Umum, Perangkat Desa).

## Desain
- **Desain kotak sederhana** dengan layout yang bersih dan profesional
- **Grid 2 kolom** (responsive):
  - Kolom kiri: Foto pemimpin dengan background primary color
  - Kolom kanan: Nama, jabatan, dan kata sambutan
- **Elemen visual**:
  - Icon quote marks untuk memberikan kesan quote/sambutan
  - Border dan shadow untuk kesan kotak yang tegas
  - Responsive design untuk mobile dan desktop

## Fitur
1. **Database Terintegrasi**:
   - Semua data sambutan disimpan di database
   - Dapat dikelola melalui admin panel
   - Support multiple sambutan (hanya 1 yang aktif)

2. **CRUD Admin**:
   - Create: Tambah sambutan baru
   - Read: Lihat daftar sambutan
   - Update: Edit sambutan yang ada
   - Delete: Hapus sambutan

3. **Field Database**:
   - `leader_name`: Nama pemimpin
   - `leader_position`: Jabatan (contoh: Kepala Negeri Haria)
   - `greeting_text`: Kata sambutan (text area)
   - `leader_photo`: Foto pemimpin (optional)
   - `is_active`: Status aktif/nonaktif (hanya 1 yang bisa aktif)

## Cara Menggunakan

### Admin Panel
1. Login ke admin panel
2. Klik menu **"Sambutan"** di navigasi
3. Klik **"Tambah Sambutan"**
4. Isi form:
   - Nama Pemimpin
   - Jabatan
   - Kata Sambutan
   - Upload foto (optional)
   - Centang "Aktifkan sambutan ini"
5. Klik **"Simpan"**

### Edit Sambutan
1. Dari halaman daftar sambutan
2. Klik **"Edit"** pada sambutan yang ingin diubah
3. Update data yang diperlukan
4. Klik **"Update"**

### Mengganti Sambutan Aktif
- Cukup centang "Aktifkan sambutan ini" pada sambutan yang baru
- Sistem otomatis akan menonaktifkan sambutan lama

## URL Admin
- Daftar: `/admin/leader-greetings`
- Tambah: `/admin/leader-greetings/create`
- Edit: `/admin/leader-greetings/{id}/edit`

## Tampilan Public
Sambutan akan ditampilkan di halaman beranda (`/`) setelah section statistik, sebelum section Potensi Wisata Unggulan.

## Database
- **Table**: `leader_greetings`
- **Model**: `App\Models\LeaderGreeting`
- **Controller**: `App\Http\Controllers\Admin\LeaderGreetingController`

## Seeder
Sudah tersedia seeder untuk data contoh:
```bash
php artisan db:seed --class=LeaderGreetingSeeder
```

## Screenshot Lokasi
```
[ Stats: 4 kotak statistik ]
          ↓
[ Sambutan Pemimpin ]  ← Section baru ini
          ↓
[ Potensi Wisata Unggulan ]
```

## Technical Notes
- Foto disimpan di `storage/app/public/leader-greetings/`
- Maximum foto: 2MB
- Format foto: JPG, JPEG, PNG
- Validation sudah diimplementasikan
- Sistem otomatis menangani multiple active greetings (hanya 1 yang aktif)
