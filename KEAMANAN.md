Standar Keamanan & Proteksi Email

Keamanan Mailer / SMTP:

Gunakan kredensial SMTP yang aman di .env (misalnya: Mailtrap untuk dev, Gmail SMTP / Resend / Mailgun untuk production).

Jangan pernah melakukan hardcode API Key Mailer di controller atau Mailable class.

Upload Gambar:

Validasi MIME type: HANYA jpeg,png,jpg,webp.

Max file size sebelum kompresi: 2MB per foto (maksimal 5 foto).

Konversi wajib ke format .webp dengan kompresi ekstrem.

Rate Limiting (Pencegahan Spam Email):

Batasi pengiriman pengaduan: Maksimal 3 kali submission per email Google per hari.

Mencegah penyalahgunaan sistem untuk mail bombing.

Sanitasi Input:

Amankan teks tanggapan admin dan deskripsi pengaduan dari serangan XSS.