<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Pendaftaran</title>

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
                <h4 class="mt-4">Pendaftaran</h4>
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
                        Edit Pendaftaran
                    </h2>
                    <p>Edit data pendaftaran pasien sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('pendaftaran.index') }}">Pendaftaran</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Edit Pendaftaran</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon bg-warning">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                    </div>

                    <div>
                        <h5>Edit Data Pendaftaran Pasien</h5>
                        <p>Edit pendaftaran pasien agar sesuai.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST">

                    @csrf
                    @method('PATCH')

                    {{-- Informasi Pribadi --}}
                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card text-dark"></i>
                        <span>Informasi Pendaftaran</span>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="mb-3">
                            <label class="form-label">Pasien</label>
                            <select name="id_pasien" class="form-select">
                                <option disabled>Pilih Pasien</option>
                                @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}"
                                        {{ $pendaftaran->id_pasien == $pasien->id ? 'selected' : '' }}>
                                        {{ $pasien->nama_pasien }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No. Antrian</label>
                            <input type="text" name="no_antrian" class="form-control"
                                value="{{ $pendaftaran->no_antrian }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jenis Kunjungan</label>
                            <input type="text" name="jenis_kunjungan" class="form-control"
                                value="{{ $pendaftaran->jenis_kunjungan }}">
                        </div>

                        <input type="hidden" name="tanggal_daftar" value="{{ $pendaftaran->tanggal_daftar }}">

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
