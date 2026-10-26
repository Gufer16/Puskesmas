<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>

<body>

    @include('layoutAdmin.sidebar');

    <!-- Main Content -->
    <main class="main-content" id="mainContent">

        <!-- Topbar -->
        <header class="topbar">
            <button class="toggle-btn" id="toggleSidebar" aria-label="Buka atau tutup sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="page-heading">
                <h4>Dashboard</h4>
                <p>Selamat datang di Sistem Informasi Puskesmas</p>
            </div>

            <div class="topbar-right">
                <div class="topbar-date">
                    <i class="fa-regular fa-calendar"></i>
                    <span id="currentDate"></span>
                </div>
            </div>
        </header>

        <!-- Content -->
        <section class="content-area">

            <div class="welcome-card">
                <div>
                    <span class="">Selamat Datang 👋</span>
                    <h2>SISTEM INFORMASI & PENDATAAN PUSKESMAS</h2>
                    <p>Kelola data pelayanan kesehatan dengan mudah dan efisien.</p>
                </div>

                <div class="welcome-icon">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
            </div>

            <div class="row g-4 mt-2">

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fa-solid fa-hospital-user"></i>
                        </div>
                        <p>Total Pasien</p>
                        <h3>{{ $data['pasien'] }}</h3>
                        <span class="stat-description">Data pasien terdaftar</span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <p>Total Dokter</p>
                        <h3>{{ $data['dokter'] }}</h3>
                        <span class="stat-description">Dokter terdaftar</span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <p>Pendaftaran</p>
                        <h3>{{ $data['pendaftaran'] }}</h3>
                        <span class="stat-description">Jumlah pendaftaran pasien</span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <p>Jadwal</p>
                        <h3>{{ $data['jadwal'] }}</h3>
                        <span class="stat-description">Jumlah Jadwal pasien</span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <p>Konsultasi</p>
                        <h3>{{ $data['jadwal'] }}</h3>
                        <span class="stat-description">Jumlah Konsultasi pasien</span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fa-solid fa-pills"></i>
                        </div>
                        <p>Obat</p>
                        <h3>{{ $data['obat'] }}</h3>
                        <span class="stat-description">Jumlah Obat</span>
                    </div>
                </div>

            </div>

        </section>

    </main>

    @include('layoutAdmin.footer');
