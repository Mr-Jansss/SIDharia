<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapan Pengaduan</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #00529B; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0;">
        <h1 style="margin: 0; font-size: 24px;">Pengaduan Anda Telah Ditanggapi</h1>
    </div>
    
    <div style="background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-top: none; border-radius: 0 0 8px 8px;">
        <p>Kepada Yth. <strong>{{ $pengaduan->nama_pelapor }}</strong>,</p>
        
        <p>Pengaduan Anda dengan nomor <strong>{{ $pengaduan->nomor_pengaduan }}</strong> telah ditanggapi oleh pemerintah Negeri Haria.</p>
        
        <div style="background-color: white; padding: 15px; margin: 20px 0; border-left: 4px solid #00529B; border-radius: 4px;">
            <h3 style="margin-top: 0; color: #00529B;">Detail Pengaduan</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px 0; vertical-align: top; width: 140px;"><strong>Nomor Pengaduan:</strong></td>
                    <td style="padding: 8px 0;">{{ $pengaduan->nomor_pengaduan }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; vertical-align: top;"><strong>Judul:</strong></td>
                    <td style="padding: 8px 0;">{{ $pengaduan->judul }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; vertical-align: top;"><strong>Tanggal Lapor:</strong></td>
                    <td style="padding: 8px 0;">{{ $pengaduan->created_at->format('d/m/Y H:i') }} WIB</td>
                </tr>
            </table>
        </div>
        
        <div style="background-color: #e8f5e9; padding: 15px; margin: 20px 0; border-left: 4px solid #4caf50; border-radius: 4px;">
            <h3 style="margin-top: 0; color: #2e7d32;">Tanggapan</h3>
            <p style="margin: 0; white-space: pre-wrap;">{{ $tanggapan->isi_tanggapan }}</p>
            <p style="margin: 10px 0 0; font-size: 12px; color: #666;">
                <em>Ditanggapi pada: {{ $tanggapan->created_at->format('d/m/Y H:i') }} WIB</em>
            </p>
        </div>
        
        <div style="background-color: #fff3cd; padding: 15px; margin: 20px 0; border-left: 4px solid #ffc107; border-radius: 4px;">
            <p style="margin: 0; font-size: 14px;">
                <strong>Catatan:</strong> Jika Anda memiliki pertanyaan lebih lanjut terkait pengaduan ini, silakan hubungi kantor desa atau balas email ini.
            </p>
        </div>
        
        <p>Terima kasih atas partisipasi Anda dalam membangun Negeri Haria yang lebih baik.</p>
        
        <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
            <p style="margin: 5px 0; color: #666; font-size: 14px;">
                <strong>Pemerintah Negeri Haria</strong><br>
                Kecamatan Saparua, Kabupaten Maluku Tengah<br>
                Provinsi Maluku
            </p>
        </div>
    </div>
    
    <div style="text-align: center; padding: 20px; color: #999; font-size: 12px;">
        <p>Email ini dikirim secara otomatis. Mohon tidak membalas ke email ini.</p>
    </div>
</body>
</html>
