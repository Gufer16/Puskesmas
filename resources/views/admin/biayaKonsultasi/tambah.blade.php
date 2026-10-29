<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Biaya Konsultasi</title>

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
                    <h2>
                        <i class="fa-solid fa-plus"></i>
                        Tambah Biaya Konsultasi
                    </h2>
                    <p>Tambahkan biaya konsultasi pasien ke dalam sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('biayaKonsultasi.index') }}">Biaya Konsultasi</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Tambah Biaya Konsultasi</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <div>
                        <h5>Formulir Data Biaya Konsultasi</h5>
                        <p>Lengkapi informasi biaya konsultasi dengan benar.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('biayaKonsultasi.store') }}" method="POST">

                    @csrf

                    {{-- Informasi Pribadi --}}
                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card"></i>
                        <span>Informasi Biaya Konsultasi</span>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Nomor Rekam Medis</label>
                            <select name="id_konsultasi" class="form-select">
                                <option disabled selected>Pilih Pasien</option>
                                @foreach ($konsultasis as $konsultasi)
                                    <option value="{{ $konsultasi->id }}">
                                        {{ $konsultasi->pendaftaran->pasien->nama_pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Obat</label>
                            <select name="id_obat" class="form-select">
                                <option disabled selected>Pilih Obat</option>
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}">
                                        {{ $obat->nama_obat }} ( {{ $obat->jenis_obat }} )</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jumlah Obat</label>
                            <input type="number" name="jumlah_obat" class="form-control"
                                placeholder="Masukkan jumlah obat">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Biaya Konsultasi</label>
                            <input type="number" name="biaya_konsultasi" class="form-control" placeholder="Cth: 50000">
                        </div>

                    </div>


                    {{-- Tombol Aksi --}}
                    <div class="patient-form-footer">

                        <button type="submit" class="btn btn-primary w-100 rounded-pill shadow">
                            <i class="fa-solid fa-floppy-disk me-1"></i>
                            Simpan
                        </button>

                    </div>

                </form>
            </div>

        </div>

    </main>

    @include('layoutAdmin.footer');
