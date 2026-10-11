Skema Database Dinamis & Minimalis (MySQL 8)

Gunakan Migration Laravel. Skema dirancang hemat storage dan tanpa manajemen user umum:

users (Khusus Admin / Perangkat Desa)

id, name, email, password, role ('admin')

village_profiles (Sejarah, Visi, Misi)

id, title, content (text), type (enum: sejarah, visi, misi)

officials (Struktur Pemerintahan)

id, name, position, image_path, order_number

potentials (Data/Potensi Desa & Wisata)

id, title, description, category (enum: wisata, alam, budaya), image_path

facilities (Fasilitas Umum)

id, name, description, icon, latitude, longitude

products (Produk UMKM)

id, name, owner_name, description, price, image_path, whatsapp_number

posts (Berita & Dokumentasi)

id, title, slug, content, category (enum: berita, kegiatan), published_at

complaints (Pengaduan/Saran Murni)

id

reporter_name (string - diambil otomatis dari Google OAuth)

reporter_email (string - diambil otomatis dari Google OAuth)

title (string)

description (text)

status (enum: pending, processed, resolved)

admin_reply (text, nullable - isi tanggapan dari admin desa)

created_at, updated_at

complaint_images (Gambar Lampiran Pengaduan - Maks 5)

id

complaint_id (foreign key)

image_path (file WebP hasil kompresi super kecil)