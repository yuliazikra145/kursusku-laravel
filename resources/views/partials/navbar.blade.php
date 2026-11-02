<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #0f766e;">
    <div class="container">
        <!-- Logo / Brand -->
        <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
            KursusKu
        </a>

        <!-- Tombol Hamburger (Muncul di layar HP) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto fw-semibold align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Keunggulan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cara Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
                <!-- Link Pendaftaran dengan garis bawah -->
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a class="nav-link text-white fw-bold text-decoration-underline" href="{{ route('enrollments.create') }}">
                        Daftar Kursus
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Menyesuaikan warna tombol hamburger agar terlihat jelas di background hijau */
    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
    }
    .navbar-toggler-icon {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
</style>