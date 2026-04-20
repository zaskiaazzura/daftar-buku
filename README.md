# Sistem Daftar Buku

Aplikasi web berbasis Laravel untuk mengelola daftar buku dengan fitur CRUD lengkap (Create, Read, Update, Delete). Dibangun menggunakan Laravel dengan database MySQL.

---

## Tampilan Aplikasi

| Halaman | Deskripsi |
|--------|-----------|
| Daftar Buku | Menampilkan semua data buku dalam bentuk tabel |
| Tambah Buku | Form untuk menambahkan buku baru |
| Edit Buku | Form untuk mengubah data buku yang sudah ada |
| Detail Buku | Menampilkan informasi lengkap satu buku |

---

## Fitur

- 1. Menampilkan daftar semua buku beserta cover, rating, dan status
- 2. Menambahkan buku baru dengan upload gambar cover
- 3. Mengedit data buku
- 4. Menghapus buku
- 5. Melihat detail lengkap buku
- 6. Melacak status baca: **Want to Read**, **Currently Reading**, **Finished**
- 7. Mencatat tanggal mulai dan selesai membaca
- 8. Memberikan rating buku (1–5 bintang)
- 9. Validasi form input
- 10. Notifikasi pesan sukses dan error

---

## Teknologi yang Digunakan

- **Framework**: Laravel 12.56.0
- **Bahasa**: PHP 8.2.12 
- **Database**: MySQL

---

## Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan sistem kamu memiliki:

- PHP >= 8.1
- Composer
- MySQL >= 5.7 atau MariaDB
- Node.js & NPM (opsional, untuk aset frontend)
- Web Server: Apache / Nginx (atau gunakan `php artisan serve`)

---

## Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/zaskiaazzura/daftar-buku.git
cd daftar-buku
```

### 2. Install Dependency PHP

```bash
composer install
```

### 3. Salin File Environment

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Buka file `.env` dan sesuaikan pengaturan database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_book
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Buat Database

Buat database baru di MySQL dengan nama sesuai `DB_DATABASE` di atas:

```sql
CREATE DATABASE crud_book;
```

### 7. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 8. (Opsional) Jalankan Seeder

Untuk mengisi data awal/contoh:

```bash
php artisan db:seed
```

Atau keduanya sekaligus:

```bash
php artisan migrate --seed
```

### 9. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://127.0.0.1:8000**

---

## Struktur Database

Nama database: `crud_book` — Nama tabel: `books`

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|-------|------|------|---------|------------|
| 1 | `id` | bigint(20) UNSIGNED | Tidak | — | Primary key, auto increment |
| 2 | `title` | varchar(255) | Ya | NULL | Judul buku |
| 3 | `author` | varchar(255) | Tidak | — | Nama pengarang |
| 4 | `genre` | varchar(255) | Tidak | — | Genre/kategori buku |
| 5 | `pages` | int(10) UNSIGNED | Tidak | — | Jumlah halaman |
| 6 | `cover` | varchar(255) | Ya | NULL | Path gambar sampul buku |
| 7 | `status` | enum('want_to_read', 'currently_reading', 'finished') | Tidak | `want_to_read` | Status membaca |
| 8 | `started_at` | date | Ya | NULL | Tanggal mulai membaca |
| 9 | `finished_at` | date | Ya | NULL | Tanggal selesai membaca |
| 10 | `rating` | int(11) | Ya | NULL | Rating buku (1–5) |
| 11 | `created_at` | timestamp | Ya | NULL | Waktu data dibuat |
| 12 | `updated_at` | timestamp | Ya | NULL | Waktu data diubah |

---

## Struktur Direktori Proyek

```
daftar-buku/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │       └── BookController.php   # Controller utama CRUD buku
│   └── Models/
│       └── Book.php                 # Model buku
├── database/
│   ├── migrations/
│       └── 2026_04_18_172234_create_books_table.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php        # Template layout utama
│       └── books/
│           ├── index.blade.php      # Halaman daftar buku
│           ├── create.blade.php     # Halaman tambah buku
│           ├── edit.blade.php       # Halaman edit buku
│           └── show.blade.php       # Halaman detail buku
├── routes/
│   └── web.php                      # Definisi route aplikasi
├── .env.example
├── composer.json
└── README.md
```

---

## Daftar Route

| Method | URI | Controller Method | Keterangan |
|--------|-----|-------------------|------------|
| GET | `/books` | `index` | Menampilkan daftar buku |
| GET | `/books/create` | `create` | Form tambah buku |
| POST | `/books` | `store` | Simpan buku baru |
| GET | `/books/{id}` | `show` | Detail buku |
| GET | `/books/{id}/edit` | `edit` | Form edit buku |
| PUT/PATCH | `/books/{id}` | `update` | Update data buku |
| DELETE | `/books/{id}` | `destroy` | Hapus buku |

Route ini menggunakan **Resource Controller** Laravel:

```php
// routes/web.php
Route::resource('books', BookController::class);
```

---

## Penggunaan Aplikasi

1. **Melihat Daftar Buku** — Buka halaman utama `/books` untuk melihat semua buku beserta cover, status, dan rating.
2. **Menambah Buku** — Klik tombol **Tambah Buku**, isi form (title, author, genre, pages, cover, status, dll), lalu klik **Simpan**.
3. **Melihat Detail** — Klik tombol **Detail** pada baris buku untuk melihat informasi lengkap.
4. **Mengedit Buku** — Klik tombol **Edit**, ubah data yang diperlukan, lalu klik **Update**.
5. **Menghapus Buku** — Klik tombol **Hapus** (ikon tempat sampah) dan konfirmasi penghapusan pada dialog yang muncul.
6. **Update Status Baca** — Saat mulai membaca, ubah status ke `Currently Reading` dan isi `started_at`. Setelah selesai, ubah ke `Finished`, isi `finished_at`, dan berikan rating.
