<div align="center">

**Teman Main**   
**(Platform Penitipan & Perawatan Hewan dengan Layanan Home Service)** 

<br>

<img src="unsulbar.png" alt="Logo Kampus" width="100">

<br></br>

**Ayudiah Cinta Putry**    
**D0223019**   

<br>

**Framework Web Based**   
**2025** 

</div>

------

## 👥 **ROLE & FITUR UTAMA**  

### 1. 👩‍💻 **ADMIN**  
- **Manajemen Akun**  
Mengelola data dan status pengguna platform, baik sebagai perawat hewan maupun pemilik hewan.
  - Verifikasi perawat & pemilik hewan
Cek dan setujui data orang yang daftar, biar aman dan jelas.
  - Suspend akun bermasalah  
Nonaktifin akun yang bikin masalah atau melanggar aturan.
- **Manajemen Layanan**  
  - Pantau semua pemesanan layanan  
Admin bisa melihat daftar siapa aja yang pesan layanan, jadwal penitipan/perawatan, dan statusnya (sudah selesai atau belum).

### 2. 😸 **PEMILIK HEWAN**  
- **Profil Hewan**  
Bagian untuk menyimpan informasi tentang hewan peliharaan.
  - Tambah data hewan (jenis, riwayat kesehatan)  
Pemilik bisa isi jenis hewan (kucing, anjing, dll) dan riwayat kesehatannya (misal: pernah sakit apa, udah vaksin belum).
  - Upload foto/vaksin  
Pemilik bisa unggah foto hewan dan bukti vaksin (jika ada), biar perawat tahu kondisi hewannya.
- **Pemesanan**  
  - Pemesanan penitipan/grooming  
Pesan layanan penitipan hewan atau perawatan seperti mandi, potong kuku, dll.
  - Pilih layanan home service  
Kalau nggak bisa datang ke tempat, bisa pilih layanan datang ke rumah.
- **Pembayaran**  
Informasi soal pembayaran.
  - Bayar setelah layanan selesai (cash)  
Pembayaran dilakukan langsung (tunai) setelah layanan selesai dan hewan dikembalikan.
  - Lihat riwayat transaksi  
Pemilik bisa lihat daftar layanan yang pernah dipesan, walaupun pembayarannya dilakukan secara offline.

### 3. 🏡 **LAYANAN HEWAN** *(Perawat)*  
- **Profil Layanan**  
  - Atur jadwal ketersediaan  
Menentukan waktu kapan bisa melayani perawatan hewan, seperti hari dan jam yang siap untuk bekerja.
  - Tentukan area layanan  
Menentukan lokasi atau daerah di mana dapat memberikan layanan perawatan hewan, misalnya kota atau kecamatan tertentu.
- **Manajemen Order**  
  - Terima/tolak permintaan
Memutuskan apakah ingin menerima atau menolak permintaan untuk merawat hewan dari pelanggan.  
  - Update kondisi hewan (foto+laporan)  
Memberikan informasi terbaru tentang kondisi hewan yang dirawat, dengan melampirkan foto dan laporan tentang kesehatan atau perawatannya.
<!-- - **Pendapatan**  
  - Catatan komisi  
encatat berapa banyak komisi yang di dapat dari layanan, seperti penitipan atau grooming hewan.
  - Penarikan dana  
Setelah menerima komisi, Anda bisa menarik uang tersebut jika diperlukan. -->

------


## 🗂️ **TABEL-TABEL DATABASE**  

📄 Tabel: Users (Pengguna)
| Field      | Tipe Data                                           | Deskripsi                                 |
|------------|-----------------------------------------------------|--------------------------------------------|
| user_id    | INT (PK)                                            | ID unik pengguna                           |
| username   | VARCHAR(50)                                         | Nama pengguna                              |
| email      | VARCHAR(100)                                        | Alamat email pengguna                      |
| password   | VARCHAR(255)                                        | Password pengguna                          |
| role       | ENUM('admin', 'pemilik_hewan', 'perawat_hewan')    | Peran pengguna di platform                 |
| status     | ENUM('aktif', 'suspend')                            | Status akun (aktif atau suspend)           |
| created_at | DATETIME                                            | Tanggal pembuatan akun                     |

