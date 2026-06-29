# PING! Laundry — Sistem Manajemen Laundry

<p align="center">
  <img src="public/images/logo.png" width="350" alt="PING! Laundry Banner">
</p>

**PING! Laundry** adalah sistem manajemen laundry berbasis web yang dibangun menggunakan **Laravel 13** dan **Tailwind CSS**. Sistem ini dirancang untuk membantu pengelola usaha laundry dalam mengelola pesanan, pembayaran, pelanggan, dan laporan keuangan secara digital dengan antarmuka yang modern dan responsif.


## ✨ Fitur Utama

### Umum
- 🔐 Autentikasi pengguna (Login, Register, Logout)
- 👤 Kelola profil akun (ubah nama, email, password, hapus akun)
- 📱 Desain responsif untuk desktop & mobile
- 🎨 Tema premium pink modern dengan background kustom

### Customer
- 🧾 Membuat pesanan laundry baru
- 📋 Melihat riwayat transaksi pribadi
- 🔍 Pencarian & filter riwayat pesanan

### Admin / Staff
- 📦 Kelola seluruh pesanan masuk (lihat, ubah status, konfirmasi)
- 👥 Manajemen pengguna (CRUD: tambah, edit, hapus pengguna)
- 📊 Laporan keuangan & operasional dengan grafik mingguan
- 📜 Riwayat transaksi seluruh pelanggan
- 💳 Kelola pembayaran & konfirmasi pembayaran

---

## 🛠 Tech Stack

| Komponen          | Teknologi                          |
| ----------------- | ---------------------------------- |
| **Framework**     | Laravel 13.x                       |
| **PHP**           | PHP 8.3+                           |
| **Frontend**      | Blade Templates + TailwindCSS 3.x  |
| **JavaScript**    | Alpine.js 3.x                      |
| **Build Tool**    | Vite 8.x                           |
| **Database**      | MySQL                              |
| **Autentikasi**   | Laravel Breeze                     |
| **Grafik**        | Chart.js (CDN)                     |
| **Avatar**        | UI Avatars API                     |

---

## 📦 Prasyarat

Pastikan perangkat Anda telah terinstal:

- **PHP** ≥ 8.3
- **Composer** ≥ 2.x
- **Node.js** ≥ 18.x & **NPM** ≥ 9.x
- **MySQL** ≥ 8.0 (atau MariaDB ≥ 10.6)
- **Laragon** / **XAMPP** / **WAMP** (opsional, sebagai lingkungan pengembangan lokal)
- **Git**

---

## 🚀 Instalasi

### 1. Clone Repositori

```bash
git clone https://github.com/GervasioEl-Vasco/Project-npm-run-dev.git
cd Project-npm-run-dev
```

### 2. Instal Dependensi PHP

```bash
composer install
```

### 3. Instal Dependensi JavaScript

```bash
npm install
```

### 4. Salin File Environment

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Buat Database

Buat database baru di MySQL dengan nama `ping_laundry`:

```sql
CREATE DATABASE ping_laundry;
```

### 7. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 8. (Opsional) Jalankan Seeder

Jika tersedia seeder untuk data awal:

```bash
php artisan db:seed
```

---

## ⚙ Konfigurasi

Edit file `.env` dan sesuaikan pengaturan berikut:

```env
APP_NAME="PING! Laundry"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ping_laundry
DB_USERNAME=root
DB_PASSWORD=
```

---

## ▶ Menjalankan Aplikasi

### Mode Pengembangan (Development)

Jalankan dua terminal secara bersamaan:

**Terminal 1 — Server Laravel:**
```bash
php artisan serve
```

**Terminal 2 — Vite (Asset Bundler):**
```bash
npm run dev
```

Atau gunakan perintah tunggal:
```bash
composer dev
```

Akses aplikasi di: **http://localhost:8000**

### Mode Produksi (Build)

```bash
npm run build
```

---

## 👥 Peran Pengguna (Roles)

Sistem ini mendukung 3 peran pengguna dengan hak akses berbeda:

| Peran        | Kode       | Hak Akses                                                                |
| ------------ | ---------- | ------------------------------------------------------------------------ |
| **Customer** | `customer` | Membuat pesanan, melihat riwayat transaksi pribadi, kelola profil        |
| **Staff**    | `staff`    | Sama seperti Admin (kelola pesanan, riwayat, laporan)                    |
| **Admin**    | `admin`    | Semua fitur Staff + Manajemen Pengguna (CRUD user)                       |

