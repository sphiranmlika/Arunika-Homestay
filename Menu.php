<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kost</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #fff5e1;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .main-btn {
            background-color: #AF8F6F;
            color: white;
            padding: 5px 10px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            text-transform: uppercase;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .main-btn:hover {
            background-color: #543310;
            color: white;
            text-decoration: none;
            transform: translateY(-3px);
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .container .section-title {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #543310;
        }

        .kamar {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .kamar img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .kamar:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .list-group-item {
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: #AF8F6F;
            border-color: #AF8F6F;
        }

        .btn-primary:hover {
            background-color: #543310;
            border-color: #543310;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Arunika Homestay" width="120">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link ms-4" href="tampilan_loginkw.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-4" href="tentang.php">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-4" href="Menu.php">Kost</a>
                    </li>
                </ul>
                <a href="Tampilan.php" class="main-btn ms-lg-4">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        <h2 class="section-title">Daftar Kamar</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "akhirweb";

            $conn = new mysqli($servername, $username, $password);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $conn->select_db($dbname);

            $sql_select_kamar = "SELECT id_kamar, lokasi, detail, ukuran_kasur, Kamar_mandi, ada_ac, Gambar_tumbnail, meja_rias, lemari_pakaian, kulkas, harga FROM kamar1";
            $result_kamar = $conn->query($sql_select_kamar);

            if ($result_kamar->num_rows > 0) {
                while($row = $result_kamar->fetch_assoc()) {
                    ?>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="<?php echo $row['Gambar_tumbnail']; ?>" class="card-img-top rounded-top" alt="Thumbnail">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['lokasi']; ?></h5>
                                <p class="card-text"><?php echo $row['detail']; ?></p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Ukuran Kasur:</strong> <?php echo $row['ukuran_kasur']; ?></li>
                                    <li class="list-group-item"><strong>Kamar Mandi:</strong> <?php echo $row['Kamar_mandi']; ?></li>
                                    <li class="list-group-item"><strong>AC:</strong> <?php echo ($row['ada_ac'] ? "Ada" : "Tidak ada"); ?></li>
                                    <li class="list-group-item"><strong>Meja Rias:</strong> <?php echo ($row['meja_rias'] ? "Ada" : "Tidak ada"); ?></li>
                                    <li class="list-group-item"><strong>Lemari Pakaian:</strong> <?php echo ($row['lemari_pakaian'] ? "Ada" : "Tidak ada"); ?></li>
                                    <li class="list-group-item"><strong>Kulkas:</strong> <?php echo ($row['kulkas'] ? "Ada" : "Tidak ada"); ?></li>
                                    <li class="list-group-item"><strong>Harga:</strong> Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></li>
                                </ul>
                                <a href="pembayaran_sewa.php?id=<?php echo $row['id_kamar']; ?>" class="btn btn-primary mt-3">Pilih Kamar</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='col'><div class='alert alert-info text-center'>Tidak ada data kamar tersedia.</div></div>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>