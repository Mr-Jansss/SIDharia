# 📝 MANUAL FIX GUIDE - ADMIN VIEWS

**Last Updated:** 10 Oktober 2026, 02:30 WIT

---

## ✅ STATUS

### Controllers: 100% FIXED ✅
- All 6 controllers sudah diperbaiki dan tested

### Views: 67% FIXED ⚠️
- ✅ Village Profiles (2/2 files)
- ✅ Officials (3/3 files)
- ✅ Facilities (sudah benar dari awal)
- ⏳ Potentials (1/3 files) - **2 files perlu fix**
- ⏳ Products (0/3 files) - **3 files perlu fix**
- ⏳ Posts (0/3 files) - **3 files perlu fix**

**Total: 8 files perlu manual fix**

---

## 🔧 CARA MANUAL FIX

### Method 1: VS Code Find & Replace
1. Buka folder project di VS Code
2. Tekan `Ctrl + Shift + H` (Find & Replace in Files)
3. Centang "Use Regular Expression" (icon `.*`)
4. Pilih folder `resources/views/admin/potentials` (atau products/posts)
5. Copy paste pattern dari guide ini

### Method 2: Edit Manual
1. Buka file di VS Code
2. Tekan `Ctrl + H` (Find & Replace)
3. Replace satu per satu sesuai guide

---

## 📁 FILE 1-2: POTENTIALS

### File: `resources/views/admin/potentials/edit.blade.php`

#### FIND & REPLACE:

```
FIND: $potential->title
REPLACE: $potential->name
```

```
FIND: $potential->image_path
REPLACE: $potential->image
```

```
FIND: name="title"
REPLACE: name="name"
```

```
FIND: id="title"
REPLACE: id="name"
```

```
FIND: for="title"
REPLACE: for="name"
```

```
FIND: old('title'
REPLACE: old('name'
```

```
FIND: @error('title')
REPLACE: @error('name')
```

```
FIND: >Judul<
REPLACE: >Nama Potensi<
```

---

### File: `resources/views/admin/potentials/index.blade.php`

#### FIND & REPLACE:

```
FIND: $potential->title
REPLACE: $potential->name
```

```
FIND: $potential->image_path
REPLACE: $potential->image
```

```
FIND: >Judul<
REPLACE: >Nama<
```

---

## 📁 FILE 3-5: PRODUCTS

### File: `resources/views/admin/products/create.blade.php`

#### FIND & REPLACE:

```
FIND: name="owner_name"
REPLACE: name="contact_name"
```

```
FIND: id="owner_name"
REPLACE: id="contact_name"
```

```
FIND: for="owner_name"
REPLACE: for="contact_name"
```

```
FIND: old('owner_name'
REPLACE: old('contact_name'
```

```
FIND: @error('owner_name')
REPLACE: @error('contact_name')
```

```
FIND: >Nama Pemilik<
REPLACE: >Nama Kontak<
```

```
FIND: name="whatsapp_number"
REPLACE: name="contact_phone"
```

```
FIND: id="whatsapp_number"
REPLACE: id="contact_phone"
```

```
FIND: for="whatsapp_number"
REPLACE: for="contact_phone"
```

```
FIND: old('whatsapp_number'
REPLACE: old('contact_phone'
```

```
FIND: @error('whatsapp_number')
REPLACE: @error('contact_phone')
```

```
FIND: >Nomor WhatsApp<
REPLACE: >Nomor Telepon Kontak<
```

---

### File: `resources/views/admin/products/edit.blade.php`

**SAMA SEPERTI create.blade.php DI ATAS, PLUS:**

```
FIND: $product->owner_name
REPLACE: $product->contact_name
```

```
FIND: $product->whatsapp_number
REPLACE: $product->contact_phone
```

```
FIND: $product->image_path
REPLACE: $product->image
```

---

### File: `resources/views/admin/products/index.blade.php`

#### FIND & REPLACE:

```
FIND: $product->owner_name
REPLACE: $product->contact_name
```

```
FIND: $product->whatsapp_number
REPLACE: $product->contact_phone
```

```
FIND: $product->image_path
REPLACE: $product->image
```

---

## 📁 FILE 6-8: POSTS

### File: `resources/views/admin/posts/create.blade.php`

#### TAMBAHKAN SETELAH FIELD `category`:

```blade
<!-- Status -->
<div class="mb-4">
    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
    <select name="status" id="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
    </select>
    @error('status')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
```

#### TAMBAHKAN SETELAH FIELD `published_at`:

```blade
<!-- Image Upload -->
<div class="mb-4">
    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar (Opsional)</label>
    <input type="file" name="image" id="image" accept="image/*"
        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WebP. Maks: 2MB</p>
    @error('image')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
```

---

### File: `resources/views/admin/posts/edit.blade.php`

#### TAMBAHKAN DI AWAL FORM (SETELAH @method('PUT')):

```blade
<!-- Current Image -->
@if($post->image)
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-48 h-32 object-cover rounded">
    </div>
@endif
```

#### TAMBAHKAN FIELD STATUS SETELAH `category`:

```blade
<!-- Status -->
<div class="mb-4">
    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
    <select name="status" id="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published</option>
    </select>
    @error('status')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
```

#### TAMBAHKAN IMAGE UPLOAD SETELAH `published_at`:

```blade
<!-- Image Upload -->
<div class="mb-4">
    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Baru (Opsional)</label>
    <input type="file" name="image" id="image" accept="image/*"
        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
    @error('image')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
```

---

### File: `resources/views/admin/posts/index.blade.php`

#### TAMBAHKAN KOLOM STATUS DI TABLE:

Cari bagian table header, tambahkan:
```blade
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
```

Cari bagian table body loop, tambahkan:
```blade
<td class="px-6 py-4 whitespace-nowrap">
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
        {{ $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
        {{ ucfirst($post->status) }}
    </span>
</td>
```

#### (OPSIONAL) TAMBAHKAN THUMBNAIL IMAGE:

Di table body, sebelum title:
```blade
<td class="px-6 py-4">
    @if($post->image)
        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded">
    @else
        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
            <i class="fas fa-image text-gray-400"></i>
        </div>
    @endif
</td>
```

---

## ✅ AFTER MANUAL FIX

Jalankan command berikut:

```bash
php artisan view:clear
php artisan route:clear
php artisan config:clear
```

---

## 🧪 TESTING CHECKLIST

Setelah selesai, test semua halaman admin:

- [ ] Dashboard - Load OK
- [ ] Profil Desa - Edit berfungsi
- [ ] Perangkat - CRUD berfungsi
- [ ] Potensi - CRUD berfungsi (field name & image)
- [ ] Fasilitas - CRUD berfungsi
- [ ] Produk - CRUD berfungsi (contact_name, contact_phone, image)
- [ ] Berita - CRUD berfungsi (status, image)

---

## 💡 TIPS

1. **Backup dulu** file sebelum edit (Ctrl+K Ctrl+S di VS Code)
2. **Test incrementally** - Fix 1 module, test, lanjut ke module berikutnya
3. **Gunakan regex mode** di Find & Replace untuk lebih cepat
4. Kalau ada error, cek di browser console atau Laravel log

---

## 🆘 KALAU ADA MASALAH

1. Clear cache: `php artisan view:clear`
2. Cek Laravel log: `storage/logs/laravel.log`
3. Cek browser console (F12)
4. Verify field names di database dengan: `php artisan tinker` lalu `App\Models\Product::first()`

---

**Good luck! 🚀**
