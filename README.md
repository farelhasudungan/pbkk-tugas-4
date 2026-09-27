# Tugas 4: Membangun Aplikasi Multi-View Profil Akademik & Platform Agentic AI

Mini-website akademik pribadi mahasiswa ITS dan platform konseptual Agentic AI yang dibangun menggunakan **Laravel 12**, **Tailwind CSS v4**, dan **Vite Compiler**, mengadopsi tema dan layout modern dari Tugas 2.

---

## 👨‍🎓 Identitas Mahasiswa
- **Nama**: Farrel Hasudungan Immanuel Limbong
- **NRP**: 5025241016
- **Program Studi**: S1 Teknik Informatika
- **Departemen / Fakultas**: Departemen Teknik Informatika &bull; FTEIC ITS
- **Mata Kuliah**: Pemrograman Berbasis Kerangka Kerja (PBKK)

---

## 🚀 Fitur Utama & Kesesuaian Spesifikasi Teknis

### 1. Pewarisan Layout Terpusat (`layouts/app.blade.php`) — Bobot 30%
- Seluruh halaman anak (`home.blade.php`, `profil-mahasiswa.blade.php`, `ide-agent.blade.php`) mewarisi master layout tunggal menggunakan `@extends('layouts.app')`.
- Tidak ada duplikasi struktur HTML (`<!DOCTYPE>`, `<html>`, `<head>`, `<body>`) pada berkas views manapun.
- Dilengkapi:
  - Title halaman dinamis via `@yield('title')`.
  - Navbar statis dengan tautan aktif dan tombol toggle tema malam/siang neumorphic.
  - Container konten dinamis via `@yield('content')`.
  - Footer resmi ITS dengan branding FTEIC dan informasi mahasiswa.

### 2. Tiga Halaman Anak & Single Controller (`PageController`) — Bobot 25%
Seluruh rute diarahkan ke satu controller tunggal `app/Http/Controllers/PageController.php`:
1. **Beranda** (`/` dan `/beranda`): Menampilkan ikhtisar profil akademik, quick actions, dan integrasi alert interaktif.
2. **Profil Mahasiswa** (`/profil-mahasiswa`): Menampilkan KTM digital, 6 kartu atribut akademik `<x-info-card>`, serta riwayat mata kuliah unggulan.
3. **Ide-Riset Agentic AI** (`/ide-agent`): Menampilkan konsep platform *TalentMatch AI* (Recruiting & Screening Agent), alur 4 tahap autonomous pipeline, dan formulir pengumpulan ide.

### 3. Komponen Blade Reusable & Slots — Bobot 25%
Dua komponen Blade mandiri yang mengimplementasikan parameter atribut dan slot konten:
1. `<x-info-card>` (`resources/views/components/info-card.blade.php`):
   - Menerima atribut: `title`, `value`, `subtitle`, `badge`, `badgeColor`, `icon`, dan slot kustom.
   - Digunakan pada `/profil-mahasiswa` untuk merender data prodi, IPK, dosen wali, lab riset, dll.
2. `<x-status-banner>` (`resources/views/components/status-banner.blade.php`):
   - Menerima atribut: `type` (`info`, `success`, `warning`, `purple`), `title`, `dismissible`, dan slot pesan.
   - Digunakan untuk menampilkan pesan selamat datang (Tantangan 2) dan feedback pengumpulan formulir ide.

### 4. Asset Bundler Lokal Vite (NPM) — Bobot 25%
- Asset CSS (Tailwind v4) dan JS dikompilasi secara lokal melalui package manager NPM dan Vite.
- Tidak menggunakan link CDN mentah.
- Terintegrasi melalui direktif Blade `@vite(['resources/css/app.css', 'resources/js/app.js'])`.
- Hasil build produksi tersimpan di `public/build/`.

---

## 🌟 Penyelesaian Tantangan Ekstra (Target Nilai Plus A+)

### Tantangan 1: Toggle Tema Dinamis via Blade PHP (`/ide-agent?mode=dark`)
- Menggunakan variabel Blade PHP `$mode = request()->query('mode')` untuk mengubah background dan gaya container menjadi mode gelap (*dark mode*) secara dinamis.
- Kelas dynamic CSS Tailwind diimplementasikan pada wrapper halaman dan komponen kartu.
- Tautan pengujian:
  - [Mode Gelap Dinamis](http://localhost:8000/ide-agent?mode=dark) (`/ide-agent?mode=dark`)
  - [Mode Terang Dinamis](http://localhost:8000/ide-agent?mode=light) (`/ide-agent?mode=light`)
  - [Mode Standar](http://localhost:8000/ide-agent) (`/ide-agent`)

### Tantangan 2: Alert Status Interaktif Dinamis (`/beranda?user=Andi`)
- Komponen `<x-status-banner>` menampilkan pesan selamat datang interaktif saat parameter query `?user=...` terdeteksi di URL.
- Menampilkan sapaan khusus kepada pengguna yang berkunjung secara dinamis.
- Tautan pengujian:
  - [User Andi](http://localhost:8000/beranda?user=Andi) (`/beranda?user=Andi`)
  - [User Budi](http://localhost:8000/beranda?user=Budi) (`/beranda?user=Budi`)
  - [Dosen Penguji](http://localhost:8000/?user=Dosen-Penguji-PBKK) (`/?user=Dosen-Penguji-PBKK`)

---

## 📝 Formulir Pengumpulan Ide Agentic AI
- Terletak pada halaman `/ide-agent`.
- Memvalidasi input (Nama, Email, Kategori Agent, Judul Ide, Deskripsi).
- Di-submit via `POST /ide-agent` menuju `PageController@submitIdea`.
- Memicu session flash dan menampilkan feedback instan menggunakan komponen `<x-status-banner type="success">`.

---

## 🧪 Menjalankan Pengujian Otomatis

Aplikasi ini dilengkapi pengujian fitur komprehensif menggunakan PHPUnit:

```bash
# Jalankan seluruh test suite
php artisan test
```

Hasil pengujian mencakup 9 tes dan 55 assertion sukses:
- `home and beranda routes render master layout` (PASS)
- `challenge 2 interactive welcome status banner` (PASS)
- `profile route renders with info cards` (PASS)
- `ide agent route renders` (PASS)
- `challenge 1 dynamic theme mode` (PASS)
- `idea submission form flow` (PASS)
- `idea submission validation` (PASS)
- `the application returns a successful response` (PASS)

---

## 💻 Panduan Menjalankan Proyek Secara Lokal

1. **Pastikan Dependensi Terpasang**:
   ```bash
   composer install
   npm install
   ```

2. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

3. **Kompilasi Aset Vite**:
   ```bash
   npm run build
   # atau untuk mode live reload pengembangan:
   npm run dev
   ```

4. **Jalankan Development Server**:
   ```bash
   php artisan serve
   ```
   Buka peramban di `http://127.0.0.1:8000`.
