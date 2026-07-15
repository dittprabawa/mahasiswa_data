# 🎓 Sistem Informasi Data Mahasiswa

Aplikasi web berbasis **Laravel** untuk mengelola data mahasiswa — mulai dari pencatatan, pencarian, hingga manajemen nilai — lengkap dengan sistem autentikasi dan pembagian akses berdasarkan peran (role).

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=flat&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=flat)

---

## ✨ Fitur

- 🔐 **Autentikasi & Otorisasi** — Login/logout dengan pembagian akses admin dan mahasiswa
- 👨‍🎓 **CRUD Data Mahasiswa** — Tambah, lihat, ubah, dan hapus data mahasiswa
- 🛡️ **Role-based Access Control** — Hanya admin yang bisa menambah, mengedit, dan menghapus data
- 📊 **Relasi Nilai** — Setiap mahasiswa terhubung dengan data nilai akademik
- 🌐 **REST API** — Endpoint API terpisah untuk integrasi dengan aplikasi lain
- 🎨 **Tampilan Responsif** — Dibangun dengan Bootstrap 5 & Bootstrap Icons

---

## 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi |
|---|---|
| Backend | Laravel 11 (PHP 8.2+) |
| Frontend | Blade Template, Bootstrap 5, Bootstrap Icons |
| Database | MySQL / MariaDB |
| Autentikasi | Custom Auth Middleware |

---

## 📋 Prasyarat

Pastikan sudah terinstall di komputer kamu:

- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Node.js & NPM *(opsional, untuk asset build)*

---

## 🚀 Instalasi

1. **Clone repository ini**
   ```bash
   git clone https://github.com/USERNAME/NAMA-REPO.git
   cd NAMA-REPO
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Salin file environment**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Konfigurasi database**

   Buka file `.env` dan sesuaikan konfigurasi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Jalankan migrasi database**
   ```bash
   php artisan migrate
   ```

   *(Opsional, jika tersedia)* jalankan seeder untuk data contoh:
   ```bash
   php artisan db:seed
   ```

7. **Jalankan server lokal**
   ```bash
   php artisan serve
   ```

   Buka browser dan akses:
   ```
   http://127.0.0.1:8000
   ```

---

## 📂 Struktur Route

| Method | Endpoint | Akses | Keterangan |
|---|---|---|---|
| GET | `/login` | Publik | Halaman login |
| GET | `/mahasiswa` | Login | Daftar mahasiswa |
| GET | `/mahasiswa/{id}` | Login | Detail mahasiswa |
| GET | `/mahasiswa/create` | Admin | Form tambah mahasiswa |
| POST | `/mahasiswa` | Admin | Simpan mahasiswa baru |
| GET | `/mahasiswa/{id}/edit` | Admin | Form edit mahasiswa |
| PUT | `/mahasiswa/{id}` | Admin | Update data mahasiswa |
| DELETE | `/mahasiswa/{id}` | Admin | Hapus data mahasiswa |
| GET/POST/PUT/DELETE | `/api/mahasiswa/*` | API | Endpoint REST API |

---

## 🔑 Role Pengguna

| Role | Hak Akses |
|---|---|
| **Admin** | Lihat, tambah, edit, dan hapus data mahasiswa |
| **Mahasiswa** | Hanya bisa melihat data mahasiswa |

---

## 🤝 Kontribusi

Kontribusi selalu terbuka! Kalau ingin berkontribusi:

1. Fork repository ini
2. Buat branch baru (`git checkout -b fitur-baru`)
3. Commit perubahan kamu (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buka Pull Request

---

## 📄 Lisensi

Project ini menggunakan lisensi [MIT](LICENSE).

---

<p align="center">Dibuat dengan ❤️ menggunakan Laravel</p>