> **Catatan:** Saat mendaftar melalui halaman Register, pengguna secara otomatis mendapatkan role `customer`. Untuk membuat akun Admin/Staff, gunakan fitur Manajemen Pengguna dari akun Admin yang sudah ada atau langsung melalui database.

---

## 📄 Struktur Halaman

### Halaman Publik (Tanpa Login)

| Halaman         | URL           | Deskripsi                                          |
| --------------- | ------------- | -------------------------------------------------- |
| Welcome / Home  | `/`           | Halaman sambutan dengan tombol Login & Register     |
| Login           | `/login`      | Formulir login pengguna                             |
| Register        | `/register`   | Formulir pendaftaran pengguna baru                  |

### Halaman Customer (Setelah Login)

| Halaman              | URL                  | Deskripsi                                       |
| -------------------- | -------------------- | ----------------------------------------------- |
| Dashboard            | `/dashboard`         | Halaman utama dengan menu navigasi cepat        |
| Buat Pesanan Baru    | `/pesanan/create`    | Formulir pembuatan pesanan laundry              |
| Riwayat Transaksi    | `/riwayat-pesanan`   | Daftar seluruh pesanan milik pelanggan           |
| Detail Transaksi     | `/riwayat-pesanan/{id}` | Detail lengkap satu pesanan                  |
| Profil Akun          | `/profile`           | Ubah nama, email, password, atau hapus akun     |

### Halaman Admin / Staff (Setelah Login)

| Halaman              | URL                         | Deskripsi                                      |
| -------------------- | --------------------------- | ---------------------------------------------- |
| Dashboard            | `/dashboard`                | Halaman utama dengan menu navigasi admin       |
| Kelola Pesanan       | `/pesanan`                  | Daftar semua pesanan aktif                     |
| Kelola Status        | `/pesanan/{id}/status`      | Ubah status pesanan                            |
| Riwayat Pesanan      | `/riwayat-pesanan`          | Riwayat seluruh transaksi                      |
| Laporan Keuangan     | `/laporan`                  | Ringkasan omzet, total pesanan & grafik        |
| Manajemen Pengguna   | `/admin/users`              | Daftar seluruh pengguna *(khusus Admin)*       |
| Tambah Pengguna      | `/admin/users/create`       | Formulir tambah pengguna baru *(khusus Admin)* |
| Edit Pengguna        | `/admin/users/{id}/edit`    | Edit data pengguna *(khusus Admin)*            |
| Profil Akun          | `/profile`                  | Ubah nama, email, password, atau hapus akun    |

---

## 🗄 Skema Database

### Tabel `users`

| Kolom               | Tipe Data          | Keterangan                                |
| -------------------- | ------------------ | ----------------------------------------- |
| `id`                | BIGINT (PK, AI)    | Primary key                               |
| `name`              | VARCHAR(255)       | Nama lengkap                              |
| `email`             | VARCHAR(255)       | Email (unik)                              |
| `phone`             | VARCHAR(255)       | Nomor HP (nullable)                       |
| `address`           | VARCHAR(255)       | Alamat rumah (nullable)                   |
| `email_verified_at` | TIMESTAMP          | Waktu verifikasi email (nullable)         |
| `password`          | VARCHAR(255)       | Password (hashed)                         |
| `role`              | ENUM               | `customer`, `staff`, `admin` (default: `customer`) |
| `is_active`         | BOOLEAN            | Status aktif (default: `true`)            |
| `remember_token`    | VARCHAR(100)       | Token "Remember Me"                       |
| `created_at`        | TIMESTAMP          | Waktu dibuat                              |
| `updated_at`        | TIMESTAMP          | Waktu diperbarui                          |

### Tabel `layanan`

| Kolom              | Tipe Data          | Keterangan                                |
| ------------------- | ------------------ | ----------------------------------------- |
| `id`               | BIGINT (PK, AI)    | Primary key                               |
| `nama_layanan`     | VARCHAR(255)       | Nama jenis layanan (Cuci Kering, dll.)    |
| `deskripsi`        | TEXT               | Deskripsi layanan (nullable)              |
| `harga`            | DECIMAL(10,2)      | Harga per satuan                          |
| `satuan`           | VARCHAR(255)       | Satuan penghitungan (default: `kg`)       |
| `estimasi_waktu`   | INT                | Estimasi pengerjaan dalam hari (default: 1) |
| `status_tersedia`  | BOOLEAN            | Ketersediaan layanan (default: `true`)    |
| `created_at`       | TIMESTAMP          | Waktu dibuat                              |
| `updated_at`       | TIMESTAMP          | Waktu diperbarui                          |

