# Hotel Aryo Booking System

## Deskripsi Proyek

Ini adalah sistem pemesanan kamar untuk Hotel Aryo yang dikembangkan menggunakan Laravel. Sistem ini memungkinkan pengguna untuk melihat daftar kamar, melihat harga kamar, membuat pemesanan, melihat statistik pemesanan, dan mengelola data pemesanan.

## Fitur

-   Halaman Utama: Menampilkan selamat datang dan tautan ke halaman kamar.
-   Daftar Kamar: Menampilkan daftar kamar yang tersedia dengan detail harga dan gambar.
-   Harga Kamar: Menampilkan harga setiap tipe kamar.
-   Tentang Kami: Menampilkan informasi tentang hotel.
-   Pemesanan Kamar: Formulir untuk memesan kamar dengan detail seperti nama, jenis kelamin, nomor identitas, tipe kamar, tanggal booking, durasi, dan pilihan sarapan.
-   Statistik Pemesanan: Menampilkan grafik pemesanan kamar berdasarkan tipe kamar.
-   Daftar Pemesanan: Menampilkan daftar semua pemesanan yang telah dibuat dan opsi untuk menghapus semua pemesanan.

## Struktur Direktori

### app/Http/Controllers

-   BookingController.php: Mengelola pemesanan kamar.
-   RoomController.php: Mengelola halaman kamar dan informasi hotel.

### app/Models

-   Booking.php: Model untuk pemesanan kamar.
-   Room.php: Model untuk kamar.

### database/migrations

-   2024_05_30_000001_create_bookings_table.php: Migrasi untuk tabel pemesanan.
-   2024_05_30_000002_create_rooms_table.php: Migrasi untuk tabel kamar.

### database/seeders

-   RoomSeeder.php: Seeder untuk mengisi tabel kamar dengan data awal.

### resources/views

-   about.blade.php: Halaman tentang kami.
-   bookings.blade.php: Formulir pemesanan kamar.
-   booking.blade.php: Daftar pemesanan.
-   home.blade.php: Halaman utama.
-   prices.blade.php: Daftar harga kamar.
-   rooms.blade.php: Daftar kamar.
-   stats.blade.php: Statistik pemesanan.
-   components/app.blade.php: Template utama dengan navbar.

Kredit
Proyek ini dikembangkan oleh [Farhan Aryo]. Jika Anda memiliki pertanyaan atau masukan, jangan ragu untuk menghubungi saya di [farhanaryop@gmail.com].
