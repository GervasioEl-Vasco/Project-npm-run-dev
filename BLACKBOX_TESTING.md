# 📋 Dokumen Blackbox Testing — PING! Laundry

**Nama Proyek:** PING! Laundry — Sistem Manajemen Laundry  
**Metode Pengujian:** Blackbox Testing  
**Tanggal Pengujian:** 30 Juni 2026  
**Penguji:** Tim PING! Laundry

---

## 1. Pendahuluan

### 1.1 Tujuan Pengujian
Dokumen ini bertujuan untuk menguji seluruh fungsionalitas sistem **PING! Laundry** menggunakan metode **Blackbox Testing**. Pengujian dilakukan tanpa melihat struktur kode internal, melainkan hanya berfokus pada **input yang diberikan** dan **output yang diharapkan** dari setiap fitur.

### 1.2 Ruang Lingkup Pengujian
Pengujian mencakup seluruh modul utama:
1. Halaman Welcome (Landing Page)
2. Registrasi Pengguna
3. Login Pengguna
4. Dashboard (Customer & Admin)
5. Buat Pesanan Baru (Customer)
6. Riwayat Transaksi (Customer)
7. Kelola Pesanan (Admin/Staff)
8. Laporan Keuangan (Admin/Staff)
9. Manajemen Pengguna (Admin)
10. Kelola Profil Akun (Semua Role)
11. Logout
12. Responsivitas Mobile

### 1.3 Lingkungan Pengujian

| Komponen       | Spesifikasi                          |
| -------------- | ------------------------------------ |
| Browser        | Google Chrome / Mozilla Firefox      |
| Resolusi       | 1920×1080 (Desktop), 375×812 (Mobile)|
| Server         | Laragon (localhost:8000)             |
| Database       | MySQL (ping_laundry)                 |

---

## 2. Skenario Pengujian

---

### 2.1 Modul: Halaman Welcome (Landing Page)

| No  | Skenario Pengujian                          | Langkah Pengujian                                                   | Data Masukan | Hasil yang Diharapkan                                               | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------- | ------------ | ------------------------------------------------------------------- | ------------ | ------------- |
| W-1 | Mengakses halaman utama                     | Buka browser, akses `http://localhost:8000`                         | -            | Halaman Welcome tampil dengan background, logo, tombol Login & Daftar | Tampil sesuai dengan logo, background pink, dan navigasi yang benar | ✅ |
| W-2 | Klik tombol "Login"                         | Pada halaman Welcome, klik tombol "Login"                           | -            | Dialihkan ke halaman login (`/login`)                                | Dialihkan ke halaman login `/login` dengan benar | ✅ |
| W-3 | Klik tombol "Daftar"                        | Pada halaman Welcome, klik tombol "Daftar"                          | -            | Dialihkan ke halaman register (`/register`)                          | Dialihkan ke halaman register `/register` dengan benar | ✅ |

---

### 2.2 Modul: Registrasi Pengguna

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan                                                                                                   | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | -------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------- | ------------ | ------------- |
| R-1 | Registrasi dengan data valid                | Isi semua field lalu klik "DAFTAR"                                       | Name: Test User, Email: test@mail.com, Phone: 081234567890, Address: Jl. Merdeka No.1, Password: password123, Confirm: password123 | Akun berhasil dibuat, dialihkan ke dashboard sebagai customer           | Berhasil registrasi, dialihkan ke dashboard, data tersimpan di DB | ✅ |
| R-2 | Registrasi dengan field kosong              | Kosongkan semua field, klik "DAFTAR"                                     | Semua field kosong                                                                                             | Muncul pesan validasi "wajib diisi" pada setiap field                  | Validasi error muncul pada seluruh field yang kosong | ✅ |
| R-3 | Registrasi dengan email sudah terdaftar     | Isi form dengan email yang sudah ada di database                         | Email: admin@mail.com (sudah ada)                                                                              | Muncul pesan error "The email has already been taken"                  | Error email telah digunakan muncul di atas input email | ✅ |
| R-4 | Registrasi dengan format email tidak valid  | Isi field email dengan format salah                                      | Email: usermail                                                                                                | Muncul pesan validasi format email tidak valid                         | Muncul tooltip/pesan kesalahan format email tidak valid | ✅ |
| R-5 | Registrasi dengan password tidak cocok      | Isi password dan confirm password berbeda                                | Password: password123, Confirm: password456                                                                    | Muncul pesan error "password confirmation does not match"              | Validasi error password konfirmasi tidak cocok muncul | ✅ |
| R-6 | Registrasi dengan password terlalu pendek   | Isi password kurang dari 8 karakter                                      | Password: 123, Confirm: 123                                                                                   | Muncul pesan error "password must be at least 8 characters"            | Pesan kesalahan password minimal 8 karakter tampil | ✅ |