### Tabel `pesanan`

| Kolom               | Tipe Data          | Keterangan                                |
| -------------------- | ------------------ | ----------------------------------------- |
| `id`                | BIGINT (PK, AI)    | Primary key                               |
| `user_id`           | BIGINT (FK)        | Relasi ke tabel `users`                   |
| `layanan_id`        | BIGINT (FK)        | Relasi ke tabel `layanan`                 |
| `berat_jumlah`      | INT                | Berat/jumlah cucian                       |
| `total_harga`       | DECIMAL(12,2)      | Total biaya pesanan                       |
| `status_pesanan`    | ENUM               | `menunggu`, `diproses`, `selesai`, `diambil`, `dibatalkan` |
| `status_pembayaran` | ENUM               | `belum_bayar`, `sudah_bayar`              |
| `catatan`           | TEXT               | Catatan tambahan (nullable)               |
| `created_at`        | TIMESTAMP          | Waktu dibuat                              |
| `updated_at`        | TIMESTAMP          | Waktu diperbarui                          |

### Tabel `log_status_pesanan`

| Kolom               | Tipe Data          | Keterangan                                |
| -------------------- | ------------------ | ----------------------------------------- |
| `id`                | BIGINT (PK, AI)    | Primary key                               |
| `pesanan_id`        | BIGINT (FK)        | Relasi ke tabel `pesanan`                 |
| `status_sebelumnya` | VARCHAR(255)       | Status sebelum perubahan (nullable)       |
| `status_baru`       | VARCHAR(255)       | Status baru setelah perubahan             |
| `keterangan`        | TEXT               | Keterangan perubahan (nullable)           |
| `created_at`        | TIMESTAMP          | Waktu dibuat                              |
| `updated_at`        | TIMESTAMP          | Waktu diperbarui                          |

### Tabel `pengecekan`

| Kolom               | Tipe Data          | Keterangan                                |
| -------------------- | ------------------ | ----------------------------------------- |
| `id`                | BIGINT (PK, AI)    | Primary key                               |
| `pesanan_id`        | BIGINT (FK)        | Relasi ke tabel `pesanan`                 |
| `hasil_cek`         | VARCHAR(255)       | Hasil pemeriksaan barang                  |
| `catatan_kerusakan` | TEXT               | Catatan kerusakan barang (nullable)       |
| `created_at`        | TIMESTAMP          | Waktu dibuat                              |
| `updated_at`        | TIMESTAMP          | Waktu diperbarui                          |

### Tabel `pembayaran`

| Kolom               | Tipe Data          | Keterangan                                |
| -------------------- | ------------------ | ----------------------------------------- |
| `id`                | BIGINT (PK, AI)    | Primary key                               |
| `pesanan_id`        | BIGINT (FK)        | Relasi ke tabel `pesanan`                 |
| `nominal`           | DECIMAL(12,2)      | Jumlah nominal bayar                      |
| `metode_pembayaran` | VARCHAR(255)       | Metode (default: `tunai`)                 |
| `bukti_bayar`       | VARCHAR(255)       | Path file bukti pembayaran (nullable)     |
| `status`            | ENUM               | `menunggu_konfirmasi`, `berhasil`, `gagal`|
| `created_at`        | TIMESTAMP          | Waktu dibuat                              |
| `updated_at`        | TIMESTAMP          | Waktu diperbarui                          |

### Diagram Relasi Antar Tabel

```
┌──────────┐       ┌──────────┐       ┌────────────┐
│  users   │──1:N──│ pesanan  │──1:N──│ pembayaran │
└──────────┘       └──────────┘       └────────────┘
                        │
                   ┌────┴────┐
                   │         │
              ┌────▼───┐ ┌──▼──────────────┐
              │pengecekan│ │log_status_pesanan│
              └─────────┘ └─────────────────┘
                        │
                   ┌────▼────┐
                   │ layanan │
                   └─────────┘
```

---

## 🔗 Daftar Route

### Route Publik

| Metode | URL            | Deskripsi            |
| ------ | -------------- | -------------------- |
| GET    | `/`            | Halaman Welcome      |
| GET    | `/login`       | Halaman Login        |
| POST   | `/login`       | Proses Login         |
| GET    | `/register`    | Halaman Register     |
| POST   | `/register`    | Proses Registrasi    |

### Route Terautentikasi (Memerlukan Login)

