# Test Pengaduan Submission
Write-Host "=== TEST PENGADUAN SYSTEM ===" -ForegroundColor Cyan

# 1. Test route exists
Write-Host "`n1. Checking routes..." -ForegroundColor Yellow
php artisan route:list --name=pengaduan

# 2. Test create page loads
Write-Host "`n2. Testing /pengaduan page..." -ForegroundColor Yellow
$response = Invoke-WebRequest -Uri "http://127.0.0.1:8000/pengaduan" -UseBasicParsing -ErrorAction SilentlyContinue
if ($response.StatusCode -eq 200) {
    Write-Host "✓ Page loads successfully" -ForegroundColor Green
} else {
    Write-Host "✗ Page failed to load: $($response.StatusCode)" -ForegroundColor Red
}

# 3. Check controller method exists
Write-Host "`n3. Checking PengaduanController methods..." -ForegroundColor Yellow
$content = Get-Content "app/Http/Controllers/PengaduanController.php" -Raw
if ($content -match "public function store") {
    Write-Host "✓ store() method exists" -ForegroundColor Green
} else {
    Write-Host "✗ store() method NOT found" -ForegroundColor Red
}

# 4. Check for any "Negeri" in controller that might break logic
Write-Host "`n4. Checking for 'Negeri' keyword in controller..." -ForegroundColor Yellow
if ($content -match 'Negeri') {
    Write-Host "⚠ Found 'Negeri' keyword - might be harmless" -ForegroundColor Yellow
    Select-String -Path "app/Http/Controllers/PengaduanController.php" -Pattern "Negeri" | ForEach-Object {
        Write-Host "  Line $($_.LineNumber): $($_.Line.Trim())" -ForegroundColor Gray
    }
} else {
    Write-Host "✓ No 'Negeri' keyword found" -ForegroundColor Green
}

# 5. Check database table exists
Write-Host "`n5. Checking pengaduan table..." -ForegroundColor Yellow
$tableCheck = php artisan tinker --execute="echo DB::table('pengaduan')->exists() ? 'EXISTS' : 'NOT_EXISTS';" 2>&1
if ($tableCheck -match "EXISTS") {
    Write-Host "✓ Table 'pengaduan' exists" -ForegroundColor Green
} else {
    Write-Host "✗ Table 'pengaduan' NOT found" -ForegroundColor Red
}

Write-Host "`n=== TEST COMPLETE ===" -ForegroundColor Cyan
Write-Host "`nIf all checks pass, try submitting form manually in browser." -ForegroundColor White
Write-Host "Check browser console (F12) for JavaScript errors." -ForegroundColor White