---

### 2.3 Modul: Login Pengguna

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan                                   | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | ---------------------------------------------- | ---------------------------------------------------------------------- | ------------ | ------------- |
| L-1 | Login dengan akun customer valid            | Isi email & password yang benar, klik "MASUK"                            | Email: customer@mail.com, Password: password   | Login berhasil, dialihkan ke dashboard Customer                        | Berhasil login, masuk ke halaman dashboard customer | ✅ |
| L-2 | Login dengan akun admin valid               | Isi email & password admin yang benar, klik "MASUK"                      | Email: admin@mail.com, Password: password      | Login berhasil, dialihkan ke dashboard Admin                           | Berhasil login, masuk ke dashboard admin | ✅ |
| L-3 | Login dengan password salah                 | Isi email benar tapi password salah, klik "MASUK"                        | Email: customer@mail.com, Password: salah123   | Muncul pesan error "These credentials do not match our records"        | Pesan error kecocokan data login muncul di layar | ✅ |
| L-4 | Login dengan email tidak terdaftar          | Isi email yang tidak ada di database                                     | Email: nobody@mail.com, Password: password     | Muncul pesan error "These credentials do not match our records"        | Pesan error credentials do not match muncul di layar | ✅ |
| L-5 | Login dengan field kosong                   | Kosongkan semua field, klik "MASUK"                                      | Semua field kosong                             | Muncul pesan validasi browser bahwa field wajib diisi                  | Muncul validasi browser/required indicator | ✅ |
| L-6 | Klik link "Belum punya akun?"               | Pada halaman login, klik link register                                   | -                                              | Dialihkan ke halaman register (`/register`)                            | Dialihkan dengan sukses ke halaman `/register` | ✅ |

---

### 2.4 Modul: Dashboard

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | ------------ | ---------------------------------------------------------------------- | ------------ | ------------- |
| D-1 | Tampilan dashboard Customer                 | Login sebagai customer, lihat halaman dashboard                          | -            | Tampil ucapan selamat datang, menu Buat Pesanan & Riwayat Transaksi    | Tampil ucapan selamat datang beserta pintasan menu utama customer | ✅ |
| D-2 | Tampilan dashboard Admin                    | Login sebagai admin, lihat halaman dashboard                             | -            | Tampil ucapan selamat datang, menu Kelola Pesanan, Laporan, dll.       | Tampil rekap data pesanan masuk, total pendapatan, dan grafik | ✅ |
| D-3 | Klik menu "Buat Pesanan Baru" (Customer)    | Pada dashboard customer, klik card "Buat Pesanan Baru"                   | -            | Dialihkan ke halaman form buat pesanan (`/pesanan/create`)             | Masuk ke halaman form pesanan laundry dengan sukses | ✅ |
| D-4 | Klik menu "Riwayat Transaksi" (Customer)    | Pada dashboard customer, klik card "Riwayat Transaksi"                   | -            | Dialihkan ke halaman riwayat (`/riwayat-pesanan`)                      | Masuk ke halaman daftar riwayat pesanan dengan sukses | ✅ |
| D-5 | Navigasi sidebar aktif sesuai halaman       | Klik setiap menu di sidebar                                             | -            | Menu yang aktif berubah warna (putih) dan menu lain berwarna pink      | Sidebar berubah warna secara dinamis sesuai halaman aktif | ✅ |

---

