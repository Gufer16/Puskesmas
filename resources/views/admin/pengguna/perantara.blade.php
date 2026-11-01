<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pengguna</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pasien/pasien.css') }}">
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
                <h4>Pengguna Sistem</h4>
            </div>

            <div class="topbar-right">
                <div class="topbar-date">
                    <i class="fa-regular fa-calendar"></i>
                    <span id="currentDate"></span>
                </div>
            </div>
        </header>

        <section class="content-area">


            <div class="row justify-content-center g-4">

                <!-- Card Tambah Pengguna -->
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">

                        <div class="card-body p-4">

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="bg-primary bg-opacity-10 rounded-4 p-3">
                                    <i class="fa-solid fa-users-gear text-primary fs-2"></i>
                                </div>

                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                                    Pengguna
                                </span>
                            </div>

                            <h4 class="fw-bold text-dark mb-2">
                                Tambah Pengguna
                            </h4>

                            <p class="text-muted mb-4" style="text-align: justify">
                                Tambahkan akun pengguna baru untuk Admin, Kasir, dan Pengunjung
                                agar dapat mengakses sistem sesuai hak akses masing-masing.
                            </p>

                            <a href="{{ route('pengguna.create') }}"
                                class="btn btn-primary w-100 rounded-pill shadow py-2 fw-semibold">
                                Tambah Pengguna
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Card Tambah Dokter -->
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">

                        <div class="card-body p-4">

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="bg-success bg-opacity-10 rounded-4 p-3">
                                    <i class="fa-solid fa-user-doctor text-success fs-2"></i>
                                </div>

                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">
                                    Tenaga Medis
                                </span>
                            </div>

                            <h4 class="fw-bold text-dark mb-2">
                                Tambah Dokter
                            </h4>

                            <p class="text-muted mb-4" style="text-align: justify">
                                Tambahkan akun khusus dokter untuk mengelola data,
                                jadwal praktik, dan aktivitas pelayanan kesehatan.
                            </p>

                            <a href="{{ route('tambahAkunDokter') }}"
                                class="btn btn-success w-100 rounded-pill py-2 fw-semibold shadow mt-4">
                                Tambah Dokter
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>

                        </div>
                    </div>
                </div>

            </div>


        </section>

    </main>

    @include('layoutAdmin.footer');
