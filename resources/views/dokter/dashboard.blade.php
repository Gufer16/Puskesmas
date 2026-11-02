<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Dokter</title>

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

    @include('layoutDokter.sidebar');

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
                    <span class="">Selamat Datang Dokter <strong>{{ Auth::user()->nama }}</strong> 👋</span>
                    <h2>SISTEM INFORMASI & PENDATAAN PUSKESMAS</h2>
                    <p>Kelola data pelayanan kesehatan dengan mudah dan efisien.</p>
                </div>

                <div class="welcome-icon">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-4">

                <div class="card-header bg-white border-0 px-4 py-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">
                            <i class="fas fa-calendar-alt text-primary fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold text-dark">Jadwal</h5>
                            <small class="text-muted">Daftar jadwal pemeriksaan pasien</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4 py-3 text-muted">No</th>
                                    <th class="py-3 text-muted">Nama Pasien</th>
                                    <th class="py-3 text-muted">Hari</th>
                                    <th class="py-3 text-muted">Jam</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($dokters->jadwal as $jadwal)
                                    <tr>
                                        <td class="ps-4 text-muted fw-semibold">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-semibold text-dark">
                                                    {{ $jadwal->pendaftaran->pasien->nama_pasien }}
                                                </span>
                                            </div>
                                        </td>

                                        <td>
                                            <span>
                                                {{ $jadwal->hari }}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center text-secondary">
                                                <span class="fw-semibold">
                                                    {{ $jadwal->jam }}
                                                </span>
                                                <small class="text-muted ms-1">WITA</small>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <i class="fas fa-calendar-times text-muted fs-1 mb-3"></i>
                                            <h6 class="fw-bold text-secondary">
                                                Belum Ada Jadwal
                                            </h6>
                                            <small class="text-muted">
                                                Jadwal dokter belum tersedia saat ini.
                                            </small>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </section>

    </main>

    @include('layoutDokter.footer');
