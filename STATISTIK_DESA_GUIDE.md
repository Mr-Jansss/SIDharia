# Statistik Desa - Documentation

## ✅ Fitur yang Sudah Dibuat

### 1. **Data Statistik**
   - ✅ Total KK (Kepala Keluarga)
   - ✅ Total Penduduk
   - ✅ Pie Chart: Perbandingan Jenis Kelamin (Laki-laki vs Perempuan)
   - ✅ Bar Chart: Jenjang Pendidikan (PAUD, TK, SD, SMP, SMA, S1)

### 2. **Frontend Public**
   - ✅ Halaman Statistik: `/statistik`
   - ✅ 2 Cards besar untuk Total KK & Total Penduduk
   - ✅ Pie Chart dengan Chart.js untuk Jenis Kelamin
   - ✅ Bar Chart dengan Chart.js untuk Pendidikan
   - ✅ Responsive & modern design
   - ✅ Menu "Statistik" di navbar

### 3. **Frontend Admin**
   - ✅ Dashboard Statistik: `/admin/statistics`
   - ✅ View data dalam format cards & tables
   - ✅ Edit form: `/admin/statistics/{id}/edit`
   - ✅ Validasi lengkap
   - ✅ Menu "Statistik" di admin navigation

### 4. **Backend**
   - ✅ Model: `VillageStatistic`
   - ✅ Migration: `village_statistics` table
   - ✅ Controller: `VillageStatisticController` (Admin)
   - ✅ Controller: `PublicController@statistics`
   - ✅ Routes untuk public & admin
   - ✅ Seeder dengan data dummy

## 📊 Struktur Database

### Table: `village_statistics`

| Column              | Type    | Description                |
|---------------------|---------|----------------------------|
| id                  | bigint  | Primary key                |
| total_kk            | integer | Total Kepala Keluarga      |
| total_penduduk      | integer | Total Penduduk             |
| jumlah_laki_laki    | integer | Jumlah Laki-laki           |
| jumlah_perempuan    | integer | Jumlah Perempuan           |
| pendidikan_paud     | integer | Jumlah PAUD                |
| pendidikan_tk       | integer | Jumlah TK                  |
| pendidikan_sd       | integer | Jumlah SD                  |
| pendidikan_smp      | integer | Jumlah SMP                 |
| pendidikan_sma      | integer | Jumlah SMA                 |
| pendidikan_s1       | integer | Jumlah S1                  |
| created_at          | timestamp | Timestamp                |
| updated_at          | timestamp | Timestamp                |

## 🎨 Cara Menggunakan

### **Untuk Masyarakat (Public):**

1. **Akses Halaman Statistik:**
   ```
   http://localhost:8000/statistik
   ```

2. **Lihat Data:**
   - Total KK & Total Penduduk (cards besar)
   - Pie Chart Jenis Kelamin (dengan persentase otomatis)
   - Bar Chart Pendidikan (6 jenjang)

### **Untuk Admin:**

1. **Akses Dashboard:**
   ```
   http://localhost:8000/admin/statistics
   ```

2. **Edit Data:**
   - Click button **"Edit Data Statistik"**
   - Update angka-angka:
     - Total KK
     - Total Penduduk
     - Jumlah Laki-laki
     - Jumlah Perempuan
     - Data Pendidikan (PAUD, TK, SD, SMP, SMA, S1)
   - Click **"Simpan Perubahan"**

3. **Chart akan otomatis update** di halaman public!

## 📁 File Structure

### Backend
- `app/Models/VillageStatistic.php` - Model
- `app/Http/Controllers/Admin/VillageStatisticController.php` - Admin Controller
- `app/Http/Controllers/PublicController.php` - Public Controller (method: statistics)
- `database/migrations/2026_10_12_121531_create_village_statistics_table.php` - Migration
- `database/seeders/VillageStatisticSeeder.php` - Seeder

### Frontend Public
- `resources/views/public/statistics.blade.php` - Halaman public dengan charts

### Frontend Admin
- `resources/views/admin/statistics/index.blade.php` - Dashboard admin
- `resources/views/admin/statistics/edit.blade.php` - Form edit

### Routes
- `routes/web.php` - Added statistics routes

### Layout
- `resources/views/layouts/public.blade.php` - Added "Statistik" menu
- `resources/views/layouts/navigation.blade.php` - Added "Statistik" menu (admin)

## 📊 Chart.js Integration

### Pie Chart - Jenis Kelamin
```javascript
type: 'pie'
data: [Laki-laki, Perempuan]
backgroundColor: ['#3B82F6' (blue), '#EC4899' (pink)]
```

### Bar Chart - Pendidikan
```javascript
type: 'bar'
data: [PAUD, TK, SD, SMP, SMA, S1]
backgroundColor: '#00529B' (primary blue)
```

## 🚀 Testing

### Manual Test Steps:

1. **Buka Public Page:**
   ```
   http://localhost:8000/statistik
   ```
   - ✅ Lihat 2 cards (Total KK, Total Penduduk)
   - ✅ Lihat Pie Chart (Jenis Kelamin)
   - ✅ Lihat Bar Chart (Pendidikan)

2. **Buka Admin:**
   ```
   http://localhost:8000/admin/statistics
   ```
   - ✅ Lihat semua data
   - ✅ Click "Edit Data Statistik"
   - ✅ Ubah angka (misal: Total KK = 500)
   - ✅ Save

3. **Refresh Public Page:**
   - ✅ Angka berubah sesuai input admin
   - ✅ Chart update otomatis

## 💡 Features

### Public Page:
- ✅ Clean & modern design
- ✅ Icons untuk setiap card
- ✅ Interactive charts (hover untuk lihat detail)
- ✅ Legend pada pie chart
- ✅ Responsive layout
- ✅ Color-coded (blue & pink untuk gender)

### Admin Page:
- ✅ Dashboard dengan preview semua data
- ✅ Edit button prominently placed
- ✅ Form dengan sections (Umum, Jenis Kelamin, Pendidikan)
- ✅ Validation (required, min:0)
- ✅ Success message after save
- ✅ Cancel button to go back

## 📦 Data Dummy

Sudah ada data dummy dari seeder:
- Total KK: 450
- Total Penduduk: 1,850
- Laki-laki: 920
- Perempuan: 930
- PAUD: 85
- TK: 120
- SD: 280
- SMP: 210
- SMA: 180
- S1: 95

## 🔥 Ready to Use!

**Status**: ✅ Fully Functional
- Database: ✅ Migrated & Seeded
- Backend: ✅ Controllers & Routes Done
- Frontend Public: ✅ Page with Charts
- Frontend Admin: ✅ Dashboard & Edit Form
- Integration: ✅ Chart.js Loaded via CDN

---

**Next**: Bisa langsung test di browser! 🎉
