<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Stok Obat</title>

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
                    <h2>
                        <i class="fa-solid fa-plus"></i>
                        Tambah Stok Obat
                    </h2>
                    <p>Tambahkan stok obat ke dalam sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('obat.index') }}">Obat</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Tambah Stok Obat</span>
                </nav>
            </div>

            {{-- Form Tambah Obat --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon">
                        <i class="fa-solid fa-plus"></i>
                    </div>

                    <div>
                        <h5>Formulir Data Stok Obat</h5>
                        <p>Lengkapi folmulir data stok obat dengan benar.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('tambahStokProses', $obat->id) }}" method="POST">

                    @csrf

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Obat</label>
                            <input type="text" class="form-control" value="{{ $obat->nama_obat }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" placeholder="Masukan nama obat">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jenis Obat</label>
                            <select name="jenis_obat" class="form-select">
                                <option disabled selected>Pilih jenis obat</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Sirup">Sirup</option>
                                <option value="Pil">Pil</option>
                                <option value="Vitamin">Vitamin</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Stok Obat</label>
                            <input type="number" name="stok_obat" class="form-control" placeholder="Masukan stok obat">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Harga Satuan Obat</label>
                            <input type="number" name="harga_satuan" class="form-control" placeholder="Cth: 15000">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Kadaluarsa Obat</label>
                            <input type="date" name="tanggal_kadaluarsa" class="form-control">
                        </div>

                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="patient-form-footer">

                        <button type="submit" class="btn btn-primary w-100 rounded-pill shadow">
                            <i class="fa-solid fa-floppy-disk me-1"></i>
                            Simpan Obat
                        </button>

                    </div>

                </form>
            </div>

        </div>

    </main>

    @include('layoutAdmin.footer');
