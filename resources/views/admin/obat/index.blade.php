<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Obat</title>

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

    @include('layoutAdmin.sidebar')

    <!-- Main Content -->
    <main class="main-content" id="mainContent">

        <!-- Topbar -->
        <header class="topbar">
            <button class="toggle-btn" id="toggleSidebar" aria-label="Buka atau tutup sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="page-heading">
                <h4>Obat</h4>
            </div>

            <div class="topbar-right">
                <div class="topbar-date">
                    <i class="fa-regular fa-calendar"></i>
                    <span id="currentDate"></span>
                </div>
            </div>
        </header>

        <section class="content-area">

            <!-- Judul Halaman -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

                <div>
                    <h5 class="fw-bold mb-2">
                        <i class="fa-solid fa-pills"></i>
                        Data Obat
                    </h5>
                </div>

                <div class="d-flex">
                    <a href="{{ route('obat.create') }}" class="btn btn-primary btn-sm shadow rounded-3 px-3 me-1">
                        <i class="fa-solid fa-plus me-1"></i>
                        Tambah Obat
                    </a>

                    <a href="{{ route('obat.show', $obats->all()) }}"
                        class="btn btn-secondary btn-sm shadow rounded-3 px-3">
                        <i class="fa-solid fa-print me-1"></i>
                        Laporan Obat
                    </a>
                </div>

            </div>

            <!-- Tabel Data Obat -->
            <div class="card patient-table-card px-2">

                <div class="card-header patient-card-header">
                    <div>
                        <h6 class="fw-bold mb-1">Daftar Obat</h6>
                        <p class="text-muted small mb-0">
                            Informasi seluruh obat di puskesmas.
                        </p>
                    </div>
                </div>

                <!-- Pencarian -->
                <div class="patient-filter d-flex">

                    <div class="patient-search w-100">
                        <form action="{{ route('obat.index') }}" method="GET">
                            <div class="input-group patient-search">

                                <input type="text" name="cari" class="form-control" placeholder="Cari obat..."
                                    value="{{ $cari ?? '' }}">

                                <button type="submit" class="btn btn-primary">
                                    Cari
                                </button>

                            </div>
                        </form>
                    </div>

                    <a href="{{ route('obat.index') }}" class="btn btn-danger btn-sm ms-1" title="Reset pencarian">
                        <i class="fa-solid fa-arrow-rotate-left mt-3"></i>
                    </a>

                </div>

                <!-- Notifikasi -->
                @if (session('success'))
                    <div class="alert alert-success mb-3 mt-2">
                        <i class="fa-solid fa-check me-1"></i>
                        {{ session('success') }}

                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif

                @if ($errors->has('jumlah_stok'))
                    <div class="alert alert-danger mb-3 mt-2">
                        {{ $errors->first('jumlah_stok') }}
                    </div>
                @endif

                <!-- Tabel -->
                <div class="table-responsive">

                    <table class="table patient-table align-middle mb-0">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Obat</th>
                                <th>Jenis</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Kadaluarsa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($obats as $obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obat->kode_obat }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->jenis_obat }}</td>
                                    <td>
                                        <span
                                            class="badge px-2 py-1 {{ $obat->stok_obat <= 10 ? 'bg-danger' : 'bg-success' }}">
                                            {{ $obat->stok_obat }}
                                        </span>
                                    </td>
                                    <td>Rp {{ number_format($obat->harga_satuan, 0, ',', '.') }}</td>
                                    <td>{{ $obat->tanggal_kadaluarsa }}</td>

                                    <td>
                                        <div class="d-flex align-items-center">

                                            <!-- Tombol Edit -->
                                            <a href="{{ route('obat.edit', $obat->id) }}"
                                                class="btn btn-sm btn-warning text-light me-2 rounded-3"
                                                title="Edit Obat">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <!-- Tombol Tambah Stok -->
                                            <button type="button"
                                                class="btn btn-sm btn-primary text-light me-2 rounded-3"
                                                data-bs-toggle="modal" data-bs-target="#modalStok{{ $obat->id }}"
                                                title="Tambah Stok Obat">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger rounded-3"
                                                    title="Hapus Obat"
                                                    onclick="return confirm('Yakin ingin menghapus data obat ini?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Tambah Stok -->
                                <div class="modal fade" id="modalStok{{ $obat->id }}" tabindex="-1"
                                    aria-labelledby="judulModalStok{{ $obat->id }}" aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content border-0 shadow">

                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title fw-bold" id="judulModalStok{{ $obat->id }}">
                                                    <i class="fa-solid fa-boxes-stacked me-2"></i>
                                                    Tambah Stok Obat
                                                </h5>

                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Tutup">
                                                </button>
                                            </div>

                                            <form action="{{ route('obat.tambahStokProses', ['obat' => $obat->id]) }}"
                                                method="POST">

                                                @csrf
                                                @method('PATCH')

                                                <div class="modal-body p-4">

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">
                                                            Kode Obat
                                                        </label>

                                                        <input type="text" class="form-control"
                                                            value="{{ $obat->kode_obat }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">
                                                            Nama Obat
                                                        </label>

                                                        <input type="text" class="form-control"
                                                            value="{{ $obat->nama_obat }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">
                                                            Stok Saat Ini
                                                        </label>

                                                        <input type="number" class="form-control"
                                                            value="{{ $obat->stok_obat }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jumlah_stok{{ $obat->id }}"
                                                            class="form-label fw-semibold">
                                                            Jumlah Stok yang Ditambahkan
                                                        </label>

                                                        <input type="number" id="jumlah_stok{{ $obat->id }}"
                                                            name="jumlah_stok" class="form-control" min="1"
                                                            step="1" placeholder="Masukkan jumlah stok"
                                                            required>

                                                        <small class="text-muted">
                                                            Masukkan jumlah obat yang diterima.
                                                        </small>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary rounded-3"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <button type="submit" class="btn btn-primary rounded-3">
                                                        <i class="fa-solid fa-check me-1"></i>
                                                        Simpan Stok
                                                    </button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <div class="empty-patient">
                                            <i class="fa-solid fa-folder-open"></i>
                                            <h6>Tidak Ada Data Obat</h6>
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

    @include('layoutAdmin.footer')

    <!-- Bootstrap JS: wajib agar modal berfungsi -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
