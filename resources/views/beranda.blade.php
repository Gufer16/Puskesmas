<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Sistem Informasi Puskesmas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo/puskesmas-logo.png') }}" width="30" height="30">
                <span>PUSKESMAS</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#informasi">Informasi</a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- HERO SECTION -->
    <section class="hero" id="beranda">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <span class="hero-label">
                        <i class="fas fa-heart me-2"></i>
                        Pelayanan Kesehatan Masyarakat
                    </span>

                    <h1>
                        Kesehatan Anda,<br>
                        <span>Prioritas Kami.</span>
                    </h1>

                    <p>
                        Selamat datang di Sistem Informasi Puskesmas.
                        Kami hadir untuk memberikan pelayanan kesehatan
                        yang mudah, cepat, dan berkualitas bagi masyarakat.
                    </p>

                    <div class="hero-buttons">
                        <a href="#layanan" class="btn btn-primary-custom">
                            Jelajahi Layanan
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>

                        <a href="#tentang" class="btn btn-outline-custom">
                            Tentang Kami
                        </a>
                    </div>

                    <div class="hero-info">
                        <div>
                            <i class="fas fa-check-circle"></i>
                            Pelayanan Profesional
                        </div>

                        <div>
                            <i class="fas fa-check-circle"></i>
                            Mudah dan Terpercaya
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=900"
                            alt="Pelayanan Kesehatan">
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- TENTANG -->
    <section class="about-section" id="tentang">
        <div class="container">
            <div class="section-heading text-center">
                <span>TENTANG KAMI</span>
                <h2>Melayani dengan Sepenuh Hati</h2>
                <p>
                    Memberikan pelayanan kesehatan yang berkualitas
                    demi meningkatkan derajat kesehatan masyarakat.
                </p>
            </div>

            <div class="row align-items-center mt-5">

                <div class="col-lg-5">
                    <img src="{{ asset('logo/Puskesmas.jpeg') }}" class="about-image" alt="Gedung Kesehatan">
                </div>

                <div class="col-lg-7 about-content">
                    <h3>Sistem Informasi Puskesmas</h3>

                    <p>
                        Sistem Informasi Puskesmas merupakan sebuah
                        sistem berbasis web yang dirancang untuk membantu
                        pengelolaan administrasi dan pelayanan kesehatan.
                    </p>

                    <p>
                        Melalui sistem ini, pengelolaan data pasien,
                        pendaftaran, konsultasi, dokter, serta obat
                        dapat dilakukan secara lebih terstruktur dan efisien.
                    </p>

                    <div class="about-points">
                        <div><i class="fas fa-check-circle"></i> Pengelolaan Data Pasien</div>
                        <div><i class="fas fa-check-circle"></i> Pendaftaran Pasien</div>
                        <div><i class="fas fa-check-circle"></i> Pengelolaan Konsultasi</div>
                        <div><i class="fas fa-check-circle"></i> Pengelolaan Data Obat</div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- LAYANAN -->
    <section class="services-section" id="layanan">
        <div class="container">

            <div class="section-heading text-center">
                <span>LAYANAN KAMI</span>
                <h2>Layanan Kesehatan</h2>
                <p>Berbagai layanan untuk memenuhi kebutuhan kesehatan masyarakat.</p>
            </div>

            <div class="row g-4 mt-4">

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-user-injured"></i>
                        </div>
                        <h5>Pelayanan Pasien</h5>
                        <p>Pengelolaan data pasien untuk mendukung pelayanan kesehatan.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h5>Pendaftaran</h5>
                        <p>Pengelolaan pendaftaran dan nomor antrean pasien.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <h5>Konsultasi</h5>
                        <p>Pencatatan informasi konsultasi dan pemeriksaan pasien.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h5>Data Dokter</h5>
                        <p>Informasi tenaga medis yang memberikan pelayanan kesehatan.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-pills"></i>
                        </div>
                        <h5>Informasi Obat</h5>
                        <p>Pengelolaan informasi dan ketersediaan stok obat.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <h5>Biaya Konsultasi</h5>
                        <p>Pengelolaan rincian biaya konsultasi dan obat pasien.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- INFORMASI -->
    <section class="information-section" id="informasi">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-6">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>

                        <h4>Jam Operasional</h4>

                        <p>Senin - Jumat</p>
                        <h5>08.00 - 14.00 WITA</h5>

                        <p class="mt-3">Sabtu, Minggu dan Hari Libur</p>
                        <h5>Tutup</h5>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-card contact-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>

                        <h4>Lokasi Puskesmas</h4>

                        <p>
                            Silakan kunjungi Puskesmas kami untuk
                            mendapatkan pelayanan kesehatan secara langsung.
                        </p>

                        <div class="contact-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            Jln. Soekarno, no.01, Baumata
                        </div>

                        <div class="contact-detail">
                            <i class="fas fa-phone"></i>
                            0831 xxxx xxxx
                        </div>

                        <div class="contact-detail">
                            <i class="fas fa-envelope"></i>
                            puskesmas@gmail.com
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <h5>
                        <img src="{{ asset('logo/puskesmas-logo.png') }}" width="25" height="25">
                        SISTEM INFORMASI PUSKESMAS
                    </h5>

                    <p>
                        Pelayanan kesehatan yang mudah, cepat, dan berkualitas.
                    </p>
                </div>

                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        &copy; {{ date('Y') }} Sistem Informasi Puskesmas.
                        All Rights Reserved.
                    </p>
                </div>

            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
