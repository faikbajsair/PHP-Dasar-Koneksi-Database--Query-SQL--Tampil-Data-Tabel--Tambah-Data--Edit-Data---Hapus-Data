<?php
// Meng-include file koneksi.php agar bisa menggunakan koneksi ke database
include 'koneksi.php';

// Mengecek apakah koneksi ke database berhasil
if (!$koneksi) {
    // Jika gagal, tampilkan pesan error dan hentikan eksekusi script
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Membuat query SQL untuk mengambil semua data dari tabel 'mhs'
$sql = "SELECT * FROM mhs";

// Menjalankan query SQL di atas menggunakan koneksi yang sudah dibuat
$query = mysqli_query($koneksi, $sql);

// Mengecek apakah query berhasil dijalankan
if (!$query) {
    // Jika gagal, tampilkan pesan error dan hentikan eksekusi script
    die("Query gagal: " . mysqli_error($koneksi));
}

// Membuka tag tabel HTML dan membuat border pada tabel
echo "<table border='1'>";

// Membuat baris judul kolom pada tabel
echo "<tr>
<th>NPM</th>         // Kolom untuk NPM (Nomor Pokok Mahasiswa)
<th>Nama</th>        // Kolom untuk Nama Mahasiswa
<th>Alamat</th>      // Kolom untuk Alamat Mahasiswa
<th>No. Telp</th>    // Kolom untuk Nomor Telepon Mahasiswa
<th>Ubah</th>        // Kolom untuk link mengubah data
<th>Hapus</th>       // Kolom untuk link menghapus data
</tr>";

// Mengecek apakah hasil query memiliki baris data
if (mysqli_num_rows($query) > 0) {
    // Jika ada data, lakukan perulangan untuk setiap baris data
    while($r = mysqli_fetch_array($query)){
        // Membuka baris baru pada tabel
        echo "<tr>";
        // Menampilkan data NPM pada kolom pertama
        echo "<td>".$r['npm']."</td>";
        // Menampilkan data Nama pada kolom kedua
        echo "<td>".$r['nama']."</td>";
        // Menampilkan data Alamat pada kolom ketiga
        echo "<td>".$r['alamat']."</td>";
        // Menampilkan data No. Telp pada kolom keempat
        echo "<td>".$r['no_telp']."</td>";
        // Membuat link untuk mengubah data, mengirimkan NPM sebagai parameter di URL
        echo "<td><a href='update_mhs.php?npm=".$r['npm']."'>Ubah</a></td>";
        // Membuat link untuk menghapus data, mengirimkan NPM sebagai parameter di URL
        echo "<td><a href='delete_mhs.php?npm=".$r['npm']."'>Hapus</a></td>";
        // Menutup baris tabel
        echo "</tr>";
    }
} else {
    // Jika tidak ada data, tampilkan pesan bahwa data tidak ditemukan
    echo "<tr><td colspan='6'>Data tidak ditemukan</td></tr>";
}
// Menutup tag tabel HTML
echo "</table>";

// Membuat link untuk menambah data mahasiswa baru
echo "<a href='tambah_mhs.php'>Tambah Mahasiswa</a>";
?>