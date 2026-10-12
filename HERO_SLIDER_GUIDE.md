# Hero Slider - Panduan Penggunaan

## 📋 Deskripsi
Fitur Hero Slider memungkinkan Anda menampilkan banner slider yang menarik di homepage dengan gambar yang dapat berganti secara otomatis atau manual.

## ✨ Fitur
- ✅ Multiple slides dengan gambar yang dapat diganti
- ✅ Auto-slide setiap 5 detik
- ✅ Navigasi manual dengan tombol prev/next
- ✅ Indicator dots untuk navigasi langsung
- ✅ Title dan description untuk setiap slide (opsional)
- ✅ Pengaturan urutan tampilan
- ✅ Toggle aktif/nonaktif per slide
- ✅ Responsive design
- ✅ Animasi fade-in yang smooth

## 🎯 Cara Menggunakan

### 1. Akses Halaman Admin
- Login ke admin panel: http://localhost:8000/login
- Klik menu **"Hero Slider"** di navigasi

### 2. Menambah Slider Baru
1. Klik tombol **"Tambah Slider"**
2. Isi form:
   - **Title** (Opsional): Judul yang akan ditampilkan di slide
   - **Deskripsi** (Opsional): Deskripsi singkat
   - **Gambar** (Wajib): Upload gambar (JPG, PNG, GIF, max 2MB)
     - Ukuran rekomendasi: **1920x600px**
   - **Urutan**: Angka untuk menentukan urutan tampilan (0 = pertama)
   - **Status**: Centang untuk mengaktifkan slider
3. Klik **"Simpan"**

### 3. Mengedit Slider
1. Pada daftar slider, klik **"Edit"**
2. Ubah data yang diperlukan
3. Gambar bisa diganti atau tetap menggunakan gambar lama
4. Klik **"Update"**

### 4. Menghapus Slider
1. Pada daftar slider, klik **"Hapus"**
2. Konfirmasi penghapusan

## 📁 Struktur File

### Database
- **Migration**: `database/migrations/2026_10_11_185845_create_hero_sliders_table.php`
- **Model**: `app/Models/HeroSlider.php`
- **Seeder**: `database/seeders/HeroSliderSeeder.php`

### Controller
- **Admin Controller**: `app/Http/Controllers/Admin/HeroSliderController.php`
- **Public Controller**: `app/Http/Controllers/PublicController.php` (updated)

### Views
- **Admin Index**: `resources/views/admin/hero-sliders/index.blade.php`
- **Admin Create**: `resources/views/admin/hero-sliders/create.blade.php`
- **Admin Edit**: `resources/views/admin/hero-sliders/edit.blade.php`
- **Public Homepage**: `resources/views/public/index.blade.php` (updated)
- **Layout**: `resources/views/layouts/public.blade.php` (updated with slider CSS & JS)

### Routes
```php
Route::resource('hero-sliders', \App\Http\Controllers\Admin\HeroSliderController::class);
```

## 🎨 Kustomisasi

### Mengubah Durasi Auto-Slide
Edit di `resources/views/layouts/public.blade.php`:
```javascript
slideInterval = setInterval(autoSlide, 5000); // 5000 = 5 detik
```

### Mengubah Tinggi Slider
Edit di `resources/views/layouts/public.blade.php`:
```css
.hero-slider {
    height: 600px; /* Ubah sesuai keinginan */
}
```

### Menonaktifkan Auto-Slide
Hapus atau comment baris berikut di `resources/views/layouts/public.blade.php`:
```javascript
// slideInterval = setInterval(autoSlide, 5000);
```

## 💡 Tips
1. **Ukuran Gambar**: Gunakan gambar dengan rasio 16:9 atau 3:1 untuk hasil terbaik
2. **Optimasi**: Kompres gambar sebelum upload untuk performa lebih baik
3. **Jumlah Slider**: Disarankan 3-5 slider untuk pengalaman user yang optimal
4. **Title & Deskripsi**: Tetap singkat dan to the point (1-2 kalimat)
5. **Urutan**: Gunakan kelipatan 10 (10, 20, 30) untuk memudahkan penyisipan slider baru

## 🔧 Data Dummy
Saat ini sudah tersedia 4 slider dummy dengan gambar dari Unsplash:
1. Selamat Datang di Desa Wisata Haria
2. Keindahan Alam yang Memukau
3. Budaya dan Tradisi Lokal
4. Produk UMKM Unggulan

Anda bisa mengedit atau menghapus slider ini dan mengganti dengan gambar lokal Anda sendiri.

## 🌐 Akses
- **Homepage dengan Slider**: http://localhost:8000
- **Admin Hero Slider**: http://localhost:8000/admin/hero-sliders

## 📝 Catatan
- Jika tidak ada slider yang aktif, homepage akan menampilkan hero section default (statis)
- Slider hanya ditampilkan di homepage
- Gambar disimpan di `storage/app/public/hero-sliders/`
- Pastikan symbolic link sudah dibuat: `php artisan storage:link`
