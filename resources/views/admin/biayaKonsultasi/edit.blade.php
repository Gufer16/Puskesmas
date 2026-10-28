<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Biaya Konsultasi</title>

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
                <h4 class="mt-4">Biaya Konsultasi</h4>
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
                    <h2 class="text-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit Biaya Konsultasi
                    </h2>
                    <p>Edit data Biaya Konsultasi.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('biayaKonsultasi.index') }}">Biaya Konsultasi</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Edit Biaya Konsultasi</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon bg-warning">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                    </div>

                    <div>
                        <h5>Edit Data Biaya Konsultasi</h5>
                        <p>Edit data biaya konsultasi pasien agar sesuai.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('biayaKonsultasi.update', $biayaKonsultasi->id) }}" method="POST">

                    @csrf
                    @method('PATCH')

                    {{-- Informasi Pribadi --}}
                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card text-dark"></i>
                        <span>Informasi Data Biaya Konsultasi</span>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Nomor Rekam Medis</label>
                            <select name="id_konsultasi" class="form-select">
                                <option disabled selected>Pilih Pasien</option>
                                @foreach ($konsultasis as $konsultasi)
                                    <option value="{{ $konsultasi->id }}"
                                        {{ $biayaKonsultasi->id_konsultasi == $konsultasi->id ? 'selected' : '' }}>
                                        {{ $konsultasi->pendaftaran->pasien->nama_pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Obat</label>
                            <select name="id_obat" class="form-select">
                                <option disabled selected>Pilih Obat</option>
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}"
                                        {{ $biayaKonsultasi->id_obat == $obat->id ? 'selected' : '' }}>
                                        {{ $obat->nama_obat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jumlah Obat</label>
                            <input type="number" name="jumlah_obat" class="form-control"
                                placeholder="Masukkan jumlah obat" value="{{ $biayaKonsultasi->jumlah_obat }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Biaya Konsultasi</label>
                            <input type="number" name="biaya_konsultasi" class="form-control" placeholder="Cth: 50000"
                                value="{{ (int) $biayaKonsultasi->biaya_konsultasi }}">
                        </div>

                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="patient-form-footer">

                        <button type="submit" class="btn btn-warning text-light w-100 rounded-pill shadow">
                            <i class="fa-solid fa-save me-1"></i>
                            Simpan
                        </button>

                    </div>

                </form>
            </div>

        </div>

    </main>

    @include('layoutAdmin.footer');