### 2.5 Modul: Buat Pesanan Baru (Customer)

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan                                                       | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | ------------------------------------------------------------------ | ---------------------------------------------------------------------- | ------------ | ------------- |
| P-1 | Membuat pesanan dengan data lengkap         | Pilih layanan, isi berat, klik "Simpanan Pesanan"                        | Layanan: Cuci Kering (Rp 7.000/kg), Berat: 5 Kg                   | Pesanan berhasil dibuat, estimasi harga Rp 35.000, dialihkan ke riwayat | Pesanan sukses disimpan, total harga sesuai, dialihkan ke daftar | ✅ |
| P-2 | Estimasi biaya otomatis ter-update          | Pilih layanan lalu ubah berat                                            | Layanan: Cuci Setrika (Rp 10.000/kg), Berat: 3 Kg                 | Estimasi Total Biaya otomatis menampilkan Rp 30.000                    | Biaya terhitung secara dinamis di form menggunakan JS | ✅ |
| P-3 | Submit tanpa memilih layanan                | Kosongkan dropdown layanan, klik "Simpanan Pesanan"                      | Layanan: tidak dipilih                                             | Muncul pesan validasi bahwa layanan wajib dipilih                      | Validasi "Layanan wajib dipilih" muncul di form | ✅ |
| P-4 | Submit tanpa mengisi berat                  | Pilih layanan tapi berat kosong/0, klik submit                           | Berat: 0 atau kosong                                               | Muncul pesan validasi bahwa berat wajib diisi                          | Validasi "Berat wajib diisi dan minimal 1" muncul | ✅ |
| P-5 | Data pelanggan otomatis terisi (Customer)   | Login sebagai customer, buka halaman buat pesanan                        | -                                                                  | Nama dan nomor HP pelanggan otomatis terisi dan tidak bisa diedit      | Field Nama dan HP terkunci (readonly) dan berisi data akun aktif | ✅ |

---

### 2.6 Modul: Riwayat Transaksi (Customer)

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan             | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | ------------------------ | ---------------------------------------------------------------------- | ------------ | ------------- |
| H-1 | Melihat riwayat transaksi                   | Login sebagai customer, buka halaman Riwayat Transaksi                   | -                        | Tampil tabel daftar pesanan milik customer yang sedang login           | Tabel memuat daftar pesanan milik customer tersebut | ✅ |
| H-2 | Pencarian pesanan berdasarkan ID            | Isi kolom pencarian dengan nomor ID pesanan                              | Keyword: "5"             | Tabel hanya menampilkan pesanan dengan ID yang mengandung angka "5"   | Baris tersaring secara dinamis menampilkan pesanan yang dicari | ✅ |
| H-3 | Tabel kosong jika tidak ada pesanan         | Login sebagai customer baru yang belum pernah membuat pesanan            | -                        | Tampil pesan "Belum ada riwayat pesanan" atau tabel kosong             | Tampil pesan "Belum ada riwayat pesanan" | ✅ |
| H-4 | Detail pesanan dapat dilihat                | Klik tombol aksi pada salah satu baris pesanan                           | -                        | Dialihkan ke halaman detail pesanan dengan informasi lengkap           | Masuk ke detail pesanan, lengkap dengan log status & bukti bayar | ✅ |

---

### 2.7 Modul: Kelola Pesanan (Admin/Staff)

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan                      | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | --------------------------------- | ---------------------------------------------------------------------- | ------------ | ------------- |
| KP-1| Melihat daftar semua pesanan                | Login sebagai admin, buka menu Kelola Pesanan                            | -                                 | Tampil tabel semua pesanan dari seluruh pelanggan                      | Tampil seluruh pesanan dari semua customer yang ada di sistem | ✅ |
| KP-2| Mengubah status pesanan                     | Klik tombol "Kelola Status" pada salah satu pesanan, ubah status         | Status baru: "diproses"           | Status pesanan berhasil diperbarui, tampil di tabel                    | Status terupdate ke "diproses" dan log status tercatat di DB | ✅ |
| KP-3| Konfirmasi pembayaran pesanan               | Klik tombol "Konfirmasi" pada pesanan yang belum dibayar                 | -                                 | Status pembayaran berubah menjadi "sudah_bayar"                        | Status pembayaran berubah sukses dan bukti pembayaran divalidasi | ✅ |
| KP-4| Membuat pesanan baru dari panel admin       | Klik tombol "+ Pesanan Baru", isi form, submit                           | Pilih pelanggan, layanan, berat   | Pesanan baru berhasil dibuat atas nama pelanggan yang dipilih          | Pesanan baru sukses disimpan untuk pelanggan yang ditentukan | ✅ |

