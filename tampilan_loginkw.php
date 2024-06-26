<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arunika Homestay</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #fff5e1;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .main-btn, .cta-btn, .view-room-btn {
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

        .main-btn:hover, .cta-btn:hover, .view-room-btn:hover {
            background-color: #543310;
            color: white;
            text-decoration: none;
            transform: translateY(-3px);
        }

        .hero-section {
            background: url('homestay.jpg') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 150px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #543310;
        }

        .about-section, .rooms-section, .gallery-section, .services-section{
            padding: 70px 0;
        }

        .about-section p, .rooms-section p, .card-text, .services-section p, .gallery-section p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
        }

        .feature .icon {
            font-size: 3rem;
            color: #74512D;
            margin-bottom: 20px;
        }

        .cta-section {
            background-color: #74512D;
            color: white;
            text-align: center;
            padding: 50px 0;
        }

        .room-card {
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
        }

        .room-card:hover {
            transform: scale(1.05);
        }

        .room-card img {
            border-radius: 10px 10px 0 0;
        }

        .room-card .card-body {
            padding: 20px;
        }

        .room-card .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .gallery-section .gallery-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .gallery-section .gallery-grid img {
            width: calc(33.333% - 10px);
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .gallery-section .gallery-grid img:hover {
            transform: scale(1.05);
        }

        .services-section .service {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .services-section .service:hover {
            transform: scale(1.05);
        }

        .contact-section {
            background-color: #f4ede3;
            padding: 10px 0 1px;
        }

        .contact-info .col-md-4 {
            transition: transform 0.3s;
        }

        .contact-info .col-md-4:hover {
            transform: scale(1.1);
        }

        .contact-info i {
            color: #AF8F6F;
            transition: color 0.3s;
        }

        .contact-info a:hover i {
            color: #543310;
        }

                /* Additional CSS for Contact Section */
        .contact-info .col-3,
        .contact-info .col-sm-2 {
            padding-left: 2px;
            padding-right: 2px;
        }

        .contact-info i {
            font-size: 1.5rem;
            margin-bottom: 3px;
        }

        /* Optional: Adjust the container padding to balance the spacing */
        .contact-section .container {
            padding: 20px 0;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link ms-4" href="#hero">Beranda</a>
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

    <!-- Hero Section -->
    <header id="hero" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1>Selamat Datang di Nirwana Homestay</h1>
                    <p>Kosan dengan lingkungan bersih, aman, dan nyaman.</p>
                </div>
            </div>
        </div>
    </header>


    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <h2 class="text-center section-title mb-5">Layanan Kami</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="service">
                        <i class="fas fa-bed fa-2x mb-4"></i>
                        <h3>Kamar yang Nyaman</h3>
                        <p>Kamar-kamar kami dirancang untuk memberikan kenyamanan dan kemudahan maksimal.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service">
                        <i class="fas fa-shield-alt fa-2x mb-4"></i>
                        <h3>Keamanan</h3>
                        <p>Kami menyediakan lingkungan yang aman dengan sistem keamanan 24/7 untuk ketenangan Anda.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service">
                        <i class="fas fa-wifi fa-2x mb-4"></i>
                        <h3>Wi-Fi Gratis</h3>
                        <p>Tetap terhubung dengan akses internet berkecepatan tinggi yang tersedia di seluruh kost kost-an.</p>
                    </div>
                </div>    
            </div>
        </div>
    </section>

    <!-- Rooms Section -->
    <section id="rooms" class="rooms-section">
        <div class="container">
            <h2 class="text-center section-title mb-5">Kost Kami</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card room-card">
                        <img src="room11.webp" class="card-img-top" alt="Kamar 1">
                        <div class="card-body">
                            <h5 class="card-title">Kost Eksklusif</h5>
                            <p class="card-text">Kamar eksklusif dengan fasilitas premium seperti meja rias dan televisi.</p>
                            <a href="Menu.php" class="view-room-btn">Lihat Kamar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card room-card">
                        <img src="room33.webp" class="card-img-top" alt="Kamar 2">
                        <div class="card-body">
                            <h5 class="card-title">Kost Campuran</h5>
                            <p class="card-text">Kost dengan aturan yang fleksibel,dan memiliki lingkungan yang santai.</p>
                            <a href="Menu.php" class="view-room-btn">Lihat Kamar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card room-card">
                        <img src="room22.webp" class="card-img-top" alt="Kamar 3">
                        <div class="card-body">
                            <h5 class="card-title">Kost Loft</h5>
                            <p class="card-text">Kost dengan desain modern yang unik, membagi ruangan menjadi dua area.</p>
                            <a href="Menu.php" class="view-room-btn">Lihat Kamar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <h2 class="text-center section-title mb-5">Galeri Kami</h2>
            <div class="gallery-grid">
                <img src="gallery1.jpg" alt="Galeri 1">
                <img src="gallery2.jpg" alt="Galeri 2">
                <img src="gallery3.jpg" alt="Galeri 3">
                <img src="gallery4.jpg" alt="Galeri 4">
                <img src="gallery5.jpg" alt="Galeri 5">
                <img src="gallery6.jpg" alt="Galeri 6">
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
        <h2 class="text-center section-title mb-5">Hubungi Kami</h2>
            <div class="row contact-info justify-content-center">
                <div class="col-3 col-sm-1 text-center mb-2">
                    <a href="https://www.google.com/maps?q=KotaParepare,SulawesiSelatan" target="_blank">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </a>
                </div>
                <div class="col-3 col-sm-1 text-center mb-2">
                    <a href="tel:+6212345678">
                        <i class="fas fa-phone-alt fa-2x"></i>
                    </a>
                </div>
                <div class="col-3 col-sm-1 text-center mb-2">
                    <a href="mailto:arunika_homestay@gmail.com">
                        <i class="fas fa-envelope fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href.startsWith('#')) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
