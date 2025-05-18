<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📖✨ Buku Tamu SMKN 4 「来訪者の記録」

Selamat datang di proyek Buku Tamu digital untuk SMKN 4! Dibangun dengan teknologi modern dan semangat disiplin ala Jepang, aplikasi ini siap mencatat setiap langkah pengunjung dengan elegan dan efisien.

## 🔧 Fitur 「機能」

* Pengisian buku tamu secara daring dan cepat ⚡
* Panel admin yang intuitif dan penuh kendali 🎛️
* Ekspor data tamu ke Excel (jika tersedia) 📤
* Desain responsif bergaya minimalis ala Tailwind ✨

## 📦 Teknologi yang Digunakan 「使用技術」

* **Bahasa Pemrograman**:

  * PHP 🇯🇵
  * JavaScript
  * HTML & CSS

* **Framework & Library**:

  * Laravel (Backend yang tangguh)
  * Laravel Blade (Mesin template ringan)
  * FilamentPHP v3 (Admin Panel elegan & modern)
  * Tailwind CSS (Gaya UI minimalis Jepang)
  * Laravel Excel (Export data tanpa ribet)

## 🚀 Cara Clone dan Menjalankan Project 「導入手順」

Langkah-langkah untuk menjalankan proyek ini secara lokal:

### 1. Clone Repository

```bash
git clone https://github.com/TokittoChizuru/buku-tamu-smkn4.git
cd buku-tamu-smkn4
```

### 2. Install Dependency

Pastikan Anda telah menginstall [Composer](https://getcomposer.org/) dan [Node.js](https://nodejs.org/).

```bash
composer install
npm install
```

### 3. Salin File .env dan Generate Key

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Atur Database

* Buat database baru, misalnya `buku_tamu`.
* Lalu atur `.env` sesuai:

```
DB_DATABASE=buku_tamu
DB_USERNAME=root
DB_PASSWORD=  # Sesuaikan dengan konfigurasi Anda
```

### 5. Migrasi dan Seeder

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```

### 6. Jalankan Server

```bash
npm run dev
php artisan serve
```

### 7. Masuk Ke Admin Panel

```bash
Email : admin@smkn4.com
Password : admin#1234
```

Akses aplikasi di `http://localhost:8000` 🌐

## 📊 Algoritma Penggunaan 「利用の流れ」

1. **Tamu Tiba di SMKN 4**

   * Buka halaman utama Buku Tamu.
   * Isi formulir (Nama, Instansi, Tujuan, dll).
   * Tekan tombol "Kirim" untuk mencatat kehadiran.

2. **Data Masuk ke Database**

   * Sistem otomatis menyimpan entri ke dalam tabel `tamu`.

3. **Admin Login**

   * Akses dashboard melalui halaman login.
   * Setelah autentikasi, admin bisa melihat dan mengelola data tamu.

4. **Kelola & Ekspor Data**

   * Filter, cari, dan ekspor data sesuai kebutuhan sekolah.

## 🧑‍💻 Kontribusi 「貢献」

Kontribusi sangat dihargai! Buka issue sebelum melakukan perubahan besar. Yuk, bangun proyek ini bersama-sama. 💪

## 📄 Lisensi 「ライセンス」

Proyek ini berada di bawah lisensi MIT. Silakan gunakan dan modifikasi dengan bijak. [MIT license](https://opensource.org/licenses/MIT).

> Dibuat dengan semangat dan presisi ala negeri sakura 🇯🇵 oleh developer penuh dedikasi.
