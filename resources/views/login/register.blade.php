<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Akun | Sistem Informasi Puskesmas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="font-family: 'Poppins', sans-serif;">

    <div class="container py-3">

        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card shadow">

                    <div class="card-header text-center bg-info py-3">

                        <div class="mb-3">
                            <img src="{{ asset('logo/puskesmas-logo.png') }}" width="80" height="80">
                        </div>

                        <h4 class="text-light">Buat Akun Baru</h4>

                    </div>

                    <div class="card-body py-4 px-4">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('register.proses') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label class="fw-semibold mb-1">Nama</label>
                                <input type="text" name="nama" class="form-control"
                                    placeholder="Masukan nama lengkap">
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold mb-1">Username</label>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Masukan username">
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold mb-1">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukan password">
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold mb-1">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Masukan ulang password">
                            </div>

                            <div class="mb-3">
                                <label class="fw-semibold mb-1">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan email">
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-info w-100 rounded-pill mb-2 text-light">
                                    Buat Akun
                                </button>
                                <a href="{{ route('login') }}">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
