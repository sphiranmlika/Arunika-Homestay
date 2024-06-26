<?php
// submit_kos.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akhirweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to create uploads directory if it doesn't exist
function createUploadsDirectory() {
    $uploads_dir = 'uploads';

    if (!is_dir($uploads_dir)) {
        if (!mkdir($uploads_dir, 0755, true)) {
            die('Gagal membuat direktori uploads...');
        }
    }
}

// Function to create kos table if it doesn't exist
function createKosTable() {
    global $conn;

    $sql = "CREATE TABLE IF NOT EXISTS kos1 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        pemilik_kos VARCHAR(100) NOT NULL,
        nama_kos VARCHAR(100) NOT NULL,
        alamat TEXT NOT NULL,
        harga DECIMAL(10,2) NOT NULL,
        deskripsi TEXT NOT NULL,
        fasilitas TEXT NOT NULL,
        gambar_kos VARCHAR(255) NOT NULL
    )";

    if ($conn->query($sql) === FALSE) {
        die("Error creating table: " . $conn->error);
    }
}

// Check if kos table exists, create it if not
createKosTable();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pemilik_kos = $_POST['pemilik_kos'];
    $nama_kos = $_POST['nama_kos'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $fasilitas = $_POST['fasilitas'];
    $gambar_kos = $_FILES['gambar_kos'];

    // Create uploads directory if it doesn't exist
    createUploadsDirectory();

    // Check if file is uploaded
    if ($gambar_kos['error'] === UPLOAD_ERR_OK) {
        // Check file size (2MB limit)
        if ($gambar_kos['size'] <= 2 * 1024 * 1024) {
            $file_name = $gambar_kos['name'];
            $file_tmp = $gambar_kos['tmp_name'];
            $file_type = $gambar_kos['type'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $valid_extensions = array('jpg', 'jpeg', 'png', 'gif');

            // Check if file has a valid extension
            if (in_array($file_ext, $valid_extensions)) {
                $upload_dir = 'uploads/';
                $new_file_name = uniqid() . '.' . $file_ext;
                $upload_path = $upload_dir . $new_file_name;

                // Move uploaded file to designated directory
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    // Insert data into database
                    $stmt = $conn->prepare("INSERT INTO kos1 (pemilik_kos, nama_kos, alamat, harga, deskripsi, fasilitas, gambar_kos) VALUES (?, ?, ?, ?, ?, ?, ?)");

                    // Check if prepare() succeeded
                    if ($stmt === false) {
                        die('Prepare failed: ' . $conn->error);
                    }

                    $stmt->bind_param("sssssss", $pemilik_kos, $nama_kos, $alamat, $harga, $deskripsi, $fasilitas, $upload_path);

                    if ($stmt->execute()) {
                        echo "Data berhasil disimpan!";
                        // Redirect to Tambahan_kos.php
                        header("Location: Tambahan kos.php");
                        exit; // Ensure that no more output is sent
                    } else {
                        echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Terjadi kesalahan saat mengunggah file.";
                }
            } else {
                echo "Ekstensi file tidak valid. Hanya diperbolehkan jpg, jpeg, png, dan gif.";
            }
        } else {
            echo "Ukuran file melebihi batas maksimum 2MB.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
    }
}

$conn->close();
?>
