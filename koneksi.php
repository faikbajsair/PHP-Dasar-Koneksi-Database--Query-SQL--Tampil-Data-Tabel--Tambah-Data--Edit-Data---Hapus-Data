<?php
// Menyimpan nama host database (biasanya 'localhost' jika database ada di komputer yang sama)
$host = "localhost";

// Menyimpan username untuk login ke database (default XAMPP biasanya 'root')
$username = "root";

// Menyimpan password untuk login ke database (default XAMPP biasanya kosong)
$password = "";

// Menyimpan nama database yang akan digunakan
$database = "db_web2";

// Membuat koneksi ke database menggunakan fungsi mysqli_connect
// Fungsi ini membutuhkan 4 parameter: host, username, password, dan nama database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Mengecek apakah koneksi ke database berhasil atau tidak
// Jika koneksi gagal, maka program akan berhenti dan menampilkan pesan error
if (!$koneksi) {
    // mysqli_connect_error() digunakan untuk menampilkan pesan error dari koneksi
    die("Connection failed: " . mysqli_connect_error());
}
?>