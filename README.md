# NAVORA IPSI CUP 3 - Pendaftaran Pencak Silat

## Quick Deploy Vercel ✅

1. **Push ke GitHub** (exclude .gitignore files)
```
git init
git add .
git commit -m "IPSI CUP 3 v1.0 - JPG Berita Fixed"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/ipsi-cup3.git
git push -u origin main
```

2. **Vercel Deploy** (1 klik):
- vercel.com → **Import Git Repo**
- Framework: **Other**
- Auto-detect ✅
- **Environment Variables**:
  ```
  GOOGLE_APPLICATION_CREDENTIALS=service-account.json.json
  ```
- **Deploy** → Live URL dalam 60 detik!

## Features Live:
- ✅ Admin upload JPG berita → gambar langsung keliatan
- ✅ Pendaftaran atlet → struk auto
- ✅ Konfirmasi pembayaran
- ✅ Responsive mobile/desktop
- ✅ News tabs (Poster/Bagan)

## Admin Login:
```
Admin IPSI / admin123
```

## Local Test:
```bash
composer require google/apiclient
php -S localhost:8000
```

**Live Demo Ready!** 🚀 https://your-vercel-app.vercel.app
