-- Membuat database baru dengan nama 'db_web2' jika belum ada
CREATE DATABASE IF NOT EXISTS `db_web2`;

-- Menggunakan database 'db_web2' yang sudah dibuat atau sudah ada
USE `db_web2`;

-- Membuat tabel baru dengan nama 'mhs' jika belum ada
CREATE TABLE IF NOT EXISTS `mhs` (
    -- Membuat kolom 'npm' bertipe teks (varchar), tidak boleh kosong, sebagai primary key (unik)
    `npm` varchar(255) NOT NULL,
    -- Membuat kolom 'nama' bertipe teks (varchar), tidak boleh kosong
    `nama` varchar(255) NOT NULL,
    -- Membuat kolom 'alamat' bertipe teks (varchar), tidak boleh kosong
    `alamat` varchar(255) NOT NULL,
    -- Membuat kolom 'no_telp' bertipe teks (varchar), tidak boleh kosong
    `no_telp` varchar(255) NOT NULL,
    -- Menetapkan 'npm' sebagai primary key (penanda unik setiap baris)
    PRIMARY KEY (`npm`)
);

-- Memasukkan data mahasiswa ke dalam tabel 'mhs'
INSERT INTO `mhs` (`npm`, `nama`, `alamat`, `no_telp`) VALUES
    -- Data mahasiswa pertama: npm, nama, alamat, dan no telepon
    ('1234567890', 'Budi Santoso', 'Jl. Merdeka No. 1', '08123456789'),
    -- Data mahasiswa kedua
    ('0987654321', 'Siti Aminah', 'Jl. Pahlawan No. 2', '08234567890'),
    -- Data mahasiswa ketiga
    ('1122334455', 'Andi Wijaya', 'Jl. Cendana No. 3', '08345678901');