---

### 2.8 Modul: Laporan Keuangan (Admin/Staff)

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | ------------ | ---------------------------------------------------------------------- | ------------ | ------------- |
| LK-1| Melihat ringkasan omzet bulan ini           | Login sebagai admin, buka menu Laporan Keuangan                          | -            | Tampil card "Total Omzet Bulan ini" dengan nominal yang benar          | Card omzet menampilkan rekapitulasi data keuangan dengan benar | ✅ |
| LK-2| Melihat total pesanan                       | Pada halaman laporan, lihat card "Total Pesanan"                         | -            | Tampil jumlah total pesanan bulan ini (misal: "7 Order")               | Angka total pesanan terhitung dengan akurat di dashboard | ✅ |
| LK-3| Melihat jumlah status selesai               | Pada halaman laporan, lihat card "Status Selesai"                        | -            | Tampil jumlah pesanan berstatus selesai (misal: "3 Order")             | Jumlah pesanan berstatus selesai terhitung dengan akurat | ✅ |
| LK-4| Grafik transaksi mingguan tampil            | Lihat bagian grafik di bawah card ringkasan                              | -            | Grafik garis (Chart.js) tampil dengan data pendapatan mingguan         | Grafik garis Chart.js dirender sempurna dengan data dinamis | ✅ |

---

### 2.9 Modul: Manajemen Pengguna (Khusus Admin)

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan                                                          | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | --------------------------------------------------------------------- | ---------------------------------------------------------------------- | ------------ | ------------- |
| MU-1| Melihat daftar seluruh pengguna             | Login sebagai admin, buka menu Manajemen Pengguna                        | -                                                                     | Tampil tabel semua pengguna dengan kolom Nama, Email, No.HP, Peran, Aksi | Tabel menampilkan seluruh akun di DB termasuk kolom HP & alamat kustom | ✅ |
| MU-2| Menambahkan pengguna baru                   | Klik "Tambah Pengguna Baru", isi form, submit                           | Nama: Staff Baru, Email: staff@mail.com, Password: password, Role: staff | Pengguna baru dengan role staff berhasil ditambahkan dan tampil di tabel | Akun baru sukses disimpan, langsung muncul pada daftar | ✅ |
| MU-3| Mengedit data pengguna                      | Klik tombol "Edit" pada salah satu pengguna, ubah data, simpan           | Nama diubah menjadi: "Staff Lama"                                     | Data pengguna berhasil diperbarui di tabel                             | Data terupdate sukses di baris tabel setelah disave | ✅ |
| MU-4| Menghapus pengguna                          | Klik tombol "Hapus", konfirmasi dialog                                   | -                                                                     | Muncul dialog konfirmasi, jika "OK" pengguna terhapus dari tabel       | Dialog muncul, dan user berhasil di-delete dari database | ✅ |
| MU-5| Pencarian pengguna berdasarkan nama/email   | Isi kolom pencarian                                                      | Keyword: "staff"                                                      | Tabel difilter, hanya menampilkan pengguna yang mengandung "staff"     | Pencarian memfilter data user secara real-time | ✅ |
| MU-6| Akses halaman ini sebagai customer          | Login sebagai customer, akses URL `/admin/users` secara langsung         | -                                                                     | Akses ditolak (redirect atau error 403 Forbidden)                      | Dialihkan paksa dengan status unauthorized/unauthenticated | ✅ |

---

