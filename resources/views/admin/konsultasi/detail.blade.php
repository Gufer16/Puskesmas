<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Konsultasi</title>

    <link rel="stylesheet" href="{{ asset('css/admin/pasien/detail_konsultasi.css') }}">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="detail-page">

        {{-- Tombol Aksi --}}
        <div class="action-bar no-print">
            <a href="{{ route('konsultasi.index') }}" class="btn btn-back">
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
                <h3>KONSULTASI PASIEN</h3>
                <p>Rekam informasi pemeriksaan dan pelayanan pasien</p>
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
                        <td>: {{ $konsultasi->pendaftaran->pasien->nama_pasien }}</td>
                        <td>No. Rekam Medis</td>
                        <td>: {{ $konsultasi->pendaftaran->pasien->no_rm }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{ $konsultasi->pendaftaran->pasien->jenis_kelamin }}</td>
                        <td>Usia</td>
                        <td>: {{ $konsultasi->pendaftaran->pasien->usia }} Tahun</td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>: {{ $konsultasi->pendaftaran->pasien->no_hp }}</td>
                        <td>Jenis Kunjungan</td>
                        <td>: {{ $konsultasi->pendaftaran->jenis_kunjungan }}</td>
                    </tr>
                </table>
            </div>

            {{-- Identitas Dokter --}}
            <div class="report-section">
                <h4 class="section-title">
                    <span>02</span>
                    Informasi Dokter
                </h4>

                <table class="info-table">
                    <tr>
                        <td>Nama Dokter</td>
                        <td>: {{ $konsultasi->dokter->nama_dokter }}</td>
                        <td>Surat Izin Praktek (SIP)</td>
                        <td>: {{ $konsultasi->dokter->sip }} </td>
                    </tr>
                    <tr>
                        <td>Spesialis</td>
                        <td>: {{ $konsultasi->dokter->spesialis }}</td>
                    </tr>
                </table>
            </div>

            {{-- Hasil Konsultasi --}}
            <div class="report-section">
                <h4 class="section-title">
                    <span>03</span>
                    Hasil Pemeriksaan
                </h4>

                <div class="medical-item">
                    <h5>Keluhan Pasien</h5>
                    <p>
                        {{ $konsultasi->keluhan }}
                    </p>
                </div>

                <div class="medical-item">
                    <h5>Diagnosis</h5>
                    <p>
                        {{ $konsultasi->diagnosa }}
                    </p>
                </div>

            </div>

            {{-- Tanda Tangan --}}
            <div class="signature-area">
                <div class="signature-box">
                    <p>Pasien</p>
                    <div class="signature-space"></div>
                    <p class="signature-name">( {{ $konsultasi->pendaftaran->pasien->nama_pasien }} )</p>
                </div>

                <div class="signature-box">
                    <p>Dokter Pemeriksa</p>
                    <div class="signature-space"></div>
                    <p class="signature-name">( {{ $konsultasi->dokter->nama_dokter }} )</p>
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
