
# 🧾 KasirApp

> Sistem Manajemen Penjualan Berbasis Web untuk Toko Ritel

[![Build Status](https://img.shields.io/badge/Laravel-11-brightgreen)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.3-blue)](https://www.php.net)
[![Database](https://img.shields.io/badge/Database-PostgreSQL-orange)](https://www.postgresql.org)

---

## 📌 Deskripsi Singkat

**KasirApp** adalah sistem manajemen penjualan sederhana berbasis web yang membantu toko ritel dalam mengelola transaksi, stok barang, pelanggan, dan laporan keuangan secara efisien dan terpusat.

Dengan antarmuka yang intuitif dan fitur lengkap, aplikasi ini cocok digunakan untuk minimarket, toko kelontong, warung, atau bisnis retail kecil hingga menengah.

---

## 🔧 Teknologi yang Digunakan

| Komponen       | Teknologi   |
| -------------- | ----------- |
| Framework      | Laravel 11  |
| Bahasa Backend | PHP 8.3     |
| Database       | PostgreSQL  |
| Frontend CSS   | TailwindCSS |
| Interaktivitas | JavaScript  |

---

## 📦 Fitur Utama

-   ✅ **Manajemen Produk**: Tambah, edit, hapus produk
-   ✅ **Manajemen Pelanggan**: Simpan data pelanggan loyal
-   ✅ **Transaksi Penjualan**: Proses pembayaran & cetak struk otomatis
-   ✅ **Laporan Penjualan**: Laporan harian, mingguan, bulanan
-   ✅ **Cetak Struk**: Cetak langsung dari browser
-   ✅ **Autentikasi Multi-Level**: Login untuk Admin & Kasir

---

## 📥 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di lingkungan lokal:

### 1. Clone Repository

```bash
git clone https://github.com/lutfi1506/kasir_ujikom.git
cd kasirapp
```

### 2. Install Dependency

```bash
composer install
```

### 3. Salin File Konfigurasi

```bash
cp .env.example .env
```

### 4. Generate App Key

```bash
php artisan key:generate
```

---

## ⚙️ Konfigurasi Tambahan (Database PostgreSQL)

Buka file `.env`, ubah konfigurasi database menjadi seperti berikut:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nama_database_kamu
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

Setelah itu, buat database di PostgreSQL sesuai nama yang kamu tulis.

Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

---

## 🧪 Cara Penggunaan

Aplikasi siap dijalankan:

```bash
php artisan serve
```

### 🔐 Login Default

-   **Email:** `admin@gmail.com`
-   **Password:** `password`

### 🧭 Menu Akses:

-   Dashboard
-   Produk
-   Pelanggan
-   Penjualan
-   Laporan
-   Pengaturan Akun

---

## 🙋‍♂️ Kontribusi

Kami senang jika kamu ingin ikut berkontribusi! Silakan fork repo ini, buat branch baru, dan kirimkan pull request.

---

## 📬 Dukungan

Untuk pertanyaan, bug report, atau permintaan fitur, silakan buka issue di GitHub/GitLab.

---

🎉 Terima kasih telah menggunakan **KasirApp**!  
Semoga aplikasi ini bermanfaat untuk kemajuan bisnismu 😊

---
