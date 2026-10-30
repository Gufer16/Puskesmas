<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Akun</title>

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
                <h4>Akun</h4>
                <span class="text-muted">{{ $user->role }}</span>
            </div>

            <div class="topbar-right">
                <div class="topbar-date">
                    <i class="fa-regular fa-calendar"></i>
                    <span id="currentDate"></span>
                </div>
            </div>
        </header>

        <section class="content-area">

            {{-- Tabel Data Akun --}}
            <div class="card patient-table-card px-2">

                <div class="card-header patient-card-header">

                    <div>
                        <h6 class="fw-bold mb-1">Data Akun Anda</h6>

                        <p class="text-muted small mb-0">
                            Informasi mengenai akun anda.
                        </p>
                    </div>

                </div>

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success mb-3 mt-2">
                            <i class="fa-solid fa-check me-1"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="mb-3">

                        <label class="fw-semibold ms-2 mb-1">Nama Pengguna</label>
                        <input type="text" class="form-control ms-3" value="{{ $user->nama }}" readonly>

                    </div>


                    <div class="mb-3">

                        <label class="fw-semibold ms-2 mb-1">Username</label>
                        <input type="text" class="form-control ms-3" value="{{ $user->username }}" readonly>

                    </div>

                    <div class="mb-3">

                        <label class="fw-semibold ms-2 mb-1">Email</label>
                        <input type="text" class="form-control ms-3" value="{{ $user->email }}" readonly>

                    </div>

                    <div class="mt-3">

                        <div class="d-flex gap-1">

                            <a href="{{ route('akun.edit', $user->id) }}"
                                class="btn btn-warning w-50 rounded-pill text-light shadow">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit Profile
                            </a>

                            <a href="{{ route('akun.editPassword', $user->id) }}"
                                class="btn btn-primary w-50 rounded-pill text-light shadow">
                                <i class="fa-solid fa-key"></i>
                                Ubah Password
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

    @include('layoutAdmin.footer');