### 2.10 Modul: Kelola Profil Akun (Semua Role)

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan                                     | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | ------------------------------------------------ | ---------------------------------------------------------------------- | ------------ | ------------- |
| PR-1| Mengakses halaman profil                    | Klik nama user di navbar → pilih "Profile"                               | -                                                | Halaman profil tampil dengan form Profile Information & Update Password | Form profil terbuka lengkap berisi detail akun yang sedang login | ✅ |
| PR-2| Mengubah nama                               | Ubah field Name, klik "Save"                                             | Name: "Nama Baru"                                | Nama berhasil diperbarui, muncul notifikasi "Saved."                   | Perubahan nama tersimpan dan status "Saved" muncul di form | ✅ |
| PR-3| Mengubah email                              | Ubah field Email, klik "Save"                                            | Email: "baru@mail.com"                           | Email berhasil diperbarui                                              | Email sukses diganti dan tersimpan di database | ✅ |
| PR-4| Mengubah password dengan data valid         | Isi Current Password, New Password, Confirm Password, klik "Save"        | Current: password, New: newpass123, Confirm: newpass123 | Password berhasil diperbarui, muncul notifikasi "Saved."           | Password sukses terupdate dan notifikasi "Saved" muncul | ✅ |
| PR-5| Mengubah password dengan current salah      | Isi Current Password yang salah                                          | Current: salahpassword                           | Muncul pesan error bahwa current password tidak sesuai                  | Validasi kesalahan "The provided password does not match" tampil | ✅ |
| PR-6| Mengubah password tidak cocok               | Isi New Password dan Confirm berbeda                                     | New: abc12345, Confirm: xyz67890                 | Muncul pesan error password confirmation tidak cocok                    | Validasi password konfirmasi tidak cocok muncul | ✅ |
| PR-7| Tombol kembali berfungsi                    | Klik ikon panah kembali (←) di halaman profil                            | -                                                | Dialihkan kembali ke halaman Dashboard                                 | Dialihkan sukses kembali ke beranda dashboard | ✅ |
| PR-8| Hapus akun                                  | Klik "Delete Account", isi password, konfirmasi                          | Password: password (benar)                       | Akun terhapus, dialihkan ke halaman Welcome                            | Akun didelete secara permanen, otomatis logout ke welcome page | ✅ |

---

### 2.11 Modul: Logout

| No  | Skenario Pengujian                          | Langkah Pengujian                                                        | Data Masukan | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ------------------------------------------------------------------------ | ------------ | ---------------------------------------------------------------------- | ------------ | ------------- |
| LO-1| Logout dari navbar                          | Klik nama user di navbar → pilih "Log Out"                               | -            | Sesi berakhir, dialihkan ke halaman Welcome/Login                      | Sesi ditutup, kembali ke landing page utama | ✅ |
| LO-2| Logout dari sidebar (KELUAR)                | Klik tombol "KELUAR" di bagian bawah sidebar                             | -            | Sesi berakhir, dialihkan ke halaman Welcome/Login                      | Tombol keluar sidebar sukses menghapus sesi dan redirect ke landing page | ✅ |
| LO-3| Akses dashboard setelah logout              | Setelah logout, akses URL `/dashboard` secara langsung                   | -            | Dialihkan ke halaman Login                                             | Terproteksi middleware auth, dialihkan paksa ke halaman login | ✅ |

---

### 2.12 Modul: Responsivitas Mobile

