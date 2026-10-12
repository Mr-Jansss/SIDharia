# Profil Desa - Fitur Accordion Menu

## ✅ Fitur yang Sudah Dibuat

### 1. Database Structure
Tabel `village_profiles` dengan kolom:
- `village_name` - Nama desa
- `profile_overview` - Deskripsi umum profil desa
- `sejarah` - Sejarah desa
- `visi` - Visi desa
- `misi` - Misi desa (tiap baris = 1 poin)
- `pemerintahan` - Informasi pemerintahan desa
- `struktur_organisasi` - Struktur organisasi pemerintahan
- `logo` - Logo desa (optional)
- `address`, `phone`, `email`, `website` - Kontak informasi

### 2. Halaman Public - Accordion Menu
URL: `http://localhost:8000/profil`

**5 Section Accordion:**
1. ✅ **Profil Desa** - Overview desa + kontak info
2. ✅ **Sejarah** - Sejarah lengkap desa
3. ✅ **Visi & Misi** - Visi dan misi desa (misi auto-numbering)
4. ✅ **Pemerintahan** - Informasi sistem pemerintahan
5. ✅ **Struktur Organisasi** - Struktur + daftar perangkat desa dengan foto

**Fitur Accordion:**
- Click untuk expand/collapse
- Icon rotate animation
- Slide down animation
- First section open by default
- Responsive design
- Clean modern UI

### 3. Halaman Admin
URL: `http://localhost:8000/admin/village-profiles`

**Admin Features:**
- ✅ View dengan tabs (5 sections)
- ✅ Edit dengan tabs (5 sections)
- ✅ Upload logo desa
- ✅ Form lengkap untuk semua field
- ✅ Preview data sebelum edit

**Tab Sections:**
1. Profil Desa - Nama, deskripsi, logo, kontak
2. Sejarah - Textarea untuk sejarah
3. Visi & Misi - Textarea untuk visi & misi
4. Pemerintahan - Textarea untuk info pemerintahan
5. Struktur Organisasi - Textarea untuk struktur

### 4. Data Dummy
Sudah diisi dengan data lengkap:
- Nama: Desa Wisata Haria
- Profil overview: 2 paragraf
- Sejarah: 4 paragraf
- Visi: 1 paragraf
- Misi: 6 poin
- Pemerintahan: 3 paragraf
- Struktur Organisasi: 7 poin lengkap dengan BPD
- Kontak lengkap (alamat, phone, email, website)

## 🎨 Cara Menggunakan

### Untuk Admin:
1. Login ke admin: `http://localhost:8000/login`
2. Klik menu **"Profil Desa"**
3. Klik **"Edit Profil Desa"**
4. Pilih tab yang ingin diedit:
   - **Profil Desa**: Edit nama desa, deskripsi, upload logo, kontak
   - **Sejarah**: Edit sejarah desa
   - **Visi & Misi**: Edit visi dan misi (pisahkan misi per baris)
   - **Pemerintahan**: Edit info pemerintahan
   - **Struktur Organisasi**: Edit struktur organisasi
5. Klik **"Simpan Perubahan"**

### Untuk Pengunjung:
1. Buka: `http://localhost:8000/profil`
2. Lihat menu accordion (5 section)
3. Klik section untuk buka/tutup
4. Scroll untuk baca konten
5. Di bagian Struktur Organisasi ada foto perangkat desa juga!

## 📋 Format Input

### Misi (di Admin)
Pisahkan setiap poin misi dengan **baris baru**:
```
Mengembangkan potensi wisata alam dan budaya secara berkelanjutan
Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan
Mendorong pertumbuhan ekonomi masyarakat melalui UMKM dan sektor pariwisata
```

Akan otomatis menjadi:
```
1. Mengembangkan potensi wisata alam dan budaya secara berkelanjutan
2. Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan
3. Mendorong pertumbuhan ekonomi masyarakat melalui UMKM dan sektor pariwisata
```

## 📁 File Structure

### Migration
- `database/migrations/2026_10_11_192236_add_sections_to_village_profiles_table.php`

### Model
- `app/Models/VillageProfile.php` (updated)

### Controller
- `app/Http/Controllers/Admin/VillageProfileController.php` (updated)
- `app/Http/Controllers/PublicController.php` (already has profile method)

### Views
- `resources/views/public/profile.blade.php` (new - accordion)
- `resources/views/admin/village-profiles/index.blade.php` (updated - tabs)
- `resources/views/admin/village-profiles/edit.blade.php` (updated - tabs)

### Seeder
- `database/seeders/VillageProfileSeeder.php` (updated)

## 🎯 Design Features

### Accordion Animation
```css
- Smooth slide down animation
- Icon rotation (chevron)
- Hover effect pada button
- Clean shadow & rounded corners
```

### Responsive
- Desktop: Full width
- Mobile: Stack & full width
- Touch friendly

### Color Scheme
- Primary blue (#00529B)
- Secondary yellow (#FFD100)
- White background with shadow
- Gray text for content

## 🔧 Technical Details

### JavaScript Functions
```javascript
toggleAccordion(id)
- Toggle show/hide content
- Rotate icon
- Smooth animation
```

### Default Behavior
- First accordion (Profil Desa) open by default
- Other sections closed
- Click to toggle

### Integration
- Menampilkan perangkat desa di section Struktur Organisasi
- Data dari tabel `officials`
- Foto circular dengan border primary

## ✨ Highlights

1. **Clean UI**: Modern accordion design
2. **Easy to Use**: One-click expand/collapse
3. **Complete Info**: 5 sections untuk semua info desa
4. **Admin Friendly**: Tabs untuk edit per section
5. **Responsive**: Works di semua device
6. **Animated**: Smooth transitions
7. **Integrated**: Shows officials dengan foto

## 🚀 Status

✅ **COMPLETED & READY TO USE!**

- Database: ✅ Migrated
- Model: ✅ Updated
- Controllers: ✅ Updated
- Views: ✅ Created
- Seeder: ✅ Run with dummy data
- Testing: ✅ Ready for manual test

## 📱 Preview URLs

- **Public Page**: http://localhost:8000/profil
- **Admin List**: http://localhost:8000/admin/village-profiles
- **Admin Edit**: http://localhost:8000/admin/village-profiles/1/edit

---

**Next**: Test di browser, lalu bisa edit konten sesuai data asli Desa Haria! 🎉
