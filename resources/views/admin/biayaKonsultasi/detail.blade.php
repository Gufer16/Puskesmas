<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biaya Konsultasi</title>

    <link rel="stylesheet" href="{{ asset('css/admin/pasien/detail_konsultasi.css') }}">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="detail-page">

        {{-- Tombol Aksi --}}
        <div class="action-bar no-print">
            <a href="{{ route('biayaKonsultasi.index') }}" class="btn btn-back">
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
                <h3>BIAYA KONSULTASI</h3>
                <p>Rekam informasi biaya konsultasi pasien</p>
            </div>

            {{-- Identitas Pasien --}}
            <div class="report-section">
                <h4 class="section-title">
                    <span>01</span>
                    Identitas Pasien
                </h4>

                <table class="info-table">
                    <tr>
                        <td>Nama Pasien</td>
                        <td>: {{ $biayaKonsultasi->konsultasi->pendaftaran->pasien->nama_pasien }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>No. Rekam Medis</td>
                        <td>: {{ $biayaKonsultasi->konsultasi->pendaftaran->pasien->no_rm }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <div class="report-section">
                <h4 class="section-title">
                    <span>02</span>
                    Biaya Konsultasi
                </h4>

                <table class="info-table">
                    <tr>
                        <td>Obat</td>
                        <td>: {{ $biayaKonsultasi->obat->nama_obat }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Jumlah Obat</td>
                        <td>: {{ $biayaKonsultasi->jumlah_obat }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Biaya Obat</td>
                        <td>:
                            {{ number_format($biayaKonsultasi->obat->harga_satuan * $biayaKonsultasi->jumlah_obat, 0, ',', '.') }}
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Biaya Konsultasi</td>
                        <td>:
                            {{ number_format($biayaKonsultasi->biaya_konsultasi, 0, ',', '.') }}
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgb(199, 199, 199)">
                        <td>Total Biaya</td>
                        <td>:
                            {{ number_format($biayaKonsultasi->total_biaya, 0, ',', '.') }}
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            {{-- Tanda Tangan --}}
            <div class="signature-area">
                <div class="signature-box">
                    <p>Pasien</p>
                    <div class="signature-space"></div>
                    <p class="signature-name">( {{ $biayaKonsultasi->konsultasi->pendaftaran->pasien->nama_pasien }} )
                    </p>
                </div>

                <div class="signature-box">
                    <p>Petugas Puskesmas</p>
                    <div class="signature-space"></div>
                    <p class="signature-name">( {{ Auth::user()->nama }} )</p>
                </div>
            </div>

            {{-- Footer Dokumen --}}
            <div class="report-footer">
                <p>
                    Dokumen ini merupakan ringkasan informasi konsultasi pasien.
                </p>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
