<?php
// Menghubungkan file ini dengan file koneksi.php untuk akses database
include 'koneksi.php';

// Mengecek apakah parameter 'npm' dikirim melalui URL (metode GET)
if (isset($_GET['npm'])) {
    // Menyimpan nilai 'npm' dari URL ke variabel $npm
    $npm = $_GET['npm'];
    // Membuat perintah SQL untuk menghapus data mahasiswa berdasarkan npm
    $sql = "DELETE FROM mhs WHERE npm='$npm'";
    // Menjalankan perintah SQL di atas pada database
    $query = mysqli_query($koneksi, $sql);
    
    // Mengecek apakah query berhasil dijalankan
    if ($query) {
        // Jika berhasil, tampilkan pesan sukses
        echo "Data berhasil dihapus.";
        // Mengarahkan (redirect) ke halaman daftar mahasiswa (mhs.php)
        header("Location: mhs.php");
        // Menghentikan eksekusi script agar tidak lanjut ke bawah
        exit();
    } else {
        // Jika gagal, tampilkan pesan error beserta detailnya
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>

<body>
    <!-- Judul halaman -->
    <h1>Hapus Mahasiswa</h1>
    <!-- Menampilkan pesan konfirmasi dengan npm mahasiswa yang akan dihapus -->
    <p>Apakah Anda yakin ingin menghapus data mahasiswa dengan NPM: <?php echo htmlspecialchars($npm); ?>?</p>
    <!-- Form konfirmasi penghapusan -->
    <form method="post" action="">
        <!-- Menyimpan npm dalam input tersembunyi agar bisa dikirim lewat POST -->
        <input type="hidden" name="npm" value="<?php echo htmlspecialchars($npm); ?>">
        <!-- Tombol untuk mengkonfirmasi penghapusan -->
        <input type="submit" name="confirm_delete" value="Ya, Hapus">
        <!-- Link untuk membatalkan dan kembali ke daftar mahasiswa -->
        <a href="mhs.php">Tidak, Kembali ke Daftar Mahasiswa</a>
    </form>
</body>

<?php
// Mengecek apakah tombol konfirmasi hapus ditekan (metode POST)
if (isset($_POST['confirm_delete'])) {
    // Mengambil nilai npm dari form POST
    $npm = $_POST['npm'];
    // Membuat perintah SQL untuk menghapus data mahasiswa berdasarkan npm
    $sql = "DELETE FROM mhs WHERE npm='$npm'";
    // Menjalankan perintah SQL di atas pada database
    $query = mysqli_query($koneksi, $sql);
    
    // Mengecek apakah query berhasil dijalankan
    if ($query) {
        // Jika berhasil, tampilkan pesan sukses
        echo "Data berhasil dihapus.";
        // Mengarahkan (redirect) ke halaman daftar mahasiswa (mhs.php)
        header("Location: mhs.php");
        // Menghentikan eksekusi script agar tidak lanjut ke bawah
        exit();
    } else {
        // Jika gagal, tampilkan pesan error beserta detailnya
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>