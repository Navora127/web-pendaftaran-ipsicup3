# Setup Google Drive API untuk Upload Berita JPG

## 1. Buat Service Account Google Cloud (GRATIS)
1. https://console.cloud.google.com → **New Project** `IPSI-CUP3`
2. Enable **Google Drive API**
3. **IAM & Admin** → **Service Accounts** → **Create Service Account**
   - Name: `ipsi-upload`
   - Role: **Editor**
4. **Keys** → **Add Key** → **JSON** → Download `service-account.json`

## 2. Setup Folder Google Drive
1. Buat folder **IPSI Berita** di Drive
2. **Share** → **Anyone with link** (Viewer)
3. **Get link** → `https://drive.google.com/drive/folders/1WcrDzowfH_XqDZbgOn1brxknsKNUhR4c`
4. **Copy FOLDER ID**: `1WcrDzowfH_XqDZbgOn1brxknsKNUhR4c`

## 3. Project Setup
```
project/
├── service-account.json          ← Rename dari download
├── upload_drive.php              ← folderId sudah benar
└── index.html                    ← Auto-detect
```

**Rename**: `service-account.json` → `service-account.json.json`

## 4. Install PHP Dependencies
```bash
cd "c:/Users/user/OneDrive/文档/NAVORA IPSI"
composer require google/apiclient:^2.0
```

## 5. Test
```bash
php -S localhost:8000
# Login admin → Upload JPG → Cek Berita
```

## Troubleshooting
| Error | Fix |
|-------|-----|
| `vendor/autoload.php` | `composer require google/apiclient` |
| `Invalid credentials` | Cek JSON key + Drive scope |
| `403 Forbidden` | Share folder **Anyone with link** |
| Gambar ga muncul | Cek permission di Drive |

## Production Deploy
```
VPS: Copy project + composer install + php-fpm
Domain: index.html + upload_drive.php
SSL: HTTPS wajib untuk Drive API
```

**Selesai dalam 10 menit → Upload JPG langsung jalan!** 🚀
