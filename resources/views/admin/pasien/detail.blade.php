<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pasien</title>

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
                <h4 class="mt-4">Pasien</h4>
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
                        Detail Pasien
                    </h2>
                    <p>Detail data pasien sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('pasien.index') }}">Data Pasien</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Detail Pasien</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3 py-2">

                <div class="patient-form-header">
                    <div class="form-header-icon bg-success">
                        <i class="fa-solid fa-list text-light"></i>
                    </div>

                    <div>
                        <h5>Detail Data Pasien</h5>
                        <p>Detail informasi pasien puskesmas.</p>
                    </div>
                </div>

                {{-- Informasi Pribadi --}}
                <div class="form-section-title">
                    <i class="fa-solid fa-id-card text-dark"></i>
                    <span>Informasi Pribadi</span>
                </div>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">
                        <label class="form-label">Nomor Rekam Medis</label>
                        <input type="text" class="form-control" value="{{ $pasien->no_rm }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" value="{{ $pasien->nama_pasien }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $pasien->jenis_kelamin }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Usia</label>
                        <input type="number" class="form-control" value="{{ $pasien->usia }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $pasien->tempat_lahir }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" value="{{ $pasien->tanggal_lahir }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Golongan Darah</label>
                        <input type="text" class="form-control" value="{{ $pasien->gol_darah }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No. Handphone</label>
                        <input type="number" class="form-control" value="{{ $pasien->no_hp }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Pernikahan</label>
                        <input type="text" class="form-control" value="{{ $pasien->status }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" readonly>{{ $pasien->alamat }}</textarea>
                    </div>

                </div>

                <div class="form-section-title">
                    <i class="fa-solid fa-id-card text-dark"></i>
                    <span>Informasi Opsional</span>
                </div>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">No. BPJS</label>
                        <input type="number" class="form-control" value="{{ $pasien->no_bpjs }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" value="{{ $pasien->pekerjaan }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Penanggung Jawab</label>
                        <input type="text" class="form-control" value="{{ $pasien->nama_penanggung }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">No. Handphone Penanggung Jawab</label>
                        <input type="text" class="form-control" value="{{ $pasien->hp_penanggung }}" readonly>
                    </div>

                </div>

            </div>

        </div>

        </div>

    </main>

    @include('layoutAdmin.footer');
