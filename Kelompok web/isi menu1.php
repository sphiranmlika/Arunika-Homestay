<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Andalan - Kost Zeal 2 Residence</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFAE6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .header {
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        .header span {
            font-size: 18px;
            font-weight: bold;
            margin: 0 10px;
        }
        .img-container {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .img-container img, .img-container video {
            max-width: 100%;
            border-radius: 10px;
        }
        .info {
            padding: 20px;
        }
        .info ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .info ul li {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }
        .info ul li img {
            width: 20px;
            height: 20px;
        }
        .info ul li span {
            font-weight: bold;
        }
        .info p {
            margin: 10px 0;
        }
        .price {
            font-size: 24px;
            font-weight: bold;
            color: #337ab7;
        }
        .button, .back-button {
            background-color: #337ab7;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .button:hover, .back-button:hover {
            background-color: #23527c;
        }
        .back-button {
            background-color: #ccc;
            color: #333;
        }
        .back-button:hover {
            background-color: #999;
        }
        .slider {
            display: flex;
            overflow: hidden;
            position: relative;
        }
        .slider img {
            min-width: 100%;
            transition: transform 0.5s ease;
        }
        .slider-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .slider-buttons button {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }
        .slider-buttons button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span>05.41</span>
            <span>VO 4G il.ill 99%</span>
            <span>K</span>
            <span>2/10</span>
            <span>mamikos</span>
            <span>Cari Kos Paling Gampang & Akurat</span>
        </div>
        <div class="img-container" id="mediaContainer">
            <img src="kamar5.jpg" alt="Kost Zeal 2 Residence Alam Sutera Serpong">
        </div>
        <div class="info">
            <ul>
                <li id="showPhotos">
                    <img src="icon_galeri.jpg" alt="Foto">
                    <span>Foto</span>
                </li>
                <li id="showVideo">
                    <img src="path_to_video_icon.png" alt="Video">
                    <span>Video</span>
                </li>
                <li>
                    <img src="path_to_360_icon.png" alt="360°">
                    <span>360°</span>
                </li>
            </ul>
            <p><span>Kos Andalan</span></p>
            <p><span>Kost Zeal 2 Residence Alam Sutera Serpong</span>, Utara Tangerang Selatan 392ZR</p>
            <p><span>Kos Campur</span>, Kec. Serpong Utara</p>
            <p>36 transaksi berhasil di kos ini</p>
            <p>Banyak pilihan kamar untukmu</p>
            <p>Pemilik Kos Online 1 hari yang lalu</p>
            <p>Yang kamu dapatkan di Kos Andalan</p>
            <p class="price">Rp3.700.000/bulan</p>
            <button class="button">Tanya Pemilik</button>
            <button class="button">Ajukan Sewa</button>
            <button class="back-button" onclick="window.location.href='Menu.php';">Kembali</button>
        </div>
    </div>

    <script>
        document.getElementById('showPhotos').addEventListener('click', function() {
            var mediaContainer = document.getElementById('mediaContainer');
            mediaContainer.innerHTML = `
                <div class="slider" id="slider">
                    <img src="Kamar3.jpg" alt="Foto 1">
                    <img src="Kamar4.jpg" alt="Foto 2">
                    <img src="Kamar6.jpg" alt="Foto 3">
                    <img src="Kamar7.jpg" alt="Foto 4">
                    <img src="Kamar8.jpg" alt="Foto 5">
                </div>
                <div class="slider-buttons">
                    <button id="prevBtn">&lt;</button>
                    <button id="nextBtn">&gt;</button>
                </div>
            `;

            var slider = document.getElementById('slider');
            var images = slider.getElementsByTagName('img');
            var index = 0;

            document.getElementById('nextBtn').addEventListener('click', function() {
                index = (index + 1) % images.length;
                slider.style.transform = 'translateX(' + (-index * 100) + '%)';
            });

            document.getElementById('prevBtn').addEventListener('click', function() {
                index = (index - 1 + images.length) % images.length;
                slider.style.transform = 'translateX(' + (-index * 100) + '%)';
            });
        });

        document.getElementById('showVideo').addEventListener('click', function() {
            var mediaContainer = document.getElementById('mediaContainer');
            mediaContainer.innerHTML = `
                <video controls>
                    <source src="video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            `;
        });
    </script>
</body>
</html>
