# 📋 PANDUAN SETUP MODUL PENGADUAN

Panduan lengkap untuk mengaktifkan fitur Pengaduan Masyarakat dengan Google OAuth dan Email Notification.

---

## ✅ Checklist Fitur yang Sudah Dibuat

- ✅ **Google OAuth** untuk autentikasi pelapor (stateless, tanpa registrasi)
- ✅ **Client-Side Image Compression** (max 5 foto, auto resize 800px, convert ke WebP, target 50-100KB)
- ✅ **Form Pengaduan** dengan nomor pengaduan otomatis (format: `PGD-YYYYMMDD-XXXX`)
- ✅ **Admin Panel** untuk kelola pengaduan (list, detail, tanggapi, hapus)
- ✅ **Email Notification** otomatis saat admin balas pengaduan
- ✅ **Hard Delete** file foto saat hapus pengaduan (mencegah orphan files)
- ✅ **Status Tracking** (menunggu, diproses, selesai)

---

## 🚀 Langkah Setup

### 1. Setup Google OAuth

#### A. Buat Project di Google Cloud Console

1. Buka https://console.cloud.google.com/
2. Buat project baru atau pilih project existing
3. Aktifkan **Google+ API** atau **Google Identity Services**
4. Pergi ke **Credentials** → **Create Credentials** → **OAuth 2.0 Client ID**
5. Pilih **Application type: Web application**
6. Tambahkan **Authorized redirect URIs**:
   ```
   http://localhost:8000/auth/google/callback
   http://127.0.0.1:8000/auth/google/callback
   ```
   (Untuk production, ganti dengan domain aktual)

#### B. Copy Credentials ke .env

Setelah dapat **Client ID** dan **Client Secret**, update file `.env`:

```env
GOOGLE_CLIENT_ID=your-client-id-here.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=your-client-secret-here
GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google/callback
```

---

### 2. Setup Email Notification

#### A. Untuk Testing (Menggunakan Log)

Email akan disimpan di file log tanpa dikirim betulan:

```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS="admin@desaharia.com"
MAIL_FROM_NAME="Desa Haria"
```

Cek email di: `storage/logs/laravel.log`

#### B. Untuk Production (Menggunakan Gmail SMTP)

1. **Enable 2-Step Verification** di akun Google
2. **Generate App Password**: https://myaccount.google.com/apppasswords
3. Update `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password-here
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="admin@desaharia.com"
MAIL_FROM_NAME="Desa Haria"
```

#### C. Alternatif: Menggunakan Mailtrap (Testing)

1. Daftar di https://mailtrap.io/
2. Copy kredensial SMTP dari inbox demo
3. Update `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="admin@desaharia.com"
MAIL_FROM_NAME="Desa Haria"
```

---

### 3. Buat Storage Directory

Buat symbolic link untuk public storage:

```bash
php artisan storage:link
```

Folder foto pengaduan akan disimpan di: `storage/app/public/pengaduan/`

---

### 4. Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## 🧪 Testing Fitur

### 1. Test Google OAuth

1. Buka: http://localhost:8000/pengaduan
2. Klik tombol **"Login dengan Google"**
3. Pilih akun Google
4. Jika berhasil, akan redirect ke form pengaduan dengan nama & email terisi otomatis

**Troubleshooting:**
- Error `invalid_client`: Cek `GOOGLE_CLIENT_ID` dan `GOOGLE_CLIENT_SECRET`
- Error `redirect_uri_mismatch`: Pastikan URL callback sudah didaftarkan di Google Console
- Error 500: Cek `storage/logs/laravel.log` untuk detail error

---

### 2. Test Form Pengaduan

1. Isi form pengaduan
2. Upload foto (max 5)
3. Lihat preview foto (sudah terkompress otomatis)
4. Submit form
5. Cek halaman sukses dengan nomor pengaduan

**Yang Perlu Dicek:**
- Foto terkompress ke WebP (cek ukuran file di Network DevTools)
- Foto tersimpan di `storage/app/public/pengaduan/`
- Data tersimpan di database tabel `pengaduan` dan `foto_pengaduan`

---

### 3. Test Admin Panel

1. Login sebagai admin
2. Buka menu **Pengaduan** di sidebar
3. Test fitur:
   - ✅ List pengaduan dengan filter & search
   - ✅ Lihat detail pengaduan
   - ✅ Buka foto dalam modal/lightbox
   - ✅ Berikan tanggapan
   - ✅ Update status
   - ✅ Hapus pengaduan