| Metode | URL                                   | Controller                   | Deskripsi                    |
| ------ | ------------------------------------- | ---------------------------- | ---------------------------- |
| GET    | `/dashboard`                          | Closure (view)               | Halaman Dashboard            |
| GET    | `/profile`                            | ProfileController@edit       | Halaman edit profil          |
| PATCH  | `/profile`                            | ProfileController@update     | Simpan perubahan profil      |
| DELETE | `/profile`                            | ProfileController@destroy    | Hapus akun                   |
| GET    | `/pesanan`                            | PesananController@index      | Daftar semua pesanan         |
| GET    | `/pesanan/create`                     | PesananController@create     | Form buat pesanan baru       |
| POST   | `/pesanan`                            | PesananController@store      | Simpan pesanan baru          |
| GET    | `/pesanan/{pesanan}`                  | PesananController@show       | Detail pesanan               |
| GET    | `/pesanan/{pesanan}/status`           | StatusPesananController@edit | Form ubah status pesanan     |
| PATCH  | `/pesanan/{pesanan}/status`           | StatusPesananController@update| Simpan perubahan status     |
| GET    | `/riwayat-pesanan`                    | OrderHistoryController@index | Riwayat pesanan              |
| GET    | `/riwayat-pesanan/{pesanan}`          | OrderHistoryController@show  | Detail riwayat pesanan       |
| GET    | `/pembayaran`                         | PembayaranController@index   | Daftar pembayaran            |
| GET    | `/pesanan/{pesanan}/pembayaran/create`| PembayaranController@create  | Form pembayaran              |
| POST   | `/pesanan/{pesanan}/pembayaran`       | PembayaranController@store   | Simpan pembayaran            |
| GET    | `/pembayaran/{pembayaran}`            | PembayaranController@show    | Detail pembayaran            |
| PATCH  | `/pembayaran/{pembayaran}/konfirmasi` | PembayaranController@konfirmasi| Konfirmasi pembayaran      |
| GET    | `/laporan`                            | LaporanController@index      | Laporan keuangan             |

### Route Admin (Memerlukan Middleware `admin`)

| Metode | URL                          | Controller                     | Deskripsi              |
| ------ | ---------------------------- | ------------------------------ | ---------------------- |
| GET    | `/admin/users`               | UserManagementController@index | Daftar pengguna        |
| GET    | `/admin/users/create`        | UserManagementController@create| Form tambah pengguna   |
| POST   | `/admin/users`               | UserManagementController@store | Simpan pengguna baru   |
| GET    | `/admin/users/{user}/edit`   | UserManagementController@edit  | Form edit pengguna     |
| PUT    | `/admin/users/{user}`        | UserManagementController@update| Simpan perubahan       |
| DELETE | `/admin/users/{user}`        | UserManagementController@destroy| Hapus pengguna        |

---

## 📂 Struktur Folder Proyek

