<?php 
// Menghubungkan file ini dengan file koneksi.php untuk koneksi ke database
include 'koneksi.php'; 
?>

<!-- Membuat form HTML untuk input data mahasiswa baru -->
<form method="post" action="">
    <!-- Label dan input untuk NPM (Nomor Pokok Mahasiswa) -->
    <label for="npm">NPM:</label>
    <input type="text" name="npm" id="npm" required><br>
    
    <!-- Label dan input untuk Nama Mahasiswa -->
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required><br>
    
    <!-- Label dan input untuk Alamat Mahasiswa -->
    <label for="alamat">Alamat:</label>
    <input type="text" name="alamat" id="alamat" required><br>
    
    <!-- Label dan input untuk Nomor Telepon Mahasiswa -->
    <label for="no_telp">No. Telp:</label>
    <input type="text" name="no_telp" id="no_telp" required><br>
    
    <!-- Tombol submit untuk mengirim data ke server -->
    <input type="submit" name="simpan" value="Simpan">
    <br>
    <!-- Link untuk kembali ke daftar mahasiswa -->
    <a href="mhs.php">Kembali ke Daftar Mahasiswa</a>
    <br>
</form>

<?php
// Mengecek apakah tombol 'simpan' sudah ditekan (form sudah disubmit)
if (isset($_POST['simpan'])) {
    // Mengambil data dari form yang dikirimkan melalui metode POST
    $npm = $_POST['npm'];         // Menyimpan input NPM ke variabel $npm
    $nama = $_POST['nama'];       // Menyimpan input Nama ke variabel $nama
    $alamat = $_POST['alamat'];   // Menyimpan input Alamat ke variabel $alamat
    $no_telp = $_POST['no_telp']; // Menyimpan input No. Telp ke variabel $no_telp

    // Membuat perintah SQL untuk memasukkan data ke tabel 'mhs'
    $sql = "INSERT INTO mhs (npm, nama, alamat, no_telp) VALUES ('$npm', '$nama', '$alamat', '$no_telp')";
    // Menjalankan perintah SQL di atas menggunakan koneksi ke database
    $query = mysqli_query($koneksi, $sql);
    // Mengecek apakah query berhasil dijalankan
    if ($query) {
        // Jika berhasil, tampilkan pesan sukses
        echo "Data berhasil disimpan.";
    } else {
        // Jika gagal, tampilkan pesan error beserta detailnya
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>