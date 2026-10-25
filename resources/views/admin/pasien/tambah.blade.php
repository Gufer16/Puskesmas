<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pasien</title>

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
                <h4 class="mt-4">Pasien</h4>
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
                        Tambah Pasien
                    </h2>
                    <p>Tambahkan data pasien baru ke dalam sistem puskesmas.</p>
                </div>

                <nav class="breadcrumb-custom">
                    <a href="{{ route('pasien.index') }}">Data Pasien</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>Tambah Pasien</span>
                </nav>
            </div>

            {{-- Form Tambah Pasien --}}
            <div class="patient-form-card px-3">

                <div class="patient-form-header">
                    <div class="form-header-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <div>
                        <h5>Formulir Data Pasien</h5>
                        <p>Lengkapi informasi pasien dengan benar.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('pasien.store') }}" method="POST">

                    @csrf

                    {{-- Informasi Pribadi --}}
                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card"></i>
                        <span>Informasi Pribadi</span>
                    </div>

                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Nomor Rekam Medis</label>
                            <input type="text" name="no_rm" class="form-control" value="RM - ">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control"
                                placeholder="Masukkan nama lengkap pasien">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select">
                                <option selected disabled>
                                    Pilih jenis kelamin
                                </option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Usia</label>
                            <input type="number" name="usia" class="form-control" placeholder="Masukkan usia">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Contoh: Kupang">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Golongan Darah</label>
                            <select name="gol_darah" class="form-select">
                                <option selected disabled>
                                    Pilih Golongan Darah
                                </option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No. Handphone</label>
                            <input type="number" name="no_hp" class="form-control"
                                placeholder="Masukan nomor handphone pasien">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status Penikahan</label>
                            <select name="status" class="form-select">
                                <option selected disabled>
                                    Pilih Status Pernikahan
                                </option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap pasien"></textarea>
                        </div>

                    </div>

                    <div class="form-section-title">
                        <i class="fa-solid fa-id-card"></i>
                        <span>Informasi Opsional</span>
                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">No. BPJS</label>
                            <input type="number" name="no_bpjs" class="form-control"
                                placeholder="Masukkan nomor BPJS pasien">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                placeholder="Masukkan pekerjaan pasien">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Penanggung Jawab</label>
                            <input type="text" name="nama_penanggung" class="form-control"
                                placeholder="Masukkan nama penanggung jawab">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No. Handphone Penanggung Jawab</label>
                            <input type="text" name="hp_penanggung" class="form-control"
                                placeholder="Masukkan nomor handphone penanggung jawab">
                        </div>

                    </div>


                    {{-- Tombol Aksi --}}
                    <div class="patient-form-footer">

                        <button type="submit" class="btn btn-primary w-100 rounded-pill shadow">
                            <i class="fa-solid fa-floppy-disk me-1"></i>
                            Simpan Pasien
                        </button>

                    </div>

                </form>
            </div>

        </div>

    </main>

    @include('layoutAdmin.footer');
