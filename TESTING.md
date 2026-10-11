Skenario Pengujian Wajib

Test Pengaduan via Google OAuth:

Aksi: Klik "Lapor dengan Google" -> Isi form pengaduan + upload gambar.

Ekspektasi: Teks terimpan di DB complaints dengan reporter_name & reporter_email sesuai akun Google. Tidak membuat akun user baru di database.

Test Kirim Email Tanggapan (Krusial):

Aksi: Admin masuk ke dashboard -> Buka pesan pengaduan -> Tulis tanggapan di admin_reply -> Klik "Kirim Balasan".

Ekspektasi: Status berubah jadi resolved / processed, dan sistem mengirimkan email rapi berisi balasan admin ke alamat reporter_email.

Test Kompresi Foto Lampiran:

Aksi: Upload 5 foto ukuran besar (2MB/foto).

Ekspektasi: Terkompresi ke format WebP di folder storage dengan ukuran sangat ringkas.

Test Rate Limit:

Aksi: Kirim pengaduan lebih dari 3 kali berturut-turut dengan email Google yang sama.

Ekspektasi: Sistem menolak pengiriman ke-4 dan menampilkan pesan batas harian.