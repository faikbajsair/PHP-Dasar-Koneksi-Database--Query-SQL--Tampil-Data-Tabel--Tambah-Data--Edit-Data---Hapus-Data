<?php
// Menghubungkan file ini dengan file koneksi database
include 'koneksi.php';

// Mengecek apakah koneksi ke database berhasil
if (!$koneksi) {
    // Jika koneksi gagal, tampilkan pesan error dan hentikan eksekusi
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengecek apakah parameter 'npm' dikirim melalui URL (GET)
if (isset($_GET['npm'])) {
    // Menyimpan nilai 'npm' dari URL ke variabel $npm
    $npm = $_GET['npm'];
    // Membuat query SQL untuk mengambil data mahasiswa berdasarkan npm
    $sql = "SELECT * FROM mhs WHERE npm='$npm'";
    // Menjalankan query ke database
    $query = mysqli_query($koneksi, $sql);
    // Mengambil hasil query dalam bentuk array asosiatif
    $row = mysqli_fetch_array($query);
} else {
    // Jika 'npm' tidak ada di URL, tampilkan pesan error
    echo "NPM tidak ditemukan.";
}
?>

<!-- Membuat form HTML untuk mengupdate data mahasiswa -->
<form method="post" action="">
    <!-- Input untuk NPM (readonly agar tidak bisa diubah) -->
    <label for="npm">NPM:</label>
    <input type="text" name="npm" id="npm" value="<?php echo $row['npm']; ?>" readonly><br>
    
    <!-- Input untuk Nama -->
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required><br>
    
    <!-- Input untuk Alamat -->
    <label for="alamat">Alamat:</label>
    <input type="text" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" required><br>
    
    <!-- Input untuk Nomor Telepon -->
    <label for="no_telp">No. Telp:</label>
    <input type="text" name="no_telp" id="no_telp" value="<?php echo $row['no_telp']; ?>" required><br>
    
    <!-- Tombol untuk submit form (update data) -->
    <input type="submit" name="update" value="Update">
    <br>
    <!-- Link untuk kembali ke daftar mahasiswa -->
    <a href="mhs.php">Kembali ke Daftar Mahasiswa</a>
</form>

<?php
// Mengecek apakah tombol 'update' pada form ditekan
if (isset($_POST['update'])) {
    // Mengambil data dari form yang dikirimkan melalui POST
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // Membuat query SQL untuk mengupdate data mahasiswa berdasarkan npm
    $sql = "UPDATE mhs SET nama='$nama', alamat='$alamat', no_telp='$no_telp' WHERE npm='$npm'";
    // Menjalankan query update ke database
    $query = mysqli_query($koneksi, $sql);
    
    // Mengecek apakah query update berhasil dijalankan
    if ($query) {
        // Jika berhasil, tampilkan pesan dan redirect ke halaman daftar mahasiswa
        echo "Data berhasil diupdate.";
        header("Location: mhs.php"); // Redirect ke halaman daftar mahasiswa
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }   
}
?>