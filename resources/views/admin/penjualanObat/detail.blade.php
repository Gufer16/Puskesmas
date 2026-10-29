<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan Obat</title>

    <link rel="stylesheet" href="{{ asset('css/admin/pasien/detail_konsultasi.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="detail-page">

        {{-- Tombol Aksi --}}
        <div class="action-bar no-print">
            <a href="{{ route('penjualanObat.index') }}" class="btn btn-back">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>

            <button type="button" onclick="window.print()" class="btn btn-print">
                <i class="fas fa-print me-2"></i> Print Laporan
            </button>
        </div>

        {{-- Dokumen Laporan --}}
        <div class="report-paper">

            {{-- Kop Puskesmas --}}
            <div class="report-header">
                <div class="report-logo">
                    <img src="{{ asset('logo/puskesmas-logo.png') }}" width="70" height="70">
                </div>

                <div class="report-header-text">
                    <h2>PEMERINTAH KABUPATEN KUPANG</h2>
                    <h3>UPTD PUSKESMAS</h3>
                    <p>Jl. Sudirman, Kel. Baumata, Nusa Tenggara Timur</p>
                    <p>Email: puskesmas@gmail.com | Telepon: (0380) xxxxx</p>
                </div>
            </div>

            <div class="report-divider"></div>

            {{-- Judul Laporan --}}
            <div class="report-title">
                <h3>LAPORAN PENJUALAN OBAT</h3>
                <p>Laporan seluruh data penjualan obat di puskesmas.</p>
            </div>

            <table class="table table-bordered">

                <thead class="text-center">
                    <th width="40">No</th>
                    <th width="120">Obat</th>
                    <th width="70">Jumlah Obat</th>
                    <th width="90">Jenis Obat</th>
                    <th width="90">Biaya</th>
                    <th width="90">Tanggal</th>
                </thead>

                <tbody class="text-center">
                    @foreach ($penjualanObats as $penjualanObat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penjualanObat->obat->nama_obat }}</td>
                            <td>{{ $penjualanObat->jumlah_obat }}</td>
                            <td>{{ $penjualanObat->obat->jenis_obat }}</td>
                            <td>{{ number_format($penjualanObat->biaya, 0, ',', '.') }}</td>
                            <td>{{ $penjualanObat->tanggal_penjualan }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            {{-- Footer Dokumen --}}
            <div class="report-footer">
                <p>
                    Dokumen ini merupakan informasi seluruh data penjualan obat di puskesmas.
                </p>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
