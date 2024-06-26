<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akhirweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk memeriksa dan membuat tabel pembayaran_sewa jika belum ada
$sql_create_pembayaran = "CREATE TABLE IF NOT EXISTS pembayaran_sewa (
    id_pembayaran INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT(6) UNSIGNED NOT NULL,
    id_kamar INT(6) UNSIGNED NOT NULL,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    nomor_hp VARCHAR(20) NOT NULL,
    metode_pembayaran ENUM('transfer', 'tunai') NOT NULL,
    tanggal_pembayaran DATE NOT NULL,
    jumlah_pembayaran DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql_create_pembayaran) === FALSE) {
    die("Error creating table pembayaran_sewa: " . $conn->error);
}

// Ambil id kamar dari parameter URL
if (!isset($_GET['id'])) {
    die("ID Kamar tidak ditemukan.");
}
$id_kamar = $_GET['id'];

// Query untuk mengambil data kamar berdasarkan id_kamar
$sql_select_kamar1 = "SELECT * FROM kamar1 WHERE id_kamar = ?";
$stmt = $conn->prepare($sql_select_kamar1);
$stmt->bind_param("i", $id_kamar);
$stmt->execute();
$result_kamar = $stmt->get_result();

if ($result_kamar->num_rows > 0) {
    $row = $result_kamar->fetch_assoc();

    // Simpan data kamar ke dalam session
    $_SESSION['selected_kamar'] = $row;
} else {
    die("Data kamar tidak ditemukan.");
}

$stmt->close();

// Handle form submission untuk proses pembayaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
    $id_kamar = $_POST['id_kamar'];
    $harga_kamar = $_SESSION['selected_kamar']['harga']; // Ambil harga kamar dari data yang tersimpan di session

    // Query untuk menyimpan data pembayaran ke dalam tabel pembayaran_sewa
    $sql_insert_pembayaran = "INSERT INTO pembayaran_sewa (id_user, id_kamar, nama, email, nomor_hp, metode_pembayaran, tanggal_pembayaran, jumlah_pembayaran) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql_insert_pembayaran);
    
    // Bind parameters
    $stmt->bind_param("iisssssd", $_SESSION['user']['id'], $id_kamar, $nama, $email, $nomor_hp, $metode_pembayaran, $tanggal_pembayaran, $harga_kamar);

    // Execute statement
    if ($stmt->execute()) {
        echo "Pembayaran berhasil! Terima kasih.";
        // Anda dapat tambahkan logika redirect atau pesan sukses lainnya di sini
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Sewa Kamar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('about-us.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #543310;
             /* Warna teks default */
        }
        .container {
            padding: 20px;
            border-radius: 10px;
        }
        .container .text-center {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            color: #fff; /* Warna teks dalam kartu */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: rgb(175, 143, 111); /* Transparansi pada header kartu */
            color: #543310;
            font-weight: bold;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.7);
        }
        .card-body  .card-title, .card-text, .form-group{
            color: black;
        }
        .btn-primary {
            background: #AF8F6F;
            border: none;
        }
        .btn-primary:hover {
            background: #543310;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Pembayaran Sewa Kamar</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        Informasi Kamar
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">ID Kamar: <?php echo $row["id_kamar"]; ?></h5>
                        <p class="card-text">Lokasi: <?php echo $row["lokasi"]; ?></p>
                        <p class="card-text">Detail: <?php echo $row["detail"]; ?></p>
                        <p class="card-text">Ukuran Kasur: <?php echo $row["ukuran_kasur"]; ?></p>
                        <p class="card-text">Kamar Mandi: <?php echo $row["Kamar_mandi"]; ?></p>
                        <p class="card-text">AC: <?php echo $row["ada_ac"] ? "Ada" : "Tidak ada"; ?></p>
                        <p class="card-text">Gambar Thumbnail: <br><img class="img-thumbnail" src="<?php echo $row["Gambar_tumbnail"]; ?>" alt="Thumbnail"></p>
                        <p class="card-text">Meja Rias: <?php echo $row["meja_rias"] ? "Ada" : "Tidak ada"; ?></p>
                        <p class="card-text">Lemari Pakaian: <?php echo $row["lemari_pakaian"] ? "Ada" : "Tidak ada"; ?></p>
                        <p class="card-text">Kulkas: <?php echo $row["kulkas"] ? "Ada" : "Tidak ada"; ?></p>
                        <p class="card-text">Harga: Rp <?php echo number_format($row["harga"], 2, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Formulir Pembayaran
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $row['id_kamar']; ?>">
                            <input type="hidden" name="id_kamar" value="<?php echo $row['id_kamar']; ?>">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomor HP</label>
                                <input type="tel" id="nomor_hp" name="nomor_hp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="tunai">Bayar Tunai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                                <input type="date" id="tanggal_pembayaran" name="tanggal_pembayaran" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Lanjutkan Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