---

### 4. Test Email Notification

#### Jika pakai `MAIL_MAILER=log`:
1. Admin berikan tanggapan di pengaduan
2. Buka file `storage/logs/laravel.log`
3. Cari email terakhir dengan subject "Tanggapan Pengaduan"
4. Pastikan isi email benar (nomor pengaduan, judul, tanggapan)

#### Jika pakai Gmail/Mailtrap:
1. Admin berikan tanggapan
2. Cek inbox email pelapor (atau Mailtrap inbox)
3. Pastikan email masuk dengan template yang benar

---

### 5. Test Hard Delete

1. Catat foto yang ada di `storage/app/public/pengaduan/`
2. Hapus pengaduan dari admin panel
3. Cek folder storage - foto harus ikut terhapus
4. Cek database - record `pengaduan` dan `foto_pengaduan` harus terhapus

---

## 📄 Routes yang Tersedia

### Public Routes (Tanpa Auth)
```
GET  /pengaduan                 - Redirect ke login Google
GET  /auth/google               - Login Google OAuth
GET  /auth/google/callback      - Callback OAuth
GET  /pengaduan/create          - Form pengaduan (after login)
POST /pengaduan                 - Submit pengaduan
GET  /pengaduan/sukses/{id}     - Halaman sukses
GET  /pengaduan/cek-status      - Form cek status
POST /pengaduan/cek-status      - Hasil cek status
```

### Admin Routes (Require Auth)
```
GET    /admin/pengaduan                      - List pengaduan
GET    /admin/pengaduan/{id}                 - Detail pengaduan
GET    /admin/pengaduan/{id}/edit            - Form tanggapan
PUT    /admin/pengaduan/{id}                 - Update status & tanggapan
DELETE /admin/pengaduan/{id}                 - Hapus pengaduan
POST   /admin/pengaduan/{id}/tanggapan       - Tambah tanggapan (alternative)
```

---

## 🔐 Security Notes

1. **OAuth Session**: Data Google email & nama hanya disimpan di session, tidak ada tabel users untuk masyarakat
2. **File Upload**: Hanya accept image (jpg, jpeg, png, webp) max 5 file
3. **Image Compression**: Client-side untuk hemat bandwidth & storage
4. **Hard Delete**: Mencegah file orphan yang menumpuk di storage
5. **Email Privacy**: Email pelapor tidak ditampilkan di halaman public

---

## 📊 Database Schema

### Tabel: `pengaduan`
```
- id (PK)
- nomor_pengaduan (unique, e.g., PGD-20261013-0001)
- google_email
- nama_pelapor
- judul
- isi_laporan
- status (enum: menunggu, diproses, selesai)
- timestamps
```

### Tabel: `foto_pengaduan`
```
- id (PK)
- pengaduan_id (FK)
- file_path
- timestamps
```

### Tabel: `tanggapan_pengaduan`
```
- id (PK)
- pengaduan_id (FK)
- isi_tanggapan
- timestamps
```

---

## 🐛 Troubleshooting

### Foto tidak terupload
- Cek permissions folder `storage/app/public/`
- Pastikan symbolic link sudah dibuat: `php artisan storage:link`
- Cek max upload size di `php.ini`: `upload_max_filesize` dan `post_max_size`

### Email tidak terkirim
- Cek config di `.env`
- Test dengan: `php artisan tinker` → `Mail::raw('Test', fn($m) => $m->to('test@example.com')->subject('Test'))`
- Cek `storage/logs/laravel.log` untuk error

### OAuth error
- Pastikan redirect URL cocok di Google Console dan `.env`
- Clear config: `php artisan config:clear`
- Cek Socialite sudah terinstall: `composer show laravel/socialite`

### Status tidak update
- Cek form method `@method('PUT')` ada di form edit
- Cek route `Route::put()` sudah benar
- Lihat error di browser console atau `storage/logs/laravel.log`

---

## 🎉 Selesai!

Fitur Pengaduan Masyarakat sudah siap digunakan dengan:
- ✅ Autentikasi Google OAuth (stateless)
- ✅ Image compression otomatis
- ✅ Email notification
- ✅ Admin panel lengkap
- ✅ Storage optimization (hard delete)

Untuk pertanyaan atau bug report, hubungi developer atau buka issue di repository.