📄 Tabel: Pets (Hewan Peliharaan)
| Field           | Tipe Data     | Deskripsi                                 |
|-----------------|---------------|--------------------------------------------|
| pet_id          | INT (PK)      | ID unik hewan                              |
| owner_id        | INT (FK)      | ID pemilik hewan (referensi ke Users)      |
| name            | VARCHAR(50)   | Nama hewan                                 |
| species         | VARCHAR(50)   | Jenis hewan (misal: anjing, kucing, dll)   |
| health_history  | TEXT          | Riwayat kesehatan hewan                    |
| photo           | VARCHAR(255)  | Link foto hewan                            |
| vaccination     | TEXT          | Riwayat vaksinasi                          |
| created_at      | DATETIME      | Tanggal pembuatan data hewan               |

📄 Tabel: Services (Layanan)
| Field        | Tipe Data                                       | Deskripsi                          |
|--------------|--------------------------------------------------|-------------------------------------|
| service_id   | INT (PK)                                         | ID unik layanan                     |
| service_type | ENUM('penitipan', 'grooming', 'home_service')   | Jenis layanan                       |
| price        | DECIMAL(10, 2)                                   | Harga layanan                       |
| description  | TEXT                                             | Deskripsi layanan                   |
| created_at   | DATETIME                                         | Tanggal layanan dibuat              |

📄 Tabel: Orders (Pesanan)
| Field        | Tipe Data                                      | Deskripsi                                      |
|--------------|------------------------------------------------|------------------------------------------------|
| order_id     | INT (PK)                                       | ID unik pesanan                                |
| pet_id       | INT (FK)                                       | ID hewan yang dipesan (referensi ke Pets)      |
| service_id   | INT (FK)                                       | ID layanan yang dipesan (referensi ke Services)|
| status       | ENUM('pending', 'in_progress', 'completed')   | Status pesanan                                 |
| service_date | DATETIME                                       | Tanggal dan waktu layanan dilakukan            |
| created_at   | DATETIME                                       | Tanggal pembuatan pesanan                      |

📄 Tabel: Payments (Pembayaran)
| Field          | Tipe Data               | Deskripsi                                                           |
|----------------|-------------------------|----------------------------------------------------------------------|
| payment_id     | INT (PK)                | ID unik pembayaran                                                   |
| order_id       | INT (FK)                | ID pesanan yang dibayar (referensi ke Orders)                       |
| amount         | DECIMAL(10, 2)          | Jumlah yang dibayar saat pengambilan hewan                          |
| payment_status | ENUM('pending', 'paid') | Status pembayaran (pending sampai hewan diambil)                    |
| payment_date   | DATETIME                | Tanggal pembayaran dilakukan, yaitu setelah pemilik mengambil hewan |

<!-- 📄 Tabel: Commissions (Komisi)
| Field         | Tipe Data      | Deskripsi                                                   |
|---------------|----------------|--------------------------------------------------------------|
| commission_id | INT (PK)       | ID unik komisi                                               |
| perawat_id    | INT (FK)       | ID perawat yang menerima komisi (referensi ke Users)         |
| order_id      | INT (FK)       | ID pesanan yang menghasilkan komisi (referensi ke Orders)    |
| amount        | DECIMAL(10, 2) | Jumlah komisi yang diterima                                  |
| paid          | BOOLEAN        | Apakah komisi sudah dibayar atau belum                       |
| created_at    | DATETIME       | Tanggal komisi dicatat                                       |
 -->

------

## 🔗 **Jenis Relasi & Tabel yang Berelasi** 

1. Pemilik dan Hewannya (Users → Pets)

📌 Hubungan: 1 pemilik bisa punya banyak hewan

💡 Misal:

Budi (user) punya 3 hewan: Meong (kucing), Doggy (anjing), dan Tweety (burung)

Di database: Tabel Pets akan punya 3 baris dengan owner_id yang sama (ID Budi)

2. Hewan dan Pesanannya (Pets → Orders)

📌 Hubungan: 1 hewan bisa dapat banyak layanan

💡 Misal:

Meong (kucing) pernah:

Dititipkan 2x

Grooming 1x

Di database: Tabel Orders akan punya 3 baris dengan pet_id yang sama (ID Meong)

3. Layanan dan Pesanan (Services → Orders)

📌 Hubungan: 1 jenis layanan bisa dipesan banyak hewan

💡 Misal:

Layanan "Grooming" bisa dipesan oleh:

Meong (kucing)

Doggy (anjing)

Di database: Tabel Orders akan punya beberapa baris dengan service_id yang sama (ID Grooming)

4. Pesanan dan Pembayaran (Orders → Payments)

📌 Hubungan: 1 pesanan hanya punya 1 pembayaran

💡 Misal:

Pesanan penitipan Meong tanggal 1 Januari:

Dibayar cash Rp100.000 saat diambil

Di database: Tabel Payments punya 1 baris dengan order_id (ID pesanan Meong)
<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->