<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Dokter</title>

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

    @include('layoutAdmin.sidebar');

    <!-- Main Content -->
    <main class="main-content" id="mainContent">

        <!-- Topbar -->
        <header class="topbar">
            <button class="toggle-btn" id="toggleSidebar" aria-label="Buka atau tutup sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="page-heading">
                <h4 class="mt-4">Dokter</h4>
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
                    <h2 class="text-success">
                        <i class="fa-solid fa-list"></i>
                        Detail Dokter
                    </h2>
                    <p>Detail data dokter sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('dokter.index') }}">Data Dokter</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Detail Dokter</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3 py-2">

                <div class="patient-form-header">
                    <div class="form-header-icon bg-success">
                        <i class="fa-solid fa-list text-light"></i>
                    </div>

                    <div>
                        <h5>Detail Data Dokter</h5>
                        <p>Detail informasi dokter puskesmas.</p>
                    </div>
                </div>

                <div class="text-center mb-3 mt-3">

                    <img src="{{ asset('storage/' . $dokter->foto_dokter) }}" height="130" width="130"
                        class="rounded-4 shadow">

                </div>

                {{-- Informasi Pribadi --}}
                <div class="form-section-title">
                    <i class="fa-solid fa-id-card text-dark"></i>
                    <span>Informasi Pribadi Dokter</span>
                </div>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">
                        <label class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" value="{{ $dokter->nama_dokter }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nomor Surat Izin Praktek (SIP)</label>
                        <input type="text" class="form-control" value="{{ $dokter->sip }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $dokter->jenis_kelamin }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Spesialis</label>
                        <input type="text" class="form-control" value="{{ $dokter->spesialis }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No. Handphone</label>
                        <input type="number" class="form-control" value="{{ $dokter->no_hp }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $dokter->email }}" readonly>
                    </div>

                </div>

            </div>

        </div>

        </div>

    </main>

    @include('layoutAdmin.footer');
