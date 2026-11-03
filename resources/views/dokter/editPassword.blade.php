<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Password</title>

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

    @include('layoutDokter.sidebar');

    <!-- Main Content -->
    <main class="main-content" id="mainContent">

        <!-- Topbar -->
        <header class="topbar">
            <button class="toggle-btn" id="toggleSidebar" aria-label="Buka atau tutup sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="page-heading">
                <h4 class="mt-4">Edit Password</h4>
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
                        Edit Password
                    </h2>
                    <p>Edit password anda agar akun anda lebih aman.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('dokter.akun') }}">Akun</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <a href="{{ route('dokter.perantara') }}">Edit Akun</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Edit Password</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon bg-warning">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                    </div>

                    <div>
                        <h5>Edit Password</h5>
                        <p>Edit password akun anda agar sesuai.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('dokter.updatePassword') }}" method="POST">

                    @csrf
                    @method('PATCH')

                    <div class="row g-3 mb-4">

                        <div class="col-md-12">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control"
                                placeholder="Masukan password lama">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Masukan password baru">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Masukan ulang password baru">
                        </div>

                    </div>

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

    @include('layoutDokter.footer');
