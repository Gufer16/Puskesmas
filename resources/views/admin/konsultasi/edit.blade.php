<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Konsultasi</title>

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
                <h4 class="mt-4">Konsultasi</h4>
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
                        Edit Konsultasi
                    </h2>
                    <p>Edit data konsultasi pasien sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('konsultasi.index') }}">Konsultasi</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Edit Konsultasi</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon bg-warning">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                    </div>

                    <div>
                        <h5>Edit Data konsultasi Pasien</h5>
                        <p>Edit data konsultasi pasien dengan agar sesuai.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('konsultasi.update', $konsultasi->id) }}" method="POST">

                    @csrf
                    @method('PATCH')

                    {{-- Informasi Pribadi --}}
                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card text-dark"></i>
                        <span>Informasi Konsultasi Pasien</span>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Pasien</label>
                            <select name="id_pendaftaran" class="form-select">
                                <option disabled>Pilih Pasien</option>
                                @foreach ($pendaftarans as $pendaftaran)
                                    <option value="{{ $pendaftaran->id }}"
                                        {{ $konsultasi->id_pendaftaran == $pendaftaran->id ? 'selected' : '' }}>
                                        {{ $pendaftaran->pasien->nama_pasien }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Dokter</label>
                            <select name="id_dokter" class="form-select">
                                <option disabled selected>Pilih Dokter</option>
                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->id }}"
                                        {{ $konsultasi->id_dokter == $dokter->id ? 'selected' : '' }}>
                                        {{ $dokter->nama_dokter }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Keluhan</label>
                            <input type="text" name="keluhan" class="form-control"
                                value="{{ $konsultasi->keluhan }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Riwayat Penyakit</label>
                            <input type="text" name="riwayat_penyakit" class="form-control"
                                value="{{ $konsultasi->riwayat_penyakit }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Riwayat Alergi</label>
                            <input type="text" name="riwayat_alergi" class="form-control"
                                value="{{ $konsultasi->riwayat_alergi }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tekanan Darah</label>
                            <input type="text" name="tekanan_darah" class="form-control"
                                value="{{ $konsultasi->tekanan_darah }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Suhu</label>
                            <input type="text" name="suhu" class="form-control" value="{{ $konsultasi->suhu }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Berat Badan</label>
                            <input type="text" name="bb" class="form-control" value="{{ $konsultasi->bb }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tinggi Badan</label>
                            <input type="text" name="tb" class="form-control" value="{{ $konsultasi->tb }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Diagnosa Penyakit</label>
                            <input type="text" name="diagnosa" class="form-control"
                                value="{{ $konsultasi->diagnosa }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Resep Obat</label>
                            <input type="text" name="resep" class="form-control"
                                value="{{ $konsultasi->resep }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tindakan</label>
                            <input type="text" name="tindakan" class="form-control"
                                value="{{ $konsultasi->tindakan }}">
                        </div>

                        <input type="hidden" name="tanggal_periksa" value="{{ $konsultasi->tanggal_periksa }}">

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
