<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akhirweb";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Buat database jika belum ada
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === FALSE) {
    die("Error creating database: " . $conn->error);
}

// Pilih database yang akan digunakan
$conn->select_db($dbname);

// Buat tabel kamar1 jika belum ada
$sql_create_kamar = "CREATE TABLE IF NOT EXISTS kamar1 (
    id_kamar INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    lokasi VARCHAR(50) NOT NULL,
    detail TEXT NOT NULL,
    ukuran_kasur VARCHAR(20) NOT NULL,
    Kamar_mandi ENUM('private', 'shared') NOT NULL,
    ada_ac TINYINT(1) NOT NULL,
    Gambar_tumbnail VARCHAR(255) NOT NULL,
    meja_rias TINYINT(1) NOT NULL,
    lemari_pakaian TINYINT(1) NOT NULL,
    kulkas TINYINT(1) NOT NULL,
    harga DECIMAL(10, 2) NOT NULL
)";
if ($conn->query($sql_create_kamar) === FALSE) {
    die("Error creating table kamar1: " . $conn->error);
}

// Periksa apakah tabel sudah berisi data atau belum
$sql_check_kamar = "SELECT COUNT(*) AS count FROM kamar1";
$result_check_kamar = $conn->query($sql_check_kamar);
$row_kamar = $result_check_kamar->fetch_assoc();
if ($row_kamar['count'] == 0) {
    // Jika tabel kosong, lakukan insert data ke tabel kamar1
    $sql_insert_kamar = "INSERT INTO kamar1 (lokasi, detail, ukuran_kasur, Kamar_mandi, ada_ac, Gambar_tumbnail, meja_rias, lemari_pakaian, kulkas, harga) VALUES 
    ('Jl. Cendrawasih No.13', 'Kamar single dengan fasilitas premium, cocok untuk mahasiswa atau pekerja yang menginginkan privasi.', 'Single', 'private', 1, 'Kamar_Single_Eksklusif.jpg', 1, 1, 0, 250000),
    ('Jl. Bau Massepe No. 9', 'Kamar yang lebih luas, cocok untuk pasangan atau dua orang teman.', 'Single', 'shared', 0, 'kamar_eksklusif2.jpg', 0, 1, 1, 150000),
    ('Jl. Reformasi No. 8', 'Kamar deluxe dengan fasilitas lengkap dan ideal untuk keluarga atau penghuni yang banyak.', 'King', 'private', 1, 'kamar_eksklusif3.jpg', 1, 0, 0, 180000),
    ('Jl. Mangga No. 24', 'Kamar untuk tiga orang dengan fasilitas premium, cocok untuk teman yang ingin tinggal bersama.'.', 'Single', 'private', 1, 'kamar_eksklusif2.jpg', 1, 1, 0, 250000),
    ('Jl. Bau Massepe No. 9', 'Kamar yang lebih luas, cocok untuk pasangan atau dua orang teman.', 'Single', 'shared', 0, 'kamar_eksklusif2.jpg', 0, 1, 1, 150000),";
    if ($conn->query($sql_insert_kamar) === FALSE) {
        die("Error inserting data into kamar1: " . $conn->error);
    }
}

// Ambil data dari tabel kamar1
$sql_select_kamar = "SELECT id_kamar, lokasi, detail, ukuran_kasur, Kamar_mandi, ada_ac, Gambar_tumbnail, meja_rias, lemari_pakaian, kulkas, harga FROM kamar1";
$result_kamar = $conn->query($sql_select_kamar);

if ($result_kamar->num_rows > 0) {
    // Output data dari setiap baris hasil query
    while($row = $result_kamar->fetch_assoc()) {
        echo "ID Kamar: " . $row["id_kamar"]. "<br>";
        echo "Lokasi: " . $row["lokasi"]. "<br>";
        echo "Detail: " . $row["detail"]. "<br>";
        echo "Ukuran Kasur: " . $row["ukuran_kasur"]. "<br>";
        echo "Kamar Mandi: " . $row["Kamar_mandi"]. "<br>";
        echo "AC: " . ($row["ada_ac"] ? "Ada" : "Tidak ada") . "<br>";
        echo "Gambar Thumbnail: <img src='" . $row["Gambar_tumbnail"] . "' alt='Thumbnail'><br>";
        echo "Meja Rias: " . ($row["meja_rias"] ? "Ada" : "Tidak ada") . "<br>";
        echo "Lemari Pakaian: " . ($row["lemari_pakaian"] ? "Ada" : "Tidak ada") . "<br>";
        echo "Kulkas: " . ($row["kulkas"] ? "Ada" : "Tidak ada") . "<br>";
        echo "Harga: Rp " . number_format($row["harga"], 2, ',', '.') . "<br><br>";
    }
} else {
    echo "Tidak ada data kosong.";
}

$conn->close();
?>
