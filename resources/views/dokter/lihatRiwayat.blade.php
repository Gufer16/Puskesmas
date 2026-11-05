<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lihat Riwayat Konsultasi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pasien/tambah_pasien.css') }}">
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
                <h4 class="mt-4">Riwayat Konsultasi</h4>
            </div>

            <div class="topbar-right">
                <div class="topbar-date">
                    <i class="fa-regular fa-calendar"></i>
                    <span id="currentDate"></span>
                </div>
            </div>
        </header>

        <div class="content-area">

            {{-- Header Halaman --}}
            <div class="page-heading">
                <div>
                    <h2>
                        <i class="fa-solid fa-history"></i>
                        Riwayat Konsultasi
                    </h2>
                    <p>Riwayat konsultasi pasien.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('dokter.riwayatKonsultasi') }}">Riwayat Konsultasi</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Lihat Riwayat Konsultasi</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon">
                        <i class="fa-solid fa-history"></i>
                    </div>

                    <div>
                        <h5>Data Riwayat Konsultasi Pasien</h5>
                    </div>
                </div>

                <div class="col-lg-12 mb-4">
                    <label class="form-label">Pasien</label>
                    <input type="text" class="form-control fw-semibold"
                        value="{{ $konsultasi->pendaftaran->pasien->nama_pasien }}" readonly>
                </div>

                {{-- Informasi Pribadi --}}
                <div class="form-section-title">
                    <i class="fa-solid fa-id-card"></i>
                    <span>Informasi Riwayat Konsultasi Pasien</span>
                </div>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">
                        <label class="form-label">Keluhan</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->keluhan }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Riwayat Penyakit</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->riwayat_penyakit }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Riwayat Alergi</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->riwayat_alergi }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tekanan Darah</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->tekanan_darah }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Suhu</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->suhu }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Berat Badan</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->bb }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tinggi Badan</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->tb }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Diagnosa Penyakit</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->diagnosa }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Resep Obat</label>
                        <input type="text" class="form-control" value="{{ $konsultasi->resep }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tindakan</label>
                        <textarea class="form-control" readonly>{{ $konsultasi->tindakan }}</textarea>
                    </div>

                </div>

            </div>

        </div>

    </main>

    @include('layoutDokter.footer');
