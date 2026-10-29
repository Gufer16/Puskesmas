<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal</title>

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
                <h4>Jadwal</h4>
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
                        <i class="fa-solid fa-calendar-days"></i>
                        Jadwal Pasien
                    </h5>
                </div>

                <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm shadow rounded-3 px-3">
                    <i class="fa-solid fa-plus me-1"></i>
                    Tambah Jadwal
                </a>

            </div>

            {{-- Tabel Data Pasien --}}
            <div class="card patient-table-card px-2">

                <div class="card-header patient-card-header">

                    <div>
                        <h6 class="fw-bold mb-1">Daftar Jadwal Pasien</h6>

                        <p class="text-muted small mb-0">
                            Informasi seluruh jadwal pasien puskesmas.
                        </p>
                    </div>

                </div>

                {{-- Pencarian dan Tombol Filter --}}
                <div class="patient-filter d-flex">

                    <div class="patient-search w-100">

                        <form action="{{ route('jadwal.index') }}" method="GET">

                            @csrf

                            <div class="input-group patient-search">

                                <input type="text" name="cari" class="form-control"
                                    placeholder="Cari jadwal pasien..." value="{{ $cari ?? '' }}">

                                <button type="submit" class="btn btn-primary">
                                    Cari
                                </button>

                            </div>

                        </form>

                    </div>

                    <a href="{{ route('jadwal.index') }}" class="btn btn-danger btn-sm ms-1">
                        <i class="fa-solid fa-arrow-rotate-left mt-3"></i>
                    </a>

                </div>

                @if (session('success'))
                    <div class="alert alert-success mb-3 mt-2">
                        <i class="fa-solid fa-check me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
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
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($jadwals as $jadwal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jadwal->dokters->nama_dokter }}</td>
                                    <td>{{ $jadwal->pendaftarans->pasien->nama_pasien }}</td>
                                    <td>{{ $jadwal->hari }}</td>
                                    <td>{{ $jadwal->jam }}</td>
                                    <td>
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">

                                            <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                                                class="btn btn-sm btn-warning text-light me-1 rounded-3"
                                                title="Edit Jadwal">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger rounded-3"
                                                title="Hapus Jadwal"
                                                onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">

                                        <div class="empty-patient">
                                            <i class="fa-solid fa-folder-open"></i>

                                            <h6>Tidak Ada Data Jadwal</h6>
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
