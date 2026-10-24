<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Sistem Informasi Puskesmas</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="login-container">

        <!-- BAGIAN KIRI -->
        <div class="left-section">

            <div class="brand">
                <div class="brand-icon">✚</div>

                <div class="brand-text">
                    <h2>SIMPUS</h2>
                    <p>Sistem Informasi Puskesmas</p>
                </div>
            </div>

            <div class="illustration">
                <div class="circle circle-one"></div>
                <div class="circle circle-two"></div>

                <div class="medical-card">
                    <span class="medical-icon">✚</span>
                    <div>
                        <strong>Layanan Kesehatan</strong>
                        <p>Melayani dengan sepenuh hati</p>
                    </div>
                </div>

                <img src="{{ asset('logo/puskesmas-logo.png') }}" alt="Tenaga kesehatan" class="doctor-image">

                <div class="floating-card">
                    <span class="check-icon">✓</span>
                    <div>
                        <strong>Pelayanan Terpercaya</strong>
                        <p>Sehat untuk semua</p>
                    </div>
                </div>
            </div>

            <div class="left-content">
                <h1>Sehat Bersama,<br>Lebih Mudah.</h1>

                <p>
                    Sistem informasi terintegrasi untuk mendukung
                    pelayanan kesehatan yang cepat, tepat, dan
                    berkualitas bagi masyarakat.
                </p>

                <div class="features">
                    <div class="feature-item">
                        <span>✓</span>
                        Pelayanan Terintegrasi
                    </div>

                    <div class="feature-item">
                        <span>✓</span>
                        Data Lebih Terorganisir
                    </div>

                    <div class="feature-item">
                        <span>✓</span>
                        Akses yang Mudah
                    </div>
                </div>
            </div>

            <div class="left-footer">
                <span>✚</span>
                Peduli Kesehatan, Peduli Masyarakat
            </div>

        </div>


        <!-- BAGIAN KANAN -->
        <div class="right-section">

            <div class="login-card">

                <div class="mobile-brand">
                    <div class="brand-icon">✚</div>
                    <div>
                        <h2>SIMPUS</h2>
                        <p>Sistem Informasi Puskesmas</p>
                    </div>
                </div>

                <div class="welcome-icon">
                    <span>✚</span>
                </div>

                <h2>Selamat Datang!</h2>

                <p class="login-description mb-3">
                    Silakan masuk menggunakan akun Anda
                    untuk mengakses sistem informasi puskesmas.
                </p>

                @if (session('success'))
                    <div class="alert alert-success mb-3">
                        <i class="fa-solid fa-check me-1"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- FORM LOGIN -->
                <form action="{{ route('login.proses') }}" method="POST" id="loginForm">

                    @csrf

                    <!-- USERNAME -->
                    <div class="form-group">
                        <label for="username">Username</label>

                        <div class="input-wrapper">
                            <span class="input-icon"><i class="fa-solid fa-user"></i></span>

                            <input type="text" id="username" name="username" placeholder="Masukkan username"
                                autocomplete="username" required>
                        </div>
                    </div>


                    <!-- PASSWORD -->
                    <div class="form-group">
                        <div class="label-row">
                            <label for="password">Password</label>
                        </div>

                        <div class="input-wrapper">
                            <span class="input-icon"><i class="fa-solid fa-key"></i></span>

                            <input type="password" id="password" name="password" placeholder="Masukkan password"
                                autocomplete="current-password" required>

                            <button type="button" class="toggle-password" id="togglePassword"
                                aria-label="Tampilkan password">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- INGAT SAYA -->
                    <div class="form-options">
                        <label class="remember-me">

                        </label>

                        <a href="{{ route('register') }}" class="forgot-password">
                            Buat akun
                        </a>
                    </div>

                    <!-- TOMBOL LOGIN -->
                    <button type="submit" class="login-button">
                        <span>Masuk</span>
                        <span class="arrow">→</span>
                    </button>

                </form>

            </div>


            <!-- FOOTER -->
            <footer class="right-footer">
                <p>
                    &copy; 2026 SIMPUS.
                    Sistem Informasi Pelayanan Kesehatan.
                </p>

                <p class="footer-note">
                    Melayani dengan Profesional dan Sepenuh Hati
                </p>
            </footer>

        </div>

    </div>

    <script src="{{ asset('js/login.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