```
Project-npm-run-dev/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   └── UserManagementController.php   # CRUD manajemen pengguna
│   │   │   ├── Auth/
│   │   │   │   ├── RegisteredUserController.php   # Registrasi pengguna
│   │   │   │   └── ...                            # Controller auth lainnya
│   │   │   ├── LaporanController.php              # Laporan keuangan & grafik
│   │   │   ├── LayananController.php              # CRUD layanan laundry
│   │   │   ├── OrderHistoryController.php         # Riwayat pesanan
│   │   │   ├── PembayaranController.php           # Kelola pembayaran
│   │   │   ├── PesananController.php              # Kelola pesanan
│   │   │   ├── ProfileController.php              # Kelola profil akun
│   │   │   └── StatusPesananController.php        # Ubah status pesanan
│   │   └── Middleware/                             # Middleware (admin, auth, dll.)
│   └── Models/
│       ├── User.php                               # Model pengguna
│       ├── Layanan.php                            # Model layanan
│       ├── Pesanan.php                            # Model pesanan
│       ├── Pembayaran.php                         # Model pembayaran
│       ├── LogStatus.php                          # Model log status
│       └── Pengecekan.php                         # Model pengecekan
│
├── database/
│   ├── migrations/                                # File migrasi database
│   ├── factories/                                 # Factory untuk testing
│   └── seeders/                                   # Seeder data awal
│
├── public/
│   └── images/
│       ├── bg-landing.png                         # Background halaman Welcome
│       ├── bg-login-reg.png                       # Background halaman Login & Register
│       └── bg-dashboard.png                       # Background halaman Dashboard (dengan logo)
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php                      # Layout utama (dashboard)
│   │   │   ├── guest.blade.php                    # Layout tamu (login, register)
│   │   │   └── navigation.blade.php               # Navbar atas + mobile drawer
│   │   ├── components/
│   │   │   ├── sidebar-customer.blade.php         # Sidebar navigasi customer
│   │   │   └── sidebar-admin.blade.php            # Sidebar navigasi admin/staff
│   │   ├── auth/
│   │   │   ├── login.blade.php                    # Halaman login
│   │   │   └── register.blade.php                 # Halaman registrasi
│   │   ├── dashboard.blade.php                    # Halaman dashboard (role-based)
│   │   ├── welcome.blade.php                      # Halaman landing / sambutan
│   │   ├── pesanan/
│   │   │   ├── index.blade.php                    # Daftar pesanan (admin)
│   │   │   └── create.blade.php                   # Form buat pesanan baru
│   │   ├── history/
│   │   │   └── index.blade.php                    # Riwayat transaksi
│   │   ├── laporan/
│   │   │   └── index.blade.php                    # Laporan keuangan + grafik
│   │   ├── admin/users/
│   │   │   ├── index.blade.php                    # Daftar pengguna
│   │   │   ├── create.blade.php                   # Form tambah pengguna
│   │   │   └── edit.blade.php                     # Form edit pengguna
│   │   └── profile/
│   │       ├── edit.blade.php                     # Halaman kelola profil
│   │       └── partials/
│   │           ├── update-profile-information-form.blade.php
│   │           ├── update-password-form.blade.php
│   │           └── delete-user-form.blade.php
│   ├── css/
│   │   └── app.css                                # Stylesheet utama
│   └── js/
│       └── app.js                                 # JavaScript utama (Alpine.js)
│
├── routes/
│   ├── web.php                                    # Definisi route web
│   └── auth.php                                   # Route autentikasi (Breeze)
│
├── .env.example                                   # Template konfigurasi environment
├── composer.json                                  # Dependensi PHP
├── package.json                                   # Dependensi JavaScript
├── tailwind.config.js                             # Konfigurasi TailwindCSS
├── vite.config.js                                 # Konfigurasi Vite bundler
└── README.md                                      # Dokumentasi ini
```

---

## 🎨 Desain & UI/UX

### Tema Warna

Sistem ini menggunakan palet warna pink premium sebagai identitas brand **PING! Laundry**:

| Elemen              | Warna Hex   | Penggunaan                                |
| ------------------- | ----------- | ----------------------------------------- |
| Pink Utama          | `#d94f87`   | Sidebar, tombol aksi utama, grafik        |
| Pink Lembut         | `#e8a3c0`   | Header tabel, tombol sekunder, badge      |
| Pink Teks           | `#ba2b65`   | Teks tombol, ikon aktif                   |
| Putih               | `#ffffff`   | Card, latar tabel, input                  |
| Abu-abu             | `#6b7280`   | Teks sekunder, placeholder                |

### Komponen Desain

- **Sidebar**: Panel melayang dengan sudut lengkung besar (`rounded-[2.5rem]`), warna pink solid, sticky di sisi kiri
- **Card**: Background putih bersih dengan `rounded-[2rem]`, bayangan `shadow-xl`, dan border pink transparan
- **Tabel**: Header berwarna pink lembut, garis pembatas kolom vertikal, sudut melengkung
- **Input**: Berbentuk kapsul bulat penuh (`rounded-full`) dengan border abu-abu dan fokus ring pink
- **Tombol**: Berbentuk pil (`rounded-full` atau `rounded-xl`) dengan warna pink bervariasi
- **Background**: Gambar kustom `bg-dashboard.png` yang sudah menyertakan logo PING! Laundry

### Responsivitas

- **Desktop (≥1024px)**: Layout sidebar kiri + konten utama kanan, navbar atas transparan
- **Mobile (<1024px)**: Sidebar tersembunyi, digantikan oleh **hamburger menu** yang membuka **slide-out drawer** dari kiri layar dengan animasi halus dan overlay backdrop blur

---

## 🤝 Kontribusi

1. Fork repositori ini
2. Buat branch fitur baru: `git checkout -b fitur/nama-fitur`
3. Commit perubahan: `git commit -m "Menambahkan fitur baru"`
4. Push ke branch: `git push origin fitur/nama-fitur`
5. Buat Pull Request

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

---

<p align="center">
  Dibuat dengan ❤️ oleh Tim <strong>PING! Laundry</strong>
</p>
