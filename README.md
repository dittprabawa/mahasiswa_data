# Sistem Informasi Data Mahasiswa

Aplikasi web sederhana untuk mengelola data mahasiswa beserta nilainya, dibangun menggunakan **Laravel**. Menyediakan REST API dan antarmuka web dengan sistem login berbasis role (Admin & Mahasiswa).

## ✨ Fitur

- **REST API** CRUD lengkap untuk data Mahasiswa dan Nilai
- **Tampilan Web** (Blade + Bootstrap) untuk melihat dan mengelola data
- **Relasi antar tabel** — satu mahasiswa memiliki banyak nilai (one-to-many)
- **Autentikasi & Role**:
  - **Admin** — dapat menambah, mengubah, dan menghapus data
  - **Mahasiswa** — hanya dapat melihat data
- **Validasi form** dengan feedback error per-field
- Notifikasi sukses setelah aksi tambah/edit/hapus data

## 🛠️ Teknologi

- [Laravel](https://laravel.com/) — PHP Framework
- MySQL (via XAMPP)
- Bootstrap 5 & Bootstrap Icons
- Blade Templating

## 📋 Struktur Data

**Mahasiswa**
| Kolom | Tipe |
|---|---|
| nim | string, unique |
| nama | string |
| jurusan | string |
| angkatan | year |
| email | string, nullable |

**Nilai** (relasi `belongsTo` Mahasiswa)
| Kolom | Tipe |
|---|---|
| mahasiswa_id | foreign key |
| mata_kuliah | string |
| nilai | integer |

## 🚀 Instalasi

1. Clone repository ini
   ```bash
   git clone https://github.com/dittprabawa/mahasiswa_data
   cd mahasiswa_data
   ```

2. Install dependency PHP
   ```bash
   composer install
   ```

3. Salin file environment dan atur konfigurasi database
   ```bash
   cp .env.example .env
   ```
   Sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di file `.env` dengan pengaturan MySQL/XAMPP Anda.

4. Generate application key
   ```bash
   php artisan key:generate
   ```

5. Jalankan migration
   ```bash
   php artisan migrate
   ```

6. Buat akun admin (opsional, lewat Tinker)
   ```bash
   php artisan tinker
   ```
   ```php
   App\Models\User::create([
       'name' => 'Admin',
       'email' => 'admin@mahasiswa.test',
       'password' => bcrypt('admin123'),
       'role' => 'admin',
   ]);
   ```

7. Jalankan server
   ```bash
   php artisan serve
   ```

8. Buka aplikasi di browser
   ```
   http://127.0.0.1:8000
   ```

## 🔌 Endpoint API

| Method | Endpoint | Keterangan |
|---|---|---|
| GET | `/api/mahasiswa` | Lihat semua data mahasiswa |
| POST | `/api/mahasiswa` | Tambah data mahasiswa |
| GET | `/api/mahasiswa/{id}` | Lihat detail 1 mahasiswa |
| PUT/PATCH | `/api/mahasiswa/{id}` | Update data mahasiswa |
| DELETE | `/api/mahasiswa/{id}` | Hapus data mahasiswa |
| GET | `/api/nilai` | Lihat semua data nilai |
| POST | `/api/nilai` | Tambah data nilai |
| GET | `/api/nilai/{id}` | Lihat detail 1 nilai |
| PUT/PATCH | `/api/nilai/{id}` | Update data nilai |
| DELETE | `/api/nilai/{id}` | Hapus data nilai |

Contoh request body untuk `POST /api/mahasiswa`:
```json
{
    "nim": "12345678",
    "nama": "Raditya",
    "jurusan": "Teknik Informatika",
    "angkatan": "2023",
    "email": "raditya@example.com"
}
```

## 🌐 Halaman Web

| Route | Akses | Keterangan |
|---|---|---|
| `/login` | Publik | Halaman login |
| `/mahasiswa` | Admin & Mahasiswa | Daftar semua mahasiswa |
| `/mahasiswa/{id}` | Admin & Mahasiswa | Detail mahasiswa + daftar nilai |
| `/mahasiswa/create` | Admin only | Form tambah mahasiswa |
| `/mahasiswa/{id}/edit` | Admin only | Form edit mahasiswa |

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran.
