# SPESIFIKASI TEKNIS: MODUL PENGAJUAN SURAT & PENGADUAN
**Project:** Website Desa Wisata Haria  
**Stack Target:** Laravel 13+, MySQL 8, Google Socialite  
**Prinsip Arsitektur:** Low-Resource, Stateless, Zero/Minimal Storage  

---

## 1. DYNAMIC SITE SETTINGS (PENGATURAN TEKS & KONTAK ADMIN)

Semua teks petunjuk, informasi publik, dan nomor kontak admin TIDAK BOLEH di-hardcode pada view/template Blade. Seluruh teks wajib diambil secara dinamis dari database.

### Aturan & Alur Settings:
1. **Pengaturan Kontak WA:**
   * Simpan nomor kontak awal: `081340089147`.
   * Sistem harus otomatis mengonversi format nomor (misal `08...` menjadi `628...`) saat digenerate menjadi URL link WhatsApp `wa.me`.
2. **Pengaturan Teks Publik:**
   * Teks deskripsi/petunjuk di halaman form Pengajuan Surat dan Pengaduan harus bisa diedit oleh Admin melalui Halaman Admin Settings.
3. **Menu Admin Settings:**
   * Sediakan halaman khusus admin untuk memperbarui:
     * Nomor WA Admin Desa
     * Teks Sambutan/Petunjuk Pengajuan Surat
     * Teks Sambutan/Petunjuk Pengaduan

---

## 2. MODUL PENGAJUAN SURAT (ZERO STORAGE ARCHITECTURE)

Modul ini dibuat 100% tanpa fitur unggah berkas ke server guna menghemat kapastias *storage* hosting.

### Alur Kerja (Workflow):
1. **Input Form Publik (Tanpa Login):**
   * Field Isian: NIK (16 digit), Nama Lengkap, Nomor WhatsApp, Jenis Surat, dan Keperluan.
   * Bebas dari input *file upload*.
2. **Proses Simpan & Redirect:**
   * Data teks disimpan ke database dengan status awal `pending`.
   * Setelah submit, arahkan pengguna ke halaman konfirmasi yang berisi tombol **"Kirim Berkas Syarat via WhatsApp"**.
   * Link tombol otomatis mengarah ke WhatsApp Admin (`wa.me`) membawa format pesan otomatis berisi NIK, Nama, dan Jenis Surat yang diajukan.
3. **Pengecekan Status Surat (Publik):**
   * Pengguna mengecek status surat hanya dengan memasukkan NIK di halaman "Cek Status Surat".
   * Menampilkan data singkat: NIK, Jenis Surat, Tanggal Pengajuan, Status (`pending`, `diproses`, `selesai`, `ditolak`), dan Catatan Admin.
4. **Kelola Pengajuan (Sisi Admin):**
   * Admin dapat melihat daftar pengajuan, mengubah status, dan memberikan catatan (misal alasan penolakan atau instruksi pengambilan surat).

---

## 3. MODUL PENGADUAN MASYARAKAT (STATELESS OAUTH & COMPRESSED STORAGE)

Fitur pengaduan tanpa registrasi akun manual. Menggunakan Google Socialite murni untuk validasi identitas pelapor.

### Alur Kerja (Workflow):
1. **Otentikasi Pelapor (Google Socialite):**
   * Pengguna mengklik "Buat Pengaduan" dan diwajibkan *Login via Google*.
   * Sistem menangkap `email` dan `nama` dari akun Google pengguna dan menyimpannya di *session* form (tanpa membuat tabel `users` baru untuk masyarakat).
2. **Kompresi Gambar Sisi Klien (Client-Side JS Mandatory):**
   * Form mengizinkan maksimal **5 foto**.
   * Sebelum form dikirim ke server, JavaScript wajib melakukan proses *client-side image compression*:
     * Meringkas *width* gambar maksimal **800px** (rasio tetap).
     * Mengonversi format gambar menjadi `.webp`.
     * Menekan kualitas gambar dengan target ukuran **50KB – 100KB per file**.
3. **Penyimpanan Berkas (Server Storage):**
   * Simpan file foto hasil kompresi ke direktori public storage server (`storage/app/public/pengaduan/`).
4. **Tanggapan Admin & Notifikasi Email:**
   * Admin membaca pengaduan di dashboard dan memberikan tanggapan/status (`pending`, `diproses`, `selesai`).
   * Saat Admin menyimpan tanggapan, sistem wajib memicu pengiriman email notifikasi otomatis via Laravel Mailable ke `google_email` pelapor.
5. **Prosedur Hapus Data (Hard Delete):**
   * Ketika Admin menghapus data pengaduan, sistem wajib menghapus file fisik foto di storage server sebelum menghapus record dari database (mencegah penumpukan file sampah).

---

## 4. SPESIFIKASI STRUCTURE DATABASE (MYSQL 8)

Agen wajib membuat migrasi database dengan struktur berikut:

1. **`site_settings`**
   * `id` (Primary Key)
   * `key_name` (VARCHAR, Unique) - Contoh: `admin_wa_number`, `pengajuan_hero_text`, `pengaduan_hero_text`
   * `value` (TEXT, Nullable)
   * Timestamps

2. **`pengajuan_surat`**
   * `id` (Primary Key)
   * `nik` (VARCHAR 16, Indexed)
   * `nama` (VARCHAR)
   * `nomor_wa` (VARCHAR)
   * `jenis_surat` (VARCHAR)
   * `keperluan` (TEXT)
   * `status` (ENUM: 'pending', 'diproses', 'selesai', 'ditolak' - default: 'pending')
   * `catatan_admin` (TEXT, Nullable)
   * Timestamps

3. **`pengaduan`**
   * `id` (Primary Key)
   * `google_email` (VARCHAR)
   * `nama_pelapor` (VARCHAR)
   * `judul` (VARCHAR)
   * `isi_laporan` (TEXT)
   * `status` (ENUM: 'pending', 'diproses', 'selesai' - default: 'pending')
   * Timestamps

4. **`foto_pengaduan`**
   * `id` (Primary Key)
   * `pengaduan_id` (Foreign Key $\rightarrow$ `pengaduan.id`, ON DELETE CASCADE)
   * `file_path` (VARCHAR)
   * Timestamps

5. **`tanggapan_pengaduan`**
   * `id` (Primary Key)
   * `pengaduan_id` (Foreign Key $\rightarrow$ `pengaduan.id`, ON DELETE CASCADE)
   * `isi_tanggapan` (TEXT)
   * Timestamps

---

## 5. TUGAS EKSEKUSI UNTUK AGENT

1. Buat file migration & model untuk `site_settings`, `pengajuan_surat`, `pengaduan`, `foto_pengaduan`, dan `tanggapan_pengaduan`.
2. Buat Seeder awal untuk `site_settings` memasukkan nomor WA `081340089147` dan teks default portal.
3. Buat halaman Admin Settings untuk mengedit data `site_settings`.
4. Buat Controller & Blade View untuk Pengajuan Surat (Public + Admin + Status Tracker via NIK).
5. Pasang Google Socialite pada form Pengaduan untuk menangkap email pelapor.
6. Buat skrip JS kompresi gambar di Blade form pengaduan (max 5 foto, format .webp, target size 50-100KB).
7. Buat Laravel Mailable Class untuk mengirim email balasan otomatis ke email Google pelapor saat Admin merespon pengaduan.
8. Pastikan logika penghapusan pengaduan oleh Admin juga mengeksekusi `Storage::delete()` untuk menghapus foto fisik di server.