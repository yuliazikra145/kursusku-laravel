<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu - Laravel MVC</title>
    <!-- Import Google Fonts untuk tampilan lebih modern -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0f766e; /* Hijau Tosca utama */
            --primary-dark: #115e59;  /* Hijau Tosca gelap */
            --primary-light: #ccfbf1; /* Hijau Tosca sangat muda */
            --bg-color: #f8fafc;      /* Latar belakang abu-abu sangat muda */
            --text-main: #0f172a;     /* Warna teks utama */
            --text-muted: #64748b;    /* Warna teks sekunder */
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

        /* HEADER */
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

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            background-color: white;
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 22px;
            font-weight: 800;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .logo-text h2 {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .logo-text p {
            font-size: 12px;
            opacity: 0.8;
            margin-top: -2px;
        }

        .milestone {
            border: 1px solid rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.1);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            backdrop-filter: blur(4px);
        }

        /* NAVBAR */
        nav {
            background-color: var(--primary-dark);
            padding: 0 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 9;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        nav a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            font-weight: 600;
            padding: 16px 0;
            display: inline-block;
            transition: color 0.3s ease;
            border-bottom: 2px solid transparent;
        }

        nav a:hover {
            color: white;
            border-bottom: 2px solid white;
        }

        .btn-nav {
            background-color: white;
            color: var(--primary-dark) !important;
            padding: 8px 20px !important;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: none !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .btn-nav:hover {
            background-color: var(--primary-light);
            transform: translateY(-1px);
        }

        /* HERO SECTION */
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

        .subtitle {
            color: var(--primary-color);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .subtitle::before {
            content: "";
            display: inline-block;
            width: 24px;
            height: 2px;
            background-color: var(--primary-color);
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
            font-size: 16px;
            line-height: 1.7;
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
            padding: 14px 28px;
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
            box-shadow: 0 4px 12px rgba(15, 118, 110, 0.2);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(15, 118, 110, 0.3);
        }

        .btn-secondary {
            border: 2px solid #e2e8f0;
            color: var(--text-main);
            background-color: white;
        }

        .btn-secondary:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        /* ILUSTRASI KANAN */
        .hero-image {
            flex: 0.9;
            position: relative;
        }

        /* Ornamen background di belakang gambar */
        .hero-image::before {
            content: "";
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100%;
            height: 100%;
            background-color: var(--primary-light);
            border-radius: 24px;
            z-index: -1;
        }

        .illustration {
            background: white;
            border-radius: 24px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        .illustration h2 {
            color: var(--text-main);
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .illustration p {
            font-size: 14px;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 24px;
        }

        .illustration img {
            max-width: 100%;
            height: auto;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: block;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 968px) {
            .hero-container {
                flex-direction: column;
                padding: 60px 5%;
                gap: 50px;
                text-align: center;
            }

            .hero-text {
                max-width: 100%;
            }

            .subtitle {
                justify-content: center;
            }

            .subtitle::before {
                display: none;
            }

            .hero-text h1 {
                font-size: 38px;
            }

            .buttons {
                justify-content: center;
            }

            .hero-image {
                width: 100%;
                max-width: 500px;
            }

            .hero-image::before {
                display: none; /* Sembunyikan ornamen di mobile */
            }
        }

        @media (max-width: 640px) {
            nav {
                flex-wrap: wrap;
                padding: 10px 5%;
                justify-content: center;
            }

            .nav-links {
                width: 100%;
                justify-content: center;
                gap: 20px;
            }

            nav a {
                padding: 10px 0;
            }

            .btn-nav {
                margin-top: 10px;
                width: 100%;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 32px;
            }

            .header-top {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-top">
            <div class="logo">
                <div class="logo-icon">K</div>
                <div class="logo-text">
                    <h2>KursusKu</h2>
                    <p>Laravel MVC</p>
                </div>
            </div>
            <span class="milestone">Milestone 7</span>
        </div>
    </header>

    <nav>
        <div class="nav-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#alur">Alur MVC</a>
            <a href="#kursus">Kursus Pilihan</a>
        </div>
        <a href="#kursus" class="btn-nav">Lihat Program</a>
    </nav>

    <main class="hero-container">
        <section class="hero-text">
            <p class="subtitle">Pertemuan 7 · Framework Laravel</p>
            <h1>Belajar terstruktur dengan Route, Controller, dan Blade.</h1>
            <p class="description">
                Landing page KursusKu dipindahkan dari PHP biasa ke pola framework Laravel. 
                Request masuk melalui route, data disiapkan controller, lalu Blade merender HTML dengan rapi.
            </p>
            <div class="buttons">
                <a href="#kursus" class="btn btn-primary">Program Belajar Unggulan</a>
                <a href="#alur" class="btn btn-secondary">Lihat Alur MVC</a>
            </div>
        </section>

        <section class="hero-image" id="kursus">
            <div class="illustration">
                <h2>KursusKu</h2>
                <p>Belajar • Praktik • Bangun Proyek</p>
                
                <img src="{{ asset('images/hero-kursus.jpg') }}" alt="Hero Kursus">
            </div>
        </section>
    </main>

</body>
</html>