<!-- Sidebar -->
<aside class="sidebar" id="sidebar">

    <!-- Logo -->
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="fa-solid fa-hospital"></i>
        </div>

        <div class="brand-text">
            <h5>PUSKESMAS</h5>
            <span>Sistem Informasi</span>
        </div>
    </div>

    <!-- Menu -->
    <div class="sidebar-menu">

        <p class="menu-label">MENU</p>

        <a href="{{ route('admin.dashboard') }}" class="menu-item">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('pasien.index') }}" class="menu-item">
            <i class="fa-solid fa-hospital-user"></i>
            <span>Data Pasien</span>
        </a>

        <a href="{{ route('dokter.index') }}" class="menu-item">
            <i class="fa-solid fa-user-doctor"></i>
            <span>Data Dokter</span>
        </a>

        <a href="{{ route('pendaftaran.index') }}" class="menu-item">
            <i class="fa-solid fa-calendar-check"></i>
            <span>Pendaftaran</span>
        </a>

        <a href="{{ route('jadwal.index') }}" class="menu-item">
            <i class="fa-solid fa-calendar-days"></i>
            <span>Jadwal</span>
        </a>

        <a href="{{ route('konsultasi.index') }}" class="menu-item">
            <i class="fa-solid fa-list"></i>
            <span>Konsultasi</span>
        </a>

        <a href="#" class="menu-item">
            <i class="fa-solid fa-sack-dollar"></i>
            <span>Biaya Konsultasi</span>
        </a>

        <p class="menu-label mt-4">MANAJEMEN</p>

        <a href="/obat" class="menu-item">
            <i class="fa-solid fa-pills"></i>
            <span>Obat</span>
        </a>

        <a href="/petugas" class="menu-item">
            <i class="fa-solid fa-users"></i>
            <span>Pengguna Sistem</span>
        </a>

        <a href="/laporan" class="menu-item">
            <i class="fa-solid fa-chart-column"></i>
            <span>Laporan</span>
        </a>

        <p class="menu-label mt-4">PROFILE</p>

        <a href="/profile" class="menu-item">
            <i class="fa-solid fa-user-circle"></i>
            <span>Akun</span>
        </a>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="menu-item logout-btn" onclick="return confirm('Yakin ingin keluar?')">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </button>
        </form>

    </div>

    <!-- User Profile -->
    <div class="sidebar-footer">

        <div class="user-profile">
            <div class="user-avatar">
                <i class="fa-solid fa-user-gear"></i>
            </div>

            <div class="user-info">
                <h6 class="text-dark">{{ Auth::user()->nama }}</h6>
                <span class="text-dark">Admin Puskesmas</span>
            </div>

            <i class="fa-solid fa-ellipsis-vertical user-more"></i>
        </div>

    </div>

</aside>
