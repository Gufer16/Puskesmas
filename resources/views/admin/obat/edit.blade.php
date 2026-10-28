<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Obat</title>

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
                <h4 class="mt-4">Obat</h4>
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
                        Edit Obat
                    </h2>
                    <p>Edit data obat sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('obat.index') }}">Obat</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Edit Obat</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon bg-warning">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                    </div>

                    <div>
                        <h5>Edit Data Obat</h5>
                        <p>Edit data obat agar sesuai.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('obat.update', $obat->id) }}" method="POST">

                    @csrf
                    @method('PATCH')

                    {{-- Informasi Pribadi --}}
                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card text-dark"></i>
                        <span>Informasi Data Obat</span>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Kode Obat</label>
                            <input type="text" name="kode_obat" class="form-control" value="{{ $obat->kode_obat }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" placeholder="Masukan nama obat"
                                value="{{ $obat->nama_obat }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jenis Obat</label>
                            <select name="jenis_obat" class="form-select">
                                <option disabled>Pilih jenis obat</option>
                                <option value="Tablet"{{ $obat->jenis_obat == 'Tablet' ? 'selected' : '' }}>Tablet
                                </option>
                                <option value="Sirup"{{ $obat->jenis_obat == 'Sirup' ? 'selected' : '' }}>Sirup
                                </option>
                                <option value="Pil"{{ $obat->jenis_obat == 'Pil' ? 'selected' : '' }}>Pil</option>
                                <option value="Vitamin"{{ $obat->jenis_obat == 'Vitamin' ? 'selected' : '' }}>Vitamin
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Stok Obat</label>
                            <input type="number" name="stok_obat" class="form-control" placeholder="Masukan stok obat"
                                value="{{ $obat->stok_obat }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Harga Satuan Obat</label>
                            <input type="number" name="harga_satuan" class="form-control" placeholder="Cth: 15000"
                                value="{{ (int) $obat->harga_satuan }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Kadaluarsa Obat</label>
                            <input type="date" name="tanggal_kadaluarsa" class="form-control"
                                value="{{ $obat->tanggal_kadaluarsa }}">
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
