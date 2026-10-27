<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Konsultasi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pasien/pasien.css') }}">
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
                <h4>Konsultasi</h4>
            </div>

            <div class="topbar-right">
                <div class="topbar-date">
                    <i class="fa-regular fa-calendar"></i>
                    <span id="currentDate"></span>
                </div>
            </div>
        </header>

        <section class="content-area">

            {{-- Judul Halaman --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

                <div>
                    <h5 class="fw-bold mb-2">
                        <i class="fa-solid fa-list"></i>
                        Data Konsultasi
                    </h5>
                </div>

                <a href="{{ route('konsultasi.create') }}" class="btn btn-primary btn-sm shadow rounded-3 px-3">
                    <i class="fa-solid fa-plus me-1"></i>
                    Tambah Konsultasi
                </a>

            </div>

            {{-- Tabel Data Konsultasi --}}
            <div class="card patient-table-card px-2">

                <div class="card-header patient-card-header">

                    <div>
                        <h6 class="fw-bold mb-1">Daftar Konsultasi Pasien</h6>

                        <p class="text-muted small mb-0">
                            Informasi seluruh konsultasi pasien puskesmas.
                        </p>
                    </div>

                </div>

                {{-- Pencarian dan Tombol Filter --}}
                <div class="patient-filter d-flex">

                    <div class="patient-search w-100">

                        <form action="{{ route('konsultasi.index') }}" method="GET">

                            @csrf

                            <div class="input-group patient-search">

                                <input type="text" name="cari" class="form-control"
                                    placeholder="Cari data konsultasi..." value="{{ $cari ?? '' }}">

                                <button type="submit" class="btn btn-primary">
                                    Cari
                                </button>

                            </div>

                        </form>

                    </div>

                    <a href="{{ route('konsultasi.index') }}" class="btn btn-danger btn-sm ms-1">
                        <i class="fa-solid fa-arrow-rotate-left mt-3"></i>
                    </a>

                </div>

                @if (session('success'))
                    <div class="alert alert-success mb-3 mt-2">
                        <i class="fa-solid fa-check me-1"></i>
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tabel --}}
                <div class="table-responsive">

                    <table class="table patient-table align-middle mb-0">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Dokter</th>
                                <th>Pasien</th>
                                <th>Keluhan</th>
                                <th>Diagnosa</th>
                                <th>Tindakan</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($konsultasis as $konsultasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $konsultasi->dokter->nama_dokter }}</td>
                                    <td>{{ $konsultasi->pendaftaran->pasien->nama_pasien }}</td>
                                    <td>{{ $konsultasi->keluhan }}</td>
                                    <td>{{ $konsultasi->diagnosa }}</td>
                                    <td>{{ $konsultasi->tindakan }}</td>
                                    <td>
                                        <form action="{{ route('konsultasi.destroy', $konsultasi->id) }}"
                                            method="POST">

                                            <a href="{{ route('konsultasi.edit', $konsultasi->id) }}"
                                                class="btn btn-sm btn-warning text-light me-1 rounded-3"
                                                title="Edit Konsultasi">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <a href="{{ route('konsultasi.show', $konsultasi->id) }}"
                                                class="btn btn-sm btn-success text-light me-1 rounded-3"
                                                title="Cetak Konsultasi">
                                                <i class="fa-solid fa-print"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger rounded-3"
                                                title="Hapus Konsultasi"
                                                onclick="return confirm('Yakin ingin menghapus data konsultasi pasien ini?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">

                                        <div class="empty-patient">
                                            <i class="fa-solid fa-folder-open"></i>

                                            <h6>Tidak Ada Data Konsultasi</h6>
                                        </div>

                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

    @include('layoutAdmin.footer');
