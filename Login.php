<?php
session_start();
include "koneksi.php";

// Jika tombol login ditekan
if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE name='$name' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
        header("Location: Menu.php"); 
        exit; 
    } else {
        $error = "Name atau Password Salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Manajemen Kos-kosan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            width: 300px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: calc(100% - 40px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-left: 10px;
            text-align: center;
        }

        .btn-primary {
            width: 100%;
            height: 40px;
            background-color: #8B4513;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .text-center {
            text-align: center;
        }
        .icon {
            font-size: 18px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <h2 class="text-center">Login</h2>
            <?php if (isset($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-user icon"></i>
                    </span>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-lock icon"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" name="login" class="btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
