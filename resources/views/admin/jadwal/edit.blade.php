<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Jadwal</title>

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
                <h4 class="mt-4">Jadwal</h4>
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
                        Edit Jadwal
                    </h2>
                    <p>Edit data jadwal pasien sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('jadwal.index') }}">Jadwal</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Edit Jadwal</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon bg-warning">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                    </div>

                    <div>
                        <h5>Edit Data Jadwal Pasien</h5>
                        <p>Edit Data Jadwal pasien dengan agar sesuai.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">

                    @csrf
                    @method('PATCH')

                    {{-- Informasi Pribadi --}}
                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card text-dark"></i>
                        <span>Informasi Jadwal Pasien</span>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Dokter</label>
                            <select name="id_dokter" class="form-select">
                                <option disabled>Pilih Dokter</option>
                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->id }}"
                                        {{ $jadwal->id_dokter == $dokter->id ? 'selected' : '' }}>
                                        {{ $dokter->nama_dokter }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pasien</label>
                            <select name="id_pendaftaran" class="form-select">
                                <option disabled>Pilih Pasien</option>
                                @foreach ($pendaftarans as $pendaftaran)
                                    <option value="{{ $pendaftaran->id }}"
                                        {{ $jadwal->id_pendaftaran == $pendaftaran->id ? 'selected' : '' }}>
                                        {{ $pendaftaran->pasien->nama_pasien }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hari</label>
                            <select name="hari" class="form-select">
                                <option selected>
                                    Pilih Hari
                                </option>
                                <option value="Senin"{{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa"{{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu"{{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis"{{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat"{{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="Sabtu"{{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                <option value="Minggu"{{ $jadwal->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jam</label>
                            <input type="time" name="jam" class="form-control" value="{{ $jadwal->jam }}">
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
