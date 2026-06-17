# Company Profile PT ABC President Indonesia

## Deskripsi Proyek

Website Company Profile PT ABC President Indonesia yang dikembangkan menggunakan Laravel 12 dan MySQL. Website ini menyediakan informasi perusahaan, produk, berita, galeri kegiatan perusahaan, serta fitur contact form yang terhubung ke dashboard admin.

## Nama Mahasiswa

Cecep Rukmana

## Teknologi yang Digunakan

- Laravel 12
- PHP 8
- MySQL
- Bootstrap 5
- GitHub

## Fitur Website

### Frontend

- Home
- About Us
- Product
- News
- Gallery
- Contact Us

### Backend / Admin Panel

- Login Admin
- Dashboard Statistik
- CRUD Produk
- CRUD Berita
- CRUD Galeri
- Company Profile Management
- Pesan Masuk dari Contact Form

## Struktur Database

Database: `company_profile`

Tabel utama:

- products
- news
- galleries
- company_profiles
- contact_messages
- users

## Cara Menjalankan Project

### Clone Repository

```bash
git clone https://github.com/ceceproekmana-cr/company-profile-abc-president.git
```

### Masuk ke Folder Project

```bash
cd company-profile-abc-president
```

### Install Dependency

```bash
composer install
```

### Copy Environment

```bash
copy .env.example .env
```

### Generate Key

```bash
php artisan key:generate
```

### Import Database

Import file:

```text
database/company_profile.sql
```

ke MySQL.

### Jalankan Project

```bash
php artisan serve
```

Website akan berjalan di:

```text
http://127.0.0.1:8000
```

## Repository GitHub

https://github.com/ceceproekmana-cr/company-profile-abc-president

## Fitur Tambahan

- Dashboard Admin Modern
- Hero Section Interaktif
- Statistik Dashboard
- Contact Form dengan Penyimpanan Pesan
- Manajemen Konten Berbasis CRUD

## Author

Cecep Rukmana

UNPAM / Mata Kuliah Rekayasa Web
