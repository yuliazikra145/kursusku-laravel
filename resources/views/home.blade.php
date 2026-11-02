<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu - Platform Belajar</title>
    
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0f766e; /* Hijau Tosca Tema Anda */
            --primary-dark: #115e59;
            --primary-light: #ccfbf1;
            --bg-color: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* --- NAVBAR (Persis seperti foto, tapi Hijau) --- */
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 16px 5%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
        }

        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo { display: flex; align-items: center; gap: 12px; }
        .logo-icon {
            background-color: white; color: var(--primary-color);
            width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;
            border-radius: 10px; font-size: 22px; font-weight: 800;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .logo-text h2 { font-size: 20px; font-weight: 700; letter-spacing: -0.5px; }
        .logo-text p { font-size: 12px; opacity: 0.8; margin-top: -2px; }

        .nav-links { display: flex; gap: 30px; align-items: center; }
        .nav-links a {
            text-decoration: none; color: rgba(255, 255, 255, 0.9);
            font-size: 14px; font-weight: 600; transition: color 0.3s;
        }
        .nav-links a:hover { color: white; }
        .nav-links a.daftar-btn {
            color: white; font-weight: 800; text-decoration: underline;
        }

        /* --- HERO SECTION (Persis seperti foto) --- */
        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .hero-text {
            flex: 1.1;
            max-width: 600px;
        }

        .hero-text h1 {
            font-size: 48px;
            line-height: 1.15;
            font-weight: 800;
            margin-bottom: 24px;
            color: var(--text-main);
            letter-spacing: -1px;
        }

        .description {
            color: var(--text-muted);
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 32px;
        }

        .buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(15, 118, 110, 0.2);
        }
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* --- GAMBAR KANAN (Persis seperti foto) --- */
        .hero-image {
            flex: 0.9;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 16px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            object-fit: cover;
            display: block;
        }

        /* --- RESPONSIVE DESIGN --- */
        @media (max-width: 968px) {
            .hero-container {
                flex-direction: column;
                padding: 60px 5%;
                gap: 50px;
                text-align: center;
            }
            .hero-text { max-width: 100%; }
            .hero-text h1 { font-size: 38px; }
            .buttons { justify-content: center; }
            .hero-image { width: 100%; max-width: 600px; }
            .header-top { flex-direction: column; gap: 20px; }
            .nav-links { flex-wrap: wrap; justify-content: center; }
        }
    </style>
</head>
<body>

    <!-- 1. NAVBAR -->
    <header>
        <div class="header-top">
            <div class="logo">
                <div class="logo-icon">K</div>
                <div class="logo-text">
                    <h2>KursusKu</h2>
                    <p>Laravel MVC</p>
                </div>
            </div>
            <div class="nav-links">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="#">Keunggulan</a>
                <a href="#">Katalog</a>
                <a href="#">Cara Daftar</a>
                <a href="#">Media</a>
                <a href="#">Kontak</a>
                <a href="{{ route('enrollments.create') }}" class="daftar-btn">Daftar Kursus</a>
            </div>
        </div>
    </header>

    <!-- 2. HERO SECTION -->
    <main class="hero-container">
        <!-- Kiri: Teks & Tombol -->
        <section class="hero-text">
            <h1>Selamat Datang di KursusKu</h1>
            <p class="description">
                Platform belajar teknologi untuk mahasiswa yang ingin meningkatkan kemampuan pemrograman web.
            </p>
            <div class="buttons">
                <a href="#kursus" class="btn btn-primary">Lihat Kursus</a>
                <a href="#" class="btn btn-primary">Lihat Estimasi Biaya</a>
                <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Daftar Kursus</a>
            </div>
        </section>

        <!-- Kanan: Gambar Besar -->
        <section class="hero-image">
            <img src="{{ asset('images/hero-kursus.jpg') }}" alt="Ilustrasi Belajar">
        </section>
    </main>

</body>
</html>