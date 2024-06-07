<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Arunika Homestay</title>
    <style>
         body {
        background-color: #FFFAE6;
        }

        .navbar {
            background-color: #74512D;
            padding: 0px 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #543310;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar h1 {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 24px;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar img {
            height: 100px;
            margin-right: 10px;
        }

        .login-btn {
            background-color: #AF8F6F;
            border: none;
            padding: 12px 22px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 1em;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .login-btn:hover {
            background-color: #967a5d;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login-btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(175, 143, 111, 0.5);
        }

        .search-box {
            background-color: #f7f7f7;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 20px auto;
        }

        .search-box input[type="text"] {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-btn {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #F8F4E1;
            color: #333;
        }

        .search-box {
            display: flex;
            align-items: center;
        }

        .search-box input[type="text"] {
            flex: 1;
            padding: 5px;
        }

        .search-box button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
        }

        .search-box button i,
        .search-box button svg {
            font-size: 1.2em;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .card-img-top {
            border-bottom: 1px solid #ddd;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 10px;
            font-size: 1em;
            color: #555;
        }

        .facilities {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .facility-item {
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
            color: #333;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

    </style>

</head>
<body>
    <div class="navbar">
        <h1><img src="logo.png" alt="Arunika Homestay">Arunika Homestay</h1>
        <button onclick="window.location.href='Halaman.php';">Logout</button>
    </div>
    <form class="search-box">
        <input type="text" placeholder="Cari kos di sini...">
        <input type="submit" value="Cari">
    </form>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="isi menu1.php"><img src="Kamar1.jpg" class="card-img-top" alt="The Kipling"></a>                  
                    <div class="card-body">
                        <h4 class="card-title">The Kipling</h4>
                        <p class="card-text">Companion Memory Care Suite</p>
                        <div class="facilities">
                            <div class="facility-item">2 single bed</div>
                            <div class="facility-item">Kamar mandi</div>
                            <div class="facility-item">AC</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="isi menu2.php"><img src="Kamar2.jpg" class="card-img-top" alt="The Shakespeare"></a> 
                    <div class="card-body">
                        <h4 class="card-title">The Shakespeare</h4>
                        <p class="card-text">Two Bedroom</p>
                        <div class="facilities">
                            <div class="facility-item">Double bed</div>
                            <div class="facility-item">Single bed</div>
                            <div class="facility-item">2 kamar mandi</div>
                            <div class="facility-item">3 AC</div>
                            <div class="facility-item">Kitchen set</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="isi menu2.php"><img src="Kamar3.jpg" class="card-img-top" alt="The Joyce"></a> 
                    <div class="card-body">
                        <h4 class="card-title">The Joyce</h4>
                        <p class="card-text">Studio</p>
                        <div class="facilities">
                            <div class="facility-item">Single bed</div>
                            <div class="facility-item">Kamar mandi</div>
                            <div class="facility-item">TV</div>
                            <div class="facility-item">Kitchen set</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="isi menu2.php"><img src="Kamar4.jpg" class="card-img-top" alt="The Milton"></a> 
                    <div class="card-body">
                        <h4 class="card-title">The Milton</h4>
                        <p class="card-text">One Bedroom</p>
                        <div class="facilities">
                            <div class="facility-item">Double bed</div>
                            <div class="facility-item">Kamar mandi</div>
                            <div class="facility-item">2 AC</div>
                            <div class="facility-item">Kitchen set</div>
                            <div class="facility-item">TV</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="isi menu2.php"><img src="Kamar5.jpg" class="card-img-top" alt="The Lewis"></a>
                    <div class="card-body">
                        <h4 class="card-title">The Lewis</h4>
                        <p class="card-text">One Bedroom with Den</p>
                        <div class="facilities">
                            <div class="facility-item">Double bed</div>
                            <div class="facility-item">Kamar mandi</div>
                            <div class="facility-item">2 AC</div>
                            <div class="facility-item">Kitchen set</div>
                            <div class="facility-item">TV</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="isi menu2.php"><img src="Kamar6.jpg" class="card-img-top" alt="The Byron"></a>  
                    <div class="card-body">
                        <h4 class="card-title">The Byron</h4>
                        <p class="card-text">Companion Memory Care Suite</p>
                        <div class="facilities">
                            <div class="facility-item">2 Single bed</div>
                            <div class="facility-item">Kamar mandi</div>
                            <div class="facility-item">AC</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="isi menu2.php"><img src="Kamar7.jpg" class="card-img-top" alt="The Keats"></a> 
                    <div class="card-body">
                        <h4 class="card-title">The Keats</h4>
                        <p class="card-text">Private Memory Care Suite</p>
                        <div class="facilities">
                            <div class="facility-item">Single bed</div>
                            <div class="facility-item">AC</div>
                            <div class="facility-item">Kamar mandi</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <a href="isi menu2.php"><img src="Kamar7.jpg" class="card-img-top" alt="The Shaw"></a>  
                    <div class="card-body">
                        <h4 class="card-title">The Shaw</h4>
                        <p class="card-text">One Bedroom Deluxe</p>
                        <div class="facilities">
                            <div class="facility-item">Double bed</div>
                            <div class="facility-item">Kitchen set</div>
                            <div class="facility-item">2 AC</div>
                            <div class="facility-item">Kamar mandi</div>
                            <div class="facility-item">TV</div>
                        </div>
                    </div>

            <!-- Repeat for other cards as necessary -->
        </div>
    </div>

</body>
</html>


