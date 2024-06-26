<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Manajemen Kamar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-section {
            display: none; /* Sembunyikan semua section */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Manajemen Kamar Kos-Kosan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-kamar-section">Data Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-pembayaran-section">Data Pembayaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-registrasi-section">Data Registrasi</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Data Kamar Section -->
        <div id="table-kamar-section" class="table-section">
            <h1 class="my-4">Data Kamar Kos-Kosan</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Kamar</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Ukuran Kasur</th>
                        <th scope="col">Kamar Mandi</th>
                        <th scope="col">AC</th>
                        <th scope="col">Gambar Thumbnail</th>
                        <th scope="col">Meja Rias</th>
                        <th scope="col">Lemari Pakaian</th>
                        <th scope="col">Kulkas</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "akhirweb";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql_select_kamar = "SELECT id_kamar, lokasi, detail, ukuran_kasur, Kamar_mandi, ada_ac, Gambar_tumbnail, meja_rias, lemari_pakaian, kulkas, harga FROM kamar1";
                    $result_kamar = $conn->query($sql_select_kamar);

                    if ($result_kamar->num_rows > 0) {
                        while($row = $result_kamar->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id_kamar'] . "</td>";
                            echo "<td>" . $row['lokasi'] . "</td>";
                            echo "<td>" . $row['detail'] . "</td>";
                            echo "<td>" . $row['ukuran_kasur'] . "</td>";
                            echo "<td>" . $row['Kamar_mandi'] . "</td>";
                            echo "<td>" . ($row['ada_ac'] ? 'Ada' : 'Tidak ada') . "</td>";
                            echo "<td><img src='" . $row['Gambar_tumbnail'] . "' style='max-width: 100px; max-height: 100px;' /></td>";
                            echo "<td>" . ($row['meja_rias'] ? 'Ada' : 'Tidak ada') . "</td>";
                            echo "<td>" . ($row['lemari_pakaian'] ? 'Ada' : 'Tidak ada') . "</td>";
                            echo "<td>" . ($row['kulkas'] ? 'Ada' : 'Tidak ada') . "</td>";
                            echo "<td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>Tidak ada data kamar tersedia.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Data Pembayaran Section -->
        <div id="table-pembayaran-section" class="table-section">
            <h1 class="my-4">Data Pembayaran</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Pembayaran</th>
                        <th scope="col">ID User</th>
                        <th scope="col">ID Kamar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Tanggal Pembayaran</th>
                        <th scope="col">Jumlah Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql_select_pembayaran = "SELECT id_pembayaran, id_user, id_kamar, nama, email, nomor_hp, metode_pembayaran, tanggal_pembayaran, jumlah_pembayaran FROM pembayaran_sewa";
                    $result_pembayaran = $conn->query($sql_select_pembayaran);

                    if ($result_pembayaran->num_rows > 0) {
                        while($row = $result_pembayaran->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id_pembayaran'] . "</td>";
                            echo "<td>" . $row['id_user'] . "</td>";
                            echo "<td>" . $row['id_kamar'] . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['nomor_hp'] . "</td>";
                            echo "<td>" . $row['metode_pembayaran'] . "</td>";
                            echo "<td>" . $row['tanggal_pembayaran'] . "</td>";
                            echo "<td>Rp " . number_format($row['jumlah_pembayaran'], 2, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Tidak ada data pembayaran tersedia.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Data Registrasi Section -->
        <div id="table-registrasi-section" class="table-section">
            <h1 class="my-4">Data Registrasi</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID User</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Kota Asal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql_select_registrasi = "SELECT id, name, phone, email, jenis_kelamin, tanggal_lahir, pekerjaan, kota_asal FROM user";
                    $result_registrasi = $conn->query($sql_select_registrasi);

                    if ($result_registrasi->num_rows > 0) {
                        while($row = $result_registrasi->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['jenis_kelamin'] . "</td>";
                            echo "<td>" . $row['tanggal_lahir'] . "</td>";
                            echo "<td>" . $row['pekerjaan'] . "</td>";
                            echo "<td>" . $row['kota_asal'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Tidak ada data registrasi tersedia.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const target = e.target.getAttribute('data-target');

                document.querySelectorAll('.table-section').forEach(section => {
                    section.style.display = 'none';
                });

                document.getElementById(target).style.display = 'block';
            });
        });
    </script>
</body>
</html>
