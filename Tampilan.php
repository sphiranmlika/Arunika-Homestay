<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arunika Homestay</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('bckground_login.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ddd;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
            font-weight: bold;
            color: #333;
            text-align: center;
            font-size: 24px;
        }

        p {
            margin-bottom: 20px;
            color: #666;
            text-align: center;
        }

        .image-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 20px;
        }

        .image-link {
            display: block;
            width: calc(50% - 10px);
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        .image-link img {
            width: 80%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .image-link span {
            display: block;
            font-size: 16px;
            color: #333;
            margin-top: 10px;
        }

        .image-link:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: RGBA(116, 81, 45, 0.5);
        }

        a {
            text-decoration: none;
            color: #337ab7;
        }

        a:hover {
            color: #fff;
        }

        .login-form {
            padding: 20px;
        }

        .login-form h1 {
            margin-bottom: 10px;
        }

        .login-form p {
            margin-bottom: 20px;
        }

        .button {
            background-color: #543310;
            color: #fff;
            border: none;
            padding: 7px 17px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .button:hover {
            background-color: #AF8F6F;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-form">
        <h1>Masuk</h1>
        <p>Saya ingin masuk sebagai</p>
        <div class="image-group">
            <a href="Login.php" class="image-link">
                <img src="icon_pencari.png" alt="Pencari kos">
                <span>Pencari kos</span>
            </a>
            <a href="Login.php" class="image-link">
                <img src="icon_pemilik.png" alt="Pemilik kos">
                <span>Pemilik kos</span>
            </a>
        </div>
        <p>Need an account? <a href="Registrasi.php" class="button">Sign up</a></p>
    </div>
</div>
</body>
</html>
