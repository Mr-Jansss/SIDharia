# PowerShell Script to Fix Admin Views

Write-Host "🔧 Fixing Admin Views..." -ForegroundColor Cyan

# Fix Potentials Edit View
$file = "resources\views\admin\potentials\edit.blade.php"
Write-Host "Fixing $file..." -ForegroundColor Yellow
(Get-Content $file -Raw) `
    -replace 'name="title"', 'name="name"' `
    -replace 'id="title"', 'id="name"' `
    -replace '\$potential->title', '$potential->name' `
    -replace "old\('title'", "old('name'" `
    -replace 'for="title"', 'for="name"' `
    -replace '>Judul<', '>Nama Potensi<' `
    -replace '@error\(''title''\)', '@error(''name'')' |
    Set-Content $file -NoNewline

# Fix Potentials Index View  
$file = "resources\views\admin\potentials\index.blade.php"
Write-Host "Fixing $file..." -ForegroundColor Yellow
(Get-Content $file -Raw) `
    -replace '\$potential->title', '$potential->name' |
    Set-Content $file -NoNewline

# Fix Products Create View
$file = "resources\views\admin\products\create.blade.php"
Write-Host "Fixing $file..." -ForegroundColor Yellow
(Get-Content $file -Raw) `
    -replace 'name="owner_name"', 'name="contact_name"' `
    -replace 'id="owner_name"', 'id="contact_name"' `
    -replace "old\('owner_name'", "old('contact_name'" `
    -replace 'for="owner_name"', 'for="contact_name"' `
    -replace '>Nama Pemilik<', '>Nama Kontak<' `
    -replace '@error\(''owner_name''\)', '@error(''contact_name'')' `
    -replace 'name="whatsapp_number"', 'name="contact_phone"' `
    -replace 'id="whatsapp_number"', 'id="contact_phone"' `
    -replace "old\('whatsapp_number'", "old('contact_phone'" `
    -replace 'for="whatsapp_number"', 'for="contact_phone"' `
    -replace '>Nomor WhatsApp<', '>Nomor Telepon Kontak<' `
    -replace '@error\(''whatsapp_number''\)', '@error(''contact_phone'')' |
    Set-Content $file -NoNewline

# Fix Products Edit View
$file = "resources\views\admin\products\edit.blade.php"
Write-Host "Fixing $file..." -ForegroundColor Yellow
(Get-Content $file -Raw) `
    -replace 'name="owner_name"', 'name="contact_name"' `
    -replace 'id="owner_name"', 'id="contact_name"' `
    -replace '\$product->owner_name', '$product->contact_name' `
    -replace "old\('owner_name'", "old('contact_name'" `
    -replace 'for="owner_name"', 'for="contact_name"' `
    -replace '>Nama Pemilik<', '>Nama Kontak<' `
    -replace '@error\(''owner_name''\)', '@error(''contact_name'')' `
    -replace 'name="whatsapp_number"', 'name="contact_phone"' `
    -replace 'id="whatsapp_number"', 'id="contact_phone"' `
    -replace '\$product->whatsapp_number', '$product->contact_phone' `
    -replace "old\('whatsapp_number'", "old('contact_phone'" `
    -replace 'for="whatsapp_number"', 'for="contact_phone"' `
    -replace '>Nomor WhatsApp<', '>Nomor Telepon Kontak<' `
    -replace '@error\(''whatsapp_number''\)', '@error(''contact_phone'')' `
    -replace '\$product->image_path', '$product->image' |
    Set-Content $file -NoNewline

# Fix Products Index View
$file = "resources\views\admin\products\index.blade.php"
Write-Host "Fixing $file..." -ForegroundColor Yellow
(Get-Content $file -Raw) `
    -replace '\$product->owner_name', '$product->contact_name' `
    -replace '\$product->whatsapp_number', '$product->contact_phone' `
    -replace '\$product->image_path', '$product->image' |
    Set-Content $file -NoNewline

Write-Host "✅ All views fixed!" -ForegroundColor Green
Write-Host "Run: php artisan view:clear" -ForegroundColor Cyan
