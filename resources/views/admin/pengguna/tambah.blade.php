<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pengguna Sistem</title>

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
                <h4 class="mt-4">Pengguna Sistem</h4>
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
                        Tambah Pengguna
                    </h2>
                    <p>Tambahkan pengguna sistem baru ke dalam sistem.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('pengguna.index') }}">Pengguna Sistem</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Tambah Pengguna</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <div>
                        <h5>Formulir Data Pengguna Sistem</h5>
                        <p>Lengkapi informasi pengguna dengan benar.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('pengguna.store') }}" method="POST">

                    @csrf

                    {{-- Informasi Pribadi --}}
                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card"></i>
                        <span>Informasi Pengguna Sistem</span>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Nama Pengguna</label>
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukan nama pengguna">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukan username">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan password">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukan email">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option selected disabled>
                                    Pilih Role Pengguna
                                </option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                                <option value="dokter">Dokter</option>
                                <option value="pengunjung">Pengunjung</option>
                            </select>
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
