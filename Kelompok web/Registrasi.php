<?php
session_start();
include "koneksi.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Menggunakan MD5 untuk mengenkripsi password
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $kota_asal = $_POST['kota_asal'];
    
    $query = mysqli_query($koneksi, "INSERT INTO user (name, phone, email, password, jenis_kelamin, tanggal_lahir, pekerjaan, kota_asal) VALUES ('$name', '$phone', '$email', '$password', '$jenis_kelamin', '$tanggal_lahir', '$pekerjaan', '$kota_asal')");
    
    if ($query) {
        echo '<script>alert("Selamat, pendaftaran anda berhasil. Silahkan login."); window.location.href="Login.php";</script>';
    } else {
        echo '<script>alert("Pendaftaran gagal.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arunika Homestay</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background: url('bckground_login.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px; /* Increased width */
            padding: 30px; /* Increased padding */
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px <0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-primary {
            width: 100%;
            height: 40px;
            background-color: #543310; /* Changed to brown */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            /* Adding gradient background */
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #AF8F6F; /* Lighter shade for hover effect */
            /* Adding slight scale effect on hover */
            transform: scale(1.05);
        }

        .clearfix {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .text-center {
            text-align: center;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .radio-group {
            display: flex;
            gap: 20px; /* Optional: space between radio buttons */
            align-items: center;
        }

        .radio-group div {
            display: flex;
            align-items: center;
        }

        .radio-group label {
            margin-left: 5px; /* Add margin to the left of the label for spacing */
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-row .form-group {
            flex: 1;
            margin-right: 10px; /* Add some space between the two fields */
        }

        .form-row .form-group:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="Registrasi.php" method="post">
            <h2 class="text-center">Registrasion Form</h2>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input autocomplete="off" required="required" class="form-control" type="text" name="name" id="name" placeholder="Nama lengkap">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input autocomplete="off" required="required" type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Telepon</label>
                    <input autocomplete="off" required="required" type="tel" name="phone" id="phone" class="form-control" placeholder="No. telp">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input autocomplete="off" required="required" type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input autocomplete="off" required="required" type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input autocomplete="off" required="required" type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Pekerjaan">
            </div>
            <div class="form-group">
                <label for="kota_asal">Kota Asal</label>
                <input autocomplete="off" required="required" type="text" name="kota_asal" id="kota_asal" class="form-control" placeholder="Kota asal">
            </div>
            <div class="clearfix">
                <input type="submit" name="submit" value="Submit" class="btn-primary">
                <p class="text-center"><a href="Login.php"></a></p>
            </div>
        </form>
    </div>
</body>
</html>
