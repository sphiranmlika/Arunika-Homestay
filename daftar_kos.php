<?php
// Informasi koneksi database
$servername = "localhost"; // Ganti dengan nama server MySQL Anda
$username = "root"; // Ganti dengan nama pengguna MySQL Anda
$password = ""; // Ganti dengan kata sandi MySQL Anda
$dbname = "akhirweb"; // Ganti dengan nama database Anda

try {
    // Buat koneksi ke database menggunakan PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Atur mode kesalahan PDO ke pengecualian
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil pemilik kos dari parameter URL
    $pemilik_kos = $_GET['pemilik_kos'];

    // Perintah SQL untuk mengambil data kos milik pemilik tertentu
    $sql_get_kos = "SELECT * FROM kos WHERE pemilik_kos = :pemilik_kos";
    
    // Siapkan pernyataan PDO untuk mengambil data kos
    $stmt = $conn->prepare($sql_get_kos);
    // Bind parameter ke pernyataan PDO
    $stmt->bindParam(':pemilik_kos', $pemilik_kos);
    // Eksekusi perintah SQL untuk mengambil data kos
    $stmt->execute();
    
    // Ambil hasil query
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Tampilkan hasil query
    echo "<h2>Daftar Kos untuk Pemilik Kos: $pemilik_kos</h2>";
    echo "<ul>";
    foreach ($result as $row) {
        echo "<li>Nama Kos: " . $row['nama_kos'] . " - Alamat: " . $row['alamat'] . "</li>";
    }
    echo "</ul>";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Tutup koneksi database
$conn = null;
?>
