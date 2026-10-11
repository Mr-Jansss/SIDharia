Roadmap Pengerjaan Web Desa Haria (Email-Driven Flow)

Fase 1: Persiapan & Basis Data Ringkas

Install Laravel 13.x.

Setup koneksi MySQL 8 di .env.

Buat Migration & Seeder berdasarkan tabel.md (Tanpa tabel/fitur user dashboard).

Fase 2: Backend Admin & Management Content

Setup Laravel Breeze / Auth khusus untuk Admin Desa.

Buat CRUD Controller & Views untuk: Profil, Perangkat Desa, Fasilitas, UMKM, Wisata, Berita.

Fase 3: Frontend Publik (Landing Page Desa)

Implementasi UI Tema Biru-Putih-Kuning (desain.md) dengan Tailwind CSS.

Tampilkan data dinamis profil, fasilitas, UMKM, dan berita.

Fase 4: Integrasi Form Pengaduan & Email Auto-Reply

Setup Laravel Socialite (Google OAuth) untuk autofill/verifikasi Nama & Email pelapor.

Buat form pengaduan + kompresor gambar otomatis (WebP).

Buat Mailable Class ComplaintRepliedNotification.

Buat fitur di Admin Panel untuk membalas pengaduan yang otomatis memicu pengiriman email balasan ke Gmail pelapor.

Fase 5: Testing & Finetuning

Uji alur pengiriman email balasan dari Admin ke Gmail user.

Uji kompresi gambar dan pembatasan rate limit pengaduan.