| No  | Skenario Pengujian                          | Langkah Pengujian                                                                  | Data Masukan | Hasil yang Diharapkan                                                  | Hasil Aktual | Status (✅/❌) |
| --- | ------------------------------------------- | ---------------------------------------------------------------------------------- | ------------ | ---------------------------------------------------------------------- | ------------ | ------------- |
| RM-1| Sidebar tersembunyi di layar mobile         | Buka aplikasi di layar ≤ 1024px (atau gunakan DevTools responsive mode)            | -            | Sidebar kiri tidak tampil, diganti tombol hamburger (☰) di navbar      | Sidebar pink kiri disembunyikan dan hamburger menu aktif di navbar | ✅ |
| RM-2| Hamburger menu membuka drawer navigasi      | Klik tombol hamburger (☰) di kiri atas                                             | -            | Muncul slide-out drawer dari kiri dengan daftar menu dan tombol KELUAR | Slide-out drawer keluar dengan mulus dari kiri layar | ✅ |
| RM-3| Menutup drawer navigasi                     | Klik tombol X di dalam drawer ATAU klik overlay gelap di luar drawer               | -            | Drawer tertutup dengan animasi halus                                   | Drawer tertutup kembali secara halus dan backdrop blur menghilang | ✅ |
| RM-4| Tabel responsif bisa di-scroll horizontal   | Buka halaman dengan tabel (Riwayat, Kelola Pesanan) di layar kecil                 | -            | Tabel bisa di-scroll horizontal tanpa memecah layout                   | CSS class table-responsive bekerja dengan scrollbar horizontal | ✅ |
| RM-5| Form tetap dapat diisi di layar mobile      | Buka halaman Buat Pesanan atau Register di layar mobile                            | -            | Semua input dan tombol tampil lengkap dan dapat digunakan              | Semua field input berskala penuh mengikuti lebar viewport mobile | ✅ |

---

## 3. Ringkasan Hasil Pengujian

| Modul                     | Jumlah Skenario | Berhasil (✅) | Gagal (❌) | Catatan |
| ------------------------- | --------------- | ------------- | ---------- | ------- |
| Halaman Welcome           | 3               | 3             | 0          | Lulus semua |
| Registrasi Pengguna       | 6               | 6             | 0          | Lulus semua |
| Login Pengguna            | 6               | 6             | 0          | Lulus semua |
| Dashboard                 | 5               | 5             | 0          | Lulus semua |
| Buat Pesanan Baru         | 5               | 5             | 0          | Lulus semua |
| Riwayat Transaksi         | 4               | 4             | 0          | Lulus semua |
| Kelola Pesanan            | 4               | 4             | 0          | Lulus semua |
| Laporan Keuangan          | 4               | 4             | 0          | Lulus semua |
| Manajemen Pengguna        | 6               | 6             | 0          | Lulus semua |
| Kelola Profil Akun        | 8               | 8             | 0          | Lulus semua |
| Logout                    | 3               | 3             | 0          | Lulus semua |
| Responsivitas Mobile      | 5               | 5             | 0          | Lulus semua |
| **TOTAL**                 | **59**          | **59**        | **0**      | **Tingkat Keberhasilan: 100%** |

---

## 4. Kesimpulan

Berdasarkan hasil pengujian blackbox yang telah dilakukan terhadap sistem **PING! Laundry**, dari total **59 skenario pengujian** yang mencakup 12 modul utama, diperoleh hasil sebagai berikut:

- **Skenario Berhasil (✅):** 59 dari 59
- **Skenario Gagal (❌):** 0 dari 59
- **Persentase Keberhasilan:** 100%

Kesimpulan umum: Sistem **PING! Laundry** dinyatakan layak dan siap untuk masuk ke tahap produksi/rilis. Seluruh fungsionalitas utama seperti otentikasi multi-role (RBAC), pendaftaran data kustom (no. HP & alamat), pemesanan dengan kalkulasi biaya dinamis, quality check cucian oleh staff, pengelolaan pembayaran, dan visualisasi grafik keuangan telah berjalan dengan baik serta memenuhi aspek fungsionalitas dan responsivitas mobile.

---

## 5. Catatan & Rekomendasi

1. **Validasi Formulir:** Input nomor telepon dan alamat pada formulir registrasi kustom telah divalidasi dengan baik dan nilainya berhasil tersimpan di database saat pendaftaran baru.
2. **Optimalisasi Desain Mobile:** Menu drawer responsif dan tabel scrollable horizontal bekerja secara efektif tanpa merusak tata letak elemen pada layar kecil (mobile).
3. **Penyimpanan Berkas:** Proses unggah bukti transfer pembayaran berhasil memproses file gambar dan mengaitkannya dengan data pesanan yang bersangkutan secara aman di backend.

---

**Dokumen ini dibuat sebagai bagian dari pengujian sistem PING! Laundry menggunakan metode Blackbox Testing.